<?php namespace Bot;

use Aws\S3\Exception\S3Exception as S3Exception;

/**
 * Class Uploader
 * @package Bot
 */
class Uploader
{
    /**
     * @var \Monolog\Logger
     */
    private $logger;
    /**
     * @var S3Service
     */
    private $s3Service;

    /**
     * Uploader constructor.
     */
    public function __construct()
    {
        $this->logger    = Logger::load();
        $this->s3Service = new S3Service();
    }
    
    /**
     * Retorna o caminho do arquivo de log que está sendo utilizado no momento.
     * @return string
     */
    public function getLogPath()
    {
        return $this->logger->getHandlers()[0]->getUrl();
    }

    /**
     * Varre recursivamente o diretório indicado para sincronização
     * e replica a estrutura de diretórios no bucket S3 configurado
     */
    public function run()
    {
        try {
            $this->logger->warning("ENABLE UPLOAD = " . UPLOAD_ENABLED);
            $directory = new \RecursiveDirectoryIterator(SYNC_DIRECTORY);
            $iterator  = new \RecursiveIteratorIterator($directory);
            
            foreach ($iterator as $file) {
                $realPath    = $file->getPathname();
                $targetPath  = str_replace(SYNC_DIRECTORY, "", $realPath);
                $isFileValid = $this->isValidFile($realPath);

                if ($isFileValid) {
                    $this->logger->debug("UPLOADING >> {$realPath}");
                    $this->s3Service->upload($realPath, $targetPath);
                } else {
                    $this->logger->debug("IGNORING >> {$realPath}");
                }
            }
        } catch (S3Exception $e) {
            $this->logger->error($e->getMessage());
            $this->logger->error($e->getStackTrace());
        }
    }

    /**
     * Evita o upload de diretórios ou arquivos ocultos
     *
     * @param $filePath
     * @return bool
     */
    private function isValidFile($filePath)
    {
        $explodedPath = explode("/", $filePath);
        foreach ($explodedPath as $pathPiece)
            if(substr($pathPiece, 0, 1) == ".") return false;

        return true;
    }
}
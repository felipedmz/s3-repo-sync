<?php namespace Bot;

use Aws\S3\S3Client as S3Client;

/**
 * Encapsulamento da S3Client Class
 *
 * Class S3Service
 * @package Bot
 */
class S3Service
{
    /**
     * @var static
     */
    private $s3Client;

    /**
     * S3Service constructor.
     */
    public function __construct()
    {
        $this->s3Client = S3Client::factory([
            'key'     => S3_ACCESS_KEY,
            'secret'  => S3_SECRET_ACCESS_KEY,
            'version' => S3_VERSION,
            'region'  => S3_REGION
        ]);
    }

    /**
     * @param $realPath
     * @param $targetPath
     */
    public function upload($realPath, $targetPath)
    {
        if (!UPLOAD_ENABLED) return;
        $this->s3Client->putObject(array(
            'Bucket'     => S3_BUCKET_NAME,
            'Key'        => $targetPath,
            'SourceFile' => $realPath
        ));
    }
}
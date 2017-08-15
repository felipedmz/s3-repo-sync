<?php namespace Bot;

/**
 * Exceuta comandos GIT no SYNC_DIRECTORY, definido em config.ini
 *
 * Class Git
 * @package Bot
 */
class Git
{
    /**
     * Realiza um checkout no repositorio para a referencia informada
     * @param $reference branch, id do commit ou qualquer outra referencia git
     * @return string    saída de texto do console
     */
    public function checkoutTo($reference)
    {
        return $this->executeOnGit("checkout {$reference}");
    }

    /**
     * Realiza um pull no repositorio
     * @return string   saída de texto do console
     */
    public function pull()
    {
        return $this->executeOnGit("pull");

    }

    /**
     * Executa uma acao git no console para o SYNC_DIRECTORY configurado
     * @param $command   comando que será executado
     * @return string    saída de texto do console
     */
    private function executeOnGit($command)
    {
        return shell_exec("git -C " . SYNC_DIRECTORY . " {$command}");
    }
}
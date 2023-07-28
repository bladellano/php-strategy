<?php

namespace CDNS\Logger\Writter;

use CDNS\Logger\Interface\Writter;

class File implements Writter
{
    public function __construct(
        protected string $path,
        protected string $filename,
    ) {

    }

    public function warning(string $message): void
    {
        $this->writeFile($message);
    }
    public function error(string $message): void
    {
        $this->writeFile($message);
    }

    private function writeFile(string $formatedMessage)
    {
        $fileDir = $this->path . "/{$this->filename}";
        file_put_contents($fileDir, $formatedMessage);
    }
}

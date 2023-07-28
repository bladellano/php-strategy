<?php

namespace CDNS\Logger;

use CDNS\Logger\Interface\Writter;

class LogStrategy implements Writter
{
    public function __construct(
        protected Writter $writter
    ) {

    }

    public function warning(string $message): void
    {
        $formatedMessage = "Warning: " . $message . "";
        $this->writter->warning($formatedMessage);
    }
    public function error(string $message): void
    {
        $formatedMessage = "Error: " . $message . "";
        $this->writter->error($formatedMessage);
    }
}

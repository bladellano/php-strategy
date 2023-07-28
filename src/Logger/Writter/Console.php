<?php

namespace CDNS\Logger\Writter;

use CDNS\Logger\Interface\Writter;

class Console implements Writter
{
    public function warning(string $message): void
    {
        echo $message;
    }
    public function error(string $message): void
    {
        echo $message;
    }
}

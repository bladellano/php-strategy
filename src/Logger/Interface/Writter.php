<?php

namespace CDNS\Logger\Interface;

interface Writter
{
    public function warning(string $message): void;
    public function error(string $message): void;
}

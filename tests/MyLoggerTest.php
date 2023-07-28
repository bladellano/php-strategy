<?php

namespace CDNS;

use CDNS\Logger\LogStrategy;
use CDNS\Logger\MyLogger;
use CDNS\Logger\Writter\File;
use PHPUnit\Framework\TestCase;
use CDNS\Logger\Writter\Console;

class MyLoggerTest extends TestCase
{
    protected MyLogger $consoleLog;
    protected MyLogger $fileLog;

    public function setUp(): void
    {
        chdir(__DIR__);

        $this->consoleLog = new MyLogger(
            new LogStrategy(
                new Console()
            )
        );

        $this->fileLog = new MyLogger(
            new LogStrategy(
                new File('.', 'logs.txt')
            )
        );
    }

    public function tearDown(): void
    {
        if(file_exists('logs.txt')):
            @unlink('logs.txt');
        endif;
    }

    public function testClassLoggerShouldLogErrorInConsole()
    {
        $message = 'Olá mundo via logger';

        $this->expectOutputString("Error: Olá mundo via logger");

        $this->consoleLog->error($message);
    }

    public function testClassLoggerShouldLogWarningInConsole()
    {
        $message = 'Olá mundo via logger';

        $this->expectOutputString("Warning: Olá mundo via logger");

        $this->consoleLog->warning($message);
    }

    public function testClassLoggerShouldLogErrorInFile()
    {
        $message = 'Olá mundo via arquivo';

        $this->fileLog->error($message);

        $this->assertFileEquals('fixtures/log_error.txt', 'logs.txt');
    }

    public function testClassLoggerShouldLogWarningInFile()
    {
        $message = 'Olá mundo via arquivo';

        $this->fileLog->warning($message);

        $this->assertFileEquals('fixtures/log_warning.txt', 'logs.txt');
    }
}

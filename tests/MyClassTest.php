<?php

// tests/MyClassTest.php

namespace CDNS;

use CDNS\MyClass;
use PHPUnit\Framework\TestCase;

class MyClassTest extends TestCase
{
    public function testSomar()
    {
        $MyClass = new MyClass();

        // Teste a soma de dois números
        $resultado = $MyClass->somar(2, 3);
        $this->assertEquals(5, $resultado);

        // Teste a soma de números negativos
        $resultado = $MyClass->somar(-5, -3);
        $this->assertEquals(-8, $resultado);
    }

}

<?php
namespace App\tests;
use PHPUnit\Framework\TestCase;

class MyTest extends TestCase
{
    public function testOne() {
        $a = 2 + 2;
        $this->assertEquals(4, $a);
    }
    
}


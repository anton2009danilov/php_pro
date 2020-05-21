<?php
namespace App\tests\entities;
use PHPUnit\Framework\TestCase;
use App\entities\Good;

class GoodTest extends TestCase
{
    /**
     * @param unknown $price
     * @param unknown $newPrice
     * @param unknown $sale
     * 
     * @dataProvider dataForTestGetNewPrice
     */
    public function testGetNewPrice($price, $newPrice, $sale){
        $good = new Good();
        $good->setPrice($price);
        $good->getNewPrice($sale);
        $this->assertEquals($good->getNewPrice($sale), $newPrice);
    }
    
    public function dataForTestGetNewPrice() {
        return [
            [100, 90, null],
            [1000, 500, 500],
            [1000, 700, 300]
        ];
    }
}


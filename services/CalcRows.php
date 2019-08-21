<?php
namespace App\services;

trait CalcRows
{
    public function calc(array $rows):int
    {
        return count($rows);
    }
}


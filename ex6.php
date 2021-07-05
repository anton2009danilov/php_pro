<?php
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
// создает экземпляр класса А,
// вызывает конструктор А, нет вывода
$b1 = new B();
// создает экземпляр класса B,
// вызывает конструктор B, нет вывода
$a1->foo();
//$x принадлежит классу A; $x = 0; $x + 1 = 1;
//Вывод: 1;
$b1->foo();
//$x принадлежит классу B; $x = 0; $x + 1 = 1;
//Вывод: 1;
$a1->foo();
//$x принадлежит классу A; $x = 1; $x + 1 = 2;
//Вывод: 2;
$b1->foo();
//$x принадлежит классу B; $x = 1; $x + 1 = 2;
//Вывод: 2;
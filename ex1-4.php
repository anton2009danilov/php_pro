<?php
class User
{
    private $name;
    private $login;
    private $password;
    private $email;
    
    public function __construct($name, $login, $password, $email)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function logIn(){
        echo "Добро пожаловать, {$this->name}".'<br>';
    }
    
}

class Customer extends User
{
    
    public function addToCart($product)
    {
        echo "Товар {$product} добавлен в корзину".'<br>';
    }
    
    public function removeFromCart($product) {
        echo "Товар {$product} удален из корзины".'<br>';
    }
    
    public function createOrder() {
        
        echo "{$this->getName()}, Ваш заказ оформлен. Отчет отправлен на Ваш почтовый ящик {$this->getEmail()}".'<br>';
    }
        
}

$customer = new Customer('Антон', 'anton1158', '1234', 'anton2009danilov@yandex.ru');
var_dump($customer);
$customer->logIn();
$customer->addToCart('"Шоколадка"');
$customer->removeFromCart('"Водка"');
$customer->createOrder();


class Admin extends User
{
    public function addProduct($product) {
        echo "Товар '{$product}' добавлен на сайт".'<br>';
    }
    
    public function removeProduct($product) {
        echo "Товар '{$product}' удален с сайта".'<br>';
    }
    
    public function processOrder($orderNum) {
        echo "Заказ номер {$orderNum} обработан".'<br>';
    }
}

$admin = new Admin('Big Boss', 'Alex', '$$$$', 'dollar@bill.com');
var_dump($admin);
$admin->logIn();
$admin->addProduct('Молоко');
$admin->removeProduct('Пиво');
$admin->processOrder(404);
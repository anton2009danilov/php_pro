<?php
namespace App\controllers;
use App\models\User;

class UserController extends Controller
{
    public function getClass() {
        return new User();
    }
    
    public function getView() {
        return 'users';
    }
    
    
}


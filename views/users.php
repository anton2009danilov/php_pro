<?php
use App\models\User;

/** @var string $title */
/** @var User[] $users */


echo "<h1>$title</h1>";

foreach ($users as $user) {
    echo "
    <a href='?c=user&a=one&id={$user->id}'>{$user->login}</a><hr>";
}
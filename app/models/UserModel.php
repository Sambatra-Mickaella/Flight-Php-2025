<?php
namespace app\models;
class UserModel {
    public static function getUsers() {
        $produit= [
            [ 'id' => 1, 'name' => 'Bob Jones', 'email' => 'bob@example.com' ],
            [ 'id' => 2, 'name' => 'Bob Smith', 'email' => 'bobSmith@example.com'],
            [ 'id' => 3, 'name' => 'Suzy Johnson', 'email' => 'suzy@example.com'],

            
        ];
        return $produit;
    }

     public static function getUser($id) {
        $users= [
            [ 'id' => 1, 'name' => 'Bob Jones', 'email' => 'bob@example.com' ],
            [ 'id' => 2, 'name' => 'Bob Smith', 'email' => 'bobSmith@example.com'],
            [ 'id' => 3, 'name' => 'Suzy Johnson', 'email' => 'suzy@example.com'],
            
            
        ];
        return $users[$id];
    }
}
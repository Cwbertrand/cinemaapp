<?php

    namespace model;

//La classe est abstraite car on n'instanciera jamais la classe Connect puisqu'on aura seulement besoin 
//d'accéder à la méthode "seConnecter"

    Abstract class Connect{
        const HOST = "localhost";
        const DB = "newcinema";
        const USER = "root";
        const PWD = "";

        public static function Connection(){
            try {
                return new \PDO(
                    "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8".self::USER, self::PWD);
            } catch (\Throwable $e) {
                return $e->getMessage();
            }
        }
    }
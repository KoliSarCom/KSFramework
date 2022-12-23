<?php

class DB
{
    public static function PDO(): PDO
    {
        $host = Settings::Var("DB/Host");
        $db = Settings::Var("DB/Database");
        $user = Settings::Var("DB/User");
        $password = Settings::Var("DB/Password");

        return new PDO("mysql:host={$host};dbname={$db}", $user, $password, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
    }

}

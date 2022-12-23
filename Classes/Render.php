<?php

class Render
{
    public static function Template(string $template, array $data=[]): void
    {
        include "App/Templates/".$template.".php";
    }
}
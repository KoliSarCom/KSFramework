<?php

class Translate
{

    private array $data;
    private string $lang;

    function __construct(string $lang)
    {
        if (!file_exists("Translates/$lang.csv")) {
            $lang = "en";
        }

        $tmp = array_map('str_getcsv', file("Translates/$lang.csv"));
        $this->data = array_combine(array_column($tmp, 0), array_column($tmp, 1));

        $this->lang = $lang;
    }

    public function _t(string $key): string
    {
        return $this->data[$key];
    }

    public function lang():string
    {
        return $this->lang;
    }

}

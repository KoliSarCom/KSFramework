<?php

class App
{

    public static function SetPage(string $page): void {
        $_SESSION["page"] = $page;
    }

    public static function Page(): string {
        return $_SESSION["page"] ?? "";
    }

    public static function GET(string $name): string {
        return $_GET[$name] ?? "";
    }

    public static function POST(string $name): string {
        return $_POST[$name] ?? "";
    }

    public static function PostJson(): array {
        $dataJson = file_get_contents('php://input');
        file_put_contents("logs/webhook-".date("Y-m-d H:i:s").".json",$dataJson);

        if (empty($dataJson)) return [];
        else return json_decode($dataJson,true);
    }

    public static function Log(array|object $data, string $file): void {
        $text = date("Y-m-d H:i:s") . " " . $_SERVER["REMOTE_ADDR"] . " " . json_encode($data,JSON_UNESCAPED_UNICODE) . "\n";
        file_put_contents("Logs/".date("Y-m-d")." ".$file.".log", $text, FILE_APPEND);
    }
}
<?php

class Routes {

    public static function Page(): string {
        return $_GET["page"] ?? "index";
    }

    public static function Route(string $page): array {
        $routes = [
            "index" => [
                "Controller" => "Registration",
                "Method" => "Start"
            ]
        ];

        return $routes[$page] ?? [];
    }

}
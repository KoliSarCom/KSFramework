<?php

class Settings {

    public static function Var(string $variable) {
        $settings = [
            "DB/Host"     => "haos.mysql.tools",
            "DB/Database" => "haos_ribasinvest",
            "DB/User"     => "haos_ribasinvest",
            "DB/Password" => "223#mrDc;S",
            "Servio/Username" => "PowerBI",
            "Servio/Password" => "PBI#Password",
            "Google/API_Key" => "AIzaSyDeu0kxxn5hJs-J163mi7wSOhCVG8NjGuQ",
            "Booking/Username" => "",
            "Booking/Password" => "",
            "Bot/API_Key" => "a63bd948c32738f8b29067e08d55506ea03a0c2b",
            "Bot/BotID" => 68,
            "Bot/AuthorizedGroup" => 77,
            "Bot/SuccessLoginButton" => 1702,
            "Bot/FailLoginButton" => 1704,
        ];

        return $settings[$variable] ?? "";
    }

}


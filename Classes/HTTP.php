<?php

class HTTP
{

    /**
     * @throws Exception
     */
    public static function SendPostJson(string $url, array $data): array
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL,            $url );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($curl, CURLOPT_POST,           1 );
        curl_setopt($curl, CURLOPT_POSTFIELDS,     json_encode($data, JSON_UNESCAPED_UNICODE) );
        curl_setopt($curl, CURLOPT_HTTPHEADER,     ['Content-Type: application/json']);

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($response === false) {
            $error = curl_error($curl);
            curl_close($curl);

            throw new Exception(_j($error));
        } elseif ($http_code === 500 or $http_code === 404) {
            throw new Exception(_j("Error HTTP code $http_code"));
        } else {
            curl_close($curl);

            return json_decode($response, true);
        }
    }

}
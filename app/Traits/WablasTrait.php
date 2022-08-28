<?php
namespace App\Traits;
trait WablasTrait
{
    public static function sendText($data = [])
    {
        $curl = curl_init();
        $token = env('jnMNw1lMH4kBaWE8bavev65sx0AALm7xGz7iPxZifTm0cvQaVOlM6yEANBqPEJ6Y');
        $payload = [
            "data" => $data
        ];
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
                "Content-Type: application/json"
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($curl, CURLOPT_URL,  env('https://jogja.wablas.com') . "/api/v2/send-message");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);
    }
}

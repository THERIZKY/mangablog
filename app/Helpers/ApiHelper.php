<?php

namespace App\Helpers;

class ApiHelper
{
    public static function callApi($url, $method = 'GET', $data = [])
    {
        $client = \Config\Services::curlrequest();

        $options = [
            'headers' => [
                'Content-Type' => 'application/json',
                // tambahkan header lain yang diperlukan
            ],
            'http_errors' => false // untuk menangani kode status yang tidak berhasil
        ];

        if ($method === 'GET') {
            $options['query'] = $data;
        } else {
            $options['json'] = $data;
        }

        $response = $client->request($method, $url, $options);

        if ($response->getStatusCode() === 200) {
            $responseData = json_decode($response->getBody());
            return $responseData;
        } else {
            // Tindakan yang sesuai ketika permintaan tidak berhasil
            return null;
        }
    }
}

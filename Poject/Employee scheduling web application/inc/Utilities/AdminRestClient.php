<?php

// Tong
// ADMIN_API_URL need to be declared in config

class AdminRestClient{

    public static function call($method, $callData = [])
    {
        $requestHeader = ['requesttype' => $method];

        $data = array_merge($requestHeader, $callData);

        $options = [
            'http' => [
                'header' => 'Content-type: application/json',
                'method' => $method,
                'content' => json_encode($data),
            ],
        ];

        $context = stream_context_create($options);

        $result = file_get_contents(ADMIN_API_URL, false, $context);
        // $result = file_get_contents(API_URL, false, $context);

        return json_decode($result);
    }

}

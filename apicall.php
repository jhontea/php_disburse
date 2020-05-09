<?php

class ApiCall
{
    private $basicAuthUsername = BASIC_AUTH_USERNAME;

    public $url;

    public function __construct($url, $method, $formParam){
        $this->url          = $url;
        $this->method       = $method;
        $this->formParam    = $formParam;
    }

    public function call()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL             => $this->url,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_HEADER          => 1,
            CURLOPT_ENCODING        => "",
            CURLOPT_MAXREDIRS       => 10,
            CURLOPT_TIMEOUT         => 30,
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST   => $this->method,
            CURLOPT_POSTFIELDS      => json_encode($this->formParam),
            CURLOPT_HTTPHEADER      => [
                "Content-Type: application/json"
            ],
            CURLOPT_USERPWD         => $this->basicAuthUsername . ":",
        ]);
        
        $response = curl_exec($curl);
        
        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        $headers = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        
        curl_close($curl);
        
        return json_decode($body);
    }

}
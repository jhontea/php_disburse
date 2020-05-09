<?php
class Response
{
    public function __construct() 
    {
    }

    public function response($result) 
    {
        print json_encode($result, JSON_PRETTY_PRINT);
    }
}
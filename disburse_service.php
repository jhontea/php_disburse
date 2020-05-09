<?php

require("apicall.php");

class DisburseService 
{
    public function __construct()
    {
    }

    public function PostDisburseRequest($requestData) 
    {
        $apiCall = new ApiCall("https://nextar.flip.id/disburse", "POST", $requestData);
        return $apiCall->Call();
    }

    public function GetDisburseStatusRequest($transactionID) 
    {
        $apiCall = new ApiCall("https://nextar.flip.id/disburse/".$transactionID, "GET", null);
        return $apiCall->Call();
    }

}
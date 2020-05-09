<?php

class DisburseHandler 
{
    private $service;
    private $resp;

    public function __construct($service, $resp)
    {
        $this->service = $service;
        $this->resp = $resp;
    }

    public function SendDisburse()
    {
        $requestData = [
            "bank_code"       => "303",
            "account_number"  => "12345678",
            "amount"          => 1000,
            "remark"          => "remark"
        ];

        $result = $this->service->PostDisburseRequest($requestData);
        $this->resp->response($result);
    }

    public function GetDisburseStatus($transactionID)
    {
        $result = $this->service->GetDisburseStatusRequest($transactionID);
        $this->resp->response($result);
    }
}
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
            "amount"          => 25000,
            "remark"          => "remark"
        ];

        $result = $this->service->CreateDisburse($requestData);
        $this->resp->response($result);
    }

    public function GetDisburseStatus($transactionID)
    {
        $result = $this->service->UpdateDisburseStatus($transactionID);
        $this->resp->response($result);
    }

    public function CheckTimeExecution($transactionID)
    {
        $result = $this->service->UpdateDisburseStatus($transactionID);
    }

    public function ShowAll()
    {
        $result = $this->service->ShowAll();
        $this->resp->response($result);
    }
}
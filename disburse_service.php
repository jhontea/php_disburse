<?php

require("apicall.php");

class DisburseService 
{
    private $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function ShowAll() 
    {
        return $this->repository->GetAll();
    }

    public function CreateDisburse($requestData)
    {
        try {
            $result = $this->PostDisburseRequest($requestData);
            if ($result->time_served == "0000-00-00 00:00:00") {
                $result->time_served = null;
            }

            $this->repository->Create([$result->id, $result->amount, $result->status, $result->timestamp, $result->bank_code, $result->account_number, $result->beneficiary_name, $result->remark, $result->receipt, $result->time_served, $result->fee]);
            return $result;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function PostDisburseRequest($requestData) 
    {
        $apiCall = new ApiCall("https://nextar.flip.id/disburse", "POST", $requestData);
        return $apiCall->Call();
    }

    public function UpdateDisburseStatus($transactionID)
    {
        try {
            $result = $this->GetDisburseStatusRequest($transactionID);
            if ($result->time_served == "0000-00-00 00:00:00") {
                $result->time_served = null;
            }

            $this->repository->Update([$result->status, $result->receipt, $result->time_served, $result->id]);
            return $result;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function GetDisburseStatusRequest($transactionID) 
    {
        $apiCall = new ApiCall("https://nextar.flip.id/disburse/".$transactionID, "GET", null);
        return $apiCall->Call();
    }

}
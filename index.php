<?php

include("response.php");
include("disburse_service.php");
include("disburse_handler.php");

const CommandDisburse       = "disburse";
const CommandDisburseStatus = "disburse-status";

$response = new Response();
$disburseService = new DisburseService();
$disburseHandler = new DisburseHandler($disburseService, $response);

if (isset($argc) && $argc > 1) {
    switch ($argv[1]) {
        case CommandDisburse:
            echo "send disburse\n";
            $disburseHandler->SendDisburse();
            break;
        case CommandDisburseStatus:
            if ($argc < 3) {
                echo "Command must be: `disburse-status {transaction_id}`";
                break;
            }

            echo "get disburse status\n";
            $disburseHandler->GetDisburseStatus($argv[2]);
            break;
        default:
            echo "command not found";
    }
} else {
    echo "you must input command\n";
}

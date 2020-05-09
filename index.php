<?php

include("response.php");
include("disburse_repository.php");
include("disburse_service.php");
include("disburse_handler.php");

const CommandAll       = "all";
const CommandDisburse       = "disburse";
const CommandDisburseStatus = "disburse-status";

$response = new Response();
$disburseRepository = new DisburseRepository();
$disburseService = new DisburseService($disburseRepository);
$disburseHandler = new DisburseHandler($disburseService, $response);

if (isset($argc) && $argc > 1) {
    switch ($argv[1]) {
        case CommandAll:
            echo "show all disburse\n";
            $disburseHandler->ShowAll();
            break;
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

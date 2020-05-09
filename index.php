<?php

include("response.php");
include("disburse_repository.php");
include("disburse_service.php");
include("disburse_handler.php");

const CommandAll       = "all";
const CommandDisburse       = "disburse";
const CommandDisburseStatus = "disburse-status";
const CommandTimeExecution = "time";

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
        case CommandTimeExecution:
            if ($argc < 4) {
                echo "Command must be: `time {transaction_id} {n}`";
                break;
            }

            $time_start = microtime(true); 
            for ($i=0; $i<$argv[3]; $i++) {
                $disburseHandler->CheckTimeExecution($argv[2]);
                $data = $i+1;
                echo 'Total execution ' . $data . ' data time: ' . (microtime(true) - $time_start) . "s \n";
            }

            // echo 'Total execution time in seconds: ' . (microtime(true) - $time_start);
            break;
        default:
            echo "command not found";
    }
} else {
    echo "you must input command\n";
}

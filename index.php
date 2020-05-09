<?php

include("response.php");
include("disburse_service.php");

$response = new Response();
$disburseService = new DisburseService();

if (isset($argc)) {
	for ($i = 0; $i < $argc; $i++) {
		echo "Argument #" . $i . " - " . $argv[$i] . "\n";
	}
}
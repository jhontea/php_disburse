# How to use it

`php index.php` + command

# Command
CommandDisburse = command to send disburse
```
php index.php disburse
```

CommandDisburseStatus = command to get and update disburse status
```
php index.php disburse-status {transaction_id}
```

CommandTimeExecution = command to check time execution get and update disburse status
```
php index.php time {transaction_id} {loop}
```

# Time Execution Result
Flow 
1. Hit endpoint get status from url https://nextar.flip.id/disburse/{transaction_id}
2. Update to database

```
Total execution 1 data time: 1.7356090545654s 
Total execution 2 data time: 3.6821150779724s 
Total execution 3 data time: 5.7250499725342s 
Total execution 4 data time: 7.6750409603119s 
Total execution 5 data time: 9.6275489330292s 
Total execution 6 data time: 11.66943693161s 
Total execution 7 data time: 13.711796998978s 
Total execution 8 data time: 15.662449121475s 
Total execution 9 data time: 17.706026077271s 
Total execution 10 data time: 19.664577960968s 
```
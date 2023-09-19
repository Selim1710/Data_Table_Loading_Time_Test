<h3 align="center"> Data table and laravel pagination table loading time test and sending data from one server to another</h3>

## Documentation:
* Problem-1: Check data table and laravel pagination table loading time.
* Problem-2: When any user do login, sent date,time,user_info of that user into another server.

# Solution-1:
    $startTime = microtime(true);
    // here is the table
    $endTime = microtime(true);
    $executionTime = $endTime - $startTime;

# Solution-2:
* Install guzzle_package: composer require guzzlehttp/guzzle
* Then go to UserController >> 

## Data table:

![1](https://github.com/Selim1710/Data_Table_Loading_Time_Test/assets/93088169/315a9c2f-ece1-4c7d-a3a2-fef77838ba60)



## Paginate Table:

![2](https://github.com/Selim1710/Data_Table_Loading_Time_Test/assets/93088169/637221ae-1a5c-4034-a12d-0fa0dcee1a70)


## User Log:
![user log](https://github.com/Selim1710/Data_Table_Loading_Time_Test_-_Sending-_data_one_server_to_another/assets/93088169/fd8d9994-9d13-46c6-8e0b-ca322b5891ad)

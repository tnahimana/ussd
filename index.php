<?php

// Read the variables sent via POST from AT gateway
$sessionId = $_POST['sessionId'];
$serviceCode = $_POST['serviceCode'];
$phoneNumber = $_POST['phoneNumber'];
$text = $_POST['text'];

if($text == ""){
    // This is the first request> Note how we start the response CON
    $response = 'CON What would you like to check \n';
    $response .= '1. My Account No \n';
    $response .= '2. My Phone Number';
}elseif($text == '1'){
    // Business logic for the first level response
    $response = 'CON Choose Account Information you want to view \n';
    $response = '1. Account Number \n';
    $response = '2. Account Balance';
}elseif($text == '2'){
    // Business logic for the first level response
    // This the terminal request> Not how we start with END
    $response = 'END Your phone number is ' . $phoneNumber;
}elseif($text =='1*1'){
    // This is a second level response where user selected 1 in the first instance
    $accountNumber = 'ACC1001';

    // This is the terminal request> Note how we start with End
    $response = 'END Your account number is ' . $accountNumber;

}elseif($text == '1*2'){
    // This is a second level response where user selected 1 in the first instance
    $balance = 'Rwf 10,000';

    // This is the terminal request> Note how we start with End
    $response = 'END Your Balance is ' . $balance;
}
// Echo the response to the API, The response depends on the statement that is fulfilled in each instance
header('Content-type; text/plain');
echo $response;
?>
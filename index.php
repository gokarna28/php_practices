<?php

// global variable
$x=10;
function test(){
    //we cannot access the global vaiable within a funcation
   // echo $x;
}
test();
echo $x;

//local variables
function mytest(){
    $x=5;
    echo $x;
}
mytest();
//echo $x; we cannot access the $x=5; outside the function
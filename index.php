<?php

// global variable
$x=10;
function test(){
    //we cannot access the global vaiable within a funcation
   // echo $x;
}
test();
echo $x;
<?php

// global variable
$x = 10;
function test()
{
    //we cannot access the global vaiable within a funcation
    // echo $x;
}
test();
echo $x;

//local variables
function mytest()
{
    $x = 5;
    echo $x;
}
mytest();
//echo $x; we cannot access the $x=5; outside the function

//global keyword
$a = 3;
$b = 4;
function Text()
{
    global $a, $b;

    $a = $a + $b;
}
Text();
echo $a . "<br>";

//$GLOBALS[index]
$p = 23;
$q = 34;
function lobal()
{
    $GLOBALS['r'] = $GLOBALS['p'] + $GLOBALS['q'];
}
lobal();
echo $r;
echo "<br>";

//static keyword
function num()
{
    static $d = 0;
    echo $d;
    $d++;
}
num();
echo "<br>";
num();
echo "<br>";
num();
echo "<br>";
num();
echo "<br>";

$text = 'hello World!';
echo str_replace('World', 'Gokarna', $text);
$tt = explode(" ", $text);
print_r($tt);


//slice string
echo substr($text, 3, strlen($text));
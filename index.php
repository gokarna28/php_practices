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


echo "<br> <br>";

//find the greater number 
function greater($n)
{
    $g = $n > 30 ? "graeater than 30" : ($n > 20 ? "greater than 20" :
        ($n > 10 ? "greater than 10"
            : "Input the numbner least greater than 10!"));

    echo $n . ":" . $g . "\n";
}
greater(32);
greater(21);
greater(11);


//get full url
// Constructing the full URL using $_SERVER variables
$full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Display the constructed full URL
echo $full_url . "\n";


// Get and echo the current script owner
echo 'Current script owner: ' . get_current_user() . "\n";


//word into number
function word_digit($word)
{
    $wrr = explode(";", $word);

    $result = "";

    foreach ($wrr as $value) {
        switch (trim($value)) {
            case 'zero':
                $result .= '0';
                break;
            case 'one':
                $result .= '1';
                break;
            case 'two':
                $result .= '2';
                break;
            case 'three':
                $result .= '3';
                break;
            case 'four':
                $result .= '4';
                break;
            case 'five':
                $result .= '5';
                break;
            case 'six':
                $result .= '6';
                break;
            case 'seven':
                $result .= '7';
                break;
            case 'eight':
                $result .= '8';
                break;
            case 'nine':
                $result .= '9';
                break;
        }
    }
    return $result;
}
echo word_digit("zero;one;two;three");

//Email validaion
function emailValidation($email)
{
    $result = $email;
    if (filter_var($result, FILTER_VALIDATE_EMAIL)) {
        echo "Valid email Address";

    } else {
        echo 'Invalid Email address';

    }
}
emailValidation("gokarnachy28@gmail.com");
emailValidation("gokarnachy28#gmail.com");

echo "<br> <br>";

//two dimensional array
$data = array(
    array("Ram", "Baneshwor", 23),
    array("Shyam", "Koteshwor", 22),
    array("Himachal", "Goldhunga", 21),
    array("Bishesh", "Thankot", 34),
);

foreach ($data as $person) {
    echo $person[0] . ": Address: " . $person[1] . ", Age: " . $person[2] . "<br>";
}


//identity matrix
function Identity($num)
{
    for ($row = 0; $row < $num; $row++) {
        for ($col = 0; $col < $num; $col++) {
            if ($row == $col) {
                echo 1, " ";
            } else {
                echo 0, " ";
            }
        }
        echo "<br>";
    }
    return 0;
}

Identity(3);

// check if the given matrix is identity matrix or not
function isIdentity($mat, $n)
{
    for ($row = 0; $row < $n; $row++) {
        for ($col = 0; $col < $n; $col++) {
            if (
                $row == $col and
                $mat[$row][$col] != 1
            ) {
                return false;
            } elseif ($row !== $col && $mat[$row][$col] != 0) {
                return false;
            }
        }
    }
    return true;
}

$mat = array(
    array(1, 0, 0),
    array(0, 1, 0),
    array(0, 0, 1),
);
$n = 3;
if (isIdentity($mat, $n)) {
    echo "yes";
} else {
    echo "NO";
}

echo "<br>";
// Step 1: Create the multidimensional array
$students = [
    "Gokarna" => [
        "Operating System" => 85,
        "Scripting Language" => 78,
        "Numerical Method" => 92,
        "DBMS" => 88,
        "Software Engineering" => 90
    ],
    "Rohan" => [
        "Operating System" => 75,
        "Scripting Language" => 82,
        "Numerical Method" => 89,
        "DBMS" => 85,
        "Software Engineering" => 80
    ],
    "Bishesh" => [
        "Operating System" => 90,
        "Scripting Language" => 85,
        "Numerical Method" => 88,
        "DBMS" => 91,
        "Software Engineering" => 89
    ]
];
// Step 2: Calculate the average marks for each student
$averages = [];

foreach ($students as $student => $subjects) {
    $totalMarks = 0;
    $subjectCount = count($subjects);

    foreach ($subjects as $subject => $marks) {
        $totalMarks += $marks;
    }

    $averageMarks = $totalMarks / $subjectCount;
    $averages[$student] = $averageMarks;
}

// Step 3: Display the average marks for each student
foreach ($averages as $student => $average) {
    echo "Average marks for $student: " . number_format($average, 2) . "<br>";
}

$arr1 = [1, 2, 3, 4, 5];
$arr2 = [...$arr1];
$arr3 = [0, ...$arr2];
$arr4 = [...$arr2, ...$arr3];
foreach ($arr4 as $arr) {
    echo $arr;
}
echo "<br>";
//Display array values within a string 
$color = ['red', 'green', 'white', 'black', 'blue'];

echo "The memory of that scene for me is like a frame of film forever frozen at that moment: the $color[0] carpet, the $color[1] lawn, the $color[2]
 house, the leaden sky. The new president and his first lady. -Richard M. Nixon";
echo "<br>";
//sort array
echo "<ul>";
sort($color);
foreach ($color as $col) {
    echo "<li>$col</li>";
}

echo "</ul>";

//echo the data
$ceu = array(
    "Italy" => "Rome",
    "Luxembourg" => "Luxembourg",
    "Belgium" => "Brussels",
    "Denmark" => "Copenhagen",
    "Finland" => "Helsinki",
    "France" => "Paris",
    "Slovakia" => "Bratislava",
    "Slovenia" => "Ljubljana",
    "Germany" => "Berlin",
    "Greece" => "Athens",
    "Ireland" => "Dublin",
    "Netherlands" => "Amsterdam",
    "Portugal" => "Lisbon",
    "Spain" => "Madrid",
    "Sweden" => "Stockholm",
    "United Kingdom" => "London",
    "Cyprus" => "Nicosia",
    "Lithuania" => "Vilnius",
    "Czech Republic" => "Prague",
    "Estonia" => "Tallin",
    "Hungary" => "Budapest",
    "Latvia" => "Riga",
    "Malta" => "Valetta",
    "Austria" => "Vienna",
    "Poland" => "Warsaw"
);
sort($ceu);
foreach ($ceu as $country => $capital) {
    echo "The capital of $country is $capital";
    echo "<br>";
}
echo "<br>";
//array data 
$student_data = [
    "Rohan" => "Lalitpur",
    "Bishesh" => "Thankot",
    "Sandesh" => "NewBaneshowr",
    "Gagan" => "Santinagar",
    "Aakriti" => "Kupandol",
    "Hemraj" => "Manamaiju Pul",
    "Sohel" => "Kritipur",
];
sort($student_data);
foreach ($student_data as $student => $address) {
    echo "Address of $student is $address";
    echo "<br>";
}
echo "<br>";

$nums = [1, 2, 3, 4, 5];
var_dump($nums);
echo "<br>";
var_dump($student_data);
echo "<br>";

unset($nums[2]);
$nums = array_values($nums);
echo '';
var_dump($nums);
echo "<br>";
echo reset($nums);
echo "<br>";

//json decode
$json = '{"Title": "The Cuckoos Calling",
    "Author": "Robert Galbraith",
    "Detail":{
    "Publisher": "Little Brown"

}
}';

//$j1=json_decode($json);
echo $json;
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


echo "<br>";
$j1 = json_decode($json);

echo $j1->Title;
echo "<br>";
echo $j1->Author;
echo "<br>";
echo $j1->Detail->Publisher;

echo "<br>";

//insert element in array
$arr = [1, 2, 3, 4, 5];

echo "<br>";
//usiong splice to insert the element in the array
array_splice($arr, 3, 1, '$');
foreach ($arr as $ar1) {
    echo $ar1;
}
echo "<br>";



$array = [
    "gokarna" => "23",
    "rohan" => "22",
    "Bishesh" => "21",
    "sandesh" => "24",
    "gagan" => "20",
];

// Sort associative array in ascending order according to value while preserving keys
asort($array);

foreach ($array as $key => $value) {
    echo "Age of $key is $value";
    echo "<br>";
}
echo "<br>";

//sort associative array in ascending order according to key 
ksort($array);
foreach ($array as $key => $value) {
    echo "Age of $key is $value";
    echo "<br>";
}
echo "<br>";

//sort associative array in decendig order according to value
arsort($array);
foreach ($array as $key => $value) {
    echo "Age of $key is $value";
    echo "<br>";
}
echo "<br>";

//sort associative array in decending order accoroding to key
krsort($array);
foreach ($array as $key => $value) {
    echo "Age of $key is $value";
    echo "<br>";
}
echo "<br>";

//average of the given temperature array
$temp = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73];
$sum = 0;
foreach ($temp as $temp_arr) {
    $sum += $temp_arr;
}

$average = $sum / count($temp);
echo "The average of temperature is:" . round($average, 2);
echo "<br>";

//lowest 7 in the array
sort($temp);

for ($i = 0; $i < 7; $i++) {
    echo $temp[$i] . ",";
}
echo "<br>";
//highest 7 in the array
for ($i = count($temp) - 7; $i < count($temp); $i++) {
    echo $temp[$i] . ",";
}
echo "<br>";
$arr1 = ['gokarna', 'bishesh', 'sandesh'];
$arr2 = ['rohan', 'gagan'];
$array = [
    array(1, 2, 3),
    array(4, 5, 6),
];


print_r(array_merge($arr1, $array, $arr2));

echo "<br><br>";
//array all element to uppercase and to lowercase
$color = [
    "A" => "Red",
    "B" => "Green",
    "C" => "Blue",
];

foreach ($color as $key => $value) {
    echo $key . ":" . strtoUpper($value) . "<br>";
}

//to lowercase
foreach ($color as $key => $value) {
    echo $key . ":" . strtolower($value) . "<br>";
}

echo "<br>";

//return the numbers divisible by 4 between 200 and 250
for ($i = 200; $i < 250; $i++) {
    if ($i % 4 == 0) {
        echo $i . ",";
    }
}

echo "<br>";
echo implode(",", range(200, 250, 4));
echo "<br>";

//to find the shortest length of string in array
$student = ["gokarna", "himachal", "bishesh", "rohan", "sandesh"];

$shortest = strlen($student[0]);

for ($i = 0; $i < count($student); $i++) {
    if (strlen($student[$i]) < $shortest) {
        echo "The shortest string in array is " . $student[$i];
    }
    echo "<br>";
    if (strlen($student[$i]) > $shortest) {
        echo "The largest string in array is " . $student[$i];
    }
}
//another way to do the same problem
$new_arr = array_map("strlen", $student);
echo "The shortest string length in the array is" . min($new_arr) . "." . "<br>"
    . "The Longest string length in the array is" . max($new_arr) . ".";
echo "<br>";

//using array_map()
function add($num)
{
    return $num * 2;
}

$array = [1, 2, 3, 4, 5];
$new_array = array_map("add", $array);

print_r($new_array);

echo "<br>";

//generate the random number between 11 and 20
$nums = range(11, 20);
shuffle($nums);
foreach ($nums as $num) {
    echo "," . $num;
}
echo "<br>";

//return the largest key of the string.
$fruits = [
    "apple" => "23",
    "orange" => "20",
    "mango" => "40",
    "watermellon" => "50",
];
echo max(array_keys($fruits)) . "<br>";
echo min(array_keys($fruits)) . "<br>";


//return the lowest integer that is not zero
$numbers = [-50, -1, 0, 1, 2, 3, -100, 4];

echo min($numbers);

echo "<br>";
//
$Array = [
    "Students" => ['gokarna', 'bishesh', 'rohan'],
    "Position" => ['First', 'second', 'Third', 'Fourth'],
];

echo $Array['Students'][2];
echo $Array['Position'][2];
echo "<br>";
//echo all the data of array
foreach ($Array as $arr => $subArray) {
    echo $arr . ":";
    foreach ($subArray as $sub) {
        echo $sub . ":";
    }
}
echo "<br>";

//sorting element of an array using user define sort
function sortDefine($a, $b)
{
    global $order;

    foreach ($order as $key => $value) {
        if ($a == $value) {
            return 0;
            //break;
        }
        if ($b == $value) {
            return 1;
            //break;
        }
    }
}

$order[0] = 1;
$order[1] = 3;
$order[2] = 4;
$order[3] = 2;

$array[0] = 2;
$array[1] = 1;
$array[2] = 3;
$array[3] = 4;
$array[4] = 2;
$array[5] = 1;
$array[6] = 2;

usort($array, "sortDefine");

print_r($array);

///sort the ip address
function sort_subnets($x, $y)
{
    echo '<pre>';

    // var_dump($y);

    // Split IP subnets into arrays of octets
    $x_arr = explode('.', $x);
    $y_arr = explode('.', $y);

    // Iterate through each octet and compare values
    foreach (range(0, 3) as $i) {

        // If the current octet in $x is less than the current octet in $y, return -1 (indicating $x comes first)
        if ($x_arr[$i] < $y_arr[$i]) {
            return -1;
        }
        // If the current octet in $x is greater than the current octet in $y, return 1 (indicating $y comes first)
        elseif ($x_arr[$i] > $y_arr[$i]) {
            return 1;
        }
    }

    // If all octets are equal, return -1 (indicating $x comes first)
    return -1;
}

// Define an array of IP subnets
$subnet_list = array(
    '192.169.12',
    '192.167.11',
    '192.169.14',
    '192.168.13',
    '192.167.12',
    '122.169.15',
    '192.167.16'
);

// Use 'usort' function to sort the array of IP subnets using the 'sort_subnets' custom sorting function
usort($subnet_list, 'sort_subnets');


// Print the sorted array of IP subnets
print_r($subnet_list);


// $num="3";
// var_dump($num);
// var_dump(intval($num));
// var_dump(floatval($num));

//usort
$array = [
    ["name" => 'sachin', "age" => 23],
    ["name" => "Ramesh", "age" => 22],
    ["name" => "Nikesh", "age" => 25],
];

usort($array, function ($a, $b) {
    // if ($a['age'] == $b['age']) {
    //     return 0;
    // }
    // return ($a['age'] < $b['age']) ? -1 : 1;

    //we can use the spaceship operator to do the same thing
    return $a['age'] <=> $b['age'];

});
//var_dump($array);
foreach ($array as $arr) {
    echo $arr['name'] . ": " . $arr['age'] . "<br>";
}

$multi = [
    ["id" => "2025731470", "name" => "sana"],
    ["id" => "2025731450", "name" => "Illiya"],
    ["id" => "1025731456", "name" => "Robin"],
    ["id" => "1025731460", "name" => "Samantha"],
];

usort($multi, function ($a, $b) {
    return $a['id'] <=> $b['id'];
});
foreach ($multi as $mul) {
    echo $mul['id'] . ": " . $mul['name'] . "<br>";
}



// Sort a multi-dimensional array set by a specific key
$my_array = [
    [
        'name' => 'Sana',
        'email' => 'sana@example.com',
        'phone' => '111-111-1234',
        'country' => 'USA'
    ],
    [
        'name' => 'Robin',
        'email' => 'robin@example.com',
        'phone' => '222-222-1235',
        'country' => 'UK'
    ],
    [
        'name' => 'Anjali',
        'email' => 'sofia@example.com',
        'phone' => '333-333-1236',
        'country' => 'India'
    ]
];

usort($my_array, function ($a, $b) {
    return $a['name'] <=> $b['name'];
});

foreach ($my_array as $array) {
    echo "Name: " . $array['name'] . " Email: " . $array['email'] . " Phone: " . $array['phone'] . " Country: " . $array['country'] . "<br>";
}

$num_array = [6, 2, 3, 4, 5];

sort($num_array, SORT_NATURAL | SORT_FLAG_CASE);//regular expressions
foreach ($num_array as $num_a) {
    echo $num_a;
}
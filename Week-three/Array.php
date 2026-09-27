<?php

// Creating array using array() function
$fruits = array ("Apple", "Orange", "Banana");

print_r($fruits);
echo "<br>";
echo $fruits[0] . " " .  $fruits[1] . " " . $fruits[2];
echo "<br>";
var_dump($fruits);

echo "<br>";

// Creating array manual indexing
$cities[0] = "Mogadishu";
$cities[1] = "Hargeisa";
$cities[2] = "Kismayo";
$cities[5] = "Bosaso";

print_r($cities);

echo "<br>";
echo "Index of 5: ", $cities[5];

echo "<br>";

// Creating array without explicit location 
$cars[] = 'Mecedes Benz';
$cars[] = 'Hilux';
$cars[] = 'BMW';
$cars[] = 'Toyoto';
$cars[] = 'Nissan';
var_dump($cars);

echo "<br>";

// Array with different type of values
$student_info = array (
    "101",
    "Mohamed Abdi Ali",
    20,
    "single",
    161.5
);

var_dump($student_info);
print_r($student_info);

echo "<br>";
echo "<br>";

// Printing Array using For Loop
for ($i = 0; $i < count($fruits); $i++) {
    echo "$fruits[$i], ";
}

echo "<br>";

// Printing Array using Foreach Loop
foreach ($cars as $car) {
    echo "$car, ";
}

echo "<br>";

foreach ($student_info as $value) {
    echo "$value <br>";
}

echo "<br>";

// Calculating sum of Array elements
$numbers = array (26, 11, 13, -4, 14, 17, 5 , 52, 7, 9,  21,  32, 2, 4, 5);

$total = 0;
foreach ($numbers as $n) {
    $total += $n;
}

echo "The Total numbers is ", $total;

echo "<br>";

// Creating Arrays by adding the two arrays
$array1 = array (1, 2, 3, 4, 5);
$array2 = array (6, 7, 8, 9, 10);

for ($i = 0; $i < count($array1); $i++)
	$array3[$i] = $array1[$i] + $array2[$i];

//printing the new array
echo "Array elements are:<br>";
foreach ($array3 as $item)
	echo ("$item, ");

echo "<br>";
echo "<br>";

// Associative Array

$student_info = array (
    "id" => 101,
    "name" => "Mohamed Abdi Ali",
    "age" => 20,
    "address" => "Hodan District",
    "status" => "single",
    "weight" => 161.5
);


print_r ($student_info);

echo "<br>";
foreach ($student_info as $value) {
    echo "$value, ";
}

echo "<br>";

foreach($student_info as $key => $value) {
    echo "$key : $value <br>";
}

?>
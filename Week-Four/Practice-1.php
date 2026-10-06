<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

function WelcomeMsg($name) {
    echo "Hi $name, Welcome to the Faculty of Computer and IT";
}

WelcomeMsg("Mohamed");
echo "<br>";
WelcomeMsg("Abdi");
echo "<br>";

function factorial($n) {
    $result = 1;

    for ($i = 1; $i <= $n; $i++)
        $result *= $i;
    
    echo "The Factorial of $n = ", $result;
}

factorial(5);
echo "<br>";
$a = 6;
factorial($a);

function factorialNumber($n) {
    $result = 1;

    for ($i = 1; $i <= $n; $i++)
        $result *= $i;
    
    return $result;
}

echo "<br>";
echo "The Factorial of 4 = ", factorialNumber(4);

$array1 = array(9,3,4,7,8,5);

function PassArray($arr) {
    echo "The Passed Array: ";

    for ($i = 0; $i < count($arr); $i++) {
        echo "$arr[$i], ";
        $arr[$i]++;
    }

    return $arr;
}

echo "<br>";
$a = PassArray($array1);

echo "<br>";
echo "The Returned Array: ";
foreach($a as $v)
    echo "$v, ";

// By Value and By Reference

echo "<br>";
$n = 5;

function byvalue($a) {
    echo "The Passed Value: " . $a . "<br>";
    $a++;
    echo "The Current Value: " . $a . "<br>";
}

byvalue($n);
echo "The Value of N: " . $n . "<br>";

function byreference(&$a) {
    echo "The Passed Value: " . $a . "<br>";
    $a++;
    echo "The Current Value: " . $a . "<br>";
}

byreference($n);
echo "The Value of N: " . $n . "<br>";

function sum($x = 3, $y = 5) {
    $total = $x + $y;
    echo "The Total Value of two numbers: " . $total . "<br>";
}

sum(4, 6);
sum(7);
sum();

echo "<br>";
echo "<br>";
$name = "Abdi";
$age = 20;

function test() {

    $address = "Hodan";
    global $name;

    echo "The Value of Local Variable(address) = " . $address . "<br>";
    echo "The Value of Global Variable(name) = " . $name . "<br>";
    echo "The Value of Global Variable(age) = " . $GLOBALS["age"] . "<br>";

}

test();

// echo "The Value of Local Variable(address) = " . $address . "<br>";

echo "The Value of Global Variable(name) = " . $name . "<br>";
echo "The Value of Global Variable(name) = " . $GLOBALS["name"] . "<br>";


function counter() {
    static $counter = 1;
    echo "The Current Value of Counter: " . $counter . "<br>";
    $counter++;
}

echo "<br>";
counter();
counter();
counter();
counter();

?>
</body>
</html>
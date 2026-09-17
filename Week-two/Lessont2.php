<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<?php

 // creating array - numeric array

 // first way to create array

 $names = array ();

 // second way to initialize array
 $names [0] = "CA233 is the best class";
 $names [1] = 123;
 $names [] = 12.34;

 echo $names [0] . "<br>";
 echo $names [1] . "<br>";
 echo $names [2] . "<br>";


 // display 
 var_dump($names);


 // display all the values using pre tag

 echo "<pre>";
 print_r($names);
 echo "</pre>";


 echo "<br>";

 echo "<pre>";
 var_dump($names);
 echo "</pre>";

 // using for loop

  echo "<h3> For loop </h3> <br>";



    for ($i = 0; $i < count ($names); $i++){
        echo $names[$i] . "<br>";
    };

    // another way using index 

    for ($i = 0; $i <count ($names); $i++ ){
        echo "Index: " . $i . "| Value:" . $names[$i] . "<br>";
    }
        


    // Associative arrays
    echo "<h3> Associative arrays </h3> <br>";

    $info = array (
        "id" => "101",
        "name"=> "muad ahmed hassan",
        "age"=> 20,
        "address"=> "dharkynly",
        "status" => "single",
        "weight"=> 170.9

    );

    echo "<pre>";
    echo "information about the person: <br>";
    print_r($info);
    var_dump($info);
    echo "</pre>";

    // using for loop
    echo "<h3> Using for loop </h3> <br>";
    $keys = array_keys($info);

    for ($i = 0; $i < count ($keys); $i++){
        $key = $keys[$i];
        echo $key . ": " . $info[$key] . "<br>";

    }





?>

</body>
</html>
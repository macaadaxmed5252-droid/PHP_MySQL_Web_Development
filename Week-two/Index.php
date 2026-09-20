<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
  <?php 

  define ("age", 123);
  echo age;

   // Line break HTML tag
    echo "<br>";

  $Age= 20;
  if ($Age >= 18)
    echo "Adult ";
  else
  echo "Child";

   // Line break HTML tag
    echo "<br>";

    // switch example 

    $Marks = 100;
    switch ($Marks) {
      case 100:
        echo "A+";
        break;
      case 90:
        echo "A";
        break;
      case 80:
        echo "B";
        break;
      case 70:
        echo "C";
        break;
      case 60:
        echo "D";
        break;
      default:
        echo "Fail";
    }

    // line break HTML tag
    echo "<br>";

    // the ? operator example
    $Age = 20;
    echo ($Age >= 18) ? "Adult" : "Child";

    // line break HTML tag
    echo "<br>";

    // if else example
    $fuel = 5;
    if ($fuel < 10) {
      echo "Fill tank now";
    } else {
      echo "There's enough fuel";
    } 

    // line break HTML tag
    echo "<br>";

    // while loop example 
    echo "<h3>While Loop</h3> <br>";
    $counter = 1;
    while ($counter <= 5) {
      echo $counter . "<br>";
      $counter++;
    }

    // line break HTML tag
    echo "<br>";

    // Do while loop example  
    echo "<h3> Do while loop </h3> <br>";

    $count = 1;
    do {
      echo $count . "<br>";
      $count++;
    } while ($count <= 5);

    // For loop example 
    echo "<h3> For loop </h3> <br>";

    for ($i = 1; $i <= 12; ++$i) {
      echo $i . "<br>";
    }
  
    // this is a for loop that calculates the square of numbers from 1 to 10

    for ($i = 1; $i <= 10; $i++) {
      echo "the square of $i is: "  . $i * $i . "<br>";
    }

    // nasted loop 
    for ($i = 1; $i <= 3; $i++) //
    
    // line break HTML tag
    echo "<br>";

    echo "<h3> Nested Loop Assigment </h3> <br>";

    // Assigment Nested Loop

    for ($row = 1; $row <= 5; $row++) {
    
    for ($column = 1; $column <= 5; $column++) {        
        $result = $row * $column;
        echo "Row is $row, Column is $column, Result is $result<br>";
    }
} 
  ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basics</title>
</head>

<body>

    <?php

    // SECTION 1: 

    // Output heading with echo
    echo "<h1> Welcome to home php file </h1>";

    // Output heading with print
    print "<h1> we are trying new </h1>";

    // Output using echo with parentheses
    echo ("<h3> new modern </h3>");

    // Output multiple strings with echo
    echo "muad", "Ahmed";

    // ERROR: print cannot take multiple arguments
    // print "CA233", "7";

    // ERROR: echo with parentheses cannot take multiple arguments
    // echo("(muad", "Ahmed");

    // Create a variable
    $Fullname = "yahe ali";

    // Output variable inside a string
    echo "my name is $Fullname";


    



    // SECTION 2: 

    // Create a string variable
    $my_str = 'Welcome to PHP Republic';

    // Count string length (characters)
    echo strlen($my_str);

    // Line break HTML tag
    echo "<br>";

    // Count number of words in string
    echo str_word_count($my_str);

    // Practice string variable
    $my_practice_str = 'Hello Jamhuuriya University Students';

    // Output total characters
    echo "Total characters: " . strlen($my_practice_str);

    // Line break HTML tag
    echo "<br>";

    // Output total words
    echo "Total words: " . str_word_count($my_practice_str);
    ?>

</body>

</html>
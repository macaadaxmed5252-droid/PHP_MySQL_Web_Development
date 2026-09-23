<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Arrays & Data Structures</title>
</head>
<body>

<?php
    // ==========================================
    // 1. NUMERIC / INDEXED ARRAYS
    // ==========================================

    // Explicit array declaration
    $names = array();

    // Element initialization with mixed types
    $names[0] = "CA233 is the best class";
    $names[1] = 123;
    $names[]  = 12.34; // Auto-indexed position [2]

    // Direct Element Access Output
    echo $names[0] . "<br>";
    echo $names[1] . "<br>";
    echo $names[2] . "<br><br>";

    // Array Debugging Strategies
    var_dump($names);
    echo "<br><br>";

    // Structured Array Output using HTML <pre>
    echo "<pre>";
    print_r($names);
    echo "</pre>";

    echo "<pre>";
    var_dump($names);
    echo "</pre>";

    // Iterating Indexed Array via standard 'for' loop
    echo "<h3>Indexed Array Iteration (Standard)</h3>";
    for ($i = 0; $i < count($names); $i++) {
        echo $names[$i] . "<br>";
    }

    // Iterating Indexed Array with explicit index tracking
    echo "<h3>Indexed Array Iteration (With Index Label)</h3>";
    for ($i = 0; $i < count($names); $i++) {
        echo "Index: " . $i . " | Value: " . $names[$i] . "<br>";
    }

    // ==========================================
    // 2. ASSOCIATIVE ARRAYS
    // ==========================================
    echo "<h3>Associative Array Definition</h3>";

    $info = array(
        "id"      => "101",
        "name"    => "muad ahmed hassan",
        "age"     => 20,
        "address" => "dharkynly",
        "status"  => "single",
        "weight"  => 170.9
    );

    // Formatted Associative Output
    echo "<pre>";
    echo "Information about the person:<br>";
    print_r($info);
    var_dump($info);
    echo "</pre>";

    // Iterating Associative Array via array_keys() & for loop
    echo "<h3>Associative Array Iteration (array_keys)</h3>";
    $keys = array_keys($info);

    for ($i = 0; $i < count($keys); $i++) {
        $key = $keys[$i];
        echo $key . ": " . $info[$key] . "<br>";
    }
?>

</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Assignment 1</title>
</head>

<body>

    <div style="margin: 20px;">

        <h1>PHP Assignment 1</h1>

        <?php
        // ---------------------------------------------------------
        // Question 1: Find Greatest and Smallest among 3 numbers
        // ---------------------------------------------------------
        echo "<h3>1. Greatest and Smallest of Three Numbers</h3>";
        $n1 = 45;
        $n2 = 12;
        $n3 = 89;

        if ($n1 >= $n2 && $n1 >= $n3) {
            $max = $n1;
        } elseif ($n2 >= $n1 && $n2 >= $n3) {
            $max = $n2;
        } else {
            $max = $n3;
        }

        if ($n1 <= $n2 && $n1 <= $n3) {
            $min = $n1;
        } elseif ($n2 <= $n1 && $n2 <= $n3) {
            $min = $n2;
        } else {
            $min = $n3;
        }

        echo "Numbers: $n1, $n2, $n3<br>";
        echo "Greatest: $max<br>";
        echo "Smallest: $min";
        echo "<hr>";

        // ---------------------------------------------------------
        // Question 2: Divisibility Test (3 and 5)
        // ---------------------------------------------------------
        echo "<h3>2. Divisibility Test (3 and 5)</h3>";
        $num = 15;

        echo "Number: $num<br>";
        if ($num % 3 == 0 && $num % 5 == 0) {
            echo "Result: Divisible by both 3 and 5";
        } elseif ($num % 3 == 0) {
            echo "Result: Divisible by 3";
        } elseif ($num % 5 == 0) {
            echo "Result: Divisible by 5";
        } else {
            echo "Result: None of them";
        }
        echo "<hr>";

        // ---------------------------------------------------------
        // Question 3: Odd & Even Numbers
        // ---------------------------------------------------------
        echo "<h3>3. Odd Numbers (2 to 20) & Even Numbers (35 down to 7)</h3>";
        echo "Odd numbers from 2 to 20:<br>";
        for ($i = 2; $i <= 20; $i++) {
            if ($i % 2 != 0) {
                echo $i . " ";
            }
        }

        echo "<br><br>Even numbers from 35 down to 7:<br>";
        for ($i = 35; $i >= 7; $i--) {
            if ($i % 2 == 0) {
                echo $i . " ";
            }
        }
        echo "<hr>";

        // ---------------------------------------------------------
        // Question 4: Divisible by 2 and 5 (50 down to 2)
        // ---------------------------------------------------------
        echo "<h3>4. Numbers Divisible by 2 and 5 (50 to 2)</h3>";
        echo "Numbers: ";
        for ($i = 50; $i >= 2; $i--) {
            if ($i % 2 == 0 && $i % 5 == 0) {
                echo $i . " ";
            }
        }
        echo "<hr>";

        // ---------------------------------------------------------
        // Question 5: Reverse a Number (without strrev)
        // ---------------------------------------------------------
        echo "<h3>5. Reverse a Number</h3>";
        $orig = 12345;
        $temp = $orig;
        $rev = 0;

        while ($temp > 0) {
            $rem = $temp % 10;
            $rev = ($rev * 10) + $rem;
            $temp = (int)($temp / 10);
        }

        echo "Original: $orig<br>";
        echo "Reversed: $rev";
        echo "<hr>";

        // ---------------------------------------------------------
        // Question 6: LCM of two numbers
        // ---------------------------------------------------------
        echo "<h3>6. Lowest Common Multiple (LCM)</h3>";
        $a = 8;
        $b = 12;

        $x = $a;
        $y = $b;
        while ($y != 0) {
            $t = $y;
            $y = $x % $y;
            $x = $t;
        }
        $hcf = $x;
        $lcm = ($a * $b) / $hcf;

        echo "Numbers: $a and $b<br>";
        echo "LCM: $lcm";
        echo "<hr>";

        // ---------------------------------------------------------
        // Question 7: HCF of two numbers
        // ---------------------------------------------------------
        echo "<h3>7. Highest Common Factor (HCF)</h3>";
        $val1 = 18;
        $val2 = 24;

        $x = $val1;
        $y = $val2;

        while ($y != 0) {
            $r = $x % $y;
            $x = $y;
            $y = $r;
        }

        echo "Numbers: $val1 and $val2<br>";
        echo "HCF: $x";
        echo "<hr>";

        // =========================================================================
        // QUESTION 8: Formatted Multiplication Table (Up to 12x12)
        // =========================================================================
        echo "<h3>8. Multiplication Table (12 x 12)</h3>";
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        for ($r = 1; $r <= 12; $r++) {
            echo "<tr>";
            for ($c = 1; $c <= 12; $c++) {
                echo "<td align='center'>" . ($r * $c) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<hr>";

        // ---------------------------------------------------------
        // Question 9: Check Prime Number
        // ---------------------------------------------------------
        echo "<h3>9. Prime Number Check</h3>";
        $check = 29;
        $isPrime = true;

        if ($check <= 1) {
            $isPrime = false;
        } else {
            for ($i = 2; $i <= $check / 2; $i++) {
                if ($check % $i == 0) {
                    $isPrime = false;
                    break;
                }
            }
        }

        echo "Number: $check<br>";
        if ($isPrime) {
            echo "Result: Prime Number";
        } else {
            echo "Result: Non-Prime Number";
        }
        echo "<hr>";

        // ---------------------------------------------------------
        // Question 10: Prime Numbers Range (10 to 50)
        // ---------------------------------------------------------
        echo "<h3>10. Prime Numbers (10 to 50)</h3>";
        echo "Primes: ";
        for ($n = 10; $n <= 50; $n++) {
            $isP = true;
            for ($i = 2; $i <= $n / 2; $i++) {
                if ($n % $i == 0) {
                    $isP = false;
                    break;
                }
            }
            if ($isP) {
                echo $n . " ";
            }
        }

        // 1. Declare 2D Associative Array using array() syntax
        $students = array(
            "CA221" => array(
                "Name"    => "Mohamed Ahmed Ali",
                "Phone"   => "0648440403",
                "Address" => "Laba Dhagax, Wardhiigley"
            ),
            "CA223" => array(
                "Name"    => "Ahmed Abdi Jama",
                "Phone"   => "0647223201",
                "Address" => "Taleex, Hodan"
            ),
            "CA202" => array(
                "Name"    => "Amina Nur Adan",
                "Phone"   => "0646990276",
                "Address" => "Macmacaanka, Dharkeynley"
            )
        );

        // 2. Print HTML Table
        echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse;'>";

        // Render Table Header
        echo "<tr bgcolor='#f2f2f2'>";
        echo "<th>Row Key</th>";
        echo "<th>Name</th>";
        echo "<th>Phone</th>";
        echo "<th>Address</th>";
        echo "</tr>";

        // Outer loop: Iterates through each row (CA221, CA223, CA202)
        foreach ($students as $rowKey => $columns) {
            echo "<tr>";

            // Print outer row key
            echo "<td>" . $rowKey . "</td>";

            // Inner loop: Iterates through every associative column ("Name", "Phone", "Address")
            foreach ($columns as $columnName => $value) {
                echo "<td>" . $value . "</td>";
            }

            echo "</tr>";
        }

        echo "</table>";

        echo $students ["CA202"]["Address"]



        ?>

    </div>

</body>

</html>
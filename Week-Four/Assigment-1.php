<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP & MySQL - Assignment 2 | Mu'ad Ahmed Hassan</title>
    <style>
        :root {
            --primary-color: #003366;
            --secondary-color: #0066cc;
            --accent-color: #f39c12;
            --bg-color: #f4f6f9;
            --card-bg: #ffffff;
            --text-color: #333333;
            --border-color: #e2e8f0;
            --success-color: #27ae60;
            --danger-color: #e74c3c;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
            padding: 30px 15px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* Header & Student Details Card */
        .student-card {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.12);
            margin-bottom: 35px;
        }

        .student-card h1 {
            font-size: 1.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
            border-bottom: 2px solid rgba(255,255,255,0.2);
            padding-bottom: 10px;
        }

        .student-card h2 {
            font-size: 1.2rem;
            font-weight: 400;
            opacity: 0.9;
            margin-bottom: 20px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            background: rgba(255,255,255,0.1);
            padding: 15px;
            border-radius: 8px;
        }

        .info-item {
            font-size: 0.95rem;
        }

        .info-item span {
            font-weight: bold;
            color: #ffd700;
        }

        /* Section Cards */
        .question-card {
            background: var(--card-bg);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            border-left: 5px solid var(--secondary-color);
        }

        .question-title {
            color: var(--primary-color);
            font-size: 1.3rem;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 8px;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid var(--border-color);
        }

        th {
            background-color: var(--primary-color);
            color: #ffffff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        tr:nth-child(even) {
            background-color: #f8fafc;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        .row-header {
            background-color: #e2e8f0;
            font-weight: bold;
            color: var(--primary-color);
            text-align: left;
        }

        /* Results Display */
        .results-box {
            background-color: #f8fafc;
            border: 1px solid var(--border-color);
            padding: 15px 20px;
            border-radius: 8px;
            margin-top: 15px;
        }

        .results-box ul {
            list-style-type: none;
        }

        .results-box li {
            padding: 6px 0;
            border-bottom: 1px dashed var(--border-color);
            font-size: 0.95rem;
        }

        .results-box li:last-child {
            border-bottom: none;
        }

        .badge-pass {
            background-color: var(--success-color);
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-weight: bold;
            font-size: 0.8rem;
        }

        .badge-fail {
            background-color: var(--danger-color);
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-weight: bold;
            font-size: 0.8rem;
        }

        .inline-array {
            font-family: 'Courier New', Courier, monospace;
            background: #edf2f7;
            padding: 6px 12px;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #2d3748;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Header & Student Identification Card -->
    <div class="student-card">
        <h1>Jamhuriya University of Science & Technology</h1>
        <h2>Faculty of Computer & IT — Course: PHP & MySQL</h2>
        <div class="info-grid">
            <div class="info-item">Name: <span>Mu'ad Ahmed Hassan</span></div>
            <div class="info-item">Class: <span>CA232</span></div>
            <div class="info-item">ID: <span>C1230028</span></div>
            <div class="info-item">Due Date: <span>October 06, 2026</span></div>
        </div>
    </div>

    <!-- QUESTION 1 -->
    <div class="question-card">
        <h3 class="question-title">Question 1: 1D Array Operations & Logic</h3>
        <?php
            $numArray = array(5, 7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9);
            
            $totalAll = 0;
            $totalEven = 0;
            $totalOdd = 0;
            
            $minVal = $numArray[0];
            $maxVal = $numArray[0];
            
            foreach ($numArray as $val) {
                $totalAll += $val;
                if ($val % 2 == 0) {
                    $totalEven += $val;
                } else {
                    $totalOdd += $val;
                }
                
                if ($val < $minVal) { $minVal = $val; }
                if ($val > $maxVal) { $maxVal = $val; }
            }

            $minPositions = array();
            $maxPositions = array();
            foreach ($numArray as $index => $val) {
                if ($val == $minVal) { $minPositions[] = $index; }
                if ($val == $maxVal) { $maxPositions[] = $index; }
            }
        ?>

        <p><strong>Initial Array:</strong></p>
        <div class="inline-array">[ <?php echo implode(", ", $numArray); ?> ]</div>

        <div class="results-box">
            <ul>
                <li><strong>2) All Elements:</strong> <?php echo implode(", ", $numArray); ?></li>
                <li><strong>3) Total of all elements:</strong> <?php echo $totalAll; ?></li>
                <li><strong>4) Total of even elements:</strong> <?php echo $totalEven; ?></li>
                <li><strong>5) Total of odd elements:</strong> <?php echo $totalOdd; ?></li>
                <li><strong>6) Minimum element:</strong> <?php echo $minVal; ?> (at position(s): <?php echo implode(", ", $minPositions); ?>)</li>
                <li><strong>7) Maximum element:</strong> <?php echo $maxVal; ?> (at position(s): <?php echo implode(", ", $maxPositions); ?>)</li>
            </ul>
        </div>
    </div>

    <!-- QUESTION 2 -->
    <div class="question-card">
        <h3 class="question-title">Question 2: 2D Associative Color Matrix</h3>
        <?php
            $colorMatrix = array(
                "Light"  => array("Red" => "Light Red",  "Green" => "Light Green",  "Blue" => "Light Blue"),
                "Normal" => array("Red" => "Normal Red", "Green" => "Normal Green", "Blue" => "Normal Blue"),
                "Dark"   => array("Red" => "Dark Red",   "Green" => "Dark Green",   "Blue" => "Dark Blue")
            );
        ?>

        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Red</th>
                    <th>Green</th>
                    <th>Blue</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($colorMatrix as $rowName => $columns): ?>
                    <tr>
                        <td class="row-header"><?php echo $rowName; ?></td>
                        <td><?php echo $columns["Red"]; ?></td>
                        <td><?php echo $columns["Green"]; ?></td>
                        <td><?php echo $columns["Blue"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- QUESTION 3 -->
    <div class="question-card">
        <h3 class="question-title">Question 3: 2D Square Array Analysis</h3>
        <?php
            $squareArray = array(
                array(2, -6, 8),
                array(-6, 1, 6),
                array(7, 8, -6)
            );

            $q3TotalAll = 0;
            $q3TotalOdd = 0;
            $q3TotalEven = 0;

            $rowTotals = array(0, 0, 0);
            $colTotals = array(0, 0, 0);
            
            $diag1Total = 0; // Main Diagonal (0,0 -> 1,1 -> 2,2)
            $diag2Total = 0; // Anti Diagonal (0,2 -> 1,1 -> 2,0)

            $q3Min = $squareArray[0][0];
            $q3Max = $squareArray[0][0];

            for ($r = 0; $r < 3; $r++) {
                for ($c = 0; $c < 3; $c++) {
                    $val = $squareArray[$r][$c];
                    $q3TotalAll += $val;

                    if ($val % 2 != 0) {
                        $q3TotalOdd += $val;
                    } else {
                        $q3TotalEven += $val;
                    }

                    $rowTotals[$r] += $val;
                    $colTotals[$c] += $val;

                    if ($r == $c) { $diag1Total += $val; }
                    if ($r + $c == 2) { $diag2Total += $val; }

                    if ($val < $q3Min) { $q3Min = $val; }
                    if ($val > $q3Max) { $q3Max = $val; }
                }
            }

            $q3MinPos = array();
            $q3MaxPos = array();
            for ($r = 0; $r < 3; $r++) {
                for ($c = 0; $c < 3; $c++) {
                    if ($squareArray[$r][$c] == $q3Min) {
                        $q3MinPos[] = "[$r,$c]";
                    }
                    if ($squareArray[$r][$c] == $q3Max) {
                        $q3MaxPos[] = "[$r,$c]";
                    }
                }
            }
        ?>

        <table>
            <thead>
                <tr>
                    <th>Row / Col</th>
                    <th>Col 0</th>
                    <th>Col 1</th>
                    <th>Col 2</th>
                    <th>Row Total</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($r = 0; $r < 3; $r++): ?>
                    <tr>
                        <td class="row-header">Row <?php echo ($r + 1); ?></td>
                        <?php for ($c = 0; $c < 3; $c++): ?>
                            <td><?php echo $squareArray[$r][$c]; ?></td>
                        <?php endfor; ?>
                        <td><strong><?php echo $rowTotals[$r]; ?></strong></td>
                    </tr>
                <?php endfor; ?>
                <tr style="background-color: #e2e8f0; font-weight: bold;">
                    <td class="row-header">Col Total</td>
                    <td><?php echo $colTotals[0]; ?></td>
                    <td><?php echo $colTotals[1]; ?></td>
                    <td><?php echo $colTotals[2]; ?></td>
                    <td>—</td>
                </tr>
            </tbody>
        </table>

        <div class="results-box">
            <ul>
                <li><strong>Total Odd Elements:</strong> <?php echo $q3TotalOdd; ?></li>
                <li><strong>Total Even Elements:</strong> <?php echo $q3TotalEven; ?></li>
                <li><strong>Total All Elements:</strong> <?php echo $q3TotalAll; ?></li>
                <li><strong>Main Diagonal Total:</strong> <?php echo $diag1Total; ?></li>
                <li><strong>Anti Diagonal Total:</strong> <?php echo $diag2Total; ?></li>
                <li><strong>Minimum Element:</strong> <?php echo $q3Min; ?> in <?php echo count($q3MinPos); ?> position(s): <?php echo implode(", ", $q3MinPos); ?></li>
                <li><strong>Maximum Element:</strong> <?php echo $q3Max; ?> in <?php echo count($q3MaxPos); ?> position(s): <?php echo implode(", ", $q3MaxPos); ?></li>
            </ul>
        </div>
    </div>

    <!-- QUESTION 4 -->
    <div class="question-card">
        <h3 class="question-title">Question 4: 2D Associative Directory</h3>
        <?php
            $directory = array(
                "CA221_1" => array("Name" => "Mohamed Ahmed Ali", "Phone" => "0648440403", "Address" => "Laba Dhagax, Wardhiigley"),
                "CA223"   => array("Name" => "Ahmed Abdi Jama",   "Phone" => "0647223201", "Address" => "Taleex, Hodan"),
                "CA221_2" => array("Name" => "Amina Nur Adan",    "Phone" => "0646990276", "Address" => "Macmacaanka, Dharkeynley")
            );
        ?>

        <table>
            <thead>
                <tr>
                    <th>Class / Code</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="row-header">CA221</td>
                    <td><?php echo $directory["CA221_1"]["Name"]; ?></td>
                    <td><?php echo $directory["CA221_1"]["Phone"]; ?></td>
                    <td><?php echo $directory["CA221_1"]["Address"]; ?></td>
                </tr>
                <tr>
                    <td class="row-header">CA223</td>
                    <td><?php echo $directory["CA223"]["Name"]; ?></td>
                    <td><?php echo $directory["CA223"]["Phone"]; ?></td>
                    <td><?php echo $directory["CA223"]["Address"]; ?></td>
                </tr>
                <tr>
                    <td class="row-header">CA221</td>
                    <td><?php echo $directory["CA221_2"]["Name"]; ?></td>
                    <td><?php echo $directory["CA221_2"]["Phone"]; ?></td>
                    <td><?php echo $directory["CA221_2"]["Address"]; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- QUESTION 5 -->
    <div class="question-card">
        <h3 class="question-title">Question 5: Academic Transcript Matrix</h3>
        <?php
            $transcript = array(
                "Semester 1" => array(
                    array("Course" => "subject1", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 40),
                    array("Course" => "subject2", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 40),
                    array("Course" => "subject3", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 40)
                ),
                "Semester 2" => array(
                    array("Course" => "subject1", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 0),
                    array("Course" => "subject2", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 40),
                    array("Course" => "subject3", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 40)
                )
            );
        ?>

        <table>
            <thead>
                <tr>
                    <th>Semester</th>
                    <th>Course</th>
                    <th>CW1</th>
                    <th>MidTerm</th>
                    <th>CW2</th>
                    <th>Final</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transcript as $semName => $courses): ?>
                    <?php 
                        $rowCount = count($courses); 
                        $first = true;
                    ?>
                    <?php foreach ($courses as $row): ?>
                        <?php 
                            $total = $row["CW1"] + $row["MidTerm"] + $row["CW2"] + $row["Final"];
                            $status = ($total >= 50) ? "Pass" : "Fail";
                            $statusBadge = ($status == "Pass") ? "badge-pass" : "badge-fail";
                        ?>
                        <tr>
                            <?php if ($first): ?>
                                <td rowspan="<?php echo $rowCount; ?>" class="row-header" style="vertical-align: middle; text-align: center;">
                                    <strong><?php echo $semName; ?></strong>
                                </td>
                                <?php $first = false; ?>
                            <?php endif; ?>
                            <td><?php echo $row["Course"]; ?></td>
                            <td><?php echo $row["CW1"]; ?></td>
                            <td><?php echo $row["MidTerm"]; ?></td>
                            <td><?php echo $row["CW2"]; ?></td>
                            <td><?php echo $row["Final"]; ?></td>
                            <td><strong><?php echo $total; ?></strong></td>
                            <td><span class="<?php echo $statusBadge; ?>"><?php echo $status; ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
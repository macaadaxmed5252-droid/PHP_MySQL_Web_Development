# 🐘 PHP Fundamentals & Data Structures — Week 3

<p align="center">
  <img src="https://img.shields.io/badge/PHP-7.4%20%7C%208.x-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP Version" />
  <img src="https://img.shields.io/badge/Course-Web%20Development-2563EB?style=for-the-badge" alt="Course" />
  <img src="https://img.shields.io/badge/Week-03-7C3AED?style=for-the-badge" alt="Week 3" />
  <img src="https://img.shields.io/badge/Status-Completed-16A34A?style=for-the-badge" alt="Status" />
</p>

<p align="center">
  <strong>Fundamentals • Algorithms • Control Flow • Arrays • Data Structures</strong>
</p>

<p align="center">
  A comprehensive Week 3 PHP practice repository focused on programming logic,
  mathematical problem solving, loops, and structured data manipulation.
</p>

---

## 📖 Table of Contents

* [🎯 Project Overview](#-project-overview)
* [✨ Learning Objectives](#-learning-objectives)
* [📂 Project Structure](#-project-structure)
* [🧩 Module 1 — Algorithmic Challenges](#-module-1--algorithmic-challenges)
* [📊 Module 2 — Indexed Arrays](#-module-2--indexed-arrays)
* [🗂️ Module 3 — Associative & Multidimensional Arrays](#️-module-3--associative--multidimensional-arrays)
* [🧠 Core Concepts](#-core-concepts)
* [🛠️ Technologies](#️-technologies)
* [🚀 Getting Started](#-getting-started)
* [▶️ Running the Project](#️-running-the-project)
* [📚 What I Practiced](#-what-i-practiced)
* [👨‍💻 Author](#-author)

---

# 🎯 Project Overview

This repository contains my **Week 3 PHP fundamentals and data structures practice**.

The main goal of this week was to strengthen programming fundamentals by solving practical problems using **native PHP**, without depending on external frameworks or libraries.

The exercises focus on:

* Conditional statements
* `for`, `while`, and `foreach` loops
* Mathematical algorithms
* Number manipulation
* Prime number detection
* HCF / GCD and LCM
* Indexed arrays
* Associative arrays
* Multidimensional arrays
* Nested array traversal
* Basic HTML rendering with PHP

> 💡 **Focus:** Understand the logic behind the solution rather than simply writing code that produces the expected output.

---

# ✨ Learning Objectives

By completing this module, I practiced how to:

* Build programs using `if`, `elseif`, and `else`
* Control repetition using different loop types
* Work with the modulo `%` operator
* Solve mathematical programming problems
* Extract and reverse digits using arithmetic
* Implement the Euclidean algorithm
* Detect prime numbers
* Generate multiplication tables dynamically
* Create and manipulate indexed arrays
* Work with key-value data using associative arrays
* Traverse nested arrays
* Model simple relational/tabular data structures
* Inspect PHP variables using debugging functions

---

# 📂 Project Structure

```text
php-week-3/
│
├── assignment_1.php
│   └── 10 Algorithmic & Control Flow Challenges
│
├── array.php
│   └── Indexed Arrays & Iteration
│
├── assoc_array.php
│   └── Associative & Multidimensional Arrays
│
└── README.md
```

---

# 🧩 Module 1 — Algorithmic Challenges

### 📄 `assignment_1.php`

This module contains **10 programming challenges** designed to strengthen algorithmic thinking, mathematical logic, and control-flow skills.

---

## 1️⃣ Greatest & Smallest Among Three Numbers

**Objective:** Find the largest and smallest values among three numbers.

```text
N1 = 45
N2 = 12
N3 = 89
```

### Concepts

* `if / elseif / else`
* Compound conditions
* Logical operator `&&`
* Comparison operators

The solution determines the maximum and minimum values without relying on PHP's built-in `min()` and `max()` functions.

---

## 2️⃣ Divisibility Test — 3 & 5

**Objective:** Determine whether a number is divisible by:

* 3
* 5
* Both 3 and 5
* Neither

Example:

```text
Number = 15
```

### Key Concept

The modulo operator:

```php
$num % 3
$num % 5
```

Example:

```php
if ($num % 3 == 0 && $num % 5 == 0) {
    echo "Divisible by both";
}
```

---

## 3️⃣ Bounded Odd & Even Iterations

### Odd Numbers

Print odd numbers from:

```text
2 → 20
```

### Even Numbers

Print even numbers from:

```text
35 → 7
```

### Concepts

* `for` loops
* Ascending iteration
* Descending iteration
* `%` modulo operator

Example:

```php
for ($i = 2; $i <= 20; $i++) {
    if ($i % 2 != 0) {
        echo $i;
    }
}
```

---

## 4️⃣ Dual-Factor Filter

**Objective:** Find numbers between:

```text
50 → 2
```

that are divisible by both **2 and 5**.

```php
$i % 2 == 0 && $i % 5 == 0
```

Since numbers divisible by both 2 and 5 are multiples of 10, the output consists of values such as:

```text
50
40
30
20
10
```

---

## 5️⃣ Mathematical Number Reversal

**Objective:**

Reverse:

```text
12345 → 54321
```

without using string functions such as:

```php
strrev()
```

### Algorithm

The program repeatedly:

1. Extracts the last digit.
2. Adds it to the reversed number.
3. Removes the last digit from the original number.

Core operations:

```php
$rem = $temp % 10;

$rev = ($rev * 10) + $rem;

$temp = (int)($temp / 10);
```

### Concepts

* `while` loop
* `%` modulo
* Integer division
* Mathematical digit extraction

---

## 6️⃣ Lowest Common Multiple — LCM

**Objective:** Calculate the LCM of:

```text
8 and 12
```

The algorithm first calculates the HCF/GCD and then applies:

```text
LCM(a, b) = (a × b) / HCF(a, b)
```

Example:

```text
HCF(8,12) = 4

LCM = (8 × 12) / 4

LCM = 24
```

---

## 7️⃣ Highest Common Factor — HCF / GCD

**Objective:** Calculate the HCF of:

```text
18 and 24
```

The implementation uses the **Euclidean Algorithm**.

### Core Logic

```php
while ($y != 0) {
    $r = $x % $y;
    $x = $y;
    $y = $r;
}
```

Result:

```text
HCF = 6
```

---

## 8️⃣ 12 × 12 Multiplication Table

**Objective:** Generate a complete:

```text
12 × 12
```

multiplication table dynamically.

The implementation uses **nested loops**:

```php
for ($r = 1; $r <= 12; $r++) {

    for ($c = 1; $c <= 12; $c++) {

        // multiplication logic

    }
}
```

The result is rendered as an HTML table using:

```html
<table>
<tr>
<td>
```

---

## 9️⃣ Prime Number Verification

**Objective:** Determine whether:

```text
29
```

is a prime number.

A boolean flag is used:

```php
$isPrime = true;
```

The program checks possible divisors and stops early when a divisor is found.

```php
if ($num % $i == 0) {
    $isPrime = false;
    break;
}
```

### Concepts

* Boolean variables
* Nested conditions
* `%`
* `break`
* Loop optimization

---

## 🔟 Prime Number Range — 10 to 50

**Objective:** Find all prime numbers between:

```text
10 → 50
```

The solution uses:

* Outer loop → selects each candidate
* Inner loop → checks whether the candidate is prime

### Concepts

```text
Nested loops
Prime detection
Boolean flags
break
Modulo operator
```

---

# 📊 Module 2 — Indexed Arrays

### 📄 `array.php`

This module focuses on **indexed arrays**, array traversal, debugging, and basic array calculations.

---

## 🧱 Array Declaration

### Standard Syntax

```php
$fruits = array(
    "Apple",
    "Orange",
    "Banana"
);
```

PHP automatically assigns indexes:

```text
0 → Apple
1 → Orange
2 → Banana
```

---

## 🔢 Explicit Index Assignment

```php
$cities[0] = "Mogadishu";
$cities[5] = "Bosaso";
```

Arrays can also be assigned specific indexes manually.

---

## ➕ Dynamic Array Append

```php
$cars[] = "Mercedes Benz";
```

PHP automatically adds the value to the next available index.

---

## 🧩 Mixed Data Types

PHP arrays can contain different data types:

```php
$student_info = array(
    "Mohamed",
    20,
    61.5,
    true
);
```

Possible types include:

```text
String
Integer
Float
Boolean
```

---

# 🔍 Debugging Arrays

## `print_r()`

Useful for quickly viewing an array structure:

```php
print_r($fruits);
```

---

## `var_dump()`

Provides more detailed information, including:

* Data type
* Value
* String length
* Array structure

```php
var_dump($fruits);
```

---

# 🔄 Array Traversal

## Traditional `for` Loop

```php
for ($i = 0; $i < count($fruits); $i++) {
    echo $fruits[$i];
}
```

---

## `foreach` Loop

```php
foreach ($fruits as $fruit) {
    echo $fruit;
}
```

`foreach` is particularly useful when the goal is simply to process each value.

---

# ➕ Array Calculations

The module also demonstrates calculating the total of array elements.

```php
$total = 0;

foreach ($numbers as $number) {
    $total += $number;
}
```

This can work with both positive and negative values.

---

# 🔢 Element-Wise Array Addition

Two arrays can be combined element by element:

```php
$array3[$i] = $array1[$i] + $array2[$i];
```

Example:

```text
Array 1:  10  20  30
Array 2:   1   2   3
           ↓   ↓   ↓
Result:   11  22  33
```

---

# 🗂️ Module 3 — Associative & Multidimensional Arrays

### 📄 `assoc_array.php`

This module introduces more structured data representation using:

* Associative arrays
* 2D arrays
* Nested arrays
* Nested associative arrays

---

# 🔑 Associative Arrays

Associative arrays store information using:

```text
Key → Value
```

Example:

```php
$student_info = array(
    "id"      => 101,
    "name"    => "Mohamed Abdi Ali",
    "age"     => 20,
    "address" => "Hodan District",
    "status"  => "single",
    "weight"  => 61.5
);
```

Instead of:

```php
$student_info[0]
```

we can access values using meaningful keys:

```php
$student_info["name"];
$student_info["address"];
$student_info["age"];
```

---

# 🔄 Key & Value Traversal

Associative arrays can be traversed using:

```php
foreach ($student_info as $key => $value) {
    echo "$key: $value";
}
```

This provides access to both:

```text
Key
Value
```

---

# 🧮 Multidimensional Arrays

A multidimensional array is an array that contains other arrays.

Example:

```php
$students = array(
    array("Ali", 20),
    array("Hassan", 22),
    array("Jamac", 33)
);
```

The structure can be visualized as:

```text
students
│
├── Row 0
│   ├── Ali
│   └── 20
│
├── Row 1
│   ├── Hassan
│   └── 22
│
└── Row 2
    ├── Jamac
    └── 33
```

---

# 📍 Accessing Nested Values

Example:

```php
$students[2][1];
```

This means:

```text
[2] → third row
[1] → second value
```

Result:

```text
33
```

---

# 🔁 Nested `foreach`

Nested arrays can be traversed using nested loops:

```php
foreach ($students as $student) {

    foreach ($student as $value) {
        echo $value;
    }

}
```

This is useful when processing matrix-like or nested data.

---

# 🗃️ Nested Associative Datasets

A powerful structure is an array containing multiple associative arrays.

This can represent simple table-like data:

```php
$students = array(

    array(
        "id" => 101,
        "name" => "Mohamed",
        "age" => 20,
        "status" => "single"
    ),

    array(
        "id" => 103,
        "name" => "Jamac",
        "age" => 33,
        "status" => "married"
    )

);
```

This structure can be visualized as:

```text
students
│
├── Student 1
│   ├── id
│   ├── name
│   ├── age
│   └── status
│
└── Student 2
    ├── id
    ├── name
    ├── age
    └── status
```

Accessing a specific value:

```php
$students[1]["name"];
```

Result:

```text
Jamac
```

---

# 🧠 Core Concepts

| Concept                  | PHP Syntax           | Purpose                               |
| ------------------------ | -------------------- | ------------------------------------- |
| Conditional              | `if / elseif / else` | Decision making                       |
| For Loop                 | `for`                | Repeated execution with a known range |
| While Loop               | `while`              | Repetition while a condition is true  |
| Foreach                  | `foreach`            | Iterating through arrays              |
| Indexed Array            | `$arr = array(...)`  | Ordered list of values                |
| Associative Array        | `"key" => "value"`   | Key-value data                        |
| 2D Array                 | `$arr[row][col]`     | Nested/tabular data                   |
| Nested Associative Array | `$arr[row]["key"]`   | Structured records                    |
| Modulo                   | `%`                  | Remainder / divisibility              |
| Debugging                | `print_r()`          | Inspect array structures              |
| Debugging                | `var_dump()`         | Inspect type and value                |
| Break                    | `break`              | Stop loop execution                   |

---

# 🛠️ Technologies

<p>
  <img src="https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP" />
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white" alt="HTML5" />
  <img src="https://img.shields.io/badge/Git-F05032?style=flat-square&logo=git&logoColor=white" alt="Git" />
  <img src="https://img.shields.io/badge/GitHub-181717?style=flat-square&logo=github&logoColor=white" alt="GitHub" />
</p>

### Requirements

* PHP **7.4+**
* Web browser
* VS Code or another code editor
* Optional: XAMPP, WAMP, or Laragon

No external PHP frameworks or libraries are required.

---

# 🚀 Getting Started

## 1. Clone the Repository

```bash
git clone <your-repository-url>
```

## 2. Navigate to the Project

```bash
cd php-week-3
```

## 3. Verify PHP Installation

```bash
php -v
```

You should see your installed PHP version.

---

# ▶️ Running the Project

There are two simple ways to run the project.

## Option 1 — PHP Built-in Server

From the project directory:

```bash
php -S localhost:8000
```

Then open:

```text
http://localhost:8000
```

You can directly access the individual files:

```text
http://localhost:8000/assignment_1.php
http://localhost:8000/array.php
http://localhost:8000/assoc_array.php
```

---

## Option 2 — XAMPP / WAMP / Laragon

Place the project inside the appropriate web directory.

For XAMPP:

```text
htdocs/
└── php-week-3/
    ├── assignment_1.php
    ├── array.php
    ├── assoc_array.php
    └── README.md
```

Then start the required web server and open the project through your local environment.

---

# 📚 What I Practiced

### Programming Logic

* [x] Conditional statements
* [x] Boolean logic
* [x] Comparison operators
* [x] Modulo operator
* [x] `for` loops
* [x] `while` loops
* [x] `foreach` loops
* [x] Nested loops
* [x] `break`

### Algorithms

* [x] Maximum & minimum
* [x] Divisibility checking
* [x] Number reversal
* [x] HCF / GCD
* [x] LCM
* [x] Prime number verification
* [x] Prime number generation
* [x] Multiplication table

### Data Structures

* [x] Indexed arrays
* [x] Associative arrays
* [x] Multidimensional arrays
* [x] Nested associative arrays
* [x] Array traversal
* [x] Array aggregation
* [x] Element-wise array operations

---

# 🎓 Key Takeaway

> **The goal of this week was not only to learn PHP syntax, but to understand how programming logic works.**

By working through algorithms, loops, arrays, and nested structures, this module builds the foundation required for more advanced PHP development, including:

```text
PHP Fundamentals
       ↓
Control Flow
       ↓
Data Structures
       ↓
Functions
       ↓
Object-Oriented PHP
       ↓
Database Integration
       ↓
Backend Development
       ↓
PHP Frameworks
```

---

# 👨‍💻 Author

**Mu'aad Ahmed**

Full Stack Developer & Computer Science Student

### Focus Areas

```text
Full Stack Development
Backend Development
PHP
JavaScript
React
Node.js
Database Systems
Software Engineering
```

---

## ⭐ Repository Status

**Week 3 — Completed ✅**

This repository represents my practical progress in learning PHP fundamentals, algorithmic problem solving, and data structures.

If you find the repository useful, feel free to ⭐ the project.

---

<p align="center">
  <strong>🐘 Keep Learning • Keep Building • Keep Improving 🚀</strong>
</p>

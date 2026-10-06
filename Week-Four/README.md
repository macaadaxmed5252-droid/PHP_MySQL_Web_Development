# Week Four - PHP & MySQL Coursework

This folder contains the Week Four PHP work for the PHP & MySQL Web Development course. It includes a polished Student Management dashboard, a PHP functions practice file, and an assignment file focused on arrays, matrices, associative arrays, loops, and dynamic output rendering.

## Folder Overview

```text
Week-Four/
+-- Assigment-1.php
+-- Practice-1.php
+-- student.php
+-- navBar.php
+-- Sidebar.php
+-- Content.php
+-- Footer.php
+-- README.md
```

## Technologies Used

- PHP for server-side rendering and reusable includes.
- HTML5 for semantic page structure.
- CSS3 for custom layout, spacing, colors, cards, tables, and responsive behavior.
- Bootstrap 5.1.3 for grid layout, navbar behavior, buttons, tables, and responsive utilities.
- Font Awesome 5.15.3 for dashboard icons.
- XAMPP as the local PHP development environment.

## Main Student Dashboard

The dashboard is built using multiple PHP component files. The main entry point is `student.php`, and it uses `include_once()` to connect the layout pieces together.

### `student.php`

`student.php` is the main page shell for the Student Management System.

It handles:

- The full HTML document structure.
- Bootstrap and Font Awesome CDN links.
- Custom CSS variables and responsive styling.
- Page layout wrapper using Bootstrap grid.
- PHP includes for the navbar, sidebar, main content, and footer.
- Bootstrap JavaScript loading.

The file acts as the parent layout and keeps the page organized by separating repeated interface sections into smaller component files.

### `navBar.php`

`navBar.php` contains the top navigation bar.

It includes:

- The Student Management brand.
- A graduation icon brand mark.
- Responsive Bootstrap navbar toggle.
- Navigation links to Dashboard, Students, Courses, and Contact sections.

This file improves navigation and gives the page a professional application-style header.

### `Sidebar.php`

`Sidebar.php` contains the left-side dashboard navigation.

It includes links to:

- Dashboard
- Student Profiles
- Student Courses
- Student Grades
- Events
- About

The sidebar uses icons, spacing, hover states, and sticky positioning on desktop screens. On smaller screens it becomes a normal stacked section so the layout remains mobile-friendly.

### `Content.php`

`Content.php` contains the main dashboard content.

It includes:

- A hero dashboard panel with key statistics.
- Student profile cards.
- Course cards.
- A grades overview table.
- Upcoming events.
- About section.
- Contact section.

This file is the main visual and informational part of the Student Management System. It uses Bootstrap columns, custom cards, icons, status labels, and responsive sections to create a clean dashboard experience.

### `Footer.php`

`Footer.php` contains the footer section for the dashboard.

It includes:

- Copyright text.
- Dark professional footer styling.
- A consistent ending point for the page.

The footer is included after the main content so the page structure flows correctly from navbar to content to footer.

## Assignment File

### `Assigment-1.php`

`Assigment-1.php` is a standalone PHP assignment page. It focuses on array processing, nested arrays, table rendering, and conditional logic.

It covers:

- Student identification header.
- One-dimensional array operations.
- Total of all array elements.
- Total of even numbers.
- Total of odd numbers.
- Minimum and maximum value detection.
- Position tracking for minimum and maximum values.
- Two-dimensional associative color matrix.
- Two-dimensional numeric square array analysis.
- Row totals and column totals.
- Main diagonal and anti-diagonal totals.
- Associative directory table with name, phone, and address.
- Academic transcript table.
- Pass or fail status based on calculated totals.

The assignment uses PHP loops, arrays, conditionals, and embedded PHP output inside HTML tables.

## Practice File

### `Practice-1.php`

`Practice-1.php` is a practice file focused on PHP functions and variable scope.

It demonstrates:

- Defining and calling functions.
- Passing values into functions.
- Calculating factorial values.
- Returning values from functions.
- Passing arrays into functions.
- Updating array values inside a function.
- Passing variables by value.
- Passing variables by reference.
- Default function parameters.
- Local variables.
- Global variables using the `global` keyword.
- Accessing global variables with `$GLOBALS`.
- Static variables using `static`.

This file is useful for understanding how PHP functions behave and how data moves between different scopes.

## How The Files Work Together

The Student Management dashboard follows a component-based structure:

```php
<?php include_once("navBar.php"); ?>
<?php include_once("Sidebar.php"); ?>
<?php include_once("Content.php"); ?>
<?php include_once("Footer.php"); ?>
```

This approach makes the project easier to maintain because each file has one clear responsibility:

- `student.php` controls the page layout.
- `navBar.php` controls the top navigation.
- `Sidebar.php` controls side navigation.
- `Content.php` controls the main dashboard sections.
- `Footer.php` controls the footer.

## How To Run

Using XAMPP:

1. Move or keep the project inside the `htdocs` folder.
2. Start Apache from the XAMPP Control Panel.
3. Open the dashboard in a browser:

```text
http://localhost/PHP&MySQL/Week-Four/student.php
```

You can also open the other Week Four files directly:

```text
http://localhost/PHP&MySQL/Week-Four/Assigment-1.php
http://localhost/PHP&MySQL/Week-Four/Practice-1.php
```

Using the PHP built-in server:

```bash
"C:\xampp\php\php.exe" -S 127.0.0.1:8014 -t "C:\xampp\htdocs\PHP&MySQL"
```

Then open:

```text
http://127.0.0.1:8014/Week-Four/student.php
```

## Design Improvements In The Dashboard

- Clean dashboard-style layout.
- Responsive Bootstrap grid.
- Sticky sidebar on desktop.
- Mobile-friendly sidebar behavior.
- Professional color system using CSS variables.
- Cards for students and courses.
- Organized grades table.
- Event list with clear date labels.
- Separated PHP components for maintainability.

## Notes

- `Assigment-1.php` and `Practice-1.php` are standalone learning files.
- The Student Management dashboard is currently static and does not connect to a database yet.
- The folder is ready to be extended with MySQL CRUD operations in future work.

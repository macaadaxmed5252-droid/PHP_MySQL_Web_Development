<?php
session_start();

if (!isset($_SESSION['student_data'])) {
    header("Location: index.php");
    exit();
}

$data = $_SESSION['student_data'];
?>
<!DOCTYPE html>
<html lang="so">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Student Summary - Jamhuuriya University</title>
    <!-- Embedded Offline CSS Engine -->
    <style>
        :root {
            --dark-blue: #274245;
            --yellow-sapling: #DFD6AE;
            --white: #ffffff;
            --black: #111827;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: rgba(223, 214, 174, 0.25); color: var(--black); min-height: 100vh; padding: 40px 15px; }
        .container { max-width: 900px; margin: 0 auto; display: flex; flex-direction: column; gap: 25px; }

        .display-header { background-color: var(--dark-blue); border-radius: 20px; padding: 30px; color: var(--white); text-align: center; border: 2px solid rgba(223, 214, 174, 0.4); box-shadow: 0 10px 25px rgba(0,0,0,0.15); }
        .display-header h1 { color: var(--yellow-sapling); font-size: 26px; font-weight: 800; margin-top: 8px; }

        .card-body { background: var(--white); border-radius: 20px; padding: 30px; border: 2px solid rgba(39, 66, 69, 0.2); box-shadow: 0 4px 12px rgba(0,0,0,0.05); display: flex; flex-direction: column; gap: 25px; }

        .profile-row { background: var(--dark-blue); color: var(--white); padding: 20px; border-radius: 15px; border: 2px solid var(--yellow-sapling); display: flex; align-items: center; gap: 20px; }
        .profile-img { width: 110px; height: 110px; border-radius: 12px; object-fit: cover; border: 3px solid var(--yellow-sapling); }

        .table-title { font-size: 15px; font-weight: 800; color: var(--dark-blue); text-transform: uppercase; margin-bottom: 10px; }
        .custom-table { width: 100%; border-collapse: collapse; border-radius: 12px; overflow: hidden; border: 2px solid #e5e7eb; }
        .custom-table th { background-color: rgba(223, 214, 174, 0.3); color: var(--dark-blue); width: 35%; padding: 12px 16px; text-align: left; font-size: 12px; font-weight: 800; text-transform: uppercase; border-bottom: 1px solid #e5e7eb; }
        .custom-table td { padding: 12px 16px; font-size: 14px; font-weight: 700; color: #1f2937; border-bottom: 1px solid #e5e7eb; }

        .btn-back { background-color: var(--dark-blue); color: var(--yellow-sapling); padding: 12px 24px; border-radius: 10px; text-decoration: none; font-weight: 800; font-size: 12px; text-transform: uppercase; display: inline-block; }
    </style>
</head>
<body>

    <div class="container">

        <header class="display-header">
            <span style="background:rgba(223, 214, 174, 0.2); color:var(--yellow-sapling); padding:4px 12px; border-radius:20px; font-size:11px; font-weight:800; text-transform:uppercase;">
                ✓ Registration Successful
            </span>
            <h1>Student Profile Summary</h1>
            <p style="font-size:13px; color:#e5e7eb; margin-top:4px;">Below are the submitted student details processed by the system.</p>
        </header>

        <div class="card-body">

            <!-- Profile Header Card -->
            <div class="profile-row">
                <?php if (!empty($data['image_path']) && file_exists($data['image_path'])): ?>
                    <img src="<?php echo htmlspecialchars($data['image_path']); ?>" alt="Student Photo" class="profile-img">
                <?php else: ?>
                    <div class="profile-img" style="background:#374151; display:flex; align-items:center; justify-content:center; color:var(--yellow-sapling); font-size:11px;">No Image</div>
                <?php endif; ?>

                <div>
                    <h2 style="color:var(--yellow-sapling); font-size:22px; font-weight:800;"><?php echo htmlspecialchars($data['student_name']); ?></h2>
                    <p style="font-family:monospace; font-weight:800; font-size:14px; margin-top:2px;">ID: <?php echo htmlspecialchars($data['student_id']); ?></p>
                    <p style="font-size:12px; color:#d1d5db; margin-top:2px; font-weight:600;"><?php echo htmlspecialchars($data['faculty']); ?> &bull; <?php echo htmlspecialchars($data['department']); ?> (<?php echo htmlspecialchars($data['class']); ?>)</p>
                </div>
            </div>

            <!-- Table 1: Personal Info -->
            <div>
                <div class="table-title">1. Personal Information</div>
                <table class="custom-table">
                    <tr>
                        <th>Full Name</th>
                        <td><?php echo htmlspecialchars($data['student_name']); ?></td>
                    </tr>
                    <tr>
                        <th>Place & Date of Birth</th>
                        <td><?php echo htmlspecialchars($data['pob']); ?> &bull; <?php echo htmlspecialchars($data['dob']); ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?php echo htmlspecialchars($data['address']); ?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><?php echo htmlspecialchars($data['gender']); ?></td>
                    </tr>
                    <tr>
                        <th>Telephone</th>
                        <td style="color:var(--dark-blue); font-family:monospace;"><?php echo htmlspecialchars($data['telephone']); ?></td>
                    </tr>
                    <tr>
                        <th>Email Address</th>
                        <td style="color:var(--dark-blue); font-family:monospace;"><?php echo htmlspecialchars($data['email']); ?></td>
                    </tr>
                </table>
            </div>

            <!-- Table 2: Parent Info -->
            <div>
                <div class="table-title">2. Parent / Guardian Information</div>
                <table class="custom-table">
                    <tr>
                        <th>Parent Name</th>
                        <td><?php echo htmlspecialchars($data['parent_name']); ?></td>
                    </tr>
                    <tr>
                        <th>Telephone</th>
                        <td style="color:var(--dark-blue); font-family:monospace;"><?php echo htmlspecialchars($data['parent_phone']); ?></td>
                    </tr>
                    <tr>
                        <th>Relationship</th>
                        <td><?php echo htmlspecialchars($data['relationship']); ?></td>
                    </tr>
                </table>
            </div>

            <!-- Table 3: Academic Info -->
            <div>
                <div class="table-title">3. Academic Information</div>
                <table class="custom-table">
                    <tr>
                        <th>Student ID</th>
                        <td style="color:var(--dark-blue); font-family:monospace;"><?php echo htmlspecialchars($data['student_id']); ?></td>
                    </tr>
                    <tr>
                        <th>Faculty & Department</th>
                        <td><?php echo htmlspecialchars($data['faculty']); ?> &bull; <?php echo htmlspecialchars($data['department']); ?></td>
                    </tr>
                    <tr>
                        <th>Class / Section</th>
                        <td><?php echo htmlspecialchars($data['class']); ?></td>
                    </tr>
                    <tr>
                        <th>Registration Date</th>
                        <td style="font-family:monospace;"><?php echo htmlspecialchars($data['reg_date']); ?></td>
                    </tr>
                </table>
            </div>

            <div>
                <a href="index.php" class="btn-back">&larr; Back to Form</a>
            </div>

        </div>

    </div>

</body>
</html>
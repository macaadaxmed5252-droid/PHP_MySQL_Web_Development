<?php
session_start();

$errors = array();
$formData = array();
$successAlert = false;

// Processing Form Data & Validations
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize Inputs
    $formData['student_name'] = trim($_POST['student_name'] ?? '');
    $formData['pob']          = trim($_POST['pob'] ?? '');
    $formData['dob']          = trim($_POST['dob'] ?? '');
    $formData['address']      = trim($_POST['address'] ?? '');
    $formData['gender']       = trim($_POST['gender'] ?? '');
    $formData['telephone']    = trim($_POST['telephone'] ?? '');
    $formData['email']        = trim($_POST['email'] ?? '');

    $formData['parent_name']  = trim($_POST['parent_name'] ?? '');
    $formData['parent_phone'] = trim($_POST['parent_phone'] ?? '');
    $formData['relationship'] = trim($_POST['relationship'] ?? '');

    $formData['student_id']   = trim($_POST['student_id'] ?? '');
    $formData['faculty']      = trim($_POST['faculty'] ?? '');
    $formData['department']   = trim($_POST['department'] ?? '');
    $formData['class']        = trim($_POST['class'] ?? '');
    $formData['reg_date']     = trim($_POST['reg_date'] ?? '');

    // 1. Validation for Empty Fields
    foreach ($formData as $key => $val) {
        if (empty($val)) {
            $fieldName = ucwords(str_replace('_', ' ', $key));
            $errors[$key] = "Fadlan soo gali $fieldName.";
        }
    }

    // 2. Name Validation (Letters & spaces only)
    if (!empty($formData['student_name']) && !preg_match("/^[a-zA-Z\s]+$/", $formData['student_name'])) {
        $errors['student_name'] = "Magacu waa inuu ka koobnaadaa xarfo iyo boos (spaces) oo kaliya.";
    }

    // 3. Email Format Validation
    if (!empty($formData['email']) && !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Fadlan soo gali qaab e-mail oo sax ah (e.g. user@domain.com).";
    }

    // 4. File Upload Validation
    if (isset($_FILES['student_image']) && $_FILES['student_image']['error'] == 0) {
        $allowedExtensions = array("jpg", "jpeg", "png", "gif", "webp");
        $fileName          = $_FILES['student_image']['name'];
        $fileSize          = $_FILES['student_image']['size'];
        $fileTmp           = $_FILES['student_image']['tmp_name'];
        $fileExt           = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($fileExt, $allowedExtensions)) {
            $errors['student_image'] = "Sawirka oo kaliya ayaa la ogol yahay (.png, .jpg, .jpeg, .gif, .webp).";
        } elseif ($fileSize > 5 * 1024 * 1024) { // 5MB limit
            $errors['student_image'] = "Cabbirka sawirku waa inuusan ka badan 5MB.";
        } else {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $newFileName = time() . '_' . preg_replace("/[^a-zA-Z0-9\.]/", "_", $fileName);
            $targetPath  = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmp, $targetPath)) {
                $formData['image_path'] = $targetPath;
            } else {
                $errors['student_image'] = "Dhib ayaa ka dhacday kaydinta sawirka.";
            }
        }
    } else {
        $errors['student_image'] = "Fadlan soo xasho sawirka ardayga (Student Image).";
    }

    // Set flag for alert when validation passes
    if (empty($errors)) {
        $_SESSION['student_data'] = $formData;
        $successAlert = true;
    }
}
?>
<!DOCTYPE html>
<html lang="so">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamhuuriya University - Student Registration Form</title>
    <!-- Embedded Offline Layout Engine (Works 100% without Internet connection) -->
    <style>
        :root {
            --dark-blue: #274245;
            --yellow-sapling: #DFD6AE;
            --white: #ffffff;
            --black: #111827;
            --error-red: #dc2626;
            --error-bg: #fef2f2;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: rgba(223, 214, 174, 0.25); color: var(--black); min-height: 100vh; padding: 40px 15px; }
        .container { max-width: 1000px; margin: 0 auto; display: flex; flex-direction: column; gap: 25px; }

        /* Header Style */
        .academic-header { background-color: var(--dark-blue); border-radius: 20px; padding: 30px; color: var(--white); border: 2px solid rgba(223, 214, 174, 0.4); box-shadow: 0 10px 25px rgba(0,0,0,0.15); display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 20px; }
        .header-title h1 { color: var(--yellow-sapling); font-size: 28px; font-weight: 800; margin-top: 5px; }
        .badge { background-color: rgba(223, 214, 174, 0.2); color: var(--yellow-sapling); padding: 5px 12px; border-radius: 50px; font-size: 11px; font-weight: 700; text-transform: uppercase; border: 1px solid rgba(223, 214, 174, 0.4); display: inline-block; }
        .student-badge-card { background-color: var(--white); color: var(--black); padding: 18px; border-radius: 15px; border: 2px solid var(--yellow-sapling); min-width: 280px; }
        .info-row { display: flex; justify-content: space-between; border-bottom: 1px solid #e5e7eb; padding-bottom: 6px; margin-bottom: 6px; font-size: 13px; }
        .info-row:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
        .info-row .label { color: #4b5563; font-weight: 700; text-transform: uppercase; font-size: 11px; }
        .info-row .val { font-weight: 800; color: var(--dark-blue); }

        /* Section Forms */
        .form-section { background-color: var(--white); border: 2px solid rgba(39, 66, 69, 0.2); border-radius: 20px; padding: 30px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .section-header { border-bottom: 1px solid #e5e7eb; padding-bottom: 12px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; }
        .section-title { font-size: 18px; font-weight: 800; color: var(--dark-blue); display: flex; items-center; gap: 10px; }
        .num-circle { background-color: var(--dark-blue); color: var(--yellow-sapling); width: 32px; height: 32px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; font-weight: 800; }

        /* Grid Layout */
        .grid-3 { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
        .col-span-2 { grid-column: span 2; }
        @media (max-width: 768px) { .col-span-2 { grid-column: span 1; } }

        /* Inputs */
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group label { font-size: 11px; font-weight: 800; text-transform: uppercase; color: var(--dark-blue); tracking-space: 1px; }
        .form-control { width: 100%; background-color: #f9fafb; border: 2px solid #d1d5db; border-radius: 10px; padding: 12px; font-size: 14px; font-weight: 600; color: var(--black); outline: none; transition: 0.2s; }
        .form-control:focus { border-color: var(--dark-blue); background-color: var(--white); box-shadow: 0 0 0 3px rgba(39, 66, 69, 0.15); }
        .form-control.is-invalid { border-color: var(--error-red); background-color: var(--error-bg); color: #7f1d1d; }
        .error-text { color: var(--error-red); font-size: 12px; font-weight: 700; margin-top: 2px; }

        /* Action Buttons */
        .action-buttons { display: flex; justify-content: flex-end; gap: 15px; margin-top: 10px; }
        .btn { padding: 14px 28px; border-radius: 12px; font-size: 13px; font-weight: 800; text-transform: uppercase; cursor: pointer; border: none; transition: 0.2s; }
        .btn-submit { background-color: var(--dark-blue); color: var(--yellow-sapling); box-shadow: 0 4px 15px rgba(39, 66, 69, 0.3); }
        .btn-submit:hover { opacity: 0.92; transform: translateY(-1px); }
        .btn-reset { background-color: #e5e7eb; color: #374151; border: 2px solid #d1d5db; }
        .btn-reset:hover { background-color: #d1d5db; color: #111827; }

        /* Offline Modal Alert */
        .modal-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); display: flex; align-items: center; justify-content: center; z-index: 9999; backdrop-filter: blur(4px); }
        .modal-box { background: var(--white); border-radius: 20px; padding: 30px; text-align: center; max-width: 420px; width: 90%; border: 3px solid var(--dark-blue); box-shadow: 0 20px 40px rgba(0,0,0,0.3); }
        .modal-icon { width: 60px; height: 60px; background: var(--dark-blue); color: var(--yellow-sapling); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 30px; margin: 0 auto 15px; }
        .modal-box h3 { color: var(--dark-blue); font-size: 22px; font-weight: 800; margin-bottom: 8px; }
        .modal-box p { font-size: 14px; color: #4b5563; font-weight: 600; margin-bottom: 20px; }
    </style>
</head>
<body>

    <!-- SUCCESS ALERT MODAL -->
    <?php if ($successAlert): ?>
    <div class="modal-overlay" id="alertModal">
        <div class="modal-box">
            <div class="modal-icon">✓</div>
            <h3>Registration Successful!</h3>
            <p>Xogta ardayga waa la xaqiijiyay oo si guul leh ayaa loo kaydiyay.</p>
            <button onclick="window.location.href='display.php'" class="btn btn-submit" style="width:100%;">Eeg Shaxda (View Table) &rarr;</button>
        </div>
    </div>
    <?php endif; ?>

    <div class="container">

        <!-- STUDENT ACADEMIC HEADER -->
        <header class="academic-header">
            <div class="header-title">
                <span class="badge">Jamhuriya University of Science & Technology</span>
                <h1>Faculty of Computer & IT</h1>
                <p style="margin-top: 6px; font-size: 14px; color: #e5e7eb;">Course: <strong style="color:var(--yellow-sapling)">PHP & MySQL</strong> | Chapter 4 Assignment (Forms)</p>
            </div>

            <!-- Profile Info Card -->
            <div class="student-badge-card">
                <div class="info-row">
                    <span class="label">Student Name</span>
                    <span class="val">Mu'ad Ahmed Hassan</span>
                </div>
                <div class="info-row">
                    <span class="label">Student ID</span>
                    <span class="val" style="font-family: monospace;">C1230028</span>
                </div>
                <div class="info-row">
                    <span class="label">Class / Group</span>
                    <span class="val">CA232</span>
                </div>
                <div class="info-row">
                    <span class="label">Due Date</span>
                    <span class="val" style="color:var(--error-red)">October 18, 2026</span>
                </div>
            </div>
        </header>

        <!-- REGISTRATION FORM -->
        <form id="studentRegistrationForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">

            <!-- SECTION 1: PERSONAL INFORMATION -->
            <div class="form-section">
                <div class="section-header">
                    <div class="section-title">
                        <span class="num-circle">01</span> Personal Information
                    </div>
                    <span style="font-size: 12px; font-weight:700; color: #6b7280;">* Sadarada dhan waa muhiim</span>
                </div>

                <div class="grid-3">
                    <div class="form-group">
                        <label for="student_name">Full Name *</label>
                        <input type="text" id="student_name" name="student_name" value="<?php echo htmlspecialchars($formData['student_name'] ?? ''); ?>" class="form-control <?php echo isset($errors['student_name']) ? 'is-invalid' : ''; ?>">
                        <?php if (isset($errors['student_name'])): ?><span class="error-text">⚠️ <?php echo $errors['student_name']; ?></span><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="pob">Place of Birth (POB) *</label>
                        <input type="text" id="pob" name="pob" value="<?php echo htmlspecialchars($formData['pob'] ?? ''); ?>" class="form-control <?php echo isset($errors['pob']) ? 'is-invalid' : ''; ?>">
                        <?php if (isset($errors['pob'])): ?><span class="error-text">⚠️ <?php echo $errors['pob']; ?></span><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of Birth (DOB) *</label>
                        <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($formData['dob'] ?? ''); ?>" class="form-control <?php echo isset($errors['dob']) ? 'is-invalid' : ''; ?>">
                        <?php if (isset($errors['dob'])): ?><span class="error-text">⚠️ <?php echo $errors['dob']; ?></span><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="address">Address *</label>
                        <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($formData['address'] ?? ''); ?>" class="form-control <?php echo isset($errors['address']) ? 'is-invalid' : ''; ?>">
                        <?php if (isset($errors['address'])): ?><span class="error-text">⚠️ <?php echo $errors['address']; ?></span><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender *</label>
                        <select id="gender" name="gender" class="form-control <?php echo isset($errors['gender']) ? 'is-invalid' : ''; ?>">
                            <option value="">-- Dooro Gender --</option>
                            <option value="Male" <?php echo (isset($formData['gender']) && $formData['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo (isset($formData['gender']) && $formData['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                        </select>
                        <?php if (isset($errors['gender'])): ?><span class="error-text">⚠️ <?php echo $errors['gender']; ?></span><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="telephone">Telephone *</label>
                        <input type="tel" id="telephone" name="telephone" value="<?php echo htmlspecialchars($formData['telephone'] ?? ''); ?>" placeholder="+252..." class="form-control <?php echo isset($errors['telephone']) ? 'is-invalid' : ''; ?>">
                        <?php if (isset($errors['telephone'])): ?><span class="error-text">⚠️ <?php echo $errors['telephone']; ?></span><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($formData['email'] ?? ''); ?>" placeholder="student@example.com" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>">
                        <?php if (isset($errors['email'])): ?><span class="error-text">⚠️ <?php echo $errors['email']; ?></span><?php endif; ?>
                    </div>

                    <div class="form-group col-span-2">
                        <label for="student_image">Upload Profile Image (.png, .jpg, .jpeg) *</label>
                        <input type="file" id="student_image" name="student_image" accept="image/*" class="form-control <?php echo isset($errors['student_image']) ? 'is-invalid' : ''; ?>">
                        <?php if (isset($errors['student_image'])): ?><span class="error-text">⚠️ <?php echo $errors['student_image']; ?></span><?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- SECTION 2: PARENT INFORMATION -->
            <div class="form-section" style="margin-top: 20px;">
                <div class="section-header">
                    <div class="section-title">
                        <span class="num-circle">02</span> Parent / Guardian Information
                    </div>
                </div>

                <div class="grid-3">
                    <div class="form-group">
                        <label for="parent_name">Parent Name *</label>
                        <input type="text" id="parent_name" name="parent_name" value="<?php echo htmlspecialchars($formData['parent_name'] ?? ''); ?>" class="form-control <?php echo isset($errors['parent_name']) ? 'is-invalid' : ''; ?>">
                        <?php if (isset($errors['parent_name'])): ?><span class="error-text">⚠️ <?php echo $errors['parent_name']; ?></span><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="parent_phone">Parent Telephone *</label>
                        <input type="tel" id="parent_phone" name="parent_phone" value="<?php echo htmlspecialchars($formData['parent_phone'] ?? ''); ?>" class="form-control <?php echo isset($errors['parent_phone']) ? 'is-invalid' : ''; ?>">
                        <?php if (isset($errors['parent_phone'])): ?><span class="error-text">⚠️ <?php echo $errors['parent_phone']; ?></span><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="relationship">Relationship *</label>
                        <select id="relationship" name="relationship" class="form-control <?php echo isset($errors['relationship']) ? 'is-invalid' : ''; ?>">
                            <option value="">-- Select Relationship --</option>
                            <option value="Father" <?php echo (isset($formData['relationship']) && $formData['relationship'] == 'Father') ? 'selected' : ''; ?>>Father</option>
                            <option value="Mother" <?php echo (isset($formData['relationship']) && $formData['relationship'] == 'Mother') ? 'selected' : ''; ?>>Mother</option>
                            <option value="Guardian" <?php echo (isset($formData['relationship']) && $formData['relationship'] == 'Guardian') ? 'selected' : ''; ?>>Guardian</option>
                        </select>
                        <?php if (isset($errors['relationship'])): ?><span class="error-text">⚠️ <?php echo $errors['relationship']; ?></span><?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- SECTION 3: ACADEMIC INFORMATION -->
            <div class="form-section" style="margin-top: 20px;">
                <div class="section-header">
                    <div class="section-title">
                        <span class="num-circle">03</span> Academic Details
                    </div>
                </div>

                <div class="grid-3">
                    <div class="form-group">
                        <label for="student_id">Student ID *</label>
                        <input type="text" id="student_id" name="student_id" value="<?php echo htmlspecialchars($formData['student_id'] ?? ''); ?>" placeholder="C123..." class="form-control <?php echo isset($errors['student_id']) ? 'is-invalid' : ''; ?>">
                        <?php if (isset($errors['student_id'])): ?><span class="error-text">⚠️ <?php echo $errors['student_id']; ?></span><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="faculty">Faculty *</label>
                        <input type="text" id="faculty" name="faculty" value="<?php echo htmlspecialchars($formData['faculty'] ?? ''); ?>" placeholder="Computer & IT" class="form-control <?php echo isset($errors['faculty']) ? 'is-invalid' : ''; ?>">
                        <?php if (isset($errors['faculty'])): ?><span class="error-text">⚠️ <?php echo $errors['faculty']; ?></span><?php endif; ?>
                    </div>

                    <div>
                        lab


                    </div>

                    <div class="form-group">
                        <label for="department">Department *</label>
                        <input type="text" id="department" name="department" value="<?php echo htmlspecialchars($formData['department'] ?? ''); ?>" placeholder="Computer Science" class="form-control <?php echo isset($errors['department']) ? 'is-invalid' : ''; ?>">
                        <?php if (isset($errors['department'])): ?><span class="error-text">⚠️ <?php echo $errors['department']; ?></span><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="class">Class / Section *</label>
                        <input type="text" id="class" name="class" value="<?php echo htmlspecialchars($formData['class'] ?? ''); ?>" placeholder="CA232" class="form-control <?php echo isset($errors['class']) ? 'is-invalid' : ''; ?>">
                        <?php if (isset($errors['class'])): ?><span class="error-text">⚠️ <?php echo $errors['class']; ?></span><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="reg_date">Registration Date *</label>
                        <input type="date" id="reg_date" name="reg_date" value="<?php echo htmlspecialchars($formData['reg_date'] ?? ''); ?>" class="form-control <?php echo isset($errors['reg_date']) ? 'is-invalid' : ''; ?>">
                        <?php if (isset($errors['reg_date'])): ?><span class="error-text">⚠️ <?php echo $errors['reg_date']; ?></span><?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- ACTION BUTTONS: RESET & SUBMIT -->
            <div class="action-buttons" style="margin-top: 20px;">
                <button type="button" onclick="clearForm()" class="btn btn-reset">🗑️ Clear Form</button>
                <button type="submit" class="btn btn-submit">Submit Registration &rarr;</button>
            </div>
        </form>

        <footer style="text-align: center; font-size: 12px; color: #6b7280; font-weight: 600; padding: 20px 0;">
            Jamhuuriya University of Science & Technology &copy; 2026. All rights reserved.
        </footer>
    </div>

    <!-- JS Form Clearer & Focus Engine -->
    <script>
        function clearForm() {
            if (confirm("Ma hubta in aad nadiifineyso xogta Form ka ku jirto (Clear Form)?")) {
                document.getElementById("studentRegistrationForm").reset();
                window.location.href = window.location.pathname; // Clear PHP post values
            }
        }

        <?php if (!empty($errors)): ?>
        document.addEventListener("DOMContentLoaded", function() {
            var firstErrorElem = document.getElementById("<?php echo array_key_first($errors); ?>");
            if (firstErrorElem) {
                firstErrorElem.focus();
                firstErrorElem.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
        <?php endif; ?>
    </script>

</body>
</html>
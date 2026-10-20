<?php

$success = false;
$errMsg = "";
$nameErr = "";
$emailErr = "";
$cvErr = "";
$certErr = "";

// Folder-ka lagu kaydinayo faylashii la soo dhiibo
$uploadDir = "uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (isset($_POST["submit"])) {

    $success = true;

    // 1. Validation Fullname
    if (empty($_POST["fullname"])) {
        $success = false;
        $nameErr = "* Please fill fullname field!";
    }

    // 2. Validation Email
    if (empty($_POST["email"])) {
        $success = false;
        $emailErr = "* Please fill email field!";
    }

    // 3. Validation CV (Only PDF & Max 1MB)
    if (isset($_FILES["cv"]) && $_FILES["cv"]["error"] == 0) {
        $cvName = $_FILES["cv"]["name"];
        $cvSize = $_FILES["cv"]["size"];
        $cvExt = strtolower(pathinfo($cvName, PATHINFO_EXTENSION));

        if ($cvExt != "pdf") {
            $success = false;
            $cvErr = "* CV must be a PDF file!";
        } elseif ($cvSize > 1024 * 1024) { // 1MB
            $success = false;
            $cvErr = "* CV size must be maximum 1MB!";
        }
    } else {
        $success = false;
        $cvErr = "* Please upload your CV!";
    }

    // 4. Validation Certificates (PDF, JPG, PNG & Max 1MB each)
    if (isset($_FILES["certificates"]) && !empty($_FILES["certificates"]["name"][0])) {
        $allowedExts = ["pdf", "jpg", "jpeg", "png"];
        
        foreach ($_FILES["certificates"]["name"] as $key => $certName) {
            if ($_FILES["certificates"]["error"][$key] == 0) {
                $certSize = $_FILES["certificates"]["size"][$key];
                $certExt = strtolower(pathinfo($certName, PATHINFO_EXTENSION));

                if (!in_array($certExt, $allowedExts)) {
                    $success = false;
                    $certErr = "* Certificates must be PDF, JPG, or PNG files!";
                    break;
                } elseif ($certSize > 1024 * 1024) { // 1MB
                    $success = false;
                    $certErr = "* Each certificate file size must be maximum 1MB!";
                    break;
                }
            }
        }
    }

    if (!$success) {
        $errMsg = "Please fill all required fields correctly.";
    } else {
        // Upload CV
        $cvNewName = time() . "_cv_" . basename($_FILES["cv"]["name"]);
        move_uploaded_file($_FILES["cv"]["tmp_name"], $uploadDir . $cvNewName);

        // Upload Certificates
        $uploadedCerts = [];
        if (isset($_FILES["certificates"])) {
            foreach ($_FILES["certificates"]["tmp_name"] as $key => $tmpName) {
                if ($_FILES["certificates"]["error"][$key] == 0) {
                    $certNewName = time() . "_" . $key . "_" . basename($_FILES["certificates"]["name"][$key]);
                    move_uploaded_file($tmpName, $uploadDir . $certNewName);
                    $uploadedCerts[] = $certNewName;
                }
            }
        }
    }

    if ($success) {
        echo '<div class="container mt-4">
        <div class="row justify-content-center"><div class="col-md-8 col-lg-7">
                <div class="alert alert-success">
                    <h4 class="alert-heading">Application Information</h4>
                    <hr>';

        echo "Fullname: " . htmlspecialchars($_POST["fullname"]) . "<br>";
        echo "Email: " . htmlspecialchars($_POST["email"]) . "<br>";
        echo "Place of Birth: " . htmlspecialchars($_POST["pob"] ?? "") . "<br>";

        if (!empty($_POST["gender"])) {
            echo "Gender: " . htmlspecialchars($_POST["gender"]) . "<br>";
        }

        echo "Faculty: " . htmlspecialchars($_POST["faculty"] ?? "") . "<br>";
        echo "Education Level: " . htmlspecialchars($_POST["education"] ?? "") . "<br>";

        echo "Skills: ";
        if (isset($_POST["skills"])) {
            echo htmlspecialchars(implode(", ", $_POST["skills"]));
        }
        echo "<br>";

        echo "Years of Experience: " . htmlspecialchars($_POST["experience"] ?? "0") . " year(s)<br>";
        echo "Cover Letter: " . htmlspecialchars($_POST["cover_letter"] ?? "") . "<br>";
        echo "CV Uploaded: " . htmlspecialchars($_FILES["cv"]["name"]) . "<br>";

        if (!empty($uploadedCerts)) {
            echo "Certificates Uploaded: " . count($uploadedCerts) . " file(s)<br>";
        }

        echo '  </div>
              </div> </div>
              </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application & Registration Form</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0">Job Application Form</h2>
                </div>

                <div class="card-body">

                    <?php if (!empty($errMsg)) { ?>
                        <div class="alert alert-danger">
                            <?php echo htmlspecialchars($errMsg); ?>
                        </div>
                    <?php } ?>

                    <!-- Note enctype="multipart/form-data" for file uploads -->
                    <form method="post" action="" enctype="multipart/form-data">

                        <fieldset>
                            <legend class="text-primary mb-3">
                                Personal & Academic Information
                            </legend>

                            <!-- Fullname -->
                            <div class="mb-3">
                                <label for="fullname" class="form-label">
                                    Fullname <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="fullname"
                                    name="fullname"
                                    placeholder="Enter your fullname"
                                    value="<?php if (!$success && isset($_POST["fullname"])) echo htmlspecialchars($_POST["fullname"]); ?>"
                                >
                                <div class="text-danger small">
                                    <?php echo htmlspecialchars($nameErr); ?>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Enter your email"
                                    value="<?php if (!$success && isset($_POST["email"])) echo htmlspecialchars($_POST["email"]); ?>"
                                >
                                <div class="text-danger small">
                                    <?php echo htmlspecialchars($emailErr); ?>
                                </div>
                            </div>

                            <!-- Place of Birth -->
                            <div class="mb-3">
                                <label for="pob" class="form-label">
                                    Place of Birth
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="pob"
                                    name="pob"
                                    placeholder="Enter your place of birth"
                                    value="<?php if (!$success && isset($_POST["pob"])) echo htmlspecialchars($_POST["pob"]); ?>"
                                >
                            </div>

                            <!-- Gender -->
                            <div class="mb-3">
                                <label class="form-label d-block">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        id="male"
                                        name="gender"
                                        value="male"
                                        <?php if (!$success && isset($_POST["gender"]) && $_POST["gender"] == "male") echo "checked"; ?>
                                    >
                                    <label for="male" class="form-check-label">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        id="female"
                                        name="gender"
                                        value="female"
                                        <?php if (!$success && isset($_POST["gender"]) && $_POST["gender"] == "female") echo "checked"; ?>
                                    >
                                    <label for="female" class="form-check-label">Female</label>
                                </div>
                            </div>

                            <!-- Faculty -->
                            <div class="mb-3">
                                <label for="faculty" class="form-label">Faculty</label>
                                <select class="form-select" name="faculty" id="faculty">
                                    <option value="computer" <?php if (!$success && isset($_POST["faculty"]) && $_POST["faculty"] == "computer") echo "selected"; ?>>Computer and IT</option>
                                    <option value="medicine" <?php if (!$success && isset($_POST["faculty"]) && $_POST["faculty"] == "medicine") echo "selected"; ?>>Medicine and Health Science</option>
                                    <option value="engineering" <?php if (!$success && isset($_POST["faculty"]) && $_POST["faculty"] == "engineering") echo "selected"; ?>>Engineering</option>
                                    <option value="ecom" <?php if (!$success && isset($_POST["faculty"]) && $_POST["faculty"] == "ecom") echo "selected"; ?>>Business</option>
                                </select>
                            </div>

                            <!-- Education Level -->
                            <div class="mb-3">
                                <label for="education" class="form-label">Education Level</label>
                                <select class="form-select" name="education" id="education">
                                    <option value="" disabled selected>Select Education</option>
                                    <option value="High School" <?php if (!$success && isset($_POST["education"]) && $_POST["education"] == "High School") echo "selected"; ?>>High School</option>
                                    <option value="Diploma" <?php if (!$success && isset($_POST["education"]) && $_POST["education"] == "Diploma") echo "selected"; ?>>Diploma</option>
                                    <option value="Bachelor" <?php if (!$success && isset($_POST["education"]) && $_POST["education"] == "Bachelor") echo "selected"; ?>>Bachelor's Degree</option>
                                    <option value="Master" <?php if (!$success && isset($_POST["education"]) && $_POST["education"] == "Master") echo "selected"; ?>>Master's Degree</option>
                                    <option value="PhD" <?php if (!$success && isset($_POST["education"]) && $_POST["education"] == "PhD") echo "selected"; ?>>PhD</option>
                                </select>
                            </div>

                            <!-- Skills Checkboxes -->
                            <div class="mb-3">
                                <label class="form-label d-block">Skills</label>
                                <?php
                                $skillsList = ["PHP", "HTML", "CSS", "JavaScript"];
                                foreach ($skillsList as $skill) {
                                    $checkedSkill = (!$success && isset($_POST["skills"]) && in_array($skill, $_POST["skills"])) ? "checked" : "";
                                ?>
                                    <div class="form-check form-check-inline">
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                            name="skills[]"
                                            id="<?php echo strtolower($skill); ?>"
                                            value="<?php echo $skill; ?>"
                                            <?php echo $checkedSkill; ?>
                                        >
                                        <label class="form-check-label" for="<?php echo strtolower($skill); ?>">
                                            <?php echo $skill; ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>

                            <!-- Years of Experience -->
                            <div class="mb-3">
                                <label for="experience" class="form-label">Years of Experience</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="experience"
                                    name="experience"
                                    min="0"
                                    value="<?php echo (!$success && isset($_POST["experience"])) ? htmlspecialchars($_POST["experience"]) : "0"; ?>"
                                >
                            </div>

                            <!-- Cover Letter -->
                            <div class="mb-4">
                                <label for="cover_letter" class="form-label">Cover Letter</label>
                                <textarea
                                    class="form-control"
                                    name="cover_letter"
                                    id="cover_letter"
                                    rows="4"
                                    placeholder="Write your cover letter here..."
                                ><?php if (!$success && isset($_POST["cover_letter"])) echo htmlspecialchars($_POST["cover_letter"]); ?></textarea>
                            </div>

                            <legend class="text-primary mb-3">Upload Documents</legend>

                            <!-- CV Upload -->
                            <div class="mb-3">
                                <label for="cv" class="form-label">
                                    CV (PDF only, maximum 1 MB) <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="file"
                                    class="form-control"
                                    id="cv"
                                    name="cv"
                                    accept=".pdf"
                                >
                                <div class="text-danger small">
                                    <?php echo htmlspecialchars($cvErr); ?>
                                </div>
                            </div>

                            <!-- Certificates Upload -->
                            <div class="mb-4">
                                <label for="certificates" class="form-label">
                                    Certificates (PDF, JPG, PNG; maximum 1 MB each)
                                </label>
                                <input
                                    type="file"
                                    class="form-control"
                                    id="certificates"
                                    name="certificates[]"
                                    accept=".pdf, .jpg, .jpeg, .png"
                                    multiple
                                >
                                <div class="text-danger small">
                                    <?php echo htmlspecialchars($certErr); ?>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex gap-2">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Submit Application
                                </button>
                                <button type="reset" class="btn btn-outline-secondary">
                                    Clear
                                </button>
                            </div>

                        </fieldset>

                    </form>

                </div>

                <div class="card-footer text-center text-muted">
                    Job Application System
                </div>

            </div>

        </div>
    </div>

</div>

</body>
</html>
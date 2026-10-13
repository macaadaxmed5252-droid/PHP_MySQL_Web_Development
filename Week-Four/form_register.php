<?php
$facultyOptions = [
    "computer" => "Computer and IT",
    "medicine" => "Medicine and Health Science",
    "engineering" => "Engineering",
    "business" => "Business",
];

$genderOptions = ["Male", "Female"];
$languageOptions = ["Somali", "English", "Arabic", "Chinese"];
$errors = [];
$registeredStudent = null;
$noticeMessage = "";
$noticeType = "success";

if (!function_exists("student_form_escape")) {
    function student_form_escape($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
    }
}

if (!function_exists("student_form_old")) {
    function student_form_old($key, $default = "")
    {
        $value = $_POST[$key] ?? $default;

        if (is_array($default)) {
            return is_array($value) ? $value : $default;
        }

        return is_scalar($value) ? (string) $value : $default;
    }
}

if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
    $sessionPath = __DIR__ . DIRECTORY_SEPARATOR . ".sessions";

    if (!is_dir($sessionPath)) {
        mkdir($sessionPath, 0777, true);
    }

    if (is_dir($sessionPath) && is_writable($sessionPath)) {
        session_save_path($sessionPath);
    }

    session_start();
}

if (!isset($_SESSION["registered_students"]) || !is_array($_SESSION["registered_students"])) {
    $_SESSION["registered_students"] = [];
}

$registeredStudents = &$_SESSION["registered_students"];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete_student"])) {
    $studentId = student_form_old("student_id");
    $updatedStudents = [];
    $studentDeleted = false;

    foreach ($registeredStudents as $student) {
        if (($student["id"] ?? "") === $studentId) {
            $studentDeleted = true;
            continue;
        }

        $updatedStudents[] = $student;
    }

    $registeredStudents = $updatedStudents;
    $noticeMessage = $studentDeleted
        ? "Student deleted successfully."
        : "Student could not be found.";
    $noticeType = $studentDeleted ? "success" : "danger";
    $_POST = [];
} elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register_student"])) {
    $fullname = trim(student_form_old("fullname"));
    $email = trim(student_form_old("email"));
    $pob = trim(student_form_old("pob"));
    $gender = student_form_old("gender");
    $faculty = student_form_old("faculty");
    $languages = student_form_old("languages", []);
    $comment = trim(student_form_old("comment"));

    $languages = array_values(array_intersect($languages, $languageOptions));

    if ($fullname === "") {
        $errors["fullname"] = "Full name is required.";
    } elseif (strlen($fullname) < 3) {
        $errors["fullname"] = "Full name must be at least 3 characters.";
    }

    if ($email === "") {
        $errors["email"] = "Email address is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Enter a valid email address.";
    }

    if ($pob === "") {
        $errors["pob"] = "Place of birth is required.";
    }

    if (!in_array($gender, $genderOptions, true)) {
        $errors["gender"] = "Choose a gender.";
    }

    if (!array_key_exists($faculty, $facultyOptions)) {
        $errors["faculty"] = "Choose a faculty.";
    }

    if (strlen($comment) > 500) {
        $errors["comment"] = "Comment must be 500 characters or fewer.";
    }

    if (!$errors) {
        $registeredStudent = [
            "id" => str_replace(".", "", uniqid("student_", true)),
            "fullname" => $fullname,
            "email" => $email,
            "pob" => $pob,
            "gender" => $gender,
            "faculty" => $facultyOptions[$faculty],
            "languages" => $languages,
            "comment" => $comment,
            "created_at" => date("M d, Y h:i A"),
        ];

        array_unshift($registeredStudents, $registeredStudent);
        $noticeMessage = "Student registration completed successfully.";
        $_POST = [];
    }
}
?>

<section id="register" class="section-bg register-section">
    <div class="section-header">
        <div>
            <h2>Student Registration</h2>
            <p class="section-kicker">Add a new student using a clear validated form.</p>
        </div>
        <span class="badge-soft">New student</span>
    </div>

    <?php if ($noticeMessage !== "") : ?>
        <div class="alert alert-<?php echo student_form_escape($noticeType); ?> d-flex align-items-center gap-2" role="alert">
            <i class="fas <?php echo $noticeType === "success" ? "fa-check-circle" : "fa-exclamation-circle"; ?>"></i>
            <div><?php echo student_form_escape($noticeMessage); ?></div>
        </div>
    <?php elseif ($errors) : ?>
        <div class="alert alert-danger d-flex align-items-center gap-2" role="alert">
            <i class="fas fa-exclamation-circle"></i>
            <div>Please fix the highlighted fields and submit again.</div>
        </div>
    <?php endif; ?>

    <?php if ($registeredStudent) : ?>
        <div class="registration-summary mb-4">
            <div class="d-flex align-items-center gap-3 mb-3">
                <span class="summary-icon"><i class="fas fa-user-check"></i></span>
                <div>
                    <h3 class="mb-1"><?php echo student_form_escape($registeredStudent["fullname"]); ?></h3>
                    <p class="text-muted mb-0"><?php echo student_form_escape($registeredStudent["faculty"]); ?></p>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <span class="summary-label">Email</span>
                    <strong><?php echo student_form_escape($registeredStudent["email"]); ?></strong>
                </div>
                <div class="col-md-6">
                    <span class="summary-label">Place of Birth</span>
                    <strong><?php echo student_form_escape($registeredStudent["pob"]); ?></strong>
                </div>
                <div class="col-md-6">
                    <span class="summary-label">Gender</span>
                    <strong><?php echo student_form_escape($registeredStudent["gender"]); ?></strong>
                </div>
                <div class="col-md-6">
                    <span class="summary-label">Languages</span>
                    <strong>
                        <?php
                        echo $registeredStudent["languages"]
                            ? student_form_escape(implode(", ", $registeredStudent["languages"]))
                            : "Not selected";
                        ?>
                    </strong>
                </div>
                <?php if ($registeredStudent["comment"] !== "") : ?>
                    <div class="col-12">
                        <span class="summary-label">Comment</span>
                        <p class="mb-0"><?php echo nl2br(student_form_escape($registeredStudent["comment"])); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($registeredStudents) : ?>
        <div class="registered-list mb-4">
            <div class="d-flex flex-column flex-md-row justify-content-between gap-2 mb-3">
                <div>
                    <h3 class="registered-title">Registered Students</h3>
                    <p class="section-kicker mb-0">Students created during this session.</p>
                </div>
                <span class="badge-soft align-self-md-start"><?php echo count($registeredStudents); ?> saved</span>
            </div>

            <div class="table-responsive">
                <table class="table align-middle registered-table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Faculty</th>
                            <th>Gender</th>
                            <th>Languages</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registeredStudents as $student) : ?>
                            <tr>
                                <td>
                                    <strong class="registered-name"><?php echo student_form_escape($student["fullname"] ?? "Unknown student"); ?></strong>
                                    <span class="registered-email"><?php echo student_form_escape($student["email"] ?? ""); ?></span>
                                </td>
                                <td><?php echo student_form_escape($student["faculty"] ?? ""); ?></td>
                                <td><?php echo student_form_escape($student["gender"] ?? ""); ?></td>
                                <td>
                                    <?php
                                    $studentLanguages = $student["languages"] ?? [];
                                    echo $studentLanguages
                                        ? student_form_escape(implode(", ", $studentLanguages))
                                        : "Not selected";
                                    ?>
                                </td>
                                <td class="text-end">
                                    <form method="post" action="#register" class="m-0">
                                        <input type="hidden" name="student_id" value="<?php echo student_form_escape($student["id"] ?? ""); ?>">
                                        <button type="submit" name="delete_student" class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash-alt me-1"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <form method="post" action="#register" class="row g-3" novalidate>
        <div class="col-md-6">
            <label class="form-label" for="fullname">Full Name <span class="required-mark">*</span></label>
            <input
                type="text"
                class="form-control <?php echo isset($errors["fullname"]) ? "is-invalid" : ""; ?>"
                id="fullname"
                name="fullname"
                value="<?php echo student_form_escape(student_form_old("fullname")); ?>"
                placeholder="Enter student full name"
            >
            <?php if (isset($errors["fullname"])) : ?>
                <div class="invalid-feedback"><?php echo student_form_escape($errors["fullname"]); ?></div>
            <?php endif; ?>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="email">Email <span class="required-mark">*</span></label>
            <input
                type="email"
                class="form-control <?php echo isset($errors["email"]) ? "is-invalid" : ""; ?>"
                id="email"
                name="email"
                value="<?php echo student_form_escape(student_form_old("email")); ?>"
                placeholder="student@example.com"
            >
            <?php if (isset($errors["email"])) : ?>
                <div class="invalid-feedback"><?php echo student_form_escape($errors["email"]); ?></div>
            <?php endif; ?>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="pob">Place of Birth <span class="required-mark">*</span></label>
            <input
                type="text"
                class="form-control <?php echo isset($errors["pob"]) ? "is-invalid" : ""; ?>"
                id="pob"
                name="pob"
                value="<?php echo student_form_escape(student_form_old("pob")); ?>"
                placeholder="City or district"
            >
            <?php if (isset($errors["pob"])) : ?>
                <div class="invalid-feedback"><?php echo student_form_escape($errors["pob"]); ?></div>
            <?php endif; ?>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="faculty">Faculty <span class="required-mark">*</span></label>
            <select
                class="form-select <?php echo isset($errors["faculty"]) ? "is-invalid" : ""; ?>"
                id="faculty"
                name="faculty"
            >
                <option value="">Choose faculty</option>
                <?php foreach ($facultyOptions as $value => $label) : ?>
                    <option value="<?php echo student_form_escape($value); ?>" <?php echo student_form_old("faculty") === $value ? "selected" : ""; ?>>
                        <?php echo student_form_escape($label); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($errors["faculty"])) : ?>
                <div class="invalid-feedback"><?php echo student_form_escape($errors["faculty"]); ?></div>
            <?php endif; ?>
        </div>

        <div class="col-md-6">
            <label class="form-label d-block">Gender <span class="required-mark">*</span></label>
            <div class="choice-grid">
                <?php foreach ($genderOptions as $genderOption) : ?>
                    <label class="choice-tile form-check">
                        <input
                            class="form-check-input <?php echo isset($errors["gender"]) ? "is-invalid" : ""; ?>"
                            type="radio"
                            name="gender"
                            value="<?php echo student_form_escape($genderOption); ?>"
                            <?php echo student_form_old("gender") === $genderOption ? "checked" : ""; ?>
                        >
                        <span><?php echo student_form_escape($genderOption); ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
            <?php if (isset($errors["gender"])) : ?>
                <div class="text-danger small mt-1"><?php echo student_form_escape($errors["gender"]); ?></div>
            <?php endif; ?>
        </div>

        <div class="col-md-6">
            <label class="form-label d-block">Languages</label>
            <div class="choice-grid">
                <?php $selectedLanguages = student_form_old("languages", []); ?>
                <?php foreach ($languageOptions as $language) : ?>
                    <label class="choice-tile form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="languages[]"
                            value="<?php echo student_form_escape($language); ?>"
                            <?php echo is_array($selectedLanguages) && in_array($language, $selectedLanguages, true) ? "checked" : ""; ?>
                        >
                        <span><?php echo student_form_escape($language); ?></span>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-12">
            <label class="form-label" for="comment">Comment</label>
            <textarea
                class="form-control <?php echo isset($errors["comment"]) ? "is-invalid" : ""; ?>"
                id="comment"
                name="comment"
                rows="4"
                placeholder="Optional note about the student"
            ><?php echo student_form_escape(student_form_old("comment")); ?></textarea>
            <?php if (isset($errors["comment"])) : ?>
                <div class="invalid-feedback"><?php echo student_form_escape($errors["comment"]); ?></div>
            <?php endif; ?>
        </div>

        <div class="col-12 d-flex flex-column flex-sm-row gap-2">
            <button type="submit" name="register_student" class="btn btn-primary px-4">
                <i class="fas fa-save me-2"></i>Register Student
            </button>
            <a class="btn btn-outline-primary px-4" href="<?php echo student_form_escape($_SERVER["PHP_SELF"] ?? "student.php"); ?>#register">
                <i class="fas fa-undo me-2"></i>Clear
            </a>
        </div>
    </form>
</section>

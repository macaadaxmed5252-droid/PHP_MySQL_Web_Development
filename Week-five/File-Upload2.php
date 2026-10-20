
<?php
$message = "";
$uploadedImage = "";
$registeredName = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");

    if ($name === "") {
        $message = "Please enter your full name.";
    } elseif (
        !isset($_FILES["profile"]) ||
        $_FILES["profile"]["error"] !== UPLOAD_ERR_OK
    ) {
        $message = "Please select an image.";
    } else {
        $file = $_FILES["profile"];
        $extension = strtolower(
            pathinfo($file["name"], PATHINFO_EXTENSION)
        );

        $allowed = [
            "jpg" => "image/jpeg",
            "jpeg" => "image/jpeg",
            "png" => "image/png",
            "gif" => "image/gif"
        ];

        $imageInfo = @getimagesize($file["tmp_name"]);

        if ($file["size"] > 2097152) {
            $message = "Image must not exceed 2 MB.";
        } elseif (!isset($allowed[$extension])) {
            $message = "Only JPG, JPEG, PNG, and GIF are allowed.";
        } elseif (
            $imageInfo === false ||
            $imageInfo["mime"] !== $allowed[$extension]
        ) {
            $message = "Invalid image file.";
        } else {
            $directory = __DIR__ . "/Images/";

            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $filename = bin2hex(random_bytes(16)) . "." . $extension;

            if (move_uploaded_file(
                $file["tmp_name"],
                $directory . $filename
            )) {
                $message = "Registration successful!";
                $registeredName = $name;
                $uploadedImage = "Images/" . $filename;
            } else {
                $message = "Upload failed. Please try again.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="text-center mb-4">
        <h2 class="fw-bold">Registration System</h2>
        <p class="text-muted">Register and view your information</p>
    </div>

    <?php if ($message !== ""): ?>
        <div class="alert <?= $uploadedImage ? 'alert-success' : 'alert-danger' ?>">
            <?= htmlspecialchars($message, ENT_QUOTES, "UTF-8") ?>
        </div>
    <?php endif; ?>

    <div class="row g-4">

        <!-- LEFT COLUMN: FORM -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">Registration Form</h5>
                </div>

                <div class="card-body p-4">

                    <form method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Full Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                placeholder="Enter your full name"
                                maxlength="100"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label for="profile" class="form-label">
                                Profile Picture
                            </label>

                            <input
                                type="file"
                                name="profile"
                                id="profile"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.gif"
                                required
                            >

                            <div class="form-text">
                                JPG, PNG, or GIF — maximum 2 MB.
                            </div>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary w-100"
                        >
                            Register
                        </button>

                    </form>

                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN: DATA -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="mb-0">Registration Data</h5>
                </div>

                <div class="card-body p-4">

                    <?php if ($uploadedImage !== ""): ?>

                        <div class="text-center mb-4">
                            <img
                                src="<?= htmlspecialchars($uploadedImage, ENT_QUOTES, "UTF-8") ?>"
                                alt="Profile picture"
                                class="rounded-circle border shadow-sm"
                                width="120"
                                height="120"
                                style="object-fit: cover;"
                            >
                        </div>

                        <table class="table table-bordered align-middle">
                            <tr>
                                <th class="table-light" style="width: 40%;">
                                    Full Name
                                </th>
                                <td>
                                    <?= htmlspecialchars($registeredName, ENT_QUOTES, "UTF-8") ?>
                                </td>
                            </tr>

                            <tr>
                                <th class="table-light">Image Name</th>
                                <td>
                                    <?= htmlspecialchars(basename($uploadedImage), ENT_QUOTES, "UTF-8") ?>
                                </td>
                            </tr>

                            <tr>
                                <th class="table-light">Status</th>
                                <td>
                                    <span class="badge bg-success">
                                        Registered
                                    </span>
                                </td>
                            </tr>
                        </table>

                    <?php else: ?>

                        <div class="text-center text-muted py-5">
                            <h6>No registration data yet</h6>
                            <p class="mb-0">
                                Complete the form and click Register.
                                Your data will appear here.
                            </p>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>

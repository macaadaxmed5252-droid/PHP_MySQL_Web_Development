<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        :root {
            --primary: #1f4f8f;
            --primary-dark: #12355f;
            --accent: #16a085;
            --warning: #f4b942;
            --danger: #e45d4f;
            --ink: #1b2430;
            --muted: #64748b;
            --surface: #ffffff;
            --soft: #eef4fb;
            --line: #dbe5ef;
        }

        * {
            letter-spacing: 0;
        }

        body {
            min-height: 100vh;
            background:
                linear-gradient(135deg, rgba(31, 79, 143, 0.08), rgba(22, 160, 133, 0.08)),
                #f6f8fb;
            color: var(--ink);
            font-family: "Segoe UI", Arial, sans-serif;
        }

        .app-navbar {
            background: var(--surface);
            border-bottom: 1px solid var(--line);
            box-shadow: 0 8px 24px rgba(31, 79, 143, 0.08);
        }

        .navbar-brand {
            color: var(--primary-dark) !important;
            font-weight: 800;
        }

        .brand-mark {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: var(--primary);
            color: #fff;
            margin-right: 10px;
        }

        .navbar .nav-link {
            color: var(--muted) !important;
            font-weight: 600;
        }

        .navbar .nav-link.active,
        .navbar .nav-link:hover {
            color: var(--primary) !important;
        }

        .page-shell {
            padding: 28px 0;
        }

        .sidebar {
            position: sticky;
            top: 88px;
            align-self: flex-start;
            min-height: calc(100vh - 116px);
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 8px;
            box-shadow: 0 12px 32px rgba(15, 23, 42, 0.08);
        }

        .sidebar-title {
            color: var(--primary-dark);
            font-size: 0.9rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            margin-bottom: 8px;
            border-radius: 8px;
            color: var(--muted);
            text-decoration: none;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        .sidebar-link i {
            width: 18px;
            color: var(--primary);
        }

        .sidebar-link:hover,
        .sidebar-link:focus {
            background: var(--soft);
            color: var(--primary-dark);
            transform: translateX(3px);
        }

        .hero-panel {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary) 55%, var(--accent));
            color: #fff;
            padding: 34px;
            margin-bottom: 24px;
            box-shadow: 0 18px 40px rgba(31, 79, 143, 0.22);
        }

        .hero-panel h1 {
            max-width: 720px;
            font-size: clamp(2rem, 4vw, 3.6rem);
            font-weight: 800;
            line-height: 1.05;
            margin-bottom: 14px;
        }

        .hero-panel p {
            max-width: 680px;
            color: rgba(255, 255, 255, 0.86);
            font-size: 1.05rem;
            margin-bottom: 22px;
        }

        .hero-stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            max-width: 620px;
        }

        .stat-box {
            min-height: 88px;
            border: 1px solid rgba(255, 255, 255, 0.24);
            border-radius: 8px;
            padding: 14px;
            background: rgba(255, 255, 255, 0.12);
        }

        .stat-box strong {
            display: block;
            font-size: 1.7rem;
            line-height: 1;
        }

        .stat-box span {
            color: rgba(255, 255, 255, 0.78);
            font-size: 0.86rem;
        }

        .section-bg {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 8px;
            box-shadow: 0 12px 32px rgba(15, 23, 42, 0.07);
            margin-bottom: 24px;
            padding: 24px;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 18px;
        }

        .section-header h2 {
            font-size: 1.35rem;
            font-weight: 800;
            margin: 0;
        }

        .section-kicker {
            color: var(--muted);
            font-size: 0.92rem;
            margin: 4px 0 0;
        }

        .badge-soft {
            border-radius: 999px;
            background: var(--soft);
            color: var(--primary);
            padding: 7px 12px;
            font-weight: 800;
            white-space: nowrap;
        }

        .student-card,
        .course-card {
            height: 100%;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: #fff;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .student-card:hover,
        .course-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 30px rgba(15, 23, 42, 0.12);
        }

        .avatar {
            width: 58px;
            height: 58px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            color: #fff;
            font-weight: 900;
            font-size: 1.1rem;
        }

        .avatar-blue {
            background: var(--primary);
        }

        .avatar-green {
            background: var(--accent);
        }

        .avatar-gold {
            background: var(--warning);
            color: #3d2c04;
        }

        .meta-list {
            margin: 16px 0;
            color: var(--muted);
            font-size: 0.95rem;
        }

        .meta-list span {
            display: block;
            margin-bottom: 7px;
        }

        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
            border-radius: 8px;
            font-weight: 700;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-outline-primary {
            color: var(--primary);
            border-color: var(--primary);
            border-radius: 8px;
            font-weight: 700;
        }

        .btn-outline-primary:hover {
            background: var(--primary);
            border-color: var(--primary);
        }

        .course-icon {
            width: 44px;
            height: 44px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: var(--soft);
            color: var(--primary);
            margin-bottom: 16px;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            border-bottom: 1px solid var(--line);
            color: var(--muted);
            font-size: 0.78rem;
            text-transform: uppercase;
        }

        .grade-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            padding: 5px 10px;
            border-radius: 999px;
            background: rgba(22, 160, 133, 0.12);
            color: #0d7f69;
            font-weight: 800;
        }

        .event-list .list-group-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            border-color: var(--line);
            padding: 16px;
        }

        .event-date {
            color: var(--primary);
            font-weight: 800;
            white-space: nowrap;
        }

        .footer {
            background: var(--primary-dark);
            color: rgba(255, 255, 255, 0.84);
            border-top: 4px solid var(--accent);
        }

        @media (max-width: 991.98px) {
            .sidebar {
                position: static;
                min-height: auto;
                margin-bottom: 20px;
            }
        }

        @media (max-width: 575.98px) {
            .page-shell {
                padding: 18px 0;
            }

            .hero-panel,
            .section-bg {
                padding: 20px;
            }

            .hero-stats {
                grid-template-columns: 1fr;
            }

            .section-header,
            .event-list .list-group-item {
                align-items: flex-start;
                flex-direction: column;
            }

            .event-date {
                white-space: normal;
            }
        }
    </style>
</head>
<body>
    <?php include_once("navBar.php"); ?>

    <div class="container-fluid page-shell">
        <div class="row g-4">
            <?php include_once("Sidebar.php"); ?>
            <?php include_once("Content.php"); ?>
        </div>
    </div>

    <?php include_once("Footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>

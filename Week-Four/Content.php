<main class="col-lg-9 col-xl-10">
    <section id="dashboard" class="hero-panel">
        <span class="badge-soft bg-white text-primary mb-3 d-inline-flex">Student Portal</span>
        <h1>Manage students, courses, grades, and events from one clean dashboard.</h1>
        <p>
            A polished student management workspace built with PHP includes and Bootstrap, designed to be easy to scan and simple to extend.
        </p>
        <div class="hero-stats">
            <div class="stat-box">
                <strong>128</strong>
                <span>Active students</span>
            </div>
            <div class="stat-box">
                <strong>12</strong>
                <span>Open courses</span>
            </div>
            <div class="stat-box">
                <strong>94%</strong>
                <span>Average progress</span>
            </div>
        </div>
    </section>

    <section id="students" class="section-bg">
        <div class="section-header">
            <div>
                <h2>Student Profiles</h2>
                <p class="section-kicker">Quick access to student details and academic status.</p>
            </div>
            <span class="badge-soft">3 featured</span>
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <div class="student-card p-3">
                    <div class="d-flex align-items-center gap-3">
                        <span class="avatar avatar-blue">S1</span>
                        <div>
                            <h5 class="mb-1">Student 1</h5>
                            <span class="text-muted">Computer Science</span>
                        </div>
                    </div>
                    <div class="meta-list">
                        <span><i class="fas fa-star me-2 text-warning"></i>Grade: A</span>
                        <span><i class="fas fa-envelope me-2 text-primary"></i>student1@example.com</span>
                    </div>
                    <a href="#" class="btn btn-outline-primary w-100">View Profile</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="student-card p-3">
                    <div class="d-flex align-items-center gap-3">
                        <span class="avatar avatar-green">S2</span>
                        <div>
                            <h5 class="mb-1">Student 2</h5>
                            <span class="text-muted">Mathematics</span>
                        </div>
                    </div>
                    <div class="meta-list">
                        <span><i class="fas fa-star me-2 text-warning"></i>Grade: B</span>
                        <span><i class="fas fa-envelope me-2 text-primary"></i>student2@example.com</span>
                    </div>
                    <a href="#" class="btn btn-outline-primary w-100">View Profile</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="student-card p-3">
                    <div class="d-flex align-items-center gap-3">
                        <span class="avatar avatar-gold">S3</span>
                        <div>
                            <h5 class="mb-1">Student 3</h5>
                            <span class="text-muted">Physics</span>
                        </div>
                    </div>
                    <div class="meta-list">
                        <span><i class="fas fa-star me-2 text-warning"></i>Grade: A</span>
                        <span><i class="fas fa-envelope me-2 text-primary"></i>student3@example.com</span>
                    </div>
                    <a href="#" class="btn btn-outline-primary w-100">View Profile</a>
                </div>
            </div>
        </div>
    </section>

    <section id="courses" class="section-bg">
        <div class="section-header">
            <div>
                <h2>Courses Offered</h2>
                <p class="section-kicker">Organized learning paths with clear enrollment actions.</p>
            </div>
            <span class="badge-soft">12 courses</span>
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <div class="course-card p-3">
                    <span class="course-icon"><i class="fas fa-laptop-code"></i></span>
                    <h5>Computer Science</h5>
                    <p class="text-muted">Introduction to programming, algorithms, and systems thinking.</p>
                    <a href="#" class="btn btn-primary w-100">Enroll Now</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="course-card p-3">
                    <span class="course-icon"><i class="fas fa-square-root-alt"></i></span>
                    <h5>Mathematics</h5>
                    <p class="text-muted">Practical mathematics for science, engineering, and analytics.</p>
                    <a href="#" class="btn btn-primary w-100">Enroll Now</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="course-card p-3">
                    <span class="course-icon"><i class="fas fa-atom"></i></span>
                    <h5>Physics</h5>
                    <p class="text-muted">Core physics concepts with applied problem solving sessions.</p>
                    <a href="#" class="btn btn-primary w-100">Enroll Now</a>
                </div>
            </div>
        </div>
    </section>

    <section id="grades" class="section-bg">
        <div class="section-header">
            <div>
                <h2>Grades Overview</h2>
                <p class="section-kicker">A simple table for tracking current student performance.</p>
            </div>
            <span class="badge-soft">Updated</span>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Course</th>
                        <th>Grade</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Student 1</td>
                        <td>Computer Science</td>
                        <td><span class="grade-pill">A</span></td>
                        <td class="text-success fw-bold">Excellent</td>
                    </tr>
                    <tr>
                        <td>Student 2</td>
                        <td>Mathematics</td>
                        <td><span class="grade-pill">B</span></td>
                        <td class="text-primary fw-bold">On track</td>
                    </tr>
                    <tr>
                        <td>Student 3</td>
                        <td>Physics</td>
                        <td><span class="grade-pill">A</span></td>
                        <td class="text-success fw-bold">Excellent</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section id="events" class="section-bg">
        <div class="section-header">
            <div>
                <h2>Upcoming Events</h2>
                <p class="section-kicker">Important academic dates for the student community.</p>
            </div>
            <span class="badge-soft">3 events</span>
        </div>

        <ul class="list-group event-list">
            <li class="list-group-item">
                <span><i class="fas fa-flag me-2 text-primary"></i>Orientation Day</span>
                <span class="event-date">September 10, 2026</span>
            </li>
            <li class="list-group-item">
                <span><i class="fas fa-file-alt me-2 text-primary"></i>Midterm Exams</span>
                <span class="event-date">October 15-20, 2026</span>
            </li>
            <li class="list-group-item">
                <span><i class="fas fa-briefcase me-2 text-primary"></i>Career Fair</span>
                <span class="event-date">November 5, 2026</span>
            </li>
        </ul>
    </section>

    <div class="row g-3">
        <div class="col-lg-7">
            <section id="about" class="section-bg h-100">
                <div class="section-header">
                    <div>
                        <h2>About Us</h2>
                        <p class="section-kicker">Built for clarity, speed, and maintainability.</p>
                    </div>
                </div>
                <p class="text-muted mb-0">
                    The Student Management System helps students and administrators manage profiles, courses, grades, and important dates from one organized interface.
                </p>
            </section>
        </div>

        <div class="col-lg-5">
            <section id="contact" class="section-bg h-100">
                <div class="section-header">
                    <div>
                        <h2>Contact Us</h2>
                        <p class="section-kicker">Support for account and course questions.</p>
                    </div>
                </div>
                <a class="btn btn-primary w-100" href="mailto:support@school.com">
                    <i class="fas fa-envelope me-2"></i>support@school.com
                </a>
            </section>
        </div>
    </div>
</main>

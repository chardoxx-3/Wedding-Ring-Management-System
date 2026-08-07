<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JewelSys | Elegant Wedding Rings</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-gold: #D4AF37;
            --primary-dark: #0f2823; /* Deep Emerald */
            --primary-light: #f8f5f2; /* Warm Off-white */
            --accent-gold: #c5a028;
            --text-dark: #2c2c2c;
            --glass-bg: rgba(255, 255, 255, 0.95);
        }

        body {
            font-family: 'Lato', sans-serif;
            background-color: var(--primary-light);
            color: var(--text-dark);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-image: url('https://www.transparenttextures.com/patterns/cubes.png'); /* Subtle texture */
        }

        h1, h2, h3, h4, h5, .navbar-brand, .serif-font {
            font-family: 'Cinzel', serif; /* More luxurious serif */
        }

        /* Navbar Styling */
        .navbar {
            background-color: var(--primary-dark) !important;
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-size: 1.5rem;
            letter-spacing: 2px;
            color: var(--primary-gold) !important;
        }

        .nav-link {
            color: rgba(255,255,255,0.7) !important;
            font-weight: 300;
            letter-spacing: 1px;
            transition: color 0.3s;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary-gold) !important;
        }

        /* Buttons */
        .btn-primary {
            background: linear-gradient(45deg, var(--primary-gold), var(--accent-gold));
            border: none;
            color: white;
            padding: 0.6rem 1.5rem;
            letter-spacing: 1px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.4);
            background: linear-gradient(45deg, var(--accent-gold), var(--primary-gold));
            color: white;
        }

        .btn-outline-light {
            border-color: var(--primary-gold);
            color: var(--primary-gold);
        }
        
        .btn-outline-light:hover {
            background-color: var(--primary-gold);
            border-color: var(--primary-gold);
        }

        /* Forms & Inputs */
        .form-control {
            border: 1px solid #e0e0e0;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            background-color: #fcfcfc;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
            border-color: var(--primary-gold);
        }

        .form-floating label {
            color: #888;
        }

        /* Footer */
        .footer {
            background-color: var(--primary-dark);
            color: rgba(255,255,255,0.6);
            border-top: 4px solid var(--primary-gold);
        }

        /* Utilities */
        .text-gold { color: var(--primary-gold) !important; }
        .bg-emerald { background-color: var(--primary-dark) !important; }
        
        /* Card Animations */
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="bi bi-diamond-half me-2"></i>JEWELSYS
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <?php if(session()->get('is_logged_in')): ?>
    <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
    <li class="nav-item"><a class="nav-link" href="/rings">Collections</a></li>
    <li class="nav-item"><a class="nav-link" href="/reservations/history">Orders</a></li>
    <!-- Add Profile Link Here -->
    <li class="nav-item"><a class="nav-link" href="/profile">Profile</a></li>
    <li class="nav-item ms-lg-3 d-flex align-items-center">
        <span class="text-white-50 me-3 small text-uppercase ls-1"><?= esc(session()->get('name')) ?></span>
        <a href="/auth/logout" class="btn btn-outline-light btn-sm rounded-0 px-4">LOGOUT</a>
    </li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="/auth/login">Sign In</a></li>
                        <li class="nav-item ms-lg-2">
                            <a class="btn btn-primary rounded-0 px-4" href="/auth/register">Get Started</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content py-5">
        <div class="container">
            <!-- Flash Messages -->
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger border-0 shadow-sm rounded-0 mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i><?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success border-0 shadow-sm rounded-0 mb-4 bg-success text-white" role="alert">
                    <i class="bi bi-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container text-center">
            <div class="mb-3">
                <i class="bi bi-gem text-gold fs-4"></i>
            </div>
            <h5 class="text-white serif-font mb-3">JEWELSYS</h5>
            <p class="small mb-4">Crafting eternal moments through exquisite design.</p>
            <p class="mb-0 small opacity-50">&copy; <?= date('Y') ?> JewelSys Wedding Rings. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
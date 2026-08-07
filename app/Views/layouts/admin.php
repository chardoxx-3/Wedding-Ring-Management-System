<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - JewelSys</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Cinzel:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --sidebar-bg: #0f2823; /* Deep Emerald */
            --sidebar-active: #1c423b;
            --accent-gold: #D4AF37;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
        
        /* Sidebar */
        .sidebar {
            height: 100vh;
            width: 260px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: var(--sidebar-bg);
            color: white;
            z-index: 1000;
            transition: all 0.3s;
        }
        
        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .brand-text {
            font-family: 'Cinzel', serif;
            letter-spacing: 1px;
            color: var(--accent-gold);
        }

        .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 14px 24px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            border-left: 4px solid transparent;
            transition: all 0.2s;
        }
        
        .nav-link i { font-size: 1.1rem; }
        
        .nav-link:hover {
            color: #fff;
            background-color: rgba(255,255,255,0.05);
        }
        
        .nav-link.active {
            background-color: var(--sidebar-active);
            color: var(--accent-gold);
            border-left-color: var(--accent-gold);
            font-weight: 500;
        }

        /* Main Wrapper */
        .main-wrapper {
            margin-left: 260px;
            padding: 2rem;
            min-height: 100vh;
        }

        .admin-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            border: none;
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .main-wrapper { margin-left: 0; }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <div class="sidebar-header d-flex align-items-center gap-2">
            <i class="bi bi-diamond-fill text-warning"></i>
            <h5 class="m-0 brand-text">JEWELSYS ADMIN</h5>
        </div>

        <div class="mt-4">
            <p class="px-4 text-uppercase text-muted small fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">Management</p>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link <?= uri_string() == 'admin/dashboard' ? 'active' : '' ?>" href="/admin/dashboard">
                        <i class="bi bi-grid-1x2 me-3"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= strpos(uri_string(), 'admin/rings') !== false ? 'active' : '' ?>" href="/admin/rings">
                        <i class="bi bi-gem me-3"></i> Ring Catalog
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/reservations">
                        <i class="bi bi-calendar-check me-3"></i> Reservations
                    </a>
                </li>
                <li class="nav-item">
<a class="nav-link" href="/admin/customers"><i class="bi bi-people me-2"></i> Customers</a>
                </li>
            </ul>

            <p class="px-4 mt-4 text-uppercase text-muted small fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">Analytics</p>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/reports">
                        <i class="bi bi-bar-chart me-3"></i> Sales Reports
                    </a>
                </li>
            </ul>
            <!-- Add this after the existing Management menu items -->
<li class="nav-item">
    <a class="nav-link <?= uri_string() == 'admin/profile' ? 'active' : '' ?>" href="/admin/profile">
        <i class="bi bi-person-circle me-3"></i> My Profile
    </a>
</li>
        </div>

        <div class="mt-auto mb-4 px-3">
            <a href="/auth/logout" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-box-arrow-right"></i> Sign Out
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-wrapper">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 bg-white" role="alert">
                    <i class="bi bi-check-circle-fill text-success me-2"></i><?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
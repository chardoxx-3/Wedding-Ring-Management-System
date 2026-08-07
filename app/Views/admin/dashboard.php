<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-4 mb-4 border-bottom">
    <div>
        <h1 class="h2 brand-text text-dark">Dashboard</h1>
        <p class="text-muted small mb-0">Overview for <?= date('l, F j, Y') ?></p>
    </div>
<div class="btn-toolbar mb-2 mb-md-0">
    <button type="button" class="btn btn-sm btn-outline-dark d-flex align-items-center gap-2" onclick="printDashboardReport()">
        <i class="bi bi-printer"></i> Print Report
    </button>
</div>
</div>

<div class="row g-4 mb-5">
    <!-- Total Inventory Card -->
    <div class="col-12 col-md-6 col-xl-4">
        <div class="card admin-card h-100 position-relative overflow-hidden">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="mb-1 text-muted text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 1px;">Collection Size</p>
                        <h2 class="fw-bold mb-0 text-dark"><?= $total_rings ?></h2>
                    </div>
                    <div class="p-3 rounded-circle" style="background-color: rgba(212, 175, 55, 0.1); color: #D4AF37;">
                        <i class="bi bi-gem fs-4"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-success small fw-bold"><i class="bi bi-arrow-up"></i> Live</span>
                    <span class="text-muted small ms-1">items in catalog</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Reservations Card -->
    <div class="col-12 col-md-6 col-xl-4">
        <div class="card admin-card h-100">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="mb-1 text-muted text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 1px;">Active Orders</p>
                        <h2 class="fw-bold mb-0 text-dark"><?= $active_reservations ?></h2>
                    </div>
                    <div class="p-3 rounded-circle" style="background-color: rgba(15, 40, 35, 0.1); color: #0f2823;">
                        <i class="bi bi-bag-check fs-4"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-muted small">Paid & Processing</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Actions Card -->
    <div class="col-12 col-md-6 col-xl-4">
        <div class="card admin-card h-100">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="mb-1 text-muted text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 1px;">Pending Approval</p>
                        <h2 class="fw-bold mb-0 text-dark"><?= $pending_reservations ?></h2>
                    </div>
                    <div class="p-3 rounded-circle" style="background-color: rgba(220, 53, 69, 0.1); color: #dc3545;">
                        <i class="bi bi-hourglass-split fs-4"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-danger small fw-bold">Action Required</span>
                    <span class="text-muted small ms-1">reviews needed</span>
                </div>
            </div>
        </div>
    </div>
</div>

<h5 class="brand-text mb-3">Management Tools</h5>
<div class="row g-3">
    <div class="col-md-4">
        <a href="/admin/rings/create" class="card admin-card text-decoration-none h-100 transition-hover">
            <div class="card-body d-flex align-items-center p-4">
                <div class="bg-light p-3 rounded me-3 text-dark"><i class="bi bi-plus-lg"></i></div>
                <div>
                    <h6 class="fw-bold text-dark mb-0">Add New Ring</h6>
                    <small class="text-muted">Upload new inventory</small>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="/admin/reservations" class="card admin-card text-decoration-none h-100 transition-hover">
            <div class="card-body d-flex align-items-center p-4">
                <div class="bg-light p-3 rounded me-3 text-dark"><i class="bi bi-list-check"></i></div>
                <div>
                    <h6 class="fw-bold text-dark mb-0">Manage Orders</h6>
                    <small class="text-muted">Process customer requests</small>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="/admin/reports" class="card admin-card text-decoration-none h-100 transition-hover">
            <div class="card-body d-flex align-items-center p-4">
                <div class="bg-light p-3 rounded me-3 text-dark"><i class="bi bi-graph-up"></i></div>
                <div>
                    <h6 class="fw-bold text-dark mb-0">Sales Report</h6>
                    <small class="text-muted">View financial insights</small>
                </div>
            </div>
        </a>
    </div>
</div>

<script>
function printDashboardReport() {
    // Open a new window for printing
    const printWindow = window.open('/admin/print-dashboard', '_blank');
    
    // Focus the new window (optional)
    if (printWindow) {
        printWindow.focus();
    }
}
</script>
<?= $this->endSection() ?>
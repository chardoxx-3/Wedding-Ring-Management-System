<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 brand-text text-dark">Financial Insights</h2>
<button onclick="window.open('<?= site_url('admin/reports/print') ?>', '_blank')" class="btn btn-outline-dark btn-sm d-flex align-items-center gap-2">
    <i class="bi bi-printer"></i> Print Statement
</button>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card admin-card border-0 p-5">
            <!-- Report Header -->
            <div class="text-center mb-5 border-bottom pb-4">
                <i class="bi bi-gem text-warning fs-1 mb-2"></i>
                <h3 class="fw-bold text-uppercase brand-text mb-1">Sales & Inventory Report</h3>
                <p class="text-muted small">Generated on: <?= date('F d, Y • h:i A', strtotime($generated_at)) ?></p>
            </div>

            <!-- Revenue Section -->
            <div class="row mb-5 justify-content-center">
                <div class="col-md-8">
                    <div class="p-4 rounded-3 text-center" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                        <p class="text-uppercase text-muted fw-bold small mb-2 letter-spacing-1">Total Verified Revenue</p>
                        <h1 class="display-3 fw-bold" style="color: #0f2823; font-family: 'Cinzel', serif;">
                            $<?= number_format($total_sales, 2) ?>
                        </h1>
                    </div>
                </div>
            </div>

            <!-- Detailed Stats -->
            <h6 class="text-uppercase text-muted fw-bold small mb-3 letter-spacing-1">Operational Metrics</h6>
            <div class="table-responsive">
                <table class="table table-borderless align-middle">
                    <thead class="border-bottom border-2">
                        <tr class="text-muted small text-uppercase">
                            <th class="py-3">Metric Category</th>
                            <th class="text-end py-3">Volume</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-bottom">
                            <td class="py-3">
                                <span class="fw-bold text-dark">Completed Orders</span>
                                <div class="small text-muted">Successfully delivered and finalized</div>
                            </td>
                            <td class="text-end fw-bold fs-5 text-success"><?= $completed_orders ?></td>
                        </tr>
                        <tr class="border-bottom">
                            <td class="py-3">
                                <span class="fw-bold text-dark">Active (Paid) Orders</span>
                                <div class="small text-muted">Payment received, processing in progress</div>
                            </td>
                            <td class="text-end fw-bold fs-5" style="color: #D4AF37;"><?= $active_orders ?></td>
                        </tr>
                        <tr>
                            <td class="py-3">
                                <span class="fw-bold text-dark">Pending Reservations</span>
                                <div class="small text-muted">Awaiting payment or confirmation</div>
                            </td>
                            <td class="text-end fw-bold fs-5 text-secondary"><?= $pending_orders ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-5 pt-4 text-center border-top">
                <small class="text-muted">JewelSys Management System • Confidential Internal Report</small>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
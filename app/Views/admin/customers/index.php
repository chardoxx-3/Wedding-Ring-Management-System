<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h3 brand-text text-dark">Clientele</h2>
        <p class="text-muted small mb-0">Overview of registered members</p>
    </div>
    <div class="d-flex align-items-center bg-white px-3 py-2 rounded border shadow-sm">
        <i class="bi bi-people text-warning me-2"></i>
        <span class="fw-bold text-dark"><?= count($customers) ?></span>
        <span class="text-muted small ms-1">Active Accounts</span>
    </div>
</div>

<div class="card admin-card overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light">
                <tr>
                    <th class="ps-4 py-3 text-uppercase text-muted small fw-bold" style="letter-spacing: 1px;">ID</th>
                    <th class="text-uppercase text-muted small fw-bold" style="letter-spacing: 1px;">Customer Profile</th>
                    <th class="text-uppercase text-muted small fw-bold" style="letter-spacing: 1px;">Contact Info</th>
                    <th class="text-uppercase text-muted small fw-bold" style="letter-spacing: 1px;">Joined Date</th>
                    <th class="text-end pe-4 text-uppercase text-muted small fw-bold" style="letter-spacing: 1px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($customers)): ?>
                    <?php foreach($customers as $customer): ?>
                    <tr>
                        <td class="ps-4 text-secondary font-monospace">#<?= str_pad($customer['id'], 4, '0', STR_PAD_LEFT) ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <!-- Avatar Initials/Icon -->
                                <div class="rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 40px; height: 40px; background-color: rgba(15, 40, 35, 0.05); color: #0f2823;">
                                    <span class="fw-bold small"><?= strtoupper(substr($customer['name'], 0, 1)) ?></span>
                                </div>
                                <div>
                                    <span class="d-block fw-bold text-dark"><?= esc($customer['name']) ?></span>
                                    <small class="text-muted">Member</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="mailto:<?= esc($customer['email']) ?>" class="text-decoration-none text-muted d-flex align-items-center gap-2 group-hover">
                                <i class="bi bi-envelope small"></i>
                                <span><?= esc($customer['email']) ?></span>
                            </a>
                        </td>
                        <td class="text-muted small">
                            <?= date('M d, Y', strtotime($customer['created_at'])) ?>
                        </td>
                        <td class="text-end pe-4">
                            <span class="badge border border-success text-success bg-success bg-opacity-10 rounded-pill px-3">Active</span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div class="text-muted opacity-50">
                                <i class="bi bi-people display-4 mb-3 d-block"></i>
                                <p>No customers registered yet.</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
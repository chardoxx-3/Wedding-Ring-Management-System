<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h3 brand-text">Reservation Management</h2>
    <div class="d-flex gap-2">
        <input type="text" class="form-control form-control-sm" style="width: 200px;" placeholder="Search Order #...">
    </div>
</div>

<div class="card admin-card overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead style="background-color: #f8f9fa;">
                <tr>
                    <th class="ps-4 py-3 text-uppercase text-muted small fw-bold" style="letter-spacing: 1px;">Order ID</th>
                    <th class="text-uppercase text-muted small fw-bold" style="letter-spacing: 1px;">Customer Details</th>
                    <th class="text-uppercase text-muted small fw-bold" style="letter-spacing: 1px;">Item</th>
                    <th class="text-uppercase text-muted small fw-bold" style="letter-spacing: 1px;">Date</th>
                    <th class="text-uppercase text-muted small fw-bold" style="letter-spacing: 1px;">Status</th>
                    <th class="text-end pe-4 text-uppercase text-muted small fw-bold" style="letter-spacing: 1px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($reservations)): ?>
                    <?php foreach($reservations as $res): ?>
                    <tr>
                        <td class="ps-4 text-secondary font-monospace">#<?= str_pad($res['id'], 5, '0', STR_PAD_LEFT) ?></td>
                        <td>
                            <div class="fw-bold text-dark"><?= esc($res['customer_name']) ?></div>
                            <small class="text-muted">Verified Customer</small>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded p-1 me-2 border d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                    <i class="bi bi-gem text-muted small"></i>
                                </div>
                                <div>
                                    <span class="d-block text-dark fw-medium"><?= esc($res['ring_name']) ?></span>
                                    <small class="text-muted" style="font-size: 0.8rem;">Size: <?= esc($res['custom_size'] ?: 'Std') ?></small>
                                </div>
                            </div>
                        </td>
                        <td class="text-muted small"><?= date('M d, Y', strtotime($res['created_at'])) ?></td>
                        <td>
                            <?php 
                                $statusStyles = [
                                    'pending'   => 'background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba;',
                                    'paid'      => 'background-color: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb;',
                                    'completed' => 'background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb;',
                                    'cancelled' => 'background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;'
                                ];
                                $style = $statusStyles[$res['status']] ?? 'background-color: #e2e3e5; color: #383d41;';
                            ?>
                            <span class="badge rounded-pill fw-normal px-3 py-2" style="<?= $style ?>">
                                <?= ucfirst($res['status']) ?>
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <form action="/admin/reservations/updateStatus" method="post" class="d-inline">
                                <input type="hidden" name="reservation_id" value="<?= $res['id'] ?>">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-white border dropdown-toggle text-muted" type="button" data-bs-toggle="dropdown">
                                        Manage
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                        <li><h6 class="dropdown-header text-uppercase small">Update Status</h6></li>
                                        <li><button class="dropdown-item" name="status" value="paid" type="submit"><span class="badge bg-info me-2">●</span> Mark Paid</button></li>
                                        <li><button class="dropdown-item" name="status" value="completed" type="submit"><span class="badge bg-success me-2">●</span> Mark Completed</button></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><button class="dropdown-item text-danger" name="status" value="cancelled" type="submit"><i class="bi bi-x-circle me-2"></i>Cancel Order</button></li>
                                    </ul>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="bi bi-inbox text-muted fs-1 d-block mb-2"></i>
                            <span class="text-muted">No reservations found.</span>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
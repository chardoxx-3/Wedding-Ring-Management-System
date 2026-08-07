<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-5">
    <div>
        <h2 class="fw-bold serif-font text-dark">Order History</h2>
        <p class="text-muted mb-0 fw-light">Track your past and current reservations.</p>
    </div>
</div>

<div class="card shadow-sm border-0 rounded-0 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-uppercase small text-muted fw-bold ls-1">Order ID</th>
                        <th class="text-uppercase small text-muted fw-bold ls-1">Item Details</th>
                        <th class="text-uppercase small text-muted fw-bold ls-1">Total</th>
                        <th class="text-uppercase small text-muted fw-bold ls-1">Date</th>
                        <th class="text-uppercase small text-muted fw-bold ls-1">Status</th>
                        <th class="text-end pe-4 text-uppercase small text-muted fw-bold ls-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($reservations)): ?>
                        <?php foreach($reservations as $res): ?>
                            <tr>
                                <td class="ps-4 text-muted font-monospace">#<?= str_pad($res['id'], 5, '0', STR_PAD_LEFT) ?></td>
                                <td class="py-3">
                                    <span class="d-block fw-bold text-dark serif-font"><?= esc($res['ring_name']) ?></span>
                                    <small class="text-muted">Size: <?= esc($res['custom_size']) ?></small>
                                </td>
                                <td class="fw-bold text-dark font-monospace">$<?= number_format($res['total_amount'], 2) ?></td>
                                <td class="text-muted small">
                                    <?php if($res['payment_date']): ?>
                                        <?= date('M d, Y', strtotime($res['payment_date'])) ?>
                                    <?php else: ?>
                                        <span class="text-muted fst-italic">--</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php 
                                        $statusClass = '';
                                        switch($res['status']) {
                                            case 'pending': $statusClass = 'bg-warning bg-opacity-10 text-warning border border-warning'; break;
                                            case 'paid': $statusClass = 'bg-info bg-opacity-10 text-info border border-info'; break;
                                            case 'completed': $statusClass = 'bg-success bg-opacity-10 text-success border border-success'; break;
                                            default: $statusClass = 'bg-secondary bg-opacity-10 text-secondary';
                                        }
                                    ?>
                                    <span class="badge rounded-pill fw-normal px-3 py-2 <?= $statusClass ?>"><?= ucfirst($res['status']) ?></span>
                                </td>
<!-- In history.php, replace the Receipt button section (around line 62-68): -->
<td class="text-end pe-4">
    <?php if($res['status'] == 'pending'): ?>
        <a href="/reservations/checkout/<?= $res['id'] ?>" class="btn btn-sm btn-dark rounded-0 px-4" style="background-color: #0f2823;">Pay Now</a>
    <?php else: ?>
        <a href="/reservations/receipt/<?= $res['id'] ?>" target="_blank" class="btn btn-sm btn-outline-secondary rounded-0 px-3">Receipt</a>
    <?php endif; ?>
</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="py-5">
                                    <i class="bi bi-bag text-muted display-4 d-block mb-3 opacity-25"></i>
                                    <h5 class="text-muted fw-light">You haven't placed any orders yet.</h5>
                                    <a href="/rings" class="btn btn-primary rounded-0 mt-3 px-4">Start Shopping</a>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
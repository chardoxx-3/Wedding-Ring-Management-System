<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="h3 brand-text text-dark">Ring Catalog</h2>
        <p class="text-muted small mb-0">Manage inventory, prices, and availability</p>
    </div>
    <a href="/admin/rings/create" class="btn btn-dark d-flex align-items-center gap-2" style="background-color: #0f2823;">
        <i class="bi bi-plus-lg"></i> Add New Ring
    </a>
</div>

<div class="card admin-card overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light">
                <tr>
                    <th class="ps-4 py-3 text-uppercase text-muted small fw-bold" style="letter-spacing: 1px;">Product Details</th>
                    <th class="text-uppercase text-muted small fw-bold" style="letter-spacing: 1px;">Material</th>
                    <th class="text-uppercase text-muted small fw-bold" style="letter-spacing: 1px;">Price</th>
                    <th class="text-uppercase text-muted small fw-bold" style="letter-spacing: 1px;">Status</th>
                    <th class="text-end pe-4 text-uppercase text-muted small fw-bold" style="letter-spacing: 1px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($rings)): ?>
                    <?php foreach($rings as $ring): ?>
                    <tr>
                        <td class="ps-4 py-3">
                            <div class="d-flex align-items-center">
                                <img src="/uploads/rings/<?= esc($ring['image']) ?>" alt="ring" class="rounded-3 border shadow-sm me-3" style="width: 70px; height: 70px; object-fit: cover;">
                                <div>
                                    <h6 class="mb-1 fw-bold text-dark"><?= esc($ring['name']) ?></h6>
                                    <small class="text-muted d-block text-truncate" style="max-width: 250px; font-weight: 300;">
                                        <?= esc($ring['description']) ?>
                                    </small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border fw-normal"><?= esc($ring['material']) ?></span>
                        </td>
                        <td>
                            <span class="fw-bold text-dark fs-6" style="font-family: 'Cinzel', serif;">$<?= number_format($ring['price'], 2) ?></span>
                        </td>
                        <td>
                            <?php if($ring['status'] == 'available'): ?>
                                <span class="badge border border-success text-success bg-success bg-opacity-10 rounded-pill px-3">Available</span>
                            <?php elseif($ring['status'] == 'reserved'): ?>
                                <span class="badge border border-warning text-warning bg-warning bg-opacity-10 rounded-pill px-3">Reserved</span>
                            <?php else: ?>
                                <span class="badge border border-secondary text-secondary bg-secondary bg-opacity-10 rounded-pill px-3">Sold Out</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-end pe-4">
                            <div class="btn-group">
                                <a href="/admin/rings/edit/<?= $ring['id'] ?>" class="btn btn-sm btn-white border text-dark" title="Edit">
                                    <i class="bi bi-pencil-fill small"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-white border text-danger" onclick="if(confirm('Delete this item?')) location.href='/admin/rings/delete/<?= $ring['id'] ?>'" title="Delete">
                                    <i class="bi bi-trash-fill small"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="text-muted">
                                <i class="bi bi-box-seam fs-1 d-block mb-3 opacity-50"></i>
                                <p>Your inventory is currently empty.</p>
                                <a href="/admin/rings/create" class="btn btn-outline-dark btn-sm mt-2">Add First Ring</a>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
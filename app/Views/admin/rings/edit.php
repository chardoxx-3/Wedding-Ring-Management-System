<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="d-flex align-items-center mb-4">
    <a href="/admin/rings" class="btn btn-outline-secondary btn-sm me-3 rounded-circle" style="width: 32px; height: 32px; padding: 0; display: flex; align-items: center; justify-content: center;"><i class="bi bi-arrow-left"></i></a>
    <h2 class="h3 brand-text mb-0">Edit Product</h2>
</div>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card admin-card border-0">
            <div class="card-body p-4 p-lg-5">
                <form action="/admin/rings/update/<?= $ring['id'] ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                        <div class="me-3">
                            <?php if($ring['image']): ?>
                                <img src="/uploads/rings/<?= esc($ring['image']) ?>" alt="current" class="rounded-circle shadow-sm" width="60" height="60" style="object-fit: cover;">
                            <?php else: ?>
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;"><i class="bi bi-image text-muted"></i></div>
                            <?php endif; ?>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-bold"><?= esc($ring['name']) ?></h5>
                            <small class="text-muted">SKU: #<?= $ring['id'] ?></small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                             <div class="mb-4">
                                <label class="form-label fw-bold text-dark">Ring Name</label>
                                <input type="text" name="name" class="form-control bg-light border-0" value="<?= esc($ring['name']) ?>" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-dark">Description</label>
                                <textarea name="description" class="form-control bg-light border-0" rows="4" required><?= esc($ring['description']) ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                             <div class="mb-3">
                                <label class="form-label fw-bold text-dark">Status</label>
                                <select name="status" class="form-select bg-white border-secondary text-dark">
                                    <option value="available" <?= $ring['status'] == 'available' ? 'selected' : '' ?>>Available</option>
                                    <option value="reserved" <?= $ring['status'] == 'reserved' ? 'selected' : '' ?>>Reserved</option>
                                    <option value="sold" <?= $ring['status'] == 'sold' ? 'selected' : '' ?>>Sold</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-dark">Material</label>
                            <select name="material" class="form-select bg-light border-0" required>
                                <option value="Gold" <?= $ring['material'] == 'Gold' ? 'selected' : '' ?>>Gold</option>
                                <option value="White Gold" <?= $ring['material'] == 'White Gold' ? 'selected' : '' ?>>White Gold</option>
                                <option value="Rose Gold" <?= $ring['material'] == 'Rose Gold' ? 'selected' : '' ?>>Rose Gold</option>
                                <option value="Platinum" <?= $ring['material'] == 'Platinum' ? 'selected' : '' ?>>Platinum</option>
                                <option value="Silver" <?= $ring['material'] == 'Silver' ? 'selected' : '' ?>>Silver</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-dark">Price ($)</label>
                            <input type="number" step="0.01" name="price" class="form-control bg-light border-0" value="<?= esc($ring['price']) ?>" required>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="form-label fw-bold text-dark">Update Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <div class="form-text">Leave blank to keep current image.</div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/admin/rings/delete/<?= $ring['id'] ?>" class="text-danger small text-decoration-none" onclick="return confirm('Delete this ring permanently?');">
                            <i class="bi bi-trash me-1"></i> Delete Product
                        </a>
                        <button type="submit" class="btn btn-dark px-5" style="background-color: #0f2823; border-color: #0f2823;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
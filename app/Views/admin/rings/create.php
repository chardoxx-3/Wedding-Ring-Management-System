<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="d-flex align-items-center mb-4">
    <a href="/admin/rings" class="btn btn-outline-secondary btn-sm me-3 rounded-circle" style="width: 32px; height: 32px; padding: 0; display: flex; align-items: center; justify-content: center;"><i class="bi bi-arrow-left"></i></a>
    <h2 class="h3 brand-text mb-0">Add to Collection</h2>
</div>

<div class="row">
    <!-- Form Section -->
    <div class="col-lg-8">
        <div class="card admin-card border-0">
            <div class="card-body p-4 p-lg-5">
                <form action="/admin/rings/store" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <h5 class="mb-4 pb-2 border-bottom text-muted text-uppercase small fw-bold letter-spacing-1">Product Details</h5>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Ring Name</label>
                        <input type="text" name="name" class="form-control form-control-lg bg-light border-0" placeholder="e.g. The Royal Sapphire Halo" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Description</label>
                        <textarea name="description" class="form-control bg-light border-0" rows="5" placeholder="Describe the cut, clarity, and unique features..." required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-dark">Material</label>
                            <select name="material" class="form-select form-select-lg bg-light border-0" required>
                                <option value="" selected disabled>Select Metal</option>
                                <option value="Gold">Yellow Gold (18K)</option>
                                <option value="White Gold">White Gold</option>
                                <option value="Rose Gold">Rose Gold</option>
                                <option value="Platinum">Platinum</option>
                                <option value="Silver">Sterling Silver</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-dark">Price ($)</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light border-0 text-muted">$</span>
                                <input type="number" step="0.01" name="price" class="form-control bg-light border-0" placeholder="0.00" required>
                            </div>
                        </div>
                    </div>

                    <h5 class="mb-4 mt-2 pb-2 border-bottom text-muted text-uppercase small fw-bold letter-spacing-1">Visuals</h5>

                    <div class="mb-5">
                        <label class="form-label fw-bold text-dark">Product Photography</label>
                        <div class="p-4 bg-light border border-dashed rounded-3 text-center">
                            <i class="bi bi-cloud-arrow-up text-muted fs-2 mb-2"></i>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                            <small class="text-muted d-block mt-2">High-resolution JPG or PNG recommended (Max 2MB)</small>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="/admin/rings" class="btn btn-light px-4">Cancel</a>
                        <button type="submit" class="btn btn-dark px-5" style="background-color: #0f2823; border-color: #0f2823;">Save to Catalog</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Helper Section -->
    <div class="col-lg-4">
        <div class="card bg-white border-0 shadow-sm mt-4 mt-lg-0">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3">Listing Tips</h6>
                <ul class="list-unstyled small text-muted mb-0 space-y-2">
                    <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Use clear, well-lit photos.</li>
                    <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Mention karat weight in description.</li>
                    <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Include sizing availability.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
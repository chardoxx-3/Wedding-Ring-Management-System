<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-4">
    <div class="mb-4">
        <a href="/rings" class="text-decoration-none text-muted small text-uppercase ls-1"><i class="bi bi-arrow-left me-2"></i> Back to Collection</a>
    </div>

    <div class="row g-lg-5">
        <!-- Product Image -->
        <div class="col-lg-7 mb-4 mb-lg-0">
            <div class="bg-white p-2 shadow-sm position-relative">
                <img src="/uploads/rings/<?= esc($ring['image']) ?>" alt="<?= esc($ring['name']) ?>" class="img-fluid w-100" style="object-fit: cover; min-height: 400px;">
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-lg-5">
            <div class="ps-lg-3">
                <span class="text-gold text-uppercase fw-bold ls-2 small"><?= esc($ring['material']) ?></span>
                <h1 class="fw-bold mb-2 serif-font text-dark display-6"><?= esc($ring['name']) ?></h1>
                <h3 class="text-muted fw-light mb-4 font-monospace">$<?= number_format($ring['price'], 2) ?></h3>

                <p class="text-muted fw-light mb-5 lh-lg"><?= esc($ring['description']) ?></p>

                <div class="card border-0 rounded-0 shadow-sm" style="background-color: #fcfcfc; border-left: 4px solid #D4AF37 !important;">
                    <div class="card-body p-4">
                        <h5 class="serif-font mb-4">Make a Reservation</h5>
                        
                        <form action="/reservations/create" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="ring_id" value="<?= $ring['id'] ?>">

                            <div class="mb-4">
                                <label class="form-label small fw-bold text-uppercase ls-1 text-muted">Select Size</label>
                                <select name="size" class="form-select border-0 bg-white shadow-sm py-2" required>
                                    <option value="" selected disabled>Choose your fit...</option>
                                    <option value="5">Size 5</option>
                                    <option value="6">Size 6</option>
                                    <option value="7">Size 7 (Standard)</option>
                                    <option value="8">Size 8</option>
                                    <option value="9">Size 9</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="engraving" value="1" id="engravingCheck">
                                    <label class="form-check-label small" for="engravingCheck">
                                        Add Custom Engraving (+$50)
                                    </label>
                                </div>
                                <div class="mt-2 collapse" id="engravingInput">
                                    <input type="text" name="notes" class="form-control border-0 bg-white shadow-sm" placeholder="e.g. 'Forever & Always'">
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary rounded-0 py-3 text-uppercase ls-1">Reserve Now</button>
                            </div>
                            <div class="text-center mt-3">
                                <small class="text-muted" style="font-size: 0.75rem;">
                                    <i class="bi bi-shield-check text-success me-1"></i> Secure Reservation. Payment collected later.
                                </small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Simple toggle for engraving input
    document.getElementById('engravingCheck').addEventListener('change', function() {
        const inputDiv = document.getElementById('engravingInput');
        if(this.checked) {
            inputDiv.classList.add('show');
            inputDiv.style.display = 'block';
        } else {
            inputDiv.classList.remove('show');
            inputDiv.style.display = 'none';
        }
    });
</script>
<?= $this->endSection() ?>
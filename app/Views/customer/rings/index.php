<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="text-center mb-5 fade-in-up">
    <span class="text-gold text-uppercase small fw-bold ls-2">Our Collection</span>
    <h2 class="display-5 fw-bold serif-font mt-2">Timeless Elegance</h2>
    <div class="mx-auto mt-3" style="width: 60px; height: 2px; background-color: #D4AF37;"></div>
    <p class="text-muted mt-3 mx-auto fw-light" style="max-width: 600px;">
        Discover an exclusive selection of wedding bands and engagement rings designed to last forever.
    </p>
</div>

<div class="row g-4">
    <?php if(!empty($rings)): ?>
        <?php foreach($rings as $ring): ?>
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="card h-100 border-0 shadow-sm rounded-0 overflow-hidden product-card">
                    <!-- Image -->
                    <div class="position-relative" style="height: 300px; overflow: hidden; background: #f8f9fa;">
                        <img src="/uploads/rings/<?= esc($ring['image']) ?>" 
                             class="card-img-top w-100 h-100" 
                             style="object-fit: cover; transition: transform 0.5s ease;"
                             alt="<?= esc($ring['name']) ?>">
                        <div class="card-img-overlay d-flex align-items-end p-0 opacity-0 hover-overlay" style="background: linear-gradient(to top, rgba(15,40,35,0.8), transparent); transition: opacity 0.3s;">
                            <a href="/rings/show/<?= $ring['id'] ?>" class="btn btn-link text-white text-decoration-none w-100 py-3 fw-light text-uppercase ls-1 stretched-link">View Details</a>
                        </div>
                    </div>
                    
                    <div class="card-body text-center p-4 bg-white">
                        <small class="text-uppercase text-muted fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;"><?= esc($ring['material']) ?></small>
                        <h5 class="card-title serif-font fw-bold mt-2 mb-2 text-truncate text-dark"><?= esc($ring['name']) ?></h5>
                        <div class="text-gold fw-bold fs-5 font-monospace">$<?= number_format($ring['price'], 2) ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5">
            <i class="bi bi-gem text-muted fs-1 opacity-50"></i>
            <h4 class="text-muted fw-light mt-3">Our collection is currently being curated.</h4>
        </div>
    <?php endif; ?>
</div>

<style>
    /* Specific hover effect for product cards */
    .product-card:hover img {
        transform: scale(1.05);
    }
    .product-card:hover .hover-overlay {
        opacity: 1 !important;
    }
</style>
<?= $this->endSection() ?>
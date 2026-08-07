<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row align-items-center mb-5 fade-in-up">
    <div class="col-lg-6 order-2 order-lg-1">
        <span class="text-gold text-uppercase small fw-bold ls-2">Welcome Back</span>
        <h1 class="display-4 fw-bold text-dark serif-font mb-3">Hello, <?= esc($user) ?></h1>
        <p class="lead text-muted fw-light mb-4" style="max-width: 90%;">
            Your journey to finding the perfect symbol of eternal love continues here. Resume your search or check your orders.
        </p>
        <div class="d-flex gap-3">
            <a href="/rings" class="btn btn-dark px-5 py-3 rounded-0" style="background-color: #0f2823; border: none;">Browse Collection</a>
            <a href="/reservations/history" class="btn btn-outline-dark px-4 py-3 rounded-0">My Orders</a>
        </div>
    </div>
    <div class="col-lg-6 order-1 order-lg-2 text-center mb-4 mb-lg-0">
        <div class="position-relative">
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-emerald opacity-10" style="transform: translate(15px, 15px);"></div>
            <img src="https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Welcome" class="img-fluid position-relative shadow-lg" style="max-height: 400px; object-fit: cover;">
        </div>
    </div>
</div>

<div class="row g-4 mt-5">
    <div class="col-md-4">
        <div class="p-4 bg-white shadow-sm h-100 position-relative overflow-hidden group-hover">
            <div class="mb-3">
                <i class="bi bi-gem text-gold fs-2"></i>
            </div>
            <h5 class="fw-bold serif-font">Exquisite Designs</h5>
            <p class="text-muted small fw-light">Explore our curated collection of handcrafted wedding rings made from the finest materials.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="p-4 bg-white shadow-sm h-100">
            <div class="mb-3">
                <i class="bi bi-stars text-gold fs-2"></i>
            </div>
            <h5 class="fw-bold serif-font">Custom Fit</h5>
            <p class="text-muted small fw-light">Every ring is customizable. Choose your size and add personal engravings to make it yours.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="p-4 bg-white shadow-sm h-100">
            <div class="mb-3">
                <i class="bi bi-shield-lock text-gold fs-2"></i>
            </div>
            <h5 class="fw-bold serif-font">Secure Reservation</h5>
            <p class="text-muted small fw-light">Book your ring online instantly. We secure your choice until you are ready for pickup.</p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
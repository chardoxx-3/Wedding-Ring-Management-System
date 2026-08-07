<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="text-center mb-5">
            <h2 class="fw-bold serif-font">Complete Reservation</h2>
            <p class="text-muted fw-light">Secure your piece of eternity.</p>
        </div>

        <div class="card shadow-lg border-0 rounded-0 overflow-hidden">
            <div class="card-header p-4 text-center" style="background-color: #0f2823;">
                <h6 class="mb-0 text-white text-uppercase ls-2 small">Reservation Summary #<?= $reservation['id'] ?></h6>
            </div>
            <div class="card-body p-5 bg-white">
                
                <!-- Item Review -->
                <div class="d-flex align-items-center mb-5">
                    <img src="/uploads/rings/<?= esc($reservation['image']) ?>" alt="Ring" class="rounded shadow-sm border p-1" style="width: 100px; height: 100px; object-fit: cover;">
                    <div class="ms-4 flex-grow-1">
                        <h4 class="serif-font fw-bold mb-1 text-dark"><?= esc($reservation['ring_name']) ?></h4>
                        <div class="text-muted small mb-1">Size: <?= esc($reservation['custom_size']) ?></div>
                        <?php if(!empty($reservation['custom_notes'])): ?>
                            <div class="text-gold small fst-italic">Engraving: "<?= esc($reservation['custom_notes']) ?>"</div>
                        <?php endif; ?>
                    </div>
                    <div class="text-end">
                        <small class="text-muted text-uppercase d-block mb-1">Total</small>
                        <h3 class="fw-bold text-dark font-monospace">$<?= number_format($reservation['total_amount'], 2) ?></h3>
                    </div>
                </div>

                <hr class="mb-5 text-muted opacity-25">

                <!-- Payment Form -->
                <form action="/reservations/processPayment" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="reservation_id" value="<?= $reservation['id'] ?>">
                    <input type="hidden" name="amount" value="<?= $reservation['total_amount'] ?>">

                    <h5 class="mb-4 serif-font">Select Payment Method</h5>
                    
                    <div class="row g-3 mb-5">
                        <div class="col-md-4">
                            <input type="radio" class="btn-check" name="payment_method" id="card" value="Credit Card" checked>
                            <label class="btn btn-outline-light text-dark border w-100 h-100 py-3 rounded-0 payment-option" for="card">
                                <i class="bi bi-credit-card fs-4 d-block mb-2 text-gold"></i> Credit Card
                            </label>
                        </div>
                        <div class="col-md-4">
                            <input type="radio" class="btn-check" name="payment_method" id="paypal" value="PayPal">
                            <label class="btn btn-outline-light text-dark border w-100 h-100 py-3 rounded-0 payment-option" for="paypal">
                                <i class="bi bi-paypal fs-4 d-block mb-2 text-primary"></i> PayPal
                            </label>
                        </div>
                        <div class="col-md-4">
                            <input type="radio" class="btn-check" name="payment_method" id="bank" value="Bank Transfer">
                            <label class="btn btn-outline-light text-dark border w-100 h-100 py-3 rounded-0 payment-option" for="bank">
                                <i class="bi bi-bank fs-4 d-block mb-2 text-dark"></i> Bank Transfer
                            </label>
                        </div>
                    </div>

                    <div class="d-grid gap-3">
                        <button type="submit" class="btn btn-primary btn-lg rounded-0 py-3 fw-bold shadow-sm text-uppercase ls-1">
                            Pay $<?= number_format($reservation['total_amount'], 2) ?>
                        </button>
                        <a href="/rings" class="btn btn-link text-muted text-decoration-none small">Cancel and Return to Catalog</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .payment-option:hover {
        background-color: #f8f9fa;
        border-color: #D4AF37 !important;
    }
    .btn-check:checked + .payment-option {
        border-color: #D4AF37 !important;
        background-color: rgba(212, 175, 55, 0.05);
        box-shadow: 0 0 0 1px #D4AF37;
    }
</style>
<?= $this->endSection() ?>
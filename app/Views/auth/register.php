<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center align-items-center fade-in-up" style="min-height: 70vh;">
    <div class="col-lg-10">
        <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 20px;">
            <div class="row g-0">
                <!-- Form Side -->
                <div class="col-md-6 bg-white p-5 order-2 order-md-1">
                    <div class="text-center mb-4 mt-2">
                        <span class="text-gold text-uppercase small fw-bold ls-2">Join Us</span>
                        <h3 class="fw-bold text-dark serif-font mt-2">Create Account</h3>
                        <p class="text-muted small">Begin your journey to finding the perfect ring.</p>
                    </div>

                    <form action="/auth/store" method="post">
                        <?= csrf_field() ?>

                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control bg-light border-0" id="floatingName" placeholder="John Doe" required>
                            <label for="floatingName">Full Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control bg-light border-0" id="floatingEmail" placeholder="name@example.com" required>
                            <label for="floatingEmail">Email Address</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control bg-light border-0" id="floatingPassword" placeholder="Password" required minlength="6">
                            <label for="floatingPassword">Password (Min. 6 chars)</label>
                        </div>

                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" class="btn btn-primary py-3">Register Now</button>
                        </div>
                    </form>

                    <div class="text-center">
                        <span class="text-muted small">Already a member?</span> 
                        <a href="/auth/login" class="text-gold text-decoration-none fw-bold ms-1">Sign In</a>
                    </div>
                </div>

                <!-- Image Side -->
                <div class="col-md-6 d-none d-md-block order-1 order-md-2" style="background: url('https://images.unsplash.com/photo-1605100804763-247f67b3557e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80') center/cover no-repeat;">
                    <div class="h-100 w-100 d-flex flex-column justify-content-end align-items-start text-white p-5" style="background: linear-gradient(to top, rgba(15, 40, 35, 0.9), transparent);">
                        <h2 class="display-6 serif-font mb-2">Unmatched Elegance</h2>
                        <p class="fw-light">Join thousands of couples who found their forever symbol with us.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
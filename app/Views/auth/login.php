<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center align-items-center fade-in-up" style="min-height: 70vh;">
    <div class="col-lg-10">
        <div class="card border-0 shadow-lg overflow-hidden" style="border-radius: 20px;">
            <div class="row g-0">
                <!-- Image Side (Hidden on Mobile) -->
                <div class="col-md-6 d-none d-md-block" style="background: url('https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80') center/cover no-repeat;">
                    <div class="h-100 w-100 d-flex flex-column justify-content-center align-items-center text-white p-5" style="background: rgba(15, 40, 35, 0.4);">
                        <h2 class="display-5 serif-font mb-3">Eternal Beauty</h2>
                        <p class="lead fw-light text-center">Log in to view your curated collection.</p>
                    </div>
                </div>

                <!-- Form Side -->
                <div class="col-md-6 bg-white p-5">
                    <div class="text-center mb-5 mt-3">
                        <span class="text-gold text-uppercase small fw-bold ls-2">Welcome Back</span>
                        <h3 class="fw-bold text-dark serif-font mt-2">Member Login</h3>
                    </div>

                    <form action="/auth/attemptLogin" method="post">
                        <?= csrf_field() ?>
                        
                        <div class="form-floating mb-4">
                            <input type="email" name="email" class="form-control bg-light border-0" id="floatingInput" placeholder="name@example.com" required>
                            <label for="floatingInput">Email Address</label>
                        </div>
                        
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control bg-light border-0" id="floatingPassword" placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                        </div>

                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" class="btn btn-primary py-3">Sign In</button>
                        </div>
                        
                        <div class="text-center">
                            <p class="text-muted small">New to JewelSys? <a href="/auth/register" class="text-gold text-decoration-none fw-bold">Create an account</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
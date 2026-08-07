<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="d-flex align-items-center mb-4">
    <div class="me-auto">
        <h2 class="h3 brand-text text-dark">Account Settings</h2>
        <p class="text-muted small mb-0">Manage your personal information and security</p>
    </div>
</div>

<div class="row">
    <!-- Left Column: Edit Form -->
    <div class="col-lg-8">
        
        <!-- Flash Messages -->
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success border-0 shadow-sm mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i><?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger border-0 shadow-sm mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i><?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if(isset($errors)): ?>
            <div class="alert alert-danger border-0 shadow-sm mb-4" role="alert">
                <ul class="mb-0 ps-3">
                    <?php foreach($errors as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="card admin-card border-0 mb-4 overflow-hidden">
            <!-- Decorative Header Strip -->
            <div style="height: 100px; background: linear-gradient(to right, #0f2823, #1c423b);"></div>
            
            <div class="card-body p-4 p-lg-5 position-relative">
                <!-- Profile Avatar (Overlapping) -->
                <div class="position-absolute translate-middle-y start-0 ms-5" style="top: 0;">
                    <div class="rounded-circle border border-4 border-white shadow bg-white d-flex align-items-center justify-content-center" 
                         style="width: 100px; height: 100px;">
                        <span class="display-5 fw-bold" style="color: #D4AF37; font-family: 'Cinzel', serif;">
                            <?= strtoupper(substr($user['name'] ?? 'A', 0, 1)) ?>
                        </span>
                    </div>
                </div>

                <div class="mt-5 pt-2">
                    <form action="/admin/profile/update" method="post">
                        <?= csrf_field() ?>
                        
                        <h5 class="mb-4 text-dark fw-bold brand-text border-bottom pb-2">Profile Details</h5>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="name" class="form-label text-muted small fw-bold text-uppercase ls-1">Full Name</label>
                                <input type="text" class="form-control bg-light border-0 py-3" id="name" name="name" 
                                       value="<?= old('name', $user['name'] ?? '') ?>" required>
                            </div>
                            <div class="col-md-6 mt-3 mt-md-0">
                                <label for="email" class="form-label text-muted small fw-bold text-uppercase ls-1">Email Address</label>
                                <input type="email" class="form-control bg-light border-0 py-3" id="email" name="email" 
                                       value="<?= old('email', $user['email'] ?? '') ?>" required>
                            </div>
                        </div>
                        
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <label class="form-label text-muted small fw-bold text-uppercase ls-1">Role</label>
                                <input type="text" class="form-control bg-white border-bottom rounded-0 ps-0" value="System Administrator" disabled>
                            </div>
                            <div class="col-md-6 mt-3 mt-md-0">
                                <label class="form-label text-muted small fw-bold text-uppercase ls-1">Member Since</label>
                                <input type="text" class="form-control bg-white border-bottom rounded-0 ps-0" 
                                       value="<?= date('F j, Y', strtotime($user['created_at'])) ?>" disabled>
                            </div>
                        </div>
                        
                        <h5 class="mb-4 text-dark fw-bold brand-text border-bottom pb-2">Security</h5>
                        <p class="text-muted small mb-4"><i class="bi bi-info-circle me-1"></i> Leave fields blank if you do not wish to change your password.</p>
                        
                        <div class="mb-4">
                            <label for="current_password" class="form-label text-muted small fw-bold text-uppercase ls-1">Current Password</label>
                            <input type="password" class="form-control bg-light border-0 py-3" id="current_password" name="current_password">
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="new_password" class="form-label text-muted small fw-bold text-uppercase ls-1">New Password</label>
                                <input type="password" class="form-control bg-light border-0 py-3" id="new_password" name="new_password">
                                <div class="form-text small">Minimum 8 characters</div>
                            </div>
                            <div class="col-md-6 mt-3 mt-md-0">
                                <label for="confirm_password" class="form-label text-muted small fw-bold text-uppercase ls-1">Confirm Password</label>
                                <input type="password" class="form-control bg-light border-0 py-3" id="confirm_password" name="confirm_password">
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end gap-2 mt-5">
                            <a href="/admin/dashboard" class="btn btn-outline-secondary px-4">Cancel</a>
                            <button type="submit" class="btn btn-dark px-5" style="background-color: #0f2823; border-color: #0f2823;">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Right Column: Info Widgets -->
    <div class="col-lg-4">
        <!-- Account Status Widget -->
        <div class="card admin-card border-0 mb-4">
            <div class="card-body p-4">
                <h6 class="fw-bold text-uppercase text-muted small ls-1 mb-4">Account Status</h6>
                
                <div class="d-flex align-items-center mb-4">
                    <div class="rounded-circle p-3 me-3" style="background-color: rgba(25, 135, 84, 0.1);">
                        <i class="bi bi-shield-check text-success fs-4"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">Active & Verified</h6>
                        <small class="text-muted">Full admin privileges</small>
                    </div>
                </div>
                
                <div class="d-flex align-items-center mb-2">
                     <div class="rounded-circle p-3 me-3" style="background-color: rgba(212, 175, 55, 0.1);">
                        <i class="bi bi-clock-history text-warning fs-4"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">Last Updated</h6>
                        <small class="text-muted"><?= date('M d, Y', strtotime($user['updated_at'])) ?></small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Security Tips Widget -->
        <div class="card bg-dark text-white border-0 shadow-sm" style="background-color: #0f2823 !important;">
            <div class="card-body p-4">
                <h6 class="fw-bold text-uppercase text-warning small ls-1 mb-3">Security Guidelines</h6>
                <ul class="list-unstyled mb-0 small opacity-75">
                    <li class="mb-3 d-flex align-items-start">
                        <i class="bi bi-check2 text-warning me-2 fs-6"></i>
                        <span>Use a strong password with a mix of letters, numbers, and symbols.</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <i class="bi bi-check2 text-warning me-2 fs-6"></i>
                        <span>Never share your admin credentials with staff members.</span>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="bi bi-check2 text-warning me-2 fs-6"></i>
                        <span>Log out immediately after finishing your session on shared devices.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
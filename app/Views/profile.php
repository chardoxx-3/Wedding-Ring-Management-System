<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-5">
                <h1 class="serif-font text-dark mb-1">My Profile</h1>
                <p class="text-muted">Manage your account information and security settings</p>
            </div>

            <!-- Flash Messages -->
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success border-0 shadow-sm rounded-0 mb-4" role="alert">
                    <i class="bi bi-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger border-0 shadow-sm rounded-0 mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i><?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if(isset($errors)): ?>
                <div class="alert alert-danger border-0 shadow-sm rounded-0 mb-4" role="alert">
                    <ul class="mb-0 ps-3">
                        <?php foreach($errors as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="card border-0 shadow-sm rounded-0">
                <div class="card-body p-4 p-lg-5">
                    <form action="/profile/update" method="post">
                        <?= csrf_field() ?>
                        
                        <!-- Personal Information -->
                        <div class="mb-5">
                            <h5 class="serif-font text-dark mb-4 pb-2 border-bottom">
                                <i class="bi bi-person-circle me-2 text-gold"></i>Personal Information
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label text-muted small fw-bold text-uppercase">Full Name</label>
                                    <input type="text" class="form-control rounded-0 py-3" id="name" name="name" 
                                           value="<?= old('name', $user['name'] ?? '') ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label text-muted small fw-bold text-uppercase">Email Address</label>
                                    <input type="email" class="form-control rounded-0 py-3" id="email" name="email" 
                                           value="<?= old('email', $user['email'] ?? '') ?>" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted small fw-bold text-uppercase">Account Role</label>
                                    <input type="text" class="form-control rounded-0 py-3 bg-light" 
                                           value="<?= ucfirst($user['role']) ?>" disabled readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted small fw-bold text-uppercase">Member Since</label>
                                    <input type="text" class="form-control rounded-0 py-3 bg-light" 
                                           value="<?= date('F j, Y', strtotime($user['created_at'])) ?>" disabled readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Password Change -->
                        <div class="mb-5">
                            <h5 class="serif-font text-dark mb-4 pb-2 border-bottom">
                                <i class="bi bi-lock me-2 text-gold"></i>Password Settings
                            </h5>
                            
                            <div class="alert alert-info border-0 bg-light rounded-0 mb-4">
                                <i class="bi bi-info-circle me-2"></i>Leave password fields blank if you don't want to change your password.
                            </div>
                            
                            <div class="mb-3">
                                <label for="current_password" class="form-label text-muted small fw-bold text-uppercase">Current Password</label>
                                <input type="password" class="form-control rounded-0 py-3" id="current_password" name="current_password">
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="new_password" class="form-label text-muted small fw-bold text-uppercase">New Password</label>
                                    <input type="password" class="form-control rounded-0 py-3" id="new_password" name="new_password">
                                    <div class="form-text">Minimum 8 characters</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="confirm_password" class="form-label text-muted small fw-bold text-uppercase">Confirm New Password</label>
                                    <input type="password" class="form-control rounded-0 py-3" id="confirm_password" name="confirm_password">
                                </div>
                            </div>
                        </div>

                        <!-- Account Status -->
                        <div class="mb-5">
                            <h5 class="serif-font text-dark mb-4 pb-2 border-bottom">
                                <i class="bi bi-shield-check me-2 text-gold"></i>Account Status
                            </h5>
                            
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="bi bi-check-circle-fill text-success fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">Account Active</h6>
                                    <p class="text-muted small mb-0">Your account is in good standing</p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between pt-4 border-top">
                            <a href="/dashboard" class="btn btn-outline-dark rounded-0 px-4 py-3">Back to Dashboard</a>
                            <button type="submit" class="btn btn-dark rounded-0 px-5 py-3" style="background-color: #0f2823;">
                                <i class="bi bi-check-circle me-2"></i>Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Security Tips -->
            <div class="card border-0 shadow-sm rounded-0 mt-4" style="background-color: #f8f5f2;">
                <div class="card-body p-4">
                    <h6 class="serif-font text-dark mb-3">Security Tips</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2 d-flex align-items-start">
                            <i class="bi bi-check2 text-gold me-2 mt-1"></i>
                            <span class="small">Use a strong, unique password that you don't use elsewhere</span>
                        </li>
                        <li class="mb-2 d-flex align-items-start">
                            <i class="bi bi-check2 text-gold me-2 mt-1"></i>
                            <span class="small">Never share your password with anyone</span>
                        </li>
                        <li class="d-flex align-items-start">
                            <i class="bi bi-check2 text-gold me-2 mt-1"></i>
                            <span class="small">Log out after using public or shared computers</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
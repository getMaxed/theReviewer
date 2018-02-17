<?php require APPROOT . '/views/includes/header.php';?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Create an Account</h2>
                <p>Please fill out this form to register</p>
                <form action="<?=URLROOT?>/users/register" method="post">
                    <div class="form-group">
                        <label for="name">Name: <sup>*</sup></label>
                        <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?=$data['name']?>">
                        <span class="span invalid-feedback"><?=$data['name_err']?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?=$data['email']?>">
                        <span class="span invalid-feedback"><?=$data['email_err']?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?=$data['password']?>">
                        <span class="span invalid-feedback"><?=$data['password_err']?></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm password: <sup>*</sup></label>
                        <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?=$data['confirm_password']?>">
                        <span class="span invalid-feedback"><?=$data['confirm_password_err']?></span>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Register" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <a href="<?=URLROOT?>/users/login" class="btn btn-light btn-block">Have an account? Log in</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/includes/footer.php';?>

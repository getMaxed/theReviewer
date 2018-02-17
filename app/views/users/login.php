<?php require APPROOT . '/views/includes/header.php';?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Log in</h2>
            <p>Please fill in your credentials to log in</p>
            <form action="<?=URLROOT?>/users/login" method="post">
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

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Log in" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?=URLROOT?>/users/register" class="No account? Register">Have an account? Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php';?>
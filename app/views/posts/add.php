<?php require APPROOT . '/views/includes/header.php';?>
    <a href="<?=URLROOT?>/posts" class="btn btn-light"><i class="fa fa-backward"> Back</i></a>
    <div class="card card-body bg-light mt-5">
        <h2>Add Post</h2>
        <p>Write a review</p>
        <form action="<?=URLROOT?>/posts/add" method="post">
            <div class="form-group">
                <label for="title">Title: <sup>*</sup></label>
                <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?=$data['title']?>">
                <span class="span invalid-feedback"><?=$data['title_err']?></span>
            </div>
            <div class="form-group">
                <label for="body">Body: <sup>*</sup></label>
                <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?=$data['body']?></textarea>
                <span class="span invalid-feedback"><?=$data['body_err']?></span>
            </div>
            <input type="submit" value="Submit" class="btn btn-success">
        </form>
    </div>
<?php require APPROOT . '/views/includes/footer.php';?>

<?php require APPROOT . '/views/includes/header.php';?>
    <?php flash('post_message')?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Reviews</h1>
        </div>
        <div class="col-md-6">
            <a href="<?=URLROOT?>/posts/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i>Write a review
            </a>
        </div>
    </div>
    <?php foreach ($data['posts'] as $post) : ?>
        <div class="card card-body mb-3" style="height: 541px">
            <h4 class="card-title"><?=ucwords($post->artist_name)?> - "<?=ucwords($post->album_name)?>" (<?=$post->album_year?>) <span class="rateYo<?=$post->postId?> mt-2"></span> </h4>
            <div class="bg-light p-2 mb-3">
                <strong>Written by <i><u><?=$post->name?></u></i> on <?=$post->postCreated?></strong>
            </div>
            <div class="row">
                <div class="col-sm-6" style="max-height: 310px; overflow: hidden">
                    <p class="card-text ml-1" style="text-overflow-ellipsis: ..."><?=$post->body?></p>
                </div>
                <div class="col-sm-6">
                    <img class="img-responsive img-thumbnail ml-4" style="width: 320px; height: 320px" src="<?=URLROOT.'/public/'.$post->image?>" alt="">
                </div>
            </div>
            <div>
                <a href="<?=URLROOT?>/posts/show/<?=$post->postId?>" class="btn btn-dark">More</a>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>
            $(function () {

                $(".rateYo<?=$post->postId?>").rateYo({
                    rating: <?=$post->album_rating?>
                });

            });
        </script>

    <?php endforeach;?>
<?php require APPROOT . '/views/includes/footer.php';?>


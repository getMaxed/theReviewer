<?php require APPROOT . '/views/includes/header.php';?>
<div class="jumbotron" style="height: 1300px">
    <a href="<?=URLROOT?>/posts" class="btn btn-light"><i class="fa fa-backward"> Back</i></a>
    <br>
    <h1><?=ucwords($data['post']->artist_name)?> - "<?=ucwords($data['post']->album_name)?>" (<?=$data['post']->album_year?>)<span class="rateYo mt-2 mb-3"></span></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written by <?=$data['user']->name?> on <?=$data['post']->created_at?>
</div>
<div style="height: 560px; overflow: auto">
    <p style="overflow: hidden"><?=$data['post']->body?></p>
</div>
<div class="center-block">
    <img src="<?=URLROOT?>/public/<?=$data['post']->image?>" class="mx-auto d-block mt-5" style="width: 320px; height: 320px">
</div>
<?php if ($data['post']->user_id === $_SESSION['user_id']) : ?>
    <hr>
    <a href="<?=URLROOT?>/posts/edit/<?=$data['post']->id?>" class="btn btn-dark">Edit</a>
    <form class="pull-right" action="<?=URLROOT?>/posts/delete/<?=$data['post']->id?>" method="post">
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
<?php endif;?>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
        $(function () {

            $(".rateYo").rateYo({
                rating: <?=$data['post']->album_rating?>
            });

        });
    </script>
    
<?php require APPROOT . '/views/includes/footer.php';?>
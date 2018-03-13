<?php require APPROOT . '/views/includes/header.php';?>
    <a href="<?=URLROOT?>/posts" class="btn btn-light"><i class="fa fa-backward"> Back</i></a>
    <div class="card card-body bg-light mt-5">
        <h2>Write a Review</h2>
        <p>Please fill in all the fields</p>
        <form action="<?=URLROOT?>/posts/add" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="title">Title: <sup>*</sup></label>
                <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?=$data['title']?>">
                <span class="span invalid-feedback"><?=$data['title_err']?></span>
            </div>

            <div class="form-group">
                <label for="title">Artist Name: <sup>*</sup></label>
                <input type="text" name="artist_name" class="form-control form-control-lg <?php echo (!empty($data['artist_name_err'])) ? 'is-invalid' : ''; ?>">
                <span class="span invalid-feedback"><?=$data['artist_name_err']?></span>
            </div>

            <div class="form-group">
                <label for="title">Album Name: <sup>*</sup></label>
                <input type="text" name="album_name" class="form-control form-control-lg <?php echo (!empty($data['album_name_err'])) ? 'is-invalid' : ''; ?>">
                <span class="span invalid-feedback"><?=$data['album_name_err']?></span>
            </div>

            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="album_year">Year: <sup>*</sup></label>
                        <select name="album_year" id="album_year" class="form-control form-control-lg <?php echo (!empty($data['album_year_err'])) ? 'is-invalid' : ''; ?>">
                            <option disabled selected value>select a year</option>
                            <option>2018</option>
                            <option>2017</option>
                            <option>2016</option>
                            <option>2015</option>
                            <option>2014</option>
                            <option>2013</option>
                            <option>2012</option>
                            <option>2011</option>
                            <option>2010</option>
                            <option>2009</option>
                            <option>2008</option>
                            <option>2007</option>
                            <option>2006</option>
                            <option>2005</option>
                            <option>2004</option>
                            <option>2003</option>
                            <option>2002</option>
                            <option>2001</option>
                            <option>2000</option>
                            <option>1999</option>
                            <option>1998</option>
                            <option>1997</option>
                            <option>1996</option>
                            <option>1995</option>
                            <option>1994</option>
                            <option>1993</option>
                            <option>1992</option>
                            <option>1991</option>
                            <option>1990</option>
                            <option>1989</option>
                            <option>1988</option>
                            <option>1987</option>
                            <option>1986</option>
                            <option>1985</option>
                            <option>1984</option>
                            <option>1983</option>
                            <option>1982</option>
                            <option>1981</option>
                            <option>1980</option>
                            <option>1979</option>
                            <option>1978</option>
                            <option>1977</option>
                            <option>1976</option>
                            <option>1975</option>
                            <option>1974</option>
                            <option>1973</option>
                            <option>1972</option>
                            <option>1971</option>
                            <option>1970</option>
                            <option>1969</option>
                            <option>1968</option>
                            <option>1967</option>
                            <option>1966</option>
                            <option>1965</option>
                            <option>1964</option>
                            <option>1963</option>
                            <option>1962</option>
                            <option>1961</option>
                        </select>
                        <span class="span invalid-feedback"><?=$data['album_year_err']?></span>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="album_rating">Rating: <sup>*</sup></label>
                        <select name="album_rating" id="album_rating" class="form-control form-control-lg <?php echo (!empty($data['album_rating_err'])) ? 'is-invalid' : ''; ?>">
                            <option disabled selected value>give a score</option>
                            <option>0.5</option>
                            <option>1</option>
                            <option>1.5</option>
                            <option>2</option>
                            <option>2.5</option>
                            <option>3</option>
                            <option>3.5</option>
                            <option>4</option>
                            <option>4.5</option>
                            <option>5</option>
                        </select>
                        <span class="span invalid-feedback"><?=$data['album_rating_err']?></span>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label for="body">Body: <sup>*</sup></label>
                <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?=$data['body']?></textarea>
                <span class="span invalid-feedback"><?=$data['body_err']?></span>
            </div>
            <div class="form-group">
                Album cover <br>
                <input type="file" name="file" id="file" class="btn btn-info mt-3">
                <p style="color: red"><?=$data['album_image_err']?><p>
            </div>
            <br>
            <input type="submit" value="Submit" class="btn btn-success btn-lg">
        </form>
    </div>
<?php require APPROOT . '/views/includes/footer.php';?>

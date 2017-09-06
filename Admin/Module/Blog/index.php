
<?php

if (Module\Activate_module::get_Activate_module('blog') == 'yes') {

?>

<div id="blog" class="row">
        <h1 style="text-align: center;margin: 2%">blog</h1>
    <div id="Card_View" class="col-md-9" >
        <?php

        $articles = \Module\Blog\Database\Database::getBdd()->Select_all_Article();
        $articles = array_reverse($articles);
        ?>

        <?php foreach ( $articles as $article){ ?>
        <div class="col-md-6">
            <div class="Card">

                <div class="Card_title">
                    <span><?= $article["titre"] ?></span> <span> <i class="fa fa-calendar-o" aria-hidden="true"></i>
                        <?php
                        $date = explode("-", $article["date_Article"]);
                        echo $date[2] . '/';
                        echo $date[1] . '/';
                        echo $date[0];
                        ?>
                        &nbsp; &nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i>
                        <?php
                        $heure = explode(":", $article["heure"]);
                        echo $heure[0] . ':';
                        echo $heure[1];
                        ?></span>

                </div>

                <div class="Card_img">
                    <img src="http://lorempixel.com/340/200/" alt="img">
                </div>

                <div class="Card_description">
                    <?= $article["resumer"] ?>

                    <br><br><span><a href="index.php?p=view_article&id=<?= $article["id"] ?>"><button class="btn btn-primary">Voir l'article</button></a></span><span class="Card_autor">auteur : <?= $article["autor"] ?></span><br><br>

                </div>
            </div>

        </div>
        <?php }?>

    </div>
    <div id="Card_slide" class="col-md-3">
        <div id="recherche">
            <h2><b><u>rechercher</u></b></h2><br>
            <form action="" method="post">
                <input type="text" name="rechercher" style="width: 230px" placeholder="entrer le nom de l'article rechercher"><br><br>
                <input type="submit" class="btn btn-primary" value="rechercher">
            </form>
        </div>
        <div id="archivre">
            <h2><b><u>achivre</u></b></h2><br>

            <ul>
                <li><a href="#" class="btn btn-success">semaine 12</a></li>
                <br>
                <li><a href="#" class="btn btn-success">semaine 13</a></li>
                <br>
                <li><a href="#" class="btn btn-success">semaine 14</a></li>
                <br>
                <li><a href="#" class="btn btn-success">semaine 15</a></li>
                <br>
                <li><a href="#" class="btn btn-success">semaine 16</a></li>
                <br>
            </ul>

            <span>&nbsp;&nbsp;<a href="#" class="btn btn-primary">suivant</a></span>
            <span style="float: right"><a href="#" class="btn btn-primary">precedent</a>&nbsp;&nbsp;</span>

            <br><br>
        </div>
    </div>

</div>


<?php }
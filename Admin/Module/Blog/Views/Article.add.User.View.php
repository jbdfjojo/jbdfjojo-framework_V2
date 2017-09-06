<script src="../Module/Blog/ckeditor/ckeditor.js"></script>
<?php

if (Module\Activate_module::get_Activate_module('blog') == 'yes') {

    ?>

    <div id="blog" class="row">
        <h1 style="text-align: center;margin: 2%">ajout d'un article</h1>

        <?php
        if (isset($_SESSION["err_article_titre"])){

            echo '<div class="alert alert-danger" style="width: 50%; margin-left: 26%">';
            echo $_SESSION["err_article_titre"];
            echo  '</div>';
        }

        if (isset($_SESSION["err_article_image"])){

            echo '<div class="alert alert-danger" style="width: 50%; margin-left: 26%">';
            echo $_SESSION["err_article_image"];
            echo  '</div>';
        }

        if (isset($_SESSION["err_article_content"])){

            echo '<div class="alert alert-danger" style="width: 50%; margin-left: 26%">';
            echo $_SESSION["err_article_content"];
            echo  '</div>';
        }

        if (isset($_SESSION["err_article_resumer"])){

            echo '<div class="alert alert-danger" style="width: 50%; margin-left: 26%">';
            echo $_SESSION["err_article_resumer"];
            echo  '</div>';
        }

        ?>


        <form action="../Module/Blog/Controller/Article.add.User.Ctrl.php" method="post" style="width: 30%; margin-left: 36%" >
            <div class="form-group row">
                <label for="host" class="col-2 col-form-label">titre</label>
                <div class="col-10">
                    <input type="text" class="form-control"  name="titre"  value="<?php if (isset($_SESSION["temp_article_titre"])){ echo $_SESSION["temp_article_titre"];}else{echo "";} ?>" style="text-align: center; <?php if (isset($_SESSION["err_article_titre"])){ echo 'border-color: red ';} ?>">                </div>
            </div>
            <div class="form-group row">
                <label for="database" class="col-2 col-form-label">image</label>
                <div class="col-10">
                    <input type="file" class="form-control"  name="image" style="text-align: center; <?php if (isset($_SESSION["err_article_image"])){ echo 'border-color: red ';} ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="database" class="col-2 col-form-label">resumer</label>
                <div style="margin-left: -200px">
                    <textarea name="resumer" id="resumer" cols="100" rows="5" style="<?php if (isset($_SESSION["err_article_resumer"])){ echo 'border-color: red ';} ?>"><?php if (isset($_SESSION["temp_article_resumer"])){ echo $_SESSION["temp_article_resumer"];}else{echo "30 characters maxi";} ?>
                    </textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="database" class="col-2 col-form-label">contenu</label>
                <div style="margin-left: -300px">
                    <textarea name="contenu" id="contenu" cols="300" rows="10" style="text-align: center; <?php if (isset($_SESSION["err_article_content"])){ echo 'border-color: red ';} ?>"><?php if (isset($_SESSION["temp_article_content"])){ echo $_SESSION["temp_article_content"];}else{echo "";} ?>
                    </textarea>
                </div>
            </div>
            <input type="hidden" name="user" value="<?= $_SESSION["user_admin"]  ?>">
            <input type="hidden" name="date" value="<?= date("Y-m-d");  ?>">
            <input type="hidden" name="heure" value="<?= date("H:i:s");  ?>">
            <button type="submit" class="btn btn-primary">ajouter l'article</button>
        </form>

    </div>

    <script>
        window.onload = function() {
            CKEDITOR.replace( 'contenu' , {
                uiColor : '#a3be00',
                width: 1000
            } );
        };
    </script>
<?php }

var_dump($_SESSION);

$_SESSION["err_article_resumer"] = null;
$_SESSION["err_article_content"] = null;
$_SESSION["err_article_image"] = null;
$_SESSION["err_article_titre"] = null;

$_SESSION["temp_article_resumer"] = null;
$_SESSION["temp_article_content"] = null;
$_SESSION["temp_article_image"] = null;
$_SESSION["temp_article_titre"] = null;


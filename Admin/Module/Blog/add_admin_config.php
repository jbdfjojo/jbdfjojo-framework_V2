<h1 style="text-align: center">config blog</h1>

<div id="list_article">
    <br><br><br>
     <span style="display: inline-block;float: left"><h2><u><b>liste des article</b></u></h2></span>
     <span  style="display: inline-block;float: right"><br><br><a href="Admin.php?p=Blog&etat=add"><button class="btn btn-success">Ajouter un article</button></a></span>
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>autor</th>
            <th>titre</th>
            <th>date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $articles = \Module\Blog\Database\Database::getBdd()->Select_all_Article();

        foreach ($articles as $article) {

            ?>

            <tr>
                <th scope="row"><?= $article["id"] ?></th>
                <th scope="row"><?= $article["autor"] ?></th>
                <th scope="row"><?= $article["titre"] ?></th>
                <th scope="row">                            <?php
                    $date = explode("-", $article["date_Article"]);
                    echo $date[2] . '/';
                    echo $date[1] . '/';
                    echo $date[0];
                    ?></th>
                <th scope="row">
                    <a href="Admin.php?p=Blog&etat=update&id=<?= $article["id"] ?>"><button class="btn btn-warning">Modifier</button></a>
                    <a href="Admin.php?p=Blog&etat=supp&id=<?= $article["id"] ?>"><button class="btn btn-danger">supprimer</button></a>
                </th>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>



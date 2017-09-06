<h1 style="text-align: center">config user</h1>

<style>
    table {
        width: 100%;
    }

    th {
        height: 50px;
    }
</style>

<table>

    <tr>
        <th>id</th>
        <th>user</th>
        <th>type</th>
        <th>Action</th>
    </tr>

    <?php

    $result = \Module\users\Database\Database::getBdd()->Select_all_user();

    foreach ($result as  $value){
    ?>
        <form action="../Module/Users/Controller/Update.User.Admin.ctrl.php" method="post">
            <tr>
                <td><?= $value["id"] ?></td>
                <td><?= $value["user"] ?> <input type="hidden" name="user" value="<?= $value["user"] ?>"></td>
                <td>
                    <SELECT name="type_user" size="1">
                        <OPTION <?php if ( $value["type_user"] == 'user') {echo 'selected';}?> >user
                        <OPTION <?php if ( $value["type_user"] == 'admin') {echo 'selected';}?> >admin
                    </SELECT></td>
                <td style=" width: 10%">
                    <a href="Admin.php?p=modif_user"><button class="btn btn-warning">modifier</button></a>
                </td>
        </form>

        <form action="../Module/Users/Controller/Delete.User.Admin.ctrl.php" method="post">
            <td style=" width: 10%">
                    <input type="hidden" name="user" value="<?= $value["user"] ?>">
                    <a href="Admin.php?p=delete_user"><button class="btn btn-danger">supprimer</button></a>
            </td>

            </tr>
        </form>
        <tr>
            <td>&nbsp;</td>
        </tr>
    <?php }


    ?>
</table>
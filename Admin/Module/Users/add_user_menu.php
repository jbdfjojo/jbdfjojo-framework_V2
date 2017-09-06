

<?php

if ( \Module\Activate_module::get_Activate_module('Users') == 'yes') {

    if (isset($_SESSION['connecter']) && $_SESSION['connecter'] == 'not_ok') {

        ?>
        <form class="navbar-form navbar-right" action="index.php?p=user_inscription" method="post">
            <a href="../Module/users/destroy_session.php"><button class="btn btn-success">S'inscrire</button></a>
        </form>
        <form class="navbar-form navbar-right" action="../Admin/Module/users/Controller/connect.User.Ctrl.php" method="post">
            <label style="color: white">user : </label>
            <input type="text" class="form-control" name="user">
            <label style="color: white">pass : </label>
            <input type="password" class="form-control" name="pass">
            <input type="submit" class="btn btn-primary">
        </form>



        <?php
    } else {
        ?>
        <span class="navbar-form navbar-right"> <span style="color: white">Compte : &nbsp;<a href="index.php?p=Update_user&user=<?= $_SESSION['user'] ?> "> <?= $_SESSION['user'] ?> </a> &nbsp;</span> <a href="../Admin/Module/users/destroy_session.php"><button class="btn btn-danger">deconecter</button></a> </span>
        <?php
    }
}
?>
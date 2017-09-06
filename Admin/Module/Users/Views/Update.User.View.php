<div id="connexion" style="text-align: center"><br><br>

        <h1>mise a jours du profil </h1><br><br>

        <?php   if (isset($_SESSION["success_inscription"])){ ?>
            <div class="alert alert-success" style="width: 50%; margin-left: 26%">
                <?php echo $_SESSION["success_inscription"]; ?>
            </div>
        <?php } ?>

        <?php   if (isset($_SESSION["err_user"])){ ?>
            <div class="alert alert-danger" style="width: 50%; margin-left: 26%">
                <?php echo $_SESSION["err_user"]; ?>
            </div>
        <?php } ?>

        <?php     if (isset($_SESSION["err_pass"])){ ?>
            <div class="alert alert-danger" style="width: 50%; margin-left: 26%">
                <?php  echo $_SESSION["err_pass"];  ?>
            </div>
        <?php  } ?>

        <?php     if (isset($_SESSION["err_inscription"])){ ?>
            <div class="alert alert-danger" style="width: 50%; margin-left: 26%">
                <?php  echo $_SESSION["err_inscription"];  ?>
            </div>
        <?php  } ?>

    <?php $user = \Module\users\Database\Database::getBdd()->Select_user($_GET["user"]); ?>

    <form action="../Admin/Module/users/Controller/Update.User.Ctrl.php" method="post" style="width: 30%; margin-left: 36%">

        <label ><u>user</u></label><br>
        <input type="text" class="form-control" value="<?= $user["user"] ?>" name="user" style="text-align: center; <?php if (isset($_POST["err_user"])){ echo 'border-color: red ';} ?>"><br><br>

        <label ><u>pass</u></label><br>
        <input type="password" class="form-control"  value="<?= $user["pass"] ?>" name="pass" style="text-align: center; <?php if (isset($_POST["err_pass"])){ echo 'border-color: red ';} ?>"><br><br>

        <input type="hidden" name="user_curent" value="<?= $_GET["user"] ?>">

        <input type="submit" value="modifier profil" class="btn btn-primary">
    </form>

    <?php

    $_SESSION["err_user"] = null;
    $_SESSION["err_pass"] = null;
    $_SESSION["err_inscription"] = null;
    $_SESSION["success_inscription"] = null;
    ?>

</div>


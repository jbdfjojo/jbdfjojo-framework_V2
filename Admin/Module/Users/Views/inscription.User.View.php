
    <div id="connexion" style="text-align: center"><br><br>

        <h1>S'inscrire</h1><br><br>

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


    <form action="../Admin/Module/users/Controller/inscription.User.Ctrl.php" method="post" style="width: 30%; margin-left: 36%">

        <label ><u>user</u></label><br>
        <input type="text" class="form-control"  name="user" style="text-align: center; <?php if (isset($_POST["err_user"])){ echo 'border-color: red ';} ?>"><br><br>

        <label ><u>pass</u></label><br>
        <input type="password" class="form-control" name="pass" style="text-align: center; <?php if (isset($_POST["err_pass"])){ echo 'border-color: red ';} ?>"><br><br>

        <input type="submit" value="s'inscrire" class="btn btn-primary">
    </form>

</div>

    <?php

    $_SESSION["err_user"] = null;
    $_SESSION["err_pass"] = null;
    $_SESSION["err_inscription"] = null;
    $_SESSION["success_inscription"] = null;
    ?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <title>install</title>
    <?php require '../vendor/autoload.php';?>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
            </button>
            <a class="navbar-brand" href="#">Admin</a>
            <a class="navbar-brand" href="../Views/index.php?p=home">home</a>

        </div>
    </div>
</nav>


<div class="container" id="app" style="  margin-top: 5%; text-align: center;">


        <h1>connection</h1><br><br><br>


        <?php
        session_start();
        if (isset($_SESSION["err_user_admin"])){

            echo '<div class="alert alert-danger" style="width: 50%; margin-left: 26%">';
            echo $_SESSION["err_user_admin"];
            echo  '</div>';
        }

        if (isset($_SESSION["err_pass_admin"])){

            echo '<div class="alert alert-danger" style="width: 50%; margin-left: 26%">';
            echo $_SESSION["err_pass_admin"];
            echo  '</div>';
        }

        ?>


        <form action="Controller/Conect_admin.php" method="post" style="width: 30%; margin-left: 36%">
            <div class="form-group row">
                <label for="host" class="col-2 col-form-label">User</label>
                <div class="col-10">
                 <input type="text" class="form-control"  name="user" style="text-align: center; <?php if (isset($_SESSION["err_user_admin"])){ echo 'border-color: red ';} ?>">                </div>
            </div>
            <div class="form-group row">
                <label for="database" class="col-2 col-form-label">pass</label>
                <div class="col-10">
                    <input type="password" class="form-control" name="pass" style="text-align: center; <?php if (isset($_SESSION["err_pass_admin"])){ echo 'border-color: red ';} ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Connecter</button>
        </form>
</div>

</body>
</html>
<br><br><br>
<?php
if (isset($_SESSION["save_module"])){

    echo '<div class="alert alert-success" style="width: 50%; margin-left: 26%; text-align: center">';
    echo $_SESSION["save_module"];
    echo  '</div>';
}
?>

<form action="../Controller/update_module.php" method="post">
    <table class="table">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Name Module</th>
            <th>check module</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $i = 0;

        $module = new \Module\Activate_module();

        foreach ($module->config as $key => $value) {

            ?>

            <tr>
                <th scope="row"><?= ++$i ?></th>
                <td><?= $key ?></td>
                <td>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="blankCheckbox"
                                <?php if ($value == "yes") {
                                    echo 'checked="checked"';
                                } ?> name="<?= $key ?>" aria-label="...">
                        </label>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <button type="submit" class="btn btn-primary">save</button>
</form>
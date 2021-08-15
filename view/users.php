<h2 class="my-3">
    <?php echo "Users page" ?>
</h2>
<?php if (isset($users)) { ?>
    <table class="table">
        <tr>
        <?php foreach(json_decode($users)[0] as $single_key => $single_value) { ?>
            <?php if ($single_key != "status") { ?>
                <th> <?php echo $single_key; ?> </th>
            <?php } ?>
        <?php } ?>
        <th></th>
        </tr>
        <?php foreach(json_decode($users) as $user) { ?>
            <tr>
                <?php foreach($user as $key => $value) { ?>
                    <?php if ($key != "status") { ?>
                        <td> <?php echo $value; ?> </td>
                    <?php } ?>
                <?php } ?>
                <td>
                    <form action="" method="POST">
                        <?php if ($user->status) { ?>
                            <input type="submit" class="btn btn-danger" value="Lock" />
                        <?php } else { ?>
                            <input type="submit" class="btn btn-primary" value="Unlock" />
                        <?php } ?>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
<?php } else { ?>
    <h2 class="mt-5">
        No users yet.
    </h2>
<?php } ?>
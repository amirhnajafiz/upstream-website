<h2 class="my-3">
    <?php echo "Users page" ?>
</h2>
<?php if (isset($users) && isset(json_decode($users)[0])) { ?>
    <table class="table">
        <tr>
        <?php foreach(json_decode($users)[0] as $single_key => $single_value) { ?>
            <?php if ($single_key == "name") { ?>
                <th> <?php echo $single_key; ?> </th>
            <?php } elseif($single_key != "isadmin") { ?>
                <th></th>
            <?php } ?>
        <?php } ?>
        </tr>
        <?php foreach(json_decode($users) as $user) { ?>
            <?php if ($user->name == $current_admin) { 
                continue;
            } ?>
            <tr>
                <td class="<?php if ($user->isadmin) echo "bg-secondary";?>">
                    <?php echo $user->name; ?>
                </td>
                <td class="<?php if ($user->isadmin) echo "bg-secondary";?>">
                    <form action="<?php if ($user->canconfirm == 1) echo "/downgrade"; else echo "/upgrade"; ?>" method="POST">
                        <input type="hidden" value="<?php echo $user->name ?>" name="name" />
                        <?php if ($user->canconfirm == 1) { ?>
                            <input type="submit" class="btn btn-danger" value="Downgrade" />
                        <?php } else { ?>
                            <input type="submit" class="btn btn-primary" value="Upgrade" />
                        <?php } ?>
                    </form>
                </td>
                <td class="<?php if ($user->isadmin) echo "bg-secondary";?>">
                    <form action="<?php if ($user->status) echo "/lock"; else echo "/unlock"; ?>" method="POST">
                        <input type="hidden" value="<?php echo $user->name ?>" name="name" />
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
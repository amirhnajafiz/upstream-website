<h2 class="my-3">
    <?php echo "Home page" ?>
</h2>
<?php if (isset($files) && isset(json_decode($files)[0])) { ?>
    <table class="table">
        <tr>
        <?php foreach(json_decode($files)[0] as $single_key => $single_value) { ?>
            <?php if ($single_key != "id" && $single_key != "valid") { ?>
                <th> <?php echo $single_key; ?> </th>
            <?php } ?>
        <?php } ?>
        <?php if ($isAdmin) { ?>
            <th>Delete</th>
        <?php } ?>
        </tr>
        <?php foreach(json_decode($files) as $file) { ?>
            <?php if ($file->valid == 0) {
                continue;
            } ?>
            <tr>
                <?php foreach($file as $key => $value) { ?>
                    <?php if ($key != "id" && $key != "valid") { ?>
                        <?php if ($key == 'link') { ?>
                            <td> <a href="<?php echo $value; ?>" target="_blank">Download</a> </td>
                        <?php } else { ?>
                            <td> <?php echo $value; if ($key == 'size') echo " Mb"; ?> </td>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                <?php if ($isAdmin) { ?>
                    <td>
                        <form action="/delete" method="POST">
                            <input type="hidden" value="<?php echo $file->id; ?>" name="id" />
                            <input type="submit" value="Remove" class="btn btn-warning" />
                        </form>
                    </td>   
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
<?php } else { ?>
    <h2 class="mt-5">
        No movies yet.
    </h2>
<?php } ?>
<h2 class="my-3">
    <?php
        echo "Hello " . $name . " welcome to Up-Stream.";
    ?>
</h2>
<?php if (isset($files) && isset(json_decode($files)[0])) { ?>
    <table class="table">
        <tr>
        <?php foreach(json_decode($files)[0] as $single_key => $single_value) { ?>
            <?php if ($single_key != "id") { ?>
                <th> <?php echo $single_key; ?> </th>
            <?php } ?>
        <?php } ?>
        <th>Delete</th>
        </tr>
        <?php foreach(json_decode($files) as $file) { ?>
            <tr>
                <?php foreach($file as $key => $value) { ?>
                    <?php if ($key != "id") { ?>
                        <?php if ($key == 'link') { ?>
                            <td>
                                <form action="/download" method="POST">
                                    <input value="<?php echo $file->id; ?>" type="hidden" name="id" /> 
                                    <input type="submit" value="Download" class="btn btn-primary" />
                                </form>
                            </td>
                        <?php } else { ?>
                            <td> <?php if ($key == 'size') echo round($value / 1048576, 1) . " Mb"; else echo $value; ?> </td>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                <td>
                    <form action="/delete" method="POST">
                        <input type="hidden" value="<?php echo $file->id; ?>" name="id" />
                        <input type="submit" value="Remove" class="btn btn-warning" />
                    </form>
                </td>  
            </tr>
        <?php } ?>
    </table>
<?php } else { ?>
    <h3 class="mt-5">
        No movies yet.
    </h3>
<?php } ?>
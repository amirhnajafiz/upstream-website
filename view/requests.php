<h2>
    <?php echo "Requests page" ?>
</h2>
<?php if (isset($requests) && isset(json_decode($requests)[0])) { ?>
    <table class="table">
        <tr>
        <?php foreach(json_decode($requests)[0] as $single_key => $single_value) { ?>
            <?php if ($single_key != "id") { ?>
                <th> <?php echo $single_key; ?> </th>
            <?php } ?>
        <?php } ?>
        <th></th>
        </tr>
        <?php foreach(json_decode($requests) as $request) { ?>
            <tr>
                <?php foreach($request as $key => $value) { ?>
                    <?php if ($key != "id") { ?>
                        <td> <?php echo $value; if ($key == 'size') echo " Mb"; ?> </td>
                    <?php } ?>
                <?php } ?>
                <td>
                    <form action="/accept" method="POST">
                        <input type="hidden" value="<?php echo $request->id; ?>" name="id" />
                        <input type="submit" class="btn btn-primary" value="Accept" />
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
<?php } else { ?>
    <h2 class="mt-5">
        No requests yet.
    </h2>
<?php } ?>
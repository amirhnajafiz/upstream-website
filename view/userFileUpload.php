<h3 class="my-3">
    Upload your file <?php echo $name ?>
</h3>
<form action="/upload" method="POST" enctype="multipart/form-data">
    <label>File: </label>
    <input type="file" name="file" class="form-control my-2" />
    <label>File name: </label>
    <input type="text" name="name" class="form-control my-2" />
    <input type="submit" value="Send" class="btn btn-primary" />
</form> 
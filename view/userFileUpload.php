<h2 class="my-3">
    Upload your file <?php echo $name ?>
</h2>
<form action="/upload" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" class="form-control my-2" />
    <input type="text" name="name" class="form-control my-2" />
    <input type="submit" value="Send" class="btn btn-primary" />
</form> 
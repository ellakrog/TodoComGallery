<form class="blog" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="gname"> Name</label>
    <input type="text" class="form-control" name="gname"  placeholder="Enter Gallery name">
    </div>
  <div class="form-group">
    <label for="g_folder">Name of folder</label>
    <textarea class="form-control" name="g_folder" rows="3"></textarea>
  </div>
 
  <div class="form-group">
    <label for="g_img">Picture</label>
    <input type="file"  name="g_img"  />
  </div>

  <div class="form-group">
  <input type="hidden" name="id_user" value="<?= $_SESSION["user"]["id_user"]; ?>"></div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<form form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<input type="hidden" name="id_user" value="<?= $_SESSION["user"]["id_user"]; ?>">
<div class="form-group">
    <label for="titlename">Name</label>
    <input type="name" class="form-control" name="titlename"  placeholder="Enter todo List name">
   
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
  </div>

<button type="submit" class="btn btn-primary">Add new Todo List</button>
</form>
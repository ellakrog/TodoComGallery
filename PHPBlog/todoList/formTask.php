
              <form form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <input type="hidden" name="id_u" value="<?= $_SESSION["user"]["id_user"]; ?>">
            <input type="hidden" name="id_t" value="<?= $_GET['id_todo'] ?>">
            <div class="form-group">
                <label for="name">title</label>
                <input type="name" class="form-control" name="title"  placeholder="Enter title name">
               
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
              </div>
            
            <button type="submit" class="btn btn-primary">Add new Task</button>
            </form>
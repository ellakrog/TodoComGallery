<link rel="stylesheet" href="user.css" >

<ul class="nav justify-content-center">
  <li class="nav-item">
  <?php
   echo "<a class='nav-link ' href='../home/home.php?id_user={$_SESSION["user"]["id_user"]}'>Home</a>";
  ?>
  </li>
  
  <li class="nav-item">
  <?php
   echo "<a class='nav-link active' href='../blog/blog_create.php?id_user={$_SESSION["user"]["id_user"]}'>New Blog</a>";
  ?>
  </li>
  <li class="nav-item">
  <?php
   echo "<a class='nav-link active' href='../gallery/gallery_page.php?id_user={$_SESSION["user"]["id_user"]}'>Gallery</a>";
  ?>
  </li>
  <li class="nav-item">
  <?php
   echo "<a class='nav-link ' href='../todoList/TodoAndTask_page.php?id_user={$_SESSION["user"]["id_user"]}'>Notes</a>";
  ?>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="../user/logout.php">Logout</a>
  </li>
</ul>

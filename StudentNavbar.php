<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">    
    <a class="navbar-brand" href="StudentHome.php">Welcome</a>
    <div class="ml-auto d-flex align-items-center">
      <div class="profile-info mr-3">
        <img src="kadirnft.png" width="50" height="50" class="d-inline-block align-top" alt="">
        <span style="font-size: larger;"><?php echo $_SESSION["name"]; ?></span> 
      </div>
    </div>
  </div>
</nav>
<!--header-->
<div class="row">
  <div class="header col-lg-10 d-none d-sm-block">
    <img src="img/tomato.png" class="img-fluid" alt="Responsive image" width="100px">
    <span class="title navbar-brand">
      <h1>Fast Groceries</h1>
    </span>
  </div>
  <div class="logAccount col-lg-2">
    <?php 
    
    if(isset($_SESSION['user_name'])){
      echo "<span>Welcome, ",$_SESSION['user_name'],"!</span><br><a href='../Back_Store/logout.php'>Log out</a>";
    }
    else 
    echo"<a class='login' href='login.php'>Login</a> <a class='register' href='signup.php'>Register</a>"
    
    ?>
  </div>
</div>

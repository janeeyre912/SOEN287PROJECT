<?php require_once("../resources/config.php"); ?>
<?php $title = "Login" ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

 <?php login_user(); ?>
<div class="row justify-content-center">
  <div class="col-lg-8">
    <h2 id="customerLogin">Customer Login</h2>
    <p class="signInColumn">Sign In</p>
    
    <form  class="" action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputEmail1" ; style="font-size: 20px">
          Email
        </label>
        <input
          type="email"
          name="email"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
          placeholder="Enter email"
          style="width: 300px"
        />
        <small id="emailHelp" class="form-text text-muted"
          >We'll never share your email with anyone else.</small
        >
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1" ; style="font-size: 20px">
          Password
        </label>

        <input
          type="password"
          name="password"
          class="form-control"
          id="exampleInputPassword1"
          placeholder="Password"
          style="width: 300px"
        />
      </div>
      <button
        type="submit" name = "submit"
        class="btn btn-primary"
        style="background-color: #59886b"
      >
        Login
      </button>

      <sub>
        <a href="" style="position: relative; top: 10px"
          >Forgot Password?</a>
      </sub>
    </form>
    </div>
  </div>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>

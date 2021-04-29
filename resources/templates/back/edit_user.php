<?php 

if(isset($_GET['id'])){
  
  $xml = simplexml_load_file("../datas/user.xml") or die("Error: Cannot create object");
  foreach ($xml->children() as $user){
    if($user->id == $_GET['id']){
      $firstname = $user->firstname;
      $lastname = $user->lastname;
      $username = $user->username;
      $email = $user->email;
      $password = $user->password;
      $telephone = $user->telephone;
      $type = $user->type;
      $id = $user->id;
      break;
    }
  }

    if(isset($_POST['update_user'])){
      $username = $_POST['username'];
      $lastname = $_POST['lastname'];
      $firstname = $_POST['firstname'];
      $password = $_POST['password'];
      $telephone = $_POST['telephone'];
      $email = $_POST['email'];
      $xml = simplexml_load_file("../datas/user.xml") or die("Error: Cannot create object");
      foreach($xml->children() as $user){
        if($user->id == $_GET['id']){
          $user->firstname = $firstname;
          $user->lastname = $lastname;
          $user->username = $username;
          $user->email = $email;
          $user->password = $password;
          $user->telephone = $telephone;
          break;
        }
      }
      file_put_contents('../datas/user.xml',$xml->asXML());
      set_message("user informtion is updated.");
    }
    

}
?>
<div class="main col-lg-9 col-md-9 py-3 flex-grow-1 ">
    <!--    breadcrumb link-->
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?users">users</a></li>
            <li class="breadcrumb-item active" aria-current="page">user information</li>
        </ol>
    </nav>
    <!--  user information-->
    <h4>edit user</h4>
    <h6 class="bg-success"><?php display_message(); ?></h6>
    <form class="user_info" action="" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-lg-4 mb-3">
                <label for="firstname">First name</label>
                <input type="text" name="firstname" placeholder="First name" value="<?php echo $firstname; ?>" required>
            </div>
            <div class="col-lg-4 mb-3">
                <label for="lastname">Last name</label>
                <input type="text"  name="lastname" placeholder="Last name" value="<?php echo $lastname; ?>"  required>
            </div>
            <div class="col-lg-4 mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" aria-describedby="inputGroupPrepend3" value="<?php echo $username; ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-4 mb-3">
                <label for="email">Email</label>
                <input type="text"  name="email" placeholder="Email" value="<?php echo $email; ?>"  required>
            </div>
            <div class="col-lg-4 mb-3">
                <label for="password">Password</label>
                <input type="text"  name="password" placeholder="Password" value="<?php echo $password; ?>" required>
            </div>
            <div class="col-lg-4 mb-3">
                <label for="telephone">Telephone</label>
                <input type="text"  name="telephone" placeholder="Telephone" value="<?php echo $telephone; ?>"  required>
            </div>
        </div>
       <div class="form-row">
            <div class="col-lg-4 mb-3">
                <label for="id">ID</label>
                <input type="text"  name="id" placeholder="id" value="<?php echo $id; ?>"  readonly>
            </div>
            <div class="col-lg-4 mb-3">
                <label for="type">Type</label>
                <input type="text"  name="type" placeholder="type" value="<?php echo $type; ?>" readonly>
            </div>
        </div>

        <!--    confirm button-->
        <div class="form-row">
            <div class="confirm_button col-lg-12">
              <a id="user-id" class="btn btn-danger" href="">Cancel</a>
              <input type="submit" name="update_user" class="btn btn-dark pull-right" value="Update" >
            </div>
        </div>
    </form>
</div>
</div>

<?php

$upload_directory = "Back_Store";
// helper functions

function set_message($msg){

if(!empty($msg)) {

$_SESSION['message'] = $msg;

} else {

$msg = "";

    }
}


function display_message() {

    if(isset($_SESSION['message'])) {

        echo $_SESSION['message'];
        unset($_SESSION['message']);

    }
}


function redirect($location){

return header("Location: $location ");

}


function login_user(){

  if(isset($_POST['submit'])){
  
  $userstatus = "invalid";
  $email = $_POST['email'];
  $_SESSION['user_name'] = $_POST['email'];
  $password = $_POST['password'];
 
  $xml = simplexml_load_file("../datas/user.xml") or die("Error: Cannot create object");
  foreach ($xml->children() as $user){
    if($user->email == $email && $user->password== $password){
      if($user->type== "base"){
         $userstatus = "base";
         $username = $user->username;
         break;
      }
      else if ($user->type == "admin")
        $userstatus = "admin";
        $username = $user->username;
        break;
    }
    else{
     $userstatus = "invalid";
    }
  }
  if($userstatus == "admin"){
        // $_SESSION['user_name'] = $username;
       //echo "this is".$_SESSION['user_name'];
         redirect("../Back_Store"); 
  }
 else if($userstatus == "base") {
       //$_SESSION['user_name'] = $username;
        //echo "this is".$_SESSION['user_name'];
      redirect("../Online_Grocery");
     }
 else{
       //set_message("Your Password or email address are wrong.");
       redirect("login.php");
     }
  }
}

function display_users(){
  
  $xml = simplexml_load_file("../datas/user.xml") or die("Error: Cannot create object");
  foreach ($xml->children() as $user){
    $user_id = $user->id;
    $username = $user->username;
    $lastname = $user->lastname;
    $firstname = $user->firstname;
    $email = $user->email;
    
    $userlist = <<<DELIMETER
    <tr role="row">
        <td row="cell">{$user_id}</td>
        <td row="cell">{$username}</td>
        <td row="cell">{$lastname}</td>
        <td row="cell">{$firstname}</td>
        <td row="cell">{$email}</td>
        <td>
            <button type="button" class="btn btn-sm btn-dark" onclick ="window.location.href = 'index.php?edit_user&id={$user->id}'">Edit</button>
            <button type="button" class="btn btn-sm btn-danger" onclick ="window.location.href = 'index.php?delete_user_id={$user->id}'">Delete</button>
        </td> 
    </tr> 
    
    DELIMETER;
    
    echo $userlist;
    
  }
  
}

function add_user(){
  
  if (isset($_POST['add_user'])){
    $xml = simplexml_load_file("../datas/user.xml") or die("Error: Cannot create object");
    $id = $xml->user->count() + 1;
    $type = "admin";
    $username = $_POST['username'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $addxml= $xml->addChild('user');
    $addxml->addChild('id',$id);
    $addxml->addChild('type',$type);
    $addxml->addChild('username',$username);
    $addxml->addChild('lastname',$lastname);
    $addxml->addChild('firstname',$firstname);
    $addxml->addChild('password',$password);
    $addxml->addChild('telephone',$telephone);
    $addxml->addChild('email',$email);
    file_put_contents('../datas/user.xml',$xml->asXML());
    set_message("USER CREATED");
    redirect("index.php?users");exit();
  }

}


  

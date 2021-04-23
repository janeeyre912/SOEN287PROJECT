<?php require_once("../resources/config.php");

if(isset($_GET['delete_user_id'])){
  $xml = simplexml_load_file("../datas/user.xml") or die("Error: Cannot create object");
  foreach ($xml->user as $theUser){
      if($theUser->id == $_GET['delete_user_id']){
        $dom = dom_import_simplexml($theUser);
        $dom->parentNode->removeChild($dom);
        file_put_contents('../datas/user.xml',$xml->asXML());
        reload_usersId();
        set_message("User Deleted");
        redirect("./index.php?users");
        break;
      }
  }
}
else{
  redirect("./index.php?users");
}

?>

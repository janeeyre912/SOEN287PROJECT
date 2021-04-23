<?php require_once("../resources/config.php");

if(isset($_GET['delete_product_id'])){
  $xml = simplexml_load_file("../datas/product.xml") or die("Error: Cannot create object");
  $replace = false;
  foreach ($xml->children() as $theProduct){
    if($replace){
        $number = $theProduct->itemNb;
        $theProduct->itemNb = $number-1;
    }  
    else if($theProduct->itemNb == $_GET['delete_product_id']){
        $dom = dom_import_simplexml($theProduct);
        $replace = true;
      }
  }
  $dom->parentNode->removeChild($dom);
  file_put_contents('../datas/product.xml',$xml->asXML());
  set_message("Product \"" . $theProduct->name . "\" Deleted");
  redirect("./index.php?products");
}


?>

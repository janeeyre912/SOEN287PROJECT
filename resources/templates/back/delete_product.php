<?php require_once("../resources/config.php");

if(isset($_GET['delete_product_id'])){
  $xml = simplexml_load_file("../datas/products.xml") or die("Error: Cannot create object");
  $replace = false;
  foreach ($xml->product as $theProduct){
    if($replace){
        $dom = dom_import_simplexml($theProduct);
    }  
    else if($theProduct->id == $_GET['delete_product_id']){
        $dom = dom_import_simplexml($theProduct);
        $dom->parentNode->removeChild($dom);
        $dom->itemNb(0)->nodeValue--;
      }
  }
  file_put_contents('../datas/products.xml',$xml->asXML());
  set_message("Product Deleted");
  redirect("./index.php?products");
}


?>

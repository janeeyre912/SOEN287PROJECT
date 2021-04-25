<?php

$upload_directory = "Back_Store";
// helper functions

function set_message($msg)
{

  if (!empty($msg)) {

    $_SESSION['message'] = $msg;
  } else {

    $msg = "";
  }
}


function display_message()
{

  if (isset($_SESSION['message'])) {

    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
}


function redirect($location)
{

  return header("Location: $location ");
}


function login_user()
{

  if (isset($_POST['submit'])) {

    $userstatus = "invalid";
    $email = $_POST['email'];
    $_SESSION['user_name'] = $_POST['email'];
    $password = $_POST['password'];

    $xml = simplexml_load_file("../datas/user.xml") or die("Error: Cannot create object");
    foreach ($xml->children() as $user) {
      if ($user->email == $email && $user->password == $password) {
        if ($user->type == "base") {
          $userstatus = "base";
          $username = $user->username;
          break;
        } else if ($user->type == "admin")
          $userstatus = "admin";
        $username = $user->username;
        break;
      } else {
        $userstatus = "invalid";
      }
    }
    if ($userstatus == "admin") {
      // $_SESSION['user_name'] = $username;
      //echo "this is".$_SESSION['user_name'];
      redirect("../Back_Store");
    } else if ($userstatus == "base") {
      //$_SESSION['user_name'] = $username;
      //echo "this is".$_SESSION['user_name'];
      redirect("../Online_Grocery");
    } else {
      echo "<h3 class='text-center bg-warning'>"."Your username or password is wrong."."</h3>";
    // echo '<script> alert("Your password or email address is wrong ")</script>';
    session_destroy();
    }
  }
}

function display_users()
{

  $xml = simplexml_load_file("../datas/user.xml") or die("Error: Cannot create object");
  foreach ($xml->children() as $user) {
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

function reload_usersId()
{
  $xml = simplexml_load_file("../datas/user.xml") or die("Error: Cannot create object");
  $i = 1;
  foreach ($xml->children() as $user) {
    $user->id = $i;
    $i++;
  }
  file_put_contents('../datas/user.xml', $xml->asXML());
}

function add_user()
{

  if (isset($_POST['add_user'])) {
    $xml = simplexml_load_file("../datas/user.xml") or die("Error: Cannot create object");
    $id = $xml->user->count() + 1;
    $type = "admin";
    $username = $_POST['username'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $addxml = $xml->addChild('user');
    $addxml->addChild('id', $id);
    $addxml->addChild('type', $type);
    $addxml->addChild('username', $username);
    $addxml->addChild('lastname', $lastname);
    $addxml->addChild('firstname', $firstname);
    $addxml->addChild('password', $password);
    $addxml->addChild('telephone', $telephone);
    $addxml->addChild('email', $email);
    file_put_contents('../datas/user.xml', $xml->asXML());
    set_message("USER CREATED");
    redirect("index.php?users");
    exit();
  }
}

function add_base()
{
  if (isset($_POST['add_base'])) {
    $xml = simplexml_load_file("../datas/user.xml") or die("Error: Cannot create object");
    $id = $xml->user->count() + 1;
    $type = "base";
    $username = $_POST['lastname'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $addxml = $xml->addChild('user');
    $addxml->addChild('id', $id);
    $addxml->addChild('type', $type);
    $addxml->addChild('username', $username);
    $addxml->addChild('lastname', $lastname);
    $addxml->addChild('firstname', $firstname);
    $addxml->addChild('password', $password);
    $addxml->addChild('telephone', $telephone);
    $addxml->addChild('email', $email);
    file_put_contents('../datas/user.xml', $xml->asXML());
    set_message("BASE CREATED");
    redirect("../Online_Grocery/login.php");
    exit();
  }
}


function displayProductList()
{

  $xml = simplexml_load_file("../datas/product.xml") or die("Error: Cannot create object");

  foreach ($xml->children() as $product) {

    $product_id = $product->itemNb;
    $productName = $product->name;
    $productAisle = $product->aisle;
    $productPrice = $product->price;
    $productStock = $product->stock;

    $productlist = <<<DELIMETER
    <tr role="row">
        <td row="cell" class= "product">{$product_id}</td>
        <td row="cell" class= "product">{$productName}</td>
        <td row="cell" class= "product">{$productAisle}</td>
        <td row="cell" class= "product">{$productPrice}</td>
        <td row="cell" class= "product">{$productStock}</td>
        <td class= "product">
            <button type="button" class="btn btn-sm btn-dark" onclick ="window.location.href = 'index.php?edit_product&itemNb={$product->itemNb}'">Edit</button>
            <button type="button" class="btn btn-sm btn-danger" onclick ="window.location.href = 'index.php?delete_product_id={$product->itemNb}'">Delete</button>
        </td> 
    </tr> 
    
    DELIMETER;

    echo $productlist;
  }
}

function displayProduct()
{
  $xml = simplexml_load_file("../datas/product.xml") or die("Error: Cannot create object");

  foreach ($xml->children() as $product) {

    if ($product->itemNb == $_GET['itemNb']) {
      $id = $product->itemNb;
      $name = $product->name;
      $price = $product->price;
      $ext = $product->ext;
      $desc = $product->desc;
      $image = $name . "." . $ext;
      break;
    }
  }



  $productInfo = <<<DELIMETER

    <div class="main">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="row product">
            <div class="col-sm align-self-start">
              <img
                class="itemImg img-fluid animated fadeInUp adjust"
                src="../Online_Grocery/img/$image"
                alt=""
                width="400"
                height="320"
              />
            </div>
            <div class="col-sm align-self-start">
              <h3>$name</h3>
              <p><i>packaged</i></p>
              <p class="itemPrice">$price Per 100g</p>
              <h6>Quantity</h6>
              <div>
                <div class="def-number-input number-input mb-0 w-100">
                  <button
                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                    class="minus"
                  >
                    -
                  </button>
                  <input
                    class="quantity"
                    min="1"
                    name="quantity"
                    value="1"
                    type="number"
                  />
                  <button
                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                    class="plus"
                  >
                    +
                  </button>
                </div>
              </div>
              <br />
              <p>Price: <span class="price">$price</span></p>
              <button type="button" class="btn btn-danger" style="width: 30%">
                Add to Cart
              </button>
              <br />
              <div class="product_description">
                <h3>Product description</h3>
                <p>
                  $desc
                </p>
                <p>
                  <a
                    class="btn btn-dark"
                    data-toggle="collapse"
                    href="#moreDescription"
                    role="button"
                    aria-expanded="false"
                    aria-controls="collapseExample"
                  >
                    More description
                  </a>
                </p>
                <div class="collapse" id="moreDescription">
                  <div class="card card-body">#item No.$id</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script>
    var itemQuantity;
    var price = document.getElementsByClassName('price')[0]
    var itemPrice = parseFloat(price.innerText)
    
    document.querySelector(".plus").addEventListener('click', function (){
    
        itemQuantity = document.getElementsByClassName('quantity')[0].value;
        price.innerText = Math.round(itemQuantity * itemPrice * 100) / 100
    })
    
    document.querySelector(".minus").addEventListener('click', function (){
    
        itemQuantity = document.getElementsByClassName('quantity')[0].value;
        price.innerText = Math.round(itemQuantity * itemPrice * 100) / 100
    })
    
    var quantityInputs = document.querySelector(".quantity")
    quantityInputs.addEventListener('change', function(event){
            var input = event.target
            if(isNaN(input.value) || input.value <= 0){
                input.value = 1
            }
            updateItemPrice()
        })
    
    
    function updateItemPrice(){
        itemQuantity = document.getElementsByClassName('quantity')[0].value
        price.innerText = Math.round(itemQuantity * itemPrice * 100) / 100
    }

    let cartButton;
    
    let currentProduct = {};
    
    window.addEventListener("load", () => {
      //Record the item's data.
      currentProduct.name = document.getElementsByTagName("h3")[0].innerText;
      currentProduct.imgSrc = document
        .querySelector(".itemImg")
        .getAttribute("src");
      currentProduct.price = parseFloat(
        document.querySelector(".itemPrice").innerText.replace("$", "")
      );
    currentProduct.amount =  parseInt(document.querySelector(".quantity").value);
      //Select all 'add to cart' buttons on the page (only one on this page).
      cartButton = document.querySelector(".btn-danger");
    
      //Callback to click event.
      //If a button is clicked, add the product to cart.
      cartButton.addEventListener("click", () => {
        //Add the product to the browser storage.
        addItemToCart(
          currentProduct,
        parseInt(document.querySelector(".quantity").value)
        );
      });
    });
    </script>
    DELIMETER;

  echo $productInfo;
}
function displayALLProduct()
{
  $xml = simplexml_load_file("../datas/product.xml") or die("Error: Cannot create object");

  foreach ($xml->children() as $product) {

    $name = $product->name;
    $ext = $product->ext;
    $image = $name . "." . $ext;
    $price = $product->price;


    $productImg = <<<DELIMETER

              <div class="col-md-4 align-self-start">
                <a onclick ="window.location.href = 'basicPage.php?item&itemNb={$product->itemNb}'">
                  <img class="itemImg img-fluid animated fadeInUp" src="../Online_Grocery/img/$image" alt="" href="#">
                </a>
                <p class="item name">$name</p>
                <p class="item price">$price</p>
                <button type="button" class="btn btn-danger">Add to Cart</button>

              </div>
              DELIMETER;

    echo $productImg;
  }
}

function displayFruitAndVegetableProducts()
{
  $xml = simplexml_load_file("../datas/product.xml") or die("Error: Cannot create object");

  foreach ($xml->children() as $product) {
    if ($product->aisle == "Fruits and Vegetables") {
      $name = $product->name;
      $ext = $product->ext;
      $image = $name . "." . $ext;
      $price = $product->price;


      $productImg = <<<DELIMETER

              <div class="col-md-4 align-self-start">
                <a onclick ="window.location.href = 'basicPage.php?item&itemNb={$product->itemNb}'">
                  <img class="itemImg img-fluid animated fadeInUp" src="../Online_Grocery/img/$image" alt="" href="#">
                </a>
                <p class="item name">$name</p>
                <p class="item price">$price</p>
                <button type="button" class="btn btn-danger">Add to Cart</button>

              </div>
              DELIMETER;

      echo $productImg;
    }
  }
}

function displayMeatAndPoultryProducts()
{
  $xml = simplexml_load_file("../datas/product.xml") or die("Error: Cannot create object");

  foreach ($xml->children() as $product) {

    if ($product->aisle == "Meat and Poultry") {
      $name = $product->name;
      $ext = $product->ext;
      $image = $name . "." . $ext;
      $price = $product->price;


      $productImg = <<<DELIMETER

        <div class="col-md-4 align-self-start">
          <a onclick ="window.location.href = 'basicPage.php?item&itemNb={$product->itemNb}'">
            <img class="itemImg img-fluid animated fadeInUp" src="../Online_Grocery/img/$image" alt="" href="#">
          </a>
          <p class="item name">$name</p>
          <p class="item price">$price</p>
          <button type="button" class="btn btn-danger">Add to Cart</button>

        </div>
        DELIMETER;

      echo $productImg;
    }
  }
}

function displayDairyAndEggsProducts()
{
  $xml = simplexml_load_file("../datas/product.xml") or die("Error: Cannot create object");

  foreach ($xml->children() as $product) {

    if ($product->aisle == "Dairy and Eggs") {
      $name = $product->name;
      $ext = $product->ext;
      $image = $name . "." . $ext;
      $price = $product->price;


      $productImg = <<<DELIMETER

          <div class="col-md-4 align-self-start">
            <a onclick ="window.location.href = 'basicPage.php?item&itemNb={$product->itemNb}'">
              <img class="itemImg img-fluid animated fadeInUp" src="../Online_Grocery/img/$image" alt="" href="#">
            </a>
            <p class="item name">$name </p>
            <p class="item price">$price</p>
            <button type="button" class="btn btn-danger">Add to Cart</button>

          </div>
          DELIMETER;

      echo $productImg;
    }
  }
}

function displaySeafoodProducts()
{
  $xml = simplexml_load_file("../datas/product.xml") or die("Error: Cannot create object");

  foreach ($xml->children() as $product) {

    if ($product->aisle == "seafood") {
      $name = $product->name;
      $ext = $product->ext;
      $image = $name . "." . $ext;
      $price = $product->price;


      $productImg = <<<DELIMETER

          <div class="col-md-4 align-self-start">
            <a onclick ="window.location.href = 'basicPage.php?item&itemNb={$product->itemNb}'">
              <img class="itemImg img-fluid animated fadeInUp" src="../Online_Grocery/img/$image" alt="" href="#">
            </a>
            <p class="item name">$name </p>
            <p class="item price">$price</p>
            <button type="button" class="btn btn-danger">Add to Cart</button>

          </div>
          DELIMETER;

      echo $productImg;
    }
  }
}

function displayBeverageProducts()
{
  $xml = simplexml_load_file("../datas/product.xml") or die("Error: Cannot create object");

  foreach ($xml->children() as $product) {

    if ($product->aisle == "beverages") {
      $name = $product->name;
      $ext = $product->ext;
      $image = $name . "." . $ext;
      $price = $product->price;


      $productImg = <<<DELIMETER

          <div class="col-md-4 align-self-start">
            <a onclick ="window.location.href = 'basicPage.php?item&itemNb={$product->itemNb}'">
              <img class="itemImg img-fluid animated fadeInUp" src="../Online_Grocery/img/$image" alt="" href="#">
            </a>
            <p class="item name">$name</p>
            <p class="item price">$price</p>
            <button type="button" class="btn btn-danger">Add to Cart</button>

          </div>
          DELIMETER;

      echo $productImg;
    }
  }
}


function displayBeerAndWineProducts()
{
  $xml = simplexml_load_file("../datas/product.xml") or die("Error: Cannot create object");

  foreach ($xml->children() as $product) {

    if ($product->aisle == "Beer and Wine") {
      $name = $product->name;
      $ext = $product->ext;
      $image = $name . "." . $ext;
      $price = $product->price;


      $productImg = <<<DELIMETER

          <div class="col-md-4 align-self-start">
            <a onclick ="window.location.href = 'basicPage.php?item&itemNb={$product->itemNb}'">
              <img class="itemImg img-fluid animated fadeInUp" src="../Online_Grocery/img/$image" alt="" href="#">
            </a>
            <p class="item name">$name</p>
            <p class="item price">$price</p>
            <button type="button" class="btn btn-danger">Add to Cart</button>

          </div>
          DELIMETER;

      echo $productImg;
    }
  }
}

function add_product()
{
  if (isset($_POST["add_product"])) {
    $name = $_POST["pro-name"];

    //check if name already exists
    $file = '../datas/product.xml';
    $xml = simplexml_load_file($file) or die("Error: Cannot create object");;
    $products = $xml;

    $process = true;
    foreach ($xml->children() as $product) {
      if (strcasecmp($product->name, $name) == 0) {
        set_message("The name \"" . $name . "\" is already taken by another product.");
        $process = false;
      }
    }


    if ($process) {
      $description = $_POST["pro-desc"];
      $aisle = $_POST["aisle"];
      $price = $_POST["pro-price"];
      $units = $_POST["quantity"];

      $target_dir = "../Online_Grocery/img/";
      $target_file = $target_dir . basename($_FILES["image"]["name"]);

      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      $target_file = $target_dir . strtolower($name) . "." . $imageFileType;

      // Check if image file is a actual image or fake image

      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }


      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded as " . $name . "." . $imageFileType;
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }


      // Update
      $file = '../datas/product.xml';
      $xml = simplexml_load_file($file);

      $products = $xml;

      $product = $products->addChild('product');
      $product->addChild('itemNb', count($products));
      $product->addChild('name', $name);
      $product->addChild('desc', $description);
      $product->addChild('aisle', $aisle);
      $product->addChild('price', $price);
      $product->addChild('stock', $units);
      $product->addChild('ext', $imageFileType);

      $xml->asXML($file);

      set_message("Product \"" . $name . "\" Added");
    }
    redirect("./index.php?products");
  }
}


function edit_product()
{

  if (isset($_POST['update_product'])) {

    $productName = $_POST['pro-name'];
    $productDescription = $_POST['pro-desc'];
    $productAisle = $_POST['aisle'];
    $productPrice = $_POST['pro-price'];
    $productStock = $_POST['pro-qty'];

    $file = $_FILES['pro-img'];
    $fileTmpPath = $_FILES['pro-img']['tmp_name'];
    $fileName = $_FILES['pro-img']['name'];
    $fileSize = $_FILES['pro-img']['size'];
    $fileType = $_FILES['pro-img']['type'];
    $fileError = $_FILES['pro-img']['error'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $productImgName = strtolower($productName);
    $newFileName = $productImgName . "." . $fileExtension;
    $allowedfileExtensions = array('jpg', 'jpeg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
    if (in_array($fileExtension, $allowedfileExtensions)) {
      if ($fileError === 0) {
        if ($fileSize < 1000000) {
        } else {
          set_message("File uploaded is too large!");
          display_message();
        }
      } else {
        set_message("There was an error uploading your file!");
        display_message();
      }
    } else {
      set_message("Image format not supported.");
      display_message();
    }
    $target_dir = "../Online_Grocery/img/" . $newFileName;
    if (move_uploaded_file($fileTmpPath, $target_dir)) {
      set_message("File successfully uploaded!");
      display_message();
    } else {
      set_message('There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.');
      display_message();
    }

    $xml = simplexml_load_file("../datas/product.xml") or die("Error: Cannot create object");
    foreach ($xml->children() as $product) {
      if ($product->itemNb == $_GET['itemNb']) {

        $product->name = $productName;
        $product->desc = $productDescription;
        $product->aisle = $productAisle;
        $product->price = $productPrice;
        $product->stock = $productStock;
        $product->ext = $fileExtension;
      }
    }
    file_put_contents('../datas/product.xml', $xml->asXML());
    redirect("./index.php?products");
  }
}

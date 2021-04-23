<?php require_once("../resources/config.php"); ?>
<?php $title = "Homepage" ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>



  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">

      <div class="row justify-content-center">
        <div class="col-lg">
          <img class="homeImg1 img-fluid animated fadeInUp" src="../Online_Grocery/img/homeImg.jpg" alt="">
        </div>
      </div>
      <div class="">
        <br>
      </div>

      <div class="row">
        <div class="col-sm">
          <a onclick="window.location.href='basicPage.php?fruits_vegetables'">
            <img class="homeImg2 img-fluid animated fadeInUp" src="../Online_Grocery/img/fruitnVeg.jpg" alt="">
        </div>
        <div class="col-sm">
          <a onclick="window.location.href='basicPage.php?dairy_eggs'">
            <img class="homeImg2 img-fluid animated fadeInUp" src="../Online_Grocery/img/dairy.jpg" alt="" href="">
        </div>
        <div class="col-sm">
          <a onclick="window.location.href='basicPage.php?seafood'">
            <img class="homeImg2 img-fluid animated fadeInUp" src="../Online_Grocery/img/seafood.jpg" alt="">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm">
          <a onclick="window.location.href='basicPage.php?meat_poultry'">
            <img class="homeImg2 img-fluid animated fadeInUp" src="../Online_Grocery/img/meat.png" alt="">
        </div>
        <div class="col-sm">
          <a onclick="window.location.href='basicPage.php?beer_wine'">
            <img class="homeImg2 img-fluid animated fadeInUp" src="../Online_Grocery/img/beerWine.png" alt="">

        </div>
        <div class="col-sm">
          <a onclick="window.location.href='basicPage.php?beverages'">
            <img class="homeImg2 img-fluid animated fadeInUp" src="../Online_Grocery/img/beverage.png" alt="">
        </div>
      </div>
      <div class="">

        <br><br> <br><br>

      </div>

    <div class="col-lg-2">
    </div>

  </div>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>

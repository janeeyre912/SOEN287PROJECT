<?php require_once("../resources/config.php"); ?>
<?php $title = "Our Products" ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<?php

  if(isset($_GET['allproduct'])){


    include(TEMPLATE_FRONT . "/allproduct.php");


}
        if(isset($_GET['fruits_vegetables'])){


            include(TEMPLATE_FRONT . "/fruits_vegetables.php");


        }
        if(isset($_GET['dairy_eggs'])){


        include(TEMPLATE_FRONT . "/dairy_eggs.php");


        }


        if(isset($_GET['seafood'])){


        include(TEMPLATE_FRONT . "/seafood.php");


        }


        if(isset($_GET['meat_poultry'])){


            include(TEMPLATE_FRONT . "/meat_poultry.php");


        }


        if(isset($_GET['beer_wine'])){


            include(TEMPLATE_FRONT . "/beer_wine.php");


        }

        if(isset($_GET['beverages'])){


            include(TEMPLATE_FRONT . "/users.php");


        }

        if(isset($_GET['item'])){

            include(TEMPLATE_FRONT . "/item.php");

        }
?>

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>

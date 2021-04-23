<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="img/favicon.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fast Groceries Back Store</title>
  <!--  CSS Stylesheets-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/user_info.css">
  <link rel="stylesheet" href="css/index_bs.css">

  <!--  Font Awesome-->
  <script src="https://kit.fontawesome.com/5e7c980afc.js" crossorigin="anonymous"></script>

  <!--  Bootstrap Scripts-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
  <!-- Top items -->
  <div class="header row">
    <?php include(TEMPLATE_BACK . "/top.php"); ?>
  </div>
  <!-- Sidebar Menu items -->
  <div class="row min-vh-100 flex-column flex-md-row">
    <?php include(TEMPLATE_BACK . "/side_nav.php"); ?>
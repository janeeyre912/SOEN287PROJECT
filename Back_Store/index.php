<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_BACK . "/header.php"); ?>

<?php
if (!isset($_SESSION['user_name'])) {
    redirect("../Online_Grocery");
}

?>

<?php
if ($_SERVER['REQUEST_URI'] == "/Back_Store/" || $_SERVER['REQUEST_URI'] == "/Back_Store/index.php") {
    include(TEMPLATE_BACK . "/admin_content.php");
}

//ORDERS
if (isset($_GET['orders'])) {
    include(TEMPLATE_BACK . "/order.php");
}
if (isset($_GET['addOrder'])) {
    include("addOrder.php");
}
if (isset($_GET['edit_order'])) {
    include(TEMPLATE_BACK . "/editOrder.php");
}

//PRODUCTS
if (isset($_GET['products'])) {
    include(TEMPLATE_BACK . "/products.php");
}
if (isset($_GET['add_product'])) {
    include(TEMPLATE_BACK . "/add_product.php");
}
if (isset($_GET['edit_product'])) {
    include(TEMPLATE_BACK . "/edit_product.php");
}

//USERS
if (isset($_GET['users'])) {
    include(TEMPLATE_BACK . "/users.php");
}
if (isset($_GET['add_user'])) {
    include(TEMPLATE_BACK . "/add_user.php");
}
if (isset($_GET['edit_user'])) {
    include(TEMPLATE_BACK . "/edit_user.php");
}

//DELETE
if (isset($_GET['delete_order_id'])) {
    include(TEMPLATE_BACK . "/delete_order.php");
}
if (isset($_GET['delete_product_id'])) {
    include(TEMPLATE_BACK . "/delete_product.php");
}
if (isset($_GET['delete_user_id'])) {
    include(TEMPLATE_BACK . "/delete_user.php");
}

?>
<?php include(TEMPLATE_BACK . "/footer.php") ?>

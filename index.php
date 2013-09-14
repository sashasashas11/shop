<?php

include_once 'DBHelper.php';
include 'cart_fns.php';
DBHelper::createServerConnection();
DBHelper::connectToDB();
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = Array();
    $_SESSION['total_items'] = 0;
    $_SESSION['total_price'] = '0.00';
}
$view = empty($_GET['view']) ? 'index' : $_GET['view'];

switch ($view) {
    case ('index'):
        $products = DBHelper::getAllProducts();
        break;
    case ('cat'):
        $cat = $_GET['id'];
        $products = DBHelper::getCatProducts($cat);
        break;
    case ('product'):
        $id = $_GET['id'];
        $product = DBHelper::getProduct($id);
        $coment = DBHelper::getUserMessage($id);
        break;
    case ('add_to_cart'):
        $id = $_GET['id'];
        $add_item = add_to_cart($id);
        $_SESSION['total_items'] = total_item($_SESSION['cart']);
        $_SESSION['total_price'] = total_price($_SESSION['cart']);
        header('Location: index.php?view=product&id=' . $id);
        break;
    case ('update_cart'):
        update_cart();
        $_SESSION['total_items'] = total_item($_SESSION['cart']);
        $_SESSION['total_price'] = total_price($_SESSION['cart']);
        header('Location: index.php?view=cart');
        break;
    case ('order'):
        break;
    case ('search'):
        if (isset($_POST["search"]) and ($_POST["search"] !== '')) {
            $search = $_POST["search"];
            $search = trim($search);
            $search = htmlspecialchars($search);
            $search = stripslashes($search);

            if (strlen($search) >= 4) 
            {
                $product_s = DBHelper::getSearch($search);
            } 
            else 
            {
                $error = "Длина текста должна быть не менее четырёх символов";
            }
        }
        break;
    case ('login'):
        break;
    case ('reg'):
        break;
    case ('exit'):
        $_SESSION["login"] = null;
        unset($_SESSION['login']);
        header('Location: index.php');
        break;
    case ('coment'):
        $time = time();
        $user = $_SESSION['id'];
        $product = $_SESSION['id_product'];
        $text = $_POST['message'];
        DBHelper::addComent($user, $product, $text, $time);
        header('Location: index.php?view=product&id='.$product);
        break;
    case (del):
        $id=$_GET['delid'];
        DBHelper::deleteComent($id);
        header('Location: index.php?view=product&id='.$_SESSION['id_product']);
       break;
}
$arr = array('index', 'cat', 'product', 'cart', 'add_to_cart', 'update_cart', 'order', 'search', 'login', 'reg', 'exit', 'coment','del');
if (!in_array($view, $arr))
    die('Eror 404');
include ($_SERVER['DOCUMENT_ROOT'] . '/views/layouts/shop.php');
?>
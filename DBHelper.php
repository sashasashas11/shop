<?php

class DBHelper {

    private static $connection_identifier;
    private static $identifier_db;
   private static $host = 'localhost';
    private static $pasword = '';
    private static $db = 'shop';
    private static $user = 'root';

    public static function createServerConnection() {
        DBHelper::$connection_identifier = @mysql_connect(DBHelper::$host, DBHelper::$user, DBHelper::$pasword) or die("Could not connect to MySQL server!");
    }

    public static function connectToDB() {
        DBHelper::$identifier_db = mysql_select_db(DBHelper::$db, DBHelper::$connection_identifier) or die("Could not select `calendar` database!");
    }

    public static function db_result_to_arrey($res) {
        $res_arrey = array();
        $caunt = 0;
        while ($row = mysql_fetch_array($res)) {
            $res_arrey[$caunt] = $row;
            $caunt++;
        }
        return $res_arrey;
    }

    public static function getAllProducts() {
        $res = mysql_query("SELECT *  FROM products  ORDER BY id DESC");
        return $resalt = DBHelper::db_result_to_arrey($res);
    }

    public static function getAllCategory() {
        $res = mysql_query("SELECT *  FROM categories  ORDER BY id DESC");
        return $resalt = DBHelper::db_result_to_arrey($res);
    }

    public static function getProduct($id) {
        $res = mysql_query("SELECT *  FROM products  where id='" . $id . "'");
        return $resalt = mysql_fetch_array($res);
    }

    public static function getCatID($id) {
        $res = mysql_query("SELECT id FROM categories where name='" . $id . "'");

        return $resalt = mysql_fetch_array($res);
    }

    public static function getCatProducts($id) {
        $res = mysql_query("SELECT *  FROM products  where `category`=(SELECT id FROM categories where name='" . $id . "')");
        return $resalt = DBHelper::db_result_to_arrey($res);
    }

    public static function getPrice($id) {
        $res = mysql_query("SELECT price  FROM products  where id='$id'");
        return $res;
    }

    public static function addOrder($id, $caunt, $user_name, $surname, $adress, $email, $telefon, $post_index, $date, $time) {
        $add = mysql_query("INSERT INTO `orders` (`id_product`, `caunt`, `user_name`, `surname`, `adress`, `email`, `telefone`, `post_index`, `date`, `time`) VALUES ('$id','$caunt', '$user_name', '$surname', '$adress', '$email', '$telefon', '$post_index', '$date', '$time')");
    }

    public static function getSearch($search) {
        $res = mysql_query("SELECT * FROM products WHERE title LIKE '%$search%'");
        return $resalt = DBHelper::db_result_to_arrey($res);
    }
    public static function addUser($login, $password, $avatar, $name, $telefone, $mail) {
        $add = mysql_query("INSERT INTO `users` SET  `login`='" . $login . "', `password`='" . $password . "', `name`='" . $name . "', `mail`='" . $mail . "', `telefon`='" . $telefone . "', `avatar`='" . $avatar . "'") or die("Error Insert");
    }

    public static function getUserLogin($login) {
        return $res = mysql_query("SELECT id FROM users WHERE login='" . $login . "'");
    }

    public static function getUser($login) {
        return $res = mysql_query("SELECT *  FROM users WHERE login='" . $login . "'");
    }

    public static function getAllUser() {
      return  $res = mysql_query("SELECT login FROM users");
    }

    public static function deleteUser($id) {
        $delete = mysql_query("delete from users where id='" . $id . "'");
    }
    public static function updateUser($id, $name, $mail, $tel) {
         $update = mysql_query("update users set name='".$name."', mail='".$mail."', telefon='".$tel."' where id='" . $id . "'");
    }
    
    public static function addComent($user, $product, $text, $time) {
        $add = mysql_query("INSERT INTO `record` (`user_id`, `product_id`, `text`, `time`) VALUES ($user, $product, '$text', '$time')") or die("Error Insert");
    }
    public static function getUserMessage($id){
        $res = mysql_query("SELECT r.id as id, u.login, r.product_id, r.text, r.time, u.avatar FROM record r inner join users u on r.user_id=u.id where product_id=$id");
        return $resalt = DBHelper::db_result_to_arrey($res);
    }
    
    public static function deleteComent($id) {
        $delete = mysql_query("delete from record where id='" . $id . "'");
    }
}

?>

<h2 id="cart-hed">Оформить заказ</h2>
<?php
if ($_SESSION['cart'] && !isset($_POST['order'])) {
    ?>
    <form action="index.php?view=order" method="post" id="cart-form">

        <table id="mycart" align="center" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <th>Товар</th>
                <th>Цена</th>
                <th>Кол-во</th>
                <th>Всего</th>
            </tr>
            <?php
            foreach ($_SESSION['cart'] as $id => $quantity) :
                $product = DBHelper::getProduct($id);
                ?>
                <tr>
                    <td align="center"><?php= $product['title'] ?></td>
                    <td align="center"><?php= number_format($product['price'],2) ?>$</td>
                    <td align="center"><?php= $quantity ?> </td>
                    <td align="center">$<?php=number_format($product['price'] * $quantity ,2) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <p class="total" >Общая сумма заказа:  <span class="product-price">$<?php= $_SESSION['total_price'] ?></span></p>
        <div class="order">
            <p >
                <label >Ваше имя:</label>
                <input id="input_name" name="name" type="text"  maxlength="15">
            </p>
            <p>
                <label >Ваше фамилия:</label>
                <input id="input_name" name="surname" type="text"  maxlength="15">
            </p>
            <p>
                <label >Ваше адрес:</label>
                <input id="input_name" name="adress" type="text"  maxlength="15">
            </p>
            <p >
                <label >Ваше e-mail:</label>
                <input id="input_name" name="email" type="text"  maxlength="15">
            </p>
            <p>
                <label >Ваше телефон:</label>
                <input id="input_name" name="telefone" type="text"  maxlength="15">
            </p>
            <p>
                <label >Ваше почтовый индекс:</label>
                <input id="input_name" name="post_index" type="text"  maxlength="15">
            </p>
        </div>
        <p align="center"><input type="submit" name="order" value="Заказать" /></p>

    </form>

    <?php
}

    if ($_SESSION['cart'] && isset($_POST['order'])) {
      
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $adress=$_POST['adress'];
        $email=$_POST['email'];
        $telefon=$_POST['telefon'];
        $post_index= $_POST['post_index'];
        $date = date('Y-m-d');
        $time = date('H:i:s');
        
        foreach ($_SESSION['cart'] as $id => $quantity) :
            DBHelper::addOrder($id, $quantity, $name, $surname, $adress, $email, $telefon, $post_index, $date, $time);
        endforeach;
        echo 'Ваш заказ успешно оформлен! Спасибо за покупку!';
    }

?>	

<h2 id="cart-hed">Ваша корзина товаров</h2>
<?php
if ($_SESSION['cart']){

?>
<form action="index.php?view=update_cart" method="post" id="cart-form">

<table id="mycart" align="center" cellspacing="0" cellpadding="0" border="0">
	  <tr>
		  <th>Товар</th>
			<th>Цена</th>
			<th>Кол-во</th>
			<th>Всего</th>
	  </tr>
<?php foreach ($_SESSION['cart'] as $id => $quantity) :
    $product=  DBHelper::getProduct($id);
    
?>
	  <tr>
          <td align="center"><?php=$product['title']?></td>
    	  <td align="center"><?php=$product['price']?>$</td>
    	  <td align="center"><input type="text" size="2" name="<?php=$id ?>" maxlength="2" value="<?php=$quantity?>" /></td>
    	  <td align="center">$<?php=$product['price']*$quantity?></td>
	  </tr>
          <?php endforeach; ?>
</table>	
	 <p class="total" >Общая сумма заказа:  <span class="product-price">$<?php=$_SESSION['total_price']?></span></p>
	 <p align="center"><input type="submit" name="update" value="Обновить" /></p>
	
</form>
<p align="center"><a href="index.php?view=order">Оформить заказ</a></p>
<?php 
} 
 else {
     echo '<p>Ваша корзина пуста</p>';     
}
?>	

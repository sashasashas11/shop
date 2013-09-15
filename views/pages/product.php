<div class="product">
    <div><a href="#"><img src="userfiles/<?php= $product['image'] ?>" alt="" /></a></div>
    <div class="description"> 
        <div class="product-name"><a href="#"><?php echo  $product['title'] ?></a></div>
        <div class="product-price">Цена: <? echo $product['price'] ?> $</div>
    </div>
    <div class="product-description"><pre> <?php echo $product['description'] ?> </pre></div>
    <div class="cart"> <a id="add" href="index.php?view=add_to_cart&id=<?php echo $product['id'] ?>">Добавить в корзину</a> </div>
    <?php
    if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
       ?>
        
    <?php
 echo "Вы вошли на сайт, как гость<br>";
    } else {
        
        ?>
    <form  method="Post" action="index.php?view=coment">
            <h1>Коментарии:</h1>
            <p>Ввести сообщения:</br> 
                <textarea name="message" placeholder="Коментарий..." rows="5" cols="40" > </textarea>
            </p>
            <input type="submit" value="Отправить" > 
        </form>
    <?php }?>
        <table border="1" cellpadding="5" cellspacing="5">
            <tr>
                <th> Avatar </th>
                <th> Name </th>
                <th> Text </th>
                <th> Date </th>
                <th>Action</th>
            </tr>
            <?php
            $_SESSION['id_product'] = $_GET['id'];
            foreach ($coment as $row):
                ?>
                <tr class="table">
                    <td>
                        <img width="100" title="Изображение" alt="аватар" src="<?php $_SERVER['DOCUMENT_ROOT']?>/avatar/<?php echo  $row["avatar"] ?>" border="0">
                    </td>
                    <td> <?php echo  $row["login"]; ?> </td>
                    <td> <?php echo  $row["text"]; ?>  </td>                     
                    <td> <?php echo  date("Y.m.d", $row["time"]); ?>  </td>

                    <td>
                        <?php
                        if (isset($_SESSION['login'])) {
                           if ($_SESSION['login'] == $row["login"]){
                            echo '<a href ="index.php?view=del&delid=' . $row["id"] . '">' . delete . ' </a>';
                           }
                         }                        
                        ?>  
                        
                       
                       
                    </td>
                </tr>
                <?php
            endforeach;
        
        ?>
    </table>
</div>


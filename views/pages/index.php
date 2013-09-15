<?php
foreach ($products as $elem):
    ?>
<div class="product">
    <div><a href="index.php?view=product&id=<?php echo $elem['id']?>"><img  src="userfiles/<?php echo $elem['image']?>" alt="<?php echo $elem['title']?>" width="100"  height="150" /></a></div>
    <div class="description"> 
        <div class="product-name"><a href="index.php?view=product&id=<?php echo $elem['id']?>"><?php echo $elem['title']?></a></div>
        <div class="product-price">Цена: <?php echo $elem['price']?> $</div>
    </div>
</div>
    <?php
endforeach;
?>

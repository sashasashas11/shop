<?php
foreach ($products as $elem):
    ?>
<div class="product">
    <div><a href="index.php?view=product&id=<?php=$elem['id']?>"><img src="userfiles/<?php=$elem['image']?>" alt="<?php=$elem['title']?>" width="100"  height="150" /></a></div>
    <div class="description"> 
        <div class="product-name"><a href="index.php?view=product&id=<?php=$elem['id']?>"><?php=$elem['title']?></a></div>
        <div class="product-price">Цена: <?php=$elem['price']?> $</div>
    </div>
</div>
    <?php
endforeach;
?>

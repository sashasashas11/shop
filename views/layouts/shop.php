
<!DOCTYPE html>
<html>
    <head>
        <meta charset=UTF-8">
        <link href="style/style.css" rel="stylesheet" >
        <link href="style/menu.css" rel="stylesheet" >
        <title>Магазин</title>
    </head>
    <body>
        <script src="script.js">           
        </script>

        <div class="wrapper">

<script type="text/javascript" src="//vk.com/js/api/openapi.js?82"></script>

<!-- <script type="text/javascript">
  VK.init({apiId: 3483724});
</script>


<div id="vk_auth"></div>
<script type="text/javascript">
VK.Widgets.Auth("vk_auth", {width: "200px", authUrl: '/developers.php?o=-1&p=Auth'});
</script> -->
            <header>
                <?php
                if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
                    echo "Вы вошли на сайт, как гость<br>";
                    ?>
                    <a href="index.php?view=login">Вход</a><br>
                    <a href="index.php?view=reg">Регистрация</a>
                    <?php
                } else {
                    echo 'Вы вошли на сайт, как ' . $_SESSION['login'] .' в - '. date("H:i:s"). '</br>';
                    ?>
                    <form id="form2" method="post" action="index.php?view=exit">
                        <input id="inputsubmit2" type="submit" value="Выход">
                    </form>

                    <?php
                }
                ?>
            </header>
            <div id="menu">
                <div id="cart"><a href="index.php?view=cart">Ваша корзина (<?php echo $_SESSION['total_items']; ?>)</a> - $<?php echo $_SESSION['total_price'] ?></div>

                <ul class="menu">
                    <li><a href="index.php">Главная</a>
                        <ul>
                            <?php
                            $category = DBHelper::getAllCategory();
                            foreach ($category as $elem):
                                ?>
                                <li><a href="index.php?view=cat&id=<?php echo $elem['name']; ?>"><?php echo $elem['name']; ?></a></li>  
                                <?php
                            endforeach;
                            ?>
                        </ul>  
                    </li> 
                </ul>

            </div>

            <div class="search">
                <form  action="index.php?view=search" method="post">
                    <input id="search-imput" type="text" name="search" value="что искать?" onclick="search.value='';"> 
                    <input class="button" type="submit" name="submit" value="Поиск"/>
                </form>
            </div>
            <div class="main-block">
                <?php include ($_SERVER['DOCUMENT_ROOT'] . '/views/pages/' . $view . '.php'); ?>

                <div style="clear: both;"></div>
            </div>
            <footer>
                <div class="footer-site">&copy; http://sashasashas11.p.ht 2012</div>
            </footer>
            <!--            <div class="footer">
                            <div class="footer-site">&copy; mysite.com 2012</div>
                        </div>-->
        </div>
    </body>
</html>

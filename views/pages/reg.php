<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Регистрация</title>
    </head>
    <body>
        <div class="login">
            <h3>Регистрация</h3>
            <form  method="post" action="http://localhost/shop/save_user.php" enctype="multipart/form-data" >
                <p>
                    <label>Ваш логин:<br></label>
                    <input id="inputtext2" name="login" type="text" size="15" maxlength="15">
                </p>

                <p>
                    <label>Ваш пароль:<br></label>
                    <input id="inputtext2" name="password" type="password" size="20" maxlength="20">
                </p>
                <p>
                    <label>Повторить пароль:<br></label>
                    <input id="inputtext2" name="password2" type="password" size="20" maxlength="20">
                </p>
                <p>
                    <label>Ваше имя:<br></label>
                    <input id="inputtext2" name="name" type="text" size="20" maxlength="100">
                </p>
                <p>
                    <label>Телефон:<br></label>
                    <input id="inputtext2" name="tel" type="text" size="15" maxlength="15">
                </p>
                <p>
                    <label>Введить почтову адресу:<br></label>
                    <input id="inputtext2" name="mail" type="text" size="40" maxlength="50">
                </p>
                <h3><p><b> Форма для загрузки фото </b></p></h3>
                <input type="file" name="filename"><br> 

                <p>
                    <input type="submit" name="submit" value="Зарегистрироваться">

                </p>
            </form>
        </div> 
    </body>
</html>
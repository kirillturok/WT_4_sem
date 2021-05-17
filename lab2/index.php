<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>lab2</title>
</head>
<style>
    h1{
        text-align: center;
    }

    form{
        text-align: center;
    }

    ul{
        list-style: none;
        display: flex;
        justify-content: center;
    }

    li{
        margin: 0 20px 0 20px;
    }

    input{
        font-size: 20px;
    }
</style>
<body>
    <form method="get">
        <nav>
            <ul>
                <li><input class="about" type="submit" name="about" id="about" value="О компании"></li>
                <li><input class="services" type="submit" name="services" id="services" value="Услуги"></li>
                <li><input class="price" type="submit" name="price" id="price" value="Прайс"></li>
                <li><input class="contacts" type="submit" name="contacts" id="contacts" value="Контакты"></li>
                <li><input class="task" type="submit" name="task" id="task" value="Задание"></li>
            </ul>
        </nav>
    </form>

    <?php
        
        if(array_key_exists('about', $_GET)) aboutFunc();
        if(array_key_exists('services', $_GET)) servicesFunc();
        if(array_key_exists('price', $_GET)) priceFunc();
        if(array_key_exists('contacts', $_GET)) contactsFunc();
        if(array_key_exists('task', $_GET)) taskFunc();   
        
        if(array_key_exists('number', $_GET)) checkEnter($_GET['number']);

        function aboutFunc(){
            echo '<h1>О нас</h1>';
            setBack('about');
        }

        function servicesFunc(){
            echo '<h1>Услуги</h1>';
            setBack('services');
        }

        function priceFunc(){
            echo '<h1>Прайс</h1>';
            setBack('price');
        }

        function contactsFunc(){
            echo '<h1>Контакты</h1>';
            setBack('contacts');
        }

        function taskFunc(){
            echo '<h1>Введите число</h1>
                    <form method="get">
                        <input type="text" name="number">
                        <input type="submit">
                    </form>';
            setBack('task');
        }

        function checkEnter($num){
            setBack('task');
            if(is_numeric($num)) runTask($num);
            else echo '<h1>Введенное значение не является числом.</h1>';
        }

        function runTask($num){
            $sum=0;
            for($i=0; $i<strlen($num);$i++){
                if(is_numeric($num[$i])) $sum+=$num[$i];
            }
            echo "<h1>Сумма цифр равна $sum</h1>";
        }

        function setBack($id){
            echo "<style>
                    .$id {
                        background: green;
                    }
                </style>";
        }
        
    ?>

</body>
</html>
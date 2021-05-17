<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>lab7</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <main>
            <div class="form">
                <form method="post">
                    <h1>Отправка сообщения</h1>
                    <p><input type="email" class="inputAdr"  name="address" placeholder="Адрес почты"/></p>
                    <p><input type="text" class="inputAdr" name="subject" placeholder="Заголовок письма"/></p>
                    <p><textarea rows="5" name="message" placeholder="Текст сообщения"></textarea></p>
                    <img src="captcha.php" />
                    <p><input  type='text' name='norobot'/></p>
                    <p><input type="submit" value="Отправить сообщение"/></p>
                </form>
            </div>
        </main>

    </body>
</html>


<?php
    if($_SERVER['REQUEST_METHOD']=='POST') runTask();

    function runTask(){
        $address = htmlentities($_POST['address']);
        if(empty($address)) exit("<p class='inform'>Необходимо ввести адрес почты получателя</p>");
        $subject = makeText(htmlentities($_POST['subject']),"Введена пустая тема письма");
        $message = makeText(htmlentities($_POST['message']),"Введено пустое сообщение");

        $headers = 'From: kirillturok10@gmail.com' . "\r\n" .
        'Reply-To: kirillturok10@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion(); 

        session_start();
	    if (htmlentities($_POST['norobot']) != $_SESSION['randomnr2'])	exit("<p class='inform'>Неправильная каптча</p>");
 
        $result = mail($address, $subject, $message, $headers);
        
        if($result) echo "<p class='inform'>Сообщение отправлено</p>";
        else echo "<p class='inform'>Не удалось отправить сообщение</p>";
        //echo "|||$message|||";
    }

    function makeText($text, $mistake){
        if(preg_match("/^[ ]+$/", $text) || empty($text)) exit("<p class='inform'>$mistake</p>");
        $text = trim($text);
        //$text = preg_replace("/[ ]+/", " ", $text);
        $text = preg_replace("/\n/","\r\n",$text);
        $text = wordwrap($text, 70, "\r\n");
        return $text;
    }
?>
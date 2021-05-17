<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>lab4</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <main>
        <div class="form">
            <form method="get">
                <p><h1>Введите текст</h1></p>
                <p><input type="text" name="inputText"></p>
                <p><input type="submit"></p>
            </form>
        </div>
        <?php
            if(array_key_exists('inputText', $_GET)) runTask($_GET['inputText']);

            function runTask($inputText){
                preg_match_all("/[a-zA-Z]+([-][a-zA-Z]+)?/",$inputText,$latin);
                preg_match_all("/[А-Яа-я|ё]+([-]?[А-Яа-я|ё]+)?/u",$inputText, $cyrillic);
                preg_match_all("/[+|-]?\d+([.|,]\d+)?/",$inputText,$digits);
                echo "<div class='container'>
                        <div class='column'>";
                            for($i=0;$i<sizeof($latin[0]);$i++)
                                echo '<p class="blue">'.$latin[0][$i].'</p>';
                    echo "</div>
                        <div class='column'>";
                            for($i=0;$i<sizeof($cyrillic[0]);$i++)
                                echo '<p class="red">'.$cyrillic[0][$i].'</p>';
                    echo "</div>
                        <div class='column'>";
                            for($i=0;$i<sizeof($digits[0]);$i++)
                                echo '<p class="green">'.$digits[0][$i].'</p>';
                    echo "</div>
                </div>";
            }
        ?>
        </main>
    </body>
</html>
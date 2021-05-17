<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>lab3</title>
    </head>
    <body>
        <header>
            <img src="onliner_logo.png" alt="Onliner" class="imgH">
        </header>
        <main>
            <?php
                $dd=getDateDelivery();
                echo "<style>
                    h3{
                        text-align: right;
                    }
                    </style>
                    <h3>Дата ближайшей доставки: $dd</h3>";
                
            ?>
            <form method="get">
                <div class="form">
                <p>Введите дату желаемой доставки</p>
                <input type="text" name="date">
                <p><input type="submit"></p>
                </form>
                </form>
        </main>
        <?php
            if(array_key_exists('date', $_GET)) runTask($_GET['date']);

            $holidays;

            function getDateDelivery(){
                $file=fopen('holidays.txt', 'r');
                if(!$file) exit('Не удалось открыть файл holidays.txt');

                global $holidays;
                $holidays=getHolidays($file);
               
                $deliveryDate;
                if(strtotime('now')<=strtotime('12:00')) $deliveryDate=strtotime("+1 day");
                else $deliveryDate=strtotime("+2 day");
                
                $deliveryDate=strtotime(date('d-m-Y',$deliveryDate));
                $deliveryDate=getNotHoliday($deliveryDate);
                return transformOut($deliveryDate);
                
            }

            function transformOut($date){
                $monthsList = array("января","февраля","марта","апреля","мая","июня",
                "июля","августа","сентября","октября","ноября","декабря");
                $mN=$monthsList[(int)date('m',$date)-1];
                return str_replace(' ',' '.$mN.' ',date('d Y',$date));
            }

            function getNotHoliday($rare){
                global $holidays;
                foreach($holidays as $day)
                    if($rare==$day)
                        return getNotHoliday(strtotime("+1 day", $rare));
                return $rare;
                    
            }

            function getHolidays($file){
                $arr=array();
                while(!feof($file)){
                    $str=fgets($file);
                    $arr1=preg_split("/[\s,]+/",$str);
                    foreach($arr1 as $unit)
                        array_push($arr, strtotime($unit));
                }
                fclose($file);
                return $arr;
            }

            function runTask($dateEnter){
                if(!preg_match("/(0[1-9]|1[0-9]|2[0-9]|3[01])\.(0[1-9]|1[012])\.[0-9]{4}/",$dateEnter))
                    exit("<p class=inform>Дата должна соответствовать формату</br>дата.месяц.год</p>");               
                $date=strtotime($dateEnter);
                if($date<=time()) exit("<p class=inform>Введена неактуальная дата</p>");
                $date=getNotHoliday($date);
                $out=transformOut($date);
                echo "<p class=inform>Доставка может быть осуществлена $out</p>";
            }

            
        ?>

    </body>
</html>
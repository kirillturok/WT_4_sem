<?include('script.php')?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../styles/task.css">
        <link rel="stylesheet" href="../styles/style.css">
    </head>
    <body>
        <?include('head.html')?>
        <main>
            <div class='task'>
            <h3>
                Посещенные страницы
            </h3>
                <?php
                    foreach($_COOKIE['page'] as $unit)
                        echo "<p>$unit</p>";
                ?>
            </div>
        </main>
        <?include('footer.html')?>
    </body>
</html>
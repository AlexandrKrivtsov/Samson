<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form name="subString" method="post" action="index.php">
        <p>
            <label for="str">Строка:</label><br>
            <input type="text" name="string" id="str">
            <button type="submit">Обработать</button>
        </p>
        <p>
            <label for="substr">Cтрока:</label>
            <?php
            {
                include __DIR__ . '/function.php';
                $string =$_POST['string'];
                echo $string;
            }
            ?>
        </p>
        <p>
            <label for="substr">Подстрока:</label>
            <?php
            {
                $arraySubstr = substringSearch($string);
                $substring = $arraySubstr[0];
                $substringPos = $arraySubstr[1];
                echo $substring . '<br>';
            }
            ?>
            <label for="substr">Позиция подстроки:</label>
                <?php echo $substringPos .'<br>';?>
            <label for="substr">Инвертированная строка:</label>
                <?php echo $string = stringRev($string);?>
        </p>
    </form>
</body>
</html>

<html>
<head>
    <title>Загрузка файлов на сервер</title>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>


<?foreach($filelist as $image):?>

    <a href="/upload/<?=$image['image_id']?>.jpg">ID:<?=$image['image_id']?>. <?=$image['image_title']?></a>  <br><br>

<?endforeach;?>
<br><br>
<a href="/"> ВЕРНУТЬСЯ НА ГЛАВНУЮ </a>

</body>
</html>
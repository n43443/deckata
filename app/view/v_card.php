<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <title><?=$meta_title?></title>
	  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class='menu'>
	<a href="/">ГЛАВНАЯ</a> |
	<a href="/?page=addcard">ДОБАВИТЬ ВОПРОС</a>
</div>

<h5> Все карты катерогии </h5> <hr />


<?if($cards_null == FALSE):?>

    <?php foreach($cards as $card): ?>

        <h3> Карточка: № <?=$card['card_id']?> </h3>


        <h6> Вопрос:</h6>
        <p> <?=\app\model\M_Helper::Instance()->htmlHandler($card['card_question'])?> </p>
        <p> <h6> Ответ:</h6> </p>
        <p> <?=\app\model\M_Helper::Instance()->htmlHandler($card['card_answer'])?> </p>


        <form method="POST">
            <button onclick='return confirm("Вы уверены, что хотите удалить вопрос?")' type="submit" name="remove_card_id" value="<?=$card['card_id']?>"> УДАЛИТЬ </button>
        </form>

        <br />
        <br />
        <br />
        <hr />
        <br />
        <br />

    <?php endforeach; ?>

<?else:?>

    <h6> Колода пустая</h6>

<?endif;?>
    
</body>
</html>
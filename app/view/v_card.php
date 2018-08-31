<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <title><?=$meta_title?></title>
	  <link href="/css/style.css" rel="stylesheet">
</head>
<body>

<div class='menu'>
	<a href="<?=URL_SITE?>/">ГЛАВНАЯ</a> |
	<a href="<?=URL_SITE?>/add/">ДОБАВИТЬ ВОПРОС</a>
</div>

<h5> Все карты катерогии </h5> <hr />


<?php foreach($cards as $card): ?>


  <h3> Карточка: № <?=$card['card_id']?> </h3> 

  <h6> Вопрос:</h6>
  <p> <?=$card['card_question']?> </p>
  <p> <h6> Ответ:</h6> </p>
  <p> <?=$card['card_answer']?> </p>


  <form method="POST">
    <button onclick='return confirm("Вы уверены, что хотите удалить вопрос?")' type="submit" name="remove_card_id" value="<?=$card[card_id]?>"> УДАЛИТЬ </button>
  </form>

  <br />
  <br />
  <br />
  <hr />
  <br />
  <br />

<?php endforeach; ?>

    
</body>
</html>
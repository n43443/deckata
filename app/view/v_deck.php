<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>RunTest</title>
	<link href="/css/style.css" rel="stylesheet">
</head>
<body>

<div class="index_box">

	<h2>Cards</h2>

	<hr>

    <a href="/"><h3>Главная</h3></a>
    <a href="/?page=adddeck"><h3>Новая колода</h3></a>
    <a href="/?page=addcard"><h3>Новая карточка</h3></a>
	
	<br>
	<hr>

    <?foreach($decks as $deck):?>

        <a href="/?page=card&deck_id=<?=$deck['deck_id']?>">
            <h3>
                <?=$deck['deck_title']?>
            </h3>
        </a>

    <?endforeach;?>



</div>
                
</body>
</html>
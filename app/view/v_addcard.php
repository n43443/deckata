<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?=$meta_title?></title>
	<link href="<?=URL_SITE?>/css/style.css" rel="stylesheet">


    <style>

    </style>

</head>
<body>

<h5>Добавить карточку</h5> <hr />
<form name="/" method="post">

    <h6>Колода</h6>

    <select name="deck_id">

        <?foreach($decks as $deck):?>

            <option value="<?=$deck['deck_id']?>"> <?=$deck['deck_title']?> </option>

        <?endforeach;?>

    </select>

    <h6>Вопрос:</h6>
    <textarea name="card_question" required cols="52" rows="18"></textarea>

    <h6>Ответ:</h6>
    <textarea name="card_answer" required cols="52" rows="8"></textarea>

<br>

    <input class="input_submit" type="submit" name="add_card" value=" СОХРАНИТЬ ">

</form>
    
</body>
</html>
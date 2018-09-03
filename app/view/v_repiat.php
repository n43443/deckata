<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?=$meta_title?></title>
	<link href="css/style.css" rel="stylesheet">
</head>
<body>

<div onclick="toggle(hidden_content)">


<div class="question"><?=\app\model\M_Helper::Instance()->htmlHandler($card['card_question'])?></div>

    <div class="answer">
        <div id="hidden_content" style="display: none;"> <hr>
            <?=\app\model\M_Helper::Instance()->htmlHandler($card['card_answer'])?>
        </div>
    </div>

<script>
    function toggle(el) {
        el.style.display = '';
        el.style.class = "answer";
    }
</script>


<div class="buttons_answers">
    <form action="/?page=repiat" method="post">

        <button class="button_answer" type="submit">
            ПЛОХО
        </button>

        <button class="button_answer" type="submit">
            ХОРОШО
        </button>

    </form>


    <div class='menu'>

        <a href="/">ГЛАВНАЯ</a> |

        <a onclick='return confirm("Вы уверены, что хотите пометить вопрос?")' href="/mark-add/<?=$question['question_id']?>/<?=$token?>">
            ОТМЕТИТЬ
        </a> |

        <a onclick='return confirm("Вы уверены, что хотите исключить вопрос из теста навсегда?")' href="/exclude/<?=$question['question_id']?>/<?=$token?>">
            ИСКЛЮЧИТЬ
        </a>

    </div>

</div>


</div>
</body>
</html>
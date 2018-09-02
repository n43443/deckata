<?php

namespace app\controller;

use app\model\M_Card;
use app\model\M_Deck;
use app\model\M_Deckcard;
use app\model\M_Level;
use app\model\M_Response;

class C_Response extends Base
{
    public function OnInput(){

        parent::OnInput();



        $level_id = M_Response::Instance()->getLevel($_POST['card_id'], '1');

        $fail_level_id = M_Response::Instance()->getLevelFail($_POST['card_id'],'1');



        $crash_level_id = M_Level::Instance()->getCrashLevel($level_id);

        $next_level_id = M_Level::Instance()->getNextLevel($level_id);









        // Если правильный ответ


        if($_POST['response_result'] == 'good'){

            if($next_level_id == 0){

                M_Response::Instance()->Add($_POST['card_id'], '1', $fail_level_id, '1');

            } else {

                M_Response::Instance()->Add($_POST['card_id'], '1', $next_level_id, '1');

            }

            header("Location: /?page=test");
        }





        // Если ложный овет


        if($_POST['response_result'] == 'bad'){

                M_Response::Instance()->Add($_POST['card_id'], '0', $crash_level_id, '1');

                header("Location: /?page=test");

        }




    }

    public function OnOutput()
    {
		

    }
}
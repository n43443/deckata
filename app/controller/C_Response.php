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





        $response = M_Response::Instance()->ByCardId($_POST['card_id'], '1');



        if($response == FALSE) {

            $response['level_id'] = '1';

        }


            $level_row = M_Level::Instance()->ByLevel($response['level_id']);


            $level_next = $level_row['level_next'];


            if($level_next == 0){

                $response_last_fail = M_Response::Instance()->LastFail($_POST['card_id'],'1');

                $level_next = $response_last_fail['level_id'];

            }






            $level_crash = $level_row['level_crash'];








        if($_POST['response_result'] == 'bad'){

            M_Response::Instance()->Add($_POST['card_id'], '0', $level_crash, '1');

            header("Location: /?page=test");
        }


        if($_POST['response_result'] == 'good'){

            M_Response::Instance()->Add($_POST['card_id'], '1', $level_next, '1');

            header("Location: /?page=test");
        }




    }

    public function OnOutput()
    {
		

    }
}
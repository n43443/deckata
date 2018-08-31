<?php

namespace app\controller;

use app\model\M_Card;
use app\model\M_Deck;
use app\model\M_Deckcard;
use app\model\M_Response;

class C_Test extends Base
{
    public function OnInput(){

        parent::OnInput();


		
		$deck_rows = M_Deck::Instance()->ByUserId('1');

		foreach($deck_rows as $deck){

            $deckcard_rows = M_Deckcard::Instance()->ByDeck($deck['deck_id']);

            if($deckcard_rows != FALSE) {

                foreach ($deckcard_rows as $deckcard) {


                    $response = M_Response::Instance()->ByCardId($deckcard['card_id'], '1');

                    if($response == TRUE){

                        $all_card_rows[] = $deckcard['card_id'];
                    }
                }
            }


        }

        //var_dump($all_card_rows);

    }

    public function OnOutput()
    {
		
        $page = $this->Template('v_test.php');
		echo $page;
    }
}
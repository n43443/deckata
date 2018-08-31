<?php

namespace app\controller;

use app\model\M_Card;
use app\model\M_Deck;
use app\model\M_Deckcard;
use app\model\M_Level;
use app\model\M_Response;

class C_Test extends Base
{
    public function OnInput(){

        parent::OnInput();



        if($_GET['card_id']) {

            $card_id = $_GET['card_id'];

        } else {



            $deck_rows = M_Deck::Instance()->ByUserId('1');

            foreach ($deck_rows as $deck) {

                $deckcard_rows = M_Deckcard::Instance()->ByDeck($deck['deck_id']);

                if ($deckcard_rows != FALSE) {

                    foreach ($deckcard_rows as $deckcard) {


                        $response = M_Response::Instance()->ByCardId($deckcard['card_id'], '1');

                        if ($response != FALSE) {

                            $level_row = M_Level::Instance()->ByLevel($deckcard['card_id']);


                            $time = $response['response_date'] + $level_row['level_pause'];


                            if (time() > $time) {
                                $map_card[$deckcard['card_id']] = $response['level_id'];
                            }

                        } else {

                            $map_card[] = $deckcard['card_id'];

                        }
                    }
                }
            }


            shuffle($map_card);

            $card_id = $map_card['0'];

        }






		$this->card = M_Card::Instance()->ById($card_id);



        if($this->card == FALSE){

            header("Location: /");

        }


    }

    public function OnOutput()
    {
		
        $page = $this->Template('v_test.php', ['card' => $this->card]);
		echo $page;
    }
}
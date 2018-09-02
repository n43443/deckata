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




        // Все колоды
        $deck_rows = M_Deck::Instance()->ByUserId('1');




        // Получить все карточки по массиву колод
        foreach ($deck_rows as $deck) {


            // Получить все индификторы карточек
            $deckcard_rows = M_Deckcard::Instance()->ByDeck($deck['deck_id']);


            // Узнать данные оветов для карточек

            if($deckcard_rows){

                foreach ($deckcard_rows as $deckcard) {


                    $response = M_Response::Instance()->ByCardId($deckcard['card_id'], '1');


                    if (!$response) {
                        $response['level_id'] = '1';
                    }






                    $level = M_Level::Instance()->ByLevel($deckcard['card_id']);
                    $time = $response['response_date'] + $level['level_pause'];







                    // Время после которого можно показывать карточку
                    $time = $time;

                    // Уровень карточки
                    $level = $response['level_id'];


                    // Идентификатор карточки
                    $card = $deckcard['card_id'];









                        if (time() > $time) {

                            $map_card[] = $card;
                        }




                }
            }
        }





        var_dump($map_card);


            shuffle($map_card);

            $card_id = $map_card['0'];








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
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




        // Все колоды пользователая
         $deck_user_rows = M_Deck::Instance()->ByUserId('1');


        // Получить все индификаторы карточек по массиву колод
        foreach ($deck_user_rows as $deck_user_row) {

            // Получить все индификторы карточек
            $deckcard_rows_by_deck_id = M_Deckcard::Instance()->ByDeck($deck_user_row['deck_id']);


            if($deckcard_rows_by_deck_id) {

                foreach ($deckcard_rows_by_deck_id as $deckcard_row_by_deck_id) {

                    // Упорядочить все индификаторы в общий массив
                    $all_card_id_for_user[] = $deckcard_row_by_deck_id['card_id'];
                }
            }
        }




        // Группируем массив карты карточек
        foreach($all_card_id_for_user as $card_id){

            $fact_level = M_Response::Instance()->getLevel($card_id,'1');


            $response_date =  M_Response::Instance()->getDate($card_id,'1');


            $level = M_Level::Instance()->ByLevel($fact_level);


            $time = $level['level_pause'] + $response_date;



            // Оставляем карточки которые надо повторять
            if($time < time()){

                $map_carts[] = $card_id;
            }


        }

        if(empty($map_carts)){
            
            die("Нет карточек для повторения");
        }



        shuffle($map_carts);



        $card_id = $map_carts[0];




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
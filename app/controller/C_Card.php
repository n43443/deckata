<?php

namespace app\controller;

use app\model\M_Card;
use app\model\M_Deckcard;

class C_Card extends Base
{
	public $decks;
	
	
    public function OnInput(){

        parent::OnInput();

        if(!empty($_POST['remove_card_id'])){

        	M_Deckcard::Instance()->Remove($_POST['remove_card_id']);

            header("Location: /?page=card&deck_id=$_GET[deck_id]");
        }

		
		$deckcards_by_deck_id = M_Deckcard::Instance()->ByDeck($_GET['deck_id']);


        if($deckcards_by_deck_id != FALSE) {

            foreach ($deckcards_by_deck_id as $deckcard_by_deck_id) {

                $this->cards[] = M_Card::Instance()->ById($deckcard_by_deck_id['card_id']);
            }

        } else {

            $this->cards_null = TRUE;
        }
    }

    public function OnOutput()
    {
        $page = $this->Template('v_card.php', ['cards' => $this->cards,'cards_null' => $this->cards_null]);
		
		echo $page;
    }
}
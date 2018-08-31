<?php

namespace app\controller;

use app\model\M_Deck;
use app\model\M_Card; 
use app\model\M_Deckcard; 


class C_Addcard extends Base
{	

	public $decks;
	
    public function OnInput(){

        parent::OnInput();

        $this->decks = $this->decks = M_Deck::Instance()->ByUserId('1');

        if(!empty($_POST['card_question']) && !empty($_POST['card_answer']) && !empty($_POST['deck_id'])){
		
			$card_id = M_Card::Instance()->Add($_POST['card_question'], $_POST['card_answer']);

			M_Deckcard::Instance()->Add($_POST['deck_id'], $card_id);

			header("Location: /?page=card&deck_id=$_POST[deck_id]");
		}
    }

    public function OnOutput()
    {
        $page = $this->Template('v_addcard.php', ['decks' => $this->decks]);
		
		echo $page;
    }
}
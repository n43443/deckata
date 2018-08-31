<?php

namespace app\controller;

use app\model\M_Deck;

class C_Deck extends Base
{
	public $decks;
	
	
    public function OnInput(){

        parent::OnInput();
		
		$this->decks = M_Deck::Instance()->ByUserId('1');
    }

    public function OnOutput()
    {
        $page = $this->Template('v_deck.php', ['decks' => $this->decks]);
		
		echo $page;
    }
}
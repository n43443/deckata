<?php

namespace app\controller;

use app\model\M_Deck;

class C_Index extends Base
{
	public $decks;
	
	
    public function OnInput(){

        parent::OnInput();
    }

    public function OnOutput()
    {
        $page = $this->Template('v_index.php');
		
		echo $page;
    }
}
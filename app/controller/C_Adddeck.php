<?php

namespace app\controller;

use app\model\M_Deck;

class C_Adddeck extends Base
{
	
    public function OnInput(){

        parent::OnInput();

        if(!empty($_POST['deck_title'])){

        	M_Deck::Instance()->Add($_POST['deck_title'],'1');

        	header("Location: /?page=deck");
        }
    }

    public function OnOutput()
    {
        $page = $this->Template('v_adddeck.php');
		
		echo $page;
    }
}
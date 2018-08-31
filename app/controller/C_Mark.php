<?php

namespace app\controller;

use app\model\M_Card;
use app\model\M_Mark;

class C_Mark extends Base
{
	public $decks;
	
	
    public function OnInput(){

        parent::OnInput();


        if(!empty($_POST['add_mark_card_id'])){
        	
            M_Mark::Instance()->Add($_POST['add_mark_card_id'], '1');

        	die('Карточка помечена');
        }


		$marks = M_Mark::Instance()->All('1');


        foreach($marks as $mark){

            $this->cards[] = M_Card::Instance()->ById($mark['card_id']);
        }

    }

    public function OnOutput()
    {
        $page = $this->Template('v_mark.php', ['cards' => $this->cards]);
		
		echo $page;
    }
}
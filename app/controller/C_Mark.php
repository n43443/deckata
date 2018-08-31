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

            header("Location: /?page=mark");
        }



        if($_POST['romove_mark_for_card_id']){

            M_Mark::Instance()->Remove($_POST['romove_mark_for_card_id'], '1');

            header("Location: /?page=mark");
        }




		$marks = M_Mark::Instance()->All('1');


        if($marks != FALSE){

            foreach($marks as $mark){

                $this->cards[] = M_Card::Instance()->ById($mark['card_id']);
            }

        } else {

            $this->cards_null = TRUE;
        }







    }

    public function OnOutput()
    {
        $page = $this->Template('v_mark.php', ['cards' => $this->cards, 'cards_null' => $this->cards_null]);
		
		echo $page;
    }
}
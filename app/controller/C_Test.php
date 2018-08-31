<?php

namespace app\controller;

use app\model\M_Card;

class C_Test extends Base
{
    public function OnInput(){

        parent::OnInput();
		
		echo M_Card::Instance()->all();

    }

    public function OnOutput()
    {
		
        $page = $this->Template('v_test.php');
		echo $page;
    }
}
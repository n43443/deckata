<?php

namespace app\controller;

use app\model\M_Deck;
use app\model\M_Image;

class C_Imglist extends Base
{
	public $decks;
	
	
    public function OnInput(){

        parent::OnInput();


        $this->filelist = M_Image::Instance()->List();

    }

    public function OnOutput()
    {
        $page = $this->Template('v_imglist.php', ['filelist' => $this->filelist]);

        echo $page;
    }
}
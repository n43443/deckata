<?php

namespace app\controller;

use app\model\M_Deck;
use app\model\M_Image;

class C_Upload extends Base
{
	public $decks;
	
	
    public function OnInput(){

        parent::OnInput();


        // Проверяем загружен ли файл
        if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
        {
            // Если файл загружен успешно, перемещаем его
            // из временной директории в конечную

            $name = M_Image::Instance()->Add($_POST['file_title']);

            move_uploaded_file($_FILES["filename"]["tmp_name"], "upload/".$name.".jpg");

            header('Location: /?page=imglist');
            exit();

        } else {
            echo("Ошибка загрузки файла");
        }
    }

    public function OnOutput()
    {
        $page = $this->Template('v_upload.php');

        echo $page;
    }
}
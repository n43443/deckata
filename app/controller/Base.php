<?php

// Определение пространство имени для класса C_Base.
namespace app\controller;



// Подлючение пространство имени класса C_Controller.
use app\controller\C_Controller;





//
// Базовый контроллер сайта.
//
abstract class Base extends Controller
{

    protected $site_name; // Название сайта.
    protected $delimiter_meta_title; // Разделитель между названием сайта и названием страницы в title.


    //
    // Конструктор.
    //
    public function __construct()
    {
    }



    //
    // Виртуальный обработчик запроса.
    //
    protected function OnInput(){

        // Указываем название сайта.
        $this->site_name = "Cards";

        // Указываем разделитель для заголовка мета тега.
        $this->delimiter_meta_title .= " - ";
    }



    //
    // Виртуальный генератор HTML.
    //
    protected function OnOutput(){
    }
}

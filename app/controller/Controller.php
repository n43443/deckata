<?php

// Определяем пространство имени для класса C_Controller
namespace app\controller;



/*
 * Базовый класс контроллера
 */
abstract class Controller{


    /*
     * Конструктор
     */
    public function __construct(){
    }



    /*
     * Полная обработка HTTP запроса
     */
    public function Request(){

        $this->OnInput();
        $this->OnOutput();
    }




    /*
     * Виртуальный обработчик запроса
     */
    protected function OnInput(){
    }



    /*
     * Виртуальный генератор HTML
     */
    protected function OnOutput(){
    }



    /*
     * Генерация HTML шаблона в строку
     */
    protected function Template($fileName, $vars = array()){
        // Установка переменных для шаблона.
        foreach ($vars as $k => $v)
        {
            $$k = $v;
        }

        // Генерация HTML в строку
        ob_start();
        include "app/view/".$fileName;
        return ob_get_clean();
    }
}

<?php

namespace app\model;


use app\model\M_MSQL;



class M_Card extends M_MSQL
{

    private static $instance;   // Объект класса для паттерна Singleton



    //
    // Паттерн Singleton
    //
    public static function Instance()
    {

        // Объект класса не создан
        if(self::$instance == NULL)
        {
            // Создает объект класса
            self::$instance = new self();
        }

        // Возвращение объект класса
        return self::$instance;

    }

	
	/*
	 * Выбрать карту по индентификатору
	 */
	public function ById($card_id){
		
		return M_MSQL::Instance()->SelectRow("SELECT * FROM `card` WHERE `card_id` = $card_id");
	}



    /*
     * Создать новую карточку
     */
    public function Add($card_question, $card_answer){


        $card_question = addslashes($card_question);
        $card_answer = addslashes($card_answer);

        $time = time();

        $sql = "INSERT INTO `card` SET `card_question` = '$card_question', `card_answer` = '$card_answer', `card_сreated_date` = $time";

        return M_MSQL::Instance()->Insert($sql);
    }


    public function All(){

    }


}
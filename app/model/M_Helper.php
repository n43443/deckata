<?php

namespace app\model;

//
// Помощник работы с БД.
//
class M_Helper{

    private static $instance;       // Объекта класса для паттерна Singleton

    //
    // Паттерн Singleton
    //
    public static function Instance()
    {

        // Объект класса не создан
        if(self::$instance == NULL)
        {
            // Создаем объект класса
            self::$instance = new self();
        }

        // Возвращаем объект класса
        return self::$instance;

    }

    //
    //  Обработчик html перед выводим на страницу
    //
    public function htmlHandler($string)
    {

        $string = htmlspecialchars($string);



        $str_search = array(
            "#\\\n#is",
            "#\[b\](.+?)\[\/b\]#is",
            "#\[i\](.+?)\[\/i\]#is",
            "#\[u\](.+?)\[\/u\]#is",
            "#\[code\](.+?)\[\/code\]#is",
            "#\[quote\](.+?)\[\/quote\]#is",
            "#\[url=(.+?)\](.+?)\[\/url\]#is",
            "#\[url\](.+?)\[\/url\]#is",
            "#\[img\](.+?)\[\/img\]#is",
            "#\[size=(.+?)\](.+?)\[\/size\]#is",
            "#\[color=(.+?)\](.+?)\[\/color\]#is",
            "#\[list\](.+?)\[\/list\]#is",
            "#\[listn](.+?)\[\/listn\]#is",
            "#\[\*\](.+?)\[\/\*\]#",


        );
        $str_replace = array(
            "<br>",
            "<b>\\1</b>",
            "<i>\\1</i>",
            "<span style='text-decoration:underline'>\\1</span>",
            "<code>\\1</code>",
            "<table width = '95%'><tr><td>Цитата</td></tr><tr><td class='quote'>\\1</td></tr></table>",
            "<a href='\\1'>\\2</a>",
            "<a href='\\1'>\\1</a>",
            "<img src='\\1' width='100%' alt = 'Изображение' />",
            "<span style='font-size:\\1%'>\\2</span>",
            "<span style='color:\\1'>\\2</span>",
            "<ul>\\1</ul>",
            "<ol>\\1</ol>",
            "<li>\\1</li>",
        );






        /*
        $str_search = array(
            "#\\\n#is",
            "#\[b\](.+?)\[\/b\]#is",
            "#\[i\](.+?)\[\/i\]#is",
            "#\[u\](.+?)\[\/u\]#is",
            "#\[code\](.+?)\[\/code\]#is",
            "#\[quote\](.+?)\[\/quote\]#is",
            "#\[url=(.+?)\](.+?)\[\/url\]#is",
            "#\[url\](.+?)\[\/url\]#is",
            "#\[img\](.+?)\[\/img\]#is",
            "#\[size=(.+?)\](.+?)\[\/size\]#is",
            "#\[color=(.+?)\](.+?)\[\/color\]#is",
            "#\[list\](.+?)\[\/list\]#is",
            "#\[listn](.+?)\[\/listn\]#is",
            "#\[\*\](.+?)\[\/\*\]#",

            "#\[codepack=(.+?)\](.+?)\[\/codepack\]#is",
            "#\[imgpack=(.+?)\](.+?)\[\/imgpack\]#is"
        );
        $str_replace = array(
            "<br>",
            "<b>\\1</b>",
            "<i>\\1</i>",
            "<span style='text-decoration:underline'>\\1</span>",
            "<code class='code'>\\1</code>",
            "<table width = '95%'><tr><td>Цитата</td></tr><tr><td class='quote'>\\1</td></tr></table>",
            "<a href='\\1'>\\2</a>",
            "<a href='\\1'>\\1</a>",
            "<img src='\\1' width='100%' alt = 'Изображение' />",
            "<span style='font-size:\\1%'>\\2</span>",
            "<span style='color:\\1'>\\2</span>",
            "<ul>\\1</ul>",
            "<ol>\\1</ol>",
            "<li>\\1</li>",

            "<div class='codepack'><p>Файл: \\1</p><code title='Код'>\\2</code></div>",
            "<div class='imgpack'><img src='\\2' title='Изображение'><p class='title'>Рис. \\1</p></div>"
        );
        */




        $string = preg_replace($str_search, $str_replace, $string);

        $string = str_replace('  ', '&#160;&#160;', $string);

        return $string;
    }

}

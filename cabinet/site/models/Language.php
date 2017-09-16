<?php


class Language{

    //Список культур
    public static function reload($lang){
        $lang = SRC::validator($lang);
        setcookie("lang", "$lang", time()+3600, '/');

        return true;
    }

}
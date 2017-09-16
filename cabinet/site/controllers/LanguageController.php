<?php

include_once ROOT. '/cabinet/site/models/Language.php';

class LanguageController{

    //Смена языка
    public function actionReloadLanguage($lang)
    {
        $lang = SRC::validator($lang);
        setcookie("lang", $lang, time()+3600, '/');

        SRC::redirect();

        return true;

    }

  }


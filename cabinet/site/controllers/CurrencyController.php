<?php

//include_once ROOT. '/cabinet/site/models/Language.php';

class CurrencyController{

    //Смена валюты
    public function actionReloadCurrency($currency)
    {
        $currency = strtoupper(SRC::validator($currency));
        setcookie("currency", $currency, time()+3600*24*7, '/');
        if($currency=="UAH") setcookie("currency_val", 1, time()+3600*24*7, '/');
        if($currency=="USD") setcookie("currency_val", 26.36, time()+3600*24*7, '/');
        if($currency=="EUR") setcookie("currency_val", 29.47, time()+3600*24*7, '/');

        SRC::redirect();

        return true;

    }

}


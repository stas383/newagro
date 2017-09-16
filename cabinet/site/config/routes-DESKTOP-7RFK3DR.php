<?php
return array(
    //x'post' => 'site/index',


    'language/([a-z]+)' => 'language/reloadLanguage/$1',
    'currency/([a-z]+)' => 'currency/reloadCurrency/$1',
    'login' => 'login/login',
    'singnin' => 'login/singnIn',
    'exit' => 'login/exit',

    'register' => 'register/register',
    'registered' => 'register/registered',
    'acceptEmail/([a-f0-9]{32}$+?={*})/([\.\-_A-Za-z0-9]+?@[\.\-A-Za-z0-9]+?[\ .A-Za-z0-9]{2,})' =>'register/verifyemail/$1/$2',
    'panel' => 'login/cabinet',

    'site' => 'site/index',
    '' => 'site/index',
);
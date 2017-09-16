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
    'acceptEmail/([a-zA-Z0-9+?={1,}]+)/([\.\-_A-Za-z0-9]+?@[\.\-A-Za-z0-9]+?[\ .A-Za-z0-9]{2,})' =>'register/verifyemail/$1/$2',

    'recover' => 'recover/recover',
    'verifyemail/(.+)/(.+)/(.+)' =>'recover/verifyemail/$1/$2/$3',

    'panel' => 'login/cabinet',

    'site' => 'login/cabinet',
    '' => 'login/cabinet',
);
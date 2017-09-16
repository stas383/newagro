<?php

include_once ROOT. '/cabinet/farmer/models/News.php';

class NewsController {

    public function actionIndex()
    {

        SRC::template('farmer', 'panel', 'aaa');

        return true;

    }


}


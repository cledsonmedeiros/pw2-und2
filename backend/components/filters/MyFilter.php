<?php

namespace app\components\filters;

use yii\base\ActionFilter;

class MyFilter extends ActionFilter
{
    public function beforeAction($action)
    {
        if (rand(1, 10) > 5) {
            return true;
        } else {
            throw new \yii\web\NotFoundHttpException();
            // return false;
        }
    }
    // public function afterAction($action, $result)
    // {

    // }
}

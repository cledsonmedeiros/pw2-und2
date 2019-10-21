<?php
namespace app\controllers;

use yii\rest\ActiveController;

/**
     * @SWG\Get(path="/country",
     *     tags={"country"},
     *     summary="Lista os países.",
     *     @SWG\Response(
     *         response = 200,
     *         description = "Coleção de países",
     *         @SWG\Schema(ref = "#/definitions/Country")
     *     ),
     * )
     */

class CountryController extends ActiveController
{
   public $modelClass = 'app\models\Country';
}

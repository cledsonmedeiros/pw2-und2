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
* @SWG\Post(path="/country",
*  tags={"country"},
*  summary="Cadastra um país",
*  @SWG\Parameter(
*      name="Code",
*      in="formData",
*      required=true,
*      type="string",
*      description="Código do país",
*  ),
*  @SWG\Parameter(
*      name="Name",
*      in="formData",
*      required=false,
*      type="string",
*      description="Nome do país",
*  ),
*  @SWG\Response(
*      response = 200,
*      description = "Coleção de países",
*      @SWG\Schema(ref = "#/definitions/Country")
*  ),
* )
*/

class CountryController extends ActiveController
{
   public $modelClass = 'app\models\Country';
}

<?php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use app\models\User;
use app\components\filters\MyFilter;

/**
* @SWG\Get(path="/country",
*     tags={"country"},
*     summary="Lista os países.",
*     @SWG\Parameter(
*         name="page",
*         in="query",
*         required=false,
*         type="string",
*         description="Página de exibição",
*     ),
*     @SWG\Parameter(
*         name="per-page",
*         in="query",
*         required=false,
*         type="string",
*         description="Quantidade de registros por página",
*     ),
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
*
* @SWG\Put(path="/country/{Code}",
*  tags={"country"},
*  summary="Cadastra um país",
*  @SWG\Parameter(
*      name="Code",
*      in="path",
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

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        //   $behaviors['basicAuth'] = [
        //       'class' => HttpBasicAuth::className(),
        //       'auth' => function ($username, $password) {
        //           return User::findOne(['username' => $username, 'password' => $password]);
        //       },
        //   ];

        $behaviors['myfilter'] = [
           'class' => MyFilter::className()
        ];

        return $behaviors;
    }
}

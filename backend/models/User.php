<?php

namespace app\models;

use Yii;
use app\components\validators\CpfValidator;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $cpf
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'cpf'], 'required'],
            [['username', 'password', 'cpf'], 'trim'],
            [['username', 'cpf'], 'unique'],
            [['username', 'password'], 'string', 'max' => 32],
            [['cpf'], 'string', 'max' => 14],
            [['cpf'], CpfValidator::className()]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Usuário'),
            'password' => Yii::t('app', 'Senha'),
            'cpf' => Yii::t('app', 'CPF'),
        ];
    }
}

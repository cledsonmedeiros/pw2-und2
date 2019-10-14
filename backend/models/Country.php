<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Country".
 *
 * @property string $Code
 * @property string $Name
 * @property string $Continent
 * @property string $Region
 * @property double $SurfaceArea
 * @property int $IndepYear
 * @property int $Population
 * @property double $LifeExpectancy
 * @property double $GNP
 * @property double $GNPOld
 * @property string $LocalName
 * @property string $GovernmentForm
 * @property string $HeadOfState
 * @property int $Capital
 * @property string $Code2
 *
 * @property City[] $cities
 * @property CountryLanguage[] $countryLanguages
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Code'], 'required'],
            [['Continent'], 'string'],
            [['SurfaceArea', 'LifeExpectancy', 'GNP', 'GNPOld'], 'number'],
            [['IndepYear', 'Population', 'Capital'], 'integer'],
            [['Code'], 'string', 'max' => 3],
            [['Name'], 'string', 'max' => 52],
            [['Region'], 'string', 'max' => 26],
            [['LocalName', 'GovernmentForm'], 'string', 'max' => 45],
            [['HeadOfState'], 'string', 'max' => 60],
            [['Code2'], 'string', 'max' => 2],
            [['Code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Code' => Yii::t('app', 'Code'),
            'Name' => Yii::t('app', 'Name'),
            'Continent' => Yii::t('app', 'Continent'),
            'Region' => Yii::t('app', 'Region'),
            'SurfaceArea' => Yii::t('app', 'Surface Area'),
            'IndepYear' => Yii::t('app', 'Indep Year'),
            'Population' => Yii::t('app', 'Population'),
            'LifeExpectancy' => Yii::t('app', 'Life Expectancy'),
            'GNP' => Yii::t('app', 'Gnp'),
            'GNPOld' => Yii::t('app', 'Gnp Old'),
            'LocalName' => Yii::t('app', 'Local Name'),
            'GovernmentForm' => Yii::t('app', 'Government Form'),
            'HeadOfState' => Yii::t('app', 'Head Of State'),
            'Capital' => Yii::t('app', 'Capital'),
            'Code2' => Yii::t('app', 'Code2'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['CountryCode' => 'Code']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountryLanguages()
    {
        return $this->hasMany(CountryLanguage::className(), ['CountryCode' => 'Code']);
    }
}

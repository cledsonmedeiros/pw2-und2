<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "weapon".
 *
 * @property int $id
 * @property string $type
 *
 * @property EventWeapon[] $eventWeapons
 * @property Event[] $events
 */
class Weapon extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'weapon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['type'], 'string', 'max' => 100],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventWeapons()
    {
        return $this->hasMany(EventWeapon::className(), ['weapon_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['id' => 'event_id'])->viaTable('event_weapon', ['weapon_id' => 'id']);
    }
}

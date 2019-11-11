<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_weapon".
 *
 * @property int $event_id
 * @property int $weapon_id
 *
 * @property Event $event
 * @property Weapon $weapon
 */
class EventWeapon extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_weapon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'weapon_id'], 'required'],
            [['event_id', 'weapon_id'], 'integer'],
            [['event_id', 'weapon_id'], 'unique', 'targetAttribute' => ['event_id', 'weapon_id']],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['weapon_id'], 'exist', 'skipOnError' => true, 'targetClass' => Weapon::className(), 'targetAttribute' => ['weapon_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_id' => Yii::t('app', 'Event ID'),
            'weapon_id' => Yii::t('app', 'Weapon ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWeapon()
    {
        return $this->hasOne(Weapon::className(), ['id' => 'weapon_id']);
    }
}

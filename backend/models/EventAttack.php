<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_attack".
 *
 * @property int $event_id
 * @property int $attack_id
 *
 * @property Event $event
 * @property Attack $attack
 */
class EventAttack extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_attack';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'attack_id'], 'required'],
            [['event_id', 'attack_id'], 'integer'],
            [['event_id', 'attack_id'], 'unique', 'targetAttribute' => ['event_id', 'attack_id']],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['attack_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attack::className(), 'targetAttribute' => ['attack_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_id' => Yii::t('app', 'Event ID'),
            'attack_id' => Yii::t('app', 'Attack ID'),
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
    public function getAttack()
    {
        return $this->hasOne(Attack::className(), ['id' => 'attack_id']);
    }
}

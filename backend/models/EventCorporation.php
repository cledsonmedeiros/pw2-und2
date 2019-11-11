<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_corporation".
 *
 * @property int $event_id
 * @property int $corporation_id
 *
 * @property Event $event
 * @property Corporation $corporation
 */
class EventCorporation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_corporation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'corporation_id'], 'required'],
            [['event_id', 'corporation_id'], 'integer'],
            [['event_id', 'corporation_id'], 'unique', 'targetAttribute' => ['event_id', 'corporation_id']],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['corporation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Corporation::className(), 'targetAttribute' => ['corporation_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_id' => Yii::t('app', 'Event ID'),
            'corporation_id' => Yii::t('app', 'Corporation ID'),
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
    public function getCorporation()
    {
        return $this->hasOne(Corporation::className(), ['id' => 'corporation_id']);
    }
}

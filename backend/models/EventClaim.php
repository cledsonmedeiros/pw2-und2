<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_claim".
 *
 * @property int $event_id
 * @property int $claim_id
 *
 * @property Event $event
 * @property Claim $claim
 */
class EventClaim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_claim';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'claim_id'], 'required'],
            [['event_id', 'claim_id'], 'integer'],
            [['event_id', 'claim_id'], 'unique', 'targetAttribute' => ['event_id', 'claim_id']],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['claim_id'], 'exist', 'skipOnError' => true, 'targetClass' => Claim::className(), 'targetAttribute' => ['claim_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_id' => Yii::t('app', 'Event ID'),
            'claim_id' => Yii::t('app', 'Claim ID'),
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
    public function getClaim()
    {
        return $this->hasOne(Claim::className(), ['id' => 'claim_id']);
    }
}

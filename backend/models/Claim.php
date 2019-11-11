<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "claim".
 *
 * @property int $id
 * @property string $mode
 *
 * @property EventClaim[] $eventClaims
 * @property Event[] $events
 */
class Claim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'claim';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['mode'], 'string', 'max' => 100],
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
            'mode' => Yii::t('app', 'Mode'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventClaims()
    {
        return $this->hasMany(EventClaim::className(), ['claim_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['id' => 'event_id'])->viaTable('event_claim', ['claim_id' => 'id']);
    }
}

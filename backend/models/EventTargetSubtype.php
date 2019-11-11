<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_target_subtype".
 *
 * @property int $event_id
 * @property int $target_subtype_id
 *
 * @property Event $event
 * @property TargetSubtype $targetSubtype
 */
class EventTargetSubtype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_target_subtype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'target_subtype_id'], 'required'],
            [['event_id', 'target_subtype_id'], 'integer'],
            [['event_id', 'target_subtype_id'], 'unique', 'targetAttribute' => ['event_id', 'target_subtype_id']],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['target_subtype_id'], 'exist', 'skipOnError' => true, 'targetClass' => TargetSubtype::className(), 'targetAttribute' => ['target_subtype_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_id' => Yii::t('app', 'Event ID'),
            'target_subtype_id' => Yii::t('app', 'Target Subtype ID'),
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
    public function getTargetSubtype()
    {
        return $this->hasOne(TargetSubtype::className(), ['id' => 'target_subtype_id']);
    }
}

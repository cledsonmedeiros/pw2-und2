<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_target_type".
 *
 * @property int $event_id
 * @property int $target_type_id
 *
 * @property Event $event
 * @property TargetType $targetType
 */
class EventTargetType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_target_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'target_type_id'], 'required'],
            [['event_id', 'target_type_id'], 'integer'],
            [['event_id', 'target_type_id'], 'unique', 'targetAttribute' => ['event_id', 'target_type_id']],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['target_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TargetType::className(), 'targetAttribute' => ['target_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_id' => Yii::t('app', 'Event ID'),
            'target_type_id' => Yii::t('app', 'Target Type ID'),
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
    public function getTargetType()
    {
        return $this->hasOne(TargetType::className(), ['id' => 'target_type_id']);
    }
}

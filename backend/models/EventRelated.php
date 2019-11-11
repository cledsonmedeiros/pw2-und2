<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_related".
 *
 * @property int $event_id1
 * @property int $event_id2
 *
 * @property Event $eventId1
 * @property Event $eventId2
 */
class EventRelated extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_related';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id1', 'event_id2'], 'required'],
            [['event_id1', 'event_id2'], 'integer'],
            [['event_id1', 'event_id2'], 'unique', 'targetAttribute' => ['event_id1', 'event_id2']],
            [['event_id1'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id1' => 'id']],
            [['event_id2'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id2' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_id1' => Yii::t('app', 'Event Id1'),
            'event_id2' => Yii::t('app', 'Event Id2'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventId1()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventId2()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id2']);
    }
}

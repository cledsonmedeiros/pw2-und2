<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "target_subtype".
 *
 * @property int $id
 * @property string $name
 *
 * @property EventTargetSubtype[] $eventTargetSubtypes
 * @property Event[] $events
 */
class TargetSubtype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'target_subtype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTargetSubtypes()
    {
        return $this->hasMany(EventTargetSubtype::className(), ['target_subtype_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['id' => 'event_id'])->viaTable('event_target_subtype', ['target_subtype_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "target_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property EventTargetType[] $eventTargetTypes
 * @property Event[] $events
 */
class TargetType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'target_type';
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
    public function getEventTargetTypes()
    {
        return $this->hasMany(EventTargetType::className(), ['target_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['id' => 'event_id'])->viaTable('event_target_type', ['target_type_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "corporation".
 *
 * @property int $id
 * @property string $name
 *
 * @property EventCorporation[] $eventCorporations
 * @property Event[] $events
 */
class Corporation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'corporation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 450],
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
    public function getEventCorporations()
    {
        return $this->hasMany(EventCorporation::className(), ['corporation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['id' => 'event_id'])->viaTable('event_corporation', ['corporation_id' => 'id']);
    }
}

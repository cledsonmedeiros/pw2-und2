<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property int $year
 * @property int $month
 * @property int $day
 * @property double $latitude
 * @property double $longitude
 * @property string $location
 * @property string $summary
 * @property int $success
 * @property int $suicide
 * @property string $motive
 * @property int $claimed
 * @property string $weapon_detail
 * @property int $confirmed_fatalities
 * @property int $confirmed_injuries
 * @property string $notes
 * @property int $country_id
 * @property int $city_id
 * @property int $state_id
 *
 * @property Country $country
 * @property City $city
 * @property State $state
 * @property EventAttack[] $eventAttacks
 * @property Attack[] $attacks
 * @property EventClaim[] $eventClaims
 * @property Claim[] $claims
 * @property EventCorporation[] $eventCorporations
 * @property Corporation[] $corporations
 * @property EventGroup[] $eventGroups
 * @property Group[] $groups
 * @property EventRelated[] $eventRelateds
 * @property EventRelated[] $eventRelateds0
 * @property Event[] $eventId2s
 * @property Event[] $eventId1s
 * @property EventTargetSubtype[] $eventTargetSubtypes
 * @property TargetSubtype[] $targetSubtypes
 * @property EventTargetType[] $eventTargetTypes
 * @property TargetType[] $targetTypes
 * @property EventWeapon[] $eventWeapons
 * @property Weapon[] $weapons
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'year', 'month', 'day', 'success', 'suicide', 'claimed', 'confirmed_fatalities', 'confirmed_injuries', 'country_id', 'city_id', 'state_id'], 'integer'],
            [['latitude', 'longitude'], 'number'],
            [['location', 'summary', 'motive', 'weapon_detail', 'notes'], 'string'],
            [['id'], 'unique'],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['state_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'year' => Yii::t('app', 'Year'),
            'month' => Yii::t('app', 'Month'),
            'day' => Yii::t('app', 'Day'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'location' => Yii::t('app', 'Location'),
            'summary' => Yii::t('app', 'Summary'),
            'success' => Yii::t('app', 'Success'),
            'suicide' => Yii::t('app', 'Suicide'),
            'motive' => Yii::t('app', 'Motive'),
            'claimed' => Yii::t('app', 'Claimed'),
            'weapon_detail' => Yii::t('app', 'Weapon Detail'),
            'confirmed_fatalities' => Yii::t('app', 'Confirmed Fatalities'),
            'confirmed_injuries' => Yii::t('app', 'Confirmed Injuries'),
            'notes' => Yii::t('app', 'Notes'),
            'country_id' => Yii::t('app', 'Country ID'),
            'city_id' => Yii::t('app', 'City ID'),
            'state_id' => Yii::t('app', 'State ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventAttacks()
    {
        return $this->hasMany(EventAttack::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttacks()
    {
        return $this->hasMany(Attack::className(), ['id' => 'attack_id'])->viaTable('event_attack', ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventClaims()
    {
        return $this->hasMany(EventClaim::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClaims()
    {
        return $this->hasMany(Claim::className(), ['id' => 'claim_id'])->viaTable('event_claim', ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventCorporations()
    {
        return $this->hasMany(EventCorporation::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCorporations()
    {
        return $this->hasMany(Corporation::className(), ['id' => 'corporation_id'])->viaTable('event_corporation', ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventGroups()
    {
        return $this->hasMany(EventGroup::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['id' => 'group_id'])->viaTable('event_group', ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventRelateds()
    {
        return $this->hasMany(EventRelated::className(), ['event_id1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventRelateds0()
    {
        return $this->hasMany(EventRelated::className(), ['event_id2' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventId2s()
    {
        return $this->hasMany(Event::className(), ['id' => 'event_id2'])->viaTable('event_related', ['event_id1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventId1s()
    {
        return $this->hasMany(Event::className(), ['id' => 'event_id1'])->viaTable('event_related', ['event_id2' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTargetSubtypes()
    {
        return $this->hasMany(EventTargetSubtype::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTargetSubtypes()
    {
        return $this->hasMany(TargetSubtype::className(), ['id' => 'target_subtype_id'])->viaTable('event_target_subtype', ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTargetTypes()
    {
        return $this->hasMany(EventTargetType::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTargetTypes()
    {
        return $this->hasMany(TargetType::className(), ['id' => 'target_type_id'])->viaTable('event_target_type', ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventWeapons()
    {
        return $this->hasMany(EventWeapon::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWeapons()
    {
        return $this->hasMany(Weapon::className(), ['id' => 'weapon_id'])->viaTable('event_weapon', ['event_id' => 'id']);
    }
}

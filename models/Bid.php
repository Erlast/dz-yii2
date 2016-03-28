<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bid".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $date_create
 */
class Bid extends \yii\db\ActiveRecord
{
    const _MAX_LENGTH_STRING_ =255;
    const _MAX_LENGTH_PHONE_=10;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_create'], 'safe'],
            [['name', 'address', 'email'], 'string', 'max' => self::_MAX_LENGTH_STRING_],
            [['phone'], 'string', 'max' => self::_MAX_LENGTH_PHONE_],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'date_create' => Yii::t('app', 'Date Create'),
        ];
    }
}

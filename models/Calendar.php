<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "calendar".
 * @property integer $id
 * @property string  $text
 * @property integer $creator
 * @property string  $date_event
 * @property User    $userCreator
 */
class Calendar extends \yii\db\ActiveRecord
{

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'calendar';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[
				['text'],
				'required'
			],
			[
				['text'],
				'string'
			],
			[
				['creator'],
				'integer'
			],
			[
				['date_event'],
				'safe'
			],
			[
				['creator'],
				'exist',
				'skipOnError'     => true,
				'targetClass'     => User::className(),
				'targetAttribute' => ['creator' => 'id']
			],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id'         => Yii::t('app', 'ID'),
			'text'       => Yii::t('app', 'Текст'),
			'creator'    => Yii::t('app', 'Создатель'),
			'date_event' => Yii::t('app', 'Дата события'),
		];
	}

	/**
	 * Before save event handler
	 *
	 * @param bool $insert
	 *
	 * @return bool
	 */
	public function beforeSave($insert)
	{
		if ($this->getIsNewRecord()) {
			$this->creator = Yii::$app->user->id;
		}
		parent::beforeSave($insert);
		return true;
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getUserCreator()
	{
		return $this->hasOne(User::className(), ['id' => 'creator']);
	}

	/**
	 * @inheritdoc
	 * @return \app\models\query\CalendarQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \app\models\query\CalendarQuery(get_called_class());
	}
}

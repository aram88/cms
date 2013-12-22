<?php

/**
 * This is the model base class for the table "posts_translate".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "PostsTranslate".
 *
 * Columns in table "posts_translate" available as properties of the model,
 * followed by relations of table "posts_translate" available as properties of the model.
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $name
 * @property string $title
 * @property string $label
 * @property string $text
 * @property string $img_name
 * @property string $short_text
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $lng_id
 *
 * @property User $updatedBy
 * @property Posts $post
 * @property Languages $lng
 * @property User $createdBy
 */
abstract class BasePostsTranslate extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'posts_translate';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'PostsTranslate|PostsTranslates', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, title', 'required'),
			array('post_id, created_by, updated_by, created_at, updated_at, lng_id', 'numerical', 'integerOnly'=>true),
			array('label, img_name', 'length', 'max'=>255),
			array('text, short_text', 'safe'),
			array('post_id, created_by, updated_by, label, text, img_name, short_text, created_at, updated_at, lng_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, post_id, created_by, updated_by, name, title, label, text, img_name, short_text, created_at, updated_at, lng_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'post' => array(self::BELONGS_TO, 'Posts', 'post_id'),
			'lng' => array(self::BELONGS_TO, 'Languages', 'lng_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'post_id' => null,
			'created_by' => null,
			'updated_by' => null,
			'name' => Yii::t('app', 'Name'),
			'title' => Yii::t('app', 'Title'),
			'label' => Yii::t('app', 'Label'),
			'text' => Yii::t('app', 'Text'),
			'img_name' => Yii::t('app', 'Img Name'),
			'short_text' => Yii::t('app', 'Short Text'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
			'lng_id' => null,
			'updatedBy' => null,
			'post' => null,
			'lng' => null,
			'createdBy' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('post_id', $this->post_id);
		$criteria->compare('created_by', $this->created_by);
		$criteria->compare('updated_by', $this->updated_by);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('label', $this->label, true);
		$criteria->compare('text', $this->text, true);
		$criteria->compare('img_name', $this->img_name, true);
		$criteria->compare('short_text', $this->short_text, true);
		$criteria->compare('created_at', $this->created_at);
		$criteria->compare('updated_at', $this->updated_at);
		$criteria->compare('lng_id', $this->lng_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
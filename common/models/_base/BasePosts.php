<?php

/**
 * This is the model base class for the table "posts".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Posts".
 *
 * Columns in table "posts" available as properties of the model,
 * followed by relations of table "posts" available as properties of the model.
 *
 * @property integer $id
 * @property integer $menu_id
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $stick
 * @property string $path
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $home_page
 * @property integer $type
 * @property string $img
 * @property integer $read_all
 * @property integer $read
 * @property integer $status
 *
 * @property Generals[] $generals
 * @property Menus $menu
 * @property User $createdBy
 * @property User $updatedBy
 * @property PostsTranslate[] $postsTranslates
 */
abstract class BasePosts extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'posts';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Posts|Posts', $n);
	}

	public static function representingColumn() {
		return 'path';
	}

	public function rules() {
		return array(
			array('menu_id, created_by, updated_by, stick, created_at, updated_at, home_page, type, read_all, read, status', 'numerical', 'integerOnly'=>true),
			array('path, img', 'safe'),
			array('menu_id, created_by, updated_by, stick, path, created_at, updated_at, home_page, type, img, read_all, read, status', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, menu_id, created_by, updated_by, stick, path, created_at, updated_at, home_page, type, img, read_all, read, status', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'generals' => array(self::HAS_MANY, 'Generals', 'post_id'),
			'menu' => array(self::BELONGS_TO, 'Menus', 'menu_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'postsTranslates' => array(self::HAS_MANY, 'PostsTranslate', 'post_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'menu_id' => null,
			'created_by' => null,
			'updated_by' => null,
			'stick' => Yii::t('app', 'Stick'),
			'path' => Yii::t('app', 'Path'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
			'home_page' => Yii::t('app', 'Home Page'),
			'type' => Yii::t('app', 'Type'),
			'img' => Yii::t('app', 'Img'),
			'read_all' => Yii::t('app', 'Read All'),
			'read' => Yii::t('app', 'Read'),
			'status' => Yii::t('app', 'Status'),
			'generals' => null,
			'menu' => null,
			'createdBy' => null,
			'updatedBy' => null,
			'postsTranslates' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('menu_id', $this->menu_id);
		$criteria->compare('created_by', $this->created_by);
		$criteria->compare('updated_by', $this->updated_by);
		$criteria->compare('stick', $this->stick);
		$criteria->compare('path', $this->path, true);
		$criteria->compare('created_at', $this->created_at);
		$criteria->compare('updated_at', $this->updated_at);
		$criteria->compare('home_page', $this->home_page);
		$criteria->compare('type', $this->type);
		$criteria->compare('img', $this->img, true);
		$criteria->compare('read_all', $this->read_all);
		$criteria->compare('read', $this->read);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
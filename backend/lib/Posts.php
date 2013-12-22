<?php

/**
 * This is the model class for table "posts".
 *
 * The followings are the available columns in table 'posts':
 * @property integer $id
 * @property integer $menu_id
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $stick
 * @property string $path
 * @property integer $visible
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $home_page
 * @property integer $type
 * @property string $img
 * @property integer $read_all
 * @property integer $read
 * @property integer $deleted
 *
 * The followings are the available model relations:
 * @property Generals[] $generals
 * @property Users $createdBy
 * @property Users $updatedBy
 * @property Menus $menu
 * @property PostsTranslate[] $postsTranslates
 */
class Posts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'posts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('updated_at', 'required'),
			array('menu_id, created_by, updated_by, stick, visible, created_at, updated_at, type, read_all, read, deleted', 'numerical', 'integerOnly'=>true),
			array('home_page', 'length', 'max'=>1),
			array('path, img', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, menu_id, created_by, updated_by, stick, path, visible, created_at, updated_at, home_page, type, img, read_all, read, deleted', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'generals' => array(self::HAS_MANY, 'Generals', 'post_id'),
			'createdBy' => array(self::BELONGS_TO, 'Users', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'Users', 'updated_by'),
			'menu' => array(self::BELONGS_TO, 'Menus', 'menu_id'),
			'postsTranslates' => array(self::HAS_MANY, 'PostsTranslate', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'menu_id' => 'Menu',
			'created_by' => 'Created By',
			'updated_by' => 'Updated By',
			'stick' => 'Stick',
			'path' => 'Path',
			'visible' => 'Visible',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'home_page' => 'Home Page',
			'type' => 'Type',
			'img' => 'Img',
			'read_all' => 'Read All',
			'read' => 'Read',
			'deleted' => 'Deleted',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('stick',$this->stick);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('visible',$this->visible);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);
		$criteria->compare('home_page',$this->home_page,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('read_all',$this->read_all);
		$criteria->compare('read',$this->read);
		$criteria->compare('deleted',$this->deleted);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Posts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

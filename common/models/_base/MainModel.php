<?php
class MainModel extends GxActiveRecord{
	const STATUS_DELETE = 0;
	const STATUS_DRAFT = 1;
	const STATUS_ACTIVE = 2;
	
	public function behaviors(){
		return array(
			'CTimestampBehavior' => array(
			'class' => 'zii.behaviors.CTimestampBehavior',
			'createAttribute'=>'created_at',
			'updateAttribute'=>'updated_at',
			'setUpdateOnCreate'=>true						
			)
		);
	}
	public function beforeSave (){
		if (null !== Yii::app()->user){
			$id = Yii::app()->user->id;
		}else{
			$id = 1;
		}
		if ($id == null){
			$id =1;
		}
		if ($this->isNewRecord){
				$this->created_by == $id;
		}
		if ($this->updated_by == null){
			$this->updated_by = $id;
		}	
		return parent::beforeSave();
		
	}
}
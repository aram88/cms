<?php

Yii::import('common.models._base.BasePosts');

class Posts extends BasePosts
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}
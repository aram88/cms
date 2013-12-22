<?php

class PostsController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view'),
				'users'=>array('ADMIN'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update'),
				'users'=>array('ADMIN'),
				),
			array('allow', 
				'actions'=>array('admin','delete'),
				'users'=>array('ADMIN'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Posts'),
		));
	}

	public function actionCreate() {
		$model = new Posts;

		$this->performAjaxValidation($model, 'posts-form');

		if (isset($_POST['Posts'])) {
			$model->setAttributes($_POST['Posts']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Posts');

		$this->performAjaxValidation($model, 'posts-form');

		if (isset($_POST['Posts'])) {
			$model->setAttributes($_POST['Posts']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Posts')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Posts');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Posts('search');
		$model->unsetAttributes();

		if (isset($_GET['Posts']))
			$model->setAttributes($_GET['Posts']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
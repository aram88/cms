<?php

class PostsTranslateController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view'),
				'roles'=>array('*'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update'),
				'roles'=>array('UserCreator'),
				),
			array('allow', 
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'PostsTranslate'),
		));
	}

	public function actionCreate() {
		$model = new PostsTranslate;

		$this->performAjaxValidation($model, 'posts-translate-form');

		if (isset($_POST['PostsTranslate'])) {
			$model->setAttributes($_POST['PostsTranslate']);

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
		$model = $this->loadModel($id, 'PostsTranslate');

		$this->performAjaxValidation($model, 'posts-translate-form');

		if (isset($_POST['PostsTranslate'])) {
			$model->setAttributes($_POST['PostsTranslate']);

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
			$this->loadModel($id, 'PostsTranslate')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('PostsTranslate');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new PostsTranslate('search');
		$model->unsetAttributes();

		if (isset($_GET['PostsTranslate']))
			$model->setAttributes($_GET['PostsTranslate']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
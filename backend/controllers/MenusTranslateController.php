<?php

class MenusTranslateController extends GxController {



	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'MenusTranslate'),
		));
	}

	public function actionCreate() {
		$model = new MenusTranslate;

		$this->performAjaxValidation($model, 'menus-translate-form');

		if (isset($_POST['MenusTranslate'])) {
			$model->setAttributes($_POST['MenusTranslate']);

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
		$model = $this->loadModel($id, 'MenusTranslate');

		$this->performAjaxValidation($model, 'menus-translate-form');

		if (isset($_POST['MenusTranslate'])) {
			$model->setAttributes($_POST['MenusTranslate']);

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
			$this->loadModel($id, 'MenusTranslate')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('MenusTranslate');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new MenusTranslate('search');
		$model->unsetAttributes();

		if (isset($_GET['MenusTranslate']))
			$model->setAttributes($_GET['MenusTranslate']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}
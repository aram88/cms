<?php

class MenusController extends BackendController {
	
	/**
	 * @return array action filters
	 */


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Menus'),
		));
	}
	
	


	
	public function actionCreate() {
		$model = new Menus;
		$languages =  new Languages;
		$model2 =  array();	
		
		
		$languages = $languages->findAll(array('select'=>array('id','name')));
		
		foreach ($languages as  $language){
			$model2[$language->id] =  new MenusTranslate;
		}
		
	
		if (isset($_POST['Menus']) && isset($_POST['MenusTranslate'])) {
			$model->setAttributes($_POST['Menus']);
			$validate = $model->validate();
			foreach ($languages as  $language){
				$model2[$language->id]->setAttributes($_POST['MenusTranslate'][$language->id]) ;
				$validate = $model2[$language->id]->validate() && $validate;
			}
			
			
			if ($validate){
				if ($model->save()) {
					if (Yii::app()->getRequest()->getIsAjaxRequest())
						Yii::app()->end();
					else
						$this->redirect(array('view', 'id' => $model->id));
				}
			}
		}

		$this->render('create', array( 'model' => $model, 'languages'=>$languages,'model2'=>$model2));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Menus');


		if (isset($_POST['Menus'])) {
			$model->setAttributes($_POST['Menus']);

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
			$this->loadModel($id, 'Menus')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Menus');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Menus('search');
		$model->unsetAttributes();

		if (isset($_GET['Menus']))
			$model->setAttributes($_GET['Menus']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
	
	protected function performAjaxValidation($model,$model2)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='menus_form')
		{
			echo CActiveForm::validate(array($model));
			foreach ($model2  as $k=>$v){
				echo CActiveForm::validate(array($model2[$k]));
			}
			Yii::app()->end();
		}
	}

}
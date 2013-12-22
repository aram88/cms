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
	public function actionCropImg()
	{
		Yii::app()->clientScript->scriptMap=array(
		(YII_DEBUG ?  'jquery.js':'jquery.min.js')=>false,
		);
		$imageUrl = Yii::app()->params['frontend.url']. '/upload/'. $_GET['fileName'];
		$this->renderPartial('cropImg', array('imageUrl'=>$imageUrl), false, true);
	}
	

	public function actionUpload()
	{
		Yii::import("ext.EAjaxUpload.qqFileUploader");
	
		$folder=Yii::getPathOfAlias('root').'/frontend/www/upload/';// folder for uploaded files
		$allowedExtensions = array("jpg");//array("jpg","jpeg","gif","exe","mov" and etc...
		$sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
		$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		$result = $uploader->handleUpload($folder);
		$return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
	
		$fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		$fileName=$result['filename'];//GETTING FILE NAME
	
		echo $return;// it's array
	}	
	
	public function actionCreate() {
		var_dump(Yii::getPathOfAlias('root'));
		$model = new Menus;


		if (isset($_POST['Menus'])) {
			$model->setAttributes($_POST['Menus']);

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

}
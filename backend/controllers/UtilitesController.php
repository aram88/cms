<?php
class UtilitesController extends BackendController{
	public function actionUpload()
	{
		Yii::import("ext.EAjaxUpload.qqFileUploader");
	
		$folder=Yii::getPathOfAlias('root').'/frontend/www/upload/';// folder for uploaded files
		$allowedExtensions = array("jpg","jpeg","gif","png","JPG","JPEG","GIF","PNG");//array("jpg","jpeg","gif","exe","mov" and etc...
		$sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
		$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		$result = $uploader->handleUpload($folder);
		$return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
	
		$fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		$fileName=$result['filename'];//GETTING FILE NAME
	
		echo $return;// it's array
	}
	public function actionCropImg()
	{
		Yii::app()->clientScript->scriptMap=array(
		(YII_DEBUG ?  'jquery.js':'jquery.min.js')=>false,);
		$imageUrl = Yii::app()->params['frontend.url']. '/upload/'. $_GET['fileName'];
		$this->renderPartial('cropImg', array('imageUrl'=>$imageUrl,'model'=>$_GET['model']), false, true);
	}	
}
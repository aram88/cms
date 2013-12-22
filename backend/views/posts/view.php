<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
array(
			'name' => 'menu',
			'type' => 'raw',
			'value' => $model->menu !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->menu)), array('menus/view', 'id' => GxActiveRecord::extractPkValue($model->menu, true))) : null,
			),
array(
			'name' => 'createdBy',
			'type' => 'raw',
			'value' => $model->createdBy !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->createdBy)), array('users/view', 'id' => GxActiveRecord::extractPkValue($model->createdBy, true))) : null,
			),
array(
			'name' => 'updatedBy',
			'type' => 'raw',
			'value' => $model->updatedBy !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->updatedBy)), array('users/view', 'id' => GxActiveRecord::extractPkValue($model->updatedBy, true))) : null,
			),
'stick:boolean',
'path',
'created_at',
'updated_at',
'home_page:boolean',
'type:boolean',
'img',
'read_all:boolean',
'read:boolean',
'status:boolean',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('generals')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->generals as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('generals/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('postsTranslates')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->postsTranslates as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('postsTranslate/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>
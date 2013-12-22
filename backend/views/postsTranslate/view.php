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
			'name' => 'post',
			'type' => 'raw',
			'value' => $model->post !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->post)), array('posts/view', 'id' => GxActiveRecord::extractPkValue($model->post, true))) : null,
			),
array(
			'name' => 'createdBy',
			'type' => 'raw',
			'value' => $model->createdBy !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->createdBy)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->createdBy, true))) : null,
			),
array(
			'name' => 'updatedBy',
			'type' => 'raw',
			'value' => $model->updatedBy !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->updatedBy)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->updatedBy, true))) : null,
			),
'name',
'title',
'label',
'text',
'img_name',
'short_text',
'created_at',
'updated_at',
array(
			'name' => 'lng',
			'type' => 'raw',
			'value' => $model->lng !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->lng)), array('languages/view', 'id' => GxActiveRecord::extractPkValue($model->lng, true))) : null,
			),
	),
)); ?>


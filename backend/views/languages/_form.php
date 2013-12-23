<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'languages-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 3)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textField($model, 'text', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'text'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->textField($model, 'img', array('maxlength' => 256)); ?>
		<?php echo $form->error($model,'img'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->dropDownList($model, 'created_by', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'created_by'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'updated_by'); ?>
		<?php echo $form->dropDownList($model, 'updated_by', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'updated_by'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model, 'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model, 'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('daysTranslates')); ?></label>
		<?php echo $form->checkBoxList($model, 'daysTranslates', GxHtml::encodeEx(GxHtml::listDataEx(DaysTranslate::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('eventsTranslates')); ?></label>
		<?php echo $form->checkBoxList($model, 'eventsTranslates', GxHtml::encodeEx(GxHtml::listDataEx(EventsTranslate::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('menusTranslates')); ?></label>
		<?php echo $form->checkBoxList($model, 'menusTranslates', GxHtml::encodeEx(GxHtml::listDataEx(MenusTranslate::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('postsTranslates')); ?></label>
		<?php echo $form->checkBoxList($model, 'postsTranslates', GxHtml::encodeEx(GxHtml::listDataEx(PostsTranslate::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('readingsTranslates')); ?></label>
		<?php echo $form->checkBoxList($model, 'readingsTranslates', GxHtml::encodeEx(GxHtml::listDataEx(ReadingsTranslate::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->
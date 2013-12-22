<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'posts-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'menu_id'); ?>
		<?php echo $form->dropDownList($model, 'menu_id', GxHtml::listDataEx(Menus::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'menu_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->dropDownList($model, 'created_by', GxHtml::listDataEx(Users::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'created_by'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'updated_by'); ?>
		<?php echo $form->dropDownList($model, 'updated_by', GxHtml::listDataEx(Users::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'updated_by'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'stick'); ?>
		<?php echo $form->checkBox($model, 'stick'); ?>
		<?php echo $form->error($model,'stick'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'path'); ?>
		<?php echo $form->textArea($model, 'path'); ?>
		<?php echo $form->error($model,'path'); ?>
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
		<div class="row">
		<?php echo $form->labelEx($model,'home_page'); ?>
		<?php echo $form->checkBox($model, 'home_page'); ?>
		<?php echo $form->error($model,'home_page'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->checkBox($model, 'type'); ?>
		<?php echo $form->error($model,'type'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->textArea($model, 'img'); ?>
		<?php echo $form->error($model,'img'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'read_all'); ?>
		<?php echo $form->checkBox($model, 'read_all'); ?>
		<?php echo $form->error($model,'read_all'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'read'); ?>
		<?php echo $form->checkBox($model, 'read'); ?>
		<?php echo $form->error($model,'read'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->checkBox($model, 'status'); ?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('generals')); ?></label>
		<?php echo $form->checkBoxList($model, 'generals', GxHtml::encodeEx(GxHtml::listDataEx(Generals::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('postsTranslates')); ?></label>
		<?php echo $form->checkBoxList($model, 'postsTranslates', GxHtml::encodeEx(GxHtml::listDataEx(PostsTranslate::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->
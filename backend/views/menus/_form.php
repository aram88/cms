<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'menus_form',
		'type'=>'horizontal',
		 'enableAjaxValidation'=>true,
		'htmlOptions'=>array('class'=>'well')
	)); ?>

                <?php echo $form->error($model,'img'); 

                echo $form->hiddenField($model,'cropID');
                echo $form->hiddenField($model,'cropX', array('value' => '0'));
                echo $form->hiddenField($model,'cropY', array('value' => '0'));
                echo $form->hiddenField($model,'cropW', array('value' => '100'));
                echo $form->hiddenField($model,'cropH', array('value' => '100'));

Yii::import('ext.EAjaxUpload.EAjaxUpload'); ?>


                <?php 
                $this->beginWidget('zii.widgets.jui.CJuiDialog',
                        array(
                                'id'=>'cropDialog', 
                                'options'=> array(
                                        'title'=>'Crop', 
                                        'modal'=>true, 
                                        'width'=>900,
                                        'height'=>600,
                                        'buttons'=>array('CROP'=>'js:function(){$(this).dialog("close")}'),
                                        'autoOpen'=>false,
                                )
                        ));

                echo '<div id="cropImg"></div>';

                $this->endWidget('zii.widgets.jui.CJuiDialog');
                ?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		
		<div class="row">
		<?php echo $form->toggleButtonRow($model, 'sub_show'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->textFieldRow($model, 'position'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->dropDownListRow($model, 'menu_id',array('empty'=>'----SELECT PARENT MENU----','menus'=> GxHtml::listDataEx(Menus::model()->findAllAttributes(null, true)))); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->dropDownListRow($model, 'location',array('empty'=>'----SELECT LOCATION----','options'=>$model->getLocations())); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->toggleButtonRow($model, 'main_show'); ?>
		</div><!-- row -->
		<div class="row">
			<div class="control-group  validating">
			   <label for="Menus_img" class="control-label ">Image</label>
			   <div class="controls">
			   <?php 	 $this->widget('ext.EAjaxUpload.EAjaxUpload',
					array(
					        'id'=>'uploadFile',
					        'config'=>array(
					               'action'=>Yii::app()->createUrl('utilites/upload'),
					               'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
					               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
					               'minSizeLimit'=>10,// minimum file size in bytes
					               'onComplete'=>"js:function(id, fileName, responseJSON){ 
					                                        $('#uploadFile').hide();
					                                        if (responseJSON.success) {
					        									    $('#cropImg').load('". Yii::app()->createUrl('utilites/cropImg') ."fileName/'+fileName+'/model/Menus');
					                                                $('#cropDialog').dialog('open');
					                                                $('#Users_image').val(responseJSON.filename);
					                                                $('#Users_imageExt').val((responseJSON.filename.substring(responseJSON.filename.lastIndexOf('.'))).toLowerCase());
					                                                $('#uploadFile').show();
					                                                $('.qq-upload-button').css('display', 'none');
					                                        } else {
					                                                $('#uploadFile').html('<p  width=\"160\">' + responseJSON.error +'</p>');
					                                        }
					                                }",
					        		
					              )
					)); ?>
			   </div>
			 </div>
		</div> 
		
		<?php  foreach ($languages as $language): ?>
			<?php echo $form->hiddenField($model2[$language->id],'lng_id',array('value'=>$language->id))?>
			<div class = "row">
			<?php echo $language->name;?> <hr/>
			</div>
			<div class = row>
				<?php echo $form->textFieldRow($model2[$language->id], '['.$language->id.']name');?>
			</div>
			<div class = row>
				<?php echo $form->textFieldRow($model2[$language->id], '['.$language->id.']title');?>
			</div>
			<div class = row>
				<?php echo $form->ckEditorRow($model2[$language->id], '['.$language->id.']text');?>
			</div>
		<?php endforeach;?>
	
		

<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$model->isNewRecord ? 'Create' : 'Save')); ?>
        	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset','type'=>'error', 'label'=>'Reset')); ?>
   
<?php $this->endWidget();
?>
</div><!-- form -->
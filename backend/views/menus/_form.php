<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'menus_form',
		'type'=>'horizontal',
		'htmlOptions'=>array('class'=>'well')
	)); ?>

                <?php echo $form->error($model,'image'); 

                echo $form->hiddenField($model,'cropID');
                echo $form->hiddenField($model,'cropX', array('value' => '0'));
                echo $form->hiddenField($model,'cropY', array('value' => '0'));
                echo $form->hiddenField($model,'cropW', array('value' => '100'));
                echo $form->hiddenField($model,'cropH', array('value' => '100'));

Yii::import('ext.EAjaxUpload.EAjaxUpload'); 
$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile',
        'config'=>array(
               'action'=>Yii::app()->createUrl('menus/upload'),
               'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>10,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
                                        $('#uploadFile').hide();
                                        if (responseJSON.success) {
        									    $('#cropImg').load('". $this->createUrl('cropImg') ."fileName/'+fileName);
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

                <?php 
                $this->beginWidget('zii.widgets.jui.CJuiDialog',
                        array(
                                'id'=>'cropDialog', 
                                'options'=> array(
                                        'title'=>'Crop', 
                                        'modal'=>true, 
                                        'width'=>728,
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
		<?php echo $form->dropDownListRow($model, 'menu_id', GxHtml::listDataEx(Menus::model()->findAllAttributes(null, true))); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->dropDownListRow($model, 'location',$model->getLocations()); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->toggleButtonRow($model, 'main_show'); ?>
		</div><!-- row -->
	
		

<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$model->isNewRecord ? 'Create' : 'Save')); ?>
        	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset','type'=>'error', 'label'=>'Reset')); ?>
   
<?php $this->endWidget();
?>
</div><!-- form -->
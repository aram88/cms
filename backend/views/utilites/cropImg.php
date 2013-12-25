<?php $previewWidth = 100; $previewHeight = 100;?>
<?php $this->widget('ext.yii-jcrop.jCropWidget',array(
        'imageUrl'=>$imageUrl,
        'formElementX'=>$model.'_cropX',
        'formElementY'=>$model.'_cropY',
        'formElementWidth'=>$model.'_cropW',
        'formElementHeight'=>$model.'_cropH',
        'previewId'=>'avatar-preview', //optional preview image ID, see preview div below
        'previewWidth'=>$previewWidth,
        'previewHeight'=>$previewHeight,
        'jCropOptions'=>array(
                'onRelease'=> 'releaseCheck',
        		'onSelect'=> 'updateCoords',
                'boxWidth'=>400,
                'boxHeight'=>400,
                'setSelect'=>array(0, 0, 100, 100),
        ), 
        )
);
?>
<div id="avatar-thumb" style="position:relative; overflow:hidden; width:<?=$previewWidth?>px; height:<?=$previewHeight?>px; margin-top: 10px; margin-bottom: 10px;">
        <img id="avatar-preview" src="<?=$imageUrl?>" style="width: 0px; height: 0px; margin-left: 0px; margin-top: 0px;">
</div>
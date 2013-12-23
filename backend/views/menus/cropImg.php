<?php $previewWidth = 100; $previewHeight = 100;?>
<?php $this->widget('ext.yii-jcrop.jCropWidget',array(
        'imageUrl'=>$imageUrl,
        'formElementX'=>'Menus_cropX',
        'formElementY'=>'Menus_cropY',
        'formElementWidth'=>'Menus_cropW',
        'formElementHeight'=>'Menus_cropH',
        'previewId'=>'avatar-preview', //optional preview image ID, see preview div below
        'previewWidth'=>$previewWidth,
        'previewHeight'=>$previewHeight,
        'jCropOptions'=>array(
                'aspectRatio'=>1,
        		'onSelect'=> 'updateCoords',
                'minSize'=>array(150, 150),
                'maxSize'=>array(400, 450),
                'boxWidth'=>700,
                'boxHeight'=>700,
                'setSelect'=>array(0, 0, 450, 400),
        ), 
        )
);
?>
<div id="avatar-thumb" style="position:relative; overflow:hidden; width:<?=$previewWidth?>px; height:<?=$previewHeight?>px; margin-top: 10px; margin-bottom: 10px;">
        <img id="avatar-preview" src="<?=$imageUrl?>" style="width: 0px; height: 0px; margin-left: 0px; margin-top: 0px;">
</div>
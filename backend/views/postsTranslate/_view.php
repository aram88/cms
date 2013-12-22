<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('post_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->post)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_by')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->createdBy)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_by')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->updatedBy)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('title')); ?>:
	<?php echo GxHtml::encode($data->title); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('label')); ?>:
	<?php echo GxHtml::encode($data->label); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('text')); ?>:
	<?php echo GxHtml::encode($data->text); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('img_name')); ?>:
	<?php echo GxHtml::encode($data->img_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('short_text')); ?>:
	<?php echo GxHtml::encode($data->short_text); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_at')); ?>:
	<?php echo GxHtml::encode($data->created_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_at')); ?>:
	<?php echo GxHtml::encode($data->updated_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lng_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->lng)); ?>
	<br />
	*/ ?>

</div>
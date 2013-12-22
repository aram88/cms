<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('menu_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->menu)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_by')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->createdBy)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_by')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->updatedBy)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('stick')); ?>:
	<?php echo GxHtml::encode($data->stick); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('path')); ?>:
	<?php echo GxHtml::encode($data->path); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_at')); ?>:
	<?php echo GxHtml::encode($data->created_at); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_at')); ?>:
	<?php echo GxHtml::encode($data->updated_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('home_page')); ?>:
	<?php echo GxHtml::encode($data->home_page); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('type')); ?>:
	<?php echo GxHtml::encode($data->type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('img')); ?>:
	<?php echo GxHtml::encode($data->img); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('read_all')); ?>:
	<?php echo GxHtml::encode($data->read_all); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('read')); ?>:
	<?php echo GxHtml::encode($data->read); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	*/ ?>

</div>
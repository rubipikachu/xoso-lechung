<?php $this->beginContent('/layouts/main'); ?>
<div>
	<div class="col-xs-3 hidden-xs hidden-sm">
		<?php echo $this->clips['left']; ?>
	</div>
    <div class="col-xs-4 visible-sm">
		<?php echo $this->clips['left1']; ?>
	</div>
    <div class="col-xs-6 hidden-xs hidden-sm">
		<?php echo $content; ?>
	</div>
    <div class="col-xs-8 visible-sm">
		<?php echo $content; ?>
	</div>
    <div class="col-xs-12 visible-xs">
		<?php echo $content; ?>
	</div>
    <div class="col-xs-3 hidden-xs hidden-sm">
		<?php echo $this->clips['right']; ?>
	</div>
</div>
<?php $this->endContent(); ?>
<span name="skills" style="display:none;">
	<?php foreach($skills as $skill):?>
		<p><img src="<?php echo $skill->getImagepath() ?>" /><?php echo $skill->getName()?></p>
	<?php endforeach;?>
</span>
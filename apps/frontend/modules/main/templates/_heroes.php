<?php foreach($heroes as $primaryAttribute => $iHeroes):?>
<ul class="<?php echo $primaryAttribute ?>">
	<?php foreach($iHeroes as $hero):?>
	<li>
		<a href="javascript:void(0);" name="view_hero_details">
			<img src="<?php echo $hero->getImagepath() ?>" alt="" />
			<p name="hero_name"><?php echo $hero->getName()?></p>
			<p name="hero_legend"><?php echo $hero->getLegend()?></p>
			
			<?php include_component('main', 'heroSkills', array('hero' => $hero))?>
			
		</a>
	</li>
	<?php endforeach;?>
</ul>
<?php endforeach;?>
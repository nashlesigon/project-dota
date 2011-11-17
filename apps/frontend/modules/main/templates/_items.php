<?php foreach($items as $store => $itemObjects):?>
<ul class="<?php echo strtolower(str_replace(" ","_",$store)) ?>">
	<?php foreach($itemObjects as $item):?>
	<li>
		<a href="javascript:void(0);" name="view_item_details">
			<img src="<?php echo $item->getImagepath() ?>" alt="" />
			<p name="item_name"><?php echo $item->getName()?></p>
			<span style="display:none;">
				<p name="item_store"><?php echo $item->getStore()->getName()?></p>
				<p name="item_price"><?php echo $item->getPrice()?></p>
				
				<?php if($item->isRecipe()):?>
					<?php include_partial('main/itemRecipe', array('item' => $item));?>
				<?php endif;?>
				<?php include_component('main', 'itemStats', array('item' => $item))?>
			</span>
		</a>								
	</li>
	<?php endforeach;?>
</ul>
<?php endforeach;?>
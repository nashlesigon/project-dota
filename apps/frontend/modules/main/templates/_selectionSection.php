<aside class="selection">
	<section class="choose-hero">
		<a href="">Choose Hero</a>
		<header>
			<div class="all-details">
				<section class="hero-basic-info">
					<img src="" alt="" id="details_hero_image" />
					<section class="id">
						<h4 id="details_hero_legend">Hero Legend</h4>
						<p id="details_hero_name">Hero Name</p>
						<p id="details_hero_affiliation">Affiliation - Sentinel</p>
					</section>
					<section class="abilities" id="details_hero_abilities">
						<h4>Abilities</h4>
						
					</section>
				</section>
				<section class="stats">
					<h4>Stats</h4>
					<table></table>
				</section>
				<section class="intro"></section>
			</div>
			<div class="actions">
				<a href="">Read Hero Info</a>
				<a href="">Choose Hero</a>
			</div>					
		</header>
		<section class="heroes">
			<nav>
				<a href="javascript:void(0);" id="sentinel_heroes_link">Sentinel</a>
				<a href="javascript:void(0);" id="scourge_heroes_link">Scourge</a>
			</nav>
			<div class="lineup" id="sentinel_heroes_div" name="Sentinel">
				<?php include_partial('main/heroes', array('heroes' => $sentinelHeroes))?>
				<?/*php foreach($sentinelHeroes as $primaryAttribute => $heroes):?>
				<ul class="<?php echo $primaryAttribute ?>">
					<?php foreach($heroes as $hero):?>
					<li>
						<a href="javascript:void(0);" name="view_hero_details">
							<img src="<?php echo $hero->getImagepath() ?>" alt="" />
							<p name="name"><?php echo $hero->getName()?></p>
							<p name="legend"><?php echo $hero->getLegend()?></p>
							
							<?php include_component('main', 'heroSkills', array('hero' => $hero))?>
							
						</a>
					</li>
					<?php endforeach;?>
				</ul>
				<?php endforeach;*/?>
				
			</div>
			<div class="lineup" id="scourge_heroes_div" name="Scourge" style="display:none;">
				<?php include_partial('main/heroes', array('heroes' => $scourgeHeroes))?>
				<?/*php foreach($scourgeHeroes as $primaryAttribute => $heroes):?>
				<ul class="<?php echo $primaryAttribute ?>">
					<?php foreach($heroes as $hero):?>
					<li>
						<a href="javascript:void(0);" name="view_hero_details">
							<img src="<?php echo $hero->getImagepath() ?>" alt="" />
							<p name="name"><?php echo $hero->getName()?></p>
							<p name="legend"><?php echo $hero->getLegend()?></p>
							<?php include_component('main', 'heroSkills', array('hero' => $hero))?>
						</a>						
					</li>
					<?php endforeach;?>
				</ul>
				<?php endforeach;*/?>
				
			</div>
		</section>				
	</section>
	<section class="choose-item">
		<a href="">Choose Item</a>
		<header>
			<div class="all-details">
				<section class="item-basic-info">
					<img src="" alt="" id="details_item_image" />
					<section class="id">
						<h4 id="details_item_name">Item Name</h4>
						<p id="details_item_price">Price</p>
						<p id="details_item_store">Store Name</p>
					</section>
					<section class="Recipe">
						<h4>Recipe</h4>
						<a href=""><img src="" alt="" /></a>
						<a href=""><img src="" alt="" /></a>							
						<a href=""><img src="" alt="" /></a>
						<a href=""><img src="" alt="" /></a>							
					</section>
				</section>
				<section class="stats" id="details_item_stats">
					<h4>Stats</h4>
					<table></table>
				</section>
				<section class="intro"></section>
			</div>
			<div class="actions">
				<a href="">Read Item Info</a>
				<a href="">Add Item to Hero</a>
			</div>					
		</header>
		<section class="items">
			<div class="lineup">
				<?php include_partial('main/items', array('items' => $items))?>
				<?/*php foreach($items as $item):?>
				<ul class="protectorate">
					<li>
						<a href="">
							<img src="" alt="" />
							<p><?//php echo $item->getName()?></p>
						</a>								
					</li>
				</ul>
				<?php endforeach;*/?>
				<!-- <ul class="arcanesanctum">
					<li>
						<a href="">
							<img src="" alt="" />
							<p>Item Name</p>
						</a>								
					</li>
				</ul>
				<ul class="supportivevestments">
					<li>
						<a href="">
							<img src="" alt="" />
							<p>Item Name</p>
						</a>								
					</li>
				</ul> -->
			
			</div>
		</section>
	</section>
</aside>
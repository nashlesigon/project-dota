<!-- Profile Section -->
<div class="profile">
	<!-- Elements -->
	<section class="elements">
		<section class="hero clearfix">
			<span class="photo">
				<img src="/images/icon-big.gif" alt="" />
			</span>
			<div class="details">
				<h2>Admiral</h2>
				<p class="nickname">Kunkka</p>
				<p>Sentinel</p>
				<div class="level">
					<p>Hero Level</p>
					<select name="" id="heroLevel">
						<?php for($i=1;$i<=$maxLevel=25;$i++):?>
							<option value='<?php echo $i?>'><?php echo $i?></option>
						<?php endfor;?>
					</select>
				</div>

			</div>
			<a class="action" href="">Change hero</a>
		</section>
		<section class="items">
			<h3>Items</h3>
			<ul class="clearfix">
				<li class="clearfix">
					<a class="remove" href="">Remove</a>
					<img src="/images/item01.jpg" alt="" />
					<div class="details">
						<a class="item-name" href="">Perseverance</a>
						<p>Gateway Relics</p>
						<p class="price">1750</p>
					</div>
				</li>
				<li class="clearfix last">
					<a class="remove" href="">Remove</a>
					<img src="/images/item02.jpg" alt="" />
					<div class="details">
						<a class="item-name" href="">Vladimir's Offering</a>
						<p>Supportive Vestments</p>
						<p class="price">2050</p>
					</div>
				</li>
				<li class="clearfix">
					<a class="remove" href="">Remove</a>
					<img src="/images/item03.jpg" alt="" />
					<div class="details">
						<a class="item-name" href="">Aghanim's Scepter</a>
						<p>Arcane Sanctum</p>
						<p class="price">4200</p>
					</div>
				</li>
				<li class="clearfix last">
					<a class="remove" href="">Remove</a>
					<img src="/images/item04.jpg" alt="" />
					<div class="details">
						<a class="item-name" href="">Black King Bar</a>
						<p>Protectorate</p>
						<p class="price">3900</p>
					</div>
				</li>
				<li class="clearfix">
					<a class="remove" href="">Remove</a>
					<img src="/images/item05.jpg" alt="" />
					<div class="details">
						<a class="item-name" href="">Maelstrom</a>
						<p>Enchanted Artifacts</p>
						<p class="price">2700</p>
					</div>
				</li>
				<li class="clearfix last">
					<a class="add-item" href="">+ Add item</a>
					<!-- No item yet on slot
					<img src="/images/item06.jpg" alt="" />
					<div class="details">
						<a class="item-name" href="">Robe of Magi</a>
						<p>Sena the Accesorizer</p>
						<p class="price">450</p>
					</div>
					-->
				</li>
			</ul>
		</section>
	</section>

	<!-- Actions -->
	<section class="actions">
		<section class="level-slider"></section>
		<a href="javascript:void(0)" class="compute" onClick="compute()">Compute</a>
	</section>

	<!-- Stats -->
	<table id="stat_table">

  </table>
</div>

<!-- Selection Section -->


<?php include_component('main', 'selectionSection', array())?>

<script>
  compute = function(){
    $.getJSON('main/compute',{heroId : $('#heroId').val(), heroLevel : $('#heroLevel').val()}, function(json){
      $('#stat_table').empty().html(json.html).show();
    });
  }
</script>

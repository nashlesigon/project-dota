$(document).ready(function(){
	$("a#sentinel_heroes_link").click(function(){
		$("div#sentinel_heroes_div").show();
		$("div#scourge_heroes_div").hide();
	});
	
	$("a#scourge_heroes_link").click(function(){
		$("div#sentinel_heroes_div").hide();
		$("div#scourge_heroes_div").show();
	});
	
	
	$("a[name=view_hero_details]").each(function(){
		$(this).click(function(){
			// alert($('img', this).attr('src'));
			var img = $('img', this).attr('src');
			var name = $('p[name=hero_name]', this).text();
			var legend = $('p[name=hero_legend]', this).text();
			var affiliation = $(this).parents('div:first').attr('name');
			var skills = $('span[name=skills]', this).clone();
			// alert(affiliation);
			$("img#details_hero_image").attr('src', img);
			$("#details_hero_legend").text(legend);
			$("#details_hero_name").text(name);
			$("#details_hero_affiliation").text('Affiliation - '+affiliation);
			
			if($("#details_hero_abilities span[name=skills]").length){
				$("#details_hero_abilities span[name=skills]").remove();
			}
			
			$("#details_hero_abilities").append(skills);
			$("#details_hero_abilities span[name=skills]").show();
		});
	});
	
	$("a[name=view_item_details]").each(function(){
		$(this).click(function(){
			var img = $('img', this).attr('src');
			var name = $('p[name=item_name]', this).text();
			var price = $('p[name=item_price]', this).text();
			var store = $('p[name=item_store]', this).text();
			var stat = $('table[name=item_stat]', this).clone();
			
			$("#details_item_image").attr('src', img);
			$("#details_item_name").text(name);
			$("#details_item_price").text(price);
			$("#details_item_store").text(store);
			
			
			if($("#details_item_stats table[name=item_stat]").length){
				$("#details_item_stats table[name=item_stat]").remove();
			}
			
			$("#details_item_stats").append(stat);
			
		});
	});
});
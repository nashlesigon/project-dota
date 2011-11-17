<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="google-site-verification" content="iTXUFvhYB9A7C2EG9xiVCXVfcdMAzavkFRe0DnNB7tQ" />
<?php include_title() ?>
<?php include_metas() ?>

<?php include_stylesheets() ?>


</head>

<body>              
	<!-- Header -->
	<?php require_once("_header.php"); ?>
	
	<div id="main" role="main">
		<?php echo $sf_content ?>
	</div>
	
	<!-- Footer -->
	<?php require_once("_footer.php"); ?>
	
	<script>
		  TypekitConfig = {
		    kitId: 'yup8ohv'
		  };
		  (function() {
		    var tk = document.createElement('script');
		    tk.src = '//use.typekit.com/' + TypekitConfig.kitId + '.js';
		    tk.type = 'text/javascript';
		    tk.async = 'true';
		    tk.onload = tk.onreadystatechange = function() {
		      var rs = this.readyState;
		      if (rs && rs != 'complete' && rs != 'loaded') return;
		      try { Typekit.load(TypekitConfig); } catch (e) {}
		    };
		    var s = document.getElementsByTagName('script')[0];
		    s.parentNode.insertBefore(tk, s);
		  })();		  		  		  
	</script>
	

	
	<?php include_javascripts() ?>
		
</body>
</html>
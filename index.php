<!DOCTYPE html>
<html lang="en">
<head>
<!-- Include HTML meta tags -->
<?php include(THEME_DIR_PHP.'head.php') ?>
</head>
<body>

<header class="nav">
	<span>
		<a href="<?php echo $Site->url() ?>"><?php echo $Site->title() ?></a>
		<span class="slogan"><?php echo $Site->slogan() ?></span>
	</span>
</header>

<main>
<div class="container">
	<div class="row">
		<div class="col content">
			<?php
			    if( ($Url->whereAmI()=='home') || ($Url->whereAmI()=='tag') || ($Url->whereAmI()=='blog') )
			    {
			        include(THEME_DIR_PHP.'home.php');
			    }
			    elseif($Url->whereAmI()=='post')
			    {
			        include(THEME_DIR_PHP.'post.php');
			    }
			    elseif($Url->whereAmI()=='page')
			    {
			        include(THEME_DIR_PHP.'page.php');
			    }
			?>
		</div>

		<!-- Sidebar -->
		<div class="col sidebar">
		<?php Theme::plugins('siteSidebar') ?>		
		</div>
	</div>
</div>
</main>


<footer>
	<?php include(THEME_DIR_PHP.'footer.php') ?>
</footer>


<!-- Add Scripts here (if required) -->
	

<!-- Plugins Site Body End -->
<?php Theme::plugins('siteBodyEnd') ?>

</body>
</html>
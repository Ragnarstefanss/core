<!-- Show each page -->
<?php foreach ($pages as $page): ?>

<article class="post">

	<!-- Show plugins, Hook: Page Begin -->
	<?php Theme::plugins('pageBegin') ?>

	<!-- Header -->
	<header>
		<div class="title">
			<h1><a href="<?php echo $page->permalink() ?>"><?php echo $page->title() ?></a></h1>
			<p><?php echo $page->description() ?></p>
		</div>
		<div class="meta">
	        <?php
	            // Get the user who created the page.
	            $User = $page->user();

	            // Default author is the username.
	            $author = $User->username();

	            // If the user has entered the first name or last name, it would be set as author.
				if( Text::isNotEmpty($User->firstName()) || Text::isNotEmpty($User->lastName()) ) {
					$author = $User->firstName().' '.$User->lastName();
				}
			?>

			<span class="timestamp">Posted <time class="published" datetime="2016-12-01"><?php echo $page->date() ?></time> by <?php echo $author ?></span>
		</div>
	</header>

	<!-- Cover Image -->
	<?php
		if($page->coverImage()) {
			echo '<a href="'.$page->permalink().'" class="image featured"><img src="'.$page->coverImage().'" alt="Cover Image"></a>';
		}
	?>

	<!-- Page's content, the first part if has pagebrake -->
	<?php echo $page->content(false) ?>

	<!-- Page's footer -->
	<footer>
		<!-- Read more button -->
	    <?php if($page->readMore()) {
			echo "<a href=" . $page->permalink() . " class='button read-more' title='read-more'>" .$Language->get('Read more'). "...</a>";
		}
		?>

		<!-- Page's tags -->
		<div class="tags">TAGS:
			<span class="tag-list">
				<?php
					$tags = $page->tags(true);
					if(count($tags) == 0){
						echo "No tags found.";
					}

					else{
						$listOfTags = '';
						foreach($tags as $tagKey=>$tagName) {
							$listOfTags .= '<a href="'.HTML_PATH_ROOT.$Url->filters('tag').'/'.$tagKey.'">'.$tagName.'</a>, ';
						}
						echo substr($listOfTags, 0, -2) . '.'; // Remove final ", '" and add "." after the last tag.
					}
				?>
			</span>
		</div>

		<!-- A horizontal rule after each page -->
		<hr class="end-post-hr">
	</footer>

	<!-- Plugins Page End -->
	<?php Theme::plugins('pageEnd') ?>

</article>

<?php endforeach; ?>

<!-- Pagination -->
<ul class="actions pagination">
<?php
	if( Paginator::get('showPrev') ) {
		echo '<li><a href="'.Paginator::firstPageUrl().'" class="button" title="first-page">'.$Language->get('&#8676;').'</a></li>';
		echo '<li><a href="'.Paginator::prevPageUrl().'" class="button previous" title="previous-page">'.$Language->get('« Newer posts').'</a></li>';
	}

	if( Paginator::get('showNext') ) {
		echo '<li><a href="'.Paginator::nextPageUrl().'" class="button next" title="next-page">'.$Language->get('Older posts »').'</a></li>';
		echo '<li><a href="'.Paginator::lastPageUrl().'" class="button" title="last-page">'.$Language->get('&#8677;').'</a></li>';
	}
?>
</ul>

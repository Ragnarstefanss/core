<?php
	Theme::charset('utf-8');
	Theme::viewport('width=device-width, initial-scale=1');

	Theme::title();
	Theme::description();

	Theme::favicon('favicon.png');
?>

<link rel="stylesheet" href="<?php echo HTML_PATH_THEME ?>assets/css/style.css">
<!-- Syntax Highlighting - Highlight.js v9.11 (Automatic detection)
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
-->
<!-- Disable referrer -->
<meta name="referrer" content="no-referrer" />

<?php

// Load plugins, hook: Site head
Theme::plugins('siteHead');

?>

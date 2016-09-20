<!DOCTYPE html>
<?php include "head.inc.php" ?>
<body class="content-page">
<div class="notification">Dismissible in-page notification<span class="close">x</span></div>
<div id="body" class="skills">
	<?php include "nav.inc.php" ?>
	<div class="hero">
		<div class="block">
			<h1>Hero Header</h1>

			<p>Hero text</p>
		</div>
	</div>
	<div class="container t-gutter-x-lg b-gutter-lg">
		<div class="row">
			<div class="col-md-12">
				<h2>General Layout Rules</h2>
				<p>All body tags should have a class of "content-page".</p>
				<p>h4 and h5 tags have no definitions on content pages.</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-xs-12">
						<h1>h1.</h1>
						<h2>h2.</h2>
						<h3>h3.</h3>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<h2 class="t-gutter-lg">Paragraph Styles</h2>
						<p class="subtitle">Subtitle</p>
						<p class="t-gutter-lg b-gutter-lg">Paragraph with <span class="blue">blue text</span> and a large top and bottom gutter.</p>
						<p class="t-gutter-md b-gutter-md">Paragraph with <span class="black">black text</span> and a medium top and bottom gutter.</p>
						<p class="t-gutter-sm b-gutter-sm">Paragraph with a small top and bottom gutter.</p>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<h2 class="t-gutter-lg">Button Styles</h2>
						<p><button class="btn btn-primary">Primary Button</button></p>
						<p><button class="btn btn-default">Default Button</button></p>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<h2 class="t-gutter-lg">List Styles</h2>
						<h3>Unstyled</h3>
						<ul>
							<li>This is part of a list</li>
							<li>And so is this</li>
							<li>And also this</li>
						</ul>

						<h3>Bulleted</h3>
						<ul class="bulleted">
							<li>List item #1</li>
							<li>List item #2</li>
							<li>Another list item</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="highlight col-xs-12">
					<h2>Highlight Section</h2>
					<p>Highlight section text.</p>
					<button class="btn btn-primary">Highlight Section Button</button>
				</div>
				<div class="col-xs-12">
					<p class="highlight-quote t-gutter-xx-lg">Highlight Quote with an XXL top gutter.</p>
					<p class="highlight-quote quote-credit">-By Llamas</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "footer.inc.php" ?>
<?php include "script.inc.php" ?>
</body>
</html>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8" />
	<link href="mybooks.css" rel="stylesheet" />
	<title>MyBooks - Home</title>
</head>
<body>
	<header>
		<h1>MyBooks</h1>
	</header>
	<?php
	foreach ($books as $book): ?>
	<article>
		<h2><?php echo $book['book_title']; ?></h2>
		<p><?php echo $book['book_summary']; ?></p>
	</article>

	<?php endforeach ?>
	<footer class="footer">
		<span class="bold">MyBooks</span> est construit avec PHP, Silex, Twig et Bootstrap.
	</footer>
</body>
</html>
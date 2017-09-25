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
	{%for book in books %}
	<article>
		<h2>{{ book.title }}</h2>
		<p>{{ book.summary }}</p>
	</article>

	{% endfor %}
	<footer class="footer">
		<em>MyBooks</em> est construit avec PHP, Silex, Twig et Bootstrap.
	</footer>
</body>
</html>
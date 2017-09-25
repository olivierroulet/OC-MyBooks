<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <link href="ocmybooks.css" rel="stylesheet" />
    <title>MyBooks - Home</title>
</head>
<body>
    <header>
        <h1>MyBooks</h1>
    </header>
    <?php foreach ($books as $book): ?>
    <article>
        <h2><?php echo $book->getTitle() ?></h2>
        <p><?php echo $book->getSummary() ?></p>
    </article>
    <?php endforeach; ?>
    <footer class="footer">
        <em>MyBooks</em> est construit avec PHP, Silex, Twig et Bootstrap.
    </footer>
</body>
</html>

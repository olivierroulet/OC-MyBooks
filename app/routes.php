<?php

// Home page
$app->get('/', function () use ($app) {
    $books = $app['dao.book']->findAll();
    return $app['twig']->render('index.html.twig', array('books' => $books));
})->bind('home');

// One book page
$app->get('/book/{id}', function ($id) use ($app) {
     $book = $app['dao.book']->find($id);
     $authid = $app['dao.book']->findAuthor($id);
     $author = $app['dao.author']->find($authid);
     return $app['twig']->render('book.html.twig', array('book' => $book, 'author' => $author));
})->bind('book');  
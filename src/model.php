<?php 

// Return all books
function getBooks() {
	$bdd = new PDO('mysql:host=localhost;dbname=mybooks;charset=utf8', 'mybooks_user', 'secret');
	$books = $bdd->PREPARE('SELECT * FROM book ORDER BY book_id DESC');
	$books->execute();
	return $books;
}
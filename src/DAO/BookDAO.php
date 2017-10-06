<?php

namespace OCMybooks\DAO;

use OCMybooks\Domain\Book;

class BookDAO extends DAO
{
    /**
     * @var \OCMybooks\DAO\AuthorDAO
     */
    private $authorDAO;

    public function setAuthorDAO(AuthorDAO $authorDAO) {
        $this->authorDAO = $authorDAO;
    }

    /**
     * Return a list of all books, sorted by date (most recent first).
     *
     * @return array A list of all books.
     */
    public function findAll() {
        $sql = "select * from book order by book_id desc";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $books = array();
        foreach ($result as $row) {
            $bookId = $row['book_id'];
            $books[$bookId] = $this->buildDomainObject($row);
        }
        return $books;
    }

/**
     * Returns a book matching the supplied id.
     *
     * @param integer $id The book id.
     *
     * @return \OCMybooks\Domain\Book|throws an exception if no matching book is found
     */
    public function find($id) {
        $sql = "select * from book where book_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No book matching id " . $id);
    }

    /**
     * Creates an Book object based on a DB row.
     *
     * @param array $row The DB row containing Book data.
     * @return \OCMybooks\Domain\Book
     */
    protected function buildDomainObject($row) {
        $book = new Book();
        $book->setId($row['book_id']);
        $book->setTitle($row['book_title']);
        $book->setIsbn($row['book_isbn']);
        $book->setSummary($row['book_summary']);
        
        if (array_key_exists('auth_id', $row)) {
            // Find and set the associated author
            $authorId = $row['auth_id'];
            $author = $this->authorDAO->find($authorId);
            $book->setAuthor($author);
        }
        
        return $book;
    }
        
}
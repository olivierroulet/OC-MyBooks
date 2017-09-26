<?php

namespace OCMybooks\DAO;

use OCMybooks\Domain\Book;
use OCMybooks\Domain\Author;

class BookDAO extends DAO
{

    /**
     * Return a list of all books, sorted by date (most recent first).
     *
     * @return array A list of all books.
     */
    public function findAll() {
        $sql = "SELECT `book_id`,`book_title`, `book_isbn`, `book_summary`, `auth_first_name`, `auth_last_name` FROM book INNER JOIN author ON book.auth_id = author.auth_id ORDER BY book_id DESC";
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
     * @param integer $id
     *
     * @return \OCMybooks\Domain\Book|throws an exception if no matching book is found
     */
    public function find($id) {
        $sql = "SELECT `book_id`,`book_title`, `book_isbn`, `book_summary`, `auth_first_name`, `auth_last_name` FROM book INNER JOIN author ON book.auth_id = author.auth_id where book_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No article matching id " . $id);
    }

        /**
     * Creates an Book object based on a DB row.
     *
     * @param array $row The DB row containing Book data.
     * @return \OCMybooks\Domain\Book
     */
    protected function buildDomainObject(array $row) {
        $book = new Book();
        $author = new Author();
        $book->setId($row['book_id']);
        $book->setTitle($row['book_title']);
        $book->setIsbn($row['book_isbn']);
        $book->setSummary($row['book_summary']);
        return $book;
    }
}


// SELECT `book_id`,`book_title`, `book_isbn`, `book_summary`, `auth_first_name`, `auth_last_name` FROM book INNER JOIN author ON book.auth_id = author.auth_id
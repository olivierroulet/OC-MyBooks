<?php

namespace OCMybooks\DAO;

use OCMybooks\Domain\Author;

class AuthorDAO extends DAO 
{
    /**
     * @var \OCMybooks\DAO\BookDAO
     */
    private $bookDAO;

    public function setBookDAO(BookDAO $bookDAO) {
        $this->bookDAO = $bookDAO;
    }

    /**
     * Return author's firstname, author's lastname and author's id for a book.
     *
     * @param integer $bookId The book id.
     *
     * @return array firstname, lastname, id for the book.
     */
    public function findAllByBook($bookId) {
        // The associated book is retrieved only once
        $book = $this->bookDAO->find($bookId);

        // book_id is not selected by the SQL query
        // The book won't be retrieved during domain objet construction
        $sql = "select auth_id, auth_first_name, auth_last_name, from author where auth_id=?";
        $result = $this->getDb()->fetchAll($sql, array($bookId));

        // Convert query result to an array of domain objects
        $comments = array();
        debug $result;
        die;
        foreach ($result as $row) {
            $comId = $row['com_id'];
            $comment = $this->buildDomainObject($row);
            // The associated article is defined for the constructed comment
            $comment->setArticle($article);
            $comments[$comId] = $comment;
        }
        return $comments;
    }

    /**
     * Creates an Comment object based on a DB row.
     *
     * @param array $row The DB row containing Comment data.
     * @return \MicroCMS\Domain\Comment
     */
    protected function buildDomainObject(array $row) {
        $comment = new Comment();
        $comment->setId($row['com_id']);
        $comment->setContent($row['com_content']);
        $comment->setAuthor($row['com_author']);

        if (array_key_exists('art_id', $row)) {
            // Find and set the associated article
            $articleId = $row['art_id'];
            $article = $this->articleDAO->find($articleId);
            $comment->setArticle($article);
        }
        
        return $comment;
    }
}
<?php

namespace OCMybooks\DAO;

use OCMybooks\Domain\Author;

class AuthorDAO extends DAO 
{
        /**
     * Returns a author matching the supplied id.
     *
     * @param integer $id
     *
     * @return \OCMybooks\Domain\Author|throws an exception if no matching book is found
     */
    public function find($id) {
        $sql = "SELECT * FROM author WHERE auth_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));
        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No author matching id " . $id);
    }

        /**
     * Creates an Author object based on a DB row.
     *
     * @param array $row The DB row containing Book data.
     * @return \OCMybooks\Domain\Book
     */
    protected function buildDomainObject(array $row) {
        $author = new Author();
        $author->setId($row['auth_id']);
        $author->setFirstname($row['auth_first_name']);
        $author->setLastname($row['auth_last_name']);
        return $author;
    }
}

<?php

namespace GSB\DAO;

use GSB\Domain\Visitor;

/** Security**/
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;


class VisitorDAO extends DAO implements UserProviderInterface
{
    /**
     * Returns a user matching the supplied id.
     *
     * @param integer $id
     *
     * @return GSB\Domain\Visitor|throws an exception if no matching user is found
     */
    public function find($id) {
        $sql = "select * from visitor where visitor_id = ?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No user matching id " . $id);
    }
    
    /**
     * {@inheritDoc}
     */
    public function loadUserByUsername($username)
    {
        $sql = "select * from visitor where user_name=?";
        $row = $this->getDb()->fetchAssoc($sql, array($username));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
    }
    
    /**
     * {@inheritDoc}
     */
    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
        }
        return $this->loadUserByUsername($user->getUsername());
    }
    
    /**
     * {@inheritDoc}
     */
    public function supportsClass($class)
    {
        return 'GSB\Domain\Visitor' === $class;
    }

    
    /**
     * Creates a Visitor instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\Visitor
     */
    protected function buildDomainObject($row) {
        $visitor = new Visitor();
        $visitor->setId($row['visitor_id']);
        $visitor->setSector($row['sector']);
        $visitor->setLaboratoryId($row['laboratory_id']);
        $visitor->setLastName($row['visitor_last_name']);
        $visitor->setFirstName($row['visitor_first_name']);
        $visitor->setAddress($row['visitor_address']);
        $visitor->setZipCode($row['visitor_zip_code']);
        $visitor->setCity($row['visitor_city']);
        $visitor->setDateHiring($row['date_hiring']);
        $visitor->setUserName($row['visitor_username']);
        $visitor->setPassword($row['visitor_password']);
        $visitor->setSalt($row['salt']);
        $visitor->setRole($row['role']);
        $visitor->setType($row['visitor_type']);
        return $visitor;
    }

}
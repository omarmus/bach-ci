<?php


/**
 * Base class that represents a query for the 'sys_users' table.
 *
 * 
 *
 * @method SysUsersQuery orderByIdUser($order = Criteria::ASC) Order by the id_user column
 * @method SysUsersQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method SysUsersQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method SysUsersQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method SysUsersQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method SysUsersQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method SysUsersQuery orderByState($order = Criteria::ASC) Order by the state column
 * @method SysUsersQuery orderByIdRol($order = Criteria::ASC) Order by the id_rol column
 * @method SysUsersQuery orderByIdPhoto($order = Criteria::ASC) Order by the id_photo column
 * @method SysUsersQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method SysUsersQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method SysUsersQuery orderByModified($order = Criteria::ASC) Order by the modified column
 * @method SysUsersQuery orderByLangCode($order = Criteria::ASC) Order by the lang_code column
 * @method SysUsersQuery orderByMobile($order = Criteria::ASC) Order by the mobile column
 *
 * @method SysUsersQuery groupByIdUser() Group by the id_user column
 * @method SysUsersQuery groupByUsername() Group by the username column
 * @method SysUsersQuery groupByPassword() Group by the password column
 * @method SysUsersQuery groupByEmail() Group by the email column
 * @method SysUsersQuery groupByFirstName() Group by the first_name column
 * @method SysUsersQuery groupByLastName() Group by the last_name column
 * @method SysUsersQuery groupByState() Group by the state column
 * @method SysUsersQuery groupByIdRol() Group by the id_rol column
 * @method SysUsersQuery groupByIdPhoto() Group by the id_photo column
 * @method SysUsersQuery groupByCreated() Group by the created column
 * @method SysUsersQuery groupByPhone() Group by the phone column
 * @method SysUsersQuery groupByModified() Group by the modified column
 * @method SysUsersQuery groupByLangCode() Group by the lang_code column
 * @method SysUsersQuery groupByMobile() Group by the mobile column
 *
 * @method SysUsersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SysUsersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SysUsersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SysUsersQuery leftJoinSysRoles($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysRoles relation
 * @method SysUsersQuery rightJoinSysRoles($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysRoles relation
 * @method SysUsersQuery innerJoinSysRoles($relationAlias = null) Adds a INNER JOIN clause to the query using the SysRoles relation
 *
 * @method SysUsersQuery leftJoinSysFiles($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysFiles relation
 * @method SysUsersQuery rightJoinSysFiles($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysFiles relation
 * @method SysUsersQuery innerJoinSysFiles($relationAlias = null) Adds a INNER JOIN clause to the query using the SysFiles relation
 *
 * @method SysUsersQuery leftJoinSysChatsRelatedByIdSender($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysChatsRelatedByIdSender relation
 * @method SysUsersQuery rightJoinSysChatsRelatedByIdSender($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysChatsRelatedByIdSender relation
 * @method SysUsersQuery innerJoinSysChatsRelatedByIdSender($relationAlias = null) Adds a INNER JOIN clause to the query using the SysChatsRelatedByIdSender relation
 *
 * @method SysUsersQuery leftJoinSysChatsRelatedByIdReceiver($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysChatsRelatedByIdReceiver relation
 * @method SysUsersQuery rightJoinSysChatsRelatedByIdReceiver($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysChatsRelatedByIdReceiver relation
 * @method SysUsersQuery innerJoinSysChatsRelatedByIdReceiver($relationAlias = null) Adds a INNER JOIN clause to the query using the SysChatsRelatedByIdReceiver relation
 *
 * @method SysUsersQuery leftJoinSysNotificationsRelatedByIdSender($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysNotificationsRelatedByIdSender relation
 * @method SysUsersQuery rightJoinSysNotificationsRelatedByIdSender($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysNotificationsRelatedByIdSender relation
 * @method SysUsersQuery innerJoinSysNotificationsRelatedByIdSender($relationAlias = null) Adds a INNER JOIN clause to the query using the SysNotificationsRelatedByIdSender relation
 *
 * @method SysUsersQuery leftJoinSysNotificationsRelatedByIdReceiver($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysNotificationsRelatedByIdReceiver relation
 * @method SysUsersQuery rightJoinSysNotificationsRelatedByIdReceiver($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysNotificationsRelatedByIdReceiver relation
 * @method SysUsersQuery innerJoinSysNotificationsRelatedByIdReceiver($relationAlias = null) Adds a INNER JOIN clause to the query using the SysNotificationsRelatedByIdReceiver relation
 *
 * @method SysUsers findOne(PropelPDO $con = null) Return the first SysUsers matching the query
 * @method SysUsers findOneOrCreate(PropelPDO $con = null) Return the first SysUsers matching the query, or a new SysUsers object populated from the query conditions when no match is found
 *
 * @method SysUsers findOneByUsername(string $username) Return the first SysUsers filtered by the username column
 * @method SysUsers findOneByPassword(string $password) Return the first SysUsers filtered by the password column
 * @method SysUsers findOneByEmail(string $email) Return the first SysUsers filtered by the email column
 * @method SysUsers findOneByFirstName(string $first_name) Return the first SysUsers filtered by the first_name column
 * @method SysUsers findOneByLastName(string $last_name) Return the first SysUsers filtered by the last_name column
 * @method SysUsers findOneByState(string $state) Return the first SysUsers filtered by the state column
 * @method SysUsers findOneByIdRol(int $id_rol) Return the first SysUsers filtered by the id_rol column
 * @method SysUsers findOneByIdPhoto(int $id_photo) Return the first SysUsers filtered by the id_photo column
 * @method SysUsers findOneByCreated(string $created) Return the first SysUsers filtered by the created column
 * @method SysUsers findOneByPhone(string $phone) Return the first SysUsers filtered by the phone column
 * @method SysUsers findOneByModified(string $modified) Return the first SysUsers filtered by the modified column
 * @method SysUsers findOneByLangCode(string $lang_code) Return the first SysUsers filtered by the lang_code column
 * @method SysUsers findOneByMobile(string $mobile) Return the first SysUsers filtered by the mobile column
 *
 * @method array findByIdUser(int $id_user) Return SysUsers objects filtered by the id_user column
 * @method array findByUsername(string $username) Return SysUsers objects filtered by the username column
 * @method array findByPassword(string $password) Return SysUsers objects filtered by the password column
 * @method array findByEmail(string $email) Return SysUsers objects filtered by the email column
 * @method array findByFirstName(string $first_name) Return SysUsers objects filtered by the first_name column
 * @method array findByLastName(string $last_name) Return SysUsers objects filtered by the last_name column
 * @method array findByState(string $state) Return SysUsers objects filtered by the state column
 * @method array findByIdRol(int $id_rol) Return SysUsers objects filtered by the id_rol column
 * @method array findByIdPhoto(int $id_photo) Return SysUsers objects filtered by the id_photo column
 * @method array findByCreated(string $created) Return SysUsers objects filtered by the created column
 * @method array findByPhone(string $phone) Return SysUsers objects filtered by the phone column
 * @method array findByModified(string $modified) Return SysUsers objects filtered by the modified column
 * @method array findByLangCode(string $lang_code) Return SysUsers objects filtered by the lang_code column
 * @method array findByMobile(string $mobile) Return SysUsers objects filtered by the mobile column
 *
 * @package    propel.generator.bach.om
 */
abstract class BaseSysUsersQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSysUsersQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'bach';
        }
        if (null === $modelName) {
            $modelName = 'SysUsers';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SysUsersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SysUsersQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SysUsersQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SysUsersQuery) {
            return $criteria;
        }
        $query = new SysUsersQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query 
     * @param     PropelPDO $con an optional connection object
     *
     * @return   SysUsers|SysUsers[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SysUsersPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 SysUsers A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdUser($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 SysUsers A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_user`, `username`, `password`, `email`, `first_name`, `last_name`, `state`, `id_rol`, `id_photo`, `created`, `phone`, `modified`, `lang_code`, `mobile` FROM `sys_users` WHERE `id_user` = :p0';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new SysUsers();
            $obj->hydrate($row);
            SysUsersPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return SysUsers|SysUsers[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|SysUsers[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SysUsersPeer::ID_USER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SysUsersPeer::ID_USER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_user column
     *
     * Example usage:
     * <code>
     * $query->filterByIdUser(1234); // WHERE id_user = 1234
     * $query->filterByIdUser(array(12, 34)); // WHERE id_user IN (12, 34)
     * $query->filterByIdUser(array('min' => 12)); // WHERE id_user >= 12
     * $query->filterByIdUser(array('max' => 12)); // WHERE id_user <= 12
     * </code>
     *
     * @param     mixed $idUser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByIdUser($idUser = null, $comparison = null)
    {
        if (is_array($idUser)) {
            $useMinMax = false;
            if (isset($idUser['min'])) {
                $this->addUsingAlias(SysUsersPeer::ID_USER, $idUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUser['max'])) {
                $this->addUsingAlias(SysUsersPeer::ID_USER, $idUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::ID_USER, $idUser, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $username)) {
                $username = str_replace('*', '%', $username);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
     * $query->filterByFirstName('%fooValue%'); // WHERE first_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstName)) {
                $firstName = str_replace('*', '%', $firstName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::FIRST_NAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
     * $query->filterByLastName('%fooValue%'); // WHERE last_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastName)) {
                $lastName = str_replace('*', '%', $lastName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the state column
     *
     * Example usage:
     * <code>
     * $query->filterByState('fooValue');   // WHERE state = 'fooValue'
     * $query->filterByState('%fooValue%'); // WHERE state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $state The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByState($state = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($state)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $state)) {
                $state = str_replace('*', '%', $state);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::STATE, $state, $comparison);
    }

    /**
     * Filter the query on the id_rol column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRol(1234); // WHERE id_rol = 1234
     * $query->filterByIdRol(array(12, 34)); // WHERE id_rol IN (12, 34)
     * $query->filterByIdRol(array('min' => 12)); // WHERE id_rol >= 12
     * $query->filterByIdRol(array('max' => 12)); // WHERE id_rol <= 12
     * </code>
     *
     * @see       filterBySysRoles()
     *
     * @param     mixed $idRol The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByIdRol($idRol = null, $comparison = null)
    {
        if (is_array($idRol)) {
            $useMinMax = false;
            if (isset($idRol['min'])) {
                $this->addUsingAlias(SysUsersPeer::ID_ROL, $idRol['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idRol['max'])) {
                $this->addUsingAlias(SysUsersPeer::ID_ROL, $idRol['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::ID_ROL, $idRol, $comparison);
    }

    /**
     * Filter the query on the id_photo column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPhoto(1234); // WHERE id_photo = 1234
     * $query->filterByIdPhoto(array(12, 34)); // WHERE id_photo IN (12, 34)
     * $query->filterByIdPhoto(array('min' => 12)); // WHERE id_photo >= 12
     * $query->filterByIdPhoto(array('max' => 12)); // WHERE id_photo <= 12
     * </code>
     *
     * @see       filterBySysFiles()
     *
     * @param     mixed $idPhoto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByIdPhoto($idPhoto = null, $comparison = null)
    {
        if (is_array($idPhoto)) {
            $useMinMax = false;
            if (isset($idPhoto['min'])) {
                $this->addUsingAlias(SysUsersPeer::ID_PHOTO, $idPhoto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPhoto['max'])) {
                $this->addUsingAlias(SysUsersPeer::ID_PHOTO, $idPhoto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::ID_PHOTO, $idPhoto, $comparison);
    }

    /**
     * Filter the query on the created column
     *
     * Example usage:
     * <code>
     * $query->filterByCreated('2011-03-14'); // WHERE created = '2011-03-14'
     * $query->filterByCreated('now'); // WHERE created = '2011-03-14'
     * $query->filterByCreated(array('max' => 'yesterday')); // WHERE created > '2011-03-13'
     * </code>
     *
     * @param     mixed $created The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(SysUsersPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(SysUsersPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::CREATED, $created, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%'); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $phone)) {
                $phone = str_replace('*', '%', $phone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the modified column
     *
     * Example usage:
     * <code>
     * $query->filterByModified('2011-03-14'); // WHERE modified = '2011-03-14'
     * $query->filterByModified('now'); // WHERE modified = '2011-03-14'
     * $query->filterByModified(array('max' => 'yesterday')); // WHERE modified > '2011-03-13'
     * </code>
     *
     * @param     mixed $modified The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(SysUsersPeer::MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(SysUsersPeer::MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::MODIFIED, $modified, $comparison);
    }

    /**
     * Filter the query on the lang_code column
     *
     * Example usage:
     * <code>
     * $query->filterByLangCode('fooValue');   // WHERE lang_code = 'fooValue'
     * $query->filterByLangCode('%fooValue%'); // WHERE lang_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $langCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByLangCode($langCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($langCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $langCode)) {
                $langCode = str_replace('*', '%', $langCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::LANG_CODE, $langCode, $comparison);
    }

    /**
     * Filter the query on the mobile column
     *
     * Example usage:
     * <code>
     * $query->filterByMobile('fooValue');   // WHERE mobile = 'fooValue'
     * $query->filterByMobile('%fooValue%'); // WHERE mobile LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mobile The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function filterByMobile($mobile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mobile)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mobile)) {
                $mobile = str_replace('*', '%', $mobile);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysUsersPeer::MOBILE, $mobile, $comparison);
    }

    /**
     * Filter the query by a related SysRoles object
     *
     * @param   SysRoles|PropelObjectCollection $sysRoles The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SysUsersQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysRoles($sysRoles, $comparison = null)
    {
        if ($sysRoles instanceof SysRoles) {
            return $this
                ->addUsingAlias(SysUsersPeer::ID_ROL, $sysRoles->getIdRol(), $comparison);
        } elseif ($sysRoles instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SysUsersPeer::ID_ROL, $sysRoles->toKeyValue('PrimaryKey', 'IdRol'), $comparison);
        } else {
            throw new PropelException('filterBySysRoles() only accepts arguments of type SysRoles or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SysRoles relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function joinSysRoles($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SysRoles');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SysRoles');
        }

        return $this;
    }

    /**
     * Use the SysRoles relation SysRoles object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SysRolesQuery A secondary query class using the current class as primary query
     */
    public function useSysRolesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSysRoles($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SysRoles', 'SysRolesQuery');
    }

    /**
     * Filter the query by a related SysFiles object
     *
     * @param   SysFiles|PropelObjectCollection $sysFiles The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SysUsersQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysFiles($sysFiles, $comparison = null)
    {
        if ($sysFiles instanceof SysFiles) {
            return $this
                ->addUsingAlias(SysUsersPeer::ID_PHOTO, $sysFiles->getIdFile(), $comparison);
        } elseif ($sysFiles instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SysUsersPeer::ID_PHOTO, $sysFiles->toKeyValue('PrimaryKey', 'IdFile'), $comparison);
        } else {
            throw new PropelException('filterBySysFiles() only accepts arguments of type SysFiles or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SysFiles relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function joinSysFiles($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SysFiles');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SysFiles');
        }

        return $this;
    }

    /**
     * Use the SysFiles relation SysFiles object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SysFilesQuery A secondary query class using the current class as primary query
     */
    public function useSysFilesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSysFiles($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SysFiles', 'SysFilesQuery');
    }

    /**
     * Filter the query by a related SysChats object
     *
     * @param   SysChats|PropelObjectCollection $sysChats  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SysUsersQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysChatsRelatedByIdSender($sysChats, $comparison = null)
    {
        if ($sysChats instanceof SysChats) {
            return $this
                ->addUsingAlias(SysUsersPeer::ID_USER, $sysChats->getIdSender(), $comparison);
        } elseif ($sysChats instanceof PropelObjectCollection) {
            return $this
                ->useSysChatsRelatedByIdSenderQuery()
                ->filterByPrimaryKeys($sysChats->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySysChatsRelatedByIdSender() only accepts arguments of type SysChats or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SysChatsRelatedByIdSender relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function joinSysChatsRelatedByIdSender($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SysChatsRelatedByIdSender');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SysChatsRelatedByIdSender');
        }

        return $this;
    }

    /**
     * Use the SysChatsRelatedByIdSender relation SysChats object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SysChatsQuery A secondary query class using the current class as primary query
     */
    public function useSysChatsRelatedByIdSenderQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSysChatsRelatedByIdSender($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SysChatsRelatedByIdSender', 'SysChatsQuery');
    }

    /**
     * Filter the query by a related SysChats object
     *
     * @param   SysChats|PropelObjectCollection $sysChats  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SysUsersQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysChatsRelatedByIdReceiver($sysChats, $comparison = null)
    {
        if ($sysChats instanceof SysChats) {
            return $this
                ->addUsingAlias(SysUsersPeer::ID_USER, $sysChats->getIdReceiver(), $comparison);
        } elseif ($sysChats instanceof PropelObjectCollection) {
            return $this
                ->useSysChatsRelatedByIdReceiverQuery()
                ->filterByPrimaryKeys($sysChats->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySysChatsRelatedByIdReceiver() only accepts arguments of type SysChats or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SysChatsRelatedByIdReceiver relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function joinSysChatsRelatedByIdReceiver($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SysChatsRelatedByIdReceiver');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SysChatsRelatedByIdReceiver');
        }

        return $this;
    }

    /**
     * Use the SysChatsRelatedByIdReceiver relation SysChats object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SysChatsQuery A secondary query class using the current class as primary query
     */
    public function useSysChatsRelatedByIdReceiverQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSysChatsRelatedByIdReceiver($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SysChatsRelatedByIdReceiver', 'SysChatsQuery');
    }

    /**
     * Filter the query by a related SysNotifications object
     *
     * @param   SysNotifications|PropelObjectCollection $sysNotifications  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SysUsersQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysNotificationsRelatedByIdSender($sysNotifications, $comparison = null)
    {
        if ($sysNotifications instanceof SysNotifications) {
            return $this
                ->addUsingAlias(SysUsersPeer::ID_USER, $sysNotifications->getIdSender(), $comparison);
        } elseif ($sysNotifications instanceof PropelObjectCollection) {
            return $this
                ->useSysNotificationsRelatedByIdSenderQuery()
                ->filterByPrimaryKeys($sysNotifications->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySysNotificationsRelatedByIdSender() only accepts arguments of type SysNotifications or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SysNotificationsRelatedByIdSender relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function joinSysNotificationsRelatedByIdSender($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SysNotificationsRelatedByIdSender');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SysNotificationsRelatedByIdSender');
        }

        return $this;
    }

    /**
     * Use the SysNotificationsRelatedByIdSender relation SysNotifications object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SysNotificationsQuery A secondary query class using the current class as primary query
     */
    public function useSysNotificationsRelatedByIdSenderQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSysNotificationsRelatedByIdSender($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SysNotificationsRelatedByIdSender', 'SysNotificationsQuery');
    }

    /**
     * Filter the query by a related SysNotifications object
     *
     * @param   SysNotifications|PropelObjectCollection $sysNotifications  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SysUsersQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysNotificationsRelatedByIdReceiver($sysNotifications, $comparison = null)
    {
        if ($sysNotifications instanceof SysNotifications) {
            return $this
                ->addUsingAlias(SysUsersPeer::ID_USER, $sysNotifications->getIdReceiver(), $comparison);
        } elseif ($sysNotifications instanceof PropelObjectCollection) {
            return $this
                ->useSysNotificationsRelatedByIdReceiverQuery()
                ->filterByPrimaryKeys($sysNotifications->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySysNotificationsRelatedByIdReceiver() only accepts arguments of type SysNotifications or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SysNotificationsRelatedByIdReceiver relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function joinSysNotificationsRelatedByIdReceiver($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SysNotificationsRelatedByIdReceiver');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SysNotificationsRelatedByIdReceiver');
        }

        return $this;
    }

    /**
     * Use the SysNotificationsRelatedByIdReceiver relation SysNotifications object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SysNotificationsQuery A secondary query class using the current class as primary query
     */
    public function useSysNotificationsRelatedByIdReceiverQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSysNotificationsRelatedByIdReceiver($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SysNotificationsRelatedByIdReceiver', 'SysNotificationsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SysUsers $sysUsers Object to remove from the list of results
     *
     * @return SysUsersQuery The current query, for fluid interface
     */
    public function prune($sysUsers = null)
    {
        if ($sysUsers) {
            $this->addUsingAlias(SysUsersPeer::ID_USER, $sysUsers->getIdUser(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}

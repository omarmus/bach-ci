<?php


/**
 * Base class that represents a query for the 'sys_notifications' table.
 *
 * 
 *
 * @method SysNotificationsQuery orderByIdNotification($order = Criteria::ASC) Order by the id_notification column
 * @method SysNotificationsQuery orderByIdSender($order = Criteria::ASC) Order by the id_sender column
 * @method SysNotificationsQuery orderByIdReceiver($order = Criteria::ASC) Order by the id_receiver column
 * @method SysNotificationsQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method SysNotificationsQuery orderByReference($order = Criteria::ASC) Order by the reference column
 * @method SysNotificationsQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method SysNotificationsQuery orderByState($order = Criteria::ASC) Order by the state column
 * @method SysNotificationsQuery orderByCreated($order = Criteria::ASC) Order by the created column
 *
 * @method SysNotificationsQuery groupByIdNotification() Group by the id_notification column
 * @method SysNotificationsQuery groupByIdSender() Group by the id_sender column
 * @method SysNotificationsQuery groupByIdReceiver() Group by the id_receiver column
 * @method SysNotificationsQuery groupByType() Group by the type column
 * @method SysNotificationsQuery groupByReference() Group by the reference column
 * @method SysNotificationsQuery groupByMessage() Group by the message column
 * @method SysNotificationsQuery groupByState() Group by the state column
 * @method SysNotificationsQuery groupByCreated() Group by the created column
 *
 * @method SysNotificationsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SysNotificationsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SysNotificationsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SysNotificationsQuery leftJoinSysUsersRelatedByIdSender($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysUsersRelatedByIdSender relation
 * @method SysNotificationsQuery rightJoinSysUsersRelatedByIdSender($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysUsersRelatedByIdSender relation
 * @method SysNotificationsQuery innerJoinSysUsersRelatedByIdSender($relationAlias = null) Adds a INNER JOIN clause to the query using the SysUsersRelatedByIdSender relation
 *
 * @method SysNotificationsQuery leftJoinSysUsersRelatedByIdReceiver($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysUsersRelatedByIdReceiver relation
 * @method SysNotificationsQuery rightJoinSysUsersRelatedByIdReceiver($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysUsersRelatedByIdReceiver relation
 * @method SysNotificationsQuery innerJoinSysUsersRelatedByIdReceiver($relationAlias = null) Adds a INNER JOIN clause to the query using the SysUsersRelatedByIdReceiver relation
 *
 * @method SysNotifications findOne(PropelPDO $con = null) Return the first SysNotifications matching the query
 * @method SysNotifications findOneOrCreate(PropelPDO $con = null) Return the first SysNotifications matching the query, or a new SysNotifications object populated from the query conditions when no match is found
 *
 * @method SysNotifications findOneByIdSender(int $id_sender) Return the first SysNotifications filtered by the id_sender column
 * @method SysNotifications findOneByIdReceiver(int $id_receiver) Return the first SysNotifications filtered by the id_receiver column
 * @method SysNotifications findOneByType(string $type) Return the first SysNotifications filtered by the type column
 * @method SysNotifications findOneByReference(string $reference) Return the first SysNotifications filtered by the reference column
 * @method SysNotifications findOneByMessage(string $message) Return the first SysNotifications filtered by the message column
 * @method SysNotifications findOneByState(string $state) Return the first SysNotifications filtered by the state column
 * @method SysNotifications findOneByCreated(string $created) Return the first SysNotifications filtered by the created column
 *
 * @method array findByIdNotification(int $id_notification) Return SysNotifications objects filtered by the id_notification column
 * @method array findByIdSender(int $id_sender) Return SysNotifications objects filtered by the id_sender column
 * @method array findByIdReceiver(int $id_receiver) Return SysNotifications objects filtered by the id_receiver column
 * @method array findByType(string $type) Return SysNotifications objects filtered by the type column
 * @method array findByReference(string $reference) Return SysNotifications objects filtered by the reference column
 * @method array findByMessage(string $message) Return SysNotifications objects filtered by the message column
 * @method array findByState(string $state) Return SysNotifications objects filtered by the state column
 * @method array findByCreated(string $created) Return SysNotifications objects filtered by the created column
 *
 * @package    propel.generator.bach.om
 */
abstract class BaseSysNotificationsQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSysNotificationsQuery object.
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
            $modelName = 'SysNotifications';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SysNotificationsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SysNotificationsQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SysNotificationsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SysNotificationsQuery) {
            return $criteria;
        }
        $query = new SysNotificationsQuery(null, null, $modelAlias);

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
     * @return   SysNotifications|SysNotifications[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SysNotificationsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SysNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SysNotifications A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdNotification($key, $con = null)
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
     * @return                 SysNotifications A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_notification`, `id_sender`, `id_receiver`, `type`, `reference`, `message`, `state`, `created` FROM `sys_notifications` WHERE `id_notification` = :p0';
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
            $obj = new SysNotifications();
            $obj->hydrate($row);
            SysNotificationsPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SysNotifications|SysNotifications[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SysNotifications[]|mixed the list of results, formatted by the current formatter
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
     * @return SysNotificationsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SysNotificationsPeer::ID_NOTIFICATION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SysNotificationsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SysNotificationsPeer::ID_NOTIFICATION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_notification column
     *
     * Example usage:
     * <code>
     * $query->filterByIdNotification(1234); // WHERE id_notification = 1234
     * $query->filterByIdNotification(array(12, 34)); // WHERE id_notification IN (12, 34)
     * $query->filterByIdNotification(array('min' => 12)); // WHERE id_notification >= 12
     * $query->filterByIdNotification(array('max' => 12)); // WHERE id_notification <= 12
     * </code>
     *
     * @param     mixed $idNotification The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysNotificationsQuery The current query, for fluid interface
     */
    public function filterByIdNotification($idNotification = null, $comparison = null)
    {
        if (is_array($idNotification)) {
            $useMinMax = false;
            if (isset($idNotification['min'])) {
                $this->addUsingAlias(SysNotificationsPeer::ID_NOTIFICATION, $idNotification['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idNotification['max'])) {
                $this->addUsingAlias(SysNotificationsPeer::ID_NOTIFICATION, $idNotification['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysNotificationsPeer::ID_NOTIFICATION, $idNotification, $comparison);
    }

    /**
     * Filter the query on the id_sender column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSender(1234); // WHERE id_sender = 1234
     * $query->filterByIdSender(array(12, 34)); // WHERE id_sender IN (12, 34)
     * $query->filterByIdSender(array('min' => 12)); // WHERE id_sender >= 12
     * $query->filterByIdSender(array('max' => 12)); // WHERE id_sender <= 12
     * </code>
     *
     * @see       filterBySysUsersRelatedByIdSender()
     *
     * @param     mixed $idSender The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysNotificationsQuery The current query, for fluid interface
     */
    public function filterByIdSender($idSender = null, $comparison = null)
    {
        if (is_array($idSender)) {
            $useMinMax = false;
            if (isset($idSender['min'])) {
                $this->addUsingAlias(SysNotificationsPeer::ID_SENDER, $idSender['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSender['max'])) {
                $this->addUsingAlias(SysNotificationsPeer::ID_SENDER, $idSender['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysNotificationsPeer::ID_SENDER, $idSender, $comparison);
    }

    /**
     * Filter the query on the id_receiver column
     *
     * Example usage:
     * <code>
     * $query->filterByIdReceiver(1234); // WHERE id_receiver = 1234
     * $query->filterByIdReceiver(array(12, 34)); // WHERE id_receiver IN (12, 34)
     * $query->filterByIdReceiver(array('min' => 12)); // WHERE id_receiver >= 12
     * $query->filterByIdReceiver(array('max' => 12)); // WHERE id_receiver <= 12
     * </code>
     *
     * @see       filterBySysUsersRelatedByIdReceiver()
     *
     * @param     mixed $idReceiver The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysNotificationsQuery The current query, for fluid interface
     */
    public function filterByIdReceiver($idReceiver = null, $comparison = null)
    {
        if (is_array($idReceiver)) {
            $useMinMax = false;
            if (isset($idReceiver['min'])) {
                $this->addUsingAlias(SysNotificationsPeer::ID_RECEIVER, $idReceiver['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idReceiver['max'])) {
                $this->addUsingAlias(SysNotificationsPeer::ID_RECEIVER, $idReceiver['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysNotificationsPeer::ID_RECEIVER, $idReceiver, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysNotificationsQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysNotificationsPeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the reference column
     *
     * Example usage:
     * <code>
     * $query->filterByReference('fooValue');   // WHERE reference = 'fooValue'
     * $query->filterByReference('%fooValue%'); // WHERE reference LIKE '%fooValue%'
     * </code>
     *
     * @param     string $reference The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysNotificationsQuery The current query, for fluid interface
     */
    public function filterByReference($reference = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($reference)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $reference)) {
                $reference = str_replace('*', '%', $reference);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysNotificationsPeer::REFERENCE, $reference, $comparison);
    }

    /**
     * Filter the query on the message column
     *
     * Example usage:
     * <code>
     * $query->filterByMessage('fooValue');   // WHERE message = 'fooValue'
     * $query->filterByMessage('%fooValue%'); // WHERE message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $message The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysNotificationsQuery The current query, for fluid interface
     */
    public function filterByMessage($message = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($message)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $message)) {
                $message = str_replace('*', '%', $message);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysNotificationsPeer::MESSAGE, $message, $comparison);
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
     * @return SysNotificationsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SysNotificationsPeer::STATE, $state, $comparison);
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
     * @return SysNotificationsQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(SysNotificationsPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(SysNotificationsPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysNotificationsPeer::CREATED, $created, $comparison);
    }

    /**
     * Filter the query by a related SysUsers object
     *
     * @param   SysUsers|PropelObjectCollection $sysUsers The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SysNotificationsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysUsersRelatedByIdSender($sysUsers, $comparison = null)
    {
        if ($sysUsers instanceof SysUsers) {
            return $this
                ->addUsingAlias(SysNotificationsPeer::ID_SENDER, $sysUsers->getIdUser(), $comparison);
        } elseif ($sysUsers instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SysNotificationsPeer::ID_SENDER, $sysUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
        } else {
            throw new PropelException('filterBySysUsersRelatedByIdSender() only accepts arguments of type SysUsers or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SysUsersRelatedByIdSender relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SysNotificationsQuery The current query, for fluid interface
     */
    public function joinSysUsersRelatedByIdSender($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SysUsersRelatedByIdSender');

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
            $this->addJoinObject($join, 'SysUsersRelatedByIdSender');
        }

        return $this;
    }

    /**
     * Use the SysUsersRelatedByIdSender relation SysUsers object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SysUsersQuery A secondary query class using the current class as primary query
     */
    public function useSysUsersRelatedByIdSenderQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSysUsersRelatedByIdSender($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SysUsersRelatedByIdSender', 'SysUsersQuery');
    }

    /**
     * Filter the query by a related SysUsers object
     *
     * @param   SysUsers|PropelObjectCollection $sysUsers The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SysNotificationsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysUsersRelatedByIdReceiver($sysUsers, $comparison = null)
    {
        if ($sysUsers instanceof SysUsers) {
            return $this
                ->addUsingAlias(SysNotificationsPeer::ID_RECEIVER, $sysUsers->getIdUser(), $comparison);
        } elseif ($sysUsers instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SysNotificationsPeer::ID_RECEIVER, $sysUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
        } else {
            throw new PropelException('filterBySysUsersRelatedByIdReceiver() only accepts arguments of type SysUsers or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SysUsersRelatedByIdReceiver relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SysNotificationsQuery The current query, for fluid interface
     */
    public function joinSysUsersRelatedByIdReceiver($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SysUsersRelatedByIdReceiver');

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
            $this->addJoinObject($join, 'SysUsersRelatedByIdReceiver');
        }

        return $this;
    }

    /**
     * Use the SysUsersRelatedByIdReceiver relation SysUsers object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SysUsersQuery A secondary query class using the current class as primary query
     */
    public function useSysUsersRelatedByIdReceiverQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSysUsersRelatedByIdReceiver($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SysUsersRelatedByIdReceiver', 'SysUsersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SysNotifications $sysNotifications Object to remove from the list of results
     *
     * @return SysNotificationsQuery The current query, for fluid interface
     */
    public function prune($sysNotifications = null)
    {
        if ($sysNotifications) {
            $this->addUsingAlias(SysNotificationsPeer::ID_NOTIFICATION, $sysNotifications->getIdNotification(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}

<?php


/**
 * Base class that represents a query for the 'sys_chats' table.
 *
 * 
 *
 * @method SysChatsQuery orderByIdChat($order = Criteria::ASC) Order by the id_chat column
 * @method SysChatsQuery orderByIdSender($order = Criteria::ASC) Order by the id_sender column
 * @method SysChatsQuery orderByIdReceiver($order = Criteria::ASC) Order by the id_receiver column
 * @method SysChatsQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method SysChatsQuery orderByCreated($order = Criteria::ASC) Order by the created column
 *
 * @method SysChatsQuery groupByIdChat() Group by the id_chat column
 * @method SysChatsQuery groupByIdSender() Group by the id_sender column
 * @method SysChatsQuery groupByIdReceiver() Group by the id_receiver column
 * @method SysChatsQuery groupByMessage() Group by the message column
 * @method SysChatsQuery groupByCreated() Group by the created column
 *
 * @method SysChatsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SysChatsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SysChatsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SysChatsQuery leftJoinSysUsersRelatedByIdSender($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysUsersRelatedByIdSender relation
 * @method SysChatsQuery rightJoinSysUsersRelatedByIdSender($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysUsersRelatedByIdSender relation
 * @method SysChatsQuery innerJoinSysUsersRelatedByIdSender($relationAlias = null) Adds a INNER JOIN clause to the query using the SysUsersRelatedByIdSender relation
 *
 * @method SysChatsQuery leftJoinSysUsersRelatedByIdReceiver($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysUsersRelatedByIdReceiver relation
 * @method SysChatsQuery rightJoinSysUsersRelatedByIdReceiver($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysUsersRelatedByIdReceiver relation
 * @method SysChatsQuery innerJoinSysUsersRelatedByIdReceiver($relationAlias = null) Adds a INNER JOIN clause to the query using the SysUsersRelatedByIdReceiver relation
 *
 * @method SysChats findOne(PropelPDO $con = null) Return the first SysChats matching the query
 * @method SysChats findOneOrCreate(PropelPDO $con = null) Return the first SysChats matching the query, or a new SysChats object populated from the query conditions when no match is found
 *
 * @method SysChats findOneByIdSender(int $id_sender) Return the first SysChats filtered by the id_sender column
 * @method SysChats findOneByIdReceiver(int $id_receiver) Return the first SysChats filtered by the id_receiver column
 * @method SysChats findOneByMessage(string $message) Return the first SysChats filtered by the message column
 * @method SysChats findOneByCreated(string $created) Return the first SysChats filtered by the created column
 *
 * @method array findByIdChat(int $id_chat) Return SysChats objects filtered by the id_chat column
 * @method array findByIdSender(int $id_sender) Return SysChats objects filtered by the id_sender column
 * @method array findByIdReceiver(int $id_receiver) Return SysChats objects filtered by the id_receiver column
 * @method array findByMessage(string $message) Return SysChats objects filtered by the message column
 * @method array findByCreated(string $created) Return SysChats objects filtered by the created column
 *
 * @package    propel.generator.bach.om
 */
abstract class BaseSysChatsQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSysChatsQuery object.
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
            $modelName = 'SysChats';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SysChatsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SysChatsQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SysChatsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SysChatsQuery) {
            return $criteria;
        }
        $query = new SysChatsQuery(null, null, $modelAlias);

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
     * @return   SysChats|SysChats[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SysChatsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SysChatsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SysChats A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdChat($key, $con = null)
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
     * @return                 SysChats A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_chat`, `id_sender`, `id_receiver`, `message`, `created` FROM `sys_chats` WHERE `id_chat` = :p0';
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
            $obj = new SysChats();
            $obj->hydrate($row);
            SysChatsPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SysChats|SysChats[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SysChats[]|mixed the list of results, formatted by the current formatter
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
     * @return SysChatsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SysChatsPeer::ID_CHAT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SysChatsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SysChatsPeer::ID_CHAT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_chat column
     *
     * Example usage:
     * <code>
     * $query->filterByIdChat(1234); // WHERE id_chat = 1234
     * $query->filterByIdChat(array(12, 34)); // WHERE id_chat IN (12, 34)
     * $query->filterByIdChat(array('min' => 12)); // WHERE id_chat >= 12
     * $query->filterByIdChat(array('max' => 12)); // WHERE id_chat <= 12
     * </code>
     *
     * @param     mixed $idChat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysChatsQuery The current query, for fluid interface
     */
    public function filterByIdChat($idChat = null, $comparison = null)
    {
        if (is_array($idChat)) {
            $useMinMax = false;
            if (isset($idChat['min'])) {
                $this->addUsingAlias(SysChatsPeer::ID_CHAT, $idChat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idChat['max'])) {
                $this->addUsingAlias(SysChatsPeer::ID_CHAT, $idChat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysChatsPeer::ID_CHAT, $idChat, $comparison);
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
     * @return SysChatsQuery The current query, for fluid interface
     */
    public function filterByIdSender($idSender = null, $comparison = null)
    {
        if (is_array($idSender)) {
            $useMinMax = false;
            if (isset($idSender['min'])) {
                $this->addUsingAlias(SysChatsPeer::ID_SENDER, $idSender['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSender['max'])) {
                $this->addUsingAlias(SysChatsPeer::ID_SENDER, $idSender['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysChatsPeer::ID_SENDER, $idSender, $comparison);
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
     * @return SysChatsQuery The current query, for fluid interface
     */
    public function filterByIdReceiver($idReceiver = null, $comparison = null)
    {
        if (is_array($idReceiver)) {
            $useMinMax = false;
            if (isset($idReceiver['min'])) {
                $this->addUsingAlias(SysChatsPeer::ID_RECEIVER, $idReceiver['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idReceiver['max'])) {
                $this->addUsingAlias(SysChatsPeer::ID_RECEIVER, $idReceiver['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysChatsPeer::ID_RECEIVER, $idReceiver, $comparison);
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
     * @return SysChatsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SysChatsPeer::MESSAGE, $message, $comparison);
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
     * @return SysChatsQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(SysChatsPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(SysChatsPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysChatsPeer::CREATED, $created, $comparison);
    }

    /**
     * Filter the query by a related SysUsers object
     *
     * @param   SysUsers|PropelObjectCollection $sysUsers The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SysChatsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysUsersRelatedByIdSender($sysUsers, $comparison = null)
    {
        if ($sysUsers instanceof SysUsers) {
            return $this
                ->addUsingAlias(SysChatsPeer::ID_SENDER, $sysUsers->getIdUser(), $comparison);
        } elseif ($sysUsers instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SysChatsPeer::ID_SENDER, $sysUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return SysChatsQuery The current query, for fluid interface
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
     * @return                 SysChatsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysUsersRelatedByIdReceiver($sysUsers, $comparison = null)
    {
        if ($sysUsers instanceof SysUsers) {
            return $this
                ->addUsingAlias(SysChatsPeer::ID_RECEIVER, $sysUsers->getIdUser(), $comparison);
        } elseif ($sysUsers instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SysChatsPeer::ID_RECEIVER, $sysUsers->toKeyValue('PrimaryKey', 'IdUser'), $comparison);
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
     * @return SysChatsQuery The current query, for fluid interface
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
     * @param   SysChats $sysChats Object to remove from the list of results
     *
     * @return SysChatsQuery The current query, for fluid interface
     */
    public function prune($sysChats = null)
    {
        if ($sysChats) {
            $this->addUsingAlias(SysChatsPeer::ID_CHAT, $sysChats->getIdChat(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}

<?php


/**
 * Base class that represents a query for the 'sys_sessions' table.
 *
 * 
 *
 * @method SysSessionsQuery orderBySessionId($order = Criteria::ASC) Order by the session_id column
 * @method SysSessionsQuery orderByIpAddress($order = Criteria::ASC) Order by the ip_address column
 * @method SysSessionsQuery orderByUserAgent($order = Criteria::ASC) Order by the user_agent column
 * @method SysSessionsQuery orderByLastActivity($order = Criteria::ASC) Order by the last_activity column
 * @method SysSessionsQuery orderByUserData($order = Criteria::ASC) Order by the user_data column
 *
 * @method SysSessionsQuery groupBySessionId() Group by the session_id column
 * @method SysSessionsQuery groupByIpAddress() Group by the ip_address column
 * @method SysSessionsQuery groupByUserAgent() Group by the user_agent column
 * @method SysSessionsQuery groupByLastActivity() Group by the last_activity column
 * @method SysSessionsQuery groupByUserData() Group by the user_data column
 *
 * @method SysSessionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SysSessionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SysSessionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SysSessions findOne(PropelPDO $con = null) Return the first SysSessions matching the query
 * @method SysSessions findOneOrCreate(PropelPDO $con = null) Return the first SysSessions matching the query, or a new SysSessions object populated from the query conditions when no match is found
 *
 * @method SysSessions findOneByIpAddress(string $ip_address) Return the first SysSessions filtered by the ip_address column
 * @method SysSessions findOneByUserAgent(string $user_agent) Return the first SysSessions filtered by the user_agent column
 * @method SysSessions findOneByLastActivity(int $last_activity) Return the first SysSessions filtered by the last_activity column
 * @method SysSessions findOneByUserData(string $user_data) Return the first SysSessions filtered by the user_data column
 *
 * @method array findBySessionId(string $session_id) Return SysSessions objects filtered by the session_id column
 * @method array findByIpAddress(string $ip_address) Return SysSessions objects filtered by the ip_address column
 * @method array findByUserAgent(string $user_agent) Return SysSessions objects filtered by the user_agent column
 * @method array findByLastActivity(int $last_activity) Return SysSessions objects filtered by the last_activity column
 * @method array findByUserData(string $user_data) Return SysSessions objects filtered by the user_data column
 *
 * @package    propel.generator.bach.om
 */
abstract class BaseSysSessionsQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSysSessionsQuery object.
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
            $modelName = 'SysSessions';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SysSessionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SysSessionsQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SysSessionsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SysSessionsQuery) {
            return $criteria;
        }
        $query = new SysSessionsQuery(null, null, $modelAlias);

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
     * @return   SysSessions|SysSessions[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SysSessionsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SysSessionsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SysSessions A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneBySessionId($key, $con = null)
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
     * @return                 SysSessions A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data` FROM `sys_sessions` WHERE `session_id` = :p0';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new SysSessions();
            $obj->hydrate($row);
            SysSessionsPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SysSessions|SysSessions[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SysSessions[]|mixed the list of results, formatted by the current formatter
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
     * @return SysSessionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SysSessionsPeer::SESSION_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SysSessionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SysSessionsPeer::SESSION_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the session_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySessionId('fooValue');   // WHERE session_id = 'fooValue'
     * $query->filterBySessionId('%fooValue%'); // WHERE session_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sessionId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysSessionsQuery The current query, for fluid interface
     */
    public function filterBySessionId($sessionId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sessionId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sessionId)) {
                $sessionId = str_replace('*', '%', $sessionId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysSessionsPeer::SESSION_ID, $sessionId, $comparison);
    }

    /**
     * Filter the query on the ip_address column
     *
     * Example usage:
     * <code>
     * $query->filterByIpAddress('fooValue');   // WHERE ip_address = 'fooValue'
     * $query->filterByIpAddress('%fooValue%'); // WHERE ip_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysSessionsQuery The current query, for fluid interface
     */
    public function filterByIpAddress($ipAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ipAddress)) {
                $ipAddress = str_replace('*', '%', $ipAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysSessionsPeer::IP_ADDRESS, $ipAddress, $comparison);
    }

    /**
     * Filter the query on the user_agent column
     *
     * Example usage:
     * <code>
     * $query->filterByUserAgent('fooValue');   // WHERE user_agent = 'fooValue'
     * $query->filterByUserAgent('%fooValue%'); // WHERE user_agent LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userAgent The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysSessionsQuery The current query, for fluid interface
     */
    public function filterByUserAgent($userAgent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userAgent)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userAgent)) {
                $userAgent = str_replace('*', '%', $userAgent);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysSessionsPeer::USER_AGENT, $userAgent, $comparison);
    }

    /**
     * Filter the query on the last_activity column
     *
     * Example usage:
     * <code>
     * $query->filterByLastActivity(1234); // WHERE last_activity = 1234
     * $query->filterByLastActivity(array(12, 34)); // WHERE last_activity IN (12, 34)
     * $query->filterByLastActivity(array('min' => 12)); // WHERE last_activity >= 12
     * $query->filterByLastActivity(array('max' => 12)); // WHERE last_activity <= 12
     * </code>
     *
     * @param     mixed $lastActivity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysSessionsQuery The current query, for fluid interface
     */
    public function filterByLastActivity($lastActivity = null, $comparison = null)
    {
        if (is_array($lastActivity)) {
            $useMinMax = false;
            if (isset($lastActivity['min'])) {
                $this->addUsingAlias(SysSessionsPeer::LAST_ACTIVITY, $lastActivity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastActivity['max'])) {
                $this->addUsingAlias(SysSessionsPeer::LAST_ACTIVITY, $lastActivity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysSessionsPeer::LAST_ACTIVITY, $lastActivity, $comparison);
    }

    /**
     * Filter the query on the user_data column
     *
     * Example usage:
     * <code>
     * $query->filterByUserData('fooValue');   // WHERE user_data = 'fooValue'
     * $query->filterByUserData('%fooValue%'); // WHERE user_data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userData The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysSessionsQuery The current query, for fluid interface
     */
    public function filterByUserData($userData = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userData)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userData)) {
                $userData = str_replace('*', '%', $userData);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysSessionsPeer::USER_DATA, $userData, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   SysSessions $sysSessions Object to remove from the list of results
     *
     * @return SysSessionsQuery The current query, for fluid interface
     */
    public function prune($sysSessions = null)
    {
        if ($sysSessions) {
            $this->addUsingAlias(SysSessionsPeer::SESSION_ID, $sysSessions->getSessionId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}

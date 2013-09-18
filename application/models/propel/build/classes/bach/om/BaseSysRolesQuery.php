<?php


/**
 * Base class that represents a query for the 'sys_roles' table.
 *
 * 
 *
 * @method SysRolesQuery orderByIdRol($order = Criteria::ASC) Order by the id_rol column
 * @method SysRolesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method SysRolesQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method SysRolesQuery groupByIdRol() Group by the id_rol column
 * @method SysRolesQuery groupByName() Group by the name column
 * @method SysRolesQuery groupByDescription() Group by the description column
 *
 * @method SysRolesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SysRolesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SysRolesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SysRolesQuery leftJoinSysPermissions($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysPermissions relation
 * @method SysRolesQuery rightJoinSysPermissions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysPermissions relation
 * @method SysRolesQuery innerJoinSysPermissions($relationAlias = null) Adds a INNER JOIN clause to the query using the SysPermissions relation
 *
 * @method SysRolesQuery leftJoinSysUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysUsers relation
 * @method SysRolesQuery rightJoinSysUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysUsers relation
 * @method SysRolesQuery innerJoinSysUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the SysUsers relation
 *
 * @method SysRoles findOne(PropelPDO $con = null) Return the first SysRoles matching the query
 * @method SysRoles findOneOrCreate(PropelPDO $con = null) Return the first SysRoles matching the query, or a new SysRoles object populated from the query conditions when no match is found
 *
 * @method SysRoles findOneByName(string $name) Return the first SysRoles filtered by the name column
 * @method SysRoles findOneByDescription(string $description) Return the first SysRoles filtered by the description column
 *
 * @method array findByIdRol(int $id_rol) Return SysRoles objects filtered by the id_rol column
 * @method array findByName(string $name) Return SysRoles objects filtered by the name column
 * @method array findByDescription(string $description) Return SysRoles objects filtered by the description column
 *
 * @package    propel.generator.bach.om
 */
abstract class BaseSysRolesQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSysRolesQuery object.
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
            $modelName = 'SysRoles';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SysRolesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SysRolesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SysRolesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SysRolesQuery) {
            return $criteria;
        }
        $query = new SysRolesQuery(null, null, $modelAlias);

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
     * @return   SysRoles|SysRoles[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SysRolesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SysRolesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SysRoles A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdRol($key, $con = null)
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
     * @return                 SysRoles A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_rol`, `name`, `description` FROM `sys_roles` WHERE `id_rol` = :p0';
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
            $obj = new SysRoles();
            $obj->hydrate($row);
            SysRolesPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SysRoles|SysRoles[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SysRoles[]|mixed the list of results, formatted by the current formatter
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
     * @return SysRolesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SysRolesPeer::ID_ROL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SysRolesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SysRolesPeer::ID_ROL, $keys, Criteria::IN);
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
     * @param     mixed $idRol The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysRolesQuery The current query, for fluid interface
     */
    public function filterByIdRol($idRol = null, $comparison = null)
    {
        if (is_array($idRol)) {
            $useMinMax = false;
            if (isset($idRol['min'])) {
                $this->addUsingAlias(SysRolesPeer::ID_ROL, $idRol['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idRol['max'])) {
                $this->addUsingAlias(SysRolesPeer::ID_ROL, $idRol['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysRolesPeer::ID_ROL, $idRol, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysRolesQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysRolesPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysRolesQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysRolesPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related SysPermissions object
     *
     * @param   SysPermissions|PropelObjectCollection $sysPermissions  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SysRolesQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysPermissions($sysPermissions, $comparison = null)
    {
        if ($sysPermissions instanceof SysPermissions) {
            return $this
                ->addUsingAlias(SysRolesPeer::ID_ROL, $sysPermissions->getIdRol(), $comparison);
        } elseif ($sysPermissions instanceof PropelObjectCollection) {
            return $this
                ->useSysPermissionsQuery()
                ->filterByPrimaryKeys($sysPermissions->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySysPermissions() only accepts arguments of type SysPermissions or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SysPermissions relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SysRolesQuery The current query, for fluid interface
     */
    public function joinSysPermissions($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SysPermissions');

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
            $this->addJoinObject($join, 'SysPermissions');
        }

        return $this;
    }

    /**
     * Use the SysPermissions relation SysPermissions object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SysPermissionsQuery A secondary query class using the current class as primary query
     */
    public function useSysPermissionsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSysPermissions($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SysPermissions', 'SysPermissionsQuery');
    }

    /**
     * Filter the query by a related SysUsers object
     *
     * @param   SysUsers|PropelObjectCollection $sysUsers  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SysRolesQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysUsers($sysUsers, $comparison = null)
    {
        if ($sysUsers instanceof SysUsers) {
            return $this
                ->addUsingAlias(SysRolesPeer::ID_ROL, $sysUsers->getIdRol(), $comparison);
        } elseif ($sysUsers instanceof PropelObjectCollection) {
            return $this
                ->useSysUsersQuery()
                ->filterByPrimaryKeys($sysUsers->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySysUsers() only accepts arguments of type SysUsers or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SysUsers relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SysRolesQuery The current query, for fluid interface
     */
    public function joinSysUsers($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SysUsers');

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
            $this->addJoinObject($join, 'SysUsers');
        }

        return $this;
    }

    /**
     * Use the SysUsers relation SysUsers object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SysUsersQuery A secondary query class using the current class as primary query
     */
    public function useSysUsersQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSysUsers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SysUsers', 'SysUsersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SysRoles $sysRoles Object to remove from the list of results
     *
     * @return SysRolesQuery The current query, for fluid interface
     */
    public function prune($sysRoles = null)
    {
        if ($sysRoles) {
            $this->addUsingAlias(SysRolesPeer::ID_ROL, $sysRoles->getIdRol(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}

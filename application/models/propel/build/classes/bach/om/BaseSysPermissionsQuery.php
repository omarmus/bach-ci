<?php


/**
 * Base class that represents a query for the 'sys_permissions' table.
 *
 * 
 *
 * @method SysPermissionsQuery orderByIdPage($order = Criteria::ASC) Order by the id_page column
 * @method SysPermissionsQuery orderByIdRol($order = Criteria::ASC) Order by the id_rol column
 * @method SysPermissionsQuery orderByCreate($order = Criteria::ASC) Order by the create column
 * @method SysPermissionsQuery orderByRead($order = Criteria::ASC) Order by the read column
 * @method SysPermissionsQuery orderByUpdate($order = Criteria::ASC) Order by the update column
 * @method SysPermissionsQuery orderByDelete($order = Criteria::ASC) Order by the delete column
 *
 * @method SysPermissionsQuery groupByIdPage() Group by the id_page column
 * @method SysPermissionsQuery groupByIdRol() Group by the id_rol column
 * @method SysPermissionsQuery groupByCreate() Group by the create column
 * @method SysPermissionsQuery groupByRead() Group by the read column
 * @method SysPermissionsQuery groupByUpdate() Group by the update column
 * @method SysPermissionsQuery groupByDelete() Group by the delete column
 *
 * @method SysPermissionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SysPermissionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SysPermissionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SysPermissionsQuery leftJoinSysPages($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysPages relation
 * @method SysPermissionsQuery rightJoinSysPages($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysPages relation
 * @method SysPermissionsQuery innerJoinSysPages($relationAlias = null) Adds a INNER JOIN clause to the query using the SysPages relation
 *
 * @method SysPermissionsQuery leftJoinSysRoles($relationAlias = null) Adds a LEFT JOIN clause to the query using the SysRoles relation
 * @method SysPermissionsQuery rightJoinSysRoles($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SysRoles relation
 * @method SysPermissionsQuery innerJoinSysRoles($relationAlias = null) Adds a INNER JOIN clause to the query using the SysRoles relation
 *
 * @method SysPermissions findOne(PropelPDO $con = null) Return the first SysPermissions matching the query
 * @method SysPermissions findOneOrCreate(PropelPDO $con = null) Return the first SysPermissions matching the query, or a new SysPermissions object populated from the query conditions when no match is found
 *
 * @method SysPermissions findOneByIdPage(int $id_page) Return the first SysPermissions filtered by the id_page column
 * @method SysPermissions findOneByIdRol(int $id_rol) Return the first SysPermissions filtered by the id_rol column
 * @method SysPermissions findOneByCreate(string $create) Return the first SysPermissions filtered by the create column
 * @method SysPermissions findOneByRead(string $read) Return the first SysPermissions filtered by the read column
 * @method SysPermissions findOneByUpdate(string $update) Return the first SysPermissions filtered by the update column
 * @method SysPermissions findOneByDelete(string $delete) Return the first SysPermissions filtered by the delete column
 *
 * @method array findByIdPage(int $id_page) Return SysPermissions objects filtered by the id_page column
 * @method array findByIdRol(int $id_rol) Return SysPermissions objects filtered by the id_rol column
 * @method array findByCreate(string $create) Return SysPermissions objects filtered by the create column
 * @method array findByRead(string $read) Return SysPermissions objects filtered by the read column
 * @method array findByUpdate(string $update) Return SysPermissions objects filtered by the update column
 * @method array findByDelete(string $delete) Return SysPermissions objects filtered by the delete column
 *
 * @package    propel.generator.bach.om
 */
abstract class BaseSysPermissionsQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSysPermissionsQuery object.
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
            $modelName = 'SysPermissions';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SysPermissionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SysPermissionsQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SysPermissionsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SysPermissionsQuery) {
            return $criteria;
        }
        $query = new SysPermissionsQuery(null, null, $modelAlias);

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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query 
                         A Primary key composition: [$id_page, $id_rol]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   SysPermissions|SysPermissions[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SysPermissionsPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SysPermissionsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 SysPermissions A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_page`, `id_rol`, `create`, `read`, `update`, `delete` FROM `sys_permissions` WHERE `id_page` = :p0 AND `id_rol` = :p1';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new SysPermissions();
            $obj->hydrate($row);
            SysPermissionsPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return SysPermissions|SysPermissions[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|SysPermissions[]|mixed the list of results, formatted by the current formatter
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
     * @return SysPermissionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SysPermissionsPeer::ID_PAGE, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SysPermissionsPeer::ID_ROL, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SysPermissionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SysPermissionsPeer::ID_PAGE, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SysPermissionsPeer::ID_ROL, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_page column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPage(1234); // WHERE id_page = 1234
     * $query->filterByIdPage(array(12, 34)); // WHERE id_page IN (12, 34)
     * $query->filterByIdPage(array('min' => 12)); // WHERE id_page >= 12
     * $query->filterByIdPage(array('max' => 12)); // WHERE id_page <= 12
     * </code>
     *
     * @see       filterBySysPages()
     *
     * @param     mixed $idPage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysPermissionsQuery The current query, for fluid interface
     */
    public function filterByIdPage($idPage = null, $comparison = null)
    {
        if (is_array($idPage)) {
            $useMinMax = false;
            if (isset($idPage['min'])) {
                $this->addUsingAlias(SysPermissionsPeer::ID_PAGE, $idPage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPage['max'])) {
                $this->addUsingAlias(SysPermissionsPeer::ID_PAGE, $idPage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysPermissionsPeer::ID_PAGE, $idPage, $comparison);
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
     * @return SysPermissionsQuery The current query, for fluid interface
     */
    public function filterByIdRol($idRol = null, $comparison = null)
    {
        if (is_array($idRol)) {
            $useMinMax = false;
            if (isset($idRol['min'])) {
                $this->addUsingAlias(SysPermissionsPeer::ID_ROL, $idRol['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idRol['max'])) {
                $this->addUsingAlias(SysPermissionsPeer::ID_ROL, $idRol['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysPermissionsPeer::ID_ROL, $idRol, $comparison);
    }

    /**
     * Filter the query on the create column
     *
     * Example usage:
     * <code>
     * $query->filterByCreate('fooValue');   // WHERE create = 'fooValue'
     * $query->filterByCreate('%fooValue%'); // WHERE create LIKE '%fooValue%'
     * </code>
     *
     * @param     string $create The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysPermissionsQuery The current query, for fluid interface
     */
    public function filterByCreate($create = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($create)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $create)) {
                $create = str_replace('*', '%', $create);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysPermissionsPeer::CREATE, $create, $comparison);
    }

    /**
     * Filter the query on the read column
     *
     * Example usage:
     * <code>
     * $query->filterByRead('fooValue');   // WHERE read = 'fooValue'
     * $query->filterByRead('%fooValue%'); // WHERE read LIKE '%fooValue%'
     * </code>
     *
     * @param     string $read The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysPermissionsQuery The current query, for fluid interface
     */
    public function filterByRead($read = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($read)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $read)) {
                $read = str_replace('*', '%', $read);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysPermissionsPeer::READ, $read, $comparison);
    }

    /**
     * Filter the query on the update column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdate('fooValue');   // WHERE update = 'fooValue'
     * $query->filterByUpdate('%fooValue%'); // WHERE update LIKE '%fooValue%'
     * </code>
     *
     * @param     string $update The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysPermissionsQuery The current query, for fluid interface
     */
    public function filterByUpdate($update = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($update)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $update)) {
                $update = str_replace('*', '%', $update);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysPermissionsPeer::UPDATE, $update, $comparison);
    }

    /**
     * Filter the query on the delete column
     *
     * Example usage:
     * <code>
     * $query->filterByDelete('fooValue');   // WHERE delete = 'fooValue'
     * $query->filterByDelete('%fooValue%'); // WHERE delete LIKE '%fooValue%'
     * </code>
     *
     * @param     string $delete The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysPermissionsQuery The current query, for fluid interface
     */
    public function filterByDelete($delete = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($delete)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $delete)) {
                $delete = str_replace('*', '%', $delete);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysPermissionsPeer::DELETE, $delete, $comparison);
    }

    /**
     * Filter the query by a related SysPages object
     *
     * @param   SysPages|PropelObjectCollection $sysPages The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SysPermissionsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysPages($sysPages, $comparison = null)
    {
        if ($sysPages instanceof SysPages) {
            return $this
                ->addUsingAlias(SysPermissionsPeer::ID_PAGE, $sysPages->getIdPage(), $comparison);
        } elseif ($sysPages instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SysPermissionsPeer::ID_PAGE, $sysPages->toKeyValue('PrimaryKey', 'IdPage'), $comparison);
        } else {
            throw new PropelException('filterBySysPages() only accepts arguments of type SysPages or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SysPages relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SysPermissionsQuery The current query, for fluid interface
     */
    public function joinSysPages($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SysPages');

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
            $this->addJoinObject($join, 'SysPages');
        }

        return $this;
    }

    /**
     * Use the SysPages relation SysPages object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SysPagesQuery A secondary query class using the current class as primary query
     */
    public function useSysPagesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSysPages($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SysPages', 'SysPagesQuery');
    }

    /**
     * Filter the query by a related SysRoles object
     *
     * @param   SysRoles|PropelObjectCollection $sysRoles The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SysPermissionsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySysRoles($sysRoles, $comparison = null)
    {
        if ($sysRoles instanceof SysRoles) {
            return $this
                ->addUsingAlias(SysPermissionsPeer::ID_ROL, $sysRoles->getIdRol(), $comparison);
        } elseif ($sysRoles instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SysPermissionsPeer::ID_ROL, $sysRoles->toKeyValue('PrimaryKey', 'IdRol'), $comparison);
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
     * @return SysPermissionsQuery The current query, for fluid interface
     */
    public function joinSysRoles($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useSysRolesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSysRoles($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SysRoles', 'SysRolesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SysPermissions $sysPermissions Object to remove from the list of results
     *
     * @return SysPermissionsQuery The current query, for fluid interface
     */
    public function prune($sysPermissions = null)
    {
        if ($sysPermissions) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SysPermissionsPeer::ID_PAGE), $sysPermissions->getIdPage(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SysPermissionsPeer::ID_ROL), $sysPermissions->getIdRol(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}

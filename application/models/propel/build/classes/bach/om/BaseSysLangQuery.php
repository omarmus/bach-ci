<?php


/**
 * Base class that represents a query for the 'sys_lang' table.
 *
 * 
 *
 * @method SysLangQuery orderByIdLang($order = Criteria::ASC) Order by the id_lang column
 * @method SysLangQuery orderByEnglish($order = Criteria::ASC) Order by the english column
 * @method SysLangQuery orderBySpanish($order = Criteria::ASC) Order by the spanish column
 *
 * @method SysLangQuery groupByIdLang() Group by the id_lang column
 * @method SysLangQuery groupByEnglish() Group by the english column
 * @method SysLangQuery groupBySpanish() Group by the spanish column
 *
 * @method SysLangQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SysLangQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SysLangQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SysLang findOne(PropelPDO $con = null) Return the first SysLang matching the query
 * @method SysLang findOneOrCreate(PropelPDO $con = null) Return the first SysLang matching the query, or a new SysLang object populated from the query conditions when no match is found
 *
 * @method SysLang findOneByEnglish(string $english) Return the first SysLang filtered by the english column
 * @method SysLang findOneBySpanish(string $spanish) Return the first SysLang filtered by the spanish column
 *
 * @method array findByIdLang(string $id_lang) Return SysLang objects filtered by the id_lang column
 * @method array findByEnglish(string $english) Return SysLang objects filtered by the english column
 * @method array findBySpanish(string $spanish) Return SysLang objects filtered by the spanish column
 *
 * @package    propel.generator.bach.om
 */
abstract class BaseSysLangQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSysLangQuery object.
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
            $modelName = 'SysLang';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SysLangQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SysLangQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SysLangQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SysLangQuery) {
            return $criteria;
        }
        $query = new SysLangQuery(null, null, $modelAlias);

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
     * @return   SysLang|SysLang[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SysLangPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SysLangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SysLang A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdLang($key, $con = null)
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
     * @return                 SysLang A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_lang`, `english`, `spanish` FROM `sys_lang` WHERE `id_lang` = :p0';
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
            $obj = new SysLang();
            $obj->hydrate($row);
            SysLangPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SysLang|SysLang[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SysLang[]|mixed the list of results, formatted by the current formatter
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
     * @return SysLangQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SysLangPeer::ID_LANG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SysLangQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SysLangPeer::ID_LANG, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_lang column
     *
     * Example usage:
     * <code>
     * $query->filterByIdLang('fooValue');   // WHERE id_lang = 'fooValue'
     * $query->filterByIdLang('%fooValue%'); // WHERE id_lang LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idLang The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysLangQuery The current query, for fluid interface
     */
    public function filterByIdLang($idLang = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idLang)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idLang)) {
                $idLang = str_replace('*', '%', $idLang);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysLangPeer::ID_LANG, $idLang, $comparison);
    }

    /**
     * Filter the query on the english column
     *
     * Example usage:
     * <code>
     * $query->filterByEnglish('fooValue');   // WHERE english = 'fooValue'
     * $query->filterByEnglish('%fooValue%'); // WHERE english LIKE '%fooValue%'
     * </code>
     *
     * @param     string $english The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysLangQuery The current query, for fluid interface
     */
    public function filterByEnglish($english = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($english)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $english)) {
                $english = str_replace('*', '%', $english);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysLangPeer::ENGLISH, $english, $comparison);
    }

    /**
     * Filter the query on the spanish column
     *
     * Example usage:
     * <code>
     * $query->filterBySpanish('fooValue');   // WHERE spanish = 'fooValue'
     * $query->filterBySpanish('%fooValue%'); // WHERE spanish LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spanish The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysLangQuery The current query, for fluid interface
     */
    public function filterBySpanish($spanish = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spanish)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $spanish)) {
                $spanish = str_replace('*', '%', $spanish);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysLangPeer::SPANISH, $spanish, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   SysLang $sysLang Object to remove from the list of results
     *
     * @return SysLangQuery The current query, for fluid interface
     */
    public function prune($sysLang = null)
    {
        if ($sysLang) {
            $this->addUsingAlias(SysLangPeer::ID_LANG, $sysLang->getIdLang(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}

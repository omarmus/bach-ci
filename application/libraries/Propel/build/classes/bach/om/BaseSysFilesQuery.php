<?php


/**
 * Base class that represents a query for the 'sys_files' table.
 *
 * 
 *
 * @method SysFilesQuery orderByIdFile($order = Criteria::ASC) Order by the id_file column
 * @method SysFilesQuery orderByFilename($order = Criteria::ASC) Order by the filename column
 * @method SysFilesQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method SysFilesQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method SysFilesQuery orderByFullpath($order = Criteria::ASC) Order by the fullpath column
 * @method SysFilesQuery orderBySize($order = Criteria::ASC) Order by the size column
 * @method SysFilesQuery orderByImageWidth($order = Criteria::ASC) Order by the image_width column
 * @method SysFilesQuery orderByImageHeight($order = Criteria::ASC) Order by the image_height column
 * @method SysFilesQuery orderByImageType($order = Criteria::ASC) Order by the image_type column
 * @method SysFilesQuery orderByIsImage($order = Criteria::ASC) Order by the is_image column
 *
 * @method SysFilesQuery groupByIdFile() Group by the id_file column
 * @method SysFilesQuery groupByFilename() Group by the filename column
 * @method SysFilesQuery groupByTitle() Group by the title column
 * @method SysFilesQuery groupByType() Group by the type column
 * @method SysFilesQuery groupByFullpath() Group by the fullpath column
 * @method SysFilesQuery groupBySize() Group by the size column
 * @method SysFilesQuery groupByImageWidth() Group by the image_width column
 * @method SysFilesQuery groupByImageHeight() Group by the image_height column
 * @method SysFilesQuery groupByImageType() Group by the image_type column
 * @method SysFilesQuery groupByIsImage() Group by the is_image column
 *
 * @method SysFilesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SysFilesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SysFilesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SysFiles findOne(PropelPDO $con = null) Return the first SysFiles matching the query
 * @method SysFiles findOneOrCreate(PropelPDO $con = null) Return the first SysFiles matching the query, or a new SysFiles object populated from the query conditions when no match is found
 *
 * @method SysFiles findOneByFilename(string $filename) Return the first SysFiles filtered by the filename column
 * @method SysFiles findOneByTitle(string $title) Return the first SysFiles filtered by the title column
 * @method SysFiles findOneByType(string $type) Return the first SysFiles filtered by the type column
 * @method SysFiles findOneByFullpath(string $fullpath) Return the first SysFiles filtered by the fullpath column
 * @method SysFiles findOneBySize(string $size) Return the first SysFiles filtered by the size column
 * @method SysFiles findOneByImageWidth(int $image_width) Return the first SysFiles filtered by the image_width column
 * @method SysFiles findOneByImageHeight(int $image_height) Return the first SysFiles filtered by the image_height column
 * @method SysFiles findOneByImageType(string $image_type) Return the first SysFiles filtered by the image_type column
 * @method SysFiles findOneByIsImage(string $is_image) Return the first SysFiles filtered by the is_image column
 *
 * @method array findByIdFile(int $id_file) Return SysFiles objects filtered by the id_file column
 * @method array findByFilename(string $filename) Return SysFiles objects filtered by the filename column
 * @method array findByTitle(string $title) Return SysFiles objects filtered by the title column
 * @method array findByType(string $type) Return SysFiles objects filtered by the type column
 * @method array findByFullpath(string $fullpath) Return SysFiles objects filtered by the fullpath column
 * @method array findBySize(string $size) Return SysFiles objects filtered by the size column
 * @method array findByImageWidth(int $image_width) Return SysFiles objects filtered by the image_width column
 * @method array findByImageHeight(int $image_height) Return SysFiles objects filtered by the image_height column
 * @method array findByImageType(string $image_type) Return SysFiles objects filtered by the image_type column
 * @method array findByIsImage(string $is_image) Return SysFiles objects filtered by the is_image column
 *
 * @package    propel.generator.bach.om
 */
abstract class BaseSysFilesQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSysFilesQuery object.
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
            $modelName = 'SysFiles';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SysFilesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SysFilesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SysFilesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SysFilesQuery) {
            return $criteria;
        }
        $query = new SysFilesQuery(null, null, $modelAlias);

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
     * @return   SysFiles|SysFiles[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SysFilesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SysFilesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SysFiles A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdFile($key, $con = null)
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
     * @return                 SysFiles A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_file`, `filename`, `title`, `type`, `fullpath`, `size`, `image_width`, `image_height`, `image_type`, `is_image` FROM `sys_files` WHERE `id_file` = :p0';
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
            $obj = new SysFiles();
            $obj->hydrate($row);
            SysFilesPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SysFiles|SysFiles[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SysFiles[]|mixed the list of results, formatted by the current formatter
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
     * @return SysFilesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SysFilesPeer::ID_FILE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SysFilesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SysFilesPeer::ID_FILE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_file column
     *
     * Example usage:
     * <code>
     * $query->filterByIdFile(1234); // WHERE id_file = 1234
     * $query->filterByIdFile(array(12, 34)); // WHERE id_file IN (12, 34)
     * $query->filterByIdFile(array('min' => 12)); // WHERE id_file >= 12
     * $query->filterByIdFile(array('max' => 12)); // WHERE id_file <= 12
     * </code>
     *
     * @param     mixed $idFile The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysFilesQuery The current query, for fluid interface
     */
    public function filterByIdFile($idFile = null, $comparison = null)
    {
        if (is_array($idFile)) {
            $useMinMax = false;
            if (isset($idFile['min'])) {
                $this->addUsingAlias(SysFilesPeer::ID_FILE, $idFile['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idFile['max'])) {
                $this->addUsingAlias(SysFilesPeer::ID_FILE, $idFile['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysFilesPeer::ID_FILE, $idFile, $comparison);
    }

    /**
     * Filter the query on the filename column
     *
     * Example usage:
     * <code>
     * $query->filterByFilename('fooValue');   // WHERE filename = 'fooValue'
     * $query->filterByFilename('%fooValue%'); // WHERE filename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $filename The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysFilesQuery The current query, for fluid interface
     */
    public function filterByFilename($filename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filename)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $filename)) {
                $filename = str_replace('*', '%', $filename);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysFilesPeer::FILENAME, $filename, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysFilesQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysFilesPeer::TITLE, $title, $comparison);
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
     * @return SysFilesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SysFilesPeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the fullpath column
     *
     * Example usage:
     * <code>
     * $query->filterByFullpath('fooValue');   // WHERE fullpath = 'fooValue'
     * $query->filterByFullpath('%fooValue%'); // WHERE fullpath LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fullpath The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysFilesQuery The current query, for fluid interface
     */
    public function filterByFullpath($fullpath = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fullpath)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fullpath)) {
                $fullpath = str_replace('*', '%', $fullpath);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysFilesPeer::FULLPATH, $fullpath, $comparison);
    }

    /**
     * Filter the query on the size column
     *
     * Example usage:
     * <code>
     * $query->filterBySize(1234); // WHERE size = 1234
     * $query->filterBySize(array(12, 34)); // WHERE size IN (12, 34)
     * $query->filterBySize(array('min' => 12)); // WHERE size >= 12
     * $query->filterBySize(array('max' => 12)); // WHERE size <= 12
     * </code>
     *
     * @param     mixed $size The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysFilesQuery The current query, for fluid interface
     */
    public function filterBySize($size = null, $comparison = null)
    {
        if (is_array($size)) {
            $useMinMax = false;
            if (isset($size['min'])) {
                $this->addUsingAlias(SysFilesPeer::SIZE, $size['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($size['max'])) {
                $this->addUsingAlias(SysFilesPeer::SIZE, $size['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysFilesPeer::SIZE, $size, $comparison);
    }

    /**
     * Filter the query on the image_width column
     *
     * Example usage:
     * <code>
     * $query->filterByImageWidth(1234); // WHERE image_width = 1234
     * $query->filterByImageWidth(array(12, 34)); // WHERE image_width IN (12, 34)
     * $query->filterByImageWidth(array('min' => 12)); // WHERE image_width >= 12
     * $query->filterByImageWidth(array('max' => 12)); // WHERE image_width <= 12
     * </code>
     *
     * @param     mixed $imageWidth The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysFilesQuery The current query, for fluid interface
     */
    public function filterByImageWidth($imageWidth = null, $comparison = null)
    {
        if (is_array($imageWidth)) {
            $useMinMax = false;
            if (isset($imageWidth['min'])) {
                $this->addUsingAlias(SysFilesPeer::IMAGE_WIDTH, $imageWidth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($imageWidth['max'])) {
                $this->addUsingAlias(SysFilesPeer::IMAGE_WIDTH, $imageWidth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysFilesPeer::IMAGE_WIDTH, $imageWidth, $comparison);
    }

    /**
     * Filter the query on the image_height column
     *
     * Example usage:
     * <code>
     * $query->filterByImageHeight(1234); // WHERE image_height = 1234
     * $query->filterByImageHeight(array(12, 34)); // WHERE image_height IN (12, 34)
     * $query->filterByImageHeight(array('min' => 12)); // WHERE image_height >= 12
     * $query->filterByImageHeight(array('max' => 12)); // WHERE image_height <= 12
     * </code>
     *
     * @param     mixed $imageHeight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysFilesQuery The current query, for fluid interface
     */
    public function filterByImageHeight($imageHeight = null, $comparison = null)
    {
        if (is_array($imageHeight)) {
            $useMinMax = false;
            if (isset($imageHeight['min'])) {
                $this->addUsingAlias(SysFilesPeer::IMAGE_HEIGHT, $imageHeight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($imageHeight['max'])) {
                $this->addUsingAlias(SysFilesPeer::IMAGE_HEIGHT, $imageHeight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SysFilesPeer::IMAGE_HEIGHT, $imageHeight, $comparison);
    }

    /**
     * Filter the query on the image_type column
     *
     * Example usage:
     * <code>
     * $query->filterByImageType('fooValue');   // WHERE image_type = 'fooValue'
     * $query->filterByImageType('%fooValue%'); // WHERE image_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $imageType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysFilesQuery The current query, for fluid interface
     */
    public function filterByImageType($imageType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imageType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $imageType)) {
                $imageType = str_replace('*', '%', $imageType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysFilesPeer::IMAGE_TYPE, $imageType, $comparison);
    }

    /**
     * Filter the query on the is_image column
     *
     * Example usage:
     * <code>
     * $query->filterByIsImage('fooValue');   // WHERE is_image = 'fooValue'
     * $query->filterByIsImage('%fooValue%'); // WHERE is_image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $isImage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SysFilesQuery The current query, for fluid interface
     */
    public function filterByIsImage($isImage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($isImage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $isImage)) {
                $isImage = str_replace('*', '%', $isImage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SysFilesPeer::IS_IMAGE, $isImage, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   SysFiles $sysFiles Object to remove from the list of results
     *
     * @return SysFilesQuery The current query, for fluid interface
     */
    public function prune($sysFiles = null)
    {
        if ($sysFiles) {
            $this->addUsingAlias(SysFilesPeer::ID_FILE, $sysFiles->getIdFile(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}

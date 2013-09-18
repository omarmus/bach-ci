<?php


/**
 * Base static class for performing query and update operations on the 'sys_users' table.
 *
 * 
 *
 * @package propel.generator.bach.om
 */
abstract class BaseSysUsersPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'bach';

    /** the table name for this class */
    const TABLE_NAME = 'sys_users';

    /** the related Propel class for this table */
    const OM_CLASS = 'SysUsers';

    /** the related TableMap class for this table */
    const TM_CLASS = 'SysUsersTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 14;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 14;

    /** the column name for the id_user field */
    const ID_USER = 'sys_users.id_user';

    /** the column name for the username field */
    const USERNAME = 'sys_users.username';

    /** the column name for the password field */
    const PASSWORD = 'sys_users.password';

    /** the column name for the email field */
    const EMAIL = 'sys_users.email';

    /** the column name for the first_name field */
    const FIRST_NAME = 'sys_users.first_name';

    /** the column name for the last_name field */
    const LAST_NAME = 'sys_users.last_name';

    /** the column name for the state field */
    const STATE = 'sys_users.state';

    /** the column name for the id_rol field */
    const ID_ROL = 'sys_users.id_rol';

    /** the column name for the id_photo field */
    const ID_PHOTO = 'sys_users.id_photo';

    /** the column name for the created field */
    const CREATED = 'sys_users.created';

    /** the column name for the phone field */
    const PHONE = 'sys_users.phone';

    /** the column name for the modified field */
    const MODIFIED = 'sys_users.modified';

    /** the column name for the lang_code field */
    const LANG_CODE = 'sys_users.lang_code';

    /** the column name for the mobile field */
    const MOBILE = 'sys_users.mobile';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of SysUsers objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array SysUsers[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. SysUsersPeer::$fieldNames[SysUsersPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdUser', 'Username', 'Password', 'Email', 'FirstName', 'LastName', 'State', 'IdRol', 'IdPhoto', 'Created', 'Phone', 'Modified', 'LangCode', 'Mobile', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idUser', 'username', 'password', 'email', 'firstName', 'lastName', 'state', 'idRol', 'idPhoto', 'created', 'phone', 'modified', 'langCode', 'mobile', ),
        BasePeer::TYPE_COLNAME => array (SysUsersPeer::ID_USER, SysUsersPeer::USERNAME, SysUsersPeer::PASSWORD, SysUsersPeer::EMAIL, SysUsersPeer::FIRST_NAME, SysUsersPeer::LAST_NAME, SysUsersPeer::STATE, SysUsersPeer::ID_ROL, SysUsersPeer::ID_PHOTO, SysUsersPeer::CREATED, SysUsersPeer::PHONE, SysUsersPeer::MODIFIED, SysUsersPeer::LANG_CODE, SysUsersPeer::MOBILE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_USER', 'USERNAME', 'PASSWORD', 'EMAIL', 'FIRST_NAME', 'LAST_NAME', 'STATE', 'ID_ROL', 'ID_PHOTO', 'CREATED', 'PHONE', 'MODIFIED', 'LANG_CODE', 'MOBILE', ),
        BasePeer::TYPE_FIELDNAME => array ('id_user', 'username', 'password', 'email', 'first_name', 'last_name', 'state', 'id_rol', 'id_photo', 'created', 'phone', 'modified', 'lang_code', 'mobile', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. SysUsersPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdUser' => 0, 'Username' => 1, 'Password' => 2, 'Email' => 3, 'FirstName' => 4, 'LastName' => 5, 'State' => 6, 'IdRol' => 7, 'IdPhoto' => 8, 'Created' => 9, 'Phone' => 10, 'Modified' => 11, 'LangCode' => 12, 'Mobile' => 13, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idUser' => 0, 'username' => 1, 'password' => 2, 'email' => 3, 'firstName' => 4, 'lastName' => 5, 'state' => 6, 'idRol' => 7, 'idPhoto' => 8, 'created' => 9, 'phone' => 10, 'modified' => 11, 'langCode' => 12, 'mobile' => 13, ),
        BasePeer::TYPE_COLNAME => array (SysUsersPeer::ID_USER => 0, SysUsersPeer::USERNAME => 1, SysUsersPeer::PASSWORD => 2, SysUsersPeer::EMAIL => 3, SysUsersPeer::FIRST_NAME => 4, SysUsersPeer::LAST_NAME => 5, SysUsersPeer::STATE => 6, SysUsersPeer::ID_ROL => 7, SysUsersPeer::ID_PHOTO => 8, SysUsersPeer::CREATED => 9, SysUsersPeer::PHONE => 10, SysUsersPeer::MODIFIED => 11, SysUsersPeer::LANG_CODE => 12, SysUsersPeer::MOBILE => 13, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_USER' => 0, 'USERNAME' => 1, 'PASSWORD' => 2, 'EMAIL' => 3, 'FIRST_NAME' => 4, 'LAST_NAME' => 5, 'STATE' => 6, 'ID_ROL' => 7, 'ID_PHOTO' => 8, 'CREATED' => 9, 'PHONE' => 10, 'MODIFIED' => 11, 'LANG_CODE' => 12, 'MOBILE' => 13, ),
        BasePeer::TYPE_FIELDNAME => array ('id_user' => 0, 'username' => 1, 'password' => 2, 'email' => 3, 'first_name' => 4, 'last_name' => 5, 'state' => 6, 'id_rol' => 7, 'id_photo' => 8, 'created' => 9, 'phone' => 10, 'modified' => 11, 'lang_code' => 12, 'mobile' => 13, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = SysUsersPeer::getFieldNames($toType);
        $key = isset(SysUsersPeer::$fieldKeys[$fromType][$name]) ? SysUsersPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(SysUsersPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, SysUsersPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return SysUsersPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. SysUsersPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(SysUsersPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(SysUsersPeer::ID_USER);
            $criteria->addSelectColumn(SysUsersPeer::USERNAME);
            $criteria->addSelectColumn(SysUsersPeer::PASSWORD);
            $criteria->addSelectColumn(SysUsersPeer::EMAIL);
            $criteria->addSelectColumn(SysUsersPeer::FIRST_NAME);
            $criteria->addSelectColumn(SysUsersPeer::LAST_NAME);
            $criteria->addSelectColumn(SysUsersPeer::STATE);
            $criteria->addSelectColumn(SysUsersPeer::ID_ROL);
            $criteria->addSelectColumn(SysUsersPeer::ID_PHOTO);
            $criteria->addSelectColumn(SysUsersPeer::CREATED);
            $criteria->addSelectColumn(SysUsersPeer::PHONE);
            $criteria->addSelectColumn(SysUsersPeer::MODIFIED);
            $criteria->addSelectColumn(SysUsersPeer::LANG_CODE);
            $criteria->addSelectColumn(SysUsersPeer::MOBILE);
        } else {
            $criteria->addSelectColumn($alias . '.id_user');
            $criteria->addSelectColumn($alias . '.username');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.first_name');
            $criteria->addSelectColumn($alias . '.last_name');
            $criteria->addSelectColumn($alias . '.state');
            $criteria->addSelectColumn($alias . '.id_rol');
            $criteria->addSelectColumn($alias . '.id_photo');
            $criteria->addSelectColumn($alias . '.created');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.modified');
            $criteria->addSelectColumn($alias . '.lang_code');
            $criteria->addSelectColumn($alias . '.mobile');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SysUsersPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SysUsersPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(SysUsersPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return SysUsers
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = SysUsersPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return SysUsersPeer::populateObjects(SysUsersPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            SysUsersPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(SysUsersPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param SysUsers $obj A SysUsers object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdUser();
            } // if key === null
            SysUsersPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A SysUsers object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof SysUsers) {
                $key = (string) $value->getIdUser();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or SysUsers object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(SysUsersPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return SysUsers Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(SysUsersPeer::$instances[$key])) {
                return SysUsersPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }
    
    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references) {
        foreach (SysUsersPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        SysUsersPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to sys_users
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }
    
    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = SysUsersPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = SysUsersPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = SysUsersPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SysUsersPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (SysUsers object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = SysUsersPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = SysUsersPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + SysUsersPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SysUsersPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            SysUsersPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related SysRoles table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSysRoles(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SysUsersPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SysUsersPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SysUsersPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SysUsersPeer::ID_ROL, SysRolesPeer::ID_ROL, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related SysFiles table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSysFiles(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SysUsersPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SysUsersPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SysUsersPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SysUsersPeer::ID_PHOTO, SysFilesPeer::ID_FILE, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of SysUsers objects pre-filled with their SysRoles objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SysUsers objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSysRoles(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SysUsersPeer::DATABASE_NAME);
        }

        SysUsersPeer::addSelectColumns($criteria);
        $startcol = SysUsersPeer::NUM_HYDRATE_COLUMNS;
        SysRolesPeer::addSelectColumns($criteria);

        $criteria->addJoin(SysUsersPeer::ID_ROL, SysRolesPeer::ID_ROL, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SysUsersPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SysUsersPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SysUsersPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SysUsersPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SysRolesPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SysRolesPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SysRolesPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SysRolesPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SysUsers) to $obj2 (SysRoles)
                $obj2->addSysUsers($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SysUsers objects pre-filled with their SysFiles objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SysUsers objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSysFiles(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SysUsersPeer::DATABASE_NAME);
        }

        SysUsersPeer::addSelectColumns($criteria);
        $startcol = SysUsersPeer::NUM_HYDRATE_COLUMNS;
        SysFilesPeer::addSelectColumns($criteria);

        $criteria->addJoin(SysUsersPeer::ID_PHOTO, SysFilesPeer::ID_FILE, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SysUsersPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SysUsersPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SysUsersPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SysUsersPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SysFilesPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SysFilesPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SysFilesPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SysFilesPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SysUsers) to $obj2 (SysFiles)
                $obj2->addSysUsers($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SysUsersPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SysUsersPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SysUsersPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SysUsersPeer::ID_ROL, SysRolesPeer::ID_ROL, $join_behavior);

        $criteria->addJoin(SysUsersPeer::ID_PHOTO, SysFilesPeer::ID_FILE, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of SysUsers objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SysUsers objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SysUsersPeer::DATABASE_NAME);
        }

        SysUsersPeer::addSelectColumns($criteria);
        $startcol2 = SysUsersPeer::NUM_HYDRATE_COLUMNS;

        SysRolesPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SysRolesPeer::NUM_HYDRATE_COLUMNS;

        SysFilesPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SysFilesPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SysUsersPeer::ID_ROL, SysRolesPeer::ID_ROL, $join_behavior);

        $criteria->addJoin(SysUsersPeer::ID_PHOTO, SysFilesPeer::ID_FILE, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SysUsersPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SysUsersPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SysUsersPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SysUsersPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined SysRoles rows

            $key2 = SysRolesPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = SysRolesPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SysRolesPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SysRolesPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (SysUsers) to the collection in $obj2 (SysRoles)
                $obj2->addSysUsers($obj1);
            } // if joined row not null

            // Add objects for joined SysFiles rows

            $key3 = SysFilesPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = SysFilesPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = SysFilesPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SysFilesPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (SysUsers) to the collection in $obj3 (SysFiles)
                $obj3->addSysUsers($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related SysRoles table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSysRoles(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SysUsersPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SysUsersPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SysUsersPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SysUsersPeer::ID_PHOTO, SysFilesPeer::ID_FILE, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related SysFiles table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSysFiles(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SysUsersPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SysUsersPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SysUsersPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SysUsersPeer::ID_ROL, SysRolesPeer::ID_ROL, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of SysUsers objects pre-filled with all related objects except SysRoles.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SysUsers objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSysRoles(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SysUsersPeer::DATABASE_NAME);
        }

        SysUsersPeer::addSelectColumns($criteria);
        $startcol2 = SysUsersPeer::NUM_HYDRATE_COLUMNS;

        SysFilesPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SysFilesPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SysUsersPeer::ID_PHOTO, SysFilesPeer::ID_FILE, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SysUsersPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SysUsersPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SysUsersPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SysUsersPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined SysFiles rows

                $key2 = SysFilesPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SysFilesPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = SysFilesPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SysFilesPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SysUsers) to the collection in $obj2 (SysFiles)
                $obj2->addSysUsers($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SysUsers objects pre-filled with all related objects except SysFiles.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SysUsers objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSysFiles(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SysUsersPeer::DATABASE_NAME);
        }

        SysUsersPeer::addSelectColumns($criteria);
        $startcol2 = SysUsersPeer::NUM_HYDRATE_COLUMNS;

        SysRolesPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SysRolesPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SysUsersPeer::ID_ROL, SysRolesPeer::ID_ROL, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SysUsersPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SysUsersPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SysUsersPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SysUsersPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined SysRoles rows

                $key2 = SysRolesPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SysRolesPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = SysRolesPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SysRolesPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SysUsers) to the collection in $obj2 (SysRoles)
                $obj2->addSysUsers($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(SysUsersPeer::DATABASE_NAME)->getTable(SysUsersPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseSysUsersPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseSysUsersPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new SysUsersTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        return SysUsersPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a SysUsers or Criteria object.
     *
     * @param      mixed $values Criteria or SysUsers object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from SysUsers object
        }

        if ($criteria->containsKey(SysUsersPeer::ID_USER) && $criteria->keyContainsValue(SysUsersPeer::ID_USER) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SysUsersPeer::ID_USER.')');
        }


        // Set the correct dbName
        $criteria->setDbName(SysUsersPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a SysUsers or Criteria object.
     *
     * @param      mixed $values Criteria or SysUsers object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(SysUsersPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(SysUsersPeer::ID_USER);
            $value = $criteria->remove(SysUsersPeer::ID_USER);
            if ($value) {
                $selectCriteria->add(SysUsersPeer::ID_USER, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(SysUsersPeer::TABLE_NAME);
            }

        } else { // $values is SysUsers object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(SysUsersPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the sys_users table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(SysUsersPeer::TABLE_NAME, $con, SysUsersPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SysUsersPeer::clearInstancePool();
            SysUsersPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a SysUsers or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or SysUsers object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            SysUsersPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof SysUsers) { // it's a model object
            // invalidate the cache for this single object
            SysUsersPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SysUsersPeer::DATABASE_NAME);
            $criteria->add(SysUsersPeer::ID_USER, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                SysUsersPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(SysUsersPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            SysUsersPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given SysUsers object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param SysUsers $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(SysUsersPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(SysUsersPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(SysUsersPeer::DATABASE_NAME, SysUsersPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return SysUsers
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = SysUsersPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(SysUsersPeer::DATABASE_NAME);
        $criteria->add(SysUsersPeer::ID_USER, $pk);

        $v = SysUsersPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return SysUsers[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(SysUsersPeer::DATABASE_NAME);
            $criteria->add(SysUsersPeer::ID_USER, $pks, Criteria::IN);
            $objs = SysUsersPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseSysUsersPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseSysUsersPeer::buildTableMap();


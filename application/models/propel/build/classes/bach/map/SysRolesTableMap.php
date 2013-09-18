<?php



/**
 * This class defines the structure of the 'sys_roles' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.bach.map
 */
class SysRolesTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'bach.map.SysRolesTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('sys_roles');
        $this->setPhpName('SysRoles');
        $this->setClassname('SysRoles');
        $this->setPackage('bach');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_rol', 'IdRol', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', false, 50, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SysPermissions', 'SysPermissions', RelationMap::ONE_TO_MANY, array('id_rol' => 'id_rol', ), null, null, 'SysPermissionss');
        $this->addRelation('SysUsers', 'SysUsers', RelationMap::ONE_TO_MANY, array('id_rol' => 'id_rol', ), null, null, 'SysUserss');
    } // buildRelations()

} // SysRolesTableMap

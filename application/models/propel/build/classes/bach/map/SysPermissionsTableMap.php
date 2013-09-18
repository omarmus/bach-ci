<?php



/**
 * This class defines the structure of the 'sys_permissions' table.
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
class SysPermissionsTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'bach.map.SysPermissionsTableMap';

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
        $this->setName('sys_permissions');
        $this->setPhpName('SysPermissions');
        $this->setClassname('SysPermissions');
        $this->setPackage('bach');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_page', 'IdPage', 'INTEGER' , 'sys_pages', 'id_page', true, null, null);
        $this->addForeignPrimaryKey('id_rol', 'IdRol', 'INTEGER' , 'sys_roles', 'id_rol', true, null, null);
        $this->addColumn('create', 'Create', 'VARCHAR', false, 3, 'NO');
        $this->addColumn('read', 'Read', 'VARCHAR', false, 3, 'NO');
        $this->addColumn('update', 'Update', 'VARCHAR', false, 3, 'NO');
        $this->addColumn('delete', 'Delete', 'VARCHAR', false, 3, 'NO');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SysPages', 'SysPages', RelationMap::MANY_TO_ONE, array('id_page' => 'id_page', ), null, null);
        $this->addRelation('SysRoles', 'SysRoles', RelationMap::MANY_TO_ONE, array('id_rol' => 'id_rol', ), null, null);
    } // buildRelations()

} // SysPermissionsTableMap

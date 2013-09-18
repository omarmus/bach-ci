<?php



/**
 * This class defines the structure of the 'sys_pages' table.
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
class SysPagesTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'bach.map.SysPagesTableMap';

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
        $this->setName('sys_pages');
        $this->setPhpName('SysPages');
        $this->setClassname('SysPages');
        $this->setPackage('bach');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_page', 'IdPage', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 100, null);
        $this->addColumn('slug', 'Slug', 'VARCHAR', true, 100, null);
        $this->addColumn('order', 'Order', 'INTEGER', true, null, null);
        $this->addColumn('id_module', 'IdModule', 'INTEGER', false, null, 0);
        $this->addColumn('id_section', 'IdSection', 'INTEGER', false, null, 0);
        $this->addColumn('state', 'State', 'VARCHAR', false, 20, 'ACTIVE');
        $this->addColumn('visible', 'Visible', 'VARCHAR', false, 20, 'YES');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SysPermissions', 'SysPermissions', RelationMap::ONE_TO_MANY, array('id_page' => 'id_page', ), null, null, 'SysPermissionss');
    } // buildRelations()

} // SysPagesTableMap

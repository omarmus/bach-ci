<?php



/**
 * This class defines the structure of the 'sys_lang' table.
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
class SysLangTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'bach.map.SysLangTableMap';

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
        $this->setName('sys_lang');
        $this->setPhpName('SysLang');
        $this->setClassname('SysLang');
        $this->setPackage('bach');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_lang', 'IdLang', 'VARCHAR', true, 50, null);
        $this->addColumn('english', 'English', 'VARCHAR', false, 255, null);
        $this->addColumn('spanish', 'Spanish', 'VARCHAR', false, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // SysLangTableMap
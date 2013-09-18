<?php



/**
 * This class defines the structure of the 'sys_files' table.
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
class SysFilesTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'bach.map.SysFilesTableMap';

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
        $this->setName('sys_files');
        $this->setPhpName('SysFiles');
        $this->setClassname('SysFiles');
        $this->setPackage('bach');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_file', 'IdFile', 'INTEGER', true, null, null);
        $this->addColumn('filename', 'Filename', 'VARCHAR', false, 255, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 100, null);
        $this->addColumn('type', 'Type', 'VARCHAR', false, 20, null);
        $this->addColumn('fullpath', 'Fullpath', 'VARCHAR', false, 255, null);
        $this->addColumn('size', 'Size', 'DECIMAL', false, 20, 0);
        $this->addColumn('image_width', 'ImageWidth', 'INTEGER', false, null, 0);
        $this->addColumn('image_height', 'ImageHeight', 'INTEGER', false, null, 0);
        $this->addColumn('image_type', 'ImageType', 'VARCHAR', false, 20, null);
        $this->addColumn('is_image', 'IsImage', 'VARCHAR', false, 20, 'NO');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SysUsers', 'SysUsers', RelationMap::ONE_TO_MANY, array('id_file' => 'id_photo', ), null, null, 'SysUserss');
    } // buildRelations()

} // SysFilesTableMap

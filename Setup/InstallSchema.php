<?php

namespace Lrn\Slider\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        /**
         * Create table 'lrntlp_slider'
         */
        if (!$installer->tableExists('lrntlp_slider')) {
            $table = $installer->getConnection()
                ->newTable($installer->getTable('lrntlp_slider'))
                ->addColumn(
                    'lrntlp_slide_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                    'Slide ID'
                )
                ->addColumn(
                    'title',
                    Table::TYPE_TEXT,
                    100,
                    ['nullable' => false, 'default' => 'simple'],
                    'Title'
                )
                ->addColumn(
                    'image',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default' => 'simple'],
                    'Image'
                )
                ->addColumn(
                    'link',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default' => 'simple'],
                    'Link'
                )
                ->addColumn(
                    'position',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable' => false,
                        'default' => '0'
                    ],
                    'Position'
                )
                ->addColumn(
                    'target_blank',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable' => false,
                        'default' => '1',
                    ],
                    'Target blank'
                )
                ->addColumn(
                    'is_active',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable' => false,
                        'default' => '1',
                    ],
                    'Is Active'
                )
                ->setComment('Lrntlp Sliders Table')
                ->setOption('type', 'InnoDB')
                ->setOption('charset', 'utf8');

            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
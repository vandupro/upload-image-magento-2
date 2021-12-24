<?php
namespace Vendor\Extension\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable($installer->getTable('magecomp_customtable'))
            ->addColumn('id', 
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, 
                null, 
                [
                    'identity' => true, 
                    'unsigned' => true, 
                    'nullable' => false, 
                    'primary' => true
                ]
                , 'ID')
            ->addColumn('name', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, ['nullable' => false], 'Name')
            ->addColumn('content', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, '64k', [], 'Content')
            ->addColumn('title', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [], 'Title');
            
        $installer->getConnection()->createTable($table);

        $installer->endSetup();

    }
}

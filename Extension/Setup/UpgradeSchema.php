<?php
namespace Vendor\Extension\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
	public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
		$installer = $setup;

		$installer->startSetup();

		if(version_compare($context->getVersion(), '1.0.2', '<')) {
			$installer->getConnection()->addColumn(
				$installer->getTable( 'magecomp_customtable' ),
				'image',
				[
					'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'nullable' => true,
					'comment' => 'path of image',
					'after' => 'content'
				]
			);
		}



		$installer->endSetup();
	}
}


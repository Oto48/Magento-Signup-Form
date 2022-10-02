<?php
namespace Signup\Form\Setup;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists('signup_form_customer')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('signup_form_customer')
			)
				->addColumn(
					'customer_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'Customer ID'
				)
				->addColumn(
					'name',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Name'
				)
				->addColumn(
					'date',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'64k',
					[],
					'Date'
				)

				->setComment('Customer Table');
			$installer->getConnection()->createTable($table);
			$installer->getConnection()->addIndex(
				$installer->getTable('signup_form_customer'),
				$setup->getIdxName(
					$installer->getTable('signup_form_customer'),
					['name','date'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['name','date'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}

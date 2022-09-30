<?php
namespace Signup\Form\Model\ResourceModel\Customer;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'customer_id';
	protected $_eventPrefix = 'signup_form_customer_collection';
	protected $_eventObject = 'customer_collection';
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Signup\Form\Model\Customer', 'Signup\Form\Model\ResourceModel\Customer');
	}
}

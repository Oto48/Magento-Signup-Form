<?php
namespace Signup\Form\Model\ResourceModel;
class Customer extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}

	protected function _construct()
	{
		$this->_init('signup_form_customer', 'customer_id');
	}

}

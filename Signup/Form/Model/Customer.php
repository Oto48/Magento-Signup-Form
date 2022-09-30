<?php
namespace Signup\Form\Model;
class Customer extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'signup_form_customer';
	protected $_cacheTag = 'signup_form_customer';
	protected $_eventPrefix = 'signup_form_customer';
	protected function _construct()
	{
		$this->_init('Signup\Form\Model\ResourceModel\Customer');
	}
	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}
	public function getDefaultValues()
	{
		$values = [];
		return $values;
	}
}

<?php
namespace Signup\Form\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Signup\Form\Api\Data\CustomerInterface;
use Signup\Form\Model\ResourceModel\Customer as ResourceModel;

/**
 * Class Customer
 */
class Customer extends AbstractModel implements
    CustomerInterface,
    IdentityInterface
{
    const CACHE_TAG = 'signup_form_customer';

    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getId()
    {
        return $this->getData('customer_id');
    }
    public function setId($customer_id)
    {
        return $this->setData('customer_id', $customer_id);
    }
    public function getName()
    {
        return $this->getData('name');
    }
    public function setName($name)
    {
        return $this->setData('name', $name);
    }
    public function getDate()
    {
        return $this->getData('date');
    }
    public function setDate($date)
    {
        return $this->setData('date', $date);
    }
}

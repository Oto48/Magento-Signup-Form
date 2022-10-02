<?php
namespace Signup\Form\Model\ResourceModel\Customer;

use Signup\Form\Model\Customer as Model;
use Signup\Form\Model\ResourceModel\Customer as ResourceModel;

/**
 * Class Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}

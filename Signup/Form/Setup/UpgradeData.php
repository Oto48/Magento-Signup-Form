<?php

namespace Signup\Form\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $_postFactory;

    public function __construct(\Signup\Form\Model\CustomerFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.2.0', '<')) {
            $data = [
                'name' => "this is name",
                'date' => "this is date",
            ];
            $post = $this->_postFactory->create();
            $post->addData($data)->save();
        }
    }
}


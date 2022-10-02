<?php

namespace Signup\Form\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use \Signup\Form\Helper\Data;

class Index extends Template
{
    protected $helperData;
    public function __construct(
        Context $context,
        Data $helperData,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->helperData = $helperData;
    }

    public function getFormAction()
    {
        return $this->getUrl('form/signup/save', ['_secure' => true]);
    }

    public function checkForm()
    {
        return $this->helperData->getGeneralConfig("enable");
    }
}

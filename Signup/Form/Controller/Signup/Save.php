<?php
namespace Signup\Form\Controller\Signup;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\View\Result\PageFactory;

use Signup\Form\Api\CustomerRepositoryInterface;
use Signup\Form\Api\Data\CustomerInterface;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_customerRepository;
    protected $_customerModel;


    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        CustomerRepositoryInterface $customerRepository,
        CustomerInterface $customerInterface
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_customerRepository=$customerRepository;
        $this->_customerModel = $customerInterface;
        return parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {

            $this->_customerModel->setName($data["name"]);
            $this->_customerModel->setDate($data["date"]);

            try {
                $this->_customerRepository->save($this->_customerModel);
                $this->messageManager->addSuccess(__('Data Saved'));
            } catch (CouldNotSaveException $e) {
                echo $e->getMessage();
            }
            return $resultRedirect->setPath('*/*/');
        }
    }
}

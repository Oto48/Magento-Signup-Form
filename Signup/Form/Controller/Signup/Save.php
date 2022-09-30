<?php
namespace Signup\Form\Controller\Signup;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {
            /** @var \Signup\Form\Model\Customer $model */
            $model = $this->_objectManager->create('Signup\Form\Model\Customer');
            $model->setData($data);
            $this->_eventManager->dispatch(
                'blog_post_prepare_save',
                ['post' => $model, 'request' => $this->getRequest()]
            );
            try {
                $model->save();
                $this->messageManager->addSuccess(__('Data Saved'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);

//                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the post.'));
            }
//            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/signup');
        }
    }
}

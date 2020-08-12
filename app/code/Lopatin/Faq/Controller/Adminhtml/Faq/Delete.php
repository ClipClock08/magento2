<?php

namespace Lopatin\Faq\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;

class Delete extends Action
{
    const ADMIN_RESOURCE = 'Test';

    protected $resultPageFactory;
    protected $faqFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Lopatin\Faq\Model\FaqFactory $faqFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->faqFactory = $faqFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $faq = $this->faqFactory->create()->load($id);

        if (!$faq) {
            $this->messageManager->addError(__('Unable to process. please, try again.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/', array('_current' => true));
        }

        try {
            $faq->delete();
            $this->messageManager->addSuccess(__('Your faq has been deleted !'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__('Error while trying to delete faq'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/faq/test', array('_current' => true));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/faq/test', array('_current' => true));
    }
}

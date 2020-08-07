<?php

namespace Lopatin\Faq\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;

class Edit extends \Lopatin\Faq\Controller\Adminhtml\Faq
{
    protected $_backendSession;
    protected $_resultPageFactory;
    protected $_resultJsonFactory;

    public function __construct(
        \Magento\Backend\Model\Session $backendSession,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Lopatin\Faq\Model\FaqFactory $faqFactory,
        \Magento\Framework\Registry $registry,
        \Magento\Backend\Model\View\Result\RedirectFactory $resultRedirectFactory,
        \Magento\Backend\App\Action\Context $context
    )
    {
        $this->_backendSession = $backendSession;
        $this->_resultJsonFactory = $resultJsonFactory;
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($faqFactory, $context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Lopatin_Faq::faq');
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('post_id');
        /** @var \Lopatin\Faq\Model\Faq $post */
        $post = $this->getEntity();
        /** @var \Magento\Backend\Model\View\Result\Page|\Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Lopatin_Faq::faq');
        $resultPage->getConfig()->getTitle()->set(__('FAQs'));

        $title = $post->getId() ? $post->getName() : __('New Post');
        $resultPage->getConfig()->getTitle()->prepend($title);
        $data = $this->_backendSession->getData('lopatin_faq_faq_data', true);
        if (!empty($data)) {
            $post->setData($data);
        }
        return $resultPage;
    }
}

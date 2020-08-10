<?php

namespace Lopatin\Faq\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;

class Edit extends \Lopatin\Faq\Controller\Adminhtml\Faq
{
    protected $_resultPageFactory;

    public function __construct(
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Lopatin\Faq\Model\FaqFactory $faqFactory,
        \Magento\Framework\Registry $registry,
        \Magento\Backend\App\Action\Context $context
    )
    {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($faqFactory, $registry, $context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Lopatin_Faq::faq');
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var \Lopatin\Faq\Model\Faq $post */
        $post = $this->_initPost();
        /** @var \Magento\Backend\Model\View\Result\Page|\Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Lopatin_Faq::post');
        $resultPage->getConfig()->getTitle()->set(__('FAQs'));
        if ($id) {
            $post->load($id);
            if (!$post->getId()) {
                $this->messageManager->addError(__('This Post no longer exists.'));
            }
        }
        $title = $post->getId() ? $post->getName() : __('New faq');
        $resultPage->getConfig()->getTitle()->prepend($title);
        if (!empty($data)) {
            $post->setData($data);
        }
        return $resultPage;
    }
}

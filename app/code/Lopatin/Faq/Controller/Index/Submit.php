<?php

namespace Lopatin\Faq\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Lopatin\Faq\Model\FaqFactory;

class Submit extends Action
{
    protected $_pageFactory;
    protected $faqFactory;

    public function __construct(Context $context, PageFactory $pageFactory, FaqFactory $faqFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->faqFactory = $faqFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        $data['status'] = 0;
        if ($data) {
            try {

                $faq = $this->faqFactory->create();

                $data = array_filter($data, function ($value) {
                    return $value !== '';
                });

                $faq->setData($data);
                $faq->save();
                $this->messageManager->addSuccess(__('Successfully saved the item.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('*/index/display');
            } catch (\Exception $d) {
                $this->messageManager->addError($d->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/index/display');
            }
        }

        return $resultRedirect->setPath('*/faq/test');
    }
}

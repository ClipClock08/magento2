<?php

namespace Lopatin\Faq\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;

class Save extends Action
{
    const ADMIN_RESOURCE = 'Index';

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
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if ($data) {
            try {
                $id = $data['post_id'];

                $faq = $this->faqFactory->create()->load($id);

                $data = array_filter($data, function ($value) {
                    return $value !== '';
                });

                $faq->setData($data);
                $faq->save();
                $this->messageManager->addSuccess(__('Successfully saved the item.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('*/faq/test');
            } catch (\Exception $d) {
                $this->messageManager->addError($d->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/faq/edit', ['id' => $faq->getId()]);
            }
        }

        return $resultRedirect->setPath('*/faq/test');
    }
}

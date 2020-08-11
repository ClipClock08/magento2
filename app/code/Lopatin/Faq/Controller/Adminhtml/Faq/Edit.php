<?php

namespace Lopatin\Faq\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;

class Edit extends Action
{
    const ADMIN_RESOURCE = 'Test';

    protected $resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}

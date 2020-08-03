<?php

namespace Lopatin\Faq\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Test extends Action
{
    protected $resultPageFactory = false;

    public function __construct(Action\Context $context, PageFactory $resultPageFactory)
    {

        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend('Админ грид');
        return $resultPage;
    }
}

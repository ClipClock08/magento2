<?php

namespace Lopatin\Faq\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Lopatin\Faq\Model\FaqFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $_postFactory;

    public function __construct(Context $context, PageFactory $pageFactory, FaqFactory $faqFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $faqFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection();
        foreach ($collection as $item) {
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        exit();
        return $this->_pageFactory->create();
    }
}

<?php
namespace Lopatin\Faq\Block\Adminhtml;
use Magento\Framework\View\Element\Template;

class FaqList extends Template
{
    protected $_faqFactory;

    public function __construct(Template\Context $context, FaqFactory $faqFactory)
    {
        $this->_faqFactory = $faqFactory;
        parent::__construct($context);
    }

    function getFaqCollection()
    {
        $faq = $this->_faqFactory->create();
        return $faq->getCollection();
    }
}

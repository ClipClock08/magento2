<?php

namespace Lopatin\Faq\Block;

use Magento\Framework\View\Element\Template;
use Lopatin\Faq\Model\FaqFactory;

class Display extends Template
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

    public function getFormAction()
    {
        return $this->getUrl('myfaq/index/submit', ['_secure' => true]);
    }

    public static function whoAreYou()
    {
        $value = mt_rand(0, 1);
        switch ($value) {
            case 0:
                $result = 'Ты приемный!';
                break;
            case 1:
                $result = 'Я приемный!';
                break;
            default:
                $result = 'Он принмный!';
                break;
        }
        return $data = [
            'value' => $value,
            'result' => $result
        ];
    }
}

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

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('FAQs'));


        if ($this->getFaqCollection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'test.news.pager'
            )->setAvailableLimit(array(5=>5,10=>10,15=>15))->setShowPerPage(true)->setCollection(
                $this->getFaqCollection()
            );
            $this->setChild('pager', $pager);
            $this->getFaqCollection()->load();
        }
        return $this;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
    function getFaqCollection()
    {
        //get values of current page
        $page = ($this->getRequest()->getParam('p')) ? $this->getRequest()->getParam('p') : 1;
        //get values of current limit
        $pageSize = ($this->getRequest()->getParam('limit')) ? $this->getRequest()->getParam('limit') : 5;

        $faq = $this->_faqFactory->create();
        $faq = $faq->getCollection()->addFieldToFilter('status', 1)
            ->setOrder('name', 'ASC')
            ->setPageSize($pageSize)
            ->setCurPage($page);
        return $faq;
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

<?php

namespace Lopatin\Faq\Controller\Index;

use Lopatin\Faq\Helper\Data;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Config extends Action
{
    protected $_helperData;

    public function __construct(Context $context, Data $helperData)
    {
        $this->_helperData = $helperData;
        parent::__construct($context);
    }

    public function execute()
    {
        echo $this->_helperData->getGeneralConfig('enable');
        echo $this->_helperData->getGeneralConfig('display_text');
        exit();
    }
}

<?php

namespace Lopatin\Faq\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;

class Add extends Action
{
    public function execute()
    {
        $this->_forward('edit');
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Lopatin_faq::add');
    }
}

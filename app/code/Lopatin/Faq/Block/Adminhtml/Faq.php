<?php

namespace Lopatin\Faq\Block\Adminhtml;

use Magento\Backend\Block\Widget\Container;

class Faq extends Container
{
    protected function _construct()
    {
        $this->_controller = 'lopatin_faq';
        $this->_blockGroup = 'Lopatin_Faq';
        $this->_headerText = __('My Faq');
        $this->_addButtonLabel = __('Create New Faq');
        parent::_construct();
    }
}

<?php

namespace Lopatin\Faq\Block\Adminhtml;


class Faq extends \Magento\Backend\Block\Widget\Grid\Container
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

<?php

namespace Lopatin\Faq\Block\Adminhtml;


class Faq extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_controller = 'lopatin_faq';
        $this->_blockGroup = 'Lopatin_Faq';
        $this->_headerText = __('My Faq');
        $this->removeButton('addnew');

        $this->buttonList->add(
            'add-faq',
            [
                'label' => __('New Faq'),
                'class' => 'add',
                'onclick' => 'setLocation(\'' . $this->getUrl('*/*/add') . '\')',
                'style' => '    background-color: #ba4000; border-color: #b84002; box-shadow: 0 0 0 1px #007bdb;color: #fff;text-decoration: none;'
            ]
        );

        parent::_construct();
    }
}

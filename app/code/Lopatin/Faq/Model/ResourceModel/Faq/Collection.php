<?php

namespace Lopatin\Faq\Model\ResourceModel\Faq;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'post_id';
    protected $_eventPrefix = 'lopatin_faq_post_collection';

    protected function _construct()
    {
        $this->_init('Lopatin\Faq\Model\Faq', 'Lopatin\Faq\Model\ResourceModel\Faq');
    }
}

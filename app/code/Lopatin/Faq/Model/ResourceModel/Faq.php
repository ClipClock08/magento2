<?php

namespace Lopatin\Faq\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Faq extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('lopatin_faq_post', 'post_id');
    }
}

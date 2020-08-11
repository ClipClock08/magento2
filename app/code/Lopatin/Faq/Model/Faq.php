<?php

namespace Lopatin\Faq\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Faq extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'lopatin_faq_faq';

    protected function _construct()
    {
        $this->_init('Lopatin\Faq\Model\ResourceModel\Faq');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}

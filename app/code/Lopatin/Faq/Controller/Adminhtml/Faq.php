<?php

namespace Lopatin\Faq\Controller\Adminhtml;

use Magento\Backend\App\AbstractAction;
use Magento\Framework\Exception\NotFoundException;

abstract class Faq extends AbstractAction
{
    protected $_faqFactory;

    public function __construct(
        \Lopatin\Faq\Model\FaqFactory $faqFactory,
        \Magento\Backend\App\Action\Context $context
    )
    {
        $this->_faqFactory = $faqFactory;
        parent::__construct($context);
    }

    public function getEntity()
    {
        $this->_faqFactory = $this->_objectManager->get(\Lopatin\Faq\Model\FaqFactory::class);
        /**
         * @var \Lopatin\Faq\Model\Faq $entity
         */
        $entity = $this->_faqFactory->create();
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            $entity->load($id);
            if (!$entity->getId()) {
                $this->messageManager->addError(__('This faq no longer exists.'));
                throw new NotFoundException(__('Not found'));
            }
        }
        return $entity;
    }
}

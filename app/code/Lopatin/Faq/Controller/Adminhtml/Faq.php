<?php

namespace Lopatin\Faq\Controller\Adminhtml;

use Magento\Backend\App\AbstractAction;
use Magento\Framework\Exception\NotFoundException;

abstract class Faq extends AbstractAction
{
    protected $_faqFactory;
    protected $_coreRegistry;

    public function __construct(
        \Lopatin\Faq\Model\FaqFactory $faqFactory,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Backend\App\Action\Context $context
    )
    {
        $this->_faqFactory = $faqFactory;
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    protected function _initPost()
    {
        $postId = (int)$this->getRequest()->getParam('id');
        /** @var \Lopatin\Faq\Model\Faq $post */
        $post = $this->_faqFactory->create();
        if ($postId) {
            $post->load($postId);
        }
        $this->_coreRegistry->register('lopatin_faq_post', $post);
        return $post;
    }
}

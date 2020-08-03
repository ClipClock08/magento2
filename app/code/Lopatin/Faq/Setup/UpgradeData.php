<?php

namespace Lopatin\Faq\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Lopatin\Faq\Model\FaqFactory;

class UpgradeData implements UpgradeDataInterface
{
    protected $_postFactory;

    public function __construct(FaqFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.2.0', '<')) {
            $data = [
                'name' => 'Admin',
                'question' => 'How to enable module?',
                'answer' => 'In command line write php bin/magento ... ',
                'created_at' => '08.08.2020 7:25:00',
                'status' => 1
            ];
            $post = $this->_postFactory->create();
            $post->addData($data)->save();
        }
    }
}

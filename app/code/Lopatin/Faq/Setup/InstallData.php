<?php

namespace Lopatin\Faq\Setup;

use Lopatin\Faq\Model\FaqFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    protected $_postFactory;

    public function __construct(FaqFactory $faqFactory)
    {
        $this->_postFactory = $faqFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            'name' => 'Admin',
            'question' => 'How to disable module?',
            'answer' => 'In command line write php bin/magento ... ',
            'created_at' => '08.08.2020 7:25:00',
            'status' => 1
        ];

        $post = $this->_postFactory->create();
        $post->addData($data)->save();
    }
}

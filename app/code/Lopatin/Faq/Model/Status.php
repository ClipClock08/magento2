<?php

namespace Lopatin\Faq\Model;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    const IN_PROGRESS = 0;
    const APPROVED = 1;
    const CANCELED = 2;


    /**
     * to option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            [
                'value' => self::IN_PROGRESS,
                'label' => __('In progress')
            ],
            [
                'value' => self::APPROVED,
                'label' => __('Approved')
            ],
            [
                'value' => self::CANCELED,
                'label' => __('Canceled')
            ],
        ];
        return $options;

    }
}

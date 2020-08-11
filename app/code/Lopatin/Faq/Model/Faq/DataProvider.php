<?php

namespace Lopatin\Faq\Model\Faq;

use Lopatin\Faq\Model\ResourceModel\Faq\CollectionFactory;
use Lopatin\Faq\Model\Faq;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFaqFactory,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $collectionFaqFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }

        $items = $this->collection->getItems();

        foreach ($items as $faq) {
            $this->_loadedData[$faq->getId()] = $faq->getData();
        }

        return $this->_loadedData;
    }

}

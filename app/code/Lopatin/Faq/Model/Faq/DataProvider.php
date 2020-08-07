<?php

namespace Lopatin\Faq\Model\Faq;

use Lopatin\Faq\Model\ResourceModel\Faq\Collection;
use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{

    /**
     * DataProvider constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param Collection $collection
     * @param array $meta
     * @param array $data
     */
    public function __construct($name, $primaryFieldName, $requestFieldName, Collection $collection, array $meta = [], array $data = [])
    {
        $this->collection = $collection;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();
        foreach ($items as $item) {
            $this->loadedData[$item->getId()]['post_id'] = $item->getData();
        }


        return $this->loadedData;

    }
}

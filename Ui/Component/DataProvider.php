<?php

namespace Codilar\HelloWorld\Ui\Component;
use Codilar\Employee\Model\ResourceModel\Employee\CollectionFactory;
use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Codilar\Employee\Model\EmployeeFactory as ModelFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $loadedData;
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        ModelFactory $modelFactory,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    //to show datas in edit form
//    public function getData()
//    {
//        if (isset($this->loadedData)) {
//            return $this->loadedData;
//        }
//        $items = $this->collection->getItems();
//        $this->loadedData = array();
//        /** @var \Codilar\HelloWOrld\Model\Employee $employee */
//        foreach ($items as $employee) {
//            $this->loadedData[$employee->getEntityId()] = $employee->getData();
//        }

//        $data = $this->dataPersistor->get('employee_index_index');
//        if (!empty($data)) {
//            $page = $this->collection->getNewEmptyItem();
//            $page->setData($data);
//            $this->loadedData[$page->getEntityId()] = $page->getData();
//            $this->dataPersistor->clear('employee_index_index');
//
//        }
//
//        return $this->loadedData;
//   }
}

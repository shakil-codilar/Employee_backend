<?php

namespace Codilar\HelloWorld\Controller\Adminhtml\Index;
use Codilar\Employee\Model\EmployeeFactory as ModelFactory;
use Codilar\Employee\Model\ResourceModel\Employee as ResourceModel;
use Magento\Backend\App\Action\Context;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * @var ModelFactory
     */

    protected $modelFactory;

    /**
     * @var ResourceModel
     */
    protected $resourceModel;

    public function __construct(
        Context $context,
        ModelFactory   $modelFactory,
        ResourceModel  $resourceModel
    )
    {
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
        parent::__construct($context);
    }


    public  function  execute()
    {
        $resultRedirect= $this->resultRedirectFactory->create();
        $emptyBrand = $this->modelFactory->create();
        try {
            $data = $this->getRequest()->getParam('entity_id');

            $deleteBrand=$emptyBrand->load($data);
            $deleteBrand->delete();
            $this->messageManager->addSuccessMessage(__('Employee details of %1 deleted successfully', $emptyBrand->getName()));
            return $resultRedirect->setPath('*/*/index');
        }
        catch (\Exception $e) {
            //$this->messageManager->addError($e->getMessage());
            echo "Error";
        }
    }
}

<?php

namespace Codilar\HelloWorld\Controller\Adminhtml\Index;
use Codilar\Employee\Model\EmployeeFactory as ModelFactory;
use Codilar\Employee\Model\ResourceModel\Employee as ResourceModel;
use Magento\Backend\App\Action\Context;

class Save  extends \Magento\Backend\App\Action
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
        $emptyBrands = $this->modelFactory->create();
        $data = $this->getRequest()->getParams();
        $id =$this->getRequest()->getParam('entity_id');
        $updateBrand=$emptyBrands->load($data['entity_id']);
        $updateBrand->setName($data['name'] );
        $updateBrand->setEmail($data['email'] );
        $updateBrand->setAddress($data['address'] );
        $updateBrand->setPhonenumber($data['phonenumber'] );
        $updateBrand->setIsActive($data['is_active'] );

                $this->resourceModel->save($updateBrand);
                $this->messageManager->addSuccessMessage(__('Record Successfuly Updated'));

            return $resultRedirect->setPath('*/*/edit',['entity_id='>$id]);
    }
}

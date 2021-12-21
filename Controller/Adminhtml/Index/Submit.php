<?php

namespace Codilar\HelloWorld\Controller\Adminhtml\Index;
use Codilar\Employee\Model\EmployeeFactory as ModelFactory;
use Codilar\Employee\Model\ResourceModel\Employee as ResourceModel;
use Magento\Backend\App\Action\Context;

class Submit  extends \Magento\Backend\App\Action
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
        $emptyBrands->setName($data['name'] );
        $emptyBrands->setEmail($data['email'] );
        $emptyBrands->setAddress($data['address'] );
        $emptyBrands->setPhonenumber($data['phonenumber'] );
        $emptyBrands->setIsActive($data['is_active'] );

        $this->resourceModel->save($emptyBrands);
        $this->messageManager->addSuccessMessage(__('Record Successfuly Added'));

        return $resultRedirect->setPath('*/*/index');
    }
}

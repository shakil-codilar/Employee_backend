<?php

namespace Codilar\HelloWorld\Block\Adminhtml\Edit\Form;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Ui\Component\Control\Container;

class DeleteButton extends  GenericButton implements ButtonProviderInterface
{
    public function getButtonData(): array
    {

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $request = $objectManager->get('Magento\Framework\App\RequestInterface');
        $id = $request->getParam('entity_id');
        $data = [
            'label' => __('Delete '),
            'class' => ' delete ',
            'level' => -1,
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'employee_listing.employee_listing',
                                'actionName' => 'delete',
                                'params' => [
                                    true,
                                    ['entity_id' =>$id],
                                ]
                            ]
                        ]
                    ]
                ]
            ],
        ];
        return $data;
    }
}



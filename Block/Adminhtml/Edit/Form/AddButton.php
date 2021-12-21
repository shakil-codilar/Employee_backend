<?php

namespace Codilar\HelloWorld\Block\Adminhtml\Edit\Form;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Ui\Component\Control\Container;

class AddButton extends  GenericButton implements ButtonProviderInterface
{
    public function getButtonData(): array
    {

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $request = $objectManager->get('Magento\Framework\App\RequestInterface');
        $id = $request->getParam('entity_id');
        $data = [
            'label' => __('Save '),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'employee_add_form.employee_add_form',
                                'actionName' => 'submit',
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



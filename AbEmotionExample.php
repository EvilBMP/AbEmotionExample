<?php
namespace AbEmotionExample;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;

class AbEmotionExample extends Plugin
{

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Backend_Emotion' => 'onPostDispatchBackendEmotion',
            'Shopware_Controllers_Widgets_Emotion_AddElement' => 'onEmotionAddElement'
        ];
    }

    public function install(InstallContext $context)
    {
        $this->createEmotionComponent();

        return true;
    }

    public function uninstall(UninstallContext $context)
    {
        return true;
    }

    public function createEmotionComponent()
    {
        /** @var \Shopware\Components\Emotion\ComponentInstaller $installer */
        $installer = $this->container->get('shopware.emotion_component_installer');

        $component = $installer->createOrUpdate(
            $this->getName(),
            'Example',
            [
                'name' => 'Example', // The name for the element
                'template' => 'ab_emotion_example', // The name of the template file which should be used for the frontend theme.
                'xtype' => 'ab-emotion-example', // The xtype of a custom ExtJS component which will be used for the element settings in the backend. When you set the xtype you have to provide the corresponding ExtJS component, otherwise the element will throw an error.
                'cls' => 'ab-emotion-example', // Define a CSS class which will be used for the element template in the frontend theme.
                'description' => 'A simple example element for the shopping worlds.' // A short description which will be shown for your element in the shopping world module.
            ]
        );

        $component->createTextField([
            'name' => 'text',
            'fieldLabel' => 'Text',
            'supportText' => 'Enter the some text.',
            'allowBlank' => true
        ]);
    }

    public function onPostDispatchBackendEmotion(\Enlight_Controller_ActionEventArgs $args)
    {
        $controller = $args->getSubject();
        $view = $controller->View();

        $view->addTemplateDir($this->getPath() . '/Resources/views/');
        $view->extendsTemplate('backend/emotion/ab_emotion_example/view/detail/elements/ab_emotion_example.js');
    }

    public function onEmotionAddElement(\Enlight_Event_EventArgs $args)
    {
        $element = $args->get('element');

        if ($element['component']['xType'] !== 'ab-emotion-example') {
            return;
        }

        $data = $args->getReturn();

        // Do some stuff with the element data

        $args->setReturn($data);
    }

}

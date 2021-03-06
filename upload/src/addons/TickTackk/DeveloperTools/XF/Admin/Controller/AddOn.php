<?php

namespace TickTackk\DeveloperTools\XF\Admin\Controller;

use XF\Mvc\ParameterBag;

class AddOn extends XFCP_AddOn
{
    public function actionDeveloperOptions(ParameterBag $params)
    {
        $addOn = $this->assertAddOnAvailable($params->addon_id_url);

        $viewParams = [
            'addOn' => $addOn
        ];
        return $this->view('TickTackk\DeveloperTools\XF:AddOn\DeveloperOptions', 'developerTools_developer_options', $viewParams);
    }

    public function actionSaveDeveloperOptions(ParameterBag $params)
    {
        $this->assertPostOnly();

        $addOn = $this->assertAddOnAvailable($params->addon_id_url);

        $input = $this->filter([
            'license' => 'str',
            'gitignore' => 'str',
            'readme_md' => 'str'
        ]);

        $addOnId = $addOn->getAddOnId();
        $addOnEntity = $this->em()->findOne('XF:AddOn', ['addon_id' => $addOnId]);
        $addOnEntity->bulkSet($input);
        $addOnEntity->save();

        return $this->redirect($this->buildLink('add-ons'));
    }
}
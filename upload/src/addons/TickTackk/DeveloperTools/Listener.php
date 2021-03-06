<?php

namespace TickTackk\DeveloperTools;

use XF\Mvc\Entity\Entity;

class Listener
{
    public static function XFEntityAddOn_entity_structure(\XF\Mvc\Entity\Manager $em, \XF\Mvc\Entity\Structure &$structure)
    {
        $structure->columns['license'] = ['type' => Entity::STR, 'default' => ''];
        $structure->columns['gitignore'] = ['type' => Entity::STR, 'default' => ''];
        $structure->columns['readme_md'] = ['type' => Entity::STR, 'default' => ''];
    }
}
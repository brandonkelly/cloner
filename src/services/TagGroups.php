<?php
namespace verbb\cloner\services;

use verbb\cloner\base\Service;

use craft\models\TagGroup;

class TagGroups extends Service
{
    // Properties
    // =========================================================================

    public static $matchedRoute = 'tags/index';
    public static $id = 'taggroups';
    public static $title = 'Tag Group';
    public static $action = 'clone/tag-group';


    // Public Methods
    // =========================================================================

    public function setupClonedTagGroup($oldTagGroup, $name, $handle): TagGroup
    {
        $tagGroup = new TagGroup();
        $tagGroup->name = $name;
        $tagGroup->handle = $handle;

        // Set the field layout
        $fieldLayout = $this->getFieldLayout($oldTagGroup->getFieldLayout());
        $tagGroup->setFieldLayout($fieldLayout);

        return $tagGroup;
    }

}
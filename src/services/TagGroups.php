<?php
namespace verbb\cloner\services;

use verbb\cloner\Cloner;
use verbb\cloner\base\Service;

use Craft;
use craft\elements\Tag;
use craft\models\TagGroup;

class TagGroups extends Service
{
    // Properties
    // =========================================================================

    public static string $matchedRoute = 'tags/index';
    public static string $id = 'taggroups';
    public static string $title = 'Tag Group';
    public static string $action = 'clone/tag-group';


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
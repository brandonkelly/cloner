<?php
namespace verbb\cloner\services;

use verbb\cloner\base\Service;

use Craft;
use craft\base\VolumeInterface;

class Volumes extends Service
{
    // Properties
    // =========================================================================

    public static $matchedRoute = 'volumes/volume-index';
    public static $id = 'volumes';
    public static $title = 'Volume';
    public static $action = 'clone/volume';


    // Public Methods
    // =========================================================================

    public function setupClonedVolume($oldVolume, $name, $handle): VolumeInterface
    {
        $volume = Craft::$app->getVolumes()->createVolume([
            'type' => get_class($oldVolume),
            'name' => $name,
            'handle' => $handle,
            'hasUrls' => $oldVolume->hasUrls,
            'url' => $oldVolume->url,
            'settings' => $oldVolume->settings,
        ]);

        // Set the field layout
        $fieldLayout = $this->getFieldLayout($oldVolume->getFieldLayout());
        $volume->setFieldLayout($fieldLayout);

        return $volume;
    }

}
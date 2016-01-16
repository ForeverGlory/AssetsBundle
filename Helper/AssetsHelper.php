<?php

namespace Glory\AssetsBundle\Helper;

use Symfony\Bundle\FrameworkBundle\Templating\Helper\AssetsHelper as BaseAssetsHelper;

/**
 * Description of AssetsHelper
 *
 * @author ForeverGlory
 */
class AssetsHelper extends BaseAssetsHelper
{

    public function getUrl($path, $packageName = null, $version = null)
    {
        return parent::getUrl($path, $packageName, $version);
    }

}

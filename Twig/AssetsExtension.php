<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Glory\AssetsBundle\Twig;

use Symfony\Bridge\Twig\Extension\AssetExtension;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Asset\Packages;
use Symfony\Bridge\Twig\Extension\HttpFoundationExtension;

/**
 * Description of AssetsExtension
 *
 * @author ForeverGlory
 */
class AssetsExtension extends AssetExtension
{

    private $container;

    public function __construct(ContainerInterface $container, Packages $packages, HttpFoundationExtension $foundationExtension = null)
    {
        $this->container = $container;
        parent::__construct($packages, $foundationExtension);
    }

    public function getAssetUrl($path, $packageName = null, $absolute = false, $version = null)
    {
        if (empty($packageName)) {
            $packageName = $this->getDefaultPackage($path);
            if ($packageName) {
                $args = func_get_args();
                $args[1] = $packageName;
                return call_user_func_array('parent::getAssetUrl', $args);
            }
        }
        return parent::getAssetUrl($path, $packageName, $absolute, $version);
    }

    private function getDefaultPackage($path)
    {
        $config = $this->container->getParameter('GloryAssets');
        foreach ($config['packages'] as $name => $package) {
            if (preg_match($package['match'], $path)) {
                return $name;
            }
        }
        return null;
    }

}

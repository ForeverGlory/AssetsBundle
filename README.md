AssetsBundle
===========

Symfony Framework extend of assets
-
Symfony 框架关于Assets的扩展

Introduction
------------

### Composer

Add to `composer.json` in your project to `require` section:

```json
{
    "foreverglory/assets-bundle": "~0.1"
}
```
### Add this bundle to your application's kernel

```php
//app/AppKernel.php
public function registerBundles()
{
    return array(
        // ...
        new Glory\Bundle\AssetsBundle\GloryAssetsBundle(),
        // ...
    );
}
```

### Conﬁgure service in your YAML configuration
```yaml
#app/conﬁg/conﬁg.yml
framework:
    # ...
    templating:
        engines: ['twig']
        assets_version: 1.0.0
        assets_version_format: %%s?v=%%s
        packages:
            image:
                base_urls: ["http://cdn.domain.com"]
            ico:
                version_format: %%s
    # ...
glory_assets:
    packages:
        image:                          #Connection framework.templating.packages.{image}
            match: "/\.(jpg|png)$/"     #php code preg_match($match, $path), if match, use framework.templating.packages.{image}
        ico:
            match: "/favicon\.ico$/"
```
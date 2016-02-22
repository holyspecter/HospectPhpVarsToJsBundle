[![Build Status](https://travis-ci.org/holyspecter/HospectPhpVarsToJsBundle.svg?branch=master)](https://travis-ci.org/holyspecter/HospectPhpVarsToJsBundle)


### Description

Bundle allows you to avoid horrible statements in Twig templates while setting JS variables from PHP ones, like:
```js
var someJsVar = '{{ somePhpVar }}',
    anotherJsVar = '{{ anotherPhpVar }}';
```


### Installation

Simply require it with composer:
```bash
composer require hospect/php-vars-to-js-bundle
```

And register in your `AppKernel.php`:
```php
public function registerBundles()
{
    $bundles = array(
        // some other bundles...
        
        new \Hospect\PhpVarsToJsBundle\HospectPhpToJsBundle(),
    );
        
    return $bundles;
}
```


### Usage

In your controller call:
```php
$this->get('php_to_js')->put([
    'someJsVar' => $somePhpVar,
    // more vars here...
]);
```

Then in Twig template (probably that will be useful to move it to layout):
```html
<script>
    {{ initPhpVars() }}
</script>
```

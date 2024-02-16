# Fignon Twig Engine

This is a simple class to encapsulate the Symfony Twig template engine and use it easily in
the Fignon Framework.

In your Fignon project, run:

```bash
composer require dahkenangnon/fignon-twig-engine
```

Then, use it like this:

```php
//app.php (or index.php) depending of how you call you entry point
declare(strict_types=1);

include_once __DIR__ . "/../vendor/autoload.php";

use Fignon\Tunnel;
use App\Features\Features;
use Fignon\Extra\TwigEngine;

$app = new Tunnel();
$app->set('env', 'development');
// ... other middlewares

// View engine initialization
$app->set('views', dirname(__DIR__) . '/templates');
$app->set('views cache', dirname(__DIR__) . '/var/cache');
$app->set('view engine options', []); // Add options to the view engine
$app->engine('twig', new TwigEngine()); 

$app->set('case sensitive routing', true);
//  ... other middlewares


// You can then use it to render
(new Features($app))->bootstrap();

$app->listen();
```

Other view engine integration to Fignon are:

- [The Plates Engine](https://github.com/dahkenangnon/fignon-plate-engine)
- [The Laravel Blade Engine](https://github.com/dahkenangnon/fignon-blade-engine)
- [The Smarty Engine](https://github.com/dahkenangnon/fignon-smarty-engine)


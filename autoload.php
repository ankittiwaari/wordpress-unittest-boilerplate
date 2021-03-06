<?php

spl_autoload_register(function ($class_name) {

    if ($class_name === 'tests') {
        return;
    }

    $theme_name = 'onecom-moments';

    $class_paths = [
        __DIR__ . '/src/' . $class_name . '.php',
        __DIR__ . '/src/' . $theme_name . '/class-' . $class_name . '.php',        
    ];

    foreach ($class_paths as $path) {
        if (file_exists($path)) {
            require_once $path;
        }
    }
});


/**
 * PHPUnit bootstrap file
 */


$test_lib_path = __DIR__ . '/wp-test-lib/tests/phpunit';


if (!file_exists($test_lib_path . '/includes/functions.php')) {
    echo "Could not find $test_lib_path/includes/functions.php" . PHP_EOL; 
    exit(1);
}

// tests_add_filter() to be made accessible
require_once $test_lib_path . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
function aoc_load_plugins()
{

}

tests_add_filter('muplugins_loaded', 'aoc_load_plugins');

// Start up the WP testing environment.
require $test_lib_path . '/includes/bootstrap.php';

<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

view()->share('errors', new Illuminate\Support\ViewErrorBag());

$response = app(App\Http\Controllers\CarWashController::class)->index();
$html = $response->render();

// Replace all localhost URLs with clean relative paths
$html = preg_replace('#https?://localhost(:[0-9]+)?/#i', '/', $html);
$html = preg_replace('#https?://localhost(:[0-9]+)?#i', '', $html);

// Ensure dist directory exists
$distDir = __DIR__ . '/dist';
if (!is_dir($distDir)) {
    mkdir($distDir, 0755, true);
}

// Function to copy directories recursively
function copyDir($src, $dst) {
    if (!is_dir($src)) return;
    if (!is_dir($dst)) mkdir($dst, 0755, true);
    $dir = opendir($src);
    while (false !== ($file = readdir($dir))) {
        if ($file !== '.' && $file !== '..') {
            if (is_dir($src . '/' . $file)) {
                copyDir($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

// Copy public assets to dist
copyDir(__DIR__ . '/public/css', $distDir . '/css');
copyDir(__DIR__ . '/public/js', $distDir . '/js');
copyDir(__DIR__ . '/public/images', $distDir . '/images');

if (file_exists(__DIR__ . '/public/favicon.svg')) {
    copy(__DIR__ . '/public/favicon.svg', $distDir . '/favicon.svg');
}
if (file_exists(__DIR__ . '/public/favicon.ico')) {
    copy(__DIR__ . '/public/favicon.ico', $distDir . '/favicon.ico');
}
if (file_exists(__DIR__ . '/public/robots.txt')) {
    copy(__DIR__ . '/public/robots.txt', $distDir . '/robots.txt');
}

file_put_contents($distDir . '/index.html', $html);

echo "dist/index.html & assets successfully exported!\n";
echo "Total HTML size: " . strlen($html) . " bytes\n";

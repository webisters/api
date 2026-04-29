<?php declare(strict_types=1);
/*
 * This file is part of API Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
if (PHP_SAPI === 'cli-server') {
    $requestPath = (string) (parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/');
    $requestPath = rawurldecode($requestPath);
    $file = __DIR__ . $requestPath;
    if ($requestPath !== '/' && is_file($file)) {
        return false;
    }
}

(require __DIR__ . '/../boot/app.php')->runHttp();

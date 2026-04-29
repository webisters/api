<?php declare(strict_types=1);
/*
 * This file is part of API Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * @package api
 */

/**
 * Load environment variables from .env.php if it exists.
 */
if (is_file(dirname(__DIR__) . '/.env.php')) {
    require dirname(__DIR__) . '/.env.php';
    if (isset($_ENV['ENVIRONMENT'])) {
        $_SERVER['ENVIRONMENT'] = $_ENV['ENVIRONMENT'];
    }
}

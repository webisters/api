<?php declare(strict_types=1);
/*
 * This file is part of API Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Api\Models;

use Framework\MVC\Model;

final class HealthModel extends Model
{
    public static function status() : string
    {
        return 'ok';
    }

    public static function version() : string
    {
        return '1.0.0';
    }
}
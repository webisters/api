<?php declare(strict_types=1);
/*
 * This file is part of API Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Api\Controllers;

use Api\Models\HealthModel;
use Framework\HTTP\Response;
use Framework\Routing\RouteActions;

final class Home extends RouteActions
{
    public function index(): Response
    {
        return success_response([
            'message' => 'API is running.',
            'status' => HealthModel::status(),
        ]);
    }

    public function about(): Response
    {
        return success_response([
            'message' => 'API project powered by Webisters framework.',
            'version' => HealthModel::version(),
        ]);
    }

    public function notFound(): Response
    {
        return respond_not_found();
    }
}
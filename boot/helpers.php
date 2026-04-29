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

use Framework\Helpers\ArraySimple;
use Framework\HTTP\Response;

/**
 * Load helper files.
 *
 * @param array<int,string>|string $helper A list of helper names as array
 * or a helper name as string
 *
 * @return array<int,string> A list of all loaded files
 */
function helpers(array | string $helper): array
{
    if (is_array($helper)) {
        $files = [];
        foreach ($helper as $item) {
            $files[] = helpers($item);
        }
        return array_merge(...$files);
    }
    $files = App::locator()->findFiles('Helpers/' . $helper);
    foreach ($files as $file) {
        require_once $file;
    }
    return $files;
}

/**
 * Get a URL for a public asset.
 *
 * @param string $path The asset path relative to public/
 *
 * @return string
 */
function asset(string $path): string
{
    $path = trim($path, '/');
    $documentRoot = rtrim($_SERVER['DOCUMENT_ROOT'] ?? '', '/\\');
    if ($documentRoot !== '') {
        $direct = $documentRoot . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $path);
        if (!is_file($direct)) {
            $public = $documentRoot . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR
                . str_replace('/', DIRECTORY_SEPARATOR, $path);
            if (is_file($public)) {
                return '/public/' . str_replace('\\', '/', $path);
            }
        } else {
            return '/' . str_replace('\\', '/', $path);
        }
    }

    return '/public/' . $path;
}

/**
 * Return a JSON response.
 *
 * @param mixed $data The data to encode
 * @param int $code The HTTP status code
 * @param array<string,mixed> $headers Additional headers
 *
 * @return Response
 */
function json_response($data, int $code = 200, array $headers = []): Response
{
    $response = App::response();
    $response->setStatusCode($code);
    
    foreach ($headers as $name => $value) {
        $response->setHeader($name, $value);
    }
    
    $response->setHeader('Content-Type', 'application/json; charset=UTF-8');
    $response->setBody(json_encode($data, \JSON_UNESCAPED_SLASHES | \JSON_PRETTY_PRINT));
    
    return $response;
}

/**
 * Return an error JSON response.
 *
 * @param string $message The error message
 * @param int $code The HTTP status code
 * @param mixed $details Optional error details
 *
 * @return Response
 */
function error_response(string $message, int $code = 400, $details = null): Response
{
    $data = [
        'success' => false,
        'message' => $message,
        'code' => $code,
    ];
    
    if ($details !== null) {
        $data['details'] = $details;
    }
    
    return json_response($data, $code);
}

/**
 * Return a success JSON response.
 *
 * @param mixed $data The response data
 * @param int $code The HTTP status code
 * @param string|null $message Optional success message
 *
 * @return Response
 */
function success_response($data, int $code = 200, ?string $message = null): Response
{
    $response = [
        'success' => true,
        'data' => $data,
    ];
    
    if ($message !== null) {
        $response['message'] = $message;
    }
    
    return json_response($response, $code);
}

/**
 * Get the current URL.
 *
 * @return string
 */
function current_url(): string
{
    return App::request()->getUrl()->toString();
}

/**
 * Get an environment variable with optional default value.
 *
 * @param string $key The environment variable key (dot notation supported)
 * @param mixed $default The default value if not found
 *
 * @return mixed
 */
function env(string $key, $default = null)
{
    $value = $_ENV[$key] ?? null;
    
    if ($value === null && str_contains($key, '.')) {
        [$primary, $secondary] = array_pad(explode('.', $key, 2), 2, null);
        $value = $_ENV[$primary][$secondary] ?? null;
    }
    
    return $value ?? $default;
}

/**
 * Respond with not found (404) JSON response.
 *
 * @return Response
 */
function respond_not_found(): Response
{
    return error_response('Not Found', 404, [
        'path' => App::request()->getUrl()->getPath(),
        'method' => App::request()->getMethod(),
    ]);
}

<?php declare(strict_types=1);
/*
 * This file is part of API Project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Api\Commands;

use Framework\CLI\CLI;

/**
 * Class Index.
 *
 * @package api
 */
class Index extends \Framework\CLI\Commands\Index
{
    protected function showHeader() : void
    {
        $banner = <<<'EOL'
        $$\      $$\ $$$$$$$$\ $$$$$$$\  $$$$$$\  $$$$$$\ $$$$$$$$\ $$$$$$$$\ $$$$$$$\   $$$$$$\  
        $$ | $\  $$ |$$  _____|$$  __$$\ \_$$  _|$$  __$$\\__$$  __|$$  _____|$$  __$$\ $$  __$$\ 
        $$ |$$$\ $$ |$$ |      $$ |  $$ |  $$ |  $$ /  \__|  $$ |   $$ |      $$ |  $$ |$$ /  \__|
        $$ $$ $$\$$ |$$$$$\    $$$$$$$\ |  $$ |  \$$$$$$\    $$ |   $$$$$\    $$$$$$$  |\$$$$$$\  
        $$$$  _$$$$ |$$  __|   $$  __$$\   $$ |   \____$$\   $$ |   $$  __|   $$  __$$<  \____$$\ 
        $$$  / \$$$ |$$ |      $$ |  $$ |  $$ |  $$\   $$ |  $$ |   $$ |      $$ |  $$ |$$\   $$ |
        $$  /   \$$ |$$$$$$$$\ $$$$$$$  |$$$$$$\ \$$$$$$  |  $$ |   $$$$$$$$\ $$ |  $$ |\$$$$$$  |
        \__/     \__|\________|\_______/ \______| \______/   \__|   \________|\__|  \__| \______/ 
        EOL;
        CLI::write($banner, 'green');
    }
}

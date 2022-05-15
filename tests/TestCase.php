<?php

namespace Pawlox\VideoThumbnail\Tests;

use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Pawlox\VideoThumbnail\VideoThumbnailServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            VideoThumbnailServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app->useEnvironmentPath(__DIR__.'/..');
        $app->bootstrapWith([LoadEnvironmentVariables::class]);
        parent::getEnvironmentSetUp($app);
    }
}

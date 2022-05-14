<?php

namespace Pawlox\VideoThumbnail\Tests;

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
        // perform environment setup
    }
}

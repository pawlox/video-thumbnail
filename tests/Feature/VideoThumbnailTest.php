<?php

namespace Vendor\Packages\Tests\Feature;

use Orchestra\Testbench\TestCase;
use Pawlox\VideoThumbnail\Facade\VideoThumbnail;

class VideoThumbnailTest extends TestCase
{
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app->useStoragePath(realpath(__DIR__.'/../storage') );
    }

    protected function getPackageProviders($app)
    {
        return ['Pawlox\VideoThumbnail\VideoThumbnailServiceProvider'];
    }

    protected function getPackageAliases($app)
    {
        return [
            'VideoThumbnail' => 'Pawlox\VideoThumbnail\Facade\VideoThumbnail'
        ];
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateJpgThumbnail()
    {
        VideoThumbnail::createThumbnail(storage_path('SampleVideo.mp4'), storage_path(), 'SampleVideoThumbnail.jpg', 2, $width = 640, $height = 480);
        $this->assertFileExists(storage_path('SampleVideoThumbnail.jpg'));
    }
}

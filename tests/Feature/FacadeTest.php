<?php

namespace Pawlox\VideoThumbnail\Tests\Feature;

use Illuminate\Support\Facades\File;
use Pawlox\VideoThumbnail\Facade\VideoThumbnail;
use Pawlox\VideoThumbnail\Tests\TestCase;

class FacadeTest extends TestCase
{
    /**
     * Creating default thumbnail from first second of video.
     *
     * @return void
     */
    public function test_creating_thumbnail_test()
    {
        VideoThumbnail::createThumbnail(
            __DIR__ . '/../example_data/example_video.mp4',
            base_path('/'),
            'video_thumbnail.jpg',
            1,
        );

        $this->assertTrue(File::exists(base_path('video_thumbnail.jpg')));
        $this->assertFileEquals(
            __DIR__ . '/../example_data/example_video_thumbnail.jpg',
            base_path('video_thumbnail.jpg'),
        );

        $imageSize = getimagesize(base_path('video_thumbnail.jpg'));

        $this->assertEquals(640, $imageSize[0]);
        $this->assertEquals(480, $imageSize[1]);
    }

    /**
     * Creating thumbnail with custom output image dimension.
     *
     * @return void
     */
    public function test_creating_thumbnail_with_custom_dimensions_test()
    {
        VideoThumbnail::createThumbnail(
            __DIR__ . '/../example_data/example_video.mp4',
            base_path('/'),
            'video_thumbnail.jpg',
            1,
            320,
            240,
        );

        $this->assertTrue(File::exists(base_path('video_thumbnail.jpg')));
        $this->assertFileEquals(
            __DIR__ . '/../example_data/example_video_thumbnail_320p.jpg',
            base_path('video_thumbnail.jpg'),
        );

        $imageSize = getimagesize(base_path('video_thumbnail.jpg'));

        $this->assertEquals(320, $imageSize[0]);
        $this->assertEquals(240, $imageSize[1]);
    }

    /**
     * Creating thumbnail with custom source time.
     *
     * @return void
     */
    public function test_creating_thumbnail_with_custom_time_test()
    {
        VideoThumbnail::createThumbnail(
            __DIR__ . '/../example_data/example_video.mp4',
            base_path('/'),
            'video_thumbnail.jpg',
            10,
        );

        $this->assertTrue(File::exists(base_path('video_thumbnail.jpg')));
        $this->assertFileEquals(
            __DIR__ . '/../example_data/example_video_thumbnail_10s.jpg',
            base_path('video_thumbnail.jpg'),
        );

        $imageSize = getimagesize(base_path('video_thumbnail.jpg'));

        $this->assertEquals(640, $imageSize[0]);
        $this->assertEquals(480, $imageSize[1]);
    }

    /**
     * Creating thumbnail with custom source time and output image dimensions.
     *
     * @return void
     */
    public function test_creating_thumbnail_with_custom_dimensions_and_time_test()
    {
        VideoThumbnail::createThumbnail(
            __DIR__ . '/../example_data/example_video.mp4',
            base_path('/'),
            'video_thumbnail.jpg',
            5,
            100,
            100,
        );

        $this->assertTrue(File::exists(base_path('video_thumbnail.jpg')));
        $this->assertFileEquals(
            __DIR__ . '/../example_data/example_video_thumbnail_5s_100p.jpg',
            base_path('video_thumbnail.jpg'),
        );

        $imageSize = getimagesize(base_path('video_thumbnail.jpg'));

        $this->assertEquals(100, $imageSize[0]);
        $this->assertEquals(100, $imageSize[1]);
    }

    protected function tearDown(): void
    {
        if (File::exists(base_path('video_thumbnail.jpg'))) {
            File::delete(base_path('video_thumbnail.jpg'));
        }
    }
}

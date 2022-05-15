## Video Thumbnail

Simple package for generating video thumbnail in Laravel using FFMpeg.

## Support my work

If you want to support my work in other way than contributing the code itself, you can always pass me some small donation :beer: at https://paypal.me/pawlox :)

## Installation

Composer install:

```
composer require pawlox/video-thumbnail
```

After package installation, add the ServiceProvider to the providers array in config/app.php

```
Pawlox\VideoThumbnail\VideoThumbnailServiceProvider::class
```

And to the aliases array

```
'VideoThumbnail' => Pawlox\VideoThumbnail\Facade\VideoThumbnail::class
```

Also you can publish package config file with:

```
php artisan vendor:publish --tag=video-thumbnail
```

and set ffmpeg and ffprobe paths in .env file:

```
FFMPEG="/usr/bin/ffmpeg"
FFPROBE="/usr/bin/ffprobe"
```

## Versions

| Laravel             | PHP                | pawlox/video-thumbnail | php-ffmpeg/php-ffmpeg |
|---------------------|--------------------|------------------------|-----------------------|
| \>= ^5.0 and < ^5.8 | < 7.4              | ^1.*                   | 0.11.0                |
| ^5.8 and ^6.*       | \>= 7.4 and <= 8.1 | ^2.*                   | 0.13.0                |
| ^7.* and ^8.*       | \>= 7.4 and <= 8.1 | ^3.*                   | 0.19.0                |

## Usage

```
VideoThumbnail::createThumbnail(
    $videoUrl, 
    $storageUrl, 
    $fileName, 
    $second, 
    $width = 640, 
    $height = 480
);
```

**$videoUrl** - absolute path to video file,  
**$storageUrl** - absolute path where the thumbnail should be save,  
**$fileName** - name of thumbnail file,  
**$second** - from which second of the movie thumbnail should be created,  
**$width** [Optional] - width (in pixels) of the thumbnail (default 640),  
**$height** [Optional] - height (in pixels) of the thumbnail (default 480).

## Example

```
VideoThumbnail::createThumbnail(
    public_path('files/movie.mp4'), 
    public_path('files/thumbs/'), 
    'movie.jpg', 
    2, 
    1920, 
    1080
);
```

<?php

namespace Flynt\Features\TimberLoader;

use Flynt\Utils\TwigExtensionFlynt;
use Flynt;
use Timber\Image;
use Timber\Post;
use Timber\Timber;
use Twig_SimpleFunction;

define(__NAMESPACE__ . '\NS', __NAMESPACE__ . '\\');

// Convert ACF Images to Timber Images
add_filter('acf/format_value/type=image', NS . 'formatImage', 100);

// Convert ACF Gallery Images to Timber Images
add_filter('acf/format_value/type=gallery', NS . 'formatGallery', 100);

// Convert ACF Field of type post_object to a Timber\Post and add all ACF Fields of that Post
add_filter('acf/format_value/type=post_object', NS . 'formatPostObject', 100);

add_filter('get_twig', function ($twig) {
    $twig->addExtension(new TwigExtensionFlynt());
    return $twig;
});

function formatImage($value)
{
    if (!empty($value)) {
        $value = new Image($value);
    }
    return $value;
}

function formatGallery($value)
{
    if (!empty($value)) {
        $value = array_map(function ($image) {
            return new Image($image);
        }, $value);
    }
    return $value;
}

function formatPostObject($value)
{
    if (is_array($value)) {
        $value = array_map(NS . 'convertToTimberPost', $value);
    } else {
        $value = convertToTimberPost($value);
    }
    return $value;
}

function convertToTimberPost($value)
{
    if (!empty($value) && is_object($value) && get_class($value) === 'WP_Post') {
        $value = new Post($value);
    }
    return $value;
}

add_action('timber/twig/filters', function ($twig) {
    $twig->addFunction(new \Twig_SimpleFunction('transparentPng', function ($aspect, $r = 0, $g = 0, $b = 0, $a = 127) {
        $ratio = aspectToRatio($aspect);
        //create image with specified sizes
        $image = imagecreatetruecolor($ratio['width'], $ratio['height']);
        //saving all full alpha channel information
        imagesavealpha($image, true);
        //setting completely transparent color
        $transparent = imagecolorallocatealpha($image, $r, $g, $b, $a);
        //filling created image with transparent color
        imagefill($image, 0, 0, $transparent);
        ob_start(); // Let's start output buffering.
        imagepng($image); //This will normally output the image, but because of ob_start(), it won't.
        $contents = ob_get_contents(); //Instead, output above is saved to $contents
        ob_end_clean(); //End the output buffer.

        return "data:image/png;base64," . base64_encode($contents);
    }));

    return $twig;
});

function aspectToRatio($n, $tolerance = 1.e-3)
{
    $h1 = 1;
    $h2 = 0;
    $k1 = 0;
    $k2 = 1;
    $b = 1 / $n;
    do {
        $b = 1/$b;
        $a = floor($b);
        $aux = $h1;
        $h1 = $a * $h1 + $h2;
        $h2 = $aux;
        $aux = $k1;
        $k1 = $a * $k1 + $k2;
        $k2 = $aux;
        $b = $b - $a;
    } while (abs($n - $h1 / $k1) > $n * $tolerance);

    return [
        'width' => $h1,
        'height' => $k1
    ];
}

function generateToken($args)
{
    return crypt(serialize($args), NONCE_SALT);
}

add_action('timber/twig/filters', function ($twig) {
    $twig->addFilter(new \Twig_SimpleFilter('resizeDynamic', function ($src, $w, $h = 0, $crop = 'default', $force = false) {
        $arguments = [
            'src' => $src,
            'w' => $w,
            'h' => $h,
            'crop' => $crop,
            'force' => $force,
        ];
        $arguments['token'] = generateToken($arguments);
        return add_query_arg($arguments, home_url('dynamic-images'));
    }));
    return $twig;
});

<?php
/**
 * @author David Namenyi <dnamenyi@gmail.com>
 * Date: 2016.04.13.
 */

$imageSets = [
    ['images/avatar1.jpg', 'images/avatar2.jpg'],
    ['images/black.jpg', 'images/white.jpg'],
    ['images/php-elephant.jpg', 'images/php-elephant.jpg']
];

/**
 * Returns the percentage difference between two images.
 *
 * @return float
 */
function getDiff(array $imageSet) {
    $image1 = new imagick($imageSet[0]);
    $image2 = new imagick($imageSet[1]);

    $result = $image1->compareImages($image2, Imagick::METRIC_MEANSQUAREERROR);
    return round($result[1] * 100, 2);
}

?>


<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Image Comparison with Imagick</title>
  <style type="text/css">
    img { box-shadow: 4px 4px 10px #C3C3C3; }
    img.left { float: left; margin-right: 10px; }
    hr {margin: 40px 0;}
  </style>
</head>

<body>

    <h1>Image Comparison with Imagick</h1>

    <?php foreach ($imageSets as $imageSet): ?>

        <div>
            <img src="<?= $imageSet[0] ?>" class="left">
            <img src="<?= $imageSet[1] ?>">
            <p>
                <?= sprintf('The difference between the images is %g%%.', getDiff($imageSet)); ?>
            </p>
        </div>
        <hr>

    <?php endforeach; ?>

</body>
</html>

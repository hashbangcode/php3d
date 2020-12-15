<?php

set_error_handler(function ($severity, $message, $file, $line) {
    throw new \ErrorException($message, $severity, $severity, $file, $line);
});

require('../vendor/autoload.php');

use hashbangcode\php3d\Vertex;
use hashbangcode\php3d\Scene;
use hashbangcode\php3d\MatrixCalculations;
use hashbangcode\php3d\Matrix;

$scene = new Scene();

bcscale(50);

$cubeBottom = -10;
$cubeTop = 10;

for ($i = $cubeBottom; $i <= $cubeTop; ++$i) {
  $scene->add(new Vertex($i, $cubeBottom, $cubeTop));
  $scene->add(new Vertex($i, $cubeTop, $cubeTop));
  $scene->add(new Vertex($cubeTop, $i, $cubeTop));
  $scene->add(new Vertex($cubeBottom, $i, $cubeTop));

  $scene->add(new Vertex($i, $cubeBottom, $cubeBottom));
  $scene->add(new Vertex($i, $cubeTop, $cubeBottom));
  $scene->add(new Vertex($cubeTop, $i, $cubeBottom));
  $scene->add(new Vertex($cubeBottom, $i, $cubeBottom));
}

for ($i = $cubeBottom; $i <= $cubeTop; ++$i) {
  $scene->add(new Vertex($cubeBottom, $cubeTop, $i));
  $scene->add(new Vertex($cubeTop, $cubeTop, $i));
  $scene->add(new Vertex($cubeTop, $cubeBottom, $i));
  $scene->add(new Vertex($cubeBottom, $cubeBottom, $i));
}

$scene->add(new Vertex($cubeBottom, $cubeTop, $cubeTop));
$scene->add(new Vertex($cubeTop, $cubeTop, $cubeTop));
$scene->add(new Vertex($cubeTop, $cubeBottom, $cubeTop));
$scene->add(new Vertex($cubeBottom, $cubeBottom, $cubeTop));

$scene->add(new Vertex($cubeBottom, $cubeTop, $cubeBottom));
$scene->add(new Vertex($cubeTop, $cubeTop, $cubeBottom));
$scene->add(new Vertex($cubeTop, $cubeBottom, $cubeBottom));
$scene->add(new Vertex($cubeBottom, $cubeBottom, $cubeBottom));

$imageX = 50;
$imageY = 50;

$output = [];

$output = array_fill(0, $imageX, array_fill(0, $imageY, ' '));

while (true) {
  $frame = $output;

  foreach ($scene as $key => $sceneVertex) {
    $sceneVertex->rotateY(0.005);
    $sceneVertex->rotateX(0.01);
    $sceneVertex->rotateZ(0.02);

    $translationMatrix = new Matrix();
    $translationMatrix->setMatrix([
      [1, 0, 0],
      [0, 1, 0],
      [0, 0, 0],
    ]);

    $newVertex = MatrixCalculations::multiply($sceneVertex, $translationMatrix);
    $x = $newVertex->x + $imageX/2;
    $y = $newVertex->y + $imageY/2;

    if ($sceneVertex->z < 0) {
      $frame[$x][$y] = '□';
    } else {
      $frame[$x][$y] = '.';
    }
  }

  foreach ($frame as $id => $frameX) {
    $frame[$id] = implode(' ', $frame[$id]);
  }

  replaceCommandOutput($frame);
  usleep(60000);
}

function replaceCommandOutput(array $output) {
  static $oldLines = 0;
  $numNewLines = count($output) - 1;

  if ($oldLines == 0) {
    $oldLines = $numNewLines;
  }

  echo implode(PHP_EOL, $output);
  echo chr(27) . "[0G";
  echo chr(27) . "[" . $oldLines . "A";

  $numNewLines = $oldLines;
}

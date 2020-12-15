<?php

namespace hashbangcode\php3d;

class MatrixCalculations {

  public static function multiply(Vertex $vertex, Matrix $matrix) {
    $theMatrix = $matrix->getMatrix();

    $x = ($vertex->x * $theMatrix[0][0]) + ($vertex->y * $theMatrix[0][1]) + ($vertex->z * $theMatrix[0][2]);
    $y = ($vertex->x * $theMatrix[1][0]) + ($vertex->y * $theMatrix[1][1]) + ($vertex->z * $theMatrix[1][2]);
    $z = ($vertex->x * $theMatrix[2][0]) + ($vertex->y * $theMatrix[2][1]) + ($vertex->z * $theMatrix[2][2]);

    return new Vertex($x, $y, $y);
  }

}

<?php

namespace hashbangcode\php3d;

/**
 * Class Vertex.
 *
 * A vertex is a single point in a 3d space. This is the fundamental unit of 3d environments.
 *
 * @package hashbangcode\php3d
 */
class Vertex implements VertexInterface {

  /**
   * @var float
   * The x axis.
   */
  public $x;

  /**
   * @var float
   * The y axis.
   */
  public $y;

  /**
   * @var float
   * The z axis.
   */
  public $z;

  /**
   * Vertex constructor.
   *
   * @param float $x
   *   The x axis.
   * @param float $y
   *   The y axis.
   * @param float $z
   *   The z axis.
   */
  public function __construct($x, $y, $z) {
    $this->setX($x);
    $this->setY($y);
    $this->setZ($z);
  }

  /**
   * Set the x axis of the Vertex.
   *
   * @param float $x
   *   The x axis.
   */
  public function setX($x) {
    $this->x = $x;
  }

  /**
   * Set the y axis of the Vertex.
   *
   * @param float $y
   *   The y axis.
   */
  public function setY($y) {
    $this->y = $y;
  }

  /**
   * Set the z axis of the Vertex.
   *
   * @param float $z
   *   The z axis.
   */
  public function setZ($z) {
    $this->z = $z;
  }

  /**
   * Translate the vertex by a vertex amount.
   *
   * @param VertexInterface $vertex
   *   The vertex to use as the translation.
   */
  public function translate(VertexInterface $vertex) {
    $this->setX($this->x + $vertex->x);
    $this->setY($this->y + $vertex->y);
    $this->setZ($this->z + $vertex->z);
  }

  /**
   * Rotate the Vertex in the x axis.
   *
   * @param float $angle
   *   The number of radians to rotate.
   */
  public function rotateX($angle) {
    $matrix = [
      [1, 0, 0],
      [0, cos($angle), sin($angle)],
      [0, -sin($angle), cos($angle)],
    ];

    $x = ($this->x * $matrix[0][0]) + ($this->y * $matrix[0][1]) + ($this->z * $matrix[0][2]);
    $y = ($this->x * $matrix[1][0]) + ($this->y * $matrix[1][1]) + ($this->z * $matrix[1][2]);
    $z = ($this->x * $matrix[2][0]) + ($this->y * $matrix[2][1]) + ($this->z * $matrix[2][2]);

    $this->x = $x;
    $this->y = $y;
    $this->z = $z;
  }

  /**
   * Rotate the Vertex in the y axis.
   *
   * @param float $angle
   *   The number of radians to rotate.
   */
  public function rotateY($angle) {
    $matrix = [
      [cos($angle), 0, -sin($angle)],
      [0, 1, 0],
      [sin($angle), 0, cos($angle)],
    ];

    $x = ($this->x * $matrix[0][0]) + ($this->y * $matrix[0][1]) + ($this->z * $matrix[0][2]);
    $y = ($this->x * $matrix[1][0]) + ($this->y * $matrix[1][1]) + ($this->z * $matrix[1][2]);
    $z = ($this->x * $matrix[2][0]) + ($this->y * $matrix[2][1]) + ($this->z * $matrix[2][2]);

    $this->x = $x;
    $this->y = $y;
    $this->z = $z;
  }

  /**
   * Rotate the Vertex in the z axis.
   *
   * @param float $angle
   *   The number of radians to rotate.
   */
  public function rotateZ($angle) {
    $matrix = [
      [cos($angle), sin($angle), 0],
      [-sin($angle), cos($angle), 0],
      [0, 0, 1],
    ];

    $x = ($this->x * $matrix[0][0]) + ($this->y * $matrix[0][1]) + ($this->z * $matrix[0][2]);
    $y = ($this->x * $matrix[1][0]) + ($this->y * $matrix[1][1]) + ($this->z * $matrix[1][2]);
    $z = ($this->x * $matrix[2][0]) + ($this->y * $matrix[2][1]) + ($this->z * $matrix[2][2]);

    $this->x = $x;
    $this->y = $y;
    $this->z = $z;
  }

  /**
   * Multiple the Vertex by a matrix.
   *
   * @param Matrix $matrix
   */
  public function multiply(Matrix $matrix) {
    $theMatrix = $matrix->getMatrix();
    $this->x = ($this->x * $theMatrix[0][0]) + ($this->y * $theMatrix[0][1]) + ($this->z * $theMatrix[0][2]);
    $this->y = ($this->x * $theMatrix[1][0]) + ($this->y * $theMatrix[1][1]) + ($this->z * $theMatrix[1][2]);
    $this->z = ($this->x * $theMatrix[2][0]) + ($this->y * $theMatrix[2][1]) + ($this->z * $theMatrix[2][2]);
  }

  /**
   * Render some debugging information about the Vertex.
   *
   * @return string
   *   The variables in the vertex.
   */
  public function __toString() {
    $output = '';
    $output .= 'x:' . $this->x . ' y:' . $this->y . ' z:' . $this->z;
    return $output;
  }

}

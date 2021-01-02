<?php

namespace hashbangcode\php3d;

/**
 * Class Scene.
 *
 * The scene is a collection of objects in a 3d space.
 *
 * @package hashbangcode\php3d
 */
class Scene implements \Iterator {

  protected $scene = [];

  private $position = 0;

  public function add(VertexInterface $vertex) {
    $this->scene[] = $vertex;
  }

  public function count() {
    return count($this->scene);
  }

  /**
   * {@inheritdoc}
   */
  public function current() {
    return $this->scene[$this->position];
  }

  /**
   * {@inheritdoc}
   */
  public function next() {
    ++$this->position;
  }

  /**
   * {@inheritdoc}
   */
  public function key() {
    return $this->position;
  }

  /**
   * {@inheritdoc}
   */
  public function valid() {
    return isset($this->scene[$this->position]);
  }

  /**
   * {@inheritdoc}
   */
  public function rewind() {
    $this->position = 0;
  }


  /**
   * Sort the scene.
   *
   * @param string $sortBy
   *   The vertex property to sort by.
   *
   * @return $this
   *   The current object.
   */
  public function sort($sortBy = 'z') {
    usort($this->scene, function ($a, $b) use ($sortBy) {

      switch ($sortBy) {
        case 'x':
          $aValue = $a->x;
          $bValue = $b->x;
          break;
        case 'y':
          $aValue = $a->y;
          $bValue = $b->y;
          break;
        case 'z':
        default:
          $aValue = $a->z;
          $bValue = $b->z;
          break;
      }

      return $aValue <=> $bValue;
    });

    return $this;
  }
}

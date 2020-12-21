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

}

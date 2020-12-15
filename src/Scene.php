<?php

namespace hashbangcode\php3d;

class Scene implements \Iterator {

  protected $scene = [];

  private $position = 0;

  public function add(VertexInterface $vertex) {
    $this->scene[] = $vertex;
  }

  public function count() {
    return count($this->scene);
  }

  public function current() {
    return $this->scene[$this->position];
  }

  public function next() {
    ++$this->position;
  }

  public function key() {
    return $this->position;
  }

  public function valid() {
    return isset($this->scene[$this->position]);
  }

  public function rewind() {
    $this->position = 0;
  }

}

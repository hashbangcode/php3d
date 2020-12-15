<?php

namespace hashbangcode\php3d\Test;

use PHPUnit\Framework\TestCase;
use hashbangcode\php3d\Vertex;
use hashbangcode\php3d\Scene;

class SceneTest extends TestCase {

  public function testAddItemToSceneAndIterate() {
    $vertex = new Vertex(0, 0, 0);

    $scene = new Scene();
    $scene->add($vertex);
    $this->assertEquals(1, $scene->count());

    $count = 0;
    foreach ($scene as $key => $sceneVertex) {
      $this->assertInstanceOf(Vertex::class, $sceneVertex);
      $count++;
    }
    $this->assertEquals(1, $count);
  }
}

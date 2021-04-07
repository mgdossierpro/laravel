<?php

namespace App;

Interface CacheInterface{
 public function set ($key, $value);
 public function get ($key);
}

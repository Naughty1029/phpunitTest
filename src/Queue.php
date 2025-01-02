<?php

final class Queue
{
  /**
   * @var array
   */
  protected $items = [];

  /**
   * @param mixed
   */
  public function push($item)
  {
    $this->items[] = $item;
  }

  /**
   * @return mixed
   */
  public function pop()
  {
    return array_shift($this->items);
  }

  /**
   * @return int
   */
  public function getCount(): int
  {
    return count($this->items);
  }
}

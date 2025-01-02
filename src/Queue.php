<?php

final class Queue
{
  /**
   * @var int
   */
  public const MAX_ITEMS = 5;

  /**
   * @var array
   */
  protected $items = [];

  /**
   * @param mixed
   * @throws QueueException
   */
  public function push($item)
  {
    if($this->getCount() == static::MAX_ITEMS){
      throw new QueueException("Queue is full");
    }
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

  public function clear()
  {
    $this->items = [];
  }
}

<?php

namespace ljguo\utils;

use ArrayAccess;
use Iterator;

/**
 * name: PHP Progress Utils
 * author: ljguo<ljguo1020@gmail.com>
 */

class Progress implements  ArrayAccess, Iterator  {
    
    private $position;

    private $array;

    public $label;

    public $color;

    public function __construct(array $array, $label = 'progress', $color = 'black')
    {
        $this->array = $array;
        $this->position = 0;
        $this->label = $label;
        $this->color = $color;
    }

    public function current(): mixed
    {
        return $this->array[$this->position];
    }

    public function key(): mixed
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->array[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function next(): void
    {
        $this->position++;
        $this->showProgress();
    }


    public function offsetExists(mixed $offset): bool
    {
        return isset($this->array[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->array[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->array[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->array[$offset]);
    }

    public function showProgress() {
        // 拿到 total 
        $total = count($this->array);
        // 拿到 position
        $current = $this->position;
        // 百分比
        $radio = intval(($current / $total) * 100);

        $colorCode = match($this->color) {
            'red' => '31',     // 红色
            'green' => '32',   // 绿色
            'yellow' => '33',  // 黄色
            'blue' => '34',    // 蓝色
            default => '0',    // 默认颜色
        };
        
        echo "\033[{$colorCode}m{$this->label} [" . str_repeat('#', $radio) . str_repeat(' ', 100 - $radio) . "] {$radio} %\033[0m\n";

    }
    
}
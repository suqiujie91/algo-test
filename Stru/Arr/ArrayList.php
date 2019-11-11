<?php

namespace stru\arr;

class ArrayList
{
    public $index;

    public $max_index;

    public $length;

    public $capacity;
    
    public $data;

    public function __construct(int $capacity)
    {
        $this->capacity     = $capacity;
        $this->length       = intval($capacity);
        $this->index        = 0;
        $this->max_index    = $capacity - 1;
        $this->data         = [];
    }

    /**
     * 初始化数组
     */
    public function init()
    {
        if ($this->capacity > 0) {
            $i = 0;
            $tmp          = [];
            for (;$i <= $this->max_index; $i ++ )
            {
                $tmp[$i] = $i + 1;
            }
            $this->data = $tmp;
        }
    }

    /**
     * 通过下标查询数组元素
     *
     * @param int $index
     * @return mixed|null
     */
    public function find(int $index)
    {
        if ($index < 0 || $this->length <= 0 || $index > $this->max_index ) return false;
        return $this->data[$index];
    }

    /**
     * 向数组内插入一个数组元素
     *
     * @param int $index
     * @param int $value
     * @return bool
     */
    public function insert(int $index,int $value)
    {
        if ($this->length <=0 ) return false;
        if ($index <= $this->max_index) {
            $this->index = $index + 1;
            $this->max_index        += 1;
            $this->length           += 1;
            while ($this->index <= $this->max_index)
            {
                $this->data[$this->index] = $this->data[$this->index -1];
                $this->index++;
            }
            $this->data[$index]     = $value;
        }
        return true;
    }

    public function delete(int $index)
    {
        if ( $index < 0 || $this->length <= 0 || $index > $this->max_index ) return false;
        $this->index = $index;
        $this->max_index -= 1;
        for (;$this->index <= $this->max_index;$this->index ++)
        {
            $this->data[$this->index] = $this->data[$this->index+1];
        }
        unset($this->data[$this->max_index + 1]);
        return true;
    }

}
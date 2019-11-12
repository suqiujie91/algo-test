<?php
/**
 * Created by PhpStorm.
 * User: suqj
 * Date: 2019/11/12
 * Time: 11:50 PM
 */

namespace Stru\SingleLinked;


class SingleLinkedNode
{
    /**
     * 链表节点数据域
     * @var $data
     */
    public $data;

    /**
     * 链表节点后继指针
     * @var
     */
    public $next;

    /**
     * 初始化一个链表节点
     * SingleLinkedNode constructor.
     * @param null $data
     */
    public function __construct($data = null)
    {
        $this->data = $data;
        $this->next = null;
    }
}
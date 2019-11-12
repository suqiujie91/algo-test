<?php
/**
 * Created by PhpStorm.
 * User: suqj
 * Date: 2019/11/12
 * Time: 11:49 PM
 */

namespace Stru\SingleLinked;

use Stru\SingleLinked\SingleLinkedNode;

class SingleLinked
{
    /**
     * 链表头节点
     * @var
     */
    public $head;

    /**
     * 链表长度
     * @var
     */
    private $_length;

    /**
     * 初始化一个单链表
     * SingleLinked constructor.
     * @param null $head
     */
    public function __construct($head = null)
    {
        if (null == $head) {
            $this->head = new SingleLinkedNode();
        }else{
            $this->head = $head;
        }
        $this->_length = 0;
    }

    /**
     * 往链表中插入数据
     * @param $data
     */
    public function insert($data)
    {
        $this->insertNodeAfter($this->getNodeByIndex($this->_length),new SingleLinkedNode($data));
    }

    /**
     * 在链表节点后面插入新的节点
     * code 0:插入成功
     * @param \Stru\SingleLinked\SingleLinkedNode $orgNode
     * @param \Stru\SingleLinked\SingleLinkedNode $newNode
     * @return int
     */
    public function insertNodeAfter(SingleLinkedNode $orgNode,SingleLinkedNode $newNode)
    {
        $newNode->next = $orgNode->next;        // 传递链表后继指针指向
        $orgNode->next = $newNode;              // 当前链表节点后继指针指向新节点
        $this->_length++;                       // 记录链表长度
        return 0;
    }

    /**
     * 通过索引删除链表节点
     * code 0：删除成功
     * @param int $index
     * @return int
     */
    public function delete(int $index)
    {
        $code = $this->checkNodeIndex($index);                  // 检索索引是否合法
        if ($code !=0) return $code;
        $orgNode = $this->getNodeByIndex($index);               // 获取指定链表节点
        $preNode = $this->getNodeByIndex($index - 1);     // 获取指定的上一个节点
        $preNode->next = $orgNode->next;                        // 保持链表衔接
        $this->_length--;
        return 0;
    }

    /**
     * 通过索引查询链接节点
     * @param int $index
     * @return SingleLinkedNode/null
     */
    public function getNodeByIndex(int $index)
    {
        $cut = $this->head;
        for ($i=0;$i < $index; $i++)
        {
            $cut = $cut->next;
        }
        return $cut;
    }

    /**
     * 检索链表索引是否合法
     * code 0：合法；1：空链表；2：非法索引；3：索引超出链表长度范围
     * @param int $index
     * @return int code
     */
    public function checkNodeIndex(int $index)
    {
        if ( $this->_length == 0 ) return 1;
        if ( $index <= 0 ) return 2;
        if ( $index > $this->_length ) return 3;
        return 0;
    }

    /**
     * 查询链表长度
     * @return int
     */
    public function getLength()
    {
        return $this->_length;
    }

}
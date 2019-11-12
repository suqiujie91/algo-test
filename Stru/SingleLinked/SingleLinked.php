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
     * @param \Stru\SingleLinked\SingleLinkedNode $orgNode
     * @param \Stru\SingleLinked\SingleLinkedNode $newNode
     */
    public function insertNodeAfter(SingleLinkedNode $orgNode,SingleLinkedNode $newNode)
    {
        $newNode->next = $orgNode->next;        // 传递链表后继指针指向
        $orgNode->next = $newNode;              // 当前链表节点后继指针指向新节点
        $this->_length++;                       // 记录链表长度
    }

    public function delete(int $index)
    {
        $code = $this->checkNodeExists($index);
        if ($code !=0) return $code;
        $orgNode = $this->getNodeByIndex($index);
        $preNode = $this->getNodeByIndex($index - 1);
        $preNode->next = $orgNode->next;
        $this->_length --;
    }

    /**
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

    public function checkNodeExists(int $index)
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
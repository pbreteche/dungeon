<?php

namespace POE\brawl;


class FightLog implements \Iterator
{

    private $data = [];

    private $position = 0;

    public function append(string $logLine)
    {
        $this->data[] = $logLine;
    }

    /**
     * @inheritdoc
     */
    public function current()
    {
        return $this->data[$this->position];
    }

    /**
     * @inheritdoc
     */
    public function next()
    {
        $this->position++;
    }

    /**
     * @inheritdoc
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * @inheritdoc
     */
    public function valid()
    {
        return key_exists($this->position, $this->data);
    }

    /**
     * @inheritdoc
     */
    public function rewind()
    {
        $this->position = 0;
    }
}
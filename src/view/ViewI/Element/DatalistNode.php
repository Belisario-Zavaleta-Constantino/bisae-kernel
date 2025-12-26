<?php

final class DatalistNode extends ElementNode
{
    public function __construct(string $id, array $values = [])
    {
        parent::__construct('datalist');
        $this->setAttr('id', $id);

        foreach ($values as $value) {
            $this->add(
                new ElementNode('option', false, ['value' => $value])
            );
        }
    }
}


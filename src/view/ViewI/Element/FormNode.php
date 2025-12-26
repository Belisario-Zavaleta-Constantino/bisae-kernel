<?php

//namespace BISAE\DOM\Form;

//use BISAE\DOM\Node;

final class FormNode extends ElementNode
{
    public function __construct(
        string $action = '',
        string $method = 'GET',
        ?string $name = null,
        array $attributes = []
    ) {
        parent::__construct('form');

        if ($action !== '') {
            $this->setAttr('action', $action);
        }

        $this->setAttr('method', strtoupper($method));

        if ($name !== null) {
            $this->setAttr('name', $name);
            $this->setAttr('id', $name);
        }

        $this->setArray_Attr($attributes);
    }
}

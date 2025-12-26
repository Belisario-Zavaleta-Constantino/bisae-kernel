<?php

final class FieldsetNode extends ElementNode
{
    public function __construct(string $legend)
    {
        parent::__construct('fieldset');

        $legendNode = new ElementNode('legend');
        $legendNode->addText($legend);

        $this->add($legendNode);
    }
}

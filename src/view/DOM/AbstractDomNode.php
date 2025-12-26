<?php

abstract class AbstractDomNode implements BaseDomNode
{
    protected ?ElementNode $parent = null;

    public function getParent(): ?ElementNode
    {
        return $this->parent;
    }

    public function setParent(?ElementNode $parent): void
    {
        $this->parent = $parent;
    }
}

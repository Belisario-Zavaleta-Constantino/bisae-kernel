<<<<<<< HEAD
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
=======
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
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc

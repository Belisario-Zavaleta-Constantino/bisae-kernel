<<<<<<< HEAD
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
=======
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
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc

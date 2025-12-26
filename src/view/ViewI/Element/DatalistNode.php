<<<<<<< HEAD
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

=======
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

>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc

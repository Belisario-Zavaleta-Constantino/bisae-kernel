<<<<<<< HEAD
<?php

final class SelectFactory
{
    public static function select(
        string $name,
        array $attributes = []
    ): ElementNode {
        $node = new ElementNode('select');
        $node->setAttr('name', $name);
        $node->setAttr('id', $name);
        $node->setArray_Attr($attributes);

        return $node;
    }

    public static function option(
        string $value,
        bool $selected = false
    ): ElementNode {
        $node = new ElementNode('option');
        $node->setAttr('value', $value);

        if ($selected) {
            $node->setAttr('selected', 'selected');
        }

        return $node;
    }

    public static function optgroup(string $label): ElementNode
    {
        return new ElementNode('optgroup', false, [
            'label' => $label
        ]);
    }
}
=======
<?php

final class SelectFactory
{
    public static function select(
        string $name,
        array $attributes = []
    ): ElementNode {
        $node = new ElementNode('select');
        $node->setAttr('name', $name);
        $node->setAttr('id', $name);
        $node->setArray_Attr($attributes);

        return $node;
    }

    public static function option(
        string $value,
        bool $selected = false
    ): ElementNode {
        $node = new ElementNode('option');
        $node->setAttr('value', $value);

        if ($selected) {
            $node->setAttr('selected', 'selected');
        }

        return $node;
    }

    public static function optgroup(string $label): ElementNode
    {
        return new ElementNode('optgroup', false, [
            'label' => $label
        ]);
    }
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc

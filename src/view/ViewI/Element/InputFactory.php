<<<<<<< HEAD
<?php

///namespace BISAE\DOM\Form;

//
//use BISAE\DOM\Node;

final class InputFactory
{
    public static function make(
        string $type,
        string $name,
        array $attributes = []
    ): ElementNode {
        $node = new ElementNode('input', true);

        $node->setAttr('type', $type);
        $node->setAttr('name', $name);
        $node->setAttr('id', $name);

        $node->setArray_Attr($attributes);

        return $node;
    }

    public static function hidden(string $name, mixed $value): ElementNode
    {
        return self::make('hidden', $name, [
            'value' => $value
        ]);
    }

    public static function file(
        string $name,
        ?string $accept = null
    ): ElementNode {
        $attr = [];
        if ($accept) {
            $attr['accept'] = $accept;
        }

        return self::make('file', $name, $attr);
    }
}
=======
<?php

///namespace BISAE\DOM\Form;

//
//use BISAE\DOM\Node;

final class InputFactory
{
    public static function make(
        string $type,
        string $name,
        array $attributes = []
    ): ElementNode {
        $node = new ElementNode('input', true);

        $node->setAttr('type', $type);
        $node->setAttr('name', $name);
        $node->setAttr('id', $name);

        $node->setArray_Attr($attributes);

        return $node;
    }

    public static function hidden(string $name, mixed $value): ElementNode
    {
        return self::make('hidden', $name, [
            'value' => $value
        ]);
    }

    public static function file(
        string $name,
        ?string $accept = null
    ): ElementNode {
        $attr = [];
        if ($accept) {
            $attr['accept'] = $accept;
        }

        return self::make('file', $name, $attr);
    }
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc

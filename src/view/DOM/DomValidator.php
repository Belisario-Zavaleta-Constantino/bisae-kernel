<?php

final class DomValidator
{
    public function validate(ElementNode $root): void
    {
        $this->validateNode($root);
    }

    private function validateNode(ElementNode $node): void
    {
        $tag = $node->getTag();

        // Regla V1: elementos void no tienen hijos
        if (in_array($tag, HtmlRules::VOID_ELEMENTS, true)
            && count($node->getChildren()) > 0
        ) {
            throw new \LogicException(
                "<$tag> no puede tener hijos"
            );
        }

        // Regla V2: padres requeridos
        if (isset(HtmlRules::REQUIRED_PARENTS[$tag])) {
            $parent = $node->getParent();
            if (
                !$parent ||
                !in_array(
                    $parent->getTag(),
                    HtmlRules::REQUIRED_PARENTS[$tag],
                    true
                )
            ) {
                throw new \LogicException(
                    "<$tag> debe estar dentro de "
                    . implode(', ', HtmlRules::REQUIRED_PARENTS[$tag])
                );
            }
        }

        // Regla V3: hijos permitidos
        if (isset(HtmlRules::ALLOWED_CHILDREN[$tag])) {
            foreach ($node->getChildren() as $child) {
                if ($child instanceof ElementNode) {
                    if (!in_array(
                        $child->getTag(),
                        HtmlRules::ALLOWED_CHILDREN[$tag],
                        true
                    )) {
                        throw new \LogicException(
                            "<{$child->getTag()}> no permitido dentro de <$tag>"
                        );
                    }
                }
            }
        }

        foreach ($node->getChildren() as $child) {
            if ($child instanceof ElementNode) {
                $this->validateNode($child);
            }
        }
    }
}

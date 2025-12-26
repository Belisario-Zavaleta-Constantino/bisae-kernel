<?php
namespace BISAE\UI\Lista;

final class Lista
{
    public function __construct(private array $items) {}

    public function render(): string
    {
        $html = '<ul class="bisae-lista">';
        foreach ($this->items as $item) {
            $html .= "<li>$item</li>";
        }
        return $html . '</ul>';
    }
}

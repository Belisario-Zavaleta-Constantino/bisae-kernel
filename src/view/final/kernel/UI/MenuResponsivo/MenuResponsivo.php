<?php
namespace BISAE\UI\MenuResponsivo;

final class MenuResponsivo
{
    public function __construct(private array $items) {}

    public function render(): string
    {
        $html = '<nav class="bisae-menu"><ul>';
        foreach ($this->items as $item) {
            $html .= "<li>$item</li>";
        }
        return $html . '</ul></nav>';
    }
}

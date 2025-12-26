<?php
namespace BISAE\UI\Carousel;

final class Carousel
{
    public function __construct(private array $images) {}

    public function render(): string
    {
        $html = '<div class="bisae-carousel">';
        foreach ($this->images as $img) {
            $html .= "<img src='$img'>";
        }
        return $html . '</div>';
    }
}

<?php
namespace BISAE\UI\TH;

final class TH
{
    public function __construct(private array $headers) {}

    public function render(): string
    {
        $html = '<table class="bisae-th"><thead><tr>';
        foreach ($this->headers as $h) {
            $html .= "<th>$h</th>";
        }
        return $html . '</tr></thead></table>';
    }
}

<?php
namespace BISAE\UI\TF;

final class TFTable
{
    public function __construct(private array $headers) {}

    public function render(): string
    {
        $html = '<table><tr>';
        foreach ($this->headers as $h) {
            $html .= "<th>$h</th>";
        }
        return $html . '</tr></table>';
    }
}

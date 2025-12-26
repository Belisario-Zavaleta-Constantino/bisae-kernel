<?php
namespace BISAE\UI\TF;

final class TFForm
{
    public function __construct(private array $fields) {}

    public function render(): string
    {
        $html = '<form>';
        foreach ($this->fields as $f) {
            $html .= "<input placeholder='$f'>";
        }
        return $html . '<button>Enviar</button></form>';
    }
}

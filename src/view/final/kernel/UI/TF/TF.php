<?php
namespace BISAE\UI\TF;

require_once __DIR__ . '/TFTable.php';
require_once __DIR__ . '/TFForm.php';

final class TF
{
    public function __construct(private array $headers) {}

    public function render(): string
    {
        $table = new TFTable($this->headers);
        $form  = new TFForm($this->headers);
        return '<div class="bisae-tf">' . $table->render() . $form->render() . '</div>';
    }
}

<?php
interface BaseDomNode
{
    public function getParent(): ?ElementNode;
    public function setParent(?ElementNode $parent): void;
    public function render(HtmlRenderer $renderer): string;
}

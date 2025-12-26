<?php
final class TextNode extends AbstractDomNode
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function render(HtmlRenderer $renderer): string
    {
        return $renderer->escape($this->text);
    }
}


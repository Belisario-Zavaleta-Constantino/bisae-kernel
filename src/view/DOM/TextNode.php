<<<<<<< HEAD
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

=======
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

>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc

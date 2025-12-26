<?php
final class CallbackNode extends AbstractDomNode
{
    private \Closure $callback;

    public function __construct(\Closure $callback)
    {
        $this->callback = $callback;
    }

    public function render(HtmlRenderer $renderer): string
    {
        ob_start();
        ($this->callback)();
        return ob_get_clean();
    }
}


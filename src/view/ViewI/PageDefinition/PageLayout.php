<?php
//namespace Bisae\Kernel\Page;

final class PageLayout
{
    private string $template = 'default';

    public function setTemplate(string $name): void
    {
        $this->template = $name;
    }

    public function template(): string
    {
        return $this->template;
    }
}

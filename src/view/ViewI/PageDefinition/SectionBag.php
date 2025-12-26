<?php
//namespace Bisae\Kernel\Page;

final class SectionBag
{
    private array $sections = [];

    public function add(string $name, mixed $content): void
    {
        $this->sections[$name][] = $content;
    }

    public function all(): array
    {
        return $this->sections;
    }
}

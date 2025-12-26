<?php
//namespace Bisae\Kernel\Page;

final class AssetBag
{
    private array $styles = [];
    private array $scripts = [];

    public function addStyle(string $href): void
    {
        $this->styles[] = $href;
    }

    public function addScript(string $src): void
    {
        $this->scripts[] = $src;
    }

    public function styles(): array
    {
        return $this->styles;
    }

    public function scripts(): array
    {
        return $this->scripts;
    }
}

<<<<<<< HEAD
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
=======
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
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc

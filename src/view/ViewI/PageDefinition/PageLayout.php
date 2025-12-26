<<<<<<< HEAD
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
=======
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
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc

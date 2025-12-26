<<<<<<< HEAD
<?php
//namespace Bisae\Kernel\Page;

final class PageMeta
{
    private string $title = '';
    private string $charset = 'utf-8';
    private string $lang = 'es';

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function charset(): string
    {
        return $this->charset;
    }

    public function lang(): string
    {
        return $this->lang;
    }
}

=======
<?php
//namespace Bisae\Kernel\Page;

final class PageMeta
{
    private string $title = '';
    private string $charset = 'utf-8';
    private string $lang = 'es';

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function charset(): string
    {
        return $this->charset;
    }

    public function lang(): string
    {
        return $this->lang;
    }
}

>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc

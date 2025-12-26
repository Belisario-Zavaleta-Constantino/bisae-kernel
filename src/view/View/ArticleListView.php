<?php

final class ArticleListView extends AbstractView
{
    private array $articles;

    public function __construct(
        array $articles,
        DomNormalizer $normalizer,
        DomValidator $validator,
        HtmlRenderer $renderer
    ) {
        parent::__construct($normalizer, $validator, $renderer);
        $this->articles = $articles;
    }

    public function buildDom(): ElementNode
    {
        $html = new ElementNode('html');

        // HEAD
        $head = $html->el('head');
        $head->el('title')->text('Artículos BISAE');

        // BODY
        $body = $html->el('body')->class('layout');

        $body->el('header')
            ->el('h1')->text('Listado de artículos')->up()
            ->up();

        $main = $body->el('main')->class('container');

        $ul = $main->el('ul')->class('article-list');

        foreach ($this->articles as $article) {
            $ul->el('li')
                ->el('strong')->text($article['title'])->up()
                ->text(' por ')
                ->el('em')->text($article['author'])
                ->up();
        }

        $body->el('footer')
            ->el('small')->text('© BISAE Kernel')
            ->up();

        return $html;
    }
}

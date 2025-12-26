<?php
//namespace Bisae\Kernel\Page;

/**
 * WebPage
 *
 * Descriptor abstracto de una página BISAE.
 * No renderiza.
 * No conoce HTML.
 * No contiene nodos.
 *
 * Define intención estructural y ciclo de vida.
 *
 * @author Belisario
 */
abstract class WebPage
{
    protected PageMeta $meta;
    protected PageLayout $layout;
    protected AssetBag $assets;
    protected SectionBag $sections;

    public function __construct()
    {
        $this->meta     = new PageMeta();
        $this->layout   = new PageLayout();
        $this->assets   = new AssetBag();
        $this->sections = new SectionBag();
    }

    /**
     * Punto de entrada estándar BISAE
     */
    final public function define(mixed $context = null): PageDefinition
    {
        $this->setup($context);
        $this->compose($context);
        $this->finalize($context);

        return new PageDefinition(
            $this->meta,
            $this->layout,
            $this->assets,
            $this->sections
        );
    }

    /**
     * Accesores de intención
     */
    final protected function meta(): PageMeta
    {
        return $this->meta;
    }

    final protected function layout(): PageLayout
    {
        return $this->layout;
    }

    final protected function assets(): AssetBag
    {
        return $this->assets;
    }

    final protected function sections(): SectionBag
    {
        return $this->sections;
    }

    /**
     * Ciclo de vida BISAE
     */
    abstract protected function setup(mixed $context): void;
    abstract protected function compose(mixed $context): void;
    abstract protected function finalize(mixed $context): void;
}

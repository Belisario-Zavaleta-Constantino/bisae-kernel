<?php
//namespace Bisae\Kernel\Page;

final class PageDefinition
{
    public function __construct(
        public readonly PageMeta $meta,
        public readonly PageLayout $layout,
        public readonly AssetBag $assets,
        public readonly SectionBag $sections
    ) {}
}

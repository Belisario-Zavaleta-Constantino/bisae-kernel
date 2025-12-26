<?php

abstract class AbstractView implements ViewInterface
{
    protected DomNormalizer $normalizer;
    protected DomValidator $validator;
    protected HtmlRenderer $renderer;

    public function __construct(
        DomNormalizer $normalizer,
        DomValidator $validator,
        HtmlRenderer $renderer
    ) {
        $this->normalizer = $normalizer;
        $this->validator = $validator;
        $this->renderer = $renderer;
    }

    final public function render(): string
    {
        $dom = $this->buildDom();

        $this->normalizer->normalize($dom);
        $this->validator->validate($dom);

        return $this->renderer->renderElement($dom);
    }
}

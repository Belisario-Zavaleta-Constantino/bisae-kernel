<<<<<<< HEAD
<?php
final class DomNormalizer
{
    public function normalize(ElementNode $root): void
    {
        $this->normalizeNode($root);
    }
	
	private function normalizeAttributes(ElementNode $node): void
{
    // Normalizar class
    if ($class = $node->getAttributes()['class'] ?? null) {
        $classes = array_unique(
            array_filter(preg_split('/\s+/', $class))
        );
        $node->attr('class', implode(' ', $classes));
    }

    // Normalizar style
    if ($style = $node->getAttributes()['style'] ?? null) {
        $rules = array_unique(
            array_filter(array_map('trim', explode(';', $style)))
        );
        $node->attr('style', implode('; ', $rules));
    }
}


	
	private function normalizeNode(ElementNode $node): void
{
    $normalized = [];
    $buffer = null;

    foreach ($node->getChildren() as $child) {

        // N2: eliminar texto vacío
        if ($child instanceof TextNode && trim($child->getText()) === '') {
            continue;
        }

        // N1: fusionar textos contiguos
        if ($child instanceof TextNode) {
            $buffer = ($buffer ?? '') . $child->getText();
            continue;
        }

        if ($buffer !== null) {
            $normalized[] = new TextNode($buffer);
            $buffer = null;
        }

        // N3: normalizar atributos del elemento hijo
        if ($child instanceof ElementNode) {
            $this->normalizeAttributes($child);
        }

        $normalized[] = $child;
    }

    if ($buffer !== null) {
        $normalized[] = new TextNode($buffer);
    }

    $node->replaceChildren($normalized);

    foreach ($node->getChildren() as $child) {
        if ($child instanceof ElementNode) {
            $this->normalizeNode($child);
        }
    }
}

}
=======
<?php
final class DomNormalizer
{
    public function normalize(ElementNode $root): void
    {
        $this->normalizeNode($root);
    }
	
	private function normalizeAttributes(ElementNode $node): void
{
    // Normalizar class
    if ($class = $node->getAttributes()['class'] ?? null) {
        $classes = array_unique(
            array_filter(preg_split('/\s+/', $class))
        );
        $node->attr('class', implode(' ', $classes));
    }

    // Normalizar style
    if ($style = $node->getAttributes()['style'] ?? null) {
        $rules = array_unique(
            array_filter(array_map('trim', explode(';', $style)))
        );
        $node->attr('style', implode('; ', $rules));
    }
}


	
	private function normalizeNode(ElementNode $node): void
{
    $normalized = [];
    $buffer = null;

    foreach ($node->getChildren() as $child) {

        // N2: eliminar texto vacío
        if ($child instanceof TextNode && trim($child->getText()) === '') {
            continue;
        }

        // N1: fusionar textos contiguos
        if ($child instanceof TextNode) {
            $buffer = ($buffer ?? '') . $child->getText();
            continue;
        }

        if ($buffer !== null) {
            $normalized[] = new TextNode($buffer);
            $buffer = null;
        }

        // N3: normalizar atributos del elemento hijo
        if ($child instanceof ElementNode) {
            $this->normalizeAttributes($child);
        }

        $normalized[] = $child;
    }

    if ($buffer !== null) {
        $normalized[] = new TextNode($buffer);
    }

    $node->replaceChildren($normalized);

    foreach ($node->getChildren() as $child) {
        if ($child instanceof ElementNode) {
            $this->normalizeNode($child);
        }
    }
}

}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc

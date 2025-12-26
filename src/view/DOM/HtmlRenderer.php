<?php
final class HtmlRenderer
{
    public function renderElement(ElementNode $node): string
    {
        $html = '<' . $node->getTag();

        foreach ($node->getAttributes() as $name => $value) {
            $html .= $value === null
                ? " $name"
                : " $name=\"" . $this->escape($value) . "\"";
        }

        if ($node->isSelfClosing()) {
            return $html . '/>';
        }

        $html .= '>';

        foreach ($node->getChildren() as $child) {
            $html .= $child->render($this);
        }

        return $html . '</' . $node->getTag() . '>';
    }

    public function escape(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
	
	
	
	public function render(PageDefinition $page): string
    {
        $html  = '<!DOCTYPE html>';
        $html .= '<html lang="' . $page->meta->lang() . '">';
        $html .= '<head>';
        $html .= '<meta charset="' . $page->meta->charset() . '">';
        $html .= '<title>' . htmlspecialchars($page->meta->title()) . '</title>';

        foreach ($page->assets->styles() as $style) {
            $html .= '<link rel="stylesheet" href="' . $style . '">';
        }

        foreach ($page->assets->scripts() as $script) {
            $html .= '<script src="' . $script . '"></script>';
        }

        $html .= '</head>';
        $html .= '<body>';

        foreach ($page->sections->all() as $section => $items) {
            $html .= '<section data-section="' . $section . '">';

            foreach ($items as $content) {
                $html .= $this->renderContent($content);
            }

            $html .= '</section>';
        }

        $html .= '</body></html>';

        return $html;
    }

    private function renderContent(mixed $content): string
    {
        if (is_array($content)) {
            return htmlspecialchars(json_encode($content));
        }

        return '<div>' . htmlspecialchars((string)$content) . '</div>';
    }
}


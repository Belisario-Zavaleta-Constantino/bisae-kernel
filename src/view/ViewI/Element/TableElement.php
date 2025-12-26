<?php
//namespace Bisae\Kernel\Html\Element;

//use Bisae\Kernel\Html\Node\ElementNode;
//use Bisae\Kernel\Html\Node\TextNode;

final class TableElement extends ElementNode
{
    private ElementNode $head;
    private ElementNode $body;
    private ElementNode $foot;

    private ElementNode $headRow;
    private ElementNode $footRow;

    public function __construct(array $attributes = [])
    {
        parent::__construct('table');
		parent::setArray_Attr($attributes);

        $this->head = new ElementNode('thead');
        $this->body = new ElementNode('tbody');
        $this->foot = new ElementNode('tfoot');

        $this->headRow = new ElementNode('tr');
        $this->footRow = new ElementNode('tr');

        $this->head->addChild($this->headRow);
        $this->foot->addChild($this->footRow);

        $this->addChild($this->head);
        $this->addChild($this->body);
        $this->addChild($this->foot);
    }

    /* =========================
       HEAD
       ========================= */

    public function addHeader(string $content, array $attributes = []): ElementNode
    {
        $th = new ElementNode('th');
		$th->setArray_Attr($attributes);
        $th->addChild(new TextNode($content));
        $this->headRow->addChild($th);

        return $th;
    }

    /* =========================
       FOOT
       ========================= */

    public function addFooter(string $content, array $attributes = []): ElementNode
    {
		$td = new ElementNode('td');
		$td->setArray_Attr($attributes);
        $td->addChild(new TextNode($content));
        $this->footRow->addChild($td);

        return $td;
    }

    /* =========================
       BODY
       ========================= */

    public function row(?string $key = null, array $attributes = []): ElementNode
    {
        if ($key !== null && $this->body->hasChild($key)) {
            return $this->body->getChild($key);
        }

		$tr = new ElementNode('tr');
		$tr->setArray_Attr($attributes);

        if ($key !== null) {
            $this->body->addChild($tr, $key);
        } else {
            $this->body->addChild($tr);
        }

        return $tr;
    }

    public function cell(string $rowKey, string $content, array $attributes = []): ElementNode
    {
        $row = $this->row($rowKey);

		$td = new ElementNode('td');
		$td->setArray_Attr($attributes);
        $td->addChild(new TextNode($content));

        $row->addChild($td);

        return $td;
    }

    public function cellElement(
        string $rowKey,
        string $tag,
        array $attributes = []
    ): ElementNode {
        $row = $this->row($rowKey);

        $td = new ElementNode('td');
		$element = new ElementNode($tag);
		$element->setArray_Attr($attributes);

        $td->addChild($element);
        $row->addChild($td);

        return $element;
    }
}

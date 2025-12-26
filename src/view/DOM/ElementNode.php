<?php
class ElementNode extends AbstractDomNode
{
	
	protected string $tag;

    /** @var array<int, ElementNode> */
    protected array $children = [];

    /** @var array<string, ElementNode> */
    protected array $namedChildren = [];
	
	
    private array $attributes = [];
    private bool $selfClosing;

    public function __construct(string $tag, bool $selfClosing = false)
    {
        $this->tag = $tag;
        $this->selfClosing = $selfClosing;
    }

    public function append(BaseDomNode $child): void
    {
        $child->setParent($this);
        $this->children[] = $child;
    }

    public function attr(string $name, ?string $value = null): ElementNode
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    public function class(string $value): ElementNode
    {
        $current = $this->attributes['class'] ?? '';
        $this->attributes['class'] = trim($current . ' ' . $value);
        return $this;
    }

    public function style(string $value): ElementNode
    {
        $current = $this->attributes['style'] ?? '';
        $this->attributes['style'] = trim($current . '; ' . $value);
        return $this;
    }
	
	public function el(string $tag, bool $selfClosing = false): ElementNode
    {
        $child = new ElementNode($tag, $selfClosing);
        $this->append($child);
        return $child;
    }
	
	    public function up(): ?ElementNode
    {
        return $this->parent;
    }

    public function root(): ElementNode
    {
        $ElementNode = $this;
        while ($ElementNode->getParent() !== null) {
            $ElementNode = $ElementNode->getParent();
        }
        return $ElementNode;
    }

    public function last(): ?ElementNode
    {
        return $this->children[array_key_last($this->children)] ?? null;
    }



    public function getTag(): string
    {
        return $this->tag;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function getChildren(): array
    {
        return $this->children;
    }

    public function isSelfClosing(): bool
    {
        return $this->selfClosing;
    }

    public function render(HtmlRenderer $renderer): string
    {
        return $renderer->renderElement($this);
    }
	public function text(string $text): self
    {
       // return $this->append(new TextNode($text));
		 $this->append(new TextNode($text));
    return $this;
    }

	public function setAttr(string $name, ?string $value = null): self
    {
        $this->attributes[$name] = $value;
        return $this;
    }
	
	
	public function replaceChildren(array $children): void
{
    $this->children = [];

    foreach ($children as $child) {
        if (!$child instanceof BaseDomNode) {
            throw new \InvalidArgumentException(
                'Todos los hijos deben implementar BaseDomNode'
            );
        }

        $child->setParent($this);
        $this->children[] = $child;
    }
}



	public function setArray_Attr(array $Attr): void
    {
		foreach($Attr as $name => $value){
			$this->attributes[$name] = $value;
		}
    }
	
	public function hasChild(string $key): bool
{
    return array_key_exists($key, $this->namedChildren);
}



public function addChild( $child, ?string $key = null): void
{
    if ($key !== null) {
        $this->namedChildren[$key] = $child;
    }

    $this->children[] = $child;
}

public function getChild(string $key): ElementNode
{
    if (!$this->hasChild($key)) {
        throw new \RuntimeException("Child '$key' not found");
    }

    return $this->namedChildren[$key];
}


public function removeChild(string $key): void
{
    if (!$this->hasChild($key)) {
        throw new \RuntimeException("Cannot remove child '$key': not found.");
    }

    $ElementNode = $this->namedChildren[$key];

    unset($this->namedChildren[$key]);

    foreach ($this->children as $index => $child) {
        if ($child === $ElementNode) {
            unset($this->children[$index]);
            break;
        }
    }

    $this->children = array_values($this->children);
}

public function tryRemoveChild(string $key): bool
{
    if (!$this->hasChild($key)) {
        return false;
    }

    $this->removeChild($key);
    return true;
}


public function replaceChild(string $key, ElementNode $new): void
{
    if (!$this->hasChild($key)) {
        throw new \RuntimeException("Cannot replace child '$key': not found.");
    }

    $old = $this->namedChildren[$key];

    // Reemplazo en el mapa por clave
    $this->namedChildren[$key] = $new;

    // Reemplazo en la lista ordenada
    foreach ($this->children as $index => $child) {
        if ($child === $old) {
            $this->children[$index] = $new;
            return;
        }
    }

    // Estado imposible si el árbol está sano
    throw new \RuntimeException(
        "Inconsistent state while replacing child '$key'."
    );
}


public function moveChild(string $key, int $position): void
{
    if (!$this->hasChild($key)) {
        throw new \RuntimeException("Cannot move child '$key': not found.");
    }

    if ($position < 0 || $position >= count($this->children)) {
        throw new \OutOfRangeException(
            "Position $position out of bounds."
        );
    }

    $ElementNode = $this->namedChildren[$key];

    // Eliminar de la posición actual
    foreach ($this->children as $index => $child) {
        if ($child === $ElementNode) {
            unset($this->children[$index]);
            break;
        }
    }

    // Reindexar
    $this->children = array_values($this->children);

    // Insertar en la nueva posición
    array_splice($this->children, $position, 0, [$ElementNode]);
}


public function insertChildBefore(string $key, ElementNode $new): void
{
    if (!$this->hasChild($key)) {
        throw new \RuntimeException(
            "Cannot insert before child '$key': not found."
        );
    }

    $target = $this->namedChildren[$key];

    foreach ($this->children as $index => $child) {
        if ($child === $target) {
            array_splice($this->children, $index, 0, [$new]);
            return;
        }
    }

    throw new \RuntimeException(
        "Inconsistent state while inserting before '$key'."
    );
}

public function insertChildAfter(string $key, ElementNode $new): void
{
    if (!$this->hasChild($key)) {
        throw new \RuntimeException(
            "Cannot insert after child '$key': not found."
        );
    }

    $target = $this->namedChildren[$key];

    foreach ($this->children as $index => $child) {
        if ($child === $target) {
            array_splice($this->children, $index + 1, 0, [$new]);
            return;
        }
    }

    throw new \RuntimeException(
        "Inconsistent state while inserting after '$key'."
    );
}




}


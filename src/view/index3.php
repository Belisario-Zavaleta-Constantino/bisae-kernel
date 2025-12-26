<<<<<<< HEAD
<?php

require "Dom/BaseDomNode.php";
require "Dom/AbstractDomNode.php";
require "Dom/CallbackNode.php";
require "Dom/ElementNode.php";
require "Dom/HtmlRenderer.php";
require "Dom/TextNode.php";
require "Dom/DomNormalizer.php";
require "Dom/DomValidator.php";
require "Dom/HtmlRules.php";


require "View/ViewInterface.php";
require "View/AbstractView.php";
require "View/ArticleListView.php";


require "ViewI/PageDefinition/PageDefinition.php";
require "ViewI/PageDefinition/PageMeta.php";
require "ViewI/PageDefinition/PageLayout.php";
require "ViewI/PageDefinition/AssetBag.php";
require "ViewI/PageDefinition/SectionBag.php";



require "ViewI/WebPage.php";



require "ViewI/Element/TableElement.php";



require "ViewI/Element/DatalistNode.php";
require "ViewI/Element/FormNode.php";
require "ViewI/Element/InputFactory.php";
require "ViewI/Element/SelectFactory.php";
require "ViewI/Element/FieldsetNode.php";





$div = new ElementNode('div');

$div->class('container')
    ->el('h1')->text('Hola BISAE')->up()
	->el('h3')->text('Hola Betsi')->up()
    ->el('p')->text('DOM formal')->up();



$ul = new ElementNode('ul');

$ul->class('menu')
   ->el('li')->text('Inicio')->up()
   ->el('li')->text('Docs')->up()
   ->el('li')->text('Contacto');
   
   
   $form = new ElementNode('form');

$form->el('input', true)
     ->attr('type', 'text')
     ->attr('name', 'email');




/*$div = new ElementNode('div');
$div->setAttr('class', 'container')
    ->append(
        (new ElementNode('h1'))->text('Hola BISAE')
    )
    ;
	
	
	$div->setAttr('class', 'container')
    ->append(
new ElementNode('h1'))->append(new ElementNode('h5'))->text('Hola Betsi');*/

$renderer = new HtmlRenderer();
echo $div->render($renderer);


echo $ul->render($renderer);
echo $form->render($renderer);






$articles = [
    ['title' => 'Primer artículo', 'author' => 'Belisario'],
    ['title' => 'DOM formal en PHP', 'author' => 'BISAE'],
];


$view = new ArticleListView(
    $articles,
    new DomNormalizer(),
    new DomValidator(),
    new HtmlRenderer()
);

echo $html = $view->render();


final class HomePage extends WebPage
{
    protected function setup(mixed $context): void
    {
        $this->meta()->setTitle('Inicio');
        $this->assets()->addStyle('/css/app.css');
    }

    protected function compose(mixed $context): void
    {
        $this->sections()->add('main', [
            'type' => 'text',
            'value' => 'Bienvenido a BISAE'
        ]);
    }

    protected function finalize(mixed $context): void
    {
        $this->sections()->add('footer', '© ' . date('Y'));
    }
}


$page = new HomePage();
$definition = $page->define($div);

$renderer = new HtmlRenderer();
echo $renderer->render($definition);













$table = new TableElement([
    'class' => 'table table-striped'
]);

$table->addHeader('ID');
$table->addHeader('Nombre');
$table->addHeader('Correo');

$table->cell('row1', '1');
$table->cell('row1', 'Belisario');
$table->cell('row1', 'contacto@bisae.org');

$table->cell('row2', '2');
$table->cell('row2', 'Kernel');
$table->cell('row2', 'core@bisae.org');


echo $html = $renderer->renderElement($table);



$form = new FormNode('/guardar', 'POST', 'usuarioForm');

$form->addChild(
    InputFactory::make('text', 'nombre', ['required' => true])
);

$form->addChild(
    InputFactory::make('email', 'correo')
);

$form->addChild(
    InputFactory::hidden('token', 'abc123')
);

$form->addChild(
    InputFactory::make('submit', 'enviar', [
        'value' => 'Guardar'
    ])
);


echo $html = $renderer->renderElement($form);






=======
<?php

require "Dom/BaseDomNode.php";
require "Dom/AbstractDomNode.php";
require "Dom/CallbackNode.php";
require "Dom/ElementNode.php";
require "Dom/HtmlRenderer.php";
require "Dom/TextNode.php";
require "Dom/DomNormalizer.php";
require "Dom/DomValidator.php";
require "Dom/HtmlRules.php";


require "View/ViewInterface.php";
require "View/AbstractView.php";
require "View/ArticleListView.php";


require "ViewI/PageDefinition/PageDefinition.php";
require "ViewI/PageDefinition/PageMeta.php";
require "ViewI/PageDefinition/PageLayout.php";
require "ViewI/PageDefinition/AssetBag.php";
require "ViewI/PageDefinition/SectionBag.php";



require "ViewI/WebPage.php";



require "ViewI/Element/TableElement.php";



require "ViewI/Element/DatalistNode.php";
require "ViewI/Element/FormNode.php";
require "ViewI/Element/InputFactory.php";
require "ViewI/Element/SelectFactory.php";
require "ViewI/Element/FieldsetNode.php";





$div = new ElementNode('div');

$div->class('container')
    ->el('h1')->text('Hola BISAE')->up()
	->el('h3')->text('Hola Betsi')->up()
    ->el('p')->text('DOM formal')->up();



$ul = new ElementNode('ul');

$ul->class('menu')
   ->el('li')->text('Inicio')->up()
   ->el('li')->text('Docs')->up()
   ->el('li')->text('Contacto');
   
   
   $form = new ElementNode('form');

$form->el('input', true)
     ->attr('type', 'text')
     ->attr('name', 'email');




/*$div = new ElementNode('div');
$div->setAttr('class', 'container')
    ->append(
        (new ElementNode('h1'))->text('Hola BISAE')
    )
    ;
	
	
	$div->setAttr('class', 'container')
    ->append(
new ElementNode('h1'))->append(new ElementNode('h5'))->text('Hola Betsi');*/

$renderer = new HtmlRenderer();
echo $div->render($renderer);


echo $ul->render($renderer);
echo $form->render($renderer);






$articles = [
    ['title' => 'Primer artículo', 'author' => 'Belisario'],
    ['title' => 'DOM formal en PHP', 'author' => 'BISAE'],
];


$view = new ArticleListView(
    $articles,
    new DomNormalizer(),
    new DomValidator(),
    new HtmlRenderer()
);

echo $html = $view->render();


final class HomePage extends WebPage
{
    protected function setup(mixed $context): void
    {
        $this->meta()->setTitle('Inicio');
        $this->assets()->addStyle('/css/app.css');
    }

    protected function compose(mixed $context): void
    {
        $this->sections()->add('main', [
            'type' => 'text',
            'value' => 'Bienvenido a BISAE'
        ]);
    }

    protected function finalize(mixed $context): void
    {
        $this->sections()->add('footer', '© ' . date('Y'));
    }
}


$page = new HomePage();
$definition = $page->define($div);

$renderer = new HtmlRenderer();
echo $renderer->render($definition);













$table = new TableElement([
    'class' => 'table table-striped'
]);

$table->addHeader('ID');
$table->addHeader('Nombre');
$table->addHeader('Correo');

$table->cell('row1', '1');
$table->cell('row1', 'Belisario');
$table->cell('row1', 'contacto@bisae.org');

$table->cell('row2', '2');
$table->cell('row2', 'Kernel');
$table->cell('row2', 'core@bisae.org');


echo $html = $renderer->renderElement($table);



$form = new FormNode('/guardar', 'POST', 'usuarioForm');

$form->addChild(
    InputFactory::make('text', 'nombre', ['required' => true])
);

$form->addChild(
    InputFactory::make('email', 'correo')
);

$form->addChild(
    InputFactory::hidden('token', 'abc123')
);

$form->addChild(
    InputFactory::make('submit', 'enviar', [
        'value' => 'Guardar'
    ])
);


echo $html = $renderer->renderElement($form);






>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc

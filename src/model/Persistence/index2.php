<<<<<<< HEAD
<?php

require 'DDL/Schema/SchemaCommand.php';

require 'DDL/Schema/Commands/AddColumn.php';
require 'DDL/Schema/Commands/AddColumnAfter.php';
require 'DDL/Schema/Commands/AddForeignKey.php';
require 'DDL/Schema/Commands/AddPrimaryKey.php';
require 'DDL/Schema/Commands/AddUnique.php';
require 'DDL/Schema/Commands/DropColumn.php';
require 'DDL/Schema/Commands/DropConstraint.php';
require 'DDL/Schema/Commands/DropTable.php';
require 'DDL/Schema/Commands/ModifyColumn.php';
require 'DDL/Schema/Commands/RenameTable.php';


require 'DDL/Schema/Schema.php';
require 'DDL/Schema/Column.php';
require 'DDL/Schema/Constraint.php';
require 'DDL/Schema/PrimaryKey.php';

require 'DDL/Migrations/CreateTable.php';
require 'DDL/Drivers/MySQL/MySQLSchemaTranslator.php';






$schema = new Schema('users');
$schema
    ->addColumn(
        Column::int('id')->autoIncrement()
    )
    ->addColumn(
        Column::string('email')
    )
    ->addConstraint(
        new PrimaryKey('id')
    );
$command = new CreateTable($schema);
$translator = new MySQLSchemaTranslator();
echo $sql = $translator->translate($command);



echo "<br/><br/><br/><br/><br/>";

$schema = new Schema('users');

$schema
    ->addColumn(
        Column::int('id')->autoIncrement()
    )
    ->addColumn(
        Column::string('name')
    )
    ->addColumn(
        Column::string('email')
    )
    ->addConstraint(
        new PrimaryKey('id')
    );

$command = new CreateTable(schema: $schema);

echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";

$command = new AddColumn(
    table: 'users',
    column: Column::string('email')
);

echo $result = $translator->translate($command);

echo "<br/><br/><br/><br/><br/>";
$command = new AddColumnAfter(
    table: 'users',
    column: Column::string('email'),
    after: 'name'
);
echo $result = $translator->translate($command);

echo "<br/><br/><br/><br/><br/>";
$command = new ModifyColumn(
    table: 'users',
    column: Column::string('email')->nullable()
);
echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";


$command = new AddUnique(
    table: 'users',
    column: 'email'
);
echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";






$schema = new Schema('posts');

$schema
    ->addColumn(
        Column::int('id')->autoIncrement()
    )
    ->addColumn(
        Column::int('user_id')
    )
    ->addColumn(
        Column::string('title')
    )
    ->addConstraint(
        new PrimaryKey('id')
    );

$command = new CreateTable(schema: $schema);
echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";









$command = new AddForeignKey(
    table: 'posts',
    column: 'user_id',
    referenceTable: 'users',
    referenceColumn: 'id'
);
echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";









$command = new RenameTable(
    from: 'users',
    to: 'accounts'
);
echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";









$command = new DropColumn(
    table: 'accounts',
    column: 'email'
);
echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";


$command = new DropConstraint(
    table: 'posts',
    constraint: 'fk_posts_user'
);
echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";






$command = new DropTable('posts');
echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";

=======
<?php

require 'DDL/Schema/SchemaCommand.php';

require 'DDL/Schema/Commands/AddColumn.php';
require 'DDL/Schema/Commands/AddColumnAfter.php';
require 'DDL/Schema/Commands/AddForeignKey.php';
require 'DDL/Schema/Commands/AddPrimaryKey.php';
require 'DDL/Schema/Commands/AddUnique.php';
require 'DDL/Schema/Commands/DropColumn.php';
require 'DDL/Schema/Commands/DropConstraint.php';
require 'DDL/Schema/Commands/DropTable.php';
require 'DDL/Schema/Commands/ModifyColumn.php';
require 'DDL/Schema/Commands/RenameTable.php';


require 'DDL/Schema/Schema.php';
require 'DDL/Schema/Column.php';
require 'DDL/Schema/Constraint.php';
require 'DDL/Schema/PrimaryKey.php';

require 'DDL/Migrations/CreateTable.php';
require 'DDL/Drivers/MySQL/MySQLSchemaTranslator.php';






$schema = new Schema('users');
$schema
    ->addColumn(
        Column::int('id')->autoIncrement()
    )
    ->addColumn(
        Column::string('email')
    )
    ->addConstraint(
        new PrimaryKey('id')
    );
$command = new CreateTable($schema);
$translator = new MySQLSchemaTranslator();
echo $sql = $translator->translate($command);



echo "<br/><br/><br/><br/><br/>";

$schema = new Schema('users');

$schema
    ->addColumn(
        Column::int('id')->autoIncrement()
    )
    ->addColumn(
        Column::string('name')
    )
    ->addColumn(
        Column::string('email')
    )
    ->addConstraint(
        new PrimaryKey('id')
    );

$command = new CreateTable(schema: $schema);

echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";

$command = new AddColumn(
    table: 'users',
    column: Column::string('email')
);

echo $result = $translator->translate($command);

echo "<br/><br/><br/><br/><br/>";
$command = new AddColumnAfter(
    table: 'users',
    column: Column::string('email'),
    after: 'name'
);
echo $result = $translator->translate($command);

echo "<br/><br/><br/><br/><br/>";
$command = new ModifyColumn(
    table: 'users',
    column: Column::string('email')->nullable()
);
echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";


$command = new AddUnique(
    table: 'users',
    column: 'email'
);
echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";






$schema = new Schema('posts');

$schema
    ->addColumn(
        Column::int('id')->autoIncrement()
    )
    ->addColumn(
        Column::int('user_id')
    )
    ->addColumn(
        Column::string('title')
    )
    ->addConstraint(
        new PrimaryKey('id')
    );

$command = new CreateTable(schema: $schema);
echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";









$command = new AddForeignKey(
    table: 'posts',
    column: 'user_id',
    referenceTable: 'users',
    referenceColumn: 'id'
);
echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";









$command = new RenameTable(
    from: 'users',
    to: 'accounts'
);
echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";









$command = new DropColumn(
    table: 'accounts',
    column: 'email'
);
echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";


$command = new DropConstraint(
    table: 'posts',
    constraint: 'fk_posts_user'
);
echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";






$command = new DropTable('posts');
echo $result = $translator->translate($command);
echo "<br/><br/><br/><br/><br/>";

>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc

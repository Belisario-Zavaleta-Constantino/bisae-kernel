<<<<<<< HEAD
<?php
/**
 * BISAE Kernel
 *
 * DB class for the BISAE ecosystem.
 *
 * Copyright (c) 2018–present BISAE
 * Author: Belisario Zavaleta Constantino
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * See the LICENSE file distributed with this source code.
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *
 * BISAE is a registered trademark.
 * Use of the BISAE name and trademarks is governed separately
 * from the software license.
 *
 * BISAE supports free software principles while enabling
 * commercial and SaaS-based implementations.
 *
 * More information:
 * https://bisae.org/about
 *
 * ------------------------------------------------------------
 *
 * BISAE Kernel
 *
 * Clase DB para el ecosistema BISAE.
 *
 * Copyright (c) 2018–presente BISAE
 * Autor: Belisario Zavaleta Constantino
 *
 * Licenciado bajo la Licencia Apache, Versión 2.0 (la "Licencia");
 * No puede usar este archivo excepto de conformidad con la Licencia.
 * Consulte el archivo de LICENCIA distribuido con este código fuente.
 *
 * Salvo que lo exija la ley aplicable o se acuerde por escrito, el software
 * distribuido bajo la Licencia se distribuye "TAL CUAL",
 * SIN GARANTÍAS NI CONDICIONES DE NINGÚN TIPO, ni expresas ni implícitas.
 *
 * BISAE es una marca registrada.
 * El uso del nombre y las marcas BISAE se regula de forma
 * independiente a la licencia del software.
 *
 * BISAE promueve el software libre y arquitecturas modulares,
 * permitiendo implementaciones comerciales y modelos SaaS.
 *
 * Más información:
 * https://bisae.org/about
 *
 */
namespace bisae\kernel\core\model;
use bisae\kernel\core\model\Entity;

class db extends entity {

    public function __construct(string $name) {
        parent::__construct($name);
    }

    public function table(string $name): entity {
        return new entity($name, $this);
    }

    public function column(string $name): entity {
        return new entity($name, $this);
    }

    public function constraint(string $name): entity {
        return new entity($name, $this);
    }
=======
<?php
/**
 * BISAE Kernel
 *
 * DB class for the BISAE ecosystem.
 *
 * Copyright (c) 2018–present BISAE
 * Author: Belisario Zavaleta Constantino
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * See the LICENSE file distributed with this source code.
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *
 * BISAE is a registered trademark.
 * Use of the BISAE name and trademarks is governed separately
 * from the software license.
 *
 * BISAE supports free software principles while enabling
 * commercial and SaaS-based implementations.
 *
 * More information:
 * https://bisae.org/about
 *
 * ------------------------------------------------------------
 *
 * BISAE Kernel
 *
 * Clase DB para el ecosistema BISAE.
 *
 * Copyright (c) 2018–presente BISAE
 * Autor: Belisario Zavaleta Constantino
 *
 * Licenciado bajo la Licencia Apache, Versión 2.0 (la "Licencia");
 * No puede usar este archivo excepto de conformidad con la Licencia.
 * Consulte el archivo de LICENCIA distribuido con este código fuente.
 *
 * Salvo que lo exija la ley aplicable o se acuerde por escrito, el software
 * distribuido bajo la Licencia se distribuye "TAL CUAL",
 * SIN GARANTÍAS NI CONDICIONES DE NINGÚN TIPO, ni expresas ni implícitas.
 *
 * BISAE es una marca registrada.
 * El uso del nombre y las marcas BISAE se regula de forma
 * independiente a la licencia del software.
 *
 * BISAE promueve el software libre y arquitecturas modulares,
 * permitiendo implementaciones comerciales y modelos SaaS.
 *
 * Más información:
 * https://bisae.org/about
 *
 */
namespace bisae\kernel\core\model;
use bisae\kernel\core\model\Entity;

class db extends entity {

    public function __construct(string $name) {
        parent::__construct($name);
    }

    public function table(string $name): entity {
        return new entity($name, $this);
    }

    public function column(string $name): entity {
        return new entity($name, $this);
    }

    public function constraint(string $name): entity {
        return new entity($name, $this);
    }
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc
}
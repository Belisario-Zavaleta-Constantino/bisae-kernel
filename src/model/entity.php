<?php
/**
 * BISAE Kernel
 *
 * ENTITY class for the BISAE ecosystem.
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
 * Clase ENTITY para el ecosistema BISAE.
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
class entity {
    protected string $name = "";
    protected array $attribute_container = [];
    protected ?entity $parent;

    public function __construct(string $name, ?entity $parent = null) {
        $this->name = $name;
        $this->parent = $parent;
    }
    public function __set($attribute, $value): void {
        $this->attribute_container[$attribute] = $value;
    }
    public function __get($attribute): mixed {
        if (isset($this->attribute_container[$attribute])) {
            return $this->attribute_container[$attribute];
        }
        return null;
    }
    public function get_name(): string {
        return $this->name;
    }
    public function set_name($name): void {
        $this->name = $name;
    }
    public function get($attribute): mixed {
		return $this->attribute_container[$attribute] ?? null;
    }
    public function set($attribute, $value): void {
        $this->attribute_container[$attribute] = $value;
    }
    public function getAll(): array {
        return $this->attribute_container;
    }
    public function fill(array $array): void {
        foreach ($array as $key => $value) {
            $this->set($key, $value);
        }
    }
	public function get_parent(): entity {
        return $this->parent;
    }
    public function set_parent($name): void {
        $this->parent = $name;
    }
}
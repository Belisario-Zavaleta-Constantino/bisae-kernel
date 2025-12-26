<<<<<<< HEAD
<?php
<?php
namespace isae;

/**
 * Session Service
 * 
 * Responsabilidad:
 * - Encapsular el acceso a la sesión PHP
 * - Gestionar estado entre requests
 * - NO renderiza
 * - NO persiste en base de datos
 * 
 * @author Belisario Zavaleta Constantino
 */
final class Session
{
    /**
     * Constructor sin efectos colaterales.
     * No inicia sesión automáticamente.
     */
    public function __construct()
    {
    }

    /**
     * Inicia la sesión si no está activa.
     */
    public function start(): void
    {
        if (!$this->isStarted()) {
            session_start();
        }
    }

    /**
     * Verifica si la sesión está iniciada.
     */
    public function isStarted(): bool
    {
        if (php_sapi_name() === 'cli') {
            return false;
        }

        if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
            return session_status() === PHP_SESSION_ACTIVE;
        }

        return session_id() !== '';
    }

    /**
     * Asigna un valor a la sesión.
     */
    public function set(string $attribute, mixed $value): void
    {
        $_SESSION[$attribute] = $value;
    }

    /**
     * Obtiene un valor de la sesión.
     */
    public function get(string $attribute, mixed $default = null): mixed
    {
        return $_SESSION[$attribute] ?? $default;
    }

    /**
     * Elimina un atributo de la sesión.
     */
    public function remove(string $attribute): void
    {
        unset($_SESSION[$attribute]);
    }

    /**
     * Devuelve todos los atributos de sesión.
     */
    public function all(): array
    {
        return $_SESSION ?? [];
    }

    /**
     * Devuelve el total de atributos almacenados.
     */
    public function count(): int
    {
        return count($_SESSION ?? []);
    }

    /**
     * Llena la sesión a partir de un arreglo.
     * Convierte claves con punto en guion bajo.
     */
    public function fill(array $data): void
    {
        foreach ($data as $key => $value) {
            $key = str_replace('.', '_', $key);
            $_SESSION[$key] = $value;
        }
    }

    /**
     * Destruye completamente la sesión.
     */
    public function destroy(): void
    {
        if ($this->isStarted()) {
            $_SESSION = [];
            session_destroy();
        }
    }

    /**
     * Placeholder para token de sesión.
     * La implementación real pertenece a capa modelo.
     */
    public function token(): bool
    {
        return true;
    }

    /**
     * Placeholder para timestamp de sesión.
     * La persistencia real pertenece a capa modelo.
     */
    public function stamp(): bool
    {
        return true;
    }
}
=======
<?php
<?php
namespace isae;

/**
 * Session Service
 * 
 * Responsabilidad:
 * - Encapsular el acceso a la sesión PHP
 * - Gestionar estado entre requests
 * - NO renderiza
 * - NO persiste en base de datos
 * 
 * @author Belisario Zavaleta Constantino
 */
final class Session
{
    /**
     * Constructor sin efectos colaterales.
     * No inicia sesión automáticamente.
     */
    public function __construct()
    {
    }

    /**
     * Inicia la sesión si no está activa.
     */
    public function start(): void
    {
        if (!$this->isStarted()) {
            session_start();
        }
    }

    /**
     * Verifica si la sesión está iniciada.
     */
    public function isStarted(): bool
    {
        if (php_sapi_name() === 'cli') {
            return false;
        }

        if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
            return session_status() === PHP_SESSION_ACTIVE;
        }

        return session_id() !== '';
    }

    /**
     * Asigna un valor a la sesión.
     */
    public function set(string $attribute, mixed $value): void
    {
        $_SESSION[$attribute] = $value;
    }

    /**
     * Obtiene un valor de la sesión.
     */
    public function get(string $attribute, mixed $default = null): mixed
    {
        return $_SESSION[$attribute] ?? $default;
    }

    /**
     * Elimina un atributo de la sesión.
     */
    public function remove(string $attribute): void
    {
        unset($_SESSION[$attribute]);
    }

    /**
     * Devuelve todos los atributos de sesión.
     */
    public function all(): array
    {
        return $_SESSION ?? [];
    }

    /**
     * Devuelve el total de atributos almacenados.
     */
    public function count(): int
    {
        return count($_SESSION ?? []);
    }

    /**
     * Llena la sesión a partir de un arreglo.
     * Convierte claves con punto en guion bajo.
     */
    public function fill(array $data): void
    {
        foreach ($data as $key => $value) {
            $key = str_replace('.', '_', $key);
            $_SESSION[$key] = $value;
        }
    }

    /**
     * Destruye completamente la sesión.
     */
    public function destroy(): void
    {
        if ($this->isStarted()) {
            $_SESSION = [];
            session_destroy();
        }
    }

    /**
     * Placeholder para token de sesión.
     * La implementación real pertenece a capa modelo.
     */
    public function token(): bool
    {
        return true;
    }

    /**
     * Placeholder para timestamp de sesión.
     * La persistencia real pertenece a capa modelo.
     */
    public function stamp(): bool
    {
        return true;
    }
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc

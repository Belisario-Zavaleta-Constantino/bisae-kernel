<?php
<?php
namespace isae;

/**
 * Request Service
 *
 * Responsabilidad:
 * - Encapsular GET y POST
 * - Normalizar acceso a datos de entrada
 * - NO renderiza
 * - NO construye SQL
 * - NO modifica superglobales
 *
 * @author Belisario Zavaleta Constantino
 */
final class Request
{
    private array $data = [];
    private string $method;

    /**
     * Constructor sin efectos colaterales externos.
     */
    public function __construct(?string $method = null)
    {
        $this->method = strtoupper($method ?? ($_SERVER['REQUEST_METHOD'] ?? 'GET'));
        $this->capture();
    }

    /**
     * Captura los datos de entrada según el método HTTP.
     */
    private function capture(): void
    {
        if ($this->method === 'POST') {
            $this->data = filter_input_array(INPUT_POST) ?? [];
        } elseif ($this->method === 'GET') {
            $this->data = filter_input_array(INPUT_GET) ?? [];
        } else {
            $this->data = [];
        }
    }

    /**
     * Devuelve el método HTTP.
     */
    public function method(): string
    {
        return $this->method;
    }

    /**
     * Obtiene un parámetro.
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return $this->data[$key] ?? $default;
    }

    /**
     * Verifica existencia de un parámetro, con operador opcional.
     */
    public function exists(string $key, mixed $value = null, string $operator = '='): bool
    {
        if (!array_key_exists($key, $this->data)) {
            return false;
        }

        if ($value === null) {
            return true;
        }

        $input = $this->data[$key];

        return match ($operator) {
            '='  => $input == $value,
            '!=' => $input != $value,
            '<'  => $input < $value,
            '>'  => $input > $value,
            '<=' => $input <= $value,
            '>=' => $input >= $value,
            default => false
        };
    }

    /**
     * Devuelve todos los parámetros.
     */
    public function all(): array
    {
        return $this->data;
    }

    /**
     * Total de parámetros recibidos.
     */
    public function count(): int
    {
        return count($this->data);
    }

    /**
     * Obtiene un subconjunto estructurado:
     * ejemplo: user_name, user_email → ['name'=>..., 'email'=>...]
     */
    public function getArray(string $prefix, string $separator = '_', bool $includeEmpty = false): array
    {
        $result = [];

        foreach ($this->data as $key => $value) {
            if (is_array($value)) {
                continue;
            }

            if (!$includeEmpty && empty($value)) {
                continue;
            }

            if (str_starts_with($key, $prefix . $separator)) {
                $parts = explode($separator, $key);
                array_shift($parts);

                $ref =& $result;
                foreach ($parts as $part) {
                    if (!isset($ref[$part])) {
                        $ref[$part] = [];
                    }
                    $ref =& $ref[$part];
                }
                $ref = $value;
            }
        }

        return $result;
    }
}

<?php
namespace isae;

/**
 * Authenticated Controller (Kernel BISAE)
 *
 * Flujo:
 * - Verifica cierre de sesión
 * - Verifica sesión activa
 * - Valida credenciales
 * - Ejecuta ciclo del controlador
 *
 * @author Belisario Zavaleta Constantino
 */
abstract class AuthController extends Model
{
    protected Session $session;
    protected Request $get;
    protected Request $post;
    protected db $db;

    public function __construct(db $db)
    {
        parent::__construct();

        date_default_timezone_set('America/Mexico_City');

        $this->db = $db;
        $this->session = new Session();
        $this->session->start();

        $this->get  = new Request('GET');
        $this->post = new Request('POST');

        $this->boot();
    }

    /**
     * Flujo principal de autenticación
     */
    private function boot(): void
    {
        if ($this->wantsLogout()) {
            $this->logout();
            return;
        }

        if ($this->hasValidSession()) {
            $this->onAuthenticated();
            return;
        }

        if ($this->wantsLogin()) {
            $this->attemptLogin();
            return;
        }

        $this->onGuest();
    }

    /**
     * ---------- Estados ----------
     */

    protected function wantsLogout(): bool
    {
        return $this->post->exists('accion', 'salir')
            || $this->get->exists('accion', 'salir');
    }

    protected function hasValidSession(): bool
    {
        return $this->session->get('tipo_usuario') === $this->tipo_usuario
            && $this->session->get('usuario')
            && $this->session->get('contra')
            && $this->session->token()
            && $this->session->stamp();
    }

    protected function wantsLogin(): bool
    {
        return $this->post->exists('accion', 'validar_usuario')
            && $this->post->exists('usuario')
            && $this->post->exists('contra');
    }

    /**
     * ---------- Acciones ----------
     */

    protected function logout(): void
    {
        $this->session->destroy();
        $this->onLogout();
    }

    protected function attemptLogin(): void
    {
        $user = $this->post->get('usuario');
        $pass = $this->post->get('contra');

        if (!$user || !$pass) {
            $this->onLoginError('Usuario y contraseña requeridos');
            return;
        }

        $identity = $this->authenticate($user, $pass);

        if (!$identity) {
            $this->onLoginError('Usuario o contraseña incorrectos');
            return;
        }

        $this->session->set('tipo_usuario', $this->tipo_usuario);
        $this->session->set('sid_usuario', $identity['sid']);
        $this->session->set('usuario', $user);
        $this->session->set('nombre', $identity['nombre']);
        $this->session->set('stamp', date('Y-m-d H:i:s'));

        $this->onAuthenticated();
    }

    /**
     * ---------- Hooks BISAE ----------
     */

    abstract protected function authenticate(string $user, string $pass): ?array;

    abstract protected function onAuthenticated(): void;

    abstract protected function onGuest(): void;

    abstract protected function onLoginError(string $message): void;

    abstract protected function onLogout(): void;
}

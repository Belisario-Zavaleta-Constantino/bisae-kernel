<?php

final class AdminController extends AuthController
{
    protected function authenticate(string $user, string $pass): ?array
    {
        // consulta DB real aquí
    }

    protected function onAuthenticated(): void
    {
        $this->__setup();
        $this->__dev();
        $this->__end();
    }

    protected function onGuest(): void
    {
        $this->view->_login($this);
    }

    protected function onLoginError(string $message): void
    {
        $this->view->_login($this, $message, 4);
    }

    protected function onLogout(): void
    {
        $this->view->_login($this, 'Gracias por su visita', 2);
    }
}

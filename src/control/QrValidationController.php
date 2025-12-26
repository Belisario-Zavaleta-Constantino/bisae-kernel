<<<<<<< HEAD
<?php
final class QrValidationController extends PublicController
{
    protected function __setup(): void
    {
        // validar parámetros mínimos
    }

    protected function __dev(): void
    {
        $code = $this->get->get('qr');

        if (!$code) {
            $this->view->error('QR inválido');
            return;
        }

        $data = $this->model->findByQr($code);

        $this->view->render($data);
    }

    protected function __end(): void
    {
    }
}
=======
<?php
final class QrValidationController extends PublicController
{
    protected function __setup(): void
    {
        // validar parámetros mínimos
    }

    protected function __dev(): void
    {
        $code = $this->get->get('qr');

        if (!$code) {
            $this->view->error('QR inválido');
            return;
        }

        $data = $this->model->findByQr($code);

        $this->view->render($data);
    }

    protected function __end(): void
    {
    }
}
>>>>>>> 592f152ef533241bbdb144c4e5bbbe19b897f4cc

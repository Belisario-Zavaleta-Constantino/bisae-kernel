<?php
namespace isae;

/**
 * Public Controller (Kernel BISAE)
 *
 * Uso:
 * - Reportes públicos
 * - Consultas por QR
 * - Resúmenes
 * - Acceso a datos sin autenticación
 *
 * @author Belisario Zavaleta Constantino
 */
abstract class PublicController extends Model
{
    protected db $db;
    protected Session $session;
    protected Request $get;
    protected Request $post;

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
     * Ciclo de vida estándar BISAE
     */
    private function boot(): void
    {
        $this->onVisit();

        $this->__setup();
        $this->__dev();
        $this->__end();
    }

    /**
     * Hook opcional para métricas públicas
     */
    protected function onVisit(): void
    {
        // intencionalmente vacío
        // puede ser sobrescrito
    }

    abstract protected function __setup(): void;
    abstract protected function __dev(): void;
    abstract protected function __end(): void;
}

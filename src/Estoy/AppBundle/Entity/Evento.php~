<?php
namespace Estoy\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Entity Transfer
 *
 * @ORM\Table("e_evento")
 * @ORM\Entity
 */
class Evento
{
    use ORMBehaviors\Timestampable\Timestampable;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string")
     */
    protected $titulo;

    /**
     * @var datetime
     *
     * @ORM\Column(name="fecha_fin", type="datetime")
     */
    protected $fecha_fin;

    /**
     * @var integer
     *
     * @ORM\Column(name="precio_minimo", type="integer")
     */
    protected $precio_minimo;

    /**
     * @var integer
     *
     * @ORM\Column(name="precio_inicial", type="integer")
     */
    protected $precio_inicial;


    /**
     * @var string
     *
     * @ORM\Column(name="localizacion", type="string")
     */
    protected $localizacion;


    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string")
     */
    protected $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string")
     */
    protected $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    protected $email;


    /**
     * @var integer
     *
     * @ORM\Column(name="telefono", type="string")
     */
    protected $telefono;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Evento
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Evento
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fecha_inicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * Set precioMinimo
     *
     * @param integer $precioMinimo
     *
     * @return Evento
     */
    public function setPrecioMinimo($precioMinimo)
    {
        $this->precio_minimo = $precioMinimo;

        return $this;
    }

    /**
     * Get precioMinimo
     *
     * @return integer
     */
    public function getPrecioMinimo()
    {
        return $this->precio_minimo;
    }

    /**
     * Set precioInicial
     *
     * @param integer $precioInicial
     *
     * @return Evento
     */
    public function setPrecioInicial($precioInicial)
    {
        $this->precio_inicial = $precioInicial;

        return $this;
    }

    /**
     * Get precioInicial
     *
     * @return integer
     */
    public function getPrecioInicial()
    {
        return $this->precio_inicial;
    }

    /**
     * Set localizacion
     *
     * @param string $localizacion
     *
     * @return Evento
     */
    public function setLocalizacion($localizacion)
    {
        $this->localizacion = $localizacion;

        return $this;
    }

    /**
     * Get localizacion
     *
     * @return string
     */
    public function getLocalizacion()
    {
        return $this->localizacion;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Evento
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Evento
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Evento
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     *
     * @return Evento
     */
    public function setFechaFin($fechaFin)
    {
        $this->fecha_fin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Evento
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}

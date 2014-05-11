<?php
namespace Contagric\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingreso
 *
 * @ORM\Entity(repositoryClass="Contagric\BackendBundle\Entity\IngresoRepository")
 * @ORM\Table(name="ingreso")
 */
class Ingreso
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Campaña", inversedBy="ingreso")
     * @ORM\JoinColumn(name="campaña_id", referencedColumnName="id", nullable=false)
     */
    protected $campaña;

    /**
     *
     * @ORM\Column(name="cantidad", type="decimal", precision=2, scale=1)
     */
    protected $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="concepto", type="string", length=200)
     */
    protected $concepto;

    /**
     * @var datetime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    protected $fecha;


    public function __toString()
    {
        return $this->getCantidad().'€ - '.$this->getConcepto();
    }

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
     * Set campaña
     *
     * @param \Contagric\BackendBundle\Entity\Campaña $campaña
     * @return Ingreso
     */
    public function setCampaña(\Contagric\BackendBundle\Entity\Campaña $campaña)
    {
        $this->campaña = $campaña;
    
        return $this;
    }

    /**
     * Get campaña
     *
     * @return \Contagric\BackendBundle\Entity\Campaña $campaña
     */
    public function getCampaña()
    {
        return $this->campaña;
    }

    /**
     * Set cantidad
     *
     * @param decimal $cantidad
     * @return Ingreso
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    
        return $cantidad;
    }

    /**
     * Get cantidad
     *
     * @return decimal 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set fecha
     *
     * @param string $fecha
     * @return Ingreso
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $fecha;
    }

    /**
     * Get fecha
     *
     * @return datetime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set concepto
     *
     * @param string $concepto
     * @return Ingreso
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;
    
        return $concepto;
    }

    /**
     * Get concepto
     *
     * @return string 
     */
    public function getConcepto()
    {
        return $this->concepto;
    }
}

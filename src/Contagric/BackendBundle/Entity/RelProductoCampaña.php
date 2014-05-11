<?php

namespace Contagric\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * RelProductoCampaña
 *
 * @ORM\Entity(repositoryClass="Contagric\BackendBundle\Entity\RelProductoCampañaRepository")
 * @ORM\Table(name="rel_producto_campaña", uniqueConstraints={@ORM\UniqueConstraint(name="unique_campana_producto", columns={"campaña_id", "producto_id", "fecha"})})
 * @DoctrineAssert\UniqueEntity(fields={"campaña", "producto","fecha"}, message="Este producto ya existe en esta campaña para la misma fecha.")
 */
class RelProductoCampaña
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
        
    /**
     * @ORM\ManyToOne(targetEntity="Producto", inversedBy="gastoProducto")
     * @ORM\JoinColumn(name="producto_id", referencedColumnName="id", nullable=false)
     */
    protected $producto;

    /**
     * @ORM\ManyToOne(targetEntity="Campaña", inversedBy="gastoProducto")
     * @ORM\JoinColumn(name="campaña_id", referencedColumnName="id", nullable=false)
     */
    protected $campaña;

    /**
     *
     * @ORM\Column(name="coste", type="decimal", precision=2, scale=1)
     */
    protected $coste;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="text")
     */
    protected $comentario;

    /**
     * @var datetime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    protected $fecha;


    public function __toString()
    {
        return $this->getProducto()->getNombre();
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
     * Set producto
     *
     * @param \Contagric\BackendBundle\Entity\Producto $producto
     * @return RelProductoCampaña
     */
    public function setProducto(\Contagric\BackendBundle\Entity\Producto  $producto)
    {
        $this->producto = $producto;
    
        return $this;
    }

    /**
     * Get producto
     *
     * @return \Contagric\BackendBundle\Entity\Producto 
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set campaña
     *
     * @param \Contagric\BackendBundle\Entity\Campaña $campaña
     * @return RelProductoCampaña
     */
    public function setCampaña(\Contagric\BackendBundle\Entity\Campaña $campaña)
    {
        $this->campaña = $campaña;
    
        return $this;
    }

    /**
     * Get campaña
     *
     * @return \Contagric\BackendBundle\Entity\Campaña
     */
    public function getCampaña()
    {
        return $this->campaña;
    }

    /**
     * Set coste
     *
     * @param decimal $coste
     * @return RelProductoCampaña
     */
    public function setCoste($coste)
    {
        $this->coste = $coste;
    
        return $coste;
    }

    /**
     * Get coste
     *
     * @return decimal 
     */
    public function getCoste()
    {
        return $this->coste;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return RelProductoCampaña
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    
        return $comentario;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set fecha
     *
     * @param datetime $fecha
     * @return RelProductoCampaña
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
}


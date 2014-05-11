<?php

namespace Contagric\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * RelProductoCampanya
 *
 * @ORM\Entity(repositoryClass="Contagric\BackendBundle\Entity\RelProductoCampanyaRepository")
 * @ORM\Table(name="rel_producto_campanya", uniqueConstraints={@ORM\UniqueConstraint(name="unique_campana_producto", columns={"campanya_id", "producto_id", "fecha"})})
 * @DoctrineAssert\UniqueEntity(fields={"campanya", "producto","fecha"}, message="Este producto ya existe en esta campanya para la misma fecha.")
 */
class RelProductoCampanya
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
     * @ORM\ManyToOne(targetEntity="Campanya", inversedBy="gastoProducto")
     * @ORM\JoinColumn(name="campanya_id", referencedColumnName="id", nullable=false)
     */
    protected $campanya;

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
     * @return RelProductoCampanya
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
     * Set campanya
     *
     * @param \Contagric\BackendBundle\Entity\Campanya $campanya
     * @return RelProductoCampanya
     */
    public function setCampanya(\Contagric\BackendBundle\Entity\Campanya $campanya)
    {
        $this->campanya = $campanya;
    
        return $this;
    }

    /**
     * Get campanya
     *
     * @return \Contagric\BackendBundle\Entity\Campanya
     */
    public function getCampanya()
    {
        return $this->campanya;
    }

    /**
     * Set coste
     *
     * @param decimal $coste
     * @return RelProductoCampanya
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
     * @return RelProductoCampanya
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
     * @return RelProductoCampanya
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


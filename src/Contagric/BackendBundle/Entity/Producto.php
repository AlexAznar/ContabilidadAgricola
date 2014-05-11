<?php
namespace Contagric\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Entity(repositoryClass="Contagric\BackendBundle\Entity\ProductoRepository")
 * @ORM\Table(name="producto")
 */
class Producto
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=150)
     */
    protected $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    protected $descripcion;

      /**
     * @ORM\OneToMany(targetEntity="RelProductoCampaña", mappedBy="producto")
     */
    protected $gastoProducto;

    /**
     * @var datetime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;
    
    /**
     * @var datetime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;


    public function __toString()
    {
        return $this->getNombre() ?: '';
    }

    public function __construct()
    {
        $this->gastoProducto = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Producto
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $nombre;
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Producto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Producto
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Producto
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }


    /**
     * Get gastoProducto
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGastoProducto()
    {
        return $this->gastoProducto;
    }

    /**
     * Add gastoProducto
     *
     * @param \Contagric\BackendBundle\Entity\RelProductoCampaña $gastoProducto
     * @return Producto
     */
    public function addGastoProducto(\Contagric\BackendBundle\Entity\RelProductoCampaña $gastoProducto)
    {
        $gastoProducto->setCampaña($this);
        $this->gastoProducto->add($gastoProducto);
        
        return $this;
    }

    /**
     * Remove gastoProducto
     *
     * @param \Contagric\BackendBundle\Entity\RelProductoCampaña $gastoProducto
     */
    public function removeGastoProducto(\Contagric\BackendBundle\Entity\RelProductoCampaña $gastoProducto)
    {
        $this->gastoProducto->removeElement($gastoProducto);
    }

}

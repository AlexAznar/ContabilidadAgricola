<?php
namespace Contagric\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trabajo
 *
 * @ORM\Entity(repositoryClass="Contagric\BackendBundle\Entity\TrabajoRepository")
 * @ORM\Table(name="trabajo")
 */
class Trabajo
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
     * @ORM\OneToMany(targetEntity="RelTrabajoTrabajador", mappedBy="trabajo", cascade={"persist"}, orphanRemoval=true)
     */
    protected $gastoTrabajo;

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
        $this->gastoTrabajo = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Trabajo
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
     * @return Trabajo
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
     * @return Trabajo
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
     * @return Trabajo
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
     * Get gastoTrabajo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGastoTrabajo()
    {
        return $this->gastoTrabajo;
    }

    /**
     * Add gastoTrabajo
     *
     * @param \Contagric\BackendBundle\Entity\RelTrabajoTrabajador $gastoTrabajo
     * @return Trabajo
     */
    public function addGastoTrabajo(\Contagric\BackendBundle\Entity\RelTrabajoTrabajador $gastoTrabajo)
    {
        $gastoTrabajo->setCampaña($this);
        $this->gastoTrabajo->add($gastoTrabajo);
        
        return $this;
    }

    /**
     * Remove gastoTrabajo
     *
     * @param \Contagric\BackendBundle\Entity\RelTrabajoTrabajador $gastoTrabajo
     */
    public function removeGastoTrabajo(\Contagric\BackendBundle\Entity\RelTrabajoTrabajador $gastoTrabajo)
    {
        $this->gastoTrabajo->removeElement($gastoTrabajo);
    }
}

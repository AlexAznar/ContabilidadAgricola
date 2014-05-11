<?php
namespace Contagric\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trabajador
 *
 * @ORM\Entity(repositoryClass="Contagric\BackendBundle\Entity\TrabajadorRepository")
 * @ORM\Table(name="trabajador")
 */
class Trabajador
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
     * @var string
     *
     * @ORM\Column(name="telefono", type="text")
     */
    protected $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="text", nullable = true)
     */
    protected $direccion;

    /**
     * @ORM\OneToMany(targetEntity="RelTrabajoTrabajador", mappedBy="trabajador",cascade={"persist"}, orphanRemoval=true)
     */
    protected $trabajoRealizado;

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
        $this->trabajoRealizado = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");
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
     * @return Trabajador
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
     * Set telefono
     *
     * @param string $telefono
     * @return Trabajador
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
     * Set direccion
     *
     * @param string $direccion
     * @return Trabajador
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }


    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Trabajador
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
     * @return Trabajador
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
     * @return Trabajador
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
     * Get trabajoRealizado
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTrabajoRealizado()
    {
        return $this->trabajoRealizado;
    }

    /**
     * Add trabajoRealizado
     *
     * @param \Contagric\BackendBundle\Entity\RelTrabajoTrabajador $trabajoRealizado
     * @return Trabajador
     */
    public function addTrabajoRealizado(\Contagric\BackendBundle\Entity\RelTrabajoTrabajador $trabajoRealizado)
    {
        $trabajoRealizado->setCampanya($this);
        $this->trabajoRealizado->add($trabajoRealizado);
        
        return $this;
    }

    /**
     * Remove trabajoRealizado
     *
     * @param \Contagric\BackendBundle\Entity\RelTrabajoTrabajador $trabajoRealizado
     */
    public function removeTrabajoRealizado(\Contagric\BackendBundle\Entity\RelTrabajoTrabajador $trabajoRealizado)
    {
        $this->trabajoRealizado->removeElement($trabajoRealizado);
    }
}

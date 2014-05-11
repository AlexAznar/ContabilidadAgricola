<?php
namespace Contagric\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campanya
 *
 * @ORM\Entity(repositoryClass="Contagric\BackendBundle\Entity\CampanyaRepository")
 * @ORM\Table(name="campanya")
 */
class Campanya
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
     * @ORM\Column(name="comentario", type="text")
     */
    protected $comentario;

    /**
     * @ORM\ManyToOne(targetEntity="Finca")
     * @ORM\JoinColumn(name="finca_id", referencedColumnName="id", nullable=false)
     */
    protected $finca;

    /**
     * @ORM\OneToMany(targetEntity="Ingreso", mappedBy="campanya", cascade={"persist"}, orphanRemoval=true)
     */
    protected $ingreso;

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

    /**
     * @ORM\OneToMany(targetEntity="RelProductoCampanya", mappedBy="campanya", cascade={"persist"}, orphanRemoval=true)
     */
    protected $gastoProducto;

    /**
     * @ORM\OneToMany(targetEntity="RelTrabajoTrabajador", mappedBy="campanya", cascade={"persist"}, orphanRemoval=true)
     */
    protected $gastoTrabajo;

    /**
     * @ORM\OneToMany(targetEntity="RelGeneroCampanya", mappedBy="campanya", cascade={"persist"}, orphanRemoval=true)
     */
    protected $generoProducido;


    public function __toString()
    {
        return $this->getNombre().' - '.$this->getFinca();
    }

    public function __construct()
    {
        $this->gastoProducto = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gastoTrabajo = new \Doctrine\Common\Collections\ArrayCollection();
        $this->generoProducido = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Campanya
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
     * Set comentario
     *
     * @param string $comentario
     * @return Campanya
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    
        return $this;
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
     * Set finca
     *
     * @param \Contagric\BackendBundle\Entity\Finca 
     * @return Campanya
     */
    public function setFinca(\Contagric\BackendBundle\Entity\Finca $finca)
    {
        $this->finca = $finca;
    
        return $this;
    }

    /**
     * Get finca
     *
     * @return \Contagric\BackendBundle\Entity\Finca
     */
    public function getFinca()
    {
        return $this->finca;
    }

    /**
    * Set ingreso
    *
    * @param Doctrine\ORM\PersistentCollection $ingreso
    */
    public function setIngreso(\Doctrine\ORM\PersistentCollection $ingresos)
    {
        $this->ingreso = new \Doctrine\Common\Collections\ArrayCollection();

        foreach ($ingresos as $ingreso) {
            $this->addIngreso($ingreso);
        }

        return $this;
    }

    /**
     * Get ingreso
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIngreso()
    {
        return $this->ingreso;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Campanya
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
     * @return Campanya
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
    * Set gastoProducto
    *
    * @param Doctrine\ORM\PersistentCollection $gastoProducto
    */
    public function setGastoProducto(\Doctrine\ORM\PersistentCollection $gastoProducto)
    {
        $this->gastoProducto = new \Doctrine\Common\Collections\ArrayCollection();

        foreach ($gastoProducto as $gp) {
            $this->addGastoProducto($gp);
        }

        return $this;
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
    * Set gastoTrabajo
    *
    * @param Doctrine\ORM\PersistentCollection $gastoTrabajo
    */
    public function setGastoTrabajo(\Doctrine\ORM\PersistentCollection $gastoTrabajo)
    {
        $this->gastoTrabajo = new \Doctrine\Common\Collections\ArrayCollection();

        foreach ($gastoTrabajo as $gt) {
            $this->addGastoTrabajo($gt);
        }

        return $this;
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
    * Set generoProducido
    *
    * @param Doctrine\ORM\PersistentCollection $generoProducido
    */
    public function setGeneroProducido(\Doctrine\ORM\PersistentCollection $generoProducido)
    {
        $this->generoProducido = new \Doctrine\Common\Collections\ArrayCollection();

        foreach ($generoProducido as $gp) {
            $this->addGeneroProducido($gp);
        }

        return $this;
    }

    /**
     * Get generoProducido
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGeneroProducido()
    {
        return $this->generoProducido;
    }

    /**
     * Add gastoProducto
     *
     * @param \Contagric\BackendBundle\Entity\RelProductoCampanya $gastoProducto
     * @return Campanya
     */
    public function addGastoProducto(\Contagric\BackendBundle\Entity\RelProductoCampanya $gastoProducto)
    {
        $gastoProducto->setCampanya($this);
        $this->gastoProducto->add($gastoProducto);
        
        return $this;
    }

    /**
     * Remove gastoProducto
     *
     * @param \Contagric\BackendBundle\Entity\RelProductoCampanya $gastoProducto
     */
    public function removeGastoProducto(\Contagric\BackendBundle\Entity\RelProductoCampanya $gastoProducto)
    {
        $this->gastoProducto->removeElement($gastoProducto);
    }

    /**
     * Add gastoTrabajo
     *
     * @param \Contagric\BackendBundle\Entity\RelProductoCampanya $gastoTrabajo
     * @return Campanya
     */
    public function addGastoTrabajo(\Contagric\BackendBundle\Entity\RelProductoCampanya $gastoTrabajo)
    {
        $gastoTrabajo->setCampanya($this);
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

    /**
     * Add generoProducido
     *
     * @param \Contagric\BackendBundle\Entity\RelGeneroCampanya $generoProducido
     * @return Campanya
     */
    public function addGeneroProducido(\Contagric\BackendBundle\Entity\RelGeneroCampanya $generoProducido)
    {
        $generoProducido->setCampanya($this);
        $this->generoProducido->add($generoProducido);
        
        return $this;
    }

    /**
     * Remove generoProducido
     *
     * @param \Contagric\BackendBundle\Entity\RelGeneroCampanya $generoProducido
     */
    public function removeGeneroProducido(\Contagric\BackendBundle\Entity\RelGeneroCampanya $generoProducido)
    {
        $this->generoProducido->removeElement($generoProducido);
    }

    /**
     * Add ingreso
     *
     * @param \Contagric\BackendBundle\Entity\Ingreso $ingreso
     * @return Campanya
     */
    public function addIngreso(\Contagric\BackendBundle\Entity\Ingreso $ingreso)
    {
        $ingreso->setCampanya($this);
        $this->ingreso->add($ingreso);
        
        return $this;
    }

    /**
     * Remove ingreso
     *
     * @param \Contagric\BackendBundle\Entity\Ingreso $ingreso
     */
    public function removeIngreso(\Contagric\BackendBundle\Entity\Ingreso $ingreso)
    {
        $this->ingreso->removeElement($ingreso);
    }

}


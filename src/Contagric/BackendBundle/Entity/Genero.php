<?php
namespace Contagric\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genero
 *
 * @ORM\Entity(repositoryClass="Contagric\BackendBundle\Entity\GeneroRepository")
 * @ORM\Table(name="genero")
 */
class Genero
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
     * @ORM\Column(name="tipo", type="string", length=150)
     */
    protected $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="clase", type="string", length=150)
     */
    protected $clase;

      /**
     * @ORM\OneToMany(targetEntity="RelGeneroCampaña", mappedBy="producto")
     */
    protected $generoProducido;

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
        return $this->getTipo() .' - '. $this->getClase();
    }

    public function __construct()
    {
        $this->generoProducido = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tipo
     *
     * @param string $tipo
     * @return Genero
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $tipo;
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

    /**
     * Set clase
     *
     * @param string $clase
     * @return Genero
     */
    public function setClase($clase)
    {
        $this->clase = $clase;
    
        return $this;
    }

    /**
     * Get clase
     *
     * @return string 
     */
    public function getClase()
    {
        return $this->clase;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Genero
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
     * @return Genero
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
     * Get generoProducido
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGeneroProducido()
    {
        return $this->generoProducido;
    }

    /**
     * Add generoProducido
     *
     * @param \Contagric\BackendBundle\Entity\RelGeneroCampaña $generoProducido
     * @return Genero
     */
    public function addGeneroProducido(\Contagric\BackendBundle\Entity\RelGeneroCampaña $generoProducido)
    {
        $generoProducido->setCampaña($this);
        $this->generoProducido->add($generoProducido);
        
        return $this;
    }

    /**
     * Remove generoProducido
     *
     * @param \Contagric\BackendBundle\Entity\RelGeneroCampaña $generoProducido
     */
    public function removeGeneroProducido(\Contagric\BackendBundle\Entity\RelGeneroCampaña $generoProducido)
    {
        $this->generoProducido->removeElement($generoProducido);
    }
}

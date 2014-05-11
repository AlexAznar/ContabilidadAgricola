<?php

namespace Contagric\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * RelGeneroCampaña
 *
 * @ORM\Entity(repositoryClass="Contagric\BackendBundle\Entity\RelGeneroCampañaRepository")
 * @ORM\Table(name="rel_genero_campaña", uniqueConstraints={@ORM\UniqueConstraint(name="unique_campaña_genero", columns={"campaña_id", "genero_id", "fecha"})})
 * @DoctrineAssert\UniqueEntity(fields={"campaña", "genero","fecha"}, message="Este genero ya existe en esta campaña para la misma fecha.")
 */
class RelGeneroCampaña
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
        
    /**
     * @ORM\ManyToOne(targetEntity="Genero", inversedBy="generoProducido")
     * @ORM\JoinColumn(name="genero_id", referencedColumnName="id", nullable=false)
     */
    protected $genero;

    /**
     * @ORM\ManyToOne(targetEntity="Campaña", inversedBy="gastoGenero")
     * @ORM\JoinColumn(name="campaña_id", referencedColumnName="id", nullable=false)
     */
    protected $campaña;

    /**
     *
     * @ORM\Column(name="kilos", type="decimal", precision=2, scale=1)
     */
    protected $kilos;

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
        return $this->getGenero()->getTipo() .' - '. $this->getGenero()->getClase();
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
     * Set genero
     *
     * @param \Contagric\BackendBundle\Entity\Genero $genero
     * @return RelGeneroCampaña
     */
    public function setGenero(\Contagric\BackendBundle\Entity\Genero  $genero)
    {
        $this->genero = $genero;
    
        return $this;
    }

    /**
     * Get genero
     *
     * @return \Contagric\BackendBundle\Entity\Genero 
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set campaña
     *
     * @param \Contagric\BackendBundle\Entity\Campaña $campaña
     * @return RelGeneroCampaña
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
     * Set kilos
     *
     * @param decimal $kilos
     * @return RelGeneroCampaña
     */
    public function setKilos($kilos)
    {
        $this->kilos = $kilos;
    
        return $kilos;
    }

    /**
     * Get kilos
     *
     * @return decimal 
     */
    public function getKilos()
    {
        return $this->kilos;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return RelGeneroCampaña
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
     * @return RelGeneroCampaña
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


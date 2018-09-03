<?php

namespace Contagric\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * RelGeneroCampanya
 *
 * @ORM\Entity(repositoryClass="Contagric\BackendBundle\Entity\RelGeneroCampanyaRepository")
 * @ORM\Table(name="rel_genero_campanya", uniqueConstraints={@ORM\UniqueConstraint(name="unique_campana_genero", columns={"campanya_id", "genero_id", "fecha"})})
 * @DoctrineAssert\UniqueEntity(fields={"campanya", "genero","fecha"}, message="Este genero ya existe en esta campanya para la misma fecha.")
 */
class RelGeneroCampanya
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
     * @ORM\ManyToOne(targetEntity="Campanya", inversedBy="gastoGenero")
     * @ORM\JoinColumn(name="campanya_id", referencedColumnName="id", nullable=false)
     */
    protected $campanya;

    /**
     *
     * @ORM\Column(name="kilos", type="decimal", precision=7, scale=2)
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
     * @ORM\Column(name="fecha", type="date")
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
     * @return RelGeneroCampanya
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
     * Set campanya
     *
     * @param \Contagric\BackendBundle\Entity\Campanya $campanya
     * @return RelGeneroCampanya
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
     * Set kilos
     *
     * @param decimal $kilos
     * @return RelGeneroCampanya
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
     * @return RelGeneroCampanya
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
     * @return RelGeneroCampanya
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


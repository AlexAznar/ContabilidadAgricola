<?php

namespace Contagric\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * RelTrabajoTrabajador
 *
 * @ORM\Entity(repositoryClass="Contagric\BackendBundle\Entity\RelTrabajoTrabajadorRepository")
 * @ORM\Table(name="rel_trabajo_trabajador", uniqueConstraints={@ORM\UniqueConstraint(name="unique_campana_trabajo_trabajador", columns={"campanya_id", "trabajo_id", "trabajador_id", "fecha"})})
 * @DoctrineAssert\UniqueEntity(fields={"campanya", "trabajo", "trabajador", "fecha"}, message="Este trabajo ya existe para este trabajador en esta campanya para la misma fecha.")
 */
class RelTrabajoTrabajador
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
        
    /**
     * @ORM\ManyToOne(targetEntity="Trabajo", inversedBy="gastoTrabajo")
     * @ORM\JoinColumn(name="trabajo_id", referencedColumnName="id", nullable=false)
     */
    protected $trabajo;

    /**
     * @ORM\ManyToOne(targetEntity="Trabajador", inversedBy="trabajoRealizado")
     * @ORM\JoinColumn(name="trabajador_id", referencedColumnName="id", nullable=false)
     */
    protected $trabajador;

    /**
     * @ORM\ManyToOne(targetEntity="Campanya", inversedBy="gastoTrabajo")
     * @ORM\JoinColumn(name="campanya_id", referencedColumnName="id", nullable=false)
     */
    protected $campanya;

    /**
     *
     * @ORM\Column(name="horas", type="decimal", precision=7, scale=2)
     */
    protected $horas;

    /**
     *
     * @ORM\Column(name="coste", type="decimal", precision=7, scale=2)
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
     * @ORM\Column(name="fecha", type="date")
     */
    protected $fecha;


    public function __toString()
    {
        return $this->getTrabajo()->getNombre();
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
     * Set trabajo
     *
     * @param \Contagric\BackendBundle\Entity\Trabajo $trabajo
     * @return RelTrabajoTrabajador
     */
    public function setTrabajo(\Contagric\BackendBundle\Entity\Trabajo  $trabajo)
    {
        $this->trabajo = $trabajo;
    
        return $this;
    }

    /**
     * Get trabajo
     *
     * @return \Contagric\BackendBundle\Entity\Trabajo 
     */
    public function getTrabajo()
    {
        return $this->trabajo;
    }

    /**
     * Set trabajador
     *
     * @param \Contagric\BackendBundle\Entity\Trabajador $trabajador
     * @return RelTrabajoTrabajador
     */
    public function setTrabajador(\Contagric\BackendBundle\Entity\Trabajador  $trabajador)
    {
        $this->trabajador = $trabajador;
    
        return $this;
    }

    /**
     * Get trabajador
     *
     * @return \Contagric\BackendBundle\Entity\Trabajador 
     */
    public function getTrabajador()
    {
        return $this->trabajador;
    }

    /**
     * Set campanya
     *
     * @param \Contagric\BackendBundle\Entity\Campanya $campanya
     * @return RelTrabajoTrabajador
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
     * @param decimal $horas
     * @return RelTrabajoTrabajador
     */
    public function setHoras($horas)
    {
        $this->horas = $horas;
    
        return $horas;
    }

    /**
     * Get horas
     *
     * @return decimal 
     */
    public function getHoras()
    {
        return $this->horas;
    }

    /**
     * Set coste
     *
     * @param decimal $coste
     * @return RelTrabajoTrabajador
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
     * @return RelTrabajoTrabajador
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
     * @return RelTrabajoTrabajador
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


<?php

namespace Contagric\BackendBundle\Block;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Block\BaseBlockService;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

use Contagric\BackendBundle\Entity\Campanya;
use Contagric\BackendBundle\Entity\CampanyaRepository;

use Doctrine\ORM\EntityManager;

class ResumeBlockService extends BaseBlockService
{

    private $em;

    public function __construct($name, $templating, EntityManager $entityManager)
    {
            parent::__construct($name, $templating);
            $this->em = $entityManager;
    }

    public function getName()
    {
        return 'Resumen Campañas';
    }

    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'url'      => false,
            'title'    => 'Resumen Campañas',
            'template' => 'BackendBundle:Block:resume_dashboard_block.html.twig',
        ));
    }

    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        $settings = $blockContext->getSettings();

        return $this->renderResponse($blockContext->getTemplate(), array(
            'block'     => $blockContext->getBlock(),
            'settings' => $settings,
            'campanyas' => $this->getResumeCampaigns(),
            ), $response);
    }

    private function getResumeCampaigns()
    {
        $campaigns = $this->em->getRepository('BackendBundle:Campanya')->findByActiva(1);

        foreach($campaigns as $campaign)
        {
            $campaignsCollection[] = array('id' => $campaign->getId(),
                                           'nombre' => $campaign->getNombre(),
                                           'trabajadores' => $this->getCosteTrabajadores($campaign),
                                           'materiales' => $this->getCosteMateriales($campaign),
                                           'genero' => $this->getGeneroProducido($campaign),
                                           'ingresos' => $this->getMontoIngresos($campaign),
                                          );
        }

        return $campaignsCollection;
    }

    private function getCosteTrabajadores($campaign)
    {
        $monto = 0;
        foreach($campaign->getGastoTrabajo() as $coste)
        {
            $monto += $coste->getCoste();
        }

        return $monto;
    }

    private function getCosteMateriales($campaign)
    {
        $monto = 0;
        foreach($campaign->getGastoProducto() as $coste)
        {
            $monto += $coste->getCoste();
        }

        return $monto;
    }

    private function getGeneroProducido($campaign)
    {
        $monto = 0;
        foreach($campaign->getGeneroProducido() as $genero)
        {
            $monto += $genero->getKilos();
        }

        return $monto;
    }

    private function getMontoIngresos($campaign)
    {
        $monto = 0;
        foreach($campaign->getIngreso() as $ingreso)
        {
            $monto += $ingreso->getCantidad();
        }

        return $monto;
    }

    public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
    {
        throw new \Exception();
    }

    public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {
        throw new \Exception();
    }
}

<?php

namespace Contagric\BackendBundle\Block;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Block\BaseBlockService;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;


class StatsBlockService extends BaseBlockService
{
    public function getName()
    {
        return 'Mis estadisticas!';
    }

    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'url'      => false,
            'title'    => 'Consultas y Reportes',
            'template' => 'BackendBundle:Block:stats_dashboard_block.html.twig',
        ));
    }

    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        $settings = $blockContext->getSettings();

        return $this->renderResponse($blockContext->getTemplate(), array(
            'block'     => $blockContext->getBlock(),
            'settings' => $settings,
            ), $response);
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

<?php

namespace Contagric\BackendBundle\Block;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BlockContextInterface;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

class StatsBlockService extends BaseBlockService
{
    public function getName()
    {
        return 'Mis consultas';
    }

    public function getDefaultSettings(OptionsResolverInterface $resolver)
    {
            $resolver->setDefaults(array(
                'url'      => false,
                'title'    => 'Consultas',
                'template' => 'BackendBundle:Block:stats_dashboard_block.html.twig',
            ));
    }

    public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {
    }

    public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
    {
    }

    public function execute(BlockInterface $block, Response $response = null)
    {
        // merge settings
        $settings = $block->getSettings();

        return $this->renderResponse('BackendBundle:Block:stats_dashboard_block.html.twig', array(
            'block'     => $block->getBlock(),
            'settings'  => $settings
            ), $response);
    }
}

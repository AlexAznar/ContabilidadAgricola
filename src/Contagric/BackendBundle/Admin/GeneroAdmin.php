<?php
namespace Contagric\BackendBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

use Knp\Menu\ItemInterface as MenuItemInterface;

use Contagric\BackendBundle\Entity\Genero;

class GeneroAdmin extends Admin
{
    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->with('Genero')
                ->add('id')
                ->add('tipo')
                ->add('clase')
                ->add('createdAt')
                ->add('updatedAt')
            ->end();
    }

   /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Genero')
                ->add('tipo', 'text', array())
                ->add('clase', 'text', array())
            ->end();
    }

   /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('tipo')
            ->add('clase')
            ->add('createdAt', 'datetime', array('format' => 'Y-m-d H:i:s'))
            ->add('updatedAt', 'datetime', array('format' => 'Y-m-d H:i:s'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('tipo')
            ->add('clase')
            ->add('createdAt', 'doctrine_orm_datetime', array('label' => 'Creado el'), null, array(
                'required' => false,
                'attr' => array('onclick' => 'becomeDateTimePicker(this)'),
            ))
            ->add('updatedAt', 'doctrine_orm_datetime', array('label' => 'Actualizado el'), null, array(
                'required' => false,
                'attr' => array('onclick' => 'becomeDateTimePicker(this)'),
            ))
        ;
    }

}
?>

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

use Contagric\BackendBundle\Entity\Trabajo;

class TrabajoAdmin extends Admin
{
    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->with('Trabajo')
                ->add('id')
                ->add('nombre')
                ->add('descripcion')
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
            ->with('Trabajo')
                ->add('nombre', 'text', array())
                ->add('descripcion', 'textarea', array('required' => false))
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
            ->add('nombre')
            ->add('descripcion')
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
            ->add('nombre')
            ->add('descripcion')
            ->add('createdAt', 'doctrine_orm_datetime', array('label' => 'Creado el'), null, array(
                'widget' => 'single_text',
                'required' => false,
                'attr' => array('onclick' => 'becomeDateTimePicker(this)'),
                'format' => 'yyyy-MM-dd HH:mm',
                'with_seconds' => false,
                'empty_value' => array(
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day', 'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second'
                )
            ))
            ->add('updatedAt', 'doctrine_orm_datetime', array('label' => 'Actualizado el'), null, array(
                'widget' => 'single_text',
                'required' => false,
                'attr' => array('onclick' => 'becomeDateTimePicker(this)'),
                'format' => 'yyyy-MM-dd HH:mm',
                'with_seconds' => false,
                'empty_value' => array(
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day', 'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second'
                )
            ))
        ;
    }

}
?>
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

use Contagric\BackendBundle\Entity\Campanya;

class CampanyaAdmin extends Admin
{
    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        if (!$childAdmin && !in_array($action, array('edit')))
        {
            return;
        }
        
        $admin = $this->isChild() ? $this->getParent() : $this;
        
        $id = $admin->getRequest()->get('id');
        
        $menu->addChild(
            'Editar campaña',
            array('uri' => $admin->generateUrl('edit', array('id' => $id)))
        );
        
        $menu->addChild(
            'Coste Productos',
            array('uri' => $admin->generateUrl('contagric.backend.admin.relproductocampanya.list', array('id' => $id)))
        );

        $menu->addChild(
            'Coste Trabajadores',
            array('uri' => $admin->generateUrl('contagric.backend.admin.reltrabajotrabajador.list', array('id' => $id)))
        );

        $menu->addChild(
            'Genero Producido',
            array('uri' => $admin->generateUrl('contagric.backend.admin.relgenerocampanya.list', array('id' => $id)))
        );

        $menu->addChild(
            'Ingresos',
            array('uri' => $admin->generateUrl('contagric.backend.admin.ingreso.list', array('id' => $id)))
        );
    }

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->with('Campanya')
                ->add('id')
                ->add('nombre')
                ->add('comentario')
                ->add('finca', 'entity', array(
                    'class' => 'Contagric\BackendBundle\Entity\Finca',
                    'label' => 'Finca'
                ))
                ->add('activa')
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
            ->with('Campanya')
                ->add('nombre', 'text', array())
                ->add('comentario', 'textarea', array("required" => false))
                ->add('finca', 'entity', array(
                    'class' => 'Contagric\BackendBundle\Entity\Finca',
                    'label' => 'Finca'
                ))
                ->add('activa')
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
            ->add('comentario')
            ->add('finca.nombre', 'entity', array('label' => 'Finca'))
            ->add('activa', 'boolean')
            ->add('updatedAt', 'datetime', array('format' => 'Y-m-d H:i:s'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                    'coste_productos' => array(
                        'template' => 'BackendBundle:CampanyaAdmin:list__action_producto_list.html.twig'
                    ),
                    'coste_trabajadores' => array(
                        'template' => 'BackendBundle:CampanyaAdmin:list__action_trabajador_list.html.twig'
                    ),
                    'genero_producido' => array(
                        'template' => 'BackendBundle:CampanyaAdmin:list__action_genero_list.html.twig'
                    ),
                    'ingreso' => array(
                        'template' => 'BackendBundle:CampanyaAdmin:list__action_ingreso_list.html.twig'
                    ),
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
            ->add('comentario')
            ->add('finca')
            ->add('activa')
            ->add('createdAt', 'doctrine_orm_datetime', array('label' => 'Creado el'), null, array(
                'required' => false,
                'attr' => array('onclick' => 'becomeDateTimePicker(this)')
            ))
            ->add('updatedAt', 'doctrine_orm_datetime', array('label' => 'Actualizado el'), null, array(
                'required' => false,
                'attr' => array('onclick' => 'becomeDateTimePicker(this)')
            ))
        ;
    }

}
?>

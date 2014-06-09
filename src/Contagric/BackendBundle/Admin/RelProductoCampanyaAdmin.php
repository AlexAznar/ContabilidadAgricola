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

use Contagric\BackendBundle\Entity\RelProductoCampanya;

class RelProductoCampanyaAdmin extends Admin
{
    protected $parentAssociationMapping = 'campanya';

    protected $formOptions = array(
        'cascade_validation' => true
    );

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->with('Coste Producto')
                ->add('producto')
                ->add('campanya')
                ->add('coste')
                ->add('comentario')
                ->add('fecha')
            ->end();
    }

   /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        if (!$this->isChild() && $this->configurationPool->getContainer()->get('request')->get('_route') != "sonata_admin_append_form_element")
        {
            throw new \RuntimeException('El Gasto del producto necesita estar associado a una Campaña');
        }
        else
        {
            $formMapper
                ->with('Coste Producto')
                    ->add('producto', 'sonata_type_model_list')
                    ->add('coste', 'money',  array('required' => true, 'precision' => '2'))
                    ->add('comentario', 'textarea', array('required' => false))
                    ->add('fecha', 'datePicker')
                ->end()
            ;
        }
    }

   /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('producto')
            ->add('coste')
            ->add('comentario')
            ->add('fecha', 'datetime', array('format' => 'Y-m-d'))
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
            ->add('producto.nombre', 'doctrine_orm_string', array())
            ->add('coste')
            ->add('comentario')
            ->add('fecha', 'stnw_date_filter');
    }

}
?>

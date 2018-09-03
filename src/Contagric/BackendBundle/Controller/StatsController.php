<?php 
namespace Contagric\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StatsController extends Controller
{

    /**
     * @return \Sonata\AdminBundle\Admin\Pool
     */
    protected function getAdminPool()
    {
        return $this->container->get('sonata.admin.pool');
    }
    /**
     * @return string
     */
    protected function getBaseTemplate()
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            return $this->getAdminPool()->getTemplate('ajax');
        }

        return $this->getAdminPool()->getTemplate('layout');
    }

    public function indexAction()
    {

        return $this->render('BackendBundle:Stats:stats.html.twig', array(
            'base_template'   => $this->getBaseTemplate(),
            'admin_pool'      => $this->container->get('sonata.admin.pool'),
        ));
        //return $this->render('BackendBundle:Stats:stats.html.twig', array('name' => 'pepe'));
    }
}

?>

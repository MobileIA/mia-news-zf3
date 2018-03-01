<?php

namespace MIANews\Controller;

/**
 * Description of ApiController
 *
 * @author matiascamiletti
 */
class ApiController extends \MIAAuthentication\Controller\AuthCrudController
{
    /**
     * Servicio para obtener las noticias disponibles
     * @return \Zend\View\Model\JsonModel
     */
    public function listAction()
    {
        // Obtenemos las noticias
        $news = $this->getNewsTable()->fetchAllCurrent();
        // Convertimos en JSON
        return $this->executeSuccess($news);
    }
    
    /**
     * 
     * @return \MIANews\Table\NewsTable
     */
    protected function getNewsTable()
    {
        return $this->getServiceManager()->get(\MIANews\Table\NewsTable::class);
    }
}
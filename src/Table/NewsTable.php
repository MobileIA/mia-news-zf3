<?php

namespace MIANews\Table;

class NewsTable extends \MIABase\Table\Base
{
    protected $tableName = 'news';

    protected $entityClass = \MIANews\Entity\News::class;

    /**
     * Devuelve las noticias disponibles en el momento
     * @return array
     */
    public function fetchAllCurrent()
    {
        // Crear Select
        $select = $this->tableGateway->getSql()->select();
        // Buscar las disponibles
        $select->where->addPredicate(new \Zend\Db\Sql\Predicate\Expression('deleted = 0'));
        // Ordenar
        $select->order('id DESC');
        // Devolver resultado
        return $this->executeQuery($select);
    }
}
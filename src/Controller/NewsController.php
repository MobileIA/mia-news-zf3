<?php

namespace MIANews\Controller;

class NewsController extends \MIABase\Controller\CrudController
{
    protected $tableName = \MIANews\Table\NewsTable::class;

    protected $formName = \MIANews\Form\News::class;

    protected $template = 'mia-layout-elite';

    protected $route = 'news';
    
    public function columns()
    {
        return array(
          array('type' => 'int', 'title' => 'ID', 'field' => 'id', 'is_search' => true),
          array('type' => 'string', 'title' => 'Titulo', 'field' => 'title', 'is_search' => true),
          //array('type' => 'string', 'title' => 'Caption', 'field' => 'caption', 'is_search' => true),
          //array('type' => 'string', 'title' => 'Photo', 'field' => 'photo', 'is_search' => true),
          //array('type' => 'datetime', 'title' => 'Fecha de inicio', 'field' => 'start_date', 'is_search' => true),
          //array('type' => 'datetime', 'title' => 'Fecha de finalización', 'field' => 'end_date', 'is_search' => true),
          array('type' => 'actions', 'title' => 'Acciones')
        );
    }

    public function fields()
    {
    }
    
    protected function getStrings()
    {
        return array(
            'title_page' => 'Noticias - Backend',
            'main_title' => 'Noticias',
            'main_caption' => 'Administración de las noticias que se mostraran dentro de la aplicación.',
            'title' => 'Listado de noticias',
            'main_title_add' => 'Crear nueva Noticia',
            'main_caption_add' => 'Completa los campos requeridos.',
        );
    }
    
    /**
     * 
     * @param \MIATrivia\Entity\Trivia $model
     */
    protected function getStringsEdit($model)
    {
        return array(
            'title_page' => 'Noticias - Backend',
            'main_title' => 'Noticias',
            'main_caption' => 'Administración de las noticias que se mostraran dentro de la aplicación.',
            'title' => 'Listado de noticias',
            'main_title_add' => 'Editar Noticia: ' . $model->title,
            'main_caption_add' => 'Completa o edita los campos de la noticia.',
        );
    }
}
<?php

namespace MIANews\Form;

class News extends \MIABase\Form\Base
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct('trivia', $options);

        $this->add([
                'name' => 'title',
                'type' => 'text',
                'options' => [
                    'label' => 'Escribe el titulo de la noticia'
                ],
                'attributes' => [
                    'placeholder' => 'Titulo de la noticia'
                ]
            ]);
        $this->add([
                'name' => 'caption',
                'type' => 'textarea',
                'options' => [
                    'label' => 'Contenido'
                ],
                'attributes' => [
                    'placeholder' => 'Escribe el contenido'
                ]
            ]);
        $this->add([
                'name' => 'photo',
                'type' => \MIAFile\Form\Element\MobileiaPhoto::class,
                'options' => [
                    'label' => ' Agregar imagen (opcional)'
                ],
                'attributes' => [
                    'placeholder' => 'Selecciona una foto'
                ]
            ]);
        $this->add([
                'name' => 'user_id',
                'type' => 'hidden',
            ]);
        $this->add([
                    'name' => 'submit',
                    'type' => 'submit',
            'options' => [
                'label' => 'Guardar'
                ],
                    'attributes' => [
                        'value' => 'Enviar',
                        'id'    => 'submitbutton',
                    ],
                ]);
    }
}
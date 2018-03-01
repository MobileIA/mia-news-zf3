<?php

namespace MIANews\Entity;

class News extends \MIABase\Entity\Base implements \Zend\InputFilter\InputFilterAwareInterface
{
    /**
     * @var int
     */
    public $user_id = 0;
    
    /**
     * @var string
     */
    public $title = null;
    
    /**
     * @var string
     */
    public $caption = null;

    /**
     * @var string
     */
    public $photo = null;

    public function toArray()
    {
        $data = parent::toArray();
        $data['title'] = $this->title;
        $data['caption'] = $this->caption;
        $data['photo'] = $this->photo;
        $data['user_id'] = $this->user_id;
        return $data;
    }

    public function exchangeArray(array $data)
    {
        parent::exchangeArray($data);
        $this->title = (!empty($data['title'])) ? $data['title'] : '';
        $this->caption = (!empty($data['caption'])) ? $data['caption'] : '';
        $this->photo = (!empty($data['photo'])) ? $data['photo'] : '';
        $this->user_id = (!empty($data['user_id'])) ? $data['user_id'] : 0;
    }

    public function exchangeObject($data)
    {
        parent::exchangeObject($data);
        $this->title = $data->title;
        $this->caption = $data->caption;
        $this->photo = $data->photo;
        $this->user_id = $data->user_id;
    }

    public function getInputFilter()
    {
        if ($this->inputFilter) {
            return $this->inputFilter;
        }
                
        $inputFilter = new \Zend\InputFilter\InputFilter();
        $inputFilter->add([
                    'name' => 'title',
                    'required' => true,
                    'filters' => [
                        ['name' => \Zend\Filter\StripTags::class],
                        ['name' => \Zend\Filter\StringTrim::class],
                    ],
                    'validators' => [
                        [
                            'name' => \Zend\Validator\StringLength::class,
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min' => 1,
                                'max' => 1000,
                            ],
                        ],
                    ],
                ]);
        $inputFilter->add([
                    'name' => 'caption',
                    'required' => false,
                ]);
        $inputFilter->add([
                    'name' => 'photo',
                    'required' => false,
                    'filters' => [
                        ['name' => \Zend\Filter\StripTags::class],
                        ['name' => \Zend\Filter\StringTrim::class],
                    ],
                    'validators' => [
                        [
                            'name' => \Zend\Validator\StringLength::class,
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min' => 1,
                                'max' => 100,
                            ],
                        ],
                    ],
                ]);
        $inputFilter->add([
                    'name' => 'user_id',
                    'required' => false
                ]);
        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }

    public function setInputFilter(\Zend\InputFilter\InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
                    '%s does not allow injection of an alternate input filter',
                    __CLASS__
                ));
    }
}
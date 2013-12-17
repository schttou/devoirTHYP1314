<?php
// module/Etudiant/src/Etudiant/Form/EtudiantForm.php:
namespace Etudiant\Form;

use Zend\Form\Form;

class EtudiantForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('etudiant');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'nom',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'nom',
            ),
        ));
        $this->add(array(
            'name' => 'exercice',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'exercice',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}
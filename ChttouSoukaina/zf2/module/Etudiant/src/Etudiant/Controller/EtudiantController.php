<?php
// module/Etudiant/src/Etudiant/Controller/EtudianttController.php:
namespace Etudiant\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Etudiant\Model\Etudiant;          
use Etudiant\Form\EtudiantForm;     

class EtudiantController extends AbstractActionController
{
	protected $etudiantTable;
	
    public function indexAction()
    {
        return new ViewModel(array(
            'etudiants' => $this->getEtudiantTable()->fetchAll(),
        ));
    }

   public function addAction()
    {
        $form = new EtudiantForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $etudiant = new Etudiant();
            $form->setInputFilter($etudiant->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $etudiant->exchangeArray($form->getData());
                $this->getEtudiantTable()->saveTEtudiant($etudiant);

       
                return $this->redirect()->toRoute('etudiant');
            }
        }
        return array('form' => $form);
    }
    public function editAction()
    {
    	$id = (int) $this->params()->fromRoute('id', 0);
    	if (!$id) {
    		return $this->redirect()->toRoute('etudiant', array(
    				'action' => 'add'
    		));
    	}
    	$etudiant = $this->getEtudiantTable()->getEtudiant($id);
    
    	$form  = new EtudiantForm();
    	$form->bind($etudiant);
    	$form->get('submit')->setAttribute('value', 'Edit');
    
    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		$form->setInputFilter($etudiant->getInputFilter());
    		$form->setData($request->getPost());
    
    		if ($form->isValid()) {
    			$this->getEtudiantTable()->saveEtudiant($etudiant);
    
    			
    			return $this->redirect()->toRoute('notes');
    		}
    	}
    
    	return array(
    			'id' => $id,
    			'form' => $form,
    	);
    }
  
	public function getEtudiantTable()
    {
        if (!$this->etudiantTable) {
            $sm = $this->getServiceLocator();
            $this->etudiantTable = $sm->get('Etudiant\Model\EtudiantTable');
        }
        return $this->etudiantTable;
    }
}
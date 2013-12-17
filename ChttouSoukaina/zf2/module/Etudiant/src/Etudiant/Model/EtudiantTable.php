<?php
// module/Etudiant/src/Etudiant/Model/EtudiantTable.php:
namespace Etudiant\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class EtudiantTable extends AbstractTableGateway
{
    protected $table ='notes';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Etudiant());
        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }

    public function getEtudiant($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveEtudiant(Etudiant $etudiant)
    {
        $data = array(
            'nom' => $etudiant->nom,
            'exercice'  => $etudiant->exercice,
        );
        $id = (int)$etudiant->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getEtudiant($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

 
}
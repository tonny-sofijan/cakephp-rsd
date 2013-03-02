<?php

App::uses('AppController', 'Controller');
App::import("model", "UserRole");
App::import("model", "AcoModel");

/**
 * ArosAcos Controller
 *
 * @property ArosAco $ArosAco
 */
class ArosAcosController extends AppController {
    
    var $uses = array('ArosAcoModel');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->ArosAcoModel->recursive = 0;
        $paginate['order'] = array('aro_id' => 'ASC');
        $this->paginate = $paginate;
        $datas = $this->paginate();
        
        $newData = array();
        foreach ($datas as $data) {
            $group = new UserRole();
            $groupData = $group->findById($data['Aro']['foreign_key']);
            $data['Detail'] = $groupData;

            $acoMdl = new AcoModel();
            $fullAco = $acoMdl->findById($data['Aco']['id']);
            $fullAlias = $fullAco['ParentAco']['alias'] . "/" . $fullAco['Aco']['alias'];
            $data['Aco']['fullAlias'] = $fullAlias;

            array_push($newData, $data);
        }

        $this->set('arosAcos', $newData);
    }

    /**
     * add methodd
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->info("request data", $this->request->data);

            $this->request->data['ArosAcoModel']['_create'] = $this->request->data['ArosAcoModel']['granted'];
            $this->request->data['ArosAcoModel']['_read'] = $this->request->data['ArosAcoModel']['granted'];
            $this->request->data['ArosAcoModel']['_update'] = $this->request->data['ArosAcoModel']['granted'];
            $this->request->data['ArosAcoModel']['_delete'] = $this->request->data['ArosAcoModel']['granted'];
            
            $this->ArosAcoModel->create();
            if ($this->ArosAcoModel->save($this->request->data)) {
                $this->Session->setFlash(__('The aros aco has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The aros aco could not be saved. Please, try again.'));
            }
        }
        $aros = $this->ArosAcoModel->Aro->find('list', array(
            'fields' => array('id', 'foreign_key'),
            'conditions' => array('model' => 'UserRole')
        ));

        $newAros = array();
        foreach ($aros as $key => $aro) {
            $groupMdl = new UserRole();
            $group = $groupMdl->findById($aro);
            $newAros[$key] = $group['UserRole']['role_name'];
        }

        $acos = $this->ArosAcoModel->Aco->find('list');
        $newAcos = array();
        foreach ($acos as $key => $aco) {
            $acoMdl = new AcoModel();
            $fullAco = $acoMdl->findById($aco);
            $fullAlias = $fullAco['ParentAco']['alias'] . "/" . $fullAco['Aco']['alias'];
            $newAcos[$key] = $fullAlias;
        }

        $yesNo = array("1" => "Yes", "-1" => "No");

        $this->set(compact('newAros', 'newAcos', 'yesNo'));
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->ArosAcoModel->id = $id;
        if (!$this->ArosAcoModel->exists()) {
            throw new NotFoundException(__('Invalid aros aco'));
        }
        if ($this->ArosAcoModel->delete()) {
            $this->Session->setFlash(__('Aros aco deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Aros aco was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}

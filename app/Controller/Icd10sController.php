<?php

App::uses('AppController', 'Controller');

/**
 * Icd10s Controller
 *
 * @property Icd10 $Icd10
 */
class Icd10sController extends AppController {

    public function setSearchOptions() {
        return array(
            'icd' => __('ICD'),
            'dtd' => __('DTD'),
            'dtd_code' => __('Kode DTD'),
            'dtd_group' => __('Kelompok DTD'),
        );
    }

    public function autoComplete() {
        if (!empty($this->data)) {
            $this->redirect(array(
                'controller' => 'icd10s',
                'action' => 'view', $this->data['Icd10']['id']
            ));
        }
        $this->autoRender = false;
        $icd10s = $this->Icd10->find('all', array(
            'conditions' => array(
                'OR' => array(
                    'icd LIKE' => '%' . $_GET['term'] . '%',
                    'dtd' => '%' . $_GET['term'] . '%',
                    'dtd_code LIKE' => '%' . $_GET['term'] . '%',
                    'dtd_group LIKE' => '%' . $_GET['term'] . '%',
                )
            ),
            'limit' => 8
                ));

        $model = $this->modelClass;
        $temp = array();
        foreach ($icd10s as $icd10) {
            array_push($temp, array(
                'id' => $icd10[$model]['id'],
                'label' => $icd10['Icd10']['icd'] . ' / ' . $icd10['Icd10']['dtd_code'] . ' / ' . $icd10['Icd10']['dtd_group'],
                'value' => $icd10['Icd10']['icd'] . ' / ' . $icd10['Icd10']['dtd_code'] . ' / ' . $icd10['Icd10']['dtd_group'],
            ));
        }
        echo json_encode($temp);
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('options', $this->setSearchOptions());
        $this->Icd10->recursive = 0;
        # if there's search
        $model = $this->modelClass;
        if (isset($this->data[$model]['q']) && ($this->data[$model]['c'] !== "")) {
            $data = $this->paginate($model, array(h($this->data[$model]['c']) . ' LIKE' => '%' . h($this->data[$model]['q']) . '%'));
        } else {
            $data = $this->paginate();
        }
        $this->set('icd10s', $data);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Icd10->id = $id;
        if (!$this->Icd10->exists()) {
            throw new NotFoundException(__('Invalid icd10'));
        }
        $this->set('icd10', $this->Icd10->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Icd10->create();
            if ($this->Icd10->save($this->request->data)) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Tambah Icd10')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Tambah Icd10')), 'custom', array('class' => 'error'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Icd10->id = $id;
        if (!$this->Icd10->exists()) {
            throw new NotFoundException(__('Invalid icd10'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Icd10->save($this->request->data)) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Ubah Icd10')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Ubah Icd10')), 'custom', array('class' => 'error'));
            }
        } else {
            $this->request->data = $this->Icd10->read(null, $id);
        }
    }

    /**
     * delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Icd10->id = $id;
        if (!$this->Icd10->exists()) {
            throw new NotFoundException(__('Invalid icd10'));
        }
        if ($this->Icd10->delete()) {
            $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Hapus Icd10')), 'custom', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Hapus Icd10')), 'custom', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }

}

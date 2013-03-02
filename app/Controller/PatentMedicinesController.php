<?php

App::uses('AppController', 'Controller');

/**
 * PatentMedicines Controller
 *
 * @property PatentMedicine $PatentMedicine
 */
class PatentMedicinesController extends AppController {
    
    public function setSearchOptions() {
        return array(
            'serial' => __('Serial Obat'),
            'name' => __('Nama Obat'),
            'brand' => __('Merk'),
            'type' => __('Jenis'),
            'category' => __('Kategori'),
        );
    }
    
    public function autoComplete() {
        if (!empty($this->data)) {
            $this->redirect(array(
                'controller' => 'patent_medicinces',
                'action' => 'view', $this->data['PatentMedicine']['id']
            ));
        }
        $this->autoRender = false;
        $patentMedicines = $this->PatentMedicine->find('all', array(
            'conditions' => array(
                'OR' => array(
                    'PatentMedicine.serial LIKE' => '%' . $_GET['term'] . '%',
                    'PatentMedicine.name LIKE' => '%' . $_GET['term'] . '%',
                    'PatentMedicine.brand LIKE' => '%' . $_GET['term'] . '%'
                )
            ),
            'limit' => 8
                ));

        $model = $this->modelClass;
        $temp = array();
        foreach ($patentMedicines as $patentMedicine) {
            array_push($temp, array(
                'id' => $patentMedicine[$model]['id'],
                'label' => $patentMedicine[$model]['serial'] . ' / ' . $patentMedicine[$model]['name'] . ' / ' . $patentMedicine[$model]['brand'] . ' / ' . $patentMedicine[$model]['type'] . ' / ' . $patentMedicine[$model]['category'],
                'value' => $patentMedicine[$model]['serial'] . ' / ' . $patentMedicine[$model]['name'] . ' / ' . $patentMedicine[$model]['brand'] . ' / ' . $patentMedicine[$model]['type'] . ' / ' . $patentMedicine[$model]['category'],
                'unit_price' => $patentMedicine[$model]['selling_price'],
            ));
        }
        echo json_encode($temp);

        #echo json_encode($this->Patient->autoComplete_encode($patients));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('options', $this->setSearchOptions());
        $this->PatentMedicine->recursive = 0;
        
        # if there's search
        $model = $this->modelClass;
        $data = null;
        if (isset($this->data[$model]['q']) && ($this->data[$model]['c'] !== "")) {
            $data = $this->paginate($model, array(h($this->data[$model]['c']) . ' LIKE' => '%' . h($this->data[$model]['q']) . '%'));
        } else {
            $data = $this->paginate();
        }
        
        $this->set('patentMedicines', $data);
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->PatentMedicine->id = $id;
        if (!$this->PatentMedicine->exists()) {
            throw new NotFoundException(__('Invalid patent medicine'));
        }
        $this->set('patentMedicine', $this->PatentMedicine->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            
            $requestData = $this->request->data;
            $requestData['PatentMedicine']['price_of_capital'] = $this->commonUtil->getCleanPrice($requestData['PatentMedicine']['price_of_capital']);
            $requestData['PatentMedicine']['selling_price'] = $this->commonUtil->getCleanPrice($requestData['PatentMedicine']['selling_price']);
            
            $this->PatentMedicine->create();
            if ($this->PatentMedicine->save($requestData)) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Tambah obat paten')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Tambah obat paten')), 'custom', array('class' => 'error'));
            }
        }
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->PatentMedicine->id = $id;
        if (!$this->PatentMedicine->exists()) {
            throw new NotFoundException(__('Invalid patent medicine'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            
            $requestData = $this->request->data;
            $requestData['PatentMedicine']['price_of_capital'] = $this->commonUtil->getCleanPrice($requestData['PatentMedicine']['price_of_capital']);
            $requestData['PatentMedicine']['selling_price'] = $this->commonUtil->getCleanPrice($requestData['PatentMedicine']['selling_price']);
            
            if ($this->PatentMedicine->save($requestData)) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Ubah obat paten')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Ubah obat paten')), 'custom', array('class' => 'error'));
            }
        } else {
            $this->request->data = $this->PatentMedicine->read(null, $id);
        }
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
        $this->PatentMedicine->id = $id;
        if (!$this->PatentMedicine->exists()) {
            throw new NotFoundException(__('Invalid patent medicine'));
        }
        if ($this->PatentMedicine->delete()) {
            $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Hapus obat paten')), 'custom', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Ubah obat paten')), 'custom', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }

}

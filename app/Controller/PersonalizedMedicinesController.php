<?php

App::uses('AppController', 'Controller');

/**
 * PersonalizedMedicines Controller
 *
 * @property PersonalizedMedicine $PersonalizedMedicine
 */
class PersonalizedMedicinesController extends AppController {

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
                'controller' => 'personalized_medicines',
                'action' => 'view', $this->data['Personalized_medicine']['id']
            ));
        }
        $this->autoRender = false;
        $personalizedMedicines = $this->PersonalizedMedicine->find('all', array(
            'conditions' => array(
                'OR' => array(
                    'PersonalizedMedicine.serial LIKE' => '%' . $_GET['term'] . '%',
                    'PersonalizedMedicine.name LIKE' => '%' . $_GET['term'] . '%',
                    'PersonalizedMedicine.brand LIKE' => '%' . $_GET['term'] . '%'
                )
            ),
            'limit' => 8
                ));

        $model = $this->modelClass;
        $temp = array();
        foreach ($personalizedMedicines as $personalizedMedicine) {
            array_push($temp, array(
                'id' => $personalizedMedicine[$model]['id'],
                'label' => $personalizedMedicine[$model]['serial'] . ' / ' . $personalizedMedicine[$model]['name'] . ' / ' . $personalizedMedicine[$model]['brand'] . ' / ' . $personalizedMedicine[$model]['type'] . ' / ' . $personalizedMedicine[$model]['category'],
                'value' => $personalizedMedicine[$model]['serial'] . ' / ' . $personalizedMedicine[$model]['name'] . ' / ' . $personalizedMedicine[$model]['brand'] . ' / ' . $personalizedMedicine[$model]['type'] . ' / ' . $personalizedMedicine[$model]['category'],
                'unit_price' => $personalizedMedicine[$model]['selling_price'],
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
        $this->PersonalizedMedicine->recursive = 0;

        # if there's search
        $model = $this->modelClass;
        if (isset($this->data[$model]['q']) && ($this->data[$model]['c'] !== "")) {
            $data = $this->paginate($model, array(h($this->data[$model]['c']) . ' LIKE' => '%' . h($this->data[$model]['q']) . '%'));
        } else {
            $data = $this->paginate();
        }

        $this->set('personalizedMedicines', $data);
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->PersonalizedMedicine->id = $id;
        if (!$this->PersonalizedMedicine->exists()) {
            throw new NotFoundException(__('Invalid personalized medicine'));
        }
        $this->set('personalizedMedicine', $this->PersonalizedMedicine->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            
            $requestData = $this->request->data;
            $requestData['PersonalizedMedicine']['price_of_capital'] = $this->commonUtil->getCleanPrice($requestData['PersonalizedMedicine']['price_of_capital']);
            $requestData['PersonalizedMedicine']['selling_price'] = $this->commonUtil->getCleanPrice($requestData['PersonalizedMedicine']['selling_price']);
            
            $this->PersonalizedMedicine->create();
            if ($this->PersonalizedMedicine->save($requestData)) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Tambah Obat Racik')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Tambah Obat Racik')), 'custom', array('class' => 'error'));
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
        $this->PersonalizedMedicine->id = $id;
        if (!$this->PersonalizedMedicine->exists()) {
            throw new NotFoundException(__('Invalid personalized medicine'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            
            $requestData = $this->request->data;
            $requestData['PersonalizedMedicine']['price_of_capital'] = $this->commonUtil->getCleanPrice($requestData['PersonalizedMedicine']['price_of_capital']);
            $requestData['PersonalizedMedicine']['selling_price'] = $this->commonUtil->getCleanPrice($requestData['PersonalizedMedicine']['selling_price']);
            
            if ($this->PersonalizedMedicine->save($this->request->data)) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Ubah Obat Racik')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Ubah Obat Racik')), 'custom', array('class' => 'error'));
                $this->request->data = $requestData;
            }
        } else {
            $this->request->data = $this->PersonalizedMedicine->read(null, $id);
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
        $this->PersonalizedMedicine->id = $id;
        if (!$this->PersonalizedMedicine->exists()) {
            throw new NotFoundException(__('Invalid personalized medicine'));
        }
        if ($this->PersonalizedMedicine->delete()) {
            $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Hapus Obat Racik')), 'custom', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Hapus Obat Racik')), 'custom', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }

}

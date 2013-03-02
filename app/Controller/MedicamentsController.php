<?php

App::uses('AppController', 'Controller');

/**
 * Medicaments Controller
 *
 * @property Medicament $Medicament
 */
class MedicamentsController extends AppController {

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
                'controller' => 'medicaments',
                'action' => 'view', $this->data['Medicament']['id']
            ));
        }
        $this->autoRender = false;
        $medicaments = $this->Medicament->find('all', array(
            'conditions' => array(
                'OR' => array(
                    'Medicament.serial LIKE' => '%' . $_GET['term'] . '%',
                    'Medicament.name LIKE' => '%' . $_GET['term'] . '%',
                    'Medicament.brand LIKE' => '%' . $_GET['term'] . '%'
                )
            ),
            'limit' => 8
                ));

        $model = $this->modelClass;
        $temp = array();
        foreach ($medicaments as $medicament) {
            array_push($temp, array(
                'id' => $medicament[$model]['id'],
                'label' => $medicament[$model]['serial'] . ' / ' . $medicament[$model]['name'] . ' / ' . $medicament[$model]['brand'] . ' / ' . $medicament[$model]['type'] . ' / ' . $medicament[$model]['category'],
                'value' => $medicament[$model]['serial'] . ' / ' . $medicament[$model]['name'] . ' / ' . $medicament[$model]['brand'] . ' / ' . $medicament[$model]['type'] . ' / ' . $medicament[$model]['category'],
                'unit_price' => $medicament[$model]['selling_price'],
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
        $this->Medicament->recursive = 0;

        # if there's search
        $model = $this->modelClass;
        if (isset($this->data[$model]['q']) && ($this->data[$model]['c'] !== "")) {
            $data = $this->paginate($model, array(h($this->data[$model]['c']) . ' LIKE' => '%' . h($this->data[$model]['q']) . '%'));
        } else {
            $data = $this->paginate();
        }

        $this->set('medicaments', $data);
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Medicament->id = $id;
        if (!$this->Medicament->exists()) {
            throw new NotFoundException(__('Invalid medicament'));
        }
        $this->set('medicament', $this->Medicament->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            
            $requestData = $this->request->data;
            $requestData['Medicament']['price_of_capital'] = $this->commonUtil->getCleanPrice($requestData['Medicament']['price_of_capital']);
            $requestData['Medicament']['selling_price'] = $this->commonUtil->getCleanPrice($requestData['Medicament']['selling_price']);
            
            $this->Medicament->create();
            if ($this->Medicament->save($requestData)) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Tambah obat')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Tambah obat')), 'custom', array('class' => 'error'));
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
        $this->Medicament->id = $id;
        if (!$this->Medicament->exists()) {
            throw new NotFoundException(__('Invalid medicament'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            
            $requestData = $this->request->data;
            $requestData['Medicament']['price_of_capital'] = $this->commonUtil->getCleanPrice($requestData['Medicament']['price_of_capital']);
            $requestData['Medicament']['selling_price'] = $this->commonUtil->getCleanPrice($requestData['Medicament']['selling_price']);
            
            if ($this->Medicament->save($requestData)) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Ubah obat')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Ubah obat')), 'custom', array('class' => 'error'));
                $this->request->data = $requestData;
            }
        } else {
            $this->request->data = $this->Medicament->read(null, $id);
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
        $this->Medicament->id = $id;
        if (!$this->Medicament->exists()) {
            throw new NotFoundException(__('Invalid medicament'));
        }
        if ($this->Medicament->delete()) {
            $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Hapus obat')), 'custom', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Hapus obat')), 'custom', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }

}

<?php

App::uses('AppController', 'Controller');

/**
 * ServiceTypes Controller
 *
 * @property ServiceType $ServiceType
 */
class ServiceTypesController extends AppController {

    public function autoComplete($checkout_id) {
        if (!empty($this->data)) {
            $this->redirect(array(
                'controller' => 'ServiceTypes',
                'action' => 'view', $this->data['ServiceType']['id']
            ));
        }
        $this->autoRender = false;

        # checkout
        $this->loadModel('Checkout');
        $checkout = $this->Checkout->read(null, $checkout_id);
        $serviceGrade = '';
        switch ($checkout['Checkout']['service_grade']) {
            case '0':
                $serviceGrade = 'icu';
                break;
            case '1':
                $serviceGrade = 'vip';
                break;
            case '2':
                $serviceGrade = 'top';
                break;
            case '3':
                $serviceGrade = 'c1';
                break;
            case '4':
                $serviceGrade = 'c2';
                break;
            case '5':
                $serviceGrade = 'c3';
                break;
            default:
                $serviceGrade = 'icu';
                break;
        }

        $serviceTypes = $this->ServiceType->find('all', array(
            'conditions' => array(
                'OR' => array(
                    'ServiceType.no LIKE' => '%' . $_GET['term'] . '%',
                    'type_of_service LIKE' => '%' . $_GET['term'] . '%',
                )
            ),
            'limit' => 8
                ));

        $model = $this->modelClass;
        $temp = array();
        foreach ($serviceTypes as $serviceType) {
            $unit = '';
            switch ($serviceType['ServiceType']['unit']) {
                case '0':
                    $unit = 'Pasien/Kali';
                    break;
                case '1':
                    $unit = 'Hari';
                    break;
                case '2':
                    $unit = 'Per-hari';
                    break;
                case '3':
                    $unit = 'Per-tindakan';
                    break;
                case '4':
                    $unit = 'Tabung/Liter';
                    break;
            }

            array_push($temp, array(
                'id' => $serviceType[$model]['id'],
                'label' => $serviceType['ServiceType']['no'] . ' / ' . $serviceType['ServiceType']['type_of_service'] . ' / ' . $serviceType['ServiceType']['unit'],
                'value' => $serviceType['ServiceType']['no'] . ' / ' . $serviceType['ServiceType']['type_of_service'] . ' / ' . $serviceType['ServiceType']['unit'],
                'cost' => $serviceType['ServiceType'][$serviceGrade . '_total_cost'],
                'unit' => $unit,
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
        $this->ServiceType->recursive = 0;
        $this->set('serviceTypes', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->ServiceType->id = $id;
        if (!$this->ServiceType->exists()) {
            throw new NotFoundException(__('Invalid service type'));
        }
        $this->set('serviceType', $this->ServiceType->read(null, $id));
    }

    private function getRequestData() {
        $requestData = $this->request->data;
        
        $requestData['ServiceType']['icu_bhp_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['icu_bhp_cost']);
        $requestData['ServiceType']['vip_bhp_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['vip_bhp_cost']);
        $requestData['ServiceType']['top_bhp_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['top_bhp_cost']);
        $requestData['ServiceType']['c1_bhp_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['c1_bhp_cost']);
        $requestData['ServiceType']['c2_bhp_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['c2_bhp_cost']);
        $requestData['ServiceType']['c3_bhp_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['c3_bhp_cost']);

        $requestData['ServiceType']['icu_tool_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['icu_tool_cost']);
        $requestData['ServiceType']['vip_tool_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['vip_tool_cost']);
        $requestData['ServiceType']['top_tool_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['top_tool_cost']);
        $requestData['ServiceType']['c1_tool_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['c1_tool_cost']);
        $requestData['ServiceType']['c2_tool_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['c2_tool_cost']);
        $requestData['ServiceType']['c3_tool_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['c3_tool_cost']);

        $requestData['ServiceType']['icu_service_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['icu_service_cost']);
        $requestData['ServiceType']['vip_service_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['vip_service_cost']);
        $requestData['ServiceType']['top_service_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['top_service_cost']);
        $requestData['ServiceType']['c1_service_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['c1_service_cost']);
        $requestData['ServiceType']['c2_service_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['c2_service_cost']);
        $requestData['ServiceType']['c3_service_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['c3_service_cost']);

        $requestData['ServiceType']['icu_total_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['icu_total_cost']);
        $requestData['ServiceType']['vip_total_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['vip_total_cost']);
        $requestData['ServiceType']['top_total_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['top_total_cost']);
        $requestData['ServiceType']['c1_total_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['c1_total_cost']);
        $requestData['ServiceType']['c2_total_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['c2_total_cost']);
        $requestData['ServiceType']['c3_total_cost'] = $this->commonUtil->getCleanPrice($requestData['ServiceType']['c3_total_cost']);
        
        return $requestData;
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            
            $requestData = $this->getRequestData();
            
            $this->ServiceType->create();
            if ($this->ServiceType->save($requestData)) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Tambah Jenis Layanan')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Tambah Jenis Layanan')), 'custom', array('class' => 'error'));
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
        $this->ServiceType->id = $id;
        if (!$this->ServiceType->exists()) {
            throw new NotFoundException(__('Invalid service type'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            
            $requestData = $this->getRequestData();
            
            if ($this->ServiceType->save($requestData)) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Ubah Jenis Layanan')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Ubah Jenis Layanan')), 'custom', array('class' => 'error'));
                $this->request->data = $requestData;
            }
        } else {
            $this->request->data = $this->ServiceType->read(null, $id);
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
        $this->ServiceType->id = $id;
        if (!$this->ServiceType->exists()) {
            throw new NotFoundException(__('Invalid service type'));
        }
        if ($this->ServiceType->delete()) {
            $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Hapus Jenis Layanan')), 'custom', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Hapus Jenis Layanan')), 'custom', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }

}

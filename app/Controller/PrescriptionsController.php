<?php

App::uses('AppController', 'Controller');

/**
 * Prescriptions Controller
 *
 * @property Prescription $Prescription
 */
class PrescriptionsController extends AppController {

	public function setSearchOptions() {
		return array(
			'created_date' => __('Tanggal terdaftar'),
		);
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->set('options', $this->setSearchOptions());
		$this->Prescription->recursive = 0;

		# if there's search
		$model = $this->modelClass;
		if (isset($this->data[$model]['q']) && ($this->data[$model]['c'] !== "")) {
			$data = $this->paginate($model, array(h($this->data[$model]['c']) . ' LIKE' => '%' . h($this->data[$model]['q']) . '%'));
		} else {
			$data = $this->paginate();
		}

		$this->set('prescriptions', $data);
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->Prescription->id = $id;
		$this->Prescription->recursive = 2;
		if (!$this->Prescription->exists()) {
			throw new NotFoundException(__('Invalid Prescription'));
		}
		$prescription = $this->Prescription->read(null, $id);

		$this->loadModel('MedicalRecord');
		if (isset($prescription['MedicalRecord'][0]['Doctor']['person_id'])) {
			$person = $this->MedicalRecord->Doctor->Person->find('first', array(
				'conditions' => array('Person.id' => $prescription['MedicalRecord'][0]['Doctor']['person_id']),
				'fields' => array('person_first_name', 'person_last_name', 'person_mobile_phone')
					));
			$prescription['MedicalRecord'][0]['Person'] = $person['Person'];
		} else {
			$prescription['MedicalRecord'][0]['Person'] = null;
		}


		foreach ($prescription['PrescriptionDetail'] as $key => $detail) {
			$medic = array();

			if (!empty($detail['Medicament'])) {
				$detail['Medicament']['type'] = __('Generik');
				$detail['Medicament']['controller'] = __('medicaments');
				$medic = $detail['Medicament'];
			} else if (!empty($detail['PersonalizedMedicine'])) {
				$detail['PersonalizedMedicine']['type'] = __('Racik');
				$detail['PersonalizedMedicine']['controller'] = __('personalized_medicines');
				$medic = $detail['PersonalizedMedicine'];
			} else {
				$detail['PatentMedicine']['type'] = _('Paten');
				$detail['PatentMedicine']['controller'] = __('patent_medicines');
				$medic = $detail['PatentMedicine'];
			}

			unset($prescription['PrescriptionDetail'][$key]['Medicament'], $prescription['PrescriptionDetail'][$key]['PersonalizedMedicine'], $prescription['PrescriptionDetail'][$key]['PatentMedicine']);
			$prescription['PrescriptionDetail'][$key]['Medic'] = $medic;
		}

		$this->set('prescription', $prescription);
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add($medical_record_id) {
		$this->loadModel('MedicalRecord');
		$this->MedicalRecord->id = $medical_record_id;
		if (!$this->MedicalRecord->exists()) {
			throw new NotFoundException(__('Invalid Medical Record'));
		}

		$this->MedicalRecord->Behaviors->attach('Containable');
		$this->MedicalRecord->contain(array(
			'Doctor', 'Doctor.person_id', 'Doctor.doctor_specialty',
			'Icd10.icd', 'Icd10.dtd', 'Icd10.dtd_code', 'Icd10.dtd_group'
		));
		$medicalRecord = $this->MedicalRecord->find('first', array(
			'conditions' => array('MedicalRecord.id' => $medical_record_id),
			'fields' => array('id', 'patient_registration_id', 'prescription_id')
				));

		$person = $this->MedicalRecord->Doctor->Person->find('first', array(
			'conditions' => array('Person.id' => $medicalRecord['Doctor']['person_id']),
			'fields' => array('person_first_name', 'person_last_name', 'person_mobile_phone')
				));

		$medicalRecord['Person'] = $person['Person'];

		// if medical record has prescription
		if (!empty($medicalRecord['MedicalRecord']['prescription_id'])) {
			$this->redirect(array('action' => 'view', $medicalRecord['MedicalRecord']['prescription_id']));
		} else {

			if ($this->request->is('post')) {

				$requestData = $this->request->data;
				$requestData['Prescription']['total'] = $this->commonUtil->getCleanPrice($requestData['Prescription']['total']);

				$this->Prescription->create();
				if ($this->Prescription->save($requestData)) {
					$this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Buka Resep Baru')), 'custom', array('class' => 'success'));
					$this->redirect(array('action' => 'view', $this->Prescription->getInsertID()));
//                    $this->redirect(array('controller' => 'patient_registrations', 'action' => 'view', $requestData['Prescription']['patient_registration_id']));
				} else {
					$this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Buka Resep Baru')), 'custom', array('class' => 'error'));
				}
			}

			$this->set('medicalRecord', $medicalRecord);
			$this->info('medicalRecord', $medicalRecord);
		}
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this->Prescription->id = $id;
		if (!$this->Prescription->exists()) {
			throw new NotFoundException(__('Invalid prescription'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			$requestData = $this->request->data;
			$requestData['Prescription']['total'] = $this->commonUtil->getCleanPrice($requestData['Prescription']['total']);

			if ($this->Prescription->save($requestData)) {
				$this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Ubah Resep Obat')), 'custom', array('class' => 'success'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Ubah Resep Obat')), 'custom', array('class' => 'error'));
			}
		} else {
			$this->request->data = $this->Prescription->read(null, $id);
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
		$this->Prescription->id = $id;
		if (!$this->Prescription->exists()) {
			throw new NotFoundException(__('Invalid prescription'));
		}
		if ($this->Prescription->delete()) {
			$this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Hapus Resep Obat')), 'custom', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Hapus Resep Obat')), 'custom', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}

	public function redeem($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Prescription->id = $id;
		if (!$this->Prescription->exists()) {
			throw new NotFoundException(__('Invalid prescription'));
		}
		$prescription = array('id' => $id, 'redeemed' => '1');
		if ($this->Prescription->save($prescription)) {
			$this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Tebus Resep Obat')), 'custom', array('class' => 'success'));
			$this->redirect(array('action' => 'view', $id));
		}
		$this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Tebus Resep Obat')), 'custom', array('class' => 'error'));
		$this->redirect(array('action' => 'view', $id));
	}

}

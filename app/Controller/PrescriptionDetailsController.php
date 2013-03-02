<?php

App::uses('AppController', 'Controller');

/**
 * PrescriptionDetails Controller
 *
 * @property PrescriptionDetail $PrescriptionDetail
 */
class PrescriptionDetailsController extends AppController {

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->PrescriptionDetail->recursive = 0;
		$this->set('prescriptionDetails', $this->paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->PrescriptionDetail->id = $id;
		if (!$this->PrescriptionDetail->exists()) {
			throw new NotFoundException(__('Invalid prescription detail'));
		}
		$this->set('prescriptionDetail', $this->PrescriptionDetail->read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add($prescription_id = null) {

		if (is_null($prescription_id)) {
			throw new NotFoundException(__('Invalid prescription'));
		}

		if ($this->request->is('post')) {
			$requestData = $this->request->data;
			$requestData['PrescriptionDetail']['unit_price'] = $this->commonUtil->getCleanPrice($requestData['PrescriptionDetail']['unit_price']);

			$this->PrescriptionDetail->create();
			$this->request->data['PrescriptionDetail']['prescription_id'] = $prescription_id;
			if ($this->PrescriptionDetail->save($requestData)) {
				# substract our medicine stock
				$prescriptionDetail = $this->PrescriptionDetail->read(null, $id);
				if (isset($prescriptionDetail['Medicament']['id'])) {
					$prescriptionDetail['Medicament']['stock'] -= $prescriptionDetail['PrescriptionDetail']['dose'];
					$this->PrescriptionDetail->Medicament->saveAll($prescriptionDetail['Medicament']);
				} else if (isset($prescriptionDetail['PersonalizedMedicine']['id'])) {
					$prescriptionDetail['PersonalizedMedicine']['stock'] -= $prescriptionDetail['PrescriptionDetail']['dose'];
					$this->PrescriptionDetail->PersonalizedMedicine->saveAll($prescriptionDetail['PersonalizedMedicine']);
				} else if (isset($prescriptionDetail['PatentMedicine']['id'])) {
					$prescriptionDetail['PatentMedicine']['stock'] -= $prescriptionDetail['PrescriptionDetail']['dose'];
					$this->PrescriptionDetail->PatentMedicine->saveAll($prescriptionDetail['PatentMedicine']);
				}

				$this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Tambah Detail Resep Obat')), 'custom', array('class' => 'success'));
				$this->redirect(array('controller' => 'prescriptions', 'action' => 'view', $prescription_id));
			} else {
				$this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Tambah Detail Resep Obat')), 'custom', array('class' => 'error'));
			}
		}

		$this->set('prescriptionId', $prescription_id);
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this->PrescriptionDetail->id = $id;
		if (!$this->PrescriptionDetail->exists()) {
			throw new NotFoundException(__('Invalid prescription detail'));
		}
		$prescriptionDetail = $this->PrescriptionDetail->read(null, $id);

		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['PrescriptionDetail']['unit_price'] = $this->commonUtil->getCleanPrice($this->request->data['PrescriptionDetail']['unit_price']);
			if ($this->PrescriptionDetail->save($this->request->data)) {
				# return former stock & nullify this id
				if (isset($prescriptionDetail['Medicament']['id'])) {
					$prescriptionDetail['PrescriptionDetail']['medicament_id'] = null;
					$prescriptionDetail['Medicament']['stock'] += $prescriptionDetail['PrescriptionDetail']['dose'];
					$this->PrescriptionDetail->Medicament->saveAll($prescriptionDetail['Medicament']);
				} else if (isset($prescriptionDetail['PersonalizedMedicine']['id'])) {
					$prescriptionDetail['PrescriptionDetail']['personalized_medicine_id'] = null;
					$prescriptionDetail['PersonalizedMedicine']['stock'] += $prescriptionDetail['PrescriptionDetail']['dose'];
					$this->PrescriptionDetail->PersonalizedMedicine->saveAll($prescriptionDetail['PersonalizedMedicine']);
				} else if (isset($prescriptionDetail['PatentMedicine']['id'])) {
					$prescriptionDetail['PrescriptionDetail']['patent_medicine_id'] = null;
					$prescriptionDetail['PatentMedicine']['stock'] += $prescriptionDetail['PrescriptionDetail']['dose'];
					$this->PrescriptionDetail->PatentMedicine->saveAll($prescriptionDetail['PatentMedicine']);
				}
				
				# re-save
				$this->PrescriptionDetail->save($this->request->data);
				
				# recalculate our medicine stock
				$pd = $this->PrescriptionDetail->read(null, $id);
				if (isset($pd['PrescriptionDetail']['medicament_id'])) {
					$pd['Medicament']['stock'] -= $pd['PrescriptionDetail']['dose'];
					$this->PrescriptionDetail->Medicament->saveAll($pd['Medicament']);
				} else if (isset($pd['PrescriptionDetail']['personalized_medicine_id'])) {
					$pd['PersonalizedMedicine']['stock'] -= $pd['PrescriptionDetail']['dose'];
					$this->PrescriptionDetail->PersonalizedMedicine->saveAll($pd['PersonalizedMedicine']);
				} else if (isset($pd['PrescriptionDetail']['patent_medicine_id'])) {
					$pd['PatentMedicine']['stock'] -= $pd['PrescriptionDetail']['dose'];
					$this->PrescriptionDetail->PatentMedicine->saveAll($pd['PatentMedicine']);
				}

				$this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Ubah Detail Resep Obat')), 'custom', array('class' => 'success'));
				$this->redirect(array('controller' => 'prescriptions', 'action' => 'view', $prescriptionDetail['PrescriptionDetail']['prescription_id']));
			} else {
				$this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Ubah Detail Resep Obat')), 'custom', array('class' => 'error'));
			}
		} else {
			$this->request->data = $prescriptionDetail;
		}
		$medicament = $this->PrescriptionDetail->Medicament->find('first', array('recursive' => -1, 'conditions' => array('id' => $prescriptionDetail['PrescriptionDetail']['medicament_id'])));
		if ($medicament !== false) {
			$medicamentData = $medicament['Medicament']['serial'] . ' / ' . $medicament['Medicament']['name'] . ' / ' . $medicament['Medicament']['brand'] . ' / ' . $medicament['Medicament']['type'] . ' / ' . $medicament['Medicament']['category'];
		}
		$personalizedMedicine = $this->PrescriptionDetail->PersonalizedMedicine->find('first', array('recursive' => -1, 'conditions' => array('id' => $prescriptionDetail['PrescriptionDetail']['personalized_medicine_id'])));
		if ($personalizedMedicine !== false) {
			$personalizedMedicineData = $personalizedMedicine['PersonalizedMedicine']['serial'] . ' / ' . $personalizedMedicine['PersonalizedMedicine']['name'] . ' / ' . $personalizedMedicine['PersonalizedMedicine']['brand'] . ' / ' . $personalizedMedicine['PersonalizedMedicine']['type'] . ' / ' . $personalizedMedicine['PersonalizedMedicine']['category'];
		}
		$this->set(compact('prescriptions', 'medicamentData', 'personalizedMedicineData'));
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
		$this->PrescriptionDetail->id = $id;
		if (!$this->PrescriptionDetail->exists()) {
			throw new NotFoundException(__('Invalid prescription detail'));
		}

		$prescriptionDetail = $this->PrescriptionDetail->read(null, $id);
		if ($this->PrescriptionDetail->delete()) {
			$this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Hapus Detail Resep Obat')), 'custom', array('class' => 'success'));
			$this->redirect(array('controller' => 'prescriptions', 'action' => 'view', $prescriptionDetail['PrescriptionDetail']['prescription_id']));
		}
		$this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Hapus Detail Resep Obat')), 'custom', array('class' => 'error'));
		$this->redirect(array('controller' => 'prescriptions', 'action' => 'view', $prescriptionDetail['PrescriptionDetail']['prescription_id']));
	}

}

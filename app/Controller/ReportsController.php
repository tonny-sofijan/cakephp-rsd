<?php

App::uses('AppController', 'Controller');

/**
 * Patients Controller
 *
 * @property Patient $Patient
 */
class ReportsController extends AppController {

	public function setSearchOptions() {
		return array(
			'Person.person_first_name' => __('Nama Depan'),
			'Person.person_last_name' => __('Nama Belakang'),
			'Patient.position' => __('Jabatan'),
		);
	}

	public function index() { }

	public function patient_registrations() {
		$this->loadModel('PatientRegistration');
		$this->PatientRegistration->recursive = 2;
		if (isset($this->data['PatientRegistration']['q'])) {
			$conditions = array('PatientRegistration.created_date LIKE' => $this->data['PatientRegistration']['q'] . '%');
		} else {
			$conditions = array('PatientRegistration.created_date LIKE' => date('Y-m-d') . '%');
		}
		$patientRegistrations = $this->PatientRegistration->find('all', array('conditions' => $conditions));
		$this->set(compact('patientRegistrations'));
	}

	public function specialties() {
		$this->loadModel('PatientRegistration');
		$this->PatientRegistration->recursive = 2;
		if (isset($this->data['PatientRegistration']['q'])) {
			$conditions = array('PatientRegistration.created_date LIKE' => $this->data['PatientRegistration']['q'] . '%');
		} else {
			$conditions = array('PatientRegistration.created_date LIKE' => date('Y-m-d') . '%');
		}
		$patientRegistrations = $this->PatientRegistration->find('all', array('conditions' => $conditions));
		$this->set(compact('patientRegistrations'));
	}

	public function pharmacies() {
		$this->loadModel('Pharmacy');
		$this->Pharmacy->recursive = 2;
		if (isset($this->data['Pharmacy']['q'])) {
			$conditions = array('Pharmacy.redeem_date LIKE' => $this->data['Pharmacy']['q'] . '%');
		} else {
			$conditions = array('Pharmacy.redeem_date LIKE' => date('Y-m-d') . '%');
		}
		$pharmacies = $this->Pharmacy->find('all', array('conditions' => $conditions));
		$this->set(compact('pharmacies'));
	}

}

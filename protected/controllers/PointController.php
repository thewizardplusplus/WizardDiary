<?php

class PointController extends CController {
	public function __construct($id, $module = NULL) {
		parent::__construct($id, $module);
		$this->defaultAction = 'list';
	}

	public function filters() {
		return array(
			'accessControl',
			'postOnly + delete'
		);
	}

	public function accessRules() {
		return array(
			array(
				'allow',
				'actions' => array('list', 'update', 'delete'),
				'users' => array('admin')
			),
			array(
				'deny',
				'users' => array('*')
			)
		);
	}

	public function actionList() {
		$model = new Point;
		$this->performAjaxValidation($model);

		if (!isset($_POST['ajax']) and isset($_POST['Point'])) {
			$model->attributes = $_POST['Point'];
			$model->save();

			$model = new Point;
		}

		$data_provider = new CActiveDataProvider('Point', array(
			'criteria' => array('order' => 'date, id'),
			'pagination' => array('pagesize' => Parameters::get()->
				points_on_page)
		));

		if (!isset($_GET['ajax']) or $_GET['ajax'] != 'point_list') {
			$pagination = $data_provider->pagination;
			$pagination->setItemCount($data_provider->getTotalItemCount());
			$pagination->currentPage = $pagination->pageCount - 1;
		}

		$this->render('list', array(
			'model' => $model,
			'data_provider' => $data_provider
		));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id);
		$this->performAjaxValidation($model);

		if (isset($_POST['Point'])) {
			$model->attributes = $_POST['Point'];
			$result = $model->save();
			if (!isset($_POST['ajax']) and $result) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl']
					: array('list'));
			}
		}

		if (!isset($_POST['ajax'])) {
			$this->render('update', array('model' => $model));
		}
	}

	public function actionDelete($id) {
		$this->loadModel($id)->delete();

		if (!isset($_POST['ajax'])) {
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] :
				array('list'));
		}
	}

	private function loadModel($id) {
		$model = Point::model()->findByPk($id);
		if (is_null($model)) {
			throw new CHttpException(404, 'Запрашиваемая страница не найдена.');
		}

		return $model;
	}

	private function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'point-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

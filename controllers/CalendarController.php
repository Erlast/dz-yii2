<?php
namespace app\controllers;

use app\models\Access;
use Yii;
use app\models\Calendar;
use app\models\search\CalendarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CalendarController implements the CRUD actions for Calendar model.
 */
class CalendarController extends Controller
{

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only'  => [
					'mycalendar',
					'create',
					'update',
					'delete'
				],
				'rules' => [
					[
						'actions' => [
							'mycalendar',
							'create',
							'update',
							'delete'
						],
						'allow'   => true,
						'roles'   => ['@'],
					],
				],
			],
			'verbs'  => [
				'class'   => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}

	/**
	 * Lists all Calendar models.
	 * @return mixed
	 */
	public function actionMycalendar()
	{
		$searchModel  = new CalendarSearch();
		$dataProvider = $searchModel->search(
			[
				'CalendarSearch' => array_merge(
					['creator' => Yii::$app->user->id], Yii::$app->request->queryParams
				)
			]
		);
		return $this->render(
			'index', [
					   'searchModel'  => $searchModel,
					   'dataProvider' => $dataProvider,
				   ]
		);
	}

	/**
	 * Displays a single Calendar model.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 */
	public function actionView($id)
	{
		$model  = $this->findModel($id);
		$access = Access::checkAccess($model);
		if ($access) {
			switch ($access) {
				case Access::ACCESS_CREATOR:
					return $this->render(
						'viewCreator', [
						'model' => $model,
					]
					);
					break;
				case Access::ACCESS_GUEST:
					return $this->render(
						'viewGuest', [
						'model' => $model,
					]
					);
					break;
			}
		}
		throw new ForbiddenHttpException("Not allowed! ");
	}

	/**
	 * Creates a new Calendar model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Calendar();
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(
				[
					'view',
					'id' => $model->id
				]
			);
		} else {
			return $this->render(
				'create', [
							'model' => $model,
						]
			);
		}
	}

	/**
	 * Updates an existing Calendar model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		if (\Yii::$app->user->isGuest) {
			return $this->redirect(['index']);
		}
		$model = $this->findModel($id);
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(
				[
					'view',
					'id' => $model->id
				]
			);
		} else {
			return $this->render(
				'update', [
							'model' => $model,
						]
			);
		}
	}

	/**
	 * Deletes an existing Calendar model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		if (\Yii::$app->user->isGuest) {
			return $this->redirect(['index']);
		}
		$this->findModel($id)
			 ->delete();
		return $this->redirect(['index']);
	}

	/**
	 * Finds the Calendar model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param integer $id
	 *
	 * @return Calendar the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Calendar::findOne($id))!==null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}

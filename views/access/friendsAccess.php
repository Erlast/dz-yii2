<?php
use yii\helpers\Html;
use yii\grid\GridView;

/**
 * Created by PhpStorm.
 * User: jane
 * Date: 01.04.16
 * Time: 16:41
 */
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AccessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title                   = Yii::t('app', 'События друзей');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-index">
	<h1><?= Html::encode($this->title) ?></h1>
	<?= GridView::widget(
		[
			'dataProvider' => $dataProvider,
			'filterModel'  => $searchModel,
			'columns'      => [
				'id',
				[
					'attribute' => 'user_owner',
					'value'     => 'userOwner.username'
				],
				[
					'attribute' => 'date',
					'value'     => 'date',
					'filter'    => \yii\jui\DatePicker::widget(
						[
							'language'   => 'ru',
							'dateFormat' => 'dd-MM-yyyy'
						]
					),
					'format'    => 'html'
				],
				[
					'class'    => 'yii\grid\ActionColumn',
					'template' => '{view}',
					'buttons'  => [
						'view' => function ($url, $model) {
							if (!\Yii::$app->user->isGuest) {
								return Html::a(
									'<span class="glyphicon glyphicon-eye-open"></span>', '/access/view/'.$model->id
								);
							}
						},
					],
				],
			],
		]
	); ?>
</div>

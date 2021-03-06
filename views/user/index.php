<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title                   = Yii::t('app', 'Пользователи');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<? if (!\Yii::$app->user->isGuest) { ?>
		<p>
			<?= Html::a(Yii::t('app', 'Добавить'), ['create'], ['class' => 'btn btn-success']) ?>
		</p>
	<? } ?>
	<?= GridView::widget(
		[
			'dataProvider' => $dataProvider,
			'filterModel'  => $searchModel,
			'columns'      => [
				['class' => 'yii\grid\SerialColumn'],
				'id',
				'username',
				'name',
				'surname',
				//'password',
				// 'salt',
				// 'access_token',
				// 'create_date',
				[
					'class'    => 'yii\grid\ActionColumn',
					'template' => '{view} {update} {delete}',
					'buttons'  => [
						'update' => function ($url, $model) {
							if (!\Yii::$app->user->isGuest) {
								return Html::a(
									'<span class="glyphicon glyphicon-pencil"></span>', $url
								);
							}
						},
						'delete' => function ($url, $model) {
							if (!\Yii::$app->user->isGuest) {
								return Html::a(
									'<span class="glyphicon glyphicon-trash"></span>', $url
								);
							}
						},
					],
				],
			],
		]
	); ?>
</div>

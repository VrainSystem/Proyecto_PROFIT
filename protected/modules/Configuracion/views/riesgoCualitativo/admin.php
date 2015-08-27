<?php
/* @var $this RiesgoCualitativoController */
/* @var $model RiesgoCualitativo */

$this->breadcrumbs=array(
	'Riesgo Cualitativos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RiesgoCualitativo', 'url'=>array('index')),
	array('label'=>'Create RiesgoCualitativo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#riesgo-cualitativo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Riesgo Cualitativos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'riesgo-cualitativo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_riesgo_cualitativo',
		'rango_inferior',
		'rango_superior',
		'nombre',
		'valor',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

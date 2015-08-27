<?php
Yii::import('application.modules.ProcesosEstrategias.models.*');
Yii::import('application.modules.GradoMadurez.models.*');
Yii::import('application.modules.InventarioRiesgo.models.*');
Yii::import('application.modules.Configuracion.models.*');

//parte de arriva del  dashboard
$cantidadRiesgos = count(Riesgo::model()->findAll());
$cantidadMacroproceso = count(Macroproceso::model()->findAll());
$cantidadProceso = count(Proceso::model()->findAll());

$GradorMadurez = new UnidadNegocio();
$GradorMadurez = UnidadNegocio::model()->findAll();

$cantidadUnidadesNegocio = count($GradorMadurez);
$suma = 0;
for ($index = 0; $index < $cantidadUnidadesNegocio; $index++) {
    $suma = $suma + $GradorMadurez[$index]->evaluacion;
}
$GradorMadurez = (int) ($suma / $cantidadUnidadesNegocio);
//end
//graficas 
//polar
$unidadesNegocio = UnidadNegocio::model()->findAll();
$Griesgos = GrupoRiesgo::model()->findAll();
$riesgos = Riesgo::model()->findAllByAttributes(array('estado' => 1)); //arreglo  de riesgos
$arregloUnidadNegocio = [];
$arregloGRiesgos = [];
$arregloIDGRiesgos = [];
$arregloRiesgosToltips = [];
//select  unidades de negocio
for ($index1 = 0; $index1 < count($unidadesNegocio); $index1++) {
    $arregloUnidadNegocio[$index1] = $unidadesNegocio[$index1]->nombre;
}
//grupo de riesgos para la grafica polar NOMBRES
for ($index1 = 0; $index1 < count($Griesgos); $index1++) {
    $arregloGRiesgos[$index1] = $Griesgos[$index1]->nombre;
}
//grupo de riesgos para la grafica polar ID
for ($index1 = 0; $index1 < count($Griesgos); $index1++) {
    $arregloIDGRiesgos[$index1] = $Griesgos[$index1]->id_grupo_riesgo;
}
//end
$arregloCantidadPorRiesgos = [];

//llenado  el  arreglo  del  tanto  por tanto  de riesgos
for ($index2 = 0; $index2 < count($arregloIDGRiesgos); $index2++) {
    $aux = DameTuCantidad($arregloIDGRiesgos[$index2]);
    $arregloCantidadPorRiesgos[$index2] = $aux;
}
$arregloCantidadPorRiesgosTotal = [];

//llenado  el  arreglo  del  tanto  por tanto  de riesgos
for ($index2 = 0; $index2 < count($arregloIDGRiesgos); $index2++) {
    $aux = DameTuCantidadTotal($arregloIDGRiesgos[$index2]);
    $arregloCantidadPorRiesgosTotal[$index2] = $aux;
}

function DameTuCantidad($id) {
    $cantidad = 0;
    $criteria = new CDbCriteria;

    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1));
    for ($index = 0; $index < count($riesgoss); $index++) {
        if ($riesgoss[$index]->id_grupo_riesgo == $id) {
            $cantidad = $cantidad + 1;
        }
    }
    return $cantidad;
}

function DameTuCantidadTotal($id) {
    $cantidad = 0;
    $criteria = new CDbCriteria;

    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1));
    for ($index = 0; $index < count($riesgoss); $index++) {
        if ($riesgoss[$index]->id_grupo_riesgo == $id) {
            $cantidad = $cantidad + 1;
        }
    }
    return $cantidad;
}

//llenar tabla  por filtro
function DameArregloFiltradoUN($id) {
    $id = (int) $id;
    $arregloFiltradoUN = [];
    $arregloIDGRFiltradoUN = [];
    $GrupoRiesgos = GrupoRiesgo::model()->findAll();

//    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1));
//    $riesgoUnidadNegocio = RiesgoUnidadNegocio::model()->findAllByAttributes(array('id_unidad_negocio' => $id));
    for ($index1 = 0; $index1 < count($GrupoRiesgos); $index1++) {
        $arregloIDGRFiltradoUN[$index1] = $GrupoRiesgos[$index1]->id_grupo_riesgo;
    }
    for ($index2 = 0; $index2 < count($GrupoRiesgos); $index2++) {
        $arregloFiltradoUN[$index2] = DameTuCantidadFiltrada($arregloIDGRFiltradoUN[$index2], $id);
    }
    return $arregloFiltradoUN;
}

function DameTuCantidadFiltrada($id, $idd) {
    $cantidad = 0;
    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1));
    $riesgoUnidadNegocio = RiesgoUnidadNegocio::model()->findAllByAttributes(array('id_unidad_negocio' => $idd));
    for ($index = 0; $index < count($riesgoss); $index++) {
        for ($index1 = 0; $index1 < count($riesgoUnidadNegocio); $index1++) {
            if ($riesgoss[$index]->id_riesgo == $riesgoUnidadNegocio[$index1]->id_riesgo && $riesgoss[$index]->id_grupo_riesgo == $id) {
                $cantidad = $cantidad + 1;
            }
        }
    }
    return $cantidad;
}

//end POLAR
//
//LLenar grafica de barras

$arregloDeterministicoPorGRiesgos = []; //arreglo Deterministico

for ($index2 = 0; $index2 < count($arregloIDGRiesgos); $index2++) {
    $aux = DameTuSumaDeterministica($arregloIDGRiesgos[$index2]);
    $arregloDeterministicoPorGRiesgos[$index2] = $aux;
}

function DameTuSumaDeterministica($id) {
    $cantidad = 0;
    $criteria = new CDbCriteria;
    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1));
    for ($index = 0; $index < count($riesgoss); $index++) {
        if ($riesgoss[$index]->id_grupo_riesgo == $id) {
            $cantidad = $cantidad + (int) $riesgoss[$index]->riesgo_deterministico;
        }
    }
    return $cantidad;
}

$arregloEstocasticoPorGRiesgos = []; //arreglo Estocastico

for ($index2 = 0; $index2 < count($arregloIDGRiesgos); $index2++) {
    $aux = DameTuSumaEstocastica($arregloIDGRiesgos[$index2]);
    $arregloEstocasticoPorGRiesgos[$index2] = $aux;
}

function DameTuSumaEstocastica($id) {
    $cantidad = 0;
    $criteria = new CDbCriteria;
    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1));
    for ($index = 0; $index < count($riesgoss); $index++) {
        if ($riesgoss[$index]->id_grupo_riesgo == $id) {
            $cantidad = $cantidad + (int) $riesgoss[$index]->riesgo_estocastico;
        }
    }
    return $cantidad;
}

//LLENAR FILTRO TIPO  DE ACCION
$arregloTipoAccion = [];
$arrayTA = TipoAccion::model()->findAll();
for ($index3 = 0; $index3 < count($arrayTA); $index3++) {
    $arregloTipoAccion[$index3] = $arrayTA[$index3]->nombre;
}

$arregloTipoAccionDeterministico = [];
for ($index2 = 0; $index2 < count($arrayTA); $index2++) {
    $aux = DameTuSumaDeterministicaTA($arrayTA[$index2]->id_tipo_accion);
    $arregloTipoAccionDeterministico[$index2] = $aux;
}

function DameTuSumaDeterministicaTA($id) {
    $cantidad = 0;
    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1));
    for ($index = 0; $index < count($riesgoss); $index++) {
        if ($riesgoss[$index]->id_tipo_accion == $id) {
            $cantidad = $cantidad + (int) $riesgoss[$index]->riesgo_deterministico;
        }
    }
    return $cantidad;
}

$arregloTipoAccionEstocastico = [];
for ($index2 = 0; $index2 < count($arrayTA); $index2++) {
    $aux = DameTuSumaEstocasticaTA($arrayTA[$index2]->id_tipo_accion);
    $arregloTipoAccionDeterministico[$index2] = $aux;
}

function DameTuSumaEstocasticaTA($id) {
    $cantidad = 0;
    $criteria = new CDbCriteria;
    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1));
    for ($index = 0; $index < count($riesgoss); $index++) {
        if ($riesgoss[$index]->id_tipo_accion == $id) {
            $cantidad = $cantidad + (int) $riesgoss[$index]->riesgo_estocastico; //aqui va la estocastica
        }
    }
    return $cantidad;
}

//LLENAR FILTRO TIPO  DE RIESGO
$arregloTipoRiesgo = [];
$arrayTR = TipoRiesgo::model()->findAll();
for ($index3 = 0; $index3 < count($arrayTR); $index3++) {
    $arregloTipoRiesgo[$index3] = $arrayTR[$index3]->nombre;
}

$arregloTipoRiesgoDeterministico = [];
for ($index2 = 0; $index2 < count($arrayTR); $index2++) {
    $aux = DameTuSumaDeterministicaTR($arrayTR[$index2]->id_tipo_riesgo);
    $arregloTipoRiesgoDeterministico[$index2] = $aux;
}

function DameTuSumaDeterministicaTR($id) {
    $cantidad = 0;
    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1));
    for ($index = 0; $index < count($riesgoss); $index++) {
        if ($riesgoss[$index]->id_tipo_riesgo == $id) {
            $cantidad = $cantidad + (int) $riesgoss[$index]->riesgo_deterministico;
        }
    }
    return $cantidad;
}

$arregloTipoRiesgoEstocastico = [];
for ($index2 = 0; $index2 < count($arrayTR); $index2++) {
    $aux = DameTuSumaEstocasticaTR($arrayTR[$index2]->id_tipo_riesgo);
    $arregloTipoRiesgoEstocastico[$index2] = $aux;
}

function DameTuSumaEstocasticaTR($id) {
    $cantidad = 0;
    $criteria = new CDbCriteria;
    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1));
    for ($index = 0; $index < count($riesgoss); $index++) {
        if ($riesgoss[$index]->id_tipo_riesgo == $id) {
            $cantidad = $cantidad + (int) $riesgoss[$index]->riesgo_estocastico; //aqui va la estocastica
        }
    }
    return $cantidad;
}

//LLENAR FILTRO  TIPO  DE PERDIDA
$arregloTipoPerdida = [];
$arrayTP = TipoPerdida::model()->findAll();
for ($index3 = 0; $index3 < count($arrayTP); $index3++) {
    $arregloTipoPerdida[$index3] = $arrayTP[$index3]->nombre;
}

$arregloTipoPerdidaDeterministico = [];
for ($index2 = 0; $index2 < count($arrayTP); $index2++) {
    $aux = DameTuSumaDeterministicaTP($arrayTP[$index2]->id_tipo_perdida);
    $arregloTipoPerdidaDeterministico[$index2] = $aux;
}

function DameTuSumaDeterministicaTP($id) {
    $cantidad = 0;
    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1));
    for ($index = 0; $index < count($riesgoss); $index++) {
        if ($riesgoss[$index]->id_tipo_perdida == $id) {
            $cantidad = $cantidad + (int) $riesgoss[$index]->riesgo_deterministico;
        }
    }
    return $cantidad;
}

$arregloTipoPerdidaEstocastico = [];
for ($index2 = 0; $index2 < count($arrayTP); $index2++) {
    $aux = DameTuSumaEstocasticaTP($arrayTP[$index2]->id_tipo_perdida);
    $arregloTipoPerdidaEstocastico[$index2] = $aux;
}

function DameTuSumaEstocasticaTP($id) {
    $cantidad = 0;
    $criteria = new CDbCriteria;
    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1));
    for ($index = 0; $index < count($riesgoss); $index++) {
        if ($riesgoss[$index]->id_tipo_perdida == $id) {
            $cantidad = $cantidad + (int) $riesgoss[$index]->riesgo_estocastico; //aqui va la estocastica
        }
    }
    return $cantidad;
}

//LLENAR FILTRO  8020
$arreglo8020 = [];
$array8020 = Riesgo::model()->findAllByAttributes(array('estado' => 1), array('order' => 'riesgo_deterministico DESC'));
for ($index3 = 0; $index3 < count($array8020); $index3++) {
    $arreglo8020[$index3] = '(' . $array8020[$index3]->codigo . ')' . $array8020[$index3]->nombre;
}
$sumaTotal = 0;
for ($index3 = 0; $index3 < count($array8020); $index3++) {
    $sumaTotal = $sumaTotal + $array8020[$index3]->riesgo_deterministico;
}

$ochenta = $sumaTotal * 0.8;


$arreglo8020Deterministico = []; //ya
for ($index2 = 0; $index2 < count($array8020); $index2++) {
    $aux = DameTuSumaDeterministica8020($array8020[$index2]->id_riesgo);
    $arreglo8020Deterministico[$index2] = $aux;
}

function DameTuSumaDeterministica8020($id) {
    $cantidad = 0;
    $criteria = new CDbCriteria;
    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1), array('order' => 'riesgo_deterministico DESC'));
    for ($index = 0; $index < count($riesgoss); $index++) {
        if ($riesgoss[$index]->id_riesgo == $id) {
            $cantidad = $cantidad + (int) $riesgoss[$index]->riesgo_deterministico; //aqui va la estocastica
        }
    }
    return $cantidad;
}

$arreglo8020Estocastico = []; //ya
for ($index2 = 0; $index2 < count($array8020); $index2++) {
    $aux = DameTuSumaEstocastica8020($array8020[$index2]->id_riesgo);
    $arreglo8020Estocastico[$index2] = $aux;
}

function DameTuSumaEstocastica8020($id) {
    $cantidad = 0;
    $criteria = new CDbCriteria;
    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1));
    for ($index = 0; $index < count($riesgoss); $index++) {
        if ($riesgoss[$index]->id_riesgo == $id) {
            $cantidad = $cantidad + (int) $riesgoss[$index]->riesgo_estocastico; //aqui va la estocastica
        }
    }
    return $cantidad;
}

$arreglo8020Mostrar = [];
$arreglo8020DeterministicoMostrar = [];
$arreglo8020EstocasticoMostrar = [];

$temp = 0;
$sumaAux = 0;
$sumaPrueba = 0;
//for ($index4 = 0; $index4 < count($arreglo8020); $index4++) {
for ($index4 = 0; $index4 < 3; $index4++) {
    $sumaAux = $sumaAux + $arreglo8020Estocastico[$index4];
    if ($sumaAux <= $ochenta) {
        $sumaPrueba = $sumaPrueba + $arreglo8020Estocastico[$index4];
        $temp = $temp + 1;
    }
}


for ($index4 = 0; $index4 < $temp; $index4++) {
    $arreglo8020Mostrar[$index4] = $arreglo8020[$index4];
    $arreglo8020DeterministicoMostrar[$index4] = $arreglo8020Deterministico[$index4];
    $arreglo8020EstocasticoMostrar[$index4] = $arreglo8020Estocastico[$index4];
}
//end llenar grafica de barras
//LLenar Mapa de Colores

$arregloMapadeCalor = []; //arreglo Deterministico
for ($index22 = 0; $index22 < count($unidadesNegocio); $index22++) {
    $arregloUnidadNegocioMapadeCalor = [];
    $arregloUnidadNegocioMapadeCalor['name'] = $unidadesNegocio[$index22]->nombre;
    $arregloUnidadNegocioMapadeCalor['color'] = dameColor($index22);
    $arregloUnidadNegocioMapadeCalor['data'] = dameData($unidadesNegocio[$index22]->id_unidad_negocio);
    $arregloMapadeCalor[$index22] = $arregloUnidadNegocioMapadeCalor;
}

function dameColor($numero) {
//    return 'rgb(' . (($numero * 100) + 15) . ',' . (($numero * 10) + 15) . ', ' . (($numero * 100) + (($numero * 10) + 17)) . ')';
    if ($numero == 0) {
        return '#DC656C';
    } else if ($numero == 1) {
        return '#6754A7';
    } else if ($numero == 2) {
        return '#74B559';
    } else if ($numero == 3) {
        return '#DC656C';
    } else if ($numero == 4) {
        return '#CCBC98';
    } else if ($numero == 5) {
        return '#FABB33';
    } else if ($numero == 6) {
        return '#F2E8D9';
    } else if ($numero == 7) {
        return '#007157';
    } else {
        return '#E8D4BC';
    }
}

function dameData($idd) {
    $arregloData = [];
    $riesgoUnidadNegocio = RiesgoUnidadNegocio::model()->findAllByAttributes(array('id_unidad_negocio' => $idd));

    $riesgoss = Riesgo::model()->findAllByAttributes(array('estado' => 1));
    for ($index2 = 0; $index2 < count($riesgoss); $index2++) {
        for ($index = 0; $index < count($riesgoUnidadNegocio); $index++) {
            if ($riesgoss[$index2]->id_riesgo == $riesgoUnidadNegocio[$index]->id_riesgo) {
                $arregloDataporFilas = [];
                $arregloDataporFilas['x'] = (int) $riesgoss[$index2]->riesgo_deterministico; //aqui  va la perdida esperada
                $arregloDataporFilas['y'] = (int) $riesgoss[$index2]->impacto_deterministico; //aqui  va la desviacion estandar
                $arregloDataporFilas['z'] = $riesgoss[$index2]->nombre; //aqui  va la desviacion estandar
                $arregloDataporFilas['w'] = $riesgoss[$index2]->codigo; //aqui  va la desviacion estandar
                $arregloData[$index2] = $arregloDataporFilas;
            }
        }
    }
    $arregloData = quitarInicio($arregloData);
    return $arregloData;
}

function quitarInicio($param) {
    $retornar = [];
    $contador = 0;
    foreach ($param as $value) {
        $retornar[$contador] = $value;
        $contador = $contador + 1;
    }
    return $retornar;
}

//end llenar grafica de barras
?>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/index.css">
<!-- Main row -->


<!-- Left col -->
<section class="col-md-7 connectedSortable no-padding-left">
    <div class="box box-solid ">
        <div class="box-header panel-blue">
            <i class="fa fa-th"></i>
            <h3 class="box-title">Mapa de Riesgos Cualitativos</h3>
            <div class="box-tools pull-right">
                <button id="filterHeatMap" class="btn btn-transparent-white"><i class="fa fa-filter"></i></button>
                <button data-widget="collapse" class="btn btn-transparent-white btn-sm"><i class="fa fa-minus"></i></button>
                <button data-widget="remove" class="btn btn-transparent-white btn-sm"><i class="fa fa-times"></i></button>
            </div>
            <div id="idUnidadNegocioFilterDiv" style="display: none">
                <select  id="idUnidadNegocioFilter" name="idUnidadNegocioFilter" class="js-example-basic-single"  tabindex="1" aria-hidden="true" style="width:100%; height: 40px; margin-top: 5px;" placeholder="Seleccione">     
                    <option value="0" title="">
                        Todas      
                    </option> 
                    <?php
                    $unidadNegocioFilter = new UnidadNegocio();
                    $unidadesNegocioFilter = $unidadNegocioFilter->findAll();
                    foreach ($unidadesNegocioFilter as $value) {
                        ?> 

                        <option value="<?php echo $value->id_unidad_negocio; ?>" title="<?php echo $value->nombre; ?>">
                            <?php
                            echo $value->nombre;
                        }
                        ?> 
                    </option> 
                </select>
            </div>

        </div>
        <div class="box-body border-radius-none padding-5 ">
            <div class="col-md-10 no-padding-left" >

                <?php
                $impactoCualitativoHM = ImpactoCualitativo::model()->findAll();
                $array = array();
                foreach ($impactoCualitativoHM as $value) {
                    array_push($array, $value->valor);
                }
                $maxValueImpactoCualitativo = max($array);

                $probabilidadCualitativaHM = ProbabilidadCualitativa::model()->findAll();
                $arrayPC = array();
                foreach ($probabilidadCualitativaHM as $value) {
                    array_push($arrayPC, $value->valor);
                }
                $maxValueProbabilidadCualitativa = max($arrayPC);
                ?>
                <table id="tablaHeatMap" class="table no-border no-margin-bottom " style="height:35%;">
                    <tbody>
                        <?php
                        for ($index4 = $maxValueImpactoCualitativo; $index4 >= 1; $index4--) {
                            $modelIC = ImpactoCualitativo::model()->findByAttributes(array('valor' => $index4));
                            ?>

                            <tr class="text-center">
                                <th class="text-right text-small "><?php echo $modelIC->nombre; ?></th>
                                <?php
                                for ($index5 = 1; $index5 <= $maxValueProbabilidadCualitativa; $index5++) {
                                    $valorCalculado = $index5 * $index4;
//                                        echo $valorCalculado;
//                                        echo '<br>';
                                    $riesgosCualitativosHM = RiesgoCualitativo::model()->findAll();
                                    foreach ($riesgosCualitativosHM as $value) {
                                        if ($valorCalculado >= $value->rango_inferior && $valorCalculado <= $value->rango_superior) {
                                            ?>


                                            <td style="background-color:<?php echo $value->color; ?>" width="20%" class="text-bold mytext-small padding-15 indicador " ></td>


                                            <?php
                                            break;
                                        }
                                    }
                                }
                                ?>
                            </tr>
                            <?php
//                                echo "-------";
//                                echo '<br>';
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <?php
                            for ($index3 = 1; $index3 <= $maxValueProbabilidadCualitativa; $index3++) {
                                $modelPC = ProbabilidadCualitativa::model()->findByAttributes(array('valor' => $index3));
                                ?>

                                <th class="text-center text-small "><div><span><?php echo $modelPC->nombre; ?> </span></div></th>
                        <?php
                    }
                    ?>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-md-2 center">
                <ul class="list-unstyled text-left">
                    <?php
                    $riesgoCualitativoLeyenda = RiesgoCualitativo::model()->findAll();
                    foreach ($riesgoCualitativoLeyenda as $value) {
                        ?>

                        <li>
                            <i class="fa fa-square" style="color:<?php echo $value->color; ?>;"></i>  <?php echo $value->nombre; ?>
                        </li>

                        <?php
                    }
                    ?>

                </ul>
            </div>

        </div><!-- /.box-body -->

    </div>
    <div class="box box-solid no-margin-bottom">
        <div class="box-header panel-blue">
            <i class="fa fa-area-chart"></i>
            <h3 class="box-title">Mapa de Riesgos Cuantitativos</h3>
            <div class="box-tools pull-right">
                <button data-widget="collapse" class="btn btn-transparent-white btn-sm"><i class="fa fa-minus"></i></button>
                <button data-widget="remove" class="btn btn-transparent-white btn-sm"><i class="fa fa-times"></i></button>
            </div>
            <select id="idUnidadNegocio1" name="idGrupoPreguntaPreguntaMadre" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px; display: none;">
                <option>Unidad de Negocio</option>
                <?php
                foreach ($unidadesNegocio as $value) {
                    ?> 
                    <option value="<?php echo $value->id_unidad_negocio; ?>">
                        <?php
                        echo $value->nombre;
                    }
                    ?> 
            </select>
        </div>
        <div class="box-body border-radius-none padding-5 ">
            <div  id="scatter" class="chart " style="height:30%;">

            </div>
        </div><!-- /.box-body -->

    </div>
    <!-- Custom tabs (Charts with tabs)-->


    <!-- quick email widget -->
</section><!-- /.Left col -->
<!-- right col (We are only adding the ID to make the widgets sortable)-->
<section class="col-md-4 connectedSortable no-padding-left">
    <div class="box box-solid ">
        <div class="box-header panel-blue">
            <i class="fa fa-dollar"></i>
            <h3 class="box-title">Riesgos vs Pérdida Esperada</h3>
            <div class="box-tools pull-right">
                <button id="filterRiesgosPE"  class="btn btn-transparent-white"><i class="fa fa-filter"></i></button>
                <button data-widget="collapse" class="btn btn-transparent-white btn-sm"><i class="fa fa-minus"></i></button>
                <button data-widget="remove" class="btn btn-transparent-white btn-sm"><i class="fa fa-times"></i></button>
            </div>
            <div id="idSelectBarrasFilterDiv" style="display: none">
                <select id="idSelectBarras" name="idSelectBarras" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px; margin-top: 5px;">
                    <option value="null">Seleccione</option>
                    <option value="8020">Análisis Pareto(80/20)</option>
                    <option value="ta">Tipo de Acción</option>
                    <option value="gr">Grupo de Riesgo</option>
                    <option value="tr">Tipo Riesgo</option>
                    <option value="tp">Tipo Pérdida</option>

                </select>
            </div>

        </div>
        <div class="box-body border-radius-none padding-5 " >
            <div id="barras" class="chart " style="height:35%;">

            </div>
        </div><!-- /.box-body -->

    </div>
    <div class="box box-solid no-margin-bottom ">
        <div class="box-header  panel-blue">
            <i class="fa fa-sliders"></i>
            <h3 class="box-title">Grupo de Riesgos vs Riesgos</h3>
            <div class="box-tools pull-right">

                <button data-widget="collapse" class="btn btn-transparent-white"><i class="fa fa-minus"></i></button>
                <button data-widget="remove" class="btn btn-transparent-white"><i class="fa fa-times"></i></button>

            </div>


        </div>
        <div class="box-body border-radius-none padding-5">
            <div  id="polar" class="chart " style="height:30%;">

            </div>
        </div><!-- /.box-body -->

    </div>




</section><!-- /.box-footer -->
<section class="col-md-1 connectedSortable no-padding-left no-padding-right">


    <div class="small-box panel-green" >
        <div class="inner">
            <h3 class="text-white"><?php
                $array = Riesgo::model()->findAllByAttributes(array('estado' => 1));

                echo count($array);
                ?></h3>
            <h4 class="title block no-margin text-white">TOTAL <br>
                RIESGOS</h4>
        </div>
        <div class="icon">
            <i class="ion fa fa-flash"></i>
        </div>
        <a href="#" class="small-box-footer">Detalles <i class="fa fa-arrow-circle-right"></i></a>
    </div>
    <div class="small-box panel-red " >
        <div class="inner">
            <h3 class="text-white"><?php
                $array = Riesgo::model()->findAllByAttributes(array('estado' => 1, 'riesgo_cualitativo' => "Intolerable"));

                echo count($array);
                ?></h3>
            <h4 class="title block no-margin text-white">RIESGOS <br>CRITICOS</h4>
        </div>
        <div class="icon">
            <i class="ion fa fa-medkit"></i>
        </div>
        <a href="#" class="small-box-footer">Detalles <i class="fa fa-arrow-circle-right"></i></a>
    </div>
    <div class="small-box panel-yellow" >
        <div class="inner text-white">
            <h3><?php echo $GradorMadurez; ?><sup style="font-size: 18px;">%</sup></h3>
            <h4 class="title block no-margin text-white">GRADO <br>MADUREZ</h4>
        </div>
        <div class="icon">
            <i class="ion fa fa-mortar-board"></i>
        </div>
        <a href="#" class="small-box-footer">Detalles <i class="fa fa-arrow-circle-right"></i></a>
    </div>
    <div class="small-box panel-azure">
        <div class="inner">
            <h3><?php
                $perdidaEsperada = 0;
                $array = Riesgo::model()->findAllByAttributes(array('estado' => 1));
                foreach ($array as $value) {
                    $perdidaEsperada = $perdidaEsperada + $value->riesgo_deterministico;
                }
                $mostrar = '';
                if ($perdidaEsperada < 1000000) {
                    $aux = (int) ($perdidaEsperada / 1000);
                    $mostrar = $aux . ' K';
                } else if ($perdidaEsperada > 1000000) {
                    $aux = (int) ($perdidaEsperada / 1000000);
                    $mostrar = $aux . ' M';
                }
                echo $mostrar;
                ?></h3>
            <h4 class="title block no-margin">PERDIDA<br> ESPERADA</h4>
        </div>
        <div class="icon">
            <i class="ion fa fa-dollar"></i>
        </div>
        <a href="#" class="small-box-footer">Detalles <i class="fa fa-arrow-circle-right"></i></a>
    </div>

    <div class="small-box panel-dark-blue " >
        <div class="inner">
            <h3><?php
                $array = Macroproceso::model()->findAll();
                echo count($array);
                ?></h3>
            <h4 class="title block no-margin">MACRO<br> PROCESOS</h4>
        </div>
        <div class="icon">
            <i class="ion fa fa-cog fa-spin"></i>
        </div>
        <a href="#" class="small-box-footer">Detalles <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</section>

<!-- /.box -->


<!-- /.row (main row) -->
<!--BEGIN HEATMAP-->

<script type="text/javascript">
    $(document).ready(function() {

        $("#idUnidadNegocioFilter").on('change', function() {
            var IdsUnidadNegocio = $(this).val();

            var $params = {'IdUnidadNegocio': IdsUnidadNegocio, 'maxValueImpactoCualitativo': <?php echo $maxValueImpactoCualitativo; ?>, 'maxValueProbabilidadCualitativa': <?php echo $maxValueProbabilidadCualitativa; ?>};
            $.ajax({
                url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/riesgo/datosHeatMap' ?>',
                type: 'POST',
                data: $params,
                success: function(datos) {

                    var valores = JSON.parse(datos);
                    var row = 0;
                    $('#tablaHeatMap tr').each(function() {
                        var col = 0;
                        $(this).find('td').each(function() {

                            $(this).html(valores[row][col]);
                            col = col + 1;
                        })
                        row = row + 1;


                    })
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });

        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        var $params = {'maxValueImpactoCualitativo': <?php echo $maxValueImpactoCualitativo; ?>, 'maxValueProbabilidadCualitativa': <?php echo $maxValueProbabilidadCualitativa; ?>};
        $.ajax({
            url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/riesgo/datosHeatMap' ?>',
            type: 'POST',
            data: $params,
            success: function(datos) {

                var valores = JSON.parse(datos);
                var row = 0;
                $('#tablaHeatMap tr').each(function() {
                    var col = 0;
                    $(this).find('td').each(function() {

                        $(this).html(valores[row][col]);
                        col = col + 1;
                    })
                    row = row + 1;

                })
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });



    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#filterHeatMap").click(function() {
            $("#idUnidadNegocioFilterDiv").toggle();

        });
    });
</script>
<!--END HEATMAP-->
<!--BEGIN PE VS RIESGOS-->
<!--BEGIN PE VS RIESGOS-->
<script type="text/javascript">

    $(document).ready(function() {
        $("#filterRiesgosPE").click(function() {
            $("#idSelectBarrasFilterDiv").toggle();

        });
    });
</script>
<script>
    Highcharts.setOptions({
        global: {
            useUTC: false
        }
    });
    $('#barras').highcharts({
        chart: {
            type: 'bar',
            backgroundColor: 'transparent',
            color: '#fff'
        },
        style: {
            fontFamily: '"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif', // default font
            fontSize: '16px'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: <?php echo json_encode($arreglo8020Mostrar); ?>,
//                lineColor:'#C0D0E0',
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            lineColor: '#C0D0E0',
            tickColor: 'red',
            title: {
                text: '',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' Millones'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            enabled: false
        },
        legend: {
            verticalAlign: 'center',
            x: 0,
            y: 295,
            backgroundColor: 'transparent'
        },
        series: [{
                color: '#E4E4E3',
                name: 'Determinística',
                data: <?php echo json_encode($arreglo8020DeterministicoMostrar); ?>,
                tool: <?php echo json_encode($arreglo8020Mostrar); ?>
            }, {
                name: 'Estocástica',
                color: '#E87373',
                data: <?php echo json_encode($arreglo8020EstocasticoMostrar); ?>,
                tool: <?php echo json_encode($arreglo8020Mostrar); ?>
            }]
    });</script>
<!--FILTROS DE LA TABLA BARRAS-->
<script type="text/javascript">

    $(document).ready(function() {
        $("#idSelectBarras").on('change', function() {
            var entrar = $(this).find("option:selected").attr("value");
            var idGR = parseInt($(this).find("option:selected").attr("value"));
            var resultado = textAJAX(idGR);
            if (entrar == "ta") {
                Highcharts.setOptions({
                    global: {
                        useUTC: false
                    }
                });
                $('#barras').highcharts({
                    chart: {
                        type: 'bar',
                        backgroundColor: 'transparent',
                        color: '#fff'
                    },
                    style: {
                        fontFamily: '"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif', // default font
                        fontSize: '16px'
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: <?php echo json_encode($arregloTipoAccion); ?>,
//                lineColor:'#C0D0E0',
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        lineColor: '#C0D0E0',
                        tickColor: 'red',
                        title: {
                            text: '',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    tooltip: {
                        valueSuffix: ' Millones'
                    },
                    plotOptions: {
                        enabled: false
                    },
                    legend: {
                        verticalAlign: 'center',
                        x: 0,
                        y: 270,
                        backgroundColor: 'transparent'
                    },
                    series: [{
                            color: '#E4E4E3',
                            name: 'Determinística',
                            data: <?php echo json_encode($arregloTipoAccionDeterministico); ?>
                        }, {
                            name: 'Estocástica',
                            color: '#E87373',
                            data: <?php echo json_encode($arregloTipoAccionEstocastico); ?>
                        }]
                });
            }
            else if (entrar == "tr") {
                Highcharts.setOptions({
                    global: {
                        useUTC: false
                    }
                });
                $('#barras').highcharts({
                    chart: {
                        type: 'bar',
                        backgroundColor: 'transparent',
                        color: '#fff'
                    },
                    pane: {
                        size: '50%'
                    },
                    style: {
                        fontFamily: '"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif', // default font
                        fontSize: '16px'
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: <?php echo json_encode($arregloTipoRiesgo); ?>,
//                lineColor:'#C0D0E0',
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        lineColor: '#C0D0E0',
                        tickColor: 'red',
                        title: {
                            text: '',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    tooltip: {
                        valueSuffix: ' Millones'
                    },
                    plotOptions: {
                        enabled: false
                    },
                    legend: {
                        verticalAlign: 'center',
                        x: 0,
                        y: 270,
                        backgroundColor: 'transparent'
                    },
                    series: [{
                            color: '#E4E4E3',
                            name: 'Determinística',
                            data: <?php echo json_encode($arregloTipoRiesgoDeterministico); ?>
                        }, {
                            name: 'Estocástica',
                            color: '#E87373',
                            data: <?php echo json_encode($arregloTipoRiesgoEstocastico); ?>
                        }]
                });
            } else if (entrar == "tp") {
                Highcharts.setOptions({
                    global: {
                        useUTC: false
                    }
                });
                $('#barras').highcharts({
                    chart: {
                        type: 'bar',
                        backgroundColor: 'transparent',
                        color: '#fff'
                    },
                    pane: {
                        size: '50%'
                    },
                    style: {
                        fontFamily: '"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif', // default font
                        fontSize: '16px'
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: <?php echo json_encode($arregloTipoPerdida); ?>,
//                lineColor:'#C0D0E0',
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        lineColor: '#C0D0E0',
                        tickColor: 'red',
                        title: {
                            text: '',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    tooltip: {
                        valueSuffix: ' Millones'
                    },
                    plotOptions: {
                        enabled: false
                    },
                    legend: {
                        verticalAlign: 'center',
                        x: 0,
                        y: 270,
                        backgroundColor: 'transparent'
                    },
                    series: [{
                            color: '#E4E4E3',
                            name: 'Determinística',
                            data: <?php echo json_encode($arregloTipoPerdidaDeterministico); ?>
                        }, {
                            name: 'Estocástica',
                            color: '#E87373',
                            data: <?php echo json_encode($arregloTipoPerdidaEstocastico); ?>
                        }]
                });
            } else if (entrar == "gr") {
                Highcharts.setOptions({
                    global: {
                        useUTC: false
                    }
                });
                $('#barras').highcharts({
                    chart: {
                        type: 'bar',
                        backgroundColor: 'transparent',
                        color: '#fff'
                    },
                    pane: {
                        size: '50%'
                    },
                    style: {
                        fontFamily: '"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif', // default font
                        fontSize: '16px'
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: <?php echo json_encode($arregloGRiesgos); ?>,
//                lineColor:'#C0D0E0',
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        lineColor: '#C0D0E0',
                        tickColor: 'red',
                        title: {
                            text: '',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    tooltip: {
                        valueSuffix: ' Millones'
                    },
                    plotOptions: {
                        enabled: false
                    },
                    legend: {
                        verticalAlign: 'center',
                        x: 0,
                        y: 270,
                        backgroundColor: 'transparent'
                    },
                    series: [{
                            color: '#E4E4E3',
                            name: 'Determinística',
                            data: <?php echo json_encode($arregloDeterministicoPorGRiesgos); ?>
                        }, {
                            name: 'Estocástica',
                            color: '#E87373',
                            data: <?php echo json_encode($arregloEstocasticoPorGRiesgos); ?>
                        }]
                });
            } else if (entrar == "8020") {
                Highcharts.setOptions({
                    global: {
                        useUTC: false
                    }
                });
                $('#barras').highcharts({
                    chart: {
                        type: 'bar',
                        backgroundColor: 'transparent',
                        color: '#fff'
                    },
                    pane: {
                        size: '50%'
                    },
                    style: {
                        fontFamily: '"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif', // default font
                        fontSize: '16px'
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: <?php echo json_encode($arreglo8020Mostrar); ?>,
//                lineColor:'#C0D0E0',
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        lineColor: '#C0D0E0',
                        tickColor: 'red',
                        title: {
                            text: '',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    tooltip: {
                        valueSuffix: ' Millones'
                    },
                    plotOptions: {
                        enabled: false
                    },
                    legend: {
                        verticalAlign: 'center',
                        x: 0,
                        y: 270,
                        backgroundColor: 'transparent'
                    },
                    series: [{
                            color: '#E4E4E3',
                            name: 'Determinística',
                            data: <?php echo json_encode($arreglo8020DeterministicoMostrar); ?>
                        }, {
                            name: 'Estocástica',
                            color: '#E87373',
                            data: <?php echo json_encode($arreglo8020EstocasticoMostrar); ?>
                        }]
                });
            } else if (entrar == "gr") {
                Highcharts.setOptions({
                    global: {
                        useUTC: false
                    }
                });
                $('#barras').highcharts({
                    chart: {
                        type: 'bar',
                        backgroundColor: 'transparent',
                        color: '#fff'
                    },
                    pane: {
                        size: '50%'
                    },
                    style: {
                        fontFamily: '"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif', // default font
                        fontSize: '16px'
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: <?php echo json_encode($arregloGRiesgos); ?>,
//                lineColor:'#C0D0E0',
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        lineColor: '#C0D0E0',
                        tickColor: 'red',
                        title: {
                            text: '',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    tooltip: {
                        valueSuffix: ' Millones'
                    },
                    plotOptions: {
                        enabled: false
                    },
                    legend: {
                        verticalAlign: 'center',
                        x: 0,
                        y: 270,
                        backgroundColor: 'transparent'
                    },
                    series: [{
                            color: '#E4E4E3',
                            name: 'Determinística',
                            data: <?php echo json_encode($arregloDeterministicoPorGRiesgos); ?>
                        }, {
                            name: 'Estocástica',
                            color: '#E87373',
                            data: <?php echo json_encode($arregloEstocasticoPorGRiesgos); ?>
                        }]
                });

            }
        });

    });
</script>
<script>
    function textAJAXBarrasTR(valor) {
        var res;
        $.ajax({
            async: false,
            url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/riesgo/riesgoFiltradoBarrasTR' ?>',
            type: 'POST',
            data: {id: valor},
            success: function(datos) {
                res = datos;
            },
            error: function() {
                alert('no  pude ir ');
            }
        });
        return res;
    }
</script>
<!-- GRAFICA DE BARRAS RIESGOS -->
<script>
    $(function() {
        var idCH = 14;
        var idG = 15;
        var resultadoChin = textAJAX(idCH);
        var resultadoGuap = textAJAX(idG);
        resultadoChin = JSON.parse(resultadoChin);
        resultadoGuap = JSON.parse(resultadoGuap);
        $('#polar').highcharts({
            chart: {
                type: 'column'


            },
            title: {
                text: ''
            },
            pane: {
                size: '80%'
            },
            xAxis: {
                categories: <?php echo json_encode($arregloGRiesgos); ?>
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            credits: {
                enabled: false
            },
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                shared: true
            },
            plotOptions: {
                column: {
                    stacking: 'percent'
                }
            },
            series: [{
                    name: 'PLANTA CHIMBORAZO',
                    color: '#363A49',
                    data: resultadoGuap
                }, {
                    name: 'PLANTA GUAPÁN',
                    color: '#22CEB6',
                    data: resultadoChin
                }]
        });
    });
</script>
<script>
    function textAJAX(valor) {
        var res;
        $.ajax({
            async: false,
            url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/riesgo/riesgoFiltradoPolar' ?>',
            type: 'POST',
            data: {id: valor},
            success: function(datos) {
                res = datos;
            },
            error: function() {
                alert('no  pude ir ');
            }
        });
        return res;
    }
</script>
<script type="text/javascript">
    function MostrarFiltroPolar() {
        document.getElementById("idUnidadNegocioFiltrarPolar").style.display = "inline";
    }

</script>

<!--PE vs Desviaion estandar-->
<script>
    $(function() {
        $('#scatter').highcharts({
            chart: {
                type: 'scatter',
                zoomType: 'xyz'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            credits: {
                enabled: false
            },
            xAxis: {
                title: {
                    enabled: true,
                    text: 'Desviacion Estandar'
                },
                startOnTick: true,
                endOnTick: true,
                showLastLabel: true
            },
            yAxis: {
                title: {
                    text: 'Pérdida Esperada'
                }
            },
            plotOptions: {
                scatter: {
                    marker: {
                        radius: 5,
                        states: {
                            hover: {
                                enabled: true,
                                lineColor: 'rgb(100,100,100)'
                            }
                        }
                    },
                    states: {
                        hover: {
                            marker: {
                                enabled: false
                            }
                        }
                    },
                    tooltip: {
                        headerFormat: '<b><center>{series.name}</center></b><br>',
                        pointFormat: '<b>Pérdida Esperada: </b>${point.x}\n\
                                      <br><b>Nombre: </b>{point.z}' +
                                '<br><b>Código: </b>{point.w}'
                    }
                }
            },
            series: <?php echo json_encode($arregloMapadeCalor); ?>
        });
    });

</script>

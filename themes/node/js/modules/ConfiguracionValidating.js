/*NOMENCLADORES*/
$(document).ready(function() {/*Begin*/

    /*Validacion del Formulario Crear Empresa*/
    $('#crearEmpresa').validate(
            {
                rules: {
                    nombreEmpresa: {
                        required: true

                    },
                    ruc: {
                        required: true,
                        number: true,
                        minlength: 13, //para validar campo con minimo 3 caracteres
                        maxlength: 13  //para validar campo con maximo 9 caracteres

                    }
                },
                messages: {
                    nombreEmpresa: {
                        required: "Campo requerido"
                    },
                    ruc: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números",
                        minlength: "Este campo solo admite 13 dígitos",
                        maxlength: "Este campo solo admite 13 dígitos",
                    }
                }

            });
    /*Validacion del Formulario Editar Empresa*/
    $('#editarEmpresa').validate(
            {
                rules: {
                    nombreEmpresaEditar: {
                        required: true

                    },
                    rucEditar: {
                        required: true,
                        number: true,
                        minlength: 13, //para validar campo con minimo 3 caracteres
                        maxlength: 13  //para validar campo con maximo 9 caracteres

                    }
                },
                messages: {
                    nombreEmpresaEditar: {
                        required: "Campo requerido"
                    },
                    rucEditar: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números",
                        minlength: "Este campo solo admite 13 dígitos",
                        maxlength: "Este campo solo admite 13 dígitos",
                    }
                }

            });
    /*Validacion del Formulario Crear Unidad*/
    $('#crearUnidadNegocio').validate(
            {
                rules: {
                    nombreUnidadNegocio: {
                        required: true

                    },
                    idEmpresa: {
                        required: true
                    }
                },
                messages: {
                    nombreUnidadNegocio: {
                        required: "Campo requerido"
                    },
                    idEmpresa: {
                        required: "Campo requerido"
                    }
                }

            });
    /*Validacion del Formulario Editar Unidad*/
    $('#editarUnidadNegocio').validate(
            {
                rules: {
                    nombreUnidadNegocioEditar: {
                        required: true

                    },
                    idEmpresaEditar: {
                        required: true
                    }
                },
                messages: {
                    nombreUnidadNegocioEditar: {
                        required: "Campo requerido"
                    },
                    idEmpresaEditar: {
                        required: "Campo requerido"
                    }
                }

            });
    /*Validacion del Formulario Crear Impacto Cualitativo*/
    $('#crearImpactoCualitativo').validate(
            {
                rules: {
                    nombreImpactoCualitativo: {
                        required: true

                    },
                    valorImpactoCualitativo: {
                        required: true,
                        number: true
                    },
                    rangoInferiorImpactoCualitativo: {
                        required: true,
                        number: true
                    },
                    rangosuperiorImpactoCualitativo: {
                        required: true,
                        number: true
                    }
                },
                messages: {
                    nombreImpactoCualitativo: {
                        required: "Campo requerido"
                    },
                    valorImpactoCualitativo: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números"
                    },
                    rangoInferiorImpactoCualitativo: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números"
                    },
                    rangosuperiorImpactoCualitativo: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números"
                    }
                }

            });
    /*Validacion del Formulario Editar Impacto Cualitativo*/
    $('#editarImpactoCualitativo').validate(
            {
                rules: {
                    nombreImpactoCualitativoEditar: {
                        required: true

                    },
                    valorImpactoCualitativoEditar: {
                        required: true,
                        number: true
                    },
                    rangoInferiorImpactoCualitativoEditar: {
                        required: true,
                        number: true
                    },
                    rangoSuperiorImpactoCualitativoEditar: {
                        required: true,
                        number: true
                    }
                },
                messages: {
                    nombreImpactoCualitativoEditar: {
                        required: "Campo requerido"
                    },
                    valorImpactoCualitativoEditar: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números"
                    },
                    rangoInferiorImpactoCualitativoEditar: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números"
                    },
                    rangoSuperiorImpactoCualitativoEditar: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números"
                    }
                }

            });
    /*Validacion del Formulario Crear Probabilidad Cualitativo*/
    $('#crearProbabilidadCualitativa').validate(
            {
                rules: {
                    nombreProbabilidadCualitativa: {
                        required: true

                    },
                    valorProbabilidadCualitativa: {
                        required: true,
                        number: true
                    },
                    rangoInferiorProbabilidadCualitativa: {
                        required: true,
                        number: true
                    },
                    rangosuperiorProbabilidadCualitativa: {
                        required: true,
                        number: true
                    }
                },
                messages: {
                    nombreProbabilidadCualitativa: {
                        required: "Campo requerido"
                    },
                    valorProbabilidadCualitativa: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números"
                    },
                    rangoInferiorProbabilidadCualitativa: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números"
                    },
                    rangosuperiorProbabilidadCualitativa: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números"
                    }
                }

            });
    /*Validacion del Formulario Editar Probabilidad Cualitativo*/
    $('#editarProbabilidadCualitativa').validate(
            {
                rules: {
                    nombreProbabilidadCualitativaEditar: {
                        required: true

                    },
                    valorProbabilidadCualitativaEditar: {
                        required: true,
                        number: true
                    },
                    rangoInferiorProbabilidadCualitativaEditar: {
                        required: true,
                        number: true
                    },
                    rangoSuperiorProbabilidadCualitativaEditar: {
                        required: true,
                        number: true
                    }
                },
                messages: {
                    nombreProbabilidadCualitativaEditar: {
                        required: "Campo requerido"
                    },
                    valorProbabilidadCualitativaEditar: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números"
                    },
                    rangoInferiorProbabilidadCualitativaEditar: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números"
                    },
                    rangoSuperiorProbabilidadCualitativaEditar: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números"
                    }
                }

            });
    /*Validacion del Formulario Crear Riesgo Cualitativo*/
    $('#crearRiesgoCualitativo').validate(
            {
                rules: {
                    nombreRiesgoCualitativo: {
                        required: true

                    },
                    rangoInferiorRiesgoCualitativo: {
                        required: true,
                        number: true
                    },
                    rangosuperiorRiesgoCualitativo: {
                        required: true,
                        number: true
                    }
                },
                messages: {
                    nombreRiesgoCualitativo: {
                        required: "Campo requerido"
                    },
                    rangoInferiorRiesgoCualitativo: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números"
                    },
                    rangoInferiorProbabilidadCualitativaEditar: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números"
                    }
                }

            });
    /*Validacion del Formulario Editar Riesgo Cualitativo*/
    $('#editarRiesgoCualitativo').validate(
            {
                rules: {
                    nombreRiesgoCualitativoEditar: {
                        required: true

                    },
                    rangoInferiorRiesgoCualitativoEditar: {
                        required: true,
                        number: true
                    },
                    rangoSuperiorRiesgoCualitativoEditar: {
                        required: true,
                        number: true
                    }
                },
                messages: {
                    nombreRiesgoCualitativoEditar: {
                        required: "Campo requerido"
                    },
                    rangoInferiorRiesgoCualitativoEditar: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números"
                    },
                    rangoSuperiorRiesgoCualitativoEditar: {
                        required: "Campo requerido",
                        number: "Este campo solo admite números"
                    }
                }

            });
    /*Validacion del Formulario Crear Grupo de Riesgo*/
    $('#crearGrupoRiesgo').validate(
            {
                rules: {
                    nombreGrupoRiesgo: {
                        required: true

                    },
                    codigoGrupoRiesgo: {
                        required: true
                    },
                    rangoSuperiorRiesgoCualitativoEditar: {
                        required: true,
                        number: true
                    }
                },
                messages: {
                    nombreGrupoRiesgo: {
                        required: "Campo requerido"
                    },
                    codigoGrupoRiesgo: {
                        required: "Campo requerido"
                    }
                }

            });
    /*Validacion del Formulario Editar Grupo de Riesgo*/
    $('#editarGrupoRiesgo').validate(
            {
                rules: {
                    nombreGrupoRiesgoEditar: {
                        required: true

                    },
                    codigoGrupoRiesgoEditar: {
                        required: true
                    },
                    rangoSuperiorRiesgoCualitativoEditar: {
                        required: true,
                        number: true
                    }
                },
                messages: {
                    nombreGrupoRiesgoEditar: {
                        required: "Campo requerido"
                    },
                    codigoGrupoRiesgoEditar: {
                        required: "Campo requerido"
                    }
                }

            });


}); /*end*/
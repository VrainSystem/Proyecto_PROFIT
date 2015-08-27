
$(document).ready(function() {/*Begin*/

    /*Validacion del Formulario Crear Macroproceso*/
    $('#crearMacroproceso').validate(
            {
                rules: {
                    nombreMacroproceso: {
                        required: true

                    }
                },
                messages: {
                    nombreMacroproceso: {
                        required: "Campo requerido"
                    }
                }

            });
    /*Validacion del Formulario Editar  Macroproceso*/
    $('#editarMacroproceso').validate(
            {
                rules: {
                    nombreMacroprocesoEditar: {
                        required: true

                    }
                },
                messages: {
                    nombreMacroprocesoEditar: {
                        required: "Campo requerido"

                    }
                }

            });
    /*Validacion del Formulario Crear Proceso*/
    $('#crearProceso').validate(
            {
                rules: {
                    nombreProceso: {
                        required: true

                    },
                    idMacroProceso: {
                        required: true
                    },
                    nombreResponsableProceso: {
                        required: true
                    }
                },
                messages: {
                    nombreProceso: {
                        required: "Campo requerido"

                    },
                    idMacroProceso: {
                        required: "Campo requerido"

                    },
                    nombreResponsableProceso: {
                        required: "Campo requerido"

                    }

                }

            });
    /*Validacion del Formulario Editar Proceso*/
    $('#modificarProceso').validate(
            {
                rules: {
                    nombreProcesoEdit: {
                        required: true

                    },
                    idMacroProcesoEdit: {
                        required: true
                    },
                    nombreResponsableProcesoEdit: {
                        required: true
                    }
                },
                messages: {
                    nombreProcesoEdit: {
                        required: "Campo requerido"

                    },
                    idMacroProcesoEdit: {
                        required: "Campo requerido"

                    },
                    nombreResponsableProcesoEdit: {
                        required: "Campo requerido"

                    }

                }

            });
    /*Validacion del Formulario Crear Dimension*/
    $('#crearDimension').validate(
            {
                rules: {
                    nombreDimension: {
                        required: true

                    },
                    idEmpresaDimension: {
                        required: true
                    }
                },
                messages: {
                    nombreDimension: {
                        required: "Campo requerido"

                    },
                    idEmpresaDimension: {
                        required: "Campo requerido"

                    }
                }

            });
    /*Validacion del Formulario Editar Dimension*/
    $('#editarDimension').validate(
            {
                rules: {
                    nombreDimensionEdit: {
                        required: true

                    },
                    idEmpresaDimensionEditar: {
                        required: true
                    }
                },
                messages: {
                    nombreDimensionEdit: {
                        required: "Campo requerido"

                    },
                    idEmpresaDimensionEditar: {
                        required: "Campo requerido"

                    }
                }

            });
    /*Validacion del Formulario Crear Objetivos*/
    $('#crearObjetivos').validate(
            {
                rules: {
                    nombreObjetivo: {
                        required: true

                    },
                    codigoDimencion: {
                        required: true
                    },
                    idDimensionObjetivo: {
                        required: true
                    }
                },
                messages: {
                    nombreObjetivo: {
                        required: "Campo requerido"

                    },
                    codigoDimencion: {
                        required: "Campo requerido"

                    },
                    idDimensionObjetivo: {
                        required: "Campo requerido"

                    }
                }

            });
    /*Validacion del Formulario Editar Objetivos*/
    $('#editarObjetivo').validate(
            {
                rules: {
                    nombreObjetivoEditar: {
                        required: true

                    },
                    codigoObjetivoEditar: {
                        required: true
                    },
                    idDimensionObjetivoEditar: {
                        required: true
                    }
                },
                messages: {
                    nombreObjetivoEditar: {
                        required: "Campo requerido"

                    },
                    codigoObjetivoEditar: {
                        required: "Campo requerido"

                    },
                    idDimensionObjetivoEditar: {
                        required: "Campo requerido"

                    }
                }

            });
}); /*end*/

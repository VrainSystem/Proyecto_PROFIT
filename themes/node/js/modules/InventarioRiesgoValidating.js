/*NOMENCLADORES*/
$(document).ready(function () {/*Begin*/

        /*Validacion del Formulario Crear Tipo de Riesgo*/
        $('#crearTipoRiesgo').validate(
                {
                    rules: {
                        nombreTipoRiesgo: {
                            required: true

                        }
                    },
                    messages: {
                        nombreTipoRiesgo: {
                            required: "Campo requerido"                          
                        }
                    }

                });
        /*Validacion del Formulario Editar Tipo de Riesgo*/
        $('#editarTipoRiesgo').validate(
                {
                    rules: {
                        nombreTipoRiesgoEditar: {
                            required: true

                        }
                    },
                    messages: {
                        nombreTipoRiesgoEditar: {
                            required: "Campo requerido"                          
                        }
                    }

                });
        /*Validacion del Formulario Crear Tipo de Perdida*/
        $('#crearTipoPerdida').validate(
                {
                    rules: {
                        nombreTipoPerdida: {
                            required: true

                        }
                    },
                    messages: {
                        nombreTipoPerdida: {
                            required: "Campo requerido"                          
                        }
                    }

                });
        /*Validacion del Formulario Editar Tipo de Perdida*/
        $('#editarTipoPerdida').validate(
                {
                    rules: {
                        nombreTipoPerdidaEditar: {
                            required: true

                        }
                    },
                    messages: {
                        nombreTipoPerdidaEditar: {
                            required: "Campo requerido"                          
                        }
                    }

                });
        /*Validacion del Formulario Crear Tipo de Causa*/
        $('#crearTipoCausa').validate(
                {
                    rules: {
                        nombreTipoCausa: {
                            required: true

                        }
                    },
                    messages: {
                        nombreTipoCausa: {
                            required: "Campo requerido"                          
                        }
                    }

                });
        /*Validacion del Formulario Editar Tipo de Causa*/
        $('#editarTipoCausa').validate(
                {
                    rules: {
                        nombreTipoCausaEditar: {
                            required: true

                        }
                    },
                    messages: {
                        nombreTipoCausaEditar: {
                            required: "Campo requerido"                          
                        }
                    }

                });
        /*Validacion del Formulario Crear Causa*/
        $('#crearCausa').validate(
                {
                   rules: {
                        nombreCausa: {
                            required: true

                        },
                        idTipoCausaCausa: {
                            required: true

                        }
                    },
                    messages: {
                        nombreCausa: {
                            required: "Campo requerido"                          
                        },
                        idTipoCausaCausa: {
                            required: "Campo requerido"                          
                        }
                    }

                });
        /*Validacion del Formulario Editar Causa*/
        $('#editarCausa').validate(
                {
                    rules: {
                        nombreCausaEditar: {
                            required: true

                        },
                        idTipoCausaCausaEditar: {
                            required: true

                        }
                    },
                    messages: {
                        nombreCausaEditar: {
                            required: "Campo requerido"                          
                        },
                        idTipoCausaCausaEditar: {
                            required: "Campo requerido"                          
                        }
                    }

                });
        /*Validacion del Formulario Crear AC*/
        $('#crearActividadControl').validate(
                {
                    rules: {
                        nombreActividadControl: {
                            required: true

                        }
                    },
                    messages: {
                        nombreActividadControl: {
                            required: "Campo requerido"                          
                        }
                    }

                });
        /*Validacion del Formulario Editar AC*/
        $('#editarActividadControl').validate(
                {
                    rules: {
                        nombreActividadControlEditar: {
                            required: true

                        }
                    },
                    messages: {
                        nombreActividadControlEditar: {
                            required: "Campo requerido"                          
                        }
                    }

                });
        /*Validacion del Formulario Registrar Tipo de Accion*/
        $('#crearTipoAccion').validate(
                {
                    rules: {
                        nombreTipoAccion: {
                            required: true

                        }
                    },
                    messages: {
                        nombreTipoAccion: {
                            required: "Campo requerido"                          
                        }
                    }

                });
        /*Validacion del Formulario Editar Tipo de Accion*/
        $('#editarTipoAccion').validate(
                {
                    rules: {
                        nombreTipoAccionEditar: {
                            required: true

                        }
                    },
                    messages: {
                        nombreTipoAccionEditar: {
                            required: "Campo requerido"                          
                        }
                    }

                });
    
       
      
        
    }); /*end*/
    /*REGISTRAR RIESGO*/
     $(document).ready(function () {/*Begin*/

        /*Validacion del Formulario Crear Riesgo*/
        $('#crearRiesgo').validate(
                {
                    rules: {
                        idGrupoRiesgoCrear: {
                            required: true

                        },
                        nombreRiesgoCrear: {
                            required: true
                        },
                        idTipoRiesgoCrear: {
                            required: true
                        },
                        idUnidadNegocioCrear: {
                            required: true
                        },
                        
                        idTipoPerdidaCrear: {
                            required: true
                        },
                        idCausaCrear: {
                            required: true
                        },
                        descripcionCausaCrear: {
                            required: true
                        },
                        idActividadControlCrear: {
                            required: true
                        },
                        descripcionActividadControlCrear: {
                            required: true
                        },
                        impactoPesimistaCrear: {
                            required: true,
                            number: true
                        },
                        impactoProbableCrear: {
                            required: true,
                            number: true
                        },
                        impactoOptimistaCrear: {
                            required: true,
                            number: true
                        },
                        probabilidadPesimistaCrear: {
                            required: true,
                            number: true
                        },
                        probabilidadProbableCrear: {
                            required: true,
                            number: true
                        },
                        probabilidadOptimistaCrear: {
                            required: true,
                            number: true
                        },
                        descripcionImpactoPesimistaCrear: {
                            required: true
                        },
                        descripcionImpactoProbableCrear: {
                            required: true
                        },
                        descripcionImpactoOptimistaCrear: {
                            required: true
                        },
                        descripcionProbabilidadPesimistaCrear: {
                            required: true
                        },
                        descripcionProbabilidadProbableCrear: {
                            required: true
                        },
                        descripcionProbabilidadOptimistaCrear: {
                            required: true
                        }
                    },
                    messages: {
                        idGrupoRiesgoCrear: {
                            required: "Campo requerido"
                        },
                        nombreRiesgoCrear: {
                            required: "Campo requerido"
                        },
                        idTipoRiesgoCrear: {
                            required: "Campo requerido"
                        },
                        idUnidadNegocioCrear: {
                            required: "Campo requerido"
                        },
                        
                        idTipoPerdidaCrear: {
                            required: "Campo requerido"
                        },
                        idCausaCrear: {
                            required: "Campo requerido"
                        },
                        descripcionCausaCrear: {
                            required: "Campo requerido"
                        },
                        descripcionActividadControlCrear: {
                            required: "Campo requerido"
                        },
                        idActividadControlCrear: {
                            required: "Campo requerido"
                        },
                        impactoPesimistaCrear: {
                            required: "Campo requerido",
                            number: "Este campo solo admite números"
                        },
                        impactoProbableCrear: {
                            required: "Campo requerido",
                            number: "Este campo solo admite números"
                        },
                        impactoOptimistaCrear: {
                            required: "Campo requerido",
                            number: "Este campo solo admite números"
                        },
                        probabilidadPesimistaCrear: {
                            required: "Campo requerido",
                            number: "Este campo solo admite números"
                        },
                        probabilidadProbableCrear: {
                            required: "Campo requerido",
                            number: "Este campo solo admite números"
                        },
                        probabilidadOptimistaCrear: {
                            required: "Campo requerido",
                            number: "Este campo solo admite números"
                        },
                        descripcionImpactoPesimistaCrear: {
                            required: "Campo requerido"
                        },
                        descripcionImpactoProbableCrear: {
                            required: "Campo requerido"
                        },
                        descripcionImpactoOptimistaCrear: {
                            required: "Campo requerido"
                        },
                        descripcionProbabilidadPesimistaCrear: {
                            required: "Campo requerido"
                        },
                        descripcionProbabilidadProbableCrear: {
                            required: "Campo requerido"
                        },
                        descripcionProbabilidadOptimistaCrear: {
                            required: "Campo requerido"
                        }
                    }

                });

    }); /*end*/
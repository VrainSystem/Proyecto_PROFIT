/*NOMENCLADORES*/
$(document).ready(function() {/*Begin*/

/*Validacion del Formulario Crear Pregunta MAdre*/
$('#crearPreguntaMadre').validate(
{
rules: {
nombrePreguntaMadre: {
required: true

},
        idGrupoPreguntaPreguntaMadre: {
        required: true
        }
},
        messages: {
        nombrePreguntaMadre: {
        required: "Campo requerido"
        },
                idGrupoPreguntaPreguntaMadre: {
                required: "Campo requerido"
                }
        }

});
        /*Validacion del Formulario Editar Pregunta MAdre*/
        $('#editarPreguntaMadre').validate(
{
rules: {
nombrePreguntaMadreEditar: {
required: true

},
        idGrupoPreguntaPreguntaMadreEditar: {
        required: true
        }
},
        messages: {
        nombrePreguntaMadreEditar: {
        required: "Campo requerido"
        },
                idGrupoPreguntaPreguntaMadreEditar: {
                required: "Campo requerido"
                }
        }

});
        /*Validacion del Formulario crearGrupoPreguntas*/
        $('#crearGrupoPreguntas').validate(
{
rules: {
nombreGrupoPreguntas: {
required: true

},
        idCuestionarioGrupoPreguntas: {
        required: true
        }
},
        messages: {
        nombreGrupoPreguntas: {
        required: "Campo requerido"
        },
                idCuestionarioGrupoPreguntas: {
                required: "Campo requerido"
                }
        }

});
        /*Validacion del Formulario  editar GrupoPreguntas*/
        $('#editarGrupoPreguntas').validate(
            {
                rules: {
                    nombreGrupoPreguntasEditar: {
                        required: true

                    },
                    idCuestionarioGrupoPreguntasEditar: {
                        required: true
                    }
                },
                messages: {
                    nombreGrupoPreguntasEditar: {
                        required: "Campo requerido"
                    },
                    idCuestionarioGrupoPreguntasEditar: {
                        required: "Campo requerido"
                    }
                }

            });
        /*Validacion del Formulario  crearPreguntaEspesifica */
        $('#crearPreguntaEspesifica').validate(
            {
                rules: {
                    idPreguntaMadre: {
                        required: true

                    },
                    pregunta: {
                        required: true
                    }
                },
                messages: {
                    idPreguntaMadre: {
                        required: "Campo requerido"
                    },
                    pregunta: {
                        required: "Campo requerido"
                    }
                }

            });
        /*Validacion del Formulario  editarPreguntaEspesifica */
        $('#editarPreguntaEspesifica').validate(
            {
                rules: {
                    idPreguntaMadreEditarr: {
                        required: true

                    },
                    preguntaPreguntaEspecificaEditar: {
                        required: true
                    }
                },
                messages: {
                    idPreguntaMadreEditarr: {
                        required: "Campo requerido"
                    },
                    preguntaPreguntaEspecificaEditar: {
                        required: "Campo requerido"
                    }
                }

            });
        /*Validacion del Formulario  crearCuestionario */
        $('#crearCuestionario').validate(
            {
                rules: {
                    nombreCuestionario: {
                        required: true

                    }
                },
                messages: {
                    nombreCuestionario: {
                        required: "Campo requerido"
                    }
                    
                }

            });
        /*Validacion del Formulario  editarCuestionario */
        $('#editarCuestionario').validate(
            {
                rules: {
                    nombreCuestionarioEditar: {
                        required: true

                    }
                },
                messages: {
                    nombreCuestionarioEditar: {
                        required: "Campo requerido"
                    }
                    
                }

            });
        
        }); /*end*/
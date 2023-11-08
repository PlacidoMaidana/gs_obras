
                                       {{--  >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>  --}}
                                       {{-- >>>>>>>>>>>>>>>>>>>>>>   ALUMNOS   >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>  --}}
                                       {{-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>  --}}
                                       
                                       <div class="modal fade modal-warning" id="modal_insumo" v-if="allowCrop">
                                        <div class="modal-dialog"  style="min-width: 90%">
                                            <div class="modal-content">
                                           
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">Seleccione un Insumo</h4>
                                                </div>
                                            
                                                <div id="x34" class="modal-body">
                                                    <div class="card" style="min-width: 70%">
                                                        <img class="card-img-top" src="holder.js/100x180/" alt="">
                                                        <div class="card-body">
                                                           <h4 class="card-title">Elegir Insumos</h4>
                                                           <table id="insumosTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:60%">
                                                            <thead>
                                                              
                                                                    <th>id</th>
                                                                    <th>nombre</th>
                                                                    <th>categoria</th>
                                                                    <th>descripcion</th>
                                                                    <th>unidad</th>
                                                                    <th>Base_Precio</th>
                                                                    <th>Memoria_Descriptiva</th>
                                                                    <th>Imagen</th>                                                                                                                                    
                                                                    <th>seleccionar</th>                                                                    
                                                             </thead>
                                                           </table>    
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="modal-footer">
                                                    <button type="button" id="salir" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                       </div>

                                       {{-- <<<<<<<<<<<<<<<<<<<<<<<    FIN MODAL ALUMNOS    >>>>>>>>>>>>>>>>>>>>>>>>>>>> --}}
                                       {{-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>  --}}
                                       {{-- >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>  --}}                                  

<div class="col-xl-8 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing" style="margin: auto">
    <div class="widget-three">
        <div class="widget-heading">
            <h5 class="" style="font-size: 50px; 
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; "
            >Resumen del Dia</h5>
        </div>
        <div class="">

            <div class="order-summary">

                <div class="summary-list" style="font-size: 30px">
                    <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                    </div>
                    <div class="w-summary-details">
                        
                        <div class="w-summary-info">
                            <h6 style="font-size: 40px">Cantidad de Ventas del Dia</h6>
                            <p class="summary-count">{{$itemD}}</p>
                        </div>

                        <div class="w-summary-stats">
                            <div class="progress">
                                <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: {{($itemD*100)/15}}%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="summary-list">
                    <div class="w-icon text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                    </div>
                    <div class="w-summary-details">
                        
                        <div class="w-summary-info" style="font-size: 30px">
                            <h6 style="font-size: 40px">Ventas Totales del Dia</h6>
                            <p class="summary-count">${{ number_format($ventaD, 2) }}</p>
                        </div>
                
                        <div class="w-summary-stats">
                            <div class="progress">
                                <div class="progress-bar bg-gradient-success" role="progressbar" style="width: {{($ventaD*100)/15000}}%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                
                    </div>
                
                </div>
                <!--
                <div class="summary-list">
                    <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                    </div>
                    <div class="w-summary-details">
                        
                        <div class="w-summary-info">
                            <h6>Expenses</h6>
                            <p class="summary-count">$55,085</p>
                        </div>

                        <div class="w-summary-stats">
                            <div class="progress">
                                <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                </div>
            -->
            </div>

        </div>
    </div>
</div>


<div class="col-xl-8 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing" style="margin: auto">
    <div class="widget-three">
        <div class="widget-heading">
            <h5 class="" style="font-size: 50px; 
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; "
            >Resumen</h5>
        </div>
        <div class="">

            <div class="order-summary">

                <div class="summary-list" style="font-size: 30px">
                    <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                    </div>
                    <div class="w-summary-details">
                        
                        <div class="w-summary-info">
                            <h6 style="font-size: 40px">Cantidad de Ventas</h6>
                            <p class="summary-count">{{$itemsT}}</p>
                        </div>

                        <div class="w-summary-stats">
                            <div class="progress">
                                <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: {{($itemsT*100)/150}}%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="summary-list">
                    <div class="w-icon text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                    </div>
                    <div class="w-summary-details">
                        
                        <div class="w-summary-info" style="font-size: 30px">
                            <h6 style="font-size: 40px">Ventas Totales</h6>
                            <p class="summary-count">${{ number_format($ventaT, 2) }}</p>
                        </div>
                
                        <div class="w-summary-stats">
                            <div class="progress">
                                <div class="progress-bar bg-gradient-success" role="progressbar" style="width: {{($ventaT*100)/100000}}%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                
                    </div>
                
                </div>
                <!--
                <div class="summary-list">
                    <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                    </div>
                    <div class="w-summary-details">
                        
                        <div class="w-summary-info">
                            <h6>Expenses</h6>
                            <p class="summary-count">$55,085</p>
                        </div>

                        <div class="w-summary-stats">
                            <div class="progress">
                                <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                </div>
            -->
            </div>

        </div>
    </div>
</div>

<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
    <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
  </div>
  <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
    <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
  </div>
  <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
    <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox input</label>
  </div>
  <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
    <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked switch checkbox input</label>
  </div>
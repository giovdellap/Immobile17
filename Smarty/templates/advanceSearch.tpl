<!--START-->
<div class="south-search-area" >
    <div class="container">
        <div class="row">
            <div class="col-12 " >
                <div class="advanced-search-form" >
                    <!-- Search Title -->
                    <div class="search-title">
                        <p>Ricerca</p>
                    </div>
                    <!-- Search Form -->
                    <form action="#" method="post" id="advanceSearch">
                        <div class="row">


                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    {if $pc == 'notSetted'}
                                        <input type="input" class="form-control" name="input" placeholder="Parola Chiave">
                                    {else}
                                        <input type="input" class="form-control" name="input" placeholder="{$pc}">
                                    {/if}
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-2">
                                <div class="form-group">
                                    <select class="form-control" id="cities">
                                        <option>Vendita e Affitto</option>
                                        <option>Vendita</option>
                                        <option>Affitto</option>
                                    </select>
                                </div>
                            </div>



                            <div class="col-12 col-md-4 col-xl-3">
                                <div class="form-group">
                                    <select class="form-control" id="catagories">
                                        <option>Tutte le categorie</option>
                                        <option>Monolocale</option>
                                        <option>Bilocale</option>
                                        <option>Farm</option>
                                        <option>House</option>
                                        <option>Store</option>
                                    </select>
                                </div>
                            </div>




                            <div class="col-12 col-md-8 col-lg-12 col-xl-4 d-flex">
                                <!-- Space Range -->
                                <div class="slider-range">
                                    <div data-min="0" data-max="2000" data-unit=" mq" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="0" data-value-max="2000">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range">0 mq - 2000 mq</div>
                                </div>

                                <!-- Distance Range -->
                                <div class="slider-range">
                                    <div data-min="100" data-max="1000000" data-unit=" € " class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="100" data-value-max="1000000">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range">100 € - 1000000 € </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-12 col-lg-12 col-xl-10 d-flex">
                            </div>

                            <div class="col-12 col-md-6 col-lg-12 col-xl-2 d-flex ">
                                <!-- Submit -->
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn south-btn">Cerca</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Advance Search Area End ##### -->
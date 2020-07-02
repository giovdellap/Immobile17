<script>
    function advanceSearchScript(parameters)
    {
        var url = '/AgenziaImmobiliare/Immobile/ricerca/';

    }
</script>


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
                    <form action="#" method="post" id="advanceSearch"   name="parameters" onsubmit="return advanceSearchScript(this)" >
                        <div class="row">


                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    {if ($pc === 'notSetted')}
                                        <input type="input" class="form-control" name="parolachiave" placeholder="Parola Chiave">
                                    {else}
                                        <input type="input" class="form-control" name="parolachiave" placeholder="{$pc}">
                                    {/if}
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-2">
                                <div class="form-group">
                                    <select class="form-control" id="cities" name="tipo_annuncio">
                                        <option>Vendita e Affitto</option>
                                        <option>Vendita</option>
                                        <option>Affitto</option>
                                    </select>
                                </div>
                            </div>



                            <div class="col-12 col-md-4 col-xl-3">
                                <div class="form-group">
                                    <select class="form-control" id="catagories" name="tipologia">
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
                                    <div data-min="{$gmin}" data-max="{$gmax}" data-unit=" mq" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="0" data-value-max="2000">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range">{$gmin} mq - {$gmax} mq</div>
                                </div>

                                <!-- Distance Range -->
                                <div class="slider-range">
                                    <div  data-min="{$pmin}" data-max="{$pmax}" data-unit=" € " class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="100" data-value-max="1000000">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range">{$pmin} € - {$pmax} € </div>
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
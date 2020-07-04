<script>
    function advanceSearchScript(parameters)
    {
        var url = '/AgenziaImmobiliare/Immobile/ricerca';
        if(parameters.tipo_annuncio.value!=='Affitto e Vendita')
        {
            url = url + "/ti/" + parameters.tipo_annuncio.value;
        }
        if(parameters.parolachiave.value!=='')
        {
            url = url + "/pc/" + parameters.parolachiave.value;
        }
        if(parameters.tipologia.value!=='Tutte le Tipologie')
        {
            url = url + "/tp/" + parameters.tipologia.value;
        }
        url= url + "/pmin/100/pmax/" + parameters.pmax.value;

        url= url + "/gmin/0/gmax/" + parameters.gmax.value;
        //alert(url);
        window.location.href=url;
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
                    <form id="advanceSearch" name="parameters" onsubmit="advanceSearchScript(this); return false;"  >
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
                                        {foreach $tipoAnnuncio as $tipo}
                                        <option>{$tipo}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>



                            <div class="col-12 col-md-4 col-xl-3">
                                <div class="form-group">
                                    <select class="form-control" id="catagories" name="tipologia">
                                        {foreach $tipologie as $tipos}
                                            <option>{$tipos}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>


                            <div class="col-12 col-md-8 col-xl-2">
                                <div class="row">
                                    <p>Prezzo massimo: € <span id="outputPrezzo"></span></p>
                                </div>
                                <div class="row">
                                    <div class="slider-range">
                                        <input type="range" min="{$pmin}" max="300000" value="{$pmax}" class="slider" name="pmax" id="prezzo">
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-md-8 col-xl-2">
                                <div class="row">
                                    <p>Grandezza minima: mq <span id="outputGrandezza"></span></p>
                                </div>
                                <div class="row">
                                    <div class="slider-range">
                                        <input type="range" min="{$gmin}" max="2000" value="{$gmax}" class="slider" name="gmax" id="grandezza">
                                    </div>
                                </div>
                            </div>

                            <!--<div class="col-12 col-md-8 col-lg-12 col-xl-4 d-flex">
                                 Space Range
                                <div class="slider-range">
                                    <div data-min="{$gmin}" data-max="{$gmax}" data-unit=" mq" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="0" data-value-max="2000">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range">{$gmin} mq - {$gmax} mq</div>
                                </div>

                                 Distance Range
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

                            <div class="col-12 col-md-6 col-lg-12 col-xl-2 d-flex "> -->
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

<script>
        var slider = document.getElementById("prezzo");
        var output = document.getElementById("outputPrezzo");
        output.innerHTML = slider.value; // Display the default slider value

        // Update the current slider value (each time you drag the slider handle)
        slider.oninput = function() {
            output.innerHTML = this.value;
}
</script>
<script>
    var slider = document.getElementById("grandezza");
    var output = document.getElementById("outputGrandezza");
    output.innerHTML = slider.value; // Display the default slider value

    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
        output.innerHTML = this.value;
    }</script>

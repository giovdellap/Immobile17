<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-27 22:06:13
  from '/opt/lampp/htdocs/AgenziaImmobiliare/Smarty/templates/advanceSearch.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef7a6b57d7402_34029076',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bad36880b97d00b621c2925ec287fa99045ce320' => 
    array (
      0 => '/opt/lampp/htdocs/AgenziaImmobiliare/Smarty/templates/advanceSearch.tpl',
      1 => 1593168618,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef7a6b57d7402_34029076 (Smarty_Internal_Template $_smarty_tpl) {
?><!--START-->
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
                                    <input type="input" class="form-control" name="input" placeholder="Parola Chiave">
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
                                    <button type="submit" class="btn south-btn">Search</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Advance Search Area End ##### --><?php }
}

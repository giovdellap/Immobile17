<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-29 09:50:37
  from 'C:\xampp\htdocs\AgenziaImmobiliare\Smarty\templates\advanceSearch.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef99d4d18dbe6_04843968',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe0d66fcc81cc79a4ff63065973a609434ca38fa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\AgenziaImmobiliare\\Smarty\\templates\\advanceSearch.tpl',
      1 => 1593417029,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef99d4d18dbe6_04843968 (Smarty_Internal_Template $_smarty_tpl) {
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
                                    <?php if ($_smarty_tpl->tpl_vars['pc']->value == 'notSetted') {?>
                                        <input type="input" class="form-control" name="input" placeholder="Parola Chiave">
                                    <?php } else { ?>
                                        <input type="input" class="form-control" name="input" placeholder="<?php echo $_smarty_tpl->tpl_vars['pc']->value;?>
">
                                    <?php }?>
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
<!-- ##### Advance Search Area End ##### --><?php }
}

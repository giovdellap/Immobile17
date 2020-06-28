<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-28 19:37:51
  from '/opt/lampp/htdocs/AgenziaImmobiliare/Smarty/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef8d56f4a9ac1_17940320',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f02469b9c02da16e9360c7301879975be0e2917f' => 
    array (
      0 => '/opt/lampp/htdocs/AgenziaImmobiliare/Smarty/templates/header.tpl',
      1 => 1593365866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef8d56f4a9ac1_17940320 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- ##### Header Area Start ##### -->
<header class="header-area">



    <!-- Main Header Area -->
    <div class="main-header-area" id="stickyHeader">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="southNav">

                <!-- Logo -->
                <a class="nav-brand" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/img/core-img/logo_1.png" alt=""></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
">Home</a></li>

                            <li><a href="contact.html">About Us</a></li>

                            <li class="cn-dropdown-item has-down pr12"><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Immobile/visualizzaImmobili">Immobili</a>
                                <ul class="dropdown">
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Immobile/ricerca?ti=Vendita">Vendita</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Immobile/ricerca?ti=Affitto">Affitto</a></li>

                                </ul>
                            </li>
                            <?php if ($_smarty_tpl->tpl_vars['utente']->value == 'visitatore') {?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Utente/login">Login</a></li>



                            <?php } else { ?>
                                <li class="cn-dropdown-item has-down pr12"><a href="#"><?php echo $_smarty_tpl->tpl_vars['nomeutente']->value;?>
</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Area Riservata</a></li>
                                        <li><a href="about-us.html">Logout</a></li>

                                    </ul>
                                </li>
                            <?php }?>

                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### --><?php }
}

<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-24 14:33:28
  from 'C:\Users\Mirko\PhpstormProjects\AgenziaImmobiliare\Smarty\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef34818eb7686_77599691',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '928ed4b45518b5b2031d337088e7fc798a1f90e2' => 
    array (
      0 => 'C:\\Users\\Mirko\\PhpstormProjects\\AgenziaImmobiliare\\Smarty\\templates\\header.tpl',
      1 => 1593001679,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef34818eb7686_77599691 (Smarty_Internal_Template $_smarty_tpl) {
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

                            <li class="cn-dropdown-item has-down pr12"><a href="#">Immobili</a>
                                <ul class="dropdown">
                                    <li><a href="//URLVENDITA">Vendita</a></li>
                                    <li><a href="//URLAFFITTO">Affitto</a></li>

                                </ul>
                            </li>
                            <?php if ($_smarty_tpl->tpl_vars['utente']->value == 'visitatore') {?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/templates/login.tpl">Login</a></li>



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

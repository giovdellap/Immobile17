<!-- ##### Header Area Start ##### -->
<header class="header-area">



    <!-- Main Header Area -->
    <div class="main-header-area" id="stickyHeader">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="southNav">

                <!-- Logo -->
                <a class="nav-brand" href="{$path}">
                    <img src="{$path}Smarty/img/core-img/logo_1.png" alt=""></a>

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
                            <li><a href="{$path}">Home</a></li>

                            <li><a href="{$path}Home/aboutUs">About Us</a></li>

                            <li class="cn-dropdown-item has-down pr12"><a href="{$path}Immobile/visualizzaImmobili">Immobili</a>
                                <ul class="dropdown">
                                    <li><a href="{$path}Immobile/ricerca?ti=Vendita">Vendita</a></li>
                                    <li><a href="{$path}Immobile/ricerca?ti=Affitto">Affitto</a></li>

                                </ul>
                            </li>
                            {if $utente == 'visitatore'}
                                <li><a href="{$path}Utente/login">Login</a></li>



                            {else}
                                <li class="cn-dropdown-item has-down pr12"><a href="#">{$nomeutente}</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Area Riservata</a></li>
                                        <li><a href="{$path}Utente/logout">Logout</a></li>

                                    </ul>
                                </li>
                            {/if}

                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->
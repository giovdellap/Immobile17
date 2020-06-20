
<!-- ##### Header Area Start ##### -->
<header class="header-area">



    <!-- Main Header Area -->
    <div class="main-header-area" id="stickyHeader">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="southNav">

                <!-- Logo -->
                <a class="nav-brand" href="{$path}"><img src="{$path}Smarty/img/core-img/logo.png" alt=""></a>

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

                            <li class="cn-dropdown-item has-down pr12"><a href="#">Immobili</a>
                                <ul class="dropdown">
                                    <li><a href="//URLVENDITA">Vendita</a></li>
                                    <li><a href="//URLAFFITTO">Affitto</a></li>

                                </ul>
                            </li>
                            {if $utente != 'visitatore'}
                                <li><a href="index.html">login</a></li>

                            {else}
                                <li class="cn-dropdown-item has-down pr12"><a href="#">{$nomeutente}</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Area Riservata</a></li>
                                        <li><a href="about-us.html">Logout</a></li>

                                    </ul>
                                </li>
                            {/if}

                            <li><a href="contact.html">About Us</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->
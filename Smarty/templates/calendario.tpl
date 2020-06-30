<!DOCTYPE html>
<html lang="it">

<head>
    <title>Prenotazione</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{$path}Smarty/img/icons/favicon_1.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/others/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link href='{$path}Smarty/others/calendario/main.css' rel='stylesheet' />
    <script src='{$path}Smarty/others/login/js/main.js'></script>

</head>
<body >

<div class="calendar">

    <header>
        <button class="secondary" href="{$path}Immobile/calendario" style="align-self: flex-start; flex: 0 0 1">Oggi</button>
        <div class="calendar__title" style="display: flex; justify-content: center; align-items: center">
            <div class="icon secondary chevron_left">‹</div>
            <span class="login100-form-title p-b-32">
                {$inizio->getGiorno()} {$inizio->getNomeMese()} - {$fine->getGiorno()} {$fine->getNomeMese()}
					</span>
            <div class="icon secondary chevron_left">›</div>
        </div>
        <div style="align-self: flex-start; flex: 0 0 1"></div>
    </header>

    <div class="outer">
        <div class="wrap">
            <div class = "container">


                <div class="row">

                    <div class="col-0 col-md-2 col-xl-2"></div>
                    <!-- ORARI A SINISTRA -->
                    <div class="col-2 col-md-1 col-xl-1">
                        <div class="eventOK"><input id="check" type="checkbox" class="checkbox" /><label for="check"></label></div>
                        {assign var="timeReference" value="null"}
                        {$timeReference = $tr}
                        {while $timeReference->getOrario() <=20}
                            <div class="row">
                                <div class="headcol">{$timeReference->getOrario()}</div>
                            </div>
                        {$timeReference->incrementoOrario(30)}
                        {/while}
                    </div>

                    {assign var="flowData" value="null"}
                    {$flowData = $fd}
                    {while $flowData->getGiorno() !== $fine->getGiorno()}
                        <!-- GIORNO -->
                        <div class="col-6 col-md-1 col-xl-1">
                            <div class = "row">
                                <div class = "headcol">{$flowData->getNomeGiorno()}, {$flowData->getGiorno()}</div>
                            </div>
                            {while $flowData->getOrario() <= 20}
                                <!-- FASCIA ORARIA -->
                                <div class="row">
                                    <!-- CONTROLLO SE LA FASCIA ORARIA STA NEGLI APPLIBERI -->
                                    {assign var="libero" value="false"}
                                    {foreach $appLiberi as $app}
                                        {if $app->getOrarioInizio() == $flowData}
                                            {assign var="libero" value="true"}
                                        {/if}
                                    {/foreach}
                                    {if $libero == "true"}
                                        <div class="eventOK"><input id="check" type="checkbox" class="checkbox" /><label for="check"></label></div>
                                    {else}
                                        <div class="event "><input id="check" type="checkbox" class="checkbox" /><label for="check"></label></div>
                                    {/if}

                                </div>
                                {$flowData->incrementoOrario(30)}
                            {/while}
                        </div>
                        {$flowData->nextDay()}
                    {/while}

                    <div class="col-0 col-md-2 col-xl-2"></div>


                </div>
            </div>
        </div>



        <!--

        <table>
            <thead>
            <tr>
                <th class="headcol"></th>
                {for $i=0; $i<7; $i++}
                    <th>{$giorni[$i]}</th>
                {/for}
            </tr>
            </thead>
        </table>


        <div class="wrap">
            <table class="offset">

                <tbody>

                <tr>
                    <td class="headcol"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td class="headcol">8:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><div class="event "><input id="check" type="checkbox" class="checkbox" /><label for="check"></label>8:30–9:30 Yoga</div></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol">9:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol">10:00</td>
                    <td></td>
                    <td></td>
                    <td><div class="event "><input id="check" type="checkbox" class="checkbox" /><label for="check"></label>10:00–11:00 Meeting</div></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol">11:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol">12:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol">13:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol">14:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol">15:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol">16:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol">17:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol">18:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol">19:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol">20:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="headcol"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
        -->
    </div>
</div>

<div id='calendar'></div>

<!--===============================================================================================-->
<script src="{$path}Smarty/others/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/others/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/others/login/vendor/bootstrap/js/popper.js"></script>
<script src="{$path}Smarty/others/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/others/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/others/login/vendor/daterangepicker/moment.min.js"></script>
<script src="{$path}Smarty/others/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="{$path}Smarty/others/login/vendor/countdowntime/countdowntime.js"></script>

</body>
</html>
<!doctype html>
<!--[if lte IE 9]>
<html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en"> <!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="{{url("assets/img/favicon-16x16.png")}}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{url("assets/img/favicon-32x32.png")}}" sizes="32x32">

    <title>iLunch Admin - @yield('title')</title>


    <!-- uikit -->
    <link rel="stylesheet" href="{{url("assets/css/uikit.almost-flat.min.css")}}" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="{{url("assets/icons/flags/flags.min.css")}}" media="all">

    <!-- style switcher -->
    <link rel="stylesheet" href="{{url("assets/css/style_switcher.min.css")}}" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="{{url("assets/css/main.min.css")}}" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="{{url("assets/css/themes/themes_combined.min.css")}}" media="all">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" media="all">
    
    @yield('head')
</head>
<body class="sidebar_main_open sidebar_main_swipe">
<!-- main header -->
<header id="header_main">
    <div class="header_main_content">
        <nav class="uk-navbar">

            <!-- main sidebar switch -->
            <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                <span class="sSwitchIcon"></span>
            </a>

            <!-- secondary sidebar switch -->
            <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                <span class="sSwitchIcon"></span>
            </a>

            <div id="menu_top_dropdown" class="uk-float-left uk-hidden-small">
                <div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
                    <a href="#" class="top_menu_toggle"><i class="material-icons md-24">&#xE8F0;</i></a>
                    <div class="uk-dropdown uk-dropdown-width-3">
                        <div class="uk-grid uk-dropdown-grid">
                            <div class="uk-width-2-3">
                                <div class="uk-grid uk-grid-width-medium-1-3 uk-margin-bottom uk-text-center">
                                    <a href="page_mailbox.html" class="uk-margin-top">
                                        <i class="material-icons md-36 md-color-light-green-600">&#xE158;</i>
                                        <span class="uk-text-muted uk-display-block">Mailbox</span>
                                    </a>
                                    <a href="page_invoices.html" class="uk-margin-top">
                                        <i class="material-icons md-36 md-color-purple-600">&#xE53E;</i>
                                        <span class="uk-text-muted uk-display-block">Invoices</span>
                                    </a>
                                    <a href="page_chat.html" class="uk-margin-top">
                                        <i class="material-icons md-36 md-color-cyan-600">&#xE0B9;</i>
                                        <span class="uk-text-muted uk-display-block">Chat</span>
                                    </a>
                                    <a href="page_scrum_board.html" class="uk-margin-top">
                                        <i class="material-icons md-36 md-color-red-600">&#xE85C;</i>
                                        <span class="uk-text-muted uk-display-block">Scrum Board</span>
                                    </a>
                                    <a href="page_snippets.html" class="uk-margin-top">
                                        <i class="material-icons md-36 md-color-blue-600">&#xE86F;</i>
                                        <span class="uk-text-muted uk-display-block">Snippets</span>
                                    </a>
                                    <a href="page_user_profile.html" class="uk-margin-top">
                                        <i class="material-icons md-36 md-color-orange-600">&#xE87C;</i>
                                        <span class="uk-text-muted uk-display-block">User profile</span>
                                    </a>
                                </div>
                            </div>
                            <div class="uk-width-1-3">
                                <ul class="uk-nav uk-nav-dropdown uk-panel">
                                    <li class="uk-nav-header">Components</li>
                                    <li><a href="components_accordion.html">Accordions</a></li>
                                    <li><a href="components_buttons.html">Buttons</a></li>
                                    <li><a href="components_notifications.html">Notifications</a></li>
                                    <li><a href="components_sortable.html">Sortable</a></li>
                                    <li><a href="components_tabs.html">Tabs</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-navbar-flip">
                <ul class="uk-navbar-nav user_actions">
                    <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i
                                    class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
                    <li><a href="#" id="main_search_btn" class="user_action_icon"><i
                                    class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
                    <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7F4;</i><span
                                    class="uk-badge">16</span></a>
                        <div class="uk-dropdown uk-dropdown-xlarge">
                            <div class="md-card-content">
                                <ul class="uk-tab uk-tab-grid"
                                    data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                                    <li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">Messages
                                            (12)</a></li>
                                    <li class="uk-width-1-2"><a href="#" class="js-uk-prevent uk-text-small">Alerts
                                            (4)</a></li>
                                </ul>
                                <ul id="header_alerts" class="uk-switcher uk-margin">
                                    <li>
                                        <ul class="md-list md-list-addon">
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <span class="md-user-letters md-bg-cyan">qt</span>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="pages_mailbox.html">Omnis consectetur officia.</a></span>
                                                    <span class="uk-text-small uk-text-muted">Facilis quis culpa vitae voluptatem numquam.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <img class="md-user-image md-list-addon-avatar"
                                                         src="assets/img/avatars/avatar_07_tn.png" alt=""/>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="pages_mailbox.html">Recusandae vel.</a></span>
                                                    <span class="uk-text-small uk-text-muted">Ratione aliquam nihil sed facere culpa doloremque voluptatem provident quam adipisci.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <span class="md-user-letters md-bg-light-green">os</span>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a
                                                                href="pages_mailbox.html">Ullam ea.</a></span>
                                                    <span class="uk-text-small uk-text-muted">Magnam vel incidunt quo sed sit voluptatem molestiae quasi.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <img class="md-user-image md-list-addon-avatar"
                                                         src="assets/img/avatars/avatar_02_tn.png" alt=""/>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="pages_mailbox.html">Velit necessitatibus.</a></span>
                                                    <span class="uk-text-small uk-text-muted">Tempora qui libero necessitatibus eos excepturi voluptate deleniti voluptas.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <img class="md-user-image md-list-addon-avatar"
                                                         src="assets/img/avatars/avatar_09_tn.png" alt=""/>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="pages_mailbox.html">Culpa dolorum.</a></span>
                                                    <span class="uk-text-small uk-text-muted">Et reprehenderit minima voluptas vel qui rerum excepturi libero.</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="uk-text-center uk-margin-top uk-margin-small-bottom">
                                            <a href="page_mailbox.html"
                                               class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">Show All</a>
                                        </div>
                                    </li>
                                    <li>
                                        <ul class="md-list md-list-addon">
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons uk-text-warning">
                                                        &#xE8B2;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Mollitia numquam.</span>
                                                    <span class="uk-text-small uk-text-muted uk-text-truncate">Voluptas velit nihil recusandae error tenetur est cumque.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons uk-text-success">
                                                        &#xE88F;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Pariatur consequatur numquam.</span>
                                                    <span class="uk-text-small uk-text-muted uk-text-truncate">Id et dolor repellat fugiat.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons uk-text-danger">
                                                        &#xE001;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Sed in.</span>
                                                    <span class="uk-text-small uk-text-muted uk-text-truncate">Aut et est et iure placeat.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons uk-text-primary">
                                                        &#xE8FD;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Totam a et.</span>
                                                    <span class="uk-text-small uk-text-muted uk-text-truncate">Est dolore doloremque dolorem molestiae fugiat.</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a href="#" class="user_action_image"><img class="md-user-image"
                                                                   src="assets/img/avatars/avatar_11_tn.png"
                                                                   alt=""/></a>
                        <div class="uk-dropdown uk-dropdown-small">
                            <ul class="uk-nav js-uk-prevent">
                                <li><a href="page_user_profile.html">My profile</a></li>
                                <li><a href="page_settings.html">Settings</a></li>
                                <li><a href="login.html">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="header_main_search_form">
        <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
        <form class="uk-form uk-autocomplete" data-uk-autocomplete="{source:'data/search_data.json'}">
            <input type="text" class="header_main_search_input"/>
            <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i>
            </button>
            <script type="text/autocomplete">
                    <ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">

                <li data-value="">
                            <a href="">

                                <span class="uk-text-muted uk-text-small"></span>
                            </a>
                        </li>

                </ul>

            </script>
        </form>
    </div>
</header><!-- main header end -->
<!-- main sidebar -->
<aside id="sidebar_main">

    <div class="sidebar_main_header">
        <div class="sidebar_logo">
            <a href="index.html" class="sSidebar_hide sidebar_logo_large">
                <img class="logo_regular" src="assets/img/logo_main.png" alt="" height="15" width="71"/>
                <img class="logo_light" src="assets/img/logo_main_white.png" alt="" height="15" width="71"/>
            </a>
            <a href="index.html" class="sSidebar_show sidebar_logo_small">
                <img class="logo_regular" src="assets/img/logo_main_small.png" alt="" height="32" width="32"/>
                <img class="logo_light" src="assets/img/logo_main_small_light.png" alt="" height="32" width="32"/>
            </a>
        </div>
    </div>

    <div class="menu_section">
        <ul>
            <li {{ (Request::is('admin')) ? 'class=current_section':''}} title="Dashboard">
                <a href="{{route('admin')}}">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">Αρχική</span>
                </a>
            </li>
            <li {{ (Request::is('admin/meals')) ? 'class=current_section':''}} title="Meals">
                <a href="{{route('admin_meals')}}">
                    <span class="menu_icon"><i class="material-icons">restaurant_menu</i></span>
                    <span class="menu_title">Γεύματα</span>
                </a>
            </li>
            <li {{ (Request::is('admin/announcements')) ? 'class=current_section':''}} title="Announcments">
                <a href="{{route('admin_announcements')}}">
                    <span class="menu_icon"><i class="material-icons">chrome_reader_mode</i></span>
                    <span class="menu_title">Ανακοινώσεις</span>
                </a>
            </li>
            <li {{ (Request::is('admin/statistics')) ? 'class=current_section':''}} title="Statistics">
                <a href="{{route('admin_statistics')}}">
                    <span class="menu_icon"><i class="material-icons">insert_chart</i></span>
                    <span class="menu_title">Στατιστικά</span>
                </a>
            </li>
            <li {{ (Request::is('admin/feedback')) ? 'class=current_section':''}} title="Feedback">
                <a href="{{route('admin_feedback')}}">
                    <span class="menu_icon"><i class="material-icons">feedback</i></span>
                    <span class="menu_title">Κριτικές</span>
                </a>
            </li>
        </ul>
    </div>
</aside><!-- main sidebar end -->

<div id="page_content">
    <div id="page_content_inner">
       @yield('main')
    </div>
</div>
<!-- google web fonts -->
<script>
    WebFontConfig = {
        google: {
            families: [
                'Source+Code+Pro:400,700:latin',
                'Roboto:400,300,500,700,400italic:latin'
            ]
        }
    };
    (function () {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>
<!-- common functions -->
<script src="{{url("assets/js/common.min.js")}}"></script>
<!-- uikit functions -->
<script src="{{url("assets/js/uikit_custom.min.js")}}"></script>
<!-- altair common functions/helpers -->
<script src="{{url("assets/js/altair_admin_common.min.js")}}"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table').DataTable();
    } );
</script>

@yield('scripts')
</body>
</html>

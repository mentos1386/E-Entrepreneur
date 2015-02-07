<ul class="nav nav-pills nav-stacked">
<!-- Dashboard !-->
{!! Sidebar::Pills(
    '<span class="fa fa-dashboard"></span> Dashboard <span class="fa fa-chevron-right pull-right"></span>',
    route('dashboard'),
    Request::url(),
    array(
        [
            '<span class="fa fa-dashboard"></span> Dashboard <span class="fa fa-chevron-right pull-right"></span>',
            '#',
            Request::url(),
        ],
        [
            '<span class="fa fa-dashboard"></span> SSS <span class="fa fa-chevron-right pull-right"></span>',
            '#',
            Request::url(),
        ],
    ))
!!}
<!-- Store !-->
{!! Sidebar::Pills(
    '<span class="fa fa-shopping-cart"></span> Store <span class="fa fa-chevron-right pull-right"></span>',
    route('dashboard.store.index'),
    Request::url()
    )
!!}
<!-- Pages !-->
{!! Sidebar::Pills(
    '<span class="fa fa-server"></span> Pages <span class="fa fa-chevron-right pull-right"></span>',
    route('dashboard.pages.index'),
    Request::url(),
    array(
        [
        '</span> All Pages <span class="fa fa-chevron-right pull-right"></span>',
        route('dashboard.pages.index'),
        Request::url(),
        ],
        [
        '</span> Add New <span class="fa fa-chevron-right pull-right"></span>',
        '#',
        Request::url(),
        ],
    ))
!!}
<!-- Blog !-->
{!! Sidebar::Pills(
    '<span class="fa fa-file-text"></span> Blog <span class="fa fa-chevron-right pull-right"></span>',
    route('dashboard.blog.index'),
    Request::url()
    )
!!}
</ul>

<ul class="nav nav-pills nav-stacked"><li class="divider"></ul>

<ul class="nav nav-pills nav-stacked">
<!-- Users !-->
{!! Sidebar::Pills(
    '<span class="fa fa-users"></span> Users <span class="fa fa-chevron-right pull-right"></span>',
    route('dashboard.users.index'),
    Request::url(),
    array(
        [
        '<span class="fa fa-users"></span> Users <span class="fa fa-chevron-right pull-right"></span>',
        route('dashboard.users.index'),
        Request::url(),
        ],
        [
        '<span class="fa fa-align-justify"></span> Ranks <span class="fa fa-chevron-right pull-right"></span>',
        '#',
        Request::url(),
        ],
        [
        '<span class="fa fa-key"></span> Permissions <span class="fa fa-chevron-right pull-right"></span>',
        '#',
        Request::url(),
        ],
    ))
!!}
<!-- Appearance !-->
{!! Sidebar::Pills(
    '<span class="fa fa-paint-brush"></span> Appearance <span class="fa fa-chevron-right pull-right"></span>',
    route('dashboard.appearance.index'),
    Request::url()
    )
!!}
<!-- Settings !-->
{!! Sidebar::Pills(
    '<span class="fa fa-cog"></span> Settings <span class="fa fa-chevron-right pull-right"></span>',
    route('dashboard.settings.index'),
    Request::url()
    )
!!}
<!-- Tools !-->
{!! Sidebar::Pills(
    '<span class="fa fa-wrench"></span> Tools <span class="fa fa-chevron-right pull-right"></span>',
    route('dashboard.tools.index'),
    Request::url()
    )
!!}
</ul>

<ul class="nav nav-pills nav-stacked"><li class="divider"></ul>

<ul class="nav nav-pills nav-stacked">
<!-- FaQ !-->
{!! Sidebar::Pills(
    '<span class="fa fa-support"></span> FaQ <span class="fa fa-chevron-right pull-right"></span>',
    '#',
    Request::url()
    )
!!}
<!-- Help !-->
{!! Sidebar::Pills(
    '<span class="fa fa-archive"></span> Help <span class="fa fa-chevron-right pull-right"></span>',
    '#',
    Request::url()
    )
!!}
</ul>
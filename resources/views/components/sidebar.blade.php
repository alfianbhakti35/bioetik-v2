@php
$links = [
    [
        "href" => "dashboard",
        "text" => "Dashboard",
        "is_multi" => false,
        "icon" => "fas fa-fire"
    ],
    [
        "href" => [
            [
                "section_text" => "User",
                "section_list" => [
                    ["href" => "user", "text" => "Data Mahasiswa"],
                    // ["href" => "user.new", "text" => "Buat User"]
                ]
            ]
        ],
        "text" => "User",
        "is_multi" => true,
    ],
    [
<<<<<<< HEAD
        "href" => [
            [
                "section_text" => "Assesment",
                "section_list" => [
                    ["href" => "assesment", "text" => "Data Assesment"],
                    ["href" => "assesment.new", "text" => "Buat Assesment"]
                ]
            ]
        ],
        "text" => "Assesment",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                "section_text" => "Mahasiswa",
                "section_list" => [
                    ["href" => "mahasiswa", "text" => "Data Mahasiswa"],
                    ["href" => "mahasiswa.new", "text" => "Buat Mahasiswa"]
                ]
            ]
        ],
        "text" => "Mahasiswa",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                "section_text" => "Rekam Medik",
                "section_list" => [
                    ["href" => "rekamMedik", "text" => "Data Rekam Medik"],
                    ["href" => "rekamMedik.new", "text" => "Buat Rekam Medik"]
                ]
            ]
        ],
        "text" => "Rekam Medik",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                "section_text" => "Konsultasi",
                "section_list" => [
                    ["href" => "konsultasi", "text" => "Data Konsultasi"],
                    ["href" => "konsultasi.new", "text" => "Buat Konsultasi"]
                ]
            ]
        ],
        "text" => "Konsultasi",
        "is_multi" => true,
    ],
=======
        "href" => "assessment",
        "text" => "Assessment",
        "is_multi" => false,
        "icon" => "fas fa-book"
    ]
>>>>>>> a2af9eb4014f605ea800b176b7202bad4581754f
];
$navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $link->text }}</li>
            @if (!$link->is_multi)
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="{{ $link->icon }}"></i><span>{{ $link->text }}</span></a>
            </li>
            @else
                @foreach ($link->href as $section)
                    @php
                    $routes = collect($section->section_list)->map(function ($child) {
                        return Request::routeIs($child->href);
                    })->toArray();

                    $is_active = in_array(true, $routes);
                    @endphp

                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chart-bar"></i> <span>{{ $section->section_text }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach ($section->section_list as $child)
                                <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif
        </ul>
        @endforeach

    </aside>
</div>

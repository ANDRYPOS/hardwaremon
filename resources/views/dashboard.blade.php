@extends('layout.admin')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
            </ol>
        </nav>
    </div>
    {{-- menu list for admin --}}
    @if (Auth::user()->role == 'admin')
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Inventory <span>| Today</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Revenue <span>| This Month</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>$3,264</h6>
                                            <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">

                            <div class="card info-card customers-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Customers <span>| This Year</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>1244</h6>
                                            <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">decrease</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Customers Card -->

                        <!-- Budget Report -->
                        <div class="col-xxl-4 col-xl-6">
                            <div class="card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body pb-0">
                                    <h5 class="card-title">
                                        Budget Report <span>| This Month</span>
                                    </h5>

                                    <div id="budgetChart" style="min-height: 400px" class="echart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            var budgetChart = echarts
                                                .init(document.querySelector("#budgetChart"))
                                                .setOption({
                                                    legend: {
                                                        data: ["Allocated Budget", "Actual Spending"],
                                                    },
                                                    radar: {
                                                        // shape: 'circle',
                                                        indicator: [{
                                                                name: "Sales",
                                                                max: 6500,
                                                            },
                                                            {
                                                                name: "Administration",
                                                                max: 16000,
                                                            },
                                                            {
                                                                name: "Information Technology",
                                                                max: 30000,
                                                            },
                                                            {
                                                                name: "Customer Support",
                                                                max: 38000,
                                                            },
                                                            {
                                                                name: "Development",
                                                                max: 52000,
                                                            },
                                                            {
                                                                name: "Marketing",
                                                                max: 25000,
                                                            },
                                                        ],
                                                    },
                                                    series: [{
                                                        name: "Budget vs spending",
                                                        type: "radar",
                                                        data: [{
                                                                value: [4200, 3000, 20000, 35000, 50000, 18000],
                                                                name: "Allocated Budget",
                                                            },
                                                            {
                                                                value: [
                                                                    5000, 14000, 28000, 26000, 42000, 21000,
                                                                ],
                                                                name: "Actual Spending",
                                                            },
                                                        ],
                                                    }, ],
                                                });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <!-- End Budget Report -->

                        <!-- Website Traffic -->
                        <div class="col-xxl-4 col-xl-6">
                            <div class="card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Website Traffic <span>| Today</span></h5>

                                    <div id="trafficChart" style="min-height: 400px" class="echart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            echarts
                                                .init(document.querySelector("#trafficChart"))
                                                .setOption({
                                                    tooltip: {
                                                        trigger: "item",
                                                    },
                                                    legend: {
                                                        top: "5%",
                                                        left: "center",
                                                    },
                                                    series: [{
                                                        name: "Access From",
                                                        type: "pie",
                                                        radius: ["40%", "70%"],
                                                        avoidLabelOverlap: false,
                                                        label: {
                                                            show: false,
                                                            position: "center",
                                                        },
                                                        emphasis: {
                                                            label: {
                                                                show: true,
                                                                fontSize: "18",
                                                                fontWeight: "bold",
                                                            },
                                                        },
                                                        labelLine: {
                                                            show: false,
                                                        },
                                                        data: [{
                                                                value: 1048,
                                                                name: "Search Engine",
                                                            },
                                                            {
                                                                value: 735,
                                                                name: "Direct",
                                                            },
                                                            {
                                                                value: 580,
                                                                name: "Email",
                                                            },
                                                            {
                                                                value: 484,
                                                                name: "Union Ads",
                                                            },
                                                            {
                                                                value: 300,
                                                                name: "Video Ads",
                                                            },
                                                        ],
                                                    }, ],
                                                });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <!-- End Website Traffic -->

                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- end menu list for admin --}}

    {{-- products column for role user --}}
    @if (Auth::user()->role == 'user')
        <div class="row">
            <div class="row mb-2">
                <div class="col-8">
                    {{-- price filter --}}
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Price Range</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                    </div>
                    {{-- end price filter --}}

                    {{-- kategori filter --}}
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Categori</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                    </div>
                    {{-- end kategori filter --}}
                </div>
            </div>
            @foreach ($products as $barang)
                <div class="col-4" id="myDIV">
                    <div class="card">
                        <div class="card-body d-flex flex-row">
                            <div>
                                <h5 class="card-title font-weight-bold">{{ $barang->categories->name }} -
                                    {{ $barang->name }}</h5>
                            </div>
                        </div>

                        <img class="img-fluid hover-effect"
                            src="{{ asset('storage/products_img/') }}/{{ $barang->image }}" alt="{{ $barang->name }}" />

                        <div class="card-body">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne{{ $barang->id }}">
                                        <button class="accordion-button collapsed hover-effect" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne{{ $barang->id }}" aria-expanded="false"
                                            aria-controls="flush-collapseOne{{ $barang->id }}">
                                            Description
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne{{ $barang->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne{{ $barang->id }}"
                                        data-bs-parent="#accordionFlushExample" style="">
                                        <div class="accordion-body">{{ $barang->description }}</div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo{{ $barang->id }}">
                                        <button class="accordion-button collapsed hover-effect" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseTwo{{ $barang->id }}" aria-expanded="false"
                                            aria-controls="flush-collapseTwo{{ $barang->id }}">
                                            Pricing
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo{{ $barang->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingTwo{{ $barang->id }}"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body"></div>
                                    </div>
                                </div>
                            </div>
                            <hr class="dropdown-divider">
                            <div class="d-flex justify-content-center">
                                <a class="p-md-1 my-1 text-decoration-none float-end" data-mdb-toggle="collapse"
                                    href="#collapseContent" role="button" aria-expanded="false"
                                    aria-controls="collapseContent">
                                    <div class="bi bi-bag cursor-pointer hover-effect"
                                        style="text-decoration-style: none"> Buy Now
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    {{-- End products column for role user --}}

@endsection

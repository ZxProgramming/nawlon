@extends('layouts/layoutMaster')
@php
$user='Minue';
@endphp


@section('title', 'Customer List')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection


@section('vendor-style')
<style>
    span {
        color: red;
    }
</style>
<link
    href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

<!-- Icons -->
<link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
<link rel="stylesheet" href="../assets/vendor/fonts/fontawesome.css" />
<link rel="stylesheet" href="../assets/vendor/fonts/flag-icons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="../assets/vendor/css/rtl/core.css" />
<link rel="stylesheet" href="../assets/vendor/css/rtl/theme-default.css" />
<link rel="stylesheet" href="../assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="../assets/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="../assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="../assets/vendor/libs/tagify/tagify.css" />
<link rel="stylesheet" href="../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
<link rel="stylesheet" href="../ assets/vendor/libs/typeahead-js/typeahead.css" />

<!-- Page CSS -->
@endsection

@section('page-style')
<style>
    span {
        color: red;
    }
</style>
<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

<!-- Icons -->
<link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
<link rel="stylesheet" href="../assets/vendor/fonts/fontawesome.css" />
<link rel="stylesheet" href="../assets/vendor/fonts/flag-icons.css" />

<!-- Core CSS -->
<link rel="stylesheet" href="../assets/vendor/css/rtl/core.css" />
<link rel="stylesheet" href="../assets/vendor/css/rtl/theme-default.css" />
<link rel="stylesheet" href="../assets/css/demo.css" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="../assets/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
<link rel="stylesheet" href="../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
<link rel="stylesheet" href="../assets/vendor/libs/flatpickr/flatpickr.css" />

@endsection
@section('vendor-script')
<!-- Helpers -->
<script src="../assets/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../assets/js/config.js"></script>
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../assets/vendor/libs/hammer/hammer.js"></script>
<script src="../assets/vendor/libs/i18n/i18n.js"></script>
<script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<!-- Flat Picker -->
<script src="../assets/vendor/libs/moment/moment.js"></script>
<script src="../assets/vendor/libs/flatpickr/flatpickr.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/tables-datatables-advanced.js"></script>
@endsection
@section('content')
@include('success')


<!-- Bootstrap Table with Header - Dark -->
<!-- Browser Default -->
<div class="col-md mb-4 mb-md-0">
    <div class="card">
        <h5 class="card-header">اضافة ناولون جديد</h5>
        <div class="card-body">
            <form class="browser-default-validation" action="{{ route('addNawlone') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                {{-- اختيار فئة السيارة --}}
                <div class="mb-3">

                    <label class="form-label" for="basic-default-country"> فئة السيارة </label>
                    <select class="form-select" id="basic-default-country" name="car_id">
                        <option value="">اختار فئة السيارة</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>

                        @endforeach

                    </select>
                    @error('category')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                {{-- اختيار فئة السيارة --}}
                {{-- اختيار السيارة --}}
                <div class="mb-3">
                    <label class="form-label" for="basic-default-country"> السيارة</label>
                    <select class="form-select" id="basic-default-country" name="car_id">
                        <option value="">اختار السيارة</option>
                        @foreach($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->cars_name }}</option>

                        @endforeach

                    </select>
                    @error('category')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                {{-- اختيار السيارة --}}
                {{-- اختيار مكان التحميل --}}
                <div class="mb-3">
                    <label class="form-label" for="basic-default-country">اختيار مكان التحميل</label>
                    <select class="form-select" id="basic-default-country" name="down_location_id">
                        <option value="">اختيار مكان التحميل</option>
                        @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>

                        @endforeach
                    </select>
                    @error('category')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                {{-- اختيار مكان التحميل --}}


                <div class="mb-3">
                    <label class="form-label" for="tatek_location">مكان التعتيق</label>
                    <input type="text" name="tatek_location" id="tatek_location" class="form-control"
                        placeholder="اكتب مكان التعتيق" />
                    @error('tatek_location')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="nawlone_price">سعر النقله</label>
                    <div class="input-group input-group-merge">
                        <input type="number" id="basic-default-name" name="nawlone_price" class="form-control"
                            placeholder="اكتب سعر النقلة" aria-describedby="nawlone_price" />
                        <span class="input-group-text cursor-pointer" id="basic-default-name"><i
                                class="bx bx-hide"></i></span>

                    </div>
                    @error('nawlone_price')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-dob">كمسيون سواق</label>
                    <input type="number" name="comsion_driver" class="form-control flatpickr-validation"
                        id="basic-default-dob" />
                    @error('comsion_driver')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="basic-default-dob">عهده</label>
                    <input type="number" name="custody" class="form-control flatpickr-validation"
                        id="basic-default-dob" />
                    @error('custody')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-dob">السوالر</label>
                    <input type="number" name="solar" class="form-control flatpickr-validation"
                        id="basic-default-dob" />
                    @error('solar')
                    <span>{{ $message }}</span>
                    @enderror
                </div>



                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">اضافة</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Browser Default -->
<!--/ Bootstrap Table with Header Dark -->

@endsection
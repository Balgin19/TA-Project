@extends('layouts.master')


@section('content')

<section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
            <div class="col-xxl-32">
                <div class="card info-card customers-card">
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false"></i></a>
                  </div>
                    <div class="card-body">
                        <h5 class="card-title"  ></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>Selamat Datang Balgin</h6>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Menunggu Persetujuan</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6>145</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->
          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Disetujui</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h6>12</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <!-- End Customers Card -->

        
    </div><!-- End Reports -->
  </section>

@stop
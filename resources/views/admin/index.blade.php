@extends('layouts.app')

@section('content')
    <div class="container-fluid vh-100 vw-100 p-0 m-0">
        <div class="vh-100 admin-menu">
            <div class="bg-primary h-100">
                <div class="pt-3 pb-3 w-100 d-flex align-items-center justify-content-center text-white">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="nav flex-column nav-pills side-menu pt-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <i class="fas fa-home"></i>
                    </a>
                    <a class="nav-link" id="v-pills-product-tab" data-toggle="pill" href="#v-pills-product" role="tab" aria-controls="v-pills-product" aria-selected="false">
                        <i class="fas fa-box-open"></i>
                    </a>
                    <a class="nav-link" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="false">
                        <i class="fas fa-user-cog"></i>
                    </a>
                    <a class="nav-link" id="v-pills-payments-tab" data-toggle="pill" href="#v-pills-payments" role="tab" aria-controls="v-pills-paymets" aria-selected="false">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </a>
                    <a class="nav-link" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders-tab" role="tab" aria-controls="v-pills-orders-tab" aria-selected="false">
                        <i class="fas fa-shipping-fast"></i>
                    </a>
                </div>
            </div>

            <div class="bg-white h-100 w-100">
                <div class="admin-tabs">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="sub-menu-header p-2 d-flex">
                                <div class="user-icon">
                                    <i class="fas fa-user-circle fa-2x"></i>
                                </div>
                                <div class="user-label ml-1 d-flex flex-column">
                                    <p class="m-0">Rodrigo Oliveira</p>
                                    <div class="user-group d-flex align-items-start flex-column">
                                        <span class="badge badge-primary">Administrator</span>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-2 pt-2 d-flex align-items-center">
                                <p class="font-weight-normal m-0">HOME</p>
                            </div>
                            <div class="nav flex-column nav-pills" id="v-pills-subtab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active p-0 pl-3" id="v-pills-charts-home-tab" data-toggle="pill" href="#v-pills-charts-home" role="tab" aria-controls="v-pills-charts-home" aria-selected="true">
                                    <i class="fas fa-angle-right"></i>
                                    Charts
                                </a>
                                <a class="nav-link p-0 pl-3" id="v-pills-new-product-tab" data-toggle="pill" href="#v-pills-new-product" role="tab" aria-controls="v-pills-new-product" aria-selected="true">
                                    <i class="fas fa-angle-right"></i>
                                    New product
                                </a>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab">
                            <div class="sub-menu-header p-2 d-flex">
                                <div class="user-icon">
                                    <i class="fas fa-user-circle fa-2x"></i>
                                </div>
                                <div class="user-label ml-1 d-flex flex-column">
                                    <p class="m-0">Rodrigo Oliveira</p>
                                    <div class="user-group d-flex align-items-start flex-column">
                                        <span class="badge badge-primary">Administrator</span>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-2 pt-2 d-flex align-items-center">
                                <p class="font-weight-normal m-0">PRODUCT</p>
                            </div>
                            <div class="nav flex-column nav-pills" id="v-pills-subtab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link p-0 pl-3" id="v-pills-new-product-tab" data-toggle="pill" href="#v-pills-new-product" role="tab" aria-controls="v-pills-new-product" aria-selected="true">
                                    <i class="fas fa-angle-right"></i>
                                    New product
                                </a>
                                <a class="nav-link p-0 pl-3" id="v-pills-list-products-tab" data-toggle="pill" href="#v-pills-list-products" role="tab" aria-controls="v-pills-list-products" aria-selected="false">
                                    <i class="fas fa-angle-right"></i>
                                    List products
                                </a>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab">
                            <div class="sub-menu-header p-2 d-flex">
                                <div class="user-icon">
                                    <i class="fas fa-user-circle fa-2x"></i>
                                </div>
                                <div class="user-label ml-1 d-flex flex-column">
                                    <p class="m-0">Rodrigo Oliveira</p>
                                    <div class="user-group d-flex align-items-start flex-column">
                                        <span class="badge badge-primary">Administrator</span>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-2 pt-2 d-flex align-items-center">
                                <p class="font-weight-normal m-0">Users</p>
                            </div>
                            <div class="nav flex-column nav-pills" id="v-pills-subtab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link p-0 pl-3" id="v-pills-list-users-tab" data-toggle="pill" href="#v-pills-list-users" role="tab" aria-controls="v-pills-list-users" aria-selected="false">
                                    <i class="fas fa-angle-right"></i>
                                    List users
                                </a>
                                <a class="nav-link p-0 pl-3" id="v-pills-new-user-tab" data-toggle="pill" href="#v-pills-new-user" role="tab" aria-controls="v-pills-new-user" aria-selected="false">
                                    <i class="fas fa-angle-right"></i>
                                    New user
                                </a>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-payments" role="tabpanel" aria-labelledby="v-pills-payments-tab">
                            <div class="sub-menu-header p-2 d-flex">
                                <div class="user-icon">
                                    <i class="fas fa-user-circle fa-2x"></i>
                                </div>
                                <div class="user-label ml-1 d-flex flex-column">
                                    <p class="m-0">Rodrigo Oliveira</p>
                                    <div class="user-group d-flex align-items-start flex-column">
                                        <span class="badge badge-primary">Administrator</span>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-2 pt-2 d-flex align-items-center">
                                <p class="font-weight-normal m-0">PAYMENT</p>
                            </div>
                            <div class="nav flex-column nav-pills" id="v-pills-subtab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link p-0 pl-3" id="v-pills-list-payments-tab" data-toggle="pill" href="#v-pills-list-payments" role="tab" aria-controls="v-pills-list-payments" aria-selected="false">
                                    <i class="fas fa-angle-right"></i>
                                    List payments
                                </a>
                                <a class="nav-link p-0 pl-3" id="v-pills-list-payments-tab" data-toggle="pill" href="#v-pills-list-payments" role="tab" aria-controls="v-pills-list-payments" aria-selected="false">
                                    <i class="fas fa-angle-right"></i>
                                    List payments by user
                                </a>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                            <div class="sub-menu-header p-2 d-flex">
                                <div class="user-icon">
                                    <i class="fas fa-user-circle fa-2x"></i>
                                </div>
                                <div class="user-label ml-1 d-flex flex-column">
                                    <p class="m-0">Rodrigo Oliveira</p>
                                    <div class="user-group d-flex align-items-start flex-column">
                                        <span class="badge badge-primary">Administrator</span>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-2 pt-2 d-flex align-items-center">
                                <p class="font-weight-normal m-0">ORDER</p>
                            </div>
                            <div class="nav flex-column nav-pills" id="v-pills-subtab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link p-0 pl-3" id="v-pills-list-orders-tab" data-toggle="pill" href="#v-pills-list-orders" role="tab" aria-controls="v-pills-list-orders" aria-selected="false">
                                    <i class="fas fa-angle-right"></i>
                                    List orders
                                </a>
                                <a class="nav-link p-0 pl-3" id="v-pills-list-orders-tab" data-toggle="pill" href="#v-pills-list-orders" role="tab" aria-controls="v-pills-list-orders" aria-selected="false">
                                    <i class="fas fa-angle-right"></i>
                                    List orders by user
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="vw-100">
            <div class="admin-content">
                <div class="tab-content" id="v-pills-subtabContent">
                    <div class="tab-pane fade active show" id="v-pills-charts-home" role="tabpanel" aria-labelledby="v-pills-charts-home-tab">
                        <div class="row ml-3">
                            <div class="col-6 p-0">
                                <div class="card-wrapper pr-3 pt-3">
                                    <div class="card">
                                        <div class="card-body">
                                          <h5 class="card-title">Card title</h5>
                                          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <a href="#" class="card-link">Card link</a>
                                          <a href="#" class="card-link">Another link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 p-0">
                                <div class="card-wrapper pr-3 pt-3">
                                    <div class="card">
                                        <div class="card-body">
                                          <h5 class="card-title">Card title</h5>
                                          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <a href="#" class="card-link">Card link</a>
                                          <a href="#" class="card-link">Another link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-new-product" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        New Product
                    </div>

                    <div class="tab-pane fade" id="v-pills-list-products" role="tabpanel" aria-labelledby="v-pills-list-products-tab">
                        List Products
                    </div>

                    <div class="tab-pane fade" id="v-pills-list-payments" role="tabpanel" aria-labelledby="v-pills-list-payments-tab">
                        List Payments
                    </div>

                    <div class="tab-pane fade" id="v-pills-list-payments-by-user" role="tabpanel" aria-labelledby="v-pills-list-payments-by-user-tab">
                        List Payments By User
                    </div>

                    <div class="tab-pane fade" id="v-pills-list-orders" role="tabpanel" aria-labelledby="v-pills-list-orders-tab">
                        List Orders
                    </div>

                    <div class="tab-pane fade" id="v-pills-list-orders-by-user" role="tabpanel" aria-labelledby="v-pills-list-orders-by-user-tab">
                        List Payments By User
                    </div>

                    <div class="tab-pane fade" id="v-pills-list-users" role="tabpanel" aria-labelledby="v-pills-list-users-tab">
                        List Users
                    </div>

                    <div class="tab-pane fade" id="v-pills-new-user" role="tabpanel" aria-labelledby="v-pills-new-user-tab">
                        New User
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

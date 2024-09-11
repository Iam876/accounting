@extends('layouts.header')
@section('content')
    <!-- <div class="main-wrapper"> -->

    <!-- Header -->

    <!-- /Header -->

    <!-- Sidebar -->

    <!-- /Sidebar -->

    <!-- Page Wrapper -->
			<div class="page-wrapper">
				<div class="content container-fluid">
					<!-- Page Header -->
					<div class="card">
						<div class="card-body">
							<div class="page-header">
								<div class="content-invoice-header">
									<h5>Invoice Details</h5>
									
								</div>
							</div>
							<!-- /Page Header -->
							<div class="row justify-content-center">
								<div class="col-lg-8">
									<div class="cards">
										<div class="card-bod">
											<div class="card-table">
												<div class="card-bod">
													<!-- Invoice Logo -->
													<div class="invoice-item invoice-item-one">
														<div class="row align-items-center">
															<div class="col-md-6">
																<div class="invoice-logo">
																	<img src="{{asset('assets')}}/img/logo.svg" class="light-color-logo" alt="logo">
																	<img src="{{asset('assets')}}/img/logo.svg" class="dark-white-logo" alt="logo">
																</div>
															</div>
															<div class="col-md-6">
																<div class="invoice-info">
																	<h1 class="text-warning">UNPAID</h1>
																</div>
															</div>
														</div>
													</div>
													<!-- /Invoice Logo -->
				
													<!-- Invoice Date -->
													<div class="invoice-item invoice-item-date">
														<div class="row">
															<div class="col-md-6">
																<p class="text-start invoice-details">
																	Issue Date<span>: </span><strong>13 Apr 2023</strong> 
																</p>
															</div>
															<div class="col-md-6">
																<p class="text-start invoice-details">
																	Due Date<span>: </span><strong>03 Jun 2023</strong><span class="text-danger">Due in 8 days</span>
																</p>
															</div>
															<!-- <div class="col-md-4">
																<p class="invoice-details">
																	Invoice No<span>: </span><strong>INV 00001</strong> 
																</p>
															</div> -->
														</div>
													</div>
													<!-- /Invoice Date -->
													
													<!-- Invoice To -->
													<div class="invoice-item invoice-item-two">
														<div class="row">
															<div class="col-md-6">
																<div class="invoice-info">
																	<strong class="customer-text-one">Invoiced To<span>:</span></strong>
																	<p class="invoice-details-two">
																		John Williams<br>
																		15 Hodges Mews, High Wycombe<br>
																		HP12 3JL<br>
																		United Kingdom
																	</p>
																</div>
															</div>
															<div class="col-md-6">
																<div class="invoice-info invoice-info2">
																	<strong class="customer-text-one">Pay To<span>:</span></strong>
																	<p class="invoice-details-two">
																		Walter Roberson<br>
																		299 Star Trek Drive, Panama City,<br>
																		Florida, 32405,<br>
																		USA
																	</p>
																</div>
															</div>
														</div>
													</div>
													<!-- /Invoice To -->
				
													<!-- Invoice Item -->
													<div class="invoice-item invoice-table-wrap">
														<div class="invoice-table-head">
															<h6>Items:</h6>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="table-responsive">
																	<table class="table table-center table-hover mb-0">
																		<thead class="thead-light">
																			<tr>
																				<th>Product / Service</th>
																				<th>Quantity</th>
																				<th>Unit</th>
																				<th>Rate</th>
																				<th>Discount</th>
																				<th>Tax</th>
																				<th>Amount</th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td>Nike Jordan</td>
																				<td>1</td>
																				<td>Pcs</td>
																				<td>$1360.00</td>
																				<td>0</td>
																				<td>0</td>
																				<td>$1360.00</td>
																			</tr>
																			<tr>
																				<td>Lobar Handy</td>
																				<td>1</td>
																				<td>Inch</td>
																				<td>$155.00</td>
																				<td>0</td>
																				<td>0</td>
																				<td>$155.00</td>
																			</tr>
																			<tr>
																				<td>Bold V3.2</td>
																				<td>1</td>
																				<td>Pcs</td>
																				<td>$1055.00</td>
																				<td>0</td>
																				<td>0</td>
																				<td>$1055.00</td>
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
													<!-- /Invoice Item -->
													<div class="col-lg-12 col-md-12">
														<div class="invoice-total-card">
															<div class="invoice-total-box">
																<div class="invoice-total-inner">
																	<p>Taxable <span>$360.00</span></p>
																	<p>Discount<span>$13.20</span></p>
																	<p>Vat <span>$0.00</span></p>
																</div>
																<div class="invoice-total-footer">
																	<h4>Total Amount <span>$347.80</span></h4>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="card timeline-card">
										<div class="card-body">
											<div class="input-block mb-3">
												<label>Status</label>
												<select class="select">
													<option>Paid</option>
													<option>Unpaid</option>
													<option>Partially paid</option>
													<option>Overdue</option>
													<option>Cancelled</option>
													<option>Refunded</option>
													<option>Draft</option>
												</select>
											</div>
											<div class="invoice-info invoice-info2 admin-invoice invoice-item mb-4">
												<strong class="customer-text-one">Payment Details<span>:</span></strong>
												<p class="text-start invoice-details-two invoice-details mb-2">
													PayPal :<strong>examplepaypal.co</strong>
												</p>
												<p class="text-start invoice-details-two invoice-details mb-2">
													Account :<strong>examplepaypal.co</strong>
												</p>
												<p class="text-start invoice-details-two invoice-details">
													Payment Term :
												</p>
												<div class="due-date">
													<strong>15 days</strong><span class="text-danger">Due in 8 days</span>
												</div>
											</div>
											<strong class="customer-text-one">Timeline<span>:</span></strong>
											<ul class="activity-feed">
												<li class="feed-item timeline-item">
													<span class="feed-text timeline-user"><a href="profile.html">John Smith</a> Created Invoice</span>
													<div class="invoice-date"><span class="start-date">07 April 2023</span><span>07 April 2023</span></div>
												</li>
												<li class="feed-item timeline-item">
													<span class="feed-text timeline-user"><a href="profile.html">John Smith</a> Created Invoice</span>
													<div class="invoice-date"><span class="start-date">07 April 2023</span><span>07 April 2023</span></div>
												</li>
												<li class="feed-item timeline-item">
													<span class="feed-text timeline-user"><a href="profile.html">John Smith</a> Created Invoice</span>
													<div class="invoice-date"><span class="start-date">07 April 2023</span><span>07 April 2023</span></div>
												</li>
												<li class="feed-item timeline-item">
													<span class="feed-text timeline-user"><a href="profile.html">John Smith</a> Created Invoice</span>
													<div class="invoice-date"><span class="start-date">07 April 2023</span><span>07 April 2023</span></div>
												</li>
												<li class="feed-item timeline-item">
													<span class="feed-text timeline-user"><a href="profile.html">John Smith</a> Created Invoice</span>
													<div class="invoice-date"><span class="start-date">07 April 2023</span><span>07 April 2023</span></div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="terms-conditions">
									<div class="row align-items-center justify-content-between">
										<div class="col-lg-6 col-md-6">
											<div class="invoice-terms align-center justify-content-start">
												<span class="invoice-terms-icon bg-white-smoke me-3">
													<i class="fe fe-file-text"></i>
												</span>
												<div class="invocie-note">
													<h6>Terms & Conditions</h6>
													<p class="mb-0">Authoritatively envisioneer business action items through parallel sources.</p>
												</div>
											</div>
											<div class="invoice-terms align-center justify-content-start">
												<span class="invoice-terms-icon bg-white-smoke me-3">
													<i class="fe fe-file-minus"></i>
												</span>
												<div class="invocie-note">
													<h6>Note</h6>
													<p class="mb-0">This is computer generated receipt and does not require physical signature.</p>
												</div>
											</div>
										</div>
										<div class="invoice-sign text-end col-lg-6">										
											<span class="d-block">Authorised Sign</span>
											<img class="img-fluid d-inline-block light-color-logo" src="{{asset('assets')}}/img/signature.png" alt="sign">
											<img class="img-fluid d-inline-block dark-white-logo" src="{{asset('assets')}}/img/signature-white.png" alt="sign">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Wrapper -->

    <!-- Add Asset -->
    <div class="toggle-sidebar">
        <div class="sidebar-layout-filter">
            <div class="sidebar-header">
                <h5>Filter</h5>
                <a href="#" class="sidebar-closes"><i class="fa-regular fa-circle-xmark"></i></a>
            </div>
            <div class="sidebar-body">
                <form action="#" autocomplete="off">
                    <!-- Product -->
                    <div class="accordion" id="accordionMain1">
                        <div class="card-header-new" id="headingOne">
                            <h6 class="filter-title">
                                <a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Product Name
                                    <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                </a>
                            </h6>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample1">
                            <div class="card-body-chat">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="checkBoxes1">
                                            <div class="form-custom">
                                                <input type="text" class="form-control" id="member_search1"
                                                    placeholder="Search Product">
                                                <span><img src="{{ asset('assets') }}/img/icons/search.svg"
                                                        alt="img"></span>
                                            </div>
                                            <div class="selectBox-cont">
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Lenovo 3rd Generation
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Nike Jordan
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Apple Series 5 Watch
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Amazon Echo Dot
                                                </label>
                                                <!-- View All -->
                                                <div class="view-content">
                                                    <div class="viewall-One">
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Lobar Handy
                                                        </label>
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Woodcraft Sandal
                                                        </label>
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Black Slim 200
                                                        </label>
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Red Premium Handy
                                                        </label>
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Bold V3.2
                                                        </label>
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Iphone 14 Pro
                                                        </label>
                                                    </div>
                                                    <div class="view-all">
                                                        <a href="javascript:void(0);" class="viewall-button-One"><span
                                                                class="me-2">View All</span><span><i
                                                                    class="fa fa-circle-chevron-down"></i></span></a>
                                                    </div>
                                                </div>
                                                <!-- /View All -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product -->

                    <!-- Product Code -->
                    <div class="accordion" id="accordionMain2">
                        <div class="card-header-new" id="headingTwo">
                            <h6 class="filter-title">
                                <a href="javascript:void(0);" class="w-100 collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Product Code
                                    <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                </a>
                            </h6>
                        </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample2">
                            <div class="card-body-chat">
                                <div id="checkBoxes3">
                                    <div class="selectBox-cont">
                                        <div class="form-custom">
                                            <input type="text" class="form-control" id="member_search2"
                                                placeholder="Search Invoice">
                                            <span><img src="{{ asset('assets') }}/img/icons/search.svg"
                                                    alt="img"></span>
                                        </div>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="product-code">
                                            <span class="checkmark"></span> P125389
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="product-code">
                                            <span class="checkmark"></span> P125390
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="product-code">
                                            <span class="checkmark"></span> P125391
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="product-code">
                                            <span class="checkmark"></span> P125392
                                        </label>
                                        <!-- View All -->
                                        <div class="view-content">
                                            <div class="viewall-Two">
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="product-code">
                                                    <span class="checkmark"></span> P125393
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="product-code">
                                                    <span class="checkmark"></span> P125394
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="product-code">
                                                    <span class="checkmark"></span> P125395
                                                </label>
                                            </div>
                                            <div class="view-all">
                                                <a href="javascript:void(0);" class="viewall-button-Two"><span
                                                        class="me-2">View All</span><span><i
                                                            class="fa fa-circle-chevron-down"></i></span></a>
                                            </div>
                                        </div>
                                        <!-- /View All -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Code -->

                    <!-- Unts -->
                    <div class="accordion" id="accordionMain3">
                        <div class="card-header-new" id="headingThree">
                            <h6 class="filter-title">
                                <a href="javascript:void(0);" class="w-100 collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    Units
                                    <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                </a>
                            </h6>
                        </div>

                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample3">
                            <div class="card-body-chat">
                                <div id="checkBoxes2">
                                    <div class="selectBox-cont">
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="units">
                                            <span class="checkmark"></span> Inches
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="units">
                                            <span class="checkmark"></span> Pieces
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="units">
                                            <span class="checkmark"></span> Hours
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="units">
                                            <span class="checkmark"></span> Box
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="units">
                                            <span class="checkmark"></span> Kilograms
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="units">
                                            <span class="checkmark"></span> Meter
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Units -->

                    <!-- Category -->
                    <div class="accordion accordion-last" id="accordionMain4">
                        <div class="card-header-new" id="headingFour">
                            <h6 class="filter-title">
                                <a href="javascript:void(0);" class="w-100 collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    Category
                                    <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                </a>
                            </h6>
                        </div>

                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample4">
                            <div class="card-body-chat">
                                <div id="checkBoxes4">
                                    <div class="selectBox-cont">
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="category">
                                            <span class="checkmark"></span> Laptop
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="category">
                                            <span class="checkmark"></span> Shoes
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="category">
                                            <span class="checkmark"></span> Accessories
                                        </label>
                                        <label class="custom_check w-100">
                                            <input type="checkbox" name="category">
                                            <span class="checkmark"></span> Electronics
                                        </label>
                                        <!-- View All -->
                                        <div class="view-content">
                                            <div class="viewall-Two">
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Furnitures
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Bags
                                                </label>
                                                <label class="custom_check w-100">
                                                    <input type="checkbox" name="username">
                                                    <span class="checkmark"></span> Phone
                                                </label>
                                            </div>
                                            <div class="view-all">
                                                <a href="javascript:void(0);" class="viewall-button-Two"><span
                                                        class="me-2">View All</span><span><i
                                                            class="fa fa-circle-chevron-down"></i></span></a>
                                            </div>
                                        </div>
                                        <!-- /View All -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Category -->

                    <div class="filter-buttons">
                        <button type="submit"
                            class="d-inline-flex align-items-center justify-content-center btn w-100 btn-primary">
                            Apply
                        </button>
                        <button type="submit"
                            class="d-inline-flex align-items-center justify-content-center btn w-100 btn-secondary">
                            Reset
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- /Add Asset -->
    <!-- </div> -->
    <!-- /Main Wrapper -->
@endsection

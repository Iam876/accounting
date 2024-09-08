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
					<div class="page-header">
						<div class="content-page-header ">
							<h5>Products / Services</h5>
							<div class="list-btn">
								<ul class="filter-list">
									<li>
										<a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Filter"><span class="me-2"><img src="assets/img/icons/filter-icon.svg" alt="filter"></span>Filter </a>
									</li>
									<li class="">
										<div class="dropdown dropdown-action" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Download">
											<a href="#" class="btn-filters" data-bs-toggle="dropdown" aria-expanded="false"><span><i class="fe fe-download"></i></span></a>
											<div class="dropdown-menu dropdown-menu-right">
												<ul class="d-block">
													<li>
														<a class="d-flex align-items-center download-item" href="javascript:void(0);" download><i class="far fa-file-pdf me-2"></i>PDF</a>
													</li>
													<li>
														<a class="d-flex align-items-center download-item" href="javascript:void(0);" download><i class="far fa-file-text me-2"></i>CVS</a>
													</li>
												</ul>
											</div>
										</div>														
									</li>
									<li>
										<a class="btn-filters" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Print"><span><i class="fe fe-printer"></i></span> </a>
									</li>
									<li>
										<a class="btn btn-primary" href="add-products.html"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Product</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
						
					<!-- Search Filter -->
					<div id="filter_inputs" class="card filter-card">
						<div class="card-body pb-0">
							<div class="row">
								<div class="col-sm-6 col-md-3">
									<div class="input-block mb-3">
										<label>Name</label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="input-block mb-3">
										<label>Email</label>
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="input-block mb-3">
										<label>Phone</label>
										<input type="text" class="form-control">
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Search Filter -->

					<!-- All Invoice -->
					<!-- <div class="card invoices-tabs-card">
						<div class="invoices-main-tabs">
							<div class="row align-items-center">
								<div class="col-lg-12">
									<div class="invoices-tabs">
										<ul>
											<li><a href="product-list.html" class="active">Product</a></li>
											<li><a href="category.html">Category</a></li>	
											<li><a href="units.html">Units</a></li>	
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<!-- /All Invoice -->
					
					<!-- Table -->
					<div class="row">
						<div class="col-sm-12">
							<div class=" card-table">
								<div class="card-body">
									<div class="table-responsive">
										<div class="companies-table">
										<table class="table table-center table-hover datatable">
											<thead class="thead-light">
												<tr>
													<th>#</th>
													<th>School Image</th>
													<th>School Name</th>
													<th>Contact</th>
													<th>Address</th>
													<th>Prefecture</th>
													<!-- <th>Selling Price</th> -->
													<!-- <th>Purchase Price</th> -->
													<th class="no-sort">Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td ><h2 class="table-avatar">
														<a href="profile.html" class="avatar avatar-md me-2 companies">
															<img class="avatar-img sales-rep"
																src="assets/img/sales-return1.svg"
																alt="User Image"></a>
																<a href="profile.html">Lenovo 3rd Generation</a>
													</h2></td>
													<td>P125389</td>
													<td>Laptop</td>
													<td>Inches</td>
													<td>2</td>
													<td class="d-flex align-items-center">
														<div class="dropdown dropdown-action">
															<a href="#" class=" btn-action-icon " data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
															<div class="dropdown-menu dropdown-menu-right">
																<ul>
																	<li>
																		<a class="dropdown-item" href="edit-products.html"><i class="far fa-edit me-2"></i>Edit</a>
																	</li>
																	<li>
																		<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="far fa-trash-alt me-2"></i>Delete</a>
																	</li>
																</ul>
															</div>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Table -->

				</div>
			</div>
<!-- /Page Wrapper -->


<!-- </div> -->
<!-- /Main Wrapper -->

@endsection
<!-- @include('layouts.theme-settings') -->
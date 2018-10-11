@extends('admin.layouts.master')



@section('contents')
<div class="content">
		<div class="container-fluid">
				<div class="row">
						<div class="col-lg-3 col-sm-6">
								<div class="card">
										<div class="content">
												<div class="row">
														<div class="col-xs-5">
																<div class="icon-big icon-warning text-center">
																		<i class="ti-server"></i>
																</div>
														</div>
														<div class="col-xs-7">
																<div class="numbers">
																		<p>Total Posts</p>
																		{{ $post_count }}
																</div>
														</div>
												</div>
												<div class="footer">
														<hr />
														<div class="stats">
														</div>
												</div>
										</div>
								</div>
						</div>
						<div class="col-lg-3 col-sm-6">
								<div class="card">
										<div class="content">
												<div class="row">
														<div class="col-xs-5">
																<div class="icon-big icon-success text-center">
																		<i class="ti-time"></i>
																</div>
														</div>
														<div class="col-xs-7">
																<div class="numbers">
																		<p>Last Post</p>
																		{{ $post_latest }}
																</div>
														</div>
												</div>
												<div class="footer">
														<hr />
														<div class="stats">
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
		$(document).ready(function(){

				demo.initChartist();

				$.notify({
						icon: 'ti-gift',
						message: "Welcome to <b>{{ config('app.name') }} Dashboard</b> - a beautiful Bootstrap freebie Laravel Blog for you."

					},{
							type: 'success',
							timer: 4000
					});

		});
</script>
@endsection

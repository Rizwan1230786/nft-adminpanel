@extends('admin/contentLayoutMaster')

@section('title', 'NfTs')


@section('page-style')
{{-- Page css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
@section('content')

<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
  <div class="row match-height">
    <!-- Statistics Card -->
    <div class="col-xl-12 col-md-12 col-12">
      <div class="card card-statistics">
        <div class="card-header">
          <h4 class="card-title">Statistics</h4>
          <div class="d-flex align-items-center">
            <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p>
          </div>
        </div>
        <div class="card-body statistics-body">
          <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-primary me-2">
                  <div class="avatar-content">
                    <i data-feather="user" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$user}}</h4>
                  <p class="card-text font-small-3 mb-0">users</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-success me-2">
                  <div class="avatar-content">
                    <i data-feather="user" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$customer}}</h4>
                  <p class="card-text font-small-3">Total Customers</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-danger me-2">
                  <div class="avatar-content">
                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$data}}</h4>
                  <p class="card-text font-small-3 mb-0">Total Revenue</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-light me-2">
                  <div class="avatar-content">
                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$revenue}}</h4>
                  <p class="card-text font-small-3 mb-0">Last Month Revenue</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12" style="margin-top: 30px;">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-primary me-2">
                  <div class="avatar-content">
                    <i data-feather="users" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$allclient}}</h4>
                  <p class="card-text font-small-3 mb-0">All Seller</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12" style="margin-top: 30px;">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-success me-2">
                  <div class="avatar-content">
                    <i data-feather="user" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$goldclient}}</h4>
                  <p class="card-text font-small-3 mb-0">Gold Seller</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12" style="margin-top: 30px;">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-danger me-2">
                  <div class="avatar-content">
                    <i data-feather="user" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$personalclient}}</h4>
                  <p class="card-text font-small-3 mb-0">Personal Seller</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12" style="margin-top: 30px;">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-light me-2">
                  <div class="avatar-content">
                    <i data-feather="link" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{$sellerlink}}</h4>
                  <p class="card-text font-small-3 mb-0">Seller Links</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row match-height">
    {{-- <div class="col-lg-8 col-12">
      <div class="card">
       <div id="chartContainer">
      </div>
        <div class="row mx-0">
          <div class="col-md-12 col-12 revenue-report-wrapper">
            <div class="d-sm-flex justify-content-between align-items-center mb-3">
              <!-- <h4 class="card-title mb-50 mb-sm-0">Revenue Report</h4> -->
              <div class="d-flex align-items-center">
                <div class="d-flex align-items-center me-2">
                </div>
                <div class="d-flex align-items-center ms-75">
                </div>
              </div>
            </div>
            <div>

            </div>
          </div>
        </div>
      </div>
    </div> --}}
    {{-- <div class="col-lg-4 col-12">
      <div class="row match-height">
        <div class="col-lg-6 col-md-3 col-6">
          <div class="card">
            <div class="card-body pb-50">
              <h6>Total Orders</h6>
              <h4 class="fw-bolder mb-1">{{$order}}</h4>
              <div id="statistics-order-chart"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-3 col-6">
          <div class="card card-tiny-line-stats">
            <div class="card-body pb-50">
              <h6>Profit</h6>
              <h4 class="fw-bolder mb-1">${{$profit}}</h4>
              <div id="statistics-profit-chart"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-12">
          <div class="card earnings-card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <h4 class="fw-bolder card-title mb-1">Total Profit</h4>
                  <div class="font-small-2"></div>
                  <h4 class="fw-bolder mb-1"></h4>
                  <p class="card-text text-muted font-small-2">
                    <!-- <span class="fw-bolder">68.2%</span><span> more earnings than last month.</span> -->
                  </p>
                </div>
                <div class="col-12">
                  <table id="animations-example-3" class="charts-css column show-labels hide-data data-spacing-5 show-primary-axis">
                    <caption> Animation Example #3 </caption>
                    <thead>
                      <tr>
                        <th scope="col"> Year </th>
                        <th scope="col"> Progress </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"> 2016 </th>
                        <td style="--size:0.2;"><span class="data"> 100 </span></td>
                      </tr>
                      <tr>
                        <th scope="row"> 2017 </th>
                        <td style="--size:0.8;"><span class="data"> 80 </span></td>
                      </tr>
                      <tr>
                        <th scope="row"> 2018 </th>
                        <td style="--size:0.6;"><span class="data"> 60 </span></td>
                      </tr>
                      <tr>
                        <th scope="row"> 2019 </th>
                        <td style="--size:0.4;"><span class="data"> 40 </span></td>
                      </tr>
                      <tr>
                        <th scope="row"> 2020 </th>
                        <td style="--size:0.2;"><span class="data"> 20 </span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div> --}}

  <!-- <div class="row match-height">
  <section>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"></h4>
        </div>
          <div class="card-body">
            <form action="" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-5 offset-1">
                        <label for="" class="mt-1">From</label>
                        <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date"  />
                    </div>
                    <div class="col-md-5">
                        <label for="" class="mt-1">To</label>
                        <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date"  />
                    </div>
                    <div class="col-md-5 offset-1">
                        <label for="" class="mt-1">Type</label>
                        <select class="form-select" name="type">
                            <option value="all_clients">All Clients</option>
                            <option value="per_clients">Personal Clients</option>
                            <option value="gold_clients">Gold Clients</option>
                        </select>
                    </div>
                </div>
               <div class="col-md-4 offset-5 mt-1">
                    <a href="/admin/barchart" class="btn btn-success">Search</a> -->
                     <!--<button type="submit" class="btn btn-success">Search</button> -->
                 <!-- </div>
            </form>
        </div>
    </div>
</section> -->


<!-- <a href="/admin/barchart" class="btn btn-success">Graphs Clients </a>  -->
     <!-- <div class="col-lg-8 col-12">
    <div class="card card-company-table">
       <div id="chartContainer" class="chart mt-5"></div>
         <div class="card-body p-0"> -->
          <!-- <div class="table-responsive">
            <table class="table">
               <thead>
                 <tr>
                   <th>Company</th>
                   <th>Category</th>
                   <th>Views</th>
                   <th>Revenue</th>
                   <th>Sales</th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <td>
                     <div class="d-flex align-items-center">
                       <div class="avatar rounded">
                         <div class="avatar-content">
                           <img src="{{asset('images/icons/toolbox.svg')}}" alt="Toolbar svg" />
                         </div>
                       </div>
                    <div>
                         <div class="fw-bolder">Dixons</div>
                         <div class="font-small-2 text-muted">meguc@ruj.io</div>
                       </div>
                     </div>
                   </td>
                   <td>
                     <div class="d-flex align-items-center">
                       <div class="avatar bg-light-primary me-1">
                         <div class="avatar-content">
                           <i data-feather="monitor" class="font-medium-3"></i>
                         </div>
                       </div>
                       <span>Technology</span>
                     </div>
                   </td>
                  <td class="text-nowrap">
                     <div class="d-flex flex-column">
                       <span class="fw-bolder mb-25">23.4k</span>
                       <span class="font-small-2 text-muted">in 24 hours</span>
                     </div>
                   </td>
                   <td>$891.2</td>
                   <td>
                     <div class="d-flex align-items-center">
                       <span class="fw-bolder me-1">68%</span>
                       <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                     </div>
                   </td>
                 </tr>
                 <tr>
                   <td>
                     <div class="d-flex align-items-center">
                       <div class="avatar rounded">
                         <div class="avatar-content">
                           <img src="{{asset('images/icons/parachute.svg')}}" alt="Parachute svg" />
                         </div>
                       </div>
                       <div>
                         <div class="fw-bolder">Motels</div>
                         <div class="font-small-2 text-muted">vecav@hodzi.co.uk</div>
                       </div>
                     </div>
                   </td>
                   <td>
                    <div class="d-flex align-items-center">
                       <div class="avatar bg-light-success me-1">
                         <div class="avatar-content">
                          <i data-feather="coffee" class="font-medium-3"></i>
                         </div>
                       </div>
                       <span>Grocery</span>
                     </div>
                   </td>
                  <td class="text-nowrap">
                     <div class="d-flex flex-column">
                       <span class="fw-bolder mb-25">78k</span>
                       <span class="font-small-2 text-muted">in 2 days</span>
                    </div>
                  </td>
                   <td>$668.51</td>
                   <td>
                   <div class="d-flex align-items-center">
                       <span class="fw-bolder me-1">97%</span>
                       <i data-feather="trending-up" class="text-success font-medium-1"></i>
                     </div>
                   </td>
               </tr>
                <tr>
                  <td>
                     <div class="d-flex align-items-center">
                       <div class="avatar rounded">
                         <div class="avatar-content">
                           <img src="{{asset('images/icons/brush.svg')}}" alt="Brush svg" />
                         </div>
                       </div>
                       <div>
                         <div class="fw-bolder">Zipcar</div>
                         <div class="font-small-2 text-muted">davcilse@is.gov</div>
                       </div>
                     </div>
                   </td>
                   <td>
                     <div class="d-flex align-items-center">
                       <div class="avatar bg-light-warning me-1">
                         <div class="avatar-content">
                           <i data-feather="watch" class="font-medium-3"></i>
                         </div>
                       </div>
                       <span>Fashion</span>
                     </div>
                   </td>
                  <td class="text-nowrap">
                    <div class="d-flex flex-column">
                      <span class="fw-bolder mb-25">162</span>
                      <span class="font-small-2 text-muted">in 5 days</span>
                    </div>
                  </td>
                  <td>$522.29</td>
                   <td>
                    <div class="d-flex align-items-center">
                      <span class="fw-bolder me-1">62%</span>
                       <i data-feather="trending-up" class="text-success font-medium-1"></i>
                     </div>
                   </td>
                 </tr>
                 <tr>
                   <td>
                     <div class="d-flex align-items-center">
                       <div class="avatar rounded">
                         <div class="avatar-content">
                           <img src="{{asset('images/icons/star.svg')}}" alt="Star svg" />
                         </div>
                       </div>
                       <div>
                         <div class="fw-bolder">Owning</div>
                         <div class="font-small-2 text-muted">us@cuhil.gov</div>
                      </div>
                     </div>
                   </td>
                  <td>
                    <div class="d-flex align-items-center">
                       <div class="avatar bg-light-primary me-1">
                         <div class="avatar-content">
                          <i data-feather="monitor" class="font-medium-3"></i>
                         </div>
                       </div>
                       <span>Technology</span>
                     </div>
                  </td>
                   <td class="text-nowrap">
                     <div class="d-flex flex-column">
                       <span class="fw-bolder mb-25">214</span>
                       <span class="font-small-2 text-muted">in 24 hours</span>
                     </div>
                   </td>
                   <td>$291.01</td>
                   <td>
                     <div class="d-flex align-items-center">
                       <span class="fw-bolder me-1">88%</span>
                       <i data-feather="trending-up" class="text-success font-medium-1"></i>
                     </div>
                   </td>
                 </tr>
                 <tr>
                   <td>
                     <div class="d-flex align-items-center">
                       <div class="avatar rounded">
                         <div class="avatar-content">
                           <img src="{{asset('images/icons/book.svg')}}" alt="Book svg" />
                         </div>
                       </div>
                       <div>
                        <div class="fw-bolder">Cafés</div>
                         <div class="font-small-2 text-muted">pudais@jife.com</div>
                       </div>
                     </div>
                 </td>
                   <td>
                     <div class="d-flex align-items-center">
                       <div class="avatar bg-light-success me-1">
                         <div class="avatar-content">
                           <i data-feather="coffee" class="font-medium-3"></i>
                         </div>
                       </div>
                   <span>Grocery</span>
                     </div>
                   </td>
                   <td class="text-nowrap">
                     <div class="d-flex flex-column">
                      <span class="fw-bolder mb-25">208</span>
                       <span class="font-small-2 text-muted">in 1 week</span>
                     </div>
                   </td>
                   <td>$783.93</td>
                   <td>
                     <div class="d-flex align-items-center">
                       <span class="fw-bolder me-1">16%</span>
                       <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                     </div>
                   </td>
                 </tr>
                 <tr>
                   <td>
                     <div class="d-flex align-items-center">
                       <div class="avatar rounded">
                         <div class="avatar-content">
                           <img src="{{asset('images/icons/rocket.svg')}}" alt="Rocket svg" />
                         </div>
                       </div>
                       <div>
                         <div class="fw-bolder">Kmart</div>
                         <div class="font-small-2 text-muted">bipri@cawiw.com</div>
                       </div>
                     </div>
                   </td>
                   <td>
                     <div class="d-flex align-items-center">
                       <div class="avatar bg-light-warning me-1">
                         <div class="avatar-content">
                           <i data-feather="watch" class="font-medium-3"></i>
                        </div>
                       </div>
                      <span>Fashion</span>
                     </div>
                   </td>
                   <td class="text-nowrap">
                     <div class="d-flex flex-column">
                      <span class="fw-bolder mb-25">990</span>
                       <span class="font-small-2 text-muted">in 1 month</span>
                     </div>
                   </td>
                   <td>$780.05</td>
                  <td>
                     <div class="d-flex align-items-center">
                      <span class="fw-bolder me-1">78%</span>
                      <i data-feather="trending-up" class="text-success font-medium-1"></i>
                     </div>
                 </td>
                </tr>
               <tr>
                  <td>
                     <div class="d-flex align-items-center">
                       <div class="avatar rounded">
                      <div class="avatar-content">
                           <img src="{{asset('images/icons/speaker.svg')}}" alt="Speaker svg" />
                       </div>
                      </div>
                       <div>
                         <div class="fw-bolder">Payers</div>
                       <div class="font-small-2 text-muted">luk@izug.io</div>
                      </div>
                    </div>
                   </td>
                   <td>
                     <div class="d-flex align-items-center">
                       <div class="avatar bg-light-warning me-1">
                       <div class="avatar-content">
                          <i data-feather="watch" class="font-medium-3"></i>
                         </div>
                       </div>
                       <span>Fashion</span>
                    </div>
                   </td>
                   <td class="text-nowrap">
                     <div class="d-flex flex-column">
                       <span class="fw-bolder mb-25">12.9k</span>
                       <span class="font-small-2 text-muted">in 12 hours</span>
                     </div>
                   </td>
                   <td>$531.49</td>
                   <td>
                     <div class="d-flex align-items-center">
                       <span class="fw-bolder me-1">42%</span>
                       <i data-feather="trending-up" class="text-success font-medium-1"></i>
                     </div>
                   </td>
                </tr>
               </tbody>
            </table>
           </div>
         </div>
       </div>
     </div>
     Company Table Card
    Transaction Card
      <div class="col-lg-4 col-md-6 col-12">
       <div class="card card-transaction">
         <div class="card-header">
           <h4 class="card-title">Transactions</h4>
           <div class="dropdown chart-dropdown">
             <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-bs-toggle="dropdown"></i>
             <div class="dropdown-menu dropdown-menu-end">
               <a class="dropdown-item" href="#">Last 28 Days</a>
               <a class="dropdown-item" href="#">Last Month</a>
               <a class="dropdown-item" href="#">Last Year</a>
             </div>
           </div>
         </div>
      <div class="card-body">
           <div class="transaction-item">
             <div class="d-flex">
               <div class="avatar bg-light-primary rounded float-start">
                 <div class="avatar-content">
                  <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                 </div>
               </div>
               <div class="transaction-percentage">
                 <h6 class="transaction-title">Wallet</h6>
                 <small>Starbucks</small>
               </div>
             </div>
             <div class="fw-bolder text-danger">- $74</div>
         </div>
           <div class="transaction-item">
             <div class="d-flex">
               <div class="avatar bg-light-success rounded float-start">
                 <div class="avatar-content">
                   <i data-feather="check" class="avatar-icon font-medium-3"></i>
                 </div>
               </div>
              <div class="transaction-percentage">
                 <h6 class="transaction-title">Bank Transfer</h6>
              <small>Add Money</small>
              </div>
            </div>
             <div class="fw-bolder text-success">+ $480</div>
           </div>
           <div class="transaction-item">
             <div class="d-flex">
               <div class="avatar bg-light-danger rounded float-start">
                 <div class="avatar-content">
                   <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                 </div>
               </div>
              <div class="transaction-percentage">
                 <h6 class="transaction-title">Paypal</h6>
                 <small>Add Money</small>
               </div>
             </div>
             <div class="fw-bolder text-success">+ $590</div>
           </div>
           <div class="transaction-item">
             <div class="d-flex">
               <div class="avatar bg-light-warning rounded float-start">
                 <div class="avatar-content">
                   <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
              </div>
             </div>
              <div class="transaction-percentage">
                <h6 class="transaction-title">Mastercard</h6>
                <small>Ordered Food</small>
               </div>
             </div>
             <div class="fw-bolder text-danger">- $23</div>
           </div>
          <div class="transaction-item">
            <div class="d-flex">
              <div class="avatar bg-light-info rounded float-start">
                 <div class="avatar-content">
                   <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                </div>
               </div>
              <div class="transaction-percentage">
               <h6 class="transaction-title">Transfer</h6>
                 <small>Refund</small>
               </div>
             </div>
            <div class="fw-bolder text-success">+ $98</div>
         </div>
         </div>
       </div> -->
    <!-- </div>
      Transaction Card
     </div>    -->
</section>
@endsection

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
window.onload = function () {
    var userData = <?php echo json_encode($allclient)?>;
    var userData1 = <?php echo json_encode($personalclient)?>;
    var userData2 = <?php echo json_encode($goldclient)?>;
	var chart = new CanvasJS.Chart("chartContainer", {
		title:{
			text: "Seller Graph"
		},
		data: [
		{
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "column",
			dataPoints: [
				{ label: "All Seller", y:userData},
				{ label: "Personal Seller", y: userData1},
				{ label: "Gold seller", y: userData2}

			]
		}
		]
	});
	chart.render();
}
</script>



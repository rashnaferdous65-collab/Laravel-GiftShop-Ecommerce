<h2 class="h5 no-margin-bottom">Dashboard</h2>

<section class="no-padding-top no-padding-bottom">
  <div class="container-fluid">
    <div class="row">
      <!-- Total Clients -->
      <div class="col-md-3 col-sm-6">
        <div class="statistic-block block">
          <div class="progress-details d-flex justify-content-between align-items-end">
            <div class="title">
              <div class="icon"><i class="icon-user-1"></i></div>
              <strong>Total Clients</strong>
            </div>
            <div class="number dashtext-1">{{ $user }}</div>
          </div>
          <div class="progress progress-template">
            <div class="progress-bar progress-bar-template dashbg-1" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>

      <!-- All Products -->
      <div class="col-md-3 col-sm-6">
        <div class="statistic-block block">
          <div class="progress-details d-flex justify-content-between align-items-end">
            <div class="title">
              <div class="icon"><i class="icon-contract"></i></div>
              <strong>All Products</strong>
            </div>
            <div class="number dashtext-2">{{ $product }}</div>
          </div>
          <div class="progress progress-template">
            <div class="progress-bar progress-bar-template dashbg-2" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>

      <!-- Total Orders -->
      <div class="col-md-3 col-sm-6">
        <div class="statistic-block block">
          <div class="progress-details d-flex justify-content-between align-items-end">
            <div class="title">
              <div class="icon"><i class="icon-paper-and-pencil"></i></div>
              <strong>Total Orders</strong>
            </div>
            <div class="number dashtext-3">{{ $order }}</div>
          </div>
          <div class="progress progress-template">
            <div class="progress-bar progress-bar-template dashbg-3" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>

      <!-- Total Delivery -->
      <div class="col-md-3 col-sm-6">
        <div class="statistic-block block">
          <div class="progress-details d-flex justify-content-between align-items-end">
            <div class="title">
              <div class="icon"><i class="icon-writing-whiteboard"></i></div>
              <strong>Total Delivery</strong>
            </div>
            <div class="number dashtext-4">{{ $delivered }}</div>
          </div>
          <div class="progress progress-template">
            <div class="progress-bar progress-bar-template dashbg-4" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Charts Section -->
<section class="no-padding-bottom">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <div class="bar-chart block no-margin-bottom">
          <canvas id="barChartExample1"></canvas>
        </div>
        <div class="bar-chart block">
          <canvas id="barChartExample2"></canvas>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="line-chart block">
          <canvas id="lineChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Users / Stats Section -->
<section class="no-padding-bottom">
  <div class="container-fluid">
    <div class="row">
      <!-- Stats Example -->
      <div class="col-lg-6">
        <div class="stats-2-block block d-flex">
          <div class="stats-2 d-flex">
            <div class="stats-2-arrow low"><i class="fa fa-caret-down"></i></div>
            <div class="stats-2-content">
              <strong class="d-block">5.657</strong>
              <span class="d-block">Standard Scans</span>
              <div class="progress progress-template progress-small">
                <div class="progress-bar progress-bar-template progress-bar-small dashbg-2" role="progressbar" style="width: 60%;"></div>
              </div>
            </div>
          </div>
          <div class="stats-2 d-flex">
            <div class="stats-2-arrow height"><i class="fa fa-caret-up"></i></div>
            <div class="stats-2-content">
              <strong class="d-block">3.1459</strong>
              <span class="d-block">Team Scans</span>
              <div class="progress progress-template progress-small">
                <div class="progress-bar progress-bar-template progress-bar-small dashbg-3" role="progressbar" style="width: 35%;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- More user / stats sections ... -->

    </div>
  </div>
</section>

<!-- Footer -->
<footer class="footer">
  <div class="footer__block block no-margin-bottom">
    <div class="container-fluid text-center">
      <p class="no-margin-bottom">All Rights Reserved By Rashna Ferdous</p>
    </div>
  </div>
</footer>

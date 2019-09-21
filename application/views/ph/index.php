  <div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">pH</a>
        </li>
      </ol>
      <div class="row">
        <div class="col-md-12">

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#chart" role="tab" aria-controls="home" aria-selected="true">Chart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#table" role="tab" aria-controls="profile" aria-selected="false">Table</a>
            </li>
          </ul>

          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="chart" role="tabpanel" aria-labelledby="home-tab">
              <div class="col-md-12" height="80" width="100">
                <canvas id="phChart" class="w-100 h-100"></canvas>
              </div>              
            </div>
            <div class="tab-pane fade" id="table" role="tabpanel" aria-labelledby="profile-tab">
              <div class="table-responsive mt-3">
                <table id="phTable" class="table table-bordered table-striped w-100">
                  <thead>
                    <tr>
                      <th>pH</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>Details</th>
                    </tr>
                  </thead>
                </table>
              </div>              
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

<script src="<?= base_url('assets/js/ph/ph.js') ?>"></script>
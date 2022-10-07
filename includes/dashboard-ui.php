<?php require_once("././auxiliaries.php");?>


<div class="body flex-grow-1 px-3">
<div class="container-lg">
  <div class="row">
    <div class="col-sm-6 col-lg-3">
      <div class="card mb-4 text-white bg-primary">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="fs-4 fw-semibold"><?= $totalNumberOfStudent;?>
                <svg class="icon">
                  <!-- <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use> -->
                </svg></span></div>
            <div>Students</div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
          <canvas class="chart" id="card-chart1" height="70"></canvas>
        </div>
      </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
      <div class="card mb-4 text-white bg-info">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="fs-4 fw-semibold"><?= $totalNumberOfOfficer;?><span class="fs-6 fw-normal">
                <svg class="icon">
                  <!-- <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use> -->
                </svg></span></div>
            <div>Officers</div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
          <canvas class="chart" id="card-chart2" height="70"></canvas>
        </div>
      </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
      <div class="card mb-4 text-white bg-warning">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="fs-4 fw-semibold"><?= $totalNumberOfClearedStudents;?> <span class="fs-6 fw-normal">
                <svg class="icon">
                  <!-- <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use> -->
                </svg></span></div>
            <div>Cleared Studies</div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3" style="height:70px;">
          <canvas class="chart" id="card-chart3" height="70"></canvas>
        </div>
      </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3">
      <div class="card mb-4 text-white bg-danger">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="fs-4 fw-semibold"><?= $totalNumberOfClearedStudents;?> <span class="fs-6 fw-normal">
                <svg class="icon">
                  <!-- <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use> -->
                </svg></span></div>
            <div>Uncleared</div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
          <canvas class="chart" id="card-chart4" height="70"></canvas>
        </div>
      </div>
    </div>
    <!-- /.col-->
  </div>
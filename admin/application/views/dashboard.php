<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('log');?>"></div>
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg align-self-center round-info"><i class="fa fa-users"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0 font-light"><?php echo $tot_member;?></h3>
                        <h5 class="text-muted m-b-0">Total Member</h5></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg align-self-center round-warning"><i class="mdi mdi-factory"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0 font-lgiht"><?php echo $tot_perusahaan;?></h3>
                        <h5 class="text-muted m-b-0">Total Perusahaan</h5></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="round round-lg align-self-center round-primary"><i class="fa fa-file-text-o"></i></div>
                    <div class="m-l-10 align-self-center">
                        <h3 class="m-b-0 font-lgiht"><?php echo $tot_lowongan;?></h3>
                        <h5 class="text-muted m-b-0">Total Lowongan</h5></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- Row -->
<div class="row">
    <div class="col-lg-4 col-md-12">
        <div class="card card-inverse card-primary">
            <div class="card-body">
                <div class="d-flex">
                    <div class="m-r-20 align-self-center">
                        <h1 class="text-white"><i class="ti-pie-chart"></i></h1></div>
                    <div>
                        <h3 class="card-title">Bandwidth usage</h3>
                        <h6 class="card-subtitle">March  2017</h6> </div>
                </div>
                <div class="row">
                    <div class="col-4 align-self-center">
                        <h2 class="font-light text-white">50 GB</h2>
                    </div>
                    <div class="col-8 p-t-10 p-b-20 align-self-center">
                        <div class="usage chartist-chart" style="height:65px"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card card-inverse card-success">
            <div class="card-body">
                <div class="d-flex">
                    <div class="m-r-20 align-self-center">
                        <h1 class="text-white"><i class="icon-cloud-download"></i></h1></div>
                    <div>
                        <h3 class="card-title">Download count</h3>
                        <h6 class="card-subtitle">March  2017</h6> </div>
                </div>
                <div class="row">
                    <div class="col-4 align-self-center">
                        <h2 class="font-light text-white">35487</h2>
                    </div>
                    <div class="col-8 p-t-10 p-b-20 text-right">
                        <div class="spark-count" style="height:65px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Our Visitors</h3>
                <h6 class="card-subtitle">Different Devices Used to Visit</h6>
                <div id="visitor" style="height:260px; width:100%;"></div>
            </div>
            <div>
                <hr class="m-t-0 m-b-0">
            </div>
            <div class="card-body text-center ">
                <ul class="list-inline m-b-0">
                    <li>
                        <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10 "></i>Mobile</h6> </li>
                    <li>
                        <h6 class="text-muted  text-primary"><i class="fa fa-circle font-10 m-r-10"></i>Desktop</h6> </li>
                    <li>
                        <h6 class="text-muted  text-success"><i class="fa fa-circle font-10 m-r-10"></i>Tablet</h6> </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Current Visitors</h4>
                <h6 class="card-subtitle">Different Devices Used to Visit</h6>
                <div id="usa" style="height: 290px"></div>
                <div class="text-center">
                    <ul class="list-inline">
                        <li>
                            <h6 class="text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Valley</h6> </li>
                        <li>
                            <h6 class="text-info"><i class="fa fa-circle font-10 m-r-10"></i>Newyork</h6> </li>
                        <li>
                            <h6 class="text-danger"><i class="fa fa-circle font-10 m-r-10"></i>Kansas</h6> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</div>
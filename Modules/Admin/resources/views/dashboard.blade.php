@include('admin::common.header')
@include('admin::common.sidebar')

<main>

	<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                    @if (session('success'))
                        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                   
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                	
                    <div class="small-box ">
                    	<a href="javascript:;">
                        <div class="inner">
                        	<div class="icon1">
                        		<i class="fa-solid fa-chart-column"></i>
                        	</div>
                            <h3>$236.18k</h3>
                            <p>Total Revenue</p>
                        </div>
                        <div class="icon"> <i class="ion ion-bag"></i> </div> 
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </a>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box ">
                    	<a href="javascript:;">
                        <div class="inner">
                        	<div class="icon1">
                        		<i class="fa-solid fa-cube"></i>
                        	</div>
                            <h3>13,461</h3>
                            <p>Total Orders</p>
                        </div>
                        <div class="icon"> <i class="ion ion-bag"></i> </div> 
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </a>
                    </div>
                  
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box ">
                    	<a href="javascript:;">
                        <div class="inner">
                        	<div class="icon1">
                        		<i class="fa-solid fa-truck"></i>
                        	</div>
                            <h3>13,461</h3>
                            <p>Delivered</p>
                        </div>
                        <div class="icon"> <i class="ion ion-bag"></i> </div> 
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </a>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-6">
                    <div class="small-box ">
                        <div class="inner">
                            <h3>65</h3>
                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon"> <i class="ion ion-pie-graph"></i> </div> 
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div> -->
                
            </div>
        </div>
    </section>
</div>
	
</main>
<script>
    window.onload = function() {
        const alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.display = 'none';
            }, 10000); // 10 seconds
        }
    };
</script> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@include('admin::common.footer')




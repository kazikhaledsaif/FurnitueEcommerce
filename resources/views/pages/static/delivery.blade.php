@extends('layouts.master')

@section('title')
Delivery Policy
@stop

@section('content')

    <!--=============================================
    =            Breadcrumb Area         =
    =============================================-->
    
    <div class="breadcrumb-area breadcrumb-bg pt-85 pb-85 mb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="{{ route('page.index') }}">Home</a> <span class="separator">/</span></li>
                            <li class="active">About us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--=====  End of Breadcrumb Area  ======-->


        <!-- About Section Start -->
    <div class="about-section mb-80">
        <div class="container">
            
            <div class="row row-30">
                
                 
                
                <!-- About Content -->
                <div class="about-content col-lg-12">
                    <div class="row">
                        <div class="col-12 mb-50">
                            <h1>Delivery <span>Policy</span></h1>
                            <p>Our customers within 30 Miles or less from our warehouse is forty eight hours after the order is placed. <br>
                            For customer 31 Miles or more is two weeks. Third party carrier is available for faster delivery and premium cost.
                            </p>
                        </div>

                        

                    </div>
                </div>
                
            </div>
             

        </div>
    </div>
    <!-- About Section End -->

 

@endsection
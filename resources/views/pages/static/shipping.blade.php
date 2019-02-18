@extends('layouts.master')

@section('title', 'Shipping Policy')
 

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
                            <li class="active">Shipping</li>
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
                            <h1>Standard <span>Shipping</span></h1>
                            <p>Smaller items are shipped via standard ground service. In-stock items will generally arrive in 3-7 business days.

                            </p>
                            <p><span>Please note: </span> Items ordered at the same time may not be delivered together. Allow three additional days if your order includes personalized items.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-50">
                            <h1>Returns & <span>Exchanges</span></h1>
                             
                            <p>If you're not happy, we're not happy. That's where our "Love It or Send It Back" policy comes in. If you're dissatisfied with your Ballard purchase for any reason, you can return it within 90 days of the ship date for an exchange or full refund (excluding Shipping & Processing fees).
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
                
            </div>
             

        </div>
    </div>
    <!-- About Section End -->

 

@endsection
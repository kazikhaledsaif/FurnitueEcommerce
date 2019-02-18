@extends('layouts.master')

@section('title')
Privacy Policy
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
                            <li class="active">Privacy Policy </li>
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
            <div class="row">
                <div class="col-12 mb-50">
                    <h1>PRIVACY POLICY   </span></h1>
                </div>
            </div>
            <div class="row about-content">
                <p>Privacy and subscription notice: We value our relationship with you and will never sell or share your email address with a third party for commercial use. If you feel like this information is not relevant or helpful to you, please feel free to click the unsubscribe link below.
                     <br><br>  
                </p>
            </div>
 
			
		</div>

	</div>
	<!-- About Section End -->

@endsection
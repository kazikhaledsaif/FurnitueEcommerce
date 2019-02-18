@extends('layouts.master')

@section('title')
Refund And Exchanges
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
                            <li class="active">Refund And Exchanges</li>
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
            <div class="row about-content">
                <div class="col-12 mb-50">
                    <h1>REFUND AND <span>EXCHANGES</span></h1>
                </div>
            </div>
            <div class="row about-content">
                <p>Pre-Approval for credit on returned or exchanged product, including missing, wrong, or damaged:
                    In order to expedite the approval of your return or exchange and ensure timely application of credit, please complete the online form and submit.  This is the fastest and preferred way to receive your authorization.  Separately you may download the CREDIT MEMO AUTHORIZATION (CMA) form, complete, and fax back to the Furnitureville Texas Inc, Inc office for pre-approval and processing.  If product is damaged, please provide digital photos of damage.  Once approved, the GTI office will provide you with an authorization form that you or your staff can use to return product for store credit.  Once returned product has been received by GTI staff along with the approved CMA, your credit will normally be processed within two business days.
                     <br><br>  
                </p>
            </div>

            <div class="row">
                <div class="col-12 mb-50">
                    <h1>EXCHANGES  Policy</span></h1>
                </div>
            </div>
            <div class="row about-content">
                <p>No merchandise returns will be accepted without prior approval from the Furnitureville Texas Inc office.  Damage due to customers misuse, abuse or regular wear and tear is not the responsibility of GTI.  There are no returns or exchanges on new merchandise in good condition.  There are no returns or exchanges on "Close Outs".  Claims for defective merchandise or missing parts must be made within 48 hours from time of delivery.  Exchange for manufacturers’ defects is 90 days from date of delivery.  All other requests are handled on a case by case basis after inspection to determine amount of damage, responsibility for damage and availability of replacements.  A re-stocking fee of 15% of the original invoice will apply for all return items deemed not to be shipped damaged or incorrectly.  All returns and exchanges are for GTI store credit.  If you have a past due balance, credits will be immediately applied to your past due balance.  Credit is normally processed within two business days of returned product being received.  However, if you did not provide your original invoice, credit processing may be significantly delayed. <br><br>  
                </p>
            </div>
			
		</div>

	</div>
	<!-- About Section End -->

@endsection
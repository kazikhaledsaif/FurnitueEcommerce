@extends('layouts.master')

@section('title')Contact us @stop

@section('content')

    <!--=============================================
    =            Breadcrumb Area         =
    =============================================-->

    <div class="breadcrumb-area breadcrumb-bg pt-85 pb-85 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="{{ route('page.index') }}">Home</a> <span class="separator">/</span></li>
                            <li class="active">Contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of Breadcrumb Area  ======-->


    <!--=============================================
    =            Contact page content         =
    =============================================-->

    <div class="page-content mb-45">

        <!--=============================================
        =            google map container         =
        =============================================-->

        <div class="google-map-container mb-80">
            <div id="google-map"></div>
        </div>

        <!--=====  End of google map container  ======-->

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 mb-sm-70">
                    <!--=======  contact page side content  =======-->

                    <div class="contact-page-side-content">
                        <h3 class="contact-page-title">Contact Us</h3>

                        <!--=======  single contact block  =======-->

                        <div class="single-contact-block">
                            <h4><img src="{{ asset('frontend/images/icons/contact-icon1.png') }}" alt=""> Address</h4>
                            <p>845 I-35E, DeSoto, TX-75115, USA </p>
                        </div>

                        <!--=======  End of single contact block  =======-->

                        <!--=======  single contact block  =======-->

                        <div class="single-contact-block">
                            <h4><img src="{{ asset('frontend/images/icons/contact-icon2.png') }}" alt=""> Phone</h4>
                            <p>Mobile: +1 972-230-0511</p>
                            <p>Hotline: +1 972-230-0511</p>
                        </div>

                        <!--=======  End of single contact block  =======-->

                        <!--=======  single contact block  =======-->

                        <div class="single-contact-block">
                            <h4><img src="{{ asset('frontend/images/icons/contact-icon3.png') }}" alt=""> Email</h4>
                            <p>admin@furniturevilletexas.com</p>
                            <p>lithiuminc99@gmail.com</p>
                        </div>

                        <!--=======  End of single contact block  =======-->
                    </div>

                    <!--=======  End of contact page side content  =======-->

                </div>
                <div class="col-lg-9 col-md-8 pl-100 pl-sm-15">
                    <!--=======  contact form content  =======-->

                    <div class="contact-form-content">
                        <h3 class="contact-page-title">Tell Us Your Message</h3>

                        <div class="contact-form">
                            <form  id="contact-form" action="{{  route('contact.store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Your Name <span class="required">*</span></label>
                                    <input type="text" name="name" id="customername" required>
                                </div>
                                <div class="form-group">
                                    <label>Your Email <span class="required">*</span></label>
                                    <input type="email" name="email" id="customerEmail" required>
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" name="subject" id="contactSubject">
                                </div>
                                <div class="form-group">
                                    <label>Your Message</label>
                                    <textarea name="message" id="contactMessage" ></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" value="submit" id="submit" class="pataku-btn" name="submit">send</button>
                                </div>
                            </form>
                        </div>
                        <p class="form-messege pt-10 pb-10 mt-10 mb-10"></p>
                    </div>

                    <!--=======  End of contact form content =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of Contact page content  ======-->

    <script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyCiqiV3wRFIWQnwZkBb95XbwNYC1o4yXDQ"></script>

    <script>
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 12,

                scrollwheel: false,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(33.458150, -94.062600), // New York

                // How you would like to style the map. 
                // This is where you would paste any style found on

                styles: [{
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#e9e9e9"
                    },
                        {
                            "lightness": 17
                        }
                    ]
                },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#f5f5f5"
                        },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#ffffff"
                        },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                            "color": "#ffffff"
                        },
                            {
                                "lightness": 29
                            },
                            {
                                "weight": 0.2
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#ffffff"
                        },
                            {
                                "lightness": 18
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#ffffff"
                        },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#f5f5f5"
                        },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#dedede"
                        },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [{
                            "visibility": "on"
                        },
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "saturation": 36
                        },
                            {
                                "color": "#333333"
                            },
                            {
                                "lightness": 40
                            }
                        ]
                    },
                    {
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#f2f2f2"
                        },
                            {
                                "lightness": 19
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#fefefe"
                        },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                            "color": "#fefefe"
                        },
                            {
                                "lightness": 17
                            },
                            {
                                "weight": 1.2
                            }
                        ]
                    }
                ]
            };

            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('google-map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(33.458150, -94.062600),
                map: map,
                title: 'Furniture ville texas',
                icon: "{{ asset('frontend/images/icons/map-marker.png') }} ",
                animation: google.maps.Animation.BOUNCE
            });
            marker.setMap(map);
        }
    </script>

@endsection
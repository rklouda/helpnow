
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartApp1003 - Secure 1003 Full Application</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://www.secure-apps.smartapp1003.com/css/flatty.bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="https://www.secure-apps.smartapp1003.com/css/drawer.css" rel="stylesheet"> -->
    <!-- <link href="https://www.secure-apps.smartapp1003.com/css/animate.min.css" rel="stylesheet"> -->
    <!-- <link href="https://www.secure-apps.smartapp1003.com/css/step-nav.css" rel="stylesheet"> -->
    <link href="https://www.secure-apps.smartapp1003.com/css/app.css?c=2017041505" rel="stylesheet">

    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.min.css" rel="stylesheet" type="text/css">
    <link href="//gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet" type="text/css">
    
    <link href="/lib/jquery-ui-custom-datepicker/jquery-ui.min.css" rel="stylesheet" type="text/css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
        
    <style>
        #content h3{
            color: #5bc0de !important;
        }
        .btn-info{
            background-color: #5bc0de !important;
        }
        #sub-section-nav.nav-tabs > li.active > a, .nav-tabs > li > a:hover{
            color: #5bc0de !important;
        }
        #sub-section-nav.nav-tabs > li > a::after{
            background-color: #5bc0de !important;
        }
        
        li.active .validatedIconAccent, li:hover .validatedIconAccent{
            color: #5bc0de !important;
        }
        
        .helpIcon{
            color: #5bc0de;
        }
        
        .ui-widget-header{
            background: #5bc0de !important;
            border-color: #5bc0de !important;
        }
    </style>
</head>
<body>
<div id="disconnect-overlay">
    <div class="col-xs-12 load-container">
        <div class="text-center">
            <div class="loader"></div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="app-header" class="container-fluid">
    <div class="row">
        <section class="app-header col-md-12 col-xs-12">
            <div class="container">
                <div class="col-md-5 col-xs-12">
    <div class="row">
        <div class="logo text-center animated zoomInDown">
            <a href="http://afcmortgagegroup.net"><img id="main_logo" style="max-height: 100px; max-width: 100%;"  src=""/></a>
        </div>
    </div>
</div>
<!-- if($profile->slogan) -->
<div class="col-md-3 col-xs-12">
<!--
    <div class="logo-alternate"></div>
    <div class="slogan"></div> -->
    <img src="/img/secure.jpg" style="width: 180; display: block; margin: 0 auto;" class="hidden-xs hidden-sm"/>
    
    </div>
<!-- endif -->
<div class="col-md-4 col-xs-12 company">
    
    
            <div class="row">
            <div class="col-md-9">
    
    <div class="clearAfterFirstMobileNav">
                <div class="name" style="font-size: 12px;"><strong>AFC Mortgage Group ,LLC  </strong></div>
                        <address class="address popover-element" data-trigger="hover" data-content="Click for Map" rel="popover" data-placement="bottom">
            11 Red Barn Rd
            Trumbull, CT, 06611
        </address>
            </div>
    
    <div class="phone"><a href="tel:12034529899"  class="popover-element" data-trigger="hover" data-content="Click for Call" rel="popover" data-placement="bottom"> (203) 452-9899 </a></div>
    <div class="nmls">NMLS: 2801</div>
    
        
        </div>
            <div class="col-md-3" style="padding-bottom: 10px;">
                <img src="" style="max-height: 150px;" class="img-responsive" />
            </div>
        </div>
    
    </div>
<div class="clearfix"></div>
<div id="address-modal" class="modal" data-show="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Lenderhomepage</h4>
            </div>
            <div class="modal-body">
                <div id="address-map"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.3/handlebars.min.js"></script>
<script>
var def_coords = {'lat' : 39.7392, 'lng': -104.9842};
var map;
var infowindow;
var geocoder;
var region = 'us';
var company = {};
var radius = '36.95';
var markers = [];
var infowindows = [];
jQuery(function(){
    //instantiate modal programatically to control later
    $('#address-modal').modal({show: false})

    $('.popover-element').popover();

    $('.app-header address').on('click', function(){
        company.address = $(this).text();
        company.phone = $(".phone").text()
        company.url = $('.name a').prop('href');
        company.name = $('.name a').text();
        $('#address-modal').modal('show');
    })

    $('#address-modal').on('shown.bs.modal', function(){
        $('#address-map').css({
            height: '500px'
        })
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(def_coords["lat"], def_coords["lng"]);
        var options = {
            zoom: 15,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP

        };

        map = new google.maps.Map(document.getElementById("address-map"), options);
        infowindow = new google.maps.InfoWindow( { content: '' });

        codeAddress(company.address);
    })

    $('#address-modal').on('hidden.bs.modal', function(){
        //todo, hide map
    })

    function codeAddress(address) {

        geocoder.geocode( {'address': address, 'region': region }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {

                map.setCenter(results[0].geometry.location);
                map.setOptions({ maxZoom: 15})
                var point = new google.maps.LatLng(results[0].geometry.location.G+','+results[0].geometry.location.K)
                var marker =  createMarker(point, company.url, company.phone, company.address, company.name);
                markers.push(marker);

                infowindow.open(map, marker);

                fullBounds.extend(point);
                map.fitBounds(fullBounds);
                map.setOptions({ maxZoom: 15})
                map.setCenter();
            } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                alert("Address not found/invalid.");
            } else { //uncommon error, probably used up quota
                alert("Geocoding failed for following reason: " + status);
            }
        });
    }

    function createMarker(point, url, phone, address, name){
        var marker = new google.maps.Marker({
            position: point,
            map: map
        });


        var source   = $("#infowindow-template").html();
        var template = Handlebars.compile(source);
        var html = template({
            address: address,
            name: name,
            phone: phone,
            url: url,
            directions: "https://www.google.com/maps?saddr=" + address + "&daddr=" + address
        });

        infowindow = new google.maps.InfoWindow({
            content: html
        });

        google.maps.event.addListener(marker, 'click', function() {
            map.setZoom(15); //change 15 to as close as you want the zoom level to go when you click on a marker
            map.setCenter(marker.getPosition());
            infowindow.setContent(html);
            infowindow.open(map, marker);
        });

        return marker;
    }
    
    var mainLogo = $('#main_logo');
    mainLogo.on('load', function(){
        var mainLogoHeight = $('#main_logo').height();
        if($(window).width() > 768 && mainLogoHeight < 90) {
            var newValue = (90 - mainLogoHeight) / 2;
            $('#main_logo').css('margin-top', newValue+'px');
        }
    });
});
</script>
<script id="infowindow-template" type="text/x-handlebars-template">
    <div style="max-width:250px;">
        <strong>{{name}}</strong> <br/><br/>
        {{address}}<br/>
        <a  href="tel:{{phone}}"> {{phone}} </a><br/><br/>
    </div>
    <hr/>
    <div style="max-width:300px;padding-top:15px; text-center;">
        <a href="{{directions}}"> Get Directions </a>
    </div>
</script>            </div>
        </section>
    </div>
</div>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" id="main-section-nav">
      </ul>
            <ul class="nav navbar-nav" style="margin-left: 25px;">
          <li><a href="/app/documents" onclick="app.fetchPageByID('documents'); return false;"><i class="fa fa-cloud-upload" style="color: #5bc0de;"></i> Document Uploader</a></li>
      </ul>
            <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Logged as Nick Blake <span class="caret"></span></a>
          <ul class="dropdown-menu">
                        <li><a href="/app/dashboard">Applications</a></li>
              
            <li><a href="/app/export" onclick="app.fetchPageByID('export'); return false;">Export</a></li>
            <li role="separator" class="divider"></li>
            
                        <li><a href="/auth/logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="row">
    <div id="content" class="container" >
                <div style="padding: 10px;">
        <!--
            <ul class="nav nav-pills" id="sub-section-nav">
            </ul> -->
            <ul class="nav nav-tabs" id="sub-section-nav">
            </ul>
        </div>
            
        <div class="padding-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <section class="app-content">
                        <div class="col-xs-12" id="content-holder">
                                                            
                                                                                </div>
                    </section>
                </div>
            </div>
        </div>
        
                <div class="alert alert-danger internetconnectivity" style="margin: 0 20px; display: none;">
            Failing to properly save the data, leaving this page will result in loss of data entered. Please attempt to improve your internet connectivity and then press "Save &amp; Continue" again.
        </div>
        
        <section class="app-nav-content" style="padding: 20px;">
                            <div class="row">

    
            <div class="col-md-2 col-md-push-1 col-xs-12 btn btn-default btn-previous btn-lg  hidden-sm hidden-xs">
            <i class="fa fa-angle-left"></i>&nbsp;Back
        </div>
        <div class="col-md-2 col-md-push-1 col-xs-6 col-sm-6 hidden-md hidden-lg">
            <a href="" class="btn-previous" style="color: black; text-decoration: underline;"><i class="fa fa-angle-left"></i>&nbsp;Back</a>
        </div>
        <div class="col-md-2 col-md-offset-3 col-xs-6 col-sm-6 customButtonHolder  hidden-sm hidden-xs">
        </div>
        <div class="col-md-2 col-md-offset-3 col-xs-6 col-sm-6 customButtonHolder hidden-md hidden-lg" style="margin-top: -11px; text-align: right; ">
        </div>
        <div class="col-md-2 col-md-offset-2 col-xs-12 hidden-sm hidden-xs">
            <div class=" btn btn-info btn-next btn-lg" data-loading-text="<i class='icon-spinner icon-spin icon-large'></i> Saving...">
            Save &amp; Continue <i class="fa fa-angle-right"></i>
            </div>
        </div>
        <div class="col-md-2 col-md-offset-2 col-xs-12 btn btn-info btn-next btn-lg hidden-md hidden-lg" data-loading-text="<i class='icon-spinner icon-spin icon-large'></i> Saving...">
            Save &amp; Continue <i class="fa fa-angle-right"></i>
        </div>
    </div>                    </section>
                
        <div class="row">
    <img src="/img/secure.jpg" style="width: 180; display: block; margin: 0 auto;" class="hidden-md hidden-lg"/>
</div>
    </div>
    
    <div style="clear: both;"></div>
    
    
</div>


<footer class="footer">
    <div class="container">
        <div class="Copyright">
                        Copyright 2017 AFC Mortgage Group ,LLC . All rights reserved. <br>
    	    <a style="color: #5bc0de;" href="http://www.nmlsconsumeraccess.org/" target="_blank">http://www.nmlsconsumeraccess.org/ </a>
    	        	</div>
    </div>
</footer>

<!-- Scripts -->
<script type="text/javascript">
    var application_id = 35061;
    var showBestPhone = true;

    // <![CDATA[
        var appData = {"_ACTIVE":"finish","_PAGE_MISSING_INPUT_":[{"id":"start","title":"Start","link":"\/app\/start"},{"id":"borrowersInfo","title":"Borrower Information","link":"\/app\/borrower\/primary\/information"},{"id":"borrowersAddress","title":"Borrower Address","link":"\/app\/borrower\/primary\/address"},{"id":"borrowersEmploymentHistory","title":"Borrower's Employment History","link":"\/app\/borrower\/primary\/employment"},{"id":"borrowersEmploymentHistory","title":"Employment History (1)","link":"\/app\/borrower\/primary\/employment\/1"},{"id":"loanTerms","title":"Loan Information","link":"\/app\/loan-information"},{"id":"propertyPurpose","title":"Loan Purpose","link":"\/app\/loan-purpose"},{"id":"borrowersDeclarations","title":"Borrower's Declarations","link":"\/app\/borrower\/primary\/declarations"},{"id":"loanTerms","title":"Property Section","link":"\/app\/loan-information"},{"id":"borrowersAssetAccounts","title":"Financial Section","link":"\/app\/asset-accounts"},{"id":"borrowersDeclarations","title":"Disclosures Section","link":"\/app\/borrower\/primary\/declarations"}],"_HAS_CO_BORROWER":false,"_IS_JOINT_STATEMENT_":false,"_IS_START_HIDDEN_":false,"_ORDER":["start","borrowersInfo","borrowersAddress","borrowersEmploymentHistory","borrowersIncome","coBorrowersInfo","coBorrowersAddress","coBorrowersEmploymentHistory","coBorrowersIncome","loanTerms","propertyPurpose","detailsOfTransaction","propertyAddress","borrowersAssetAccounts","borrowersExpenses","borrowersAutomobiles","borrowersRealEstateSchedules","borrowersOtherAssets","borrowersDeclarations","coBorrowersDeclarations","HMDA","finish"],"_GROUPS_":{"Start":["start"],"Borrower":["borrowersInfo","borrowersAddress","borrowersEmploymentHistory","borrowersIncome"],"Co-Borrower":["coBorrowersInfo","coBorrowersAddress","coBorrowersEmploymentHistory","coBorrowersIncome"],"Property":["loanTerms","propertyPurpose","detailsOfTransaction","propertyAddress"],"Financial":["borrowersAssetAccounts","borrowersExpenses","borrowersAutomobiles","borrowersRealEstateSchedules","borrowersOtherAssets"],"Disclosures":["borrowersDeclarations","coBorrowersDeclarations","HMDA"],"Finish":["finish"]},"start":{"title":"Start","link":"\/app\/start","type":"form","model":"application","display_options":{"show_previous_navigation":false},"form":[{"id":"has_co_borrower","label":"Does this application have a co-borrower?","type":"yes-no-horizontal","yes_value":"1","no_value":"0","event":"new appEvent().trigger(\"_HAS_CO_BORROWER_\", {first_run: true});","help":"Any additional borrower(s) whose name(s) appear on loan documents and whose income and credit history are used to qualify for the loan.","required":true,"position":2}],"disabled":false},"borrowersInfo":{"title":"Borrower Information","menu_title":"Borrower Info","link":"\/app\/borrower\/primary\/information","type":"form","model":"borrower","form":[{"id":"first_name","label":"First Name","type":"text","value":"Nick","required":true,"position":1},{"id":"middle_name","label":"Middle Name","type":"text","required":false,"position":2},{"id":"last_name","label":"Last Name","type":"text","value":"Blake","required":true,"position":3},{"id":"social_security_number","label":"Social Security Number","type":"ssn","required":true,"position":4},{"id":"date_of_birth","label":"Date of Birth","type":"date","required":true,"position":5},{"type":"SEPARATOR","required":false,"position":6},{"id":"home_phone","label":"Home Phone","type":"phone","value":"(203) 401-1535","required":true,"position":6},{"id":"work_phone","label":"Work Phone","type":"phoneWithExt","required":false,"position":7},{"id":"email","label":"Email Address","type":"email","value":"nblake018@gmail.com","required":true,"position":8},{"id":"marital_status","label":"Marital Status","type":"select","options":{"married":"Married","unmarried":"Unmarried","separated":"Separated"},"required":false,"position":9},{"id":"years_in_school","label":"Number of Years in School","type":"number","step":1,"min":0,"required":false,"position":11},{"id":"group1","label":"Dependents Group","type":"group","group":[{"id":"number_of_dependents","label":"Number of Dependents","type":"number","step":1,"min":0,"isItemOfGroup":true,"required":false,"position":11},{"id":"dependent_ages","label":"Dependent's Ages (separate with commas)","type":"text","help":"Enter the ages of your dependents separated by commas, e.g. \"4,3,1\"","isItemOfGroup":true,"required":false,"position":12}],"required":false,"position":10}],"disabled":false},"borrowersAddress":{"title":"Borrower Address","menu_title":"Address","link":"\/app\/borrower\/primary\/address","type":"form","model":"borrower","form":[{"id":"present_address_1","label":"Address 1","type":"text","required":true,"position":1},{"id":"present_address_2","label":"Address 2 (optional)","type":"text","required":false,"position":2},{"id":"present_address_city","label":"City","type":"text","required":true,"position":3},{"id":"present_address_state","label":"State","type":"select","default":"Select a State","options":{"AL":"Alabama","AK":"Alaska","AZ":"Arizona","AR":"Arkansas","CA":"California","CO":"Colorado","CT":"Connecticut","DE":"Delaware","DC":"District Of Columbia","FL":"Florida","GA":"Georgia","HI":"Hawaii","ID":"Idaho","IL":"Illinois","IN":"Indiana","IA":"Iowa","KS":"Kansas","KY":"Kentucky","LA":"Louisiana","ME":"Maine","MD":"Maryland","MA":"Massachusetts","MI":"Michigan","MN":"Minnesota","MS":"Mississippi","MO":"Missouri","MT":"Montana","NE":"Nebraska","NV":"Nevada","NH":"New Hampshire","NJ":"New Jersey","NM":"New Mexico","NY":"New York","NC":"North Carolina","ND":"North Dakota","OH":"Ohio","OK":"Oklahoma","OR":"Oregon","PA":"Pennsylvania","RI":"Rhode Island","SC":"South Carolina","SD":"South Dakota","TN":"Tennessee","TX":"Texas","UT":"Utah","VT":"Vermont","VA":"Virginia","WA":"Washington","WV":"West Virginia","WI":"Wisconsin","WY":"Wyoming"},"required":true,"position":4},{"id":"present_address_zip_code","label":"Zip Code","type":"zipcode","required":true,"position":5},{"id":"present_address_own_rent","label":"Rent \/ Own","type":"select","options":{"rent":"Rent","own":"Own","living_rent_free":"Living Rent Free"},"required":false,"position":6},{"id":"present_address_own_rent_number_of_years","label":"For how many years?","type":"number","step":1,"min":0,"required":false,"position":7},{"id":"address_is_mailing_address","label":"Mailing address is the same","type":"checkbox","default_value":"1","event":"new appEvent().trigger(\"_CHECK_MAILING_ADDRESS_\", {first_run: true});","required":false,"position":8},{"id":"present_mailing_address_1","label":"Address 1","type":"text","required":false,"position":9},{"id":"present_mailing_address_2","label":"Address 2 (optional)","type":"text","required":false,"position":10},{"id":"present_mailing_address_city","label":"City","type":"text","required":false,"position":11},{"id":"present_mailing_address_state","label":"State","type":"select","default":"Select a State","options":{"AL":"Alabama","AK":"Alaska","AZ":"Arizona","AR":"Arkansas","CA":"California","CO":"Colorado","CT":"Connecticut","DE":"Delaware","DC":"District Of Columbia","FL":"Florida","GA":"Georgia","HI":"Hawaii","ID":"Idaho","IL":"Illinois","IN":"Indiana","IA":"Iowa","KS":"Kansas","KY":"Kentucky","LA":"Louisiana","ME":"Maine","MD":"Maryland","MA":"Massachusetts","MI":"Michigan","MN":"Minnesota","MS":"Mississippi","MO":"Missouri","MT":"Montana","NE":"Nebraska","NV":"Nevada","NH":"New Hampshire","NJ":"New Jersey","NM":"New Mexico","NY":"New York","NC":"North Carolina","ND":"North Dakota","OH":"Ohio","OK":"Oklahoma","OR":"Oregon","PA":"Pennsylvania","RI":"Rhode Island","SC":"South Carolina","SD":"South Dakota","TN":"Tennessee","TX":"Texas","UT":"Utah","VT":"Vermont","VA":"Virginia","WA":"Washington","WV":"West Virginia","WI":"Wisconsin","WY":"Wyoming"},"required":false,"position":12},{"id":"present_mailing_address_zip_code","label":"Zip Code","type":"zipcode","required":false,"position":13},{"id":"address_lived_less_than_2_years","label":"Has the applicant been here less than 2 years?","type":"checkbox","default_value":"0","event":"new appEvent().trigger(\"_CHECK_FORMER_ADDRESS_\", {first_run: true});","required":false,"position":14},{"id":"former_address_1","label":"Former Address 1","type":"text","required":false,"position":15},{"id":"former_address_2","label":"Former Address 2","type":"text","required":false,"position":16},{"id":"former_address_city","label":"Former City","type":"text","required":false,"position":17},{"id":"former_address_state","label":"Former State","type":"select","default":"Select a State","options":{"AL":"Alabama","AK":"Alaska","AZ":"Arizona","AR":"Arkansas","CA":"California","CO":"Colorado","CT":"Connecticut","DE":"Delaware","DC":"District Of Columbia","FL":"Florida","GA":"Georgia","HI":"Hawaii","ID":"Idaho","IL":"Illinois","IN":"Indiana","IA":"Iowa","KS":"Kansas","KY":"Kentucky","LA":"Louisiana","ME":"Maine","MD":"Maryland","MA":"Massachusetts","MI":"Michigan","MN":"Minnesota","MS":"Mississippi","MO":"Missouri","MT":"Montana","NE":"Nebraska","NV":"Nevada","NH":"New Hampshire","NJ":"New Jersey","NM":"New Mexico","NY":"New York","NC":"North Carolina","ND":"North Dakota","OH":"Ohio","OK":"Oklahoma","OR":"Oregon","PA":"Pennsylvania","RI":"Rhode Island","SC":"South Carolina","SD":"South Dakota","TN":"Tennessee","TX":"Texas","UT":"Utah","VT":"Vermont","VA":"Virginia","WA":"Washington","WV":"West Virginia","WI":"Wisconsin","WY":"Wyoming"},"required":false,"position":18},{"id":"former_address_zip_code","label":"Former Zip Code","type":"zipcode","required":false,"position":19},{"id":"former_address_own_rent","label":"Former Rent \/ Own","type":"select","options":{"rent":"Rent","own":"Own","living_rent_free":"Living Rent Free"},"required":false,"position":20},{"id":"former_address_own_rent_number_of_years","label":"Former For how many years?","type":"number","step":1,"min":0,"required":false,"position":21}],"disabled":false},"borrowersEmploymentHistory":{"title":"Borrower's Employment History","menu_title":"Employment","link":"\/app\/borrower\/primary\/employment","objectID":"borrowersEmploymentHistoryAdd","co_objectID":"coBorrowersEmploymentHistoryAdd","empty_message":"You don't have any employment history listed yet, please list all your past and present employment history.","type":"list","items":[],"add_button":"Add employment history"},"borrowersEmploymentHistoryAdd":{"title":"Employment History","link":"\/app\/borrower\/primary\/employment\/$1","listPageID":"borrowersEmploymentHistory","co_listPageID":"coBorrowersEmploymentHistory","type":"form","model":"employmentHistory","numberOfItems":0,"form":[{"id":"self_employed","label":"Self Employed?","type":"select","options":{"yes":"Yes","no":"No"},"required":false,"position":1},{"id":"name","label":"Employer Name","type":"text","required":true,"position":2},{"id":"address_1","label":"Address 1","type":"text","required":false,"position":3},{"id":"address_2","label":"Address 2 (optional)","type":"text","required":false,"position":4},{"id":"address_city","label":"City","type":"text","required":false,"position":5},{"id":"address_state","label":"State","type":"select","default":"Select a State","options":{"AL":"Alabama","AK":"Alaska","AZ":"Arizona","AR":"Arkansas","CA":"California","CO":"Colorado","CT":"Connecticut","DE":"Delaware","DC":"District Of Columbia","FL":"Florida","GA":"Georgia","HI":"Hawaii","ID":"Idaho","IL":"Illinois","IN":"Indiana","IA":"Iowa","KS":"Kansas","KY":"Kentucky","LA":"Louisiana","ME":"Maine","MD":"Maryland","MA":"Massachusetts","MI":"Michigan","MN":"Minnesota","MS":"Mississippi","MO":"Missouri","MT":"Montana","NE":"Nebraska","NV":"Nevada","NH":"New Hampshire","NJ":"New Jersey","NM":"New Mexico","NY":"New York","NC":"North Carolina","ND":"North Dakota","OH":"Ohio","OK":"Oklahoma","OR":"Oregon","PA":"Pennsylvania","RI":"Rhode Island","SC":"South Carolina","SD":"South Dakota","TN":"Tennessee","TX":"Texas","UT":"Utah","VT":"Vermont","VA":"Virginia","WA":"Washington","WV":"West Virginia","WI":"Wisconsin","WY":"Wyoming"},"required":false,"position":6},{"id":"address_zip_code","label":"Zip Code","type":"zipcode","required":false,"position":7},{"id":"business_phone","label":"Work Phone","type":"phoneWithExt","required":false,"position":8},{"id":"start_date","label":"Start Date","type":"date","required":false,"position":10},{"id":"end_date","label":"End Date","type":"date","required":false,"position":11},{"id":"currently_employed","label":"Currently Employed Here?","type":"checkbox","default_value":"1","event":"new appEvent().trigger(\"_CHECK_EMPLOYED_HERE_\", {first_run: true});","required":false,"position":12},{"id":"position_title_type_of_business","label":"Position or Title","type":"text","required":false,"position":9},{"id":"years_in_profession","label":"Years employed in this line of work\/profession","type":"number","step":1,"min":0,"required":false,"position":14}],"disabled":false},"borrowersIncome":{"title":"Borrower Monthly Income","menu_title":"Income","link":"\/app\/borrower\/primary\/monthly-income","type":"form","model":"monthlyIncome","form":[{"id":"base_income","label":"Base Monthly Income","type":"number_dollar","help":"Enter the gross monthly income of the borrower. This is the amount before any taxes, insurance, 401K or other deductions have been made. It may be wages or salaried income. If your base income varies from month to month, add up the total for the year and divide by 12.","required":false,"position":1},{"id":"overtime","label":"Monthly Overtime","type":"number_dollar","help":"Enter any overtime income you receive regularly. If your overtime varies from month to month, average it for a month.","required":false,"position":2},{"id":"bonuses","label":"Monthly Bonuses","type":"number_dollar","help":"Enter any bonus income you receive regularly. If your bonus varies from month to month, average it for a month.","required":false,"position":3},{"id":"commissions","label":"Monthly Commissions","type":"number_dollar","help":"Enter any commission income you receive regularly. If your commission income varies, figure a monthly average by adding up one year from your 1099 form and dividing by 12.","required":false,"position":4},{"id":"dividends_interest","label":"Monthly Dividends \/ Interest","type":"number_dollar","help":"Enter any commission income you receive regularly. If your commission income varies, figure a monthly average by adding up one year from your 1099 form and dividing by 12.","required":false,"position":5},{"id":"net_rental_income","label":"Monthly Net Rental Income","type":"number_dollar","required":false,"position":6},{"id":"other","label":"Other","type":"number_dollar","help":"Enter any additional monthly income you receive such as retirement, social security, child support, alimony or other income.","required":false,"position":7}],"disabled":false},"coBorrowersInfo":{"title":"Co-Borrower Information","menu_title":"Co-Borrower Info","link":"\/app\/borrower\/co\/information","type":"form","model":"borrower","form":[{"id":"first_name","label":"First Name","type":"text","required":true,"position":1},{"id":"middle_name","label":"Middle Name","type":"text","required":false,"position":2},{"id":"last_name","label":"Last Name","type":"text","required":true,"position":3},{"id":"social_security_number","label":"Social Security Number","type":"ssn","required":true,"position":4},{"id":"date_of_birth","label":"Date of Birth","type":"date","required":true,"position":5},{"type":"SEPARATOR","required":false,"position":6},{"id":"home_phone","label":"Home Phone","type":"phone","required":true,"position":6},{"id":"work_phone","label":"Work Phone","type":"phoneWithExt","required":false,"position":7},{"id":"email","label":"Email Address","type":"email","required":true,"position":8},{"id":"marital_status","label":"Marital Status","type":"select","options":{"married":"Married","unmarried":"Unmarried","separated":"Separated"},"required":false,"position":9},{"id":"years_in_school","label":"Number of Years in School","type":"number","step":1,"min":0,"required":false,"position":11},{"id":"group1","label":"Dependents Group","type":"group","group":[{"id":"number_of_dependents","label":"Number of Dependents","type":"number","step":1,"min":0,"isItemOfGroup":true,"required":false,"position":11},{"id":"dependent_ages","label":"Dependent's Ages (separate with commas)","type":"text","help":"Enter the ages of your dependents separated by commas, e.g. \"4,3,1\"","isItemOfGroup":true,"required":false,"position":12}],"required":false,"position":10}],"isCOBorrower":true,"disabled":false},"coBorrowersAddress":{"title":"Co-Borrower Address","menu_title":"Address","link":"\/app\/borrower\/co\/address","type":"form","model":"borrower","form":[{"id":"present_address_1","label":"Address 1","type":"text","required":true,"position":1},{"id":"present_address_2","label":"Address 2 (optional)","type":"text","required":false,"position":2},{"id":"present_address_city","label":"City","type":"text","required":true,"position":3},{"id":"present_address_state","label":"State","type":"select","default":"Select a State","options":{"AL":"Alabama","AK":"Alaska","AZ":"Arizona","AR":"Arkansas","CA":"California","CO":"Colorado","CT":"Connecticut","DE":"Delaware","DC":"District Of Columbia","FL":"Florida","GA":"Georgia","HI":"Hawaii","ID":"Idaho","IL":"Illinois","IN":"Indiana","IA":"Iowa","KS":"Kansas","KY":"Kentucky","LA":"Louisiana","ME":"Maine","MD":"Maryland","MA":"Massachusetts","MI":"Michigan","MN":"Minnesota","MS":"Mississippi","MO":"Missouri","MT":"Montana","NE":"Nebraska","NV":"Nevada","NH":"New Hampshire","NJ":"New Jersey","NM":"New Mexico","NY":"New York","NC":"North Carolina","ND":"North Dakota","OH":"Ohio","OK":"Oklahoma","OR":"Oregon","PA":"Pennsylvania","RI":"Rhode Island","SC":"South Carolina","SD":"South Dakota","TN":"Tennessee","TX":"Texas","UT":"Utah","VT":"Vermont","VA":"Virginia","WA":"Washington","WV":"West Virginia","WI":"Wisconsin","WY":"Wyoming"},"required":true,"position":4},{"id":"present_address_zip_code","label":"Zip Code","type":"zipcode","required":true,"position":5},{"id":"present_address_own_rent","label":"Rent \/ Own","type":"select","options":{"rent":"Rent","own":"Own","living_rent_free":"Living Rent Free"},"required":false,"position":6},{"id":"present_address_own_rent_number_of_years","label":"For how many years?","type":"number","step":1,"min":0,"required":false,"position":7},{"id":"address_is_mailing_address","label":"Mailing address is the same","type":"checkbox","default_value":"1","event":"new appEvent().trigger(\"_CHECK_MAILING_ADDRESS_\", {first_run: true});","required":false,"position":8},{"id":"present_mailing_address_1","label":"Address 1","type":"text","required":false,"position":9},{"id":"present_mailing_address_2","label":"Address 2 (optional)","type":"text","required":false,"position":10},{"id":"present_mailing_address_city","label":"City","type":"text","required":false,"position":11},{"id":"present_mailing_address_state","label":"State","type":"select","default":"Select a State","options":{"AL":"Alabama","AK":"Alaska","AZ":"Arizona","AR":"Arkansas","CA":"California","CO":"Colorado","CT":"Connecticut","DE":"Delaware","DC":"District Of Columbia","FL":"Florida","GA":"Georgia","HI":"Hawaii","ID":"Idaho","IL":"Illinois","IN":"Indiana","IA":"Iowa","KS":"Kansas","KY":"Kentucky","LA":"Louisiana","ME":"Maine","MD":"Maryland","MA":"Massachusetts","MI":"Michigan","MN":"Minnesota","MS":"Mississippi","MO":"Missouri","MT":"Montana","NE":"Nebraska","NV":"Nevada","NH":"New Hampshire","NJ":"New Jersey","NM":"New Mexico","NY":"New York","NC":"North Carolina","ND":"North Dakota","OH":"Ohio","OK":"Oklahoma","OR":"Oregon","PA":"Pennsylvania","RI":"Rhode Island","SC":"South Carolina","SD":"South Dakota","TN":"Tennessee","TX":"Texas","UT":"Utah","VT":"Vermont","VA":"Virginia","WA":"Washington","WV":"West Virginia","WI":"Wisconsin","WY":"Wyoming"},"required":false,"position":12},{"id":"present_mailing_address_zip_code","label":"Zip Code","type":"zipcode","required":false,"position":13},{"id":"address_lived_less_than_2_years","label":"Has the applicant been here less than 2 years?","type":"checkbox","default_value":"0","event":"new appEvent().trigger(\"_CHECK_FORMER_ADDRESS_\", {first_run: true});","required":false,"position":14},{"id":"former_address_1","label":"Former Address 1","type":"text","required":false,"position":15},{"id":"former_address_2","label":"Former Address 2","type":"text","required":false,"position":16},{"id":"former_address_city","label":"Former City","type":"text","required":false,"position":17},{"id":"former_address_state","label":"Former State","type":"select","default":"Select a State","options":{"AL":"Alabama","AK":"Alaska","AZ":"Arizona","AR":"Arkansas","CA":"California","CO":"Colorado","CT":"Connecticut","DE":"Delaware","DC":"District Of Columbia","FL":"Florida","GA":"Georgia","HI":"Hawaii","ID":"Idaho","IL":"Illinois","IN":"Indiana","IA":"Iowa","KS":"Kansas","KY":"Kentucky","LA":"Louisiana","ME":"Maine","MD":"Maryland","MA":"Massachusetts","MI":"Michigan","MN":"Minnesota","MS":"Mississippi","MO":"Missouri","MT":"Montana","NE":"Nebraska","NV":"Nevada","NH":"New Hampshire","NJ":"New Jersey","NM":"New Mexico","NY":"New York","NC":"North Carolina","ND":"North Dakota","OH":"Ohio","OK":"Oklahoma","OR":"Oregon","PA":"Pennsylvania","RI":"Rhode Island","SC":"South Carolina","SD":"South Dakota","TN":"Tennessee","TX":"Texas","UT":"Utah","VT":"Vermont","VA":"Virginia","WA":"Washington","WV":"West Virginia","WI":"Wisconsin","WY":"Wyoming"},"required":false,"position":18},{"id":"former_address_zip_code","label":"Former Zip Code","type":"zipcode","required":false,"position":19},{"id":"former_address_own_rent","label":"Former Rent \/ Own","type":"select","options":{"rent":"Rent","own":"Own","living_rent_free":"Living Rent Free"},"required":false,"position":20},{"id":"former_address_own_rent_number_of_years","label":"Former For how many years?","type":"number","step":1,"min":0,"required":false,"position":21}],"isCOBorrower":true,"disabled":false},"coBorrowersEmploymentHistory":{"title":"Co-Borrower's Employment History","menu_title":"Employment","link":"\/app\/borrower\/co\/employment","objectID":"coBorrowersEmploymentHistoryAdd","co_objectID":"coBorrowersEmploymentHistoryAdd","empty_message":"You don't have any employment history listed yet, please list all your past and present employment history.","type":"list","items":[],"add_button":"Add employment history","isCOBorrower":true},"coBorrowersEmploymentHistoryAdd":{"title":"Employment History","link":"\/app\/borrower\/co\/employment\/$1","listPageID":"coBorrowersEmploymentHistory","co_listPageID":"coBorrowersEmploymentHistory","type":"form","model":"employmentHistory","numberOfItems":0,"form":[{"id":"self_employed","label":"Self Employed?","type":"select","options":{"yes":"Yes","no":"No"},"required":false,"position":1},{"id":"name","label":"Employer Name","type":"text","required":true,"position":2},{"id":"address_1","label":"Address 1","type":"text","required":false,"position":3},{"id":"address_2","label":"Address 2 (optional)","type":"text","required":false,"position":4},{"id":"address_city","label":"City","type":"text","required":false,"position":5},{"id":"address_state","label":"State","type":"select","default":"Select a State","options":{"AL":"Alabama","AK":"Alaska","AZ":"Arizona","AR":"Arkansas","CA":"California","CO":"Colorado","CT":"Connecticut","DE":"Delaware","DC":"District Of Columbia","FL":"Florida","GA":"Georgia","HI":"Hawaii","ID":"Idaho","IL":"Illinois","IN":"Indiana","IA":"Iowa","KS":"Kansas","KY":"Kentucky","LA":"Louisiana","ME":"Maine","MD":"Maryland","MA":"Massachusetts","MI":"Michigan","MN":"Minnesota","MS":"Mississippi","MO":"Missouri","MT":"Montana","NE":"Nebraska","NV":"Nevada","NH":"New Hampshire","NJ":"New Jersey","NM":"New Mexico","NY":"New York","NC":"North Carolina","ND":"North Dakota","OH":"Ohio","OK":"Oklahoma","OR":"Oregon","PA":"Pennsylvania","RI":"Rhode Island","SC":"South Carolina","SD":"South Dakota","TN":"Tennessee","TX":"Texas","UT":"Utah","VT":"Vermont","VA":"Virginia","WA":"Washington","WV":"West Virginia","WI":"Wisconsin","WY":"Wyoming"},"required":false,"position":6},{"id":"address_zip_code","label":"Zip Code","type":"zipcode","required":false,"position":7},{"id":"business_phone","label":"Work Phone","type":"phoneWithExt","required":false,"position":8},{"id":"start_date","label":"Start Date","type":"date","required":false,"position":10},{"id":"end_date","label":"End Date","type":"date","required":false,"position":11},{"id":"currently_employed","label":"Currently Employed Here?","type":"checkbox","default_value":"1","event":"new appEvent().trigger(\"_CHECK_EMPLOYED_HERE_\", {first_run: true});","required":false,"position":12},{"id":"position_title_type_of_business","label":"Position or Title","type":"text","required":false,"position":9},{"id":"years_in_profession","label":"Years employed in this line of work\/profession","type":"number","step":1,"min":0,"required":false,"position":14}],"isCOBorrower":true,"disabled":false},"coBorrowersIncome":{"title":"Co-Borrower Monthly Income","menu_title":"Income","link":"\/app\/borrower\/co\/monthly-income","type":"form","model":"monthlyIncome","form":[{"id":"base_income","label":"Base Monthly Income","type":"number_dollar","help":"Enter the gross monthly income of the borrower. This is the amount before any taxes, insurance, 401K or other deductions have been made. It may be wages or salaried income. If your base income varies from month to month, add up the total for the year and divide by 12.","required":false,"position":1},{"id":"overtime","label":"Monthly Overtime","type":"number_dollar","help":"Enter any overtime income you receive regularly. If your overtime varies from month to month, average it for a month.","required":false,"position":2},{"id":"bonuses","label":"Monthly Bonuses","type":"number_dollar","help":"Enter any bonus income you receive regularly. If your bonus varies from month to month, average it for a month.","required":false,"position":3},{"id":"commissions","label":"Monthly Commissions","type":"number_dollar","help":"Enter any commission income you receive regularly. If your commission income varies, figure a monthly average by adding up one year from your 1099 form and dividing by 12.","required":false,"position":4},{"id":"dividends_interest","label":"Monthly Dividends \/ Interest","type":"number_dollar","help":"Enter any commission income you receive regularly. If your commission income varies, figure a monthly average by adding up one year from your 1099 form and dividing by 12.","required":false,"position":5},{"id":"net_rental_income","label":"Monthly Net Rental Income","type":"number_dollar","required":false,"position":6},{"id":"other","label":"Other","type":"number_dollar","help":"Enter any additional monthly income you receive such as retirement, social security, child support, alimony or other income.","required":false,"position":7}],"isCOBorrower":true,"disabled":false},"loanTerms":{"title":"Loan Information","menu_title":"Loan Info","link":"\/app\/loan-information","type":"form","model":"loanTerm","form":[{"id":"mortgage_applied_for","label":"Mortgage Applied For","type":"select","options":{"va":"VA","fha":"FHA","conventional":"Conventional","usda-rural-housing-service":"USDA \/ Rural Housing Service","other":"Other"},"event":"new appEvent().trigger(\"_LOAN_TERM_MORTGAGE_APPLIED_FOR_SELECT_\");","help":"Select the type of mortgage you will be applying for. VA Loans are guaranteed by the US Department of Veterans Affairs (VA). They are made to honorably discharged veterans or their un-remarried windows or widowers. Such loans require a minimal or no down payment and offer lower interest rates. FHA Loans are insured by the Federal Housing Administration open to all qualified home purchasers. While there are limits to the size of FHA loans, they are generous enough to handle moderate-priced homes almost anywhere in the country. Conventional Loans are not part of any government housing program. They are free of any restrictions of government insured housing programs such as loan size limits. USDA\/Rural Housing Service has various programs available to aid low to moderate income rural residents to purchase, and construct housing.","required":false,"position":1},{"id":"other_mortgage_applied_for_explanation","label":"Please Explain","type":"text","required":false,"position":2},{"id":"loan_amount","label":"Loan Amount","type":"number_dollar","help":"What is the amount of the loan you will need to purchase or refinance?","required":true,"position":3},{"id":"number_of_months","label":"Loan Term","type":"select","options":{"#SORTING#360":"360 months (30 years)","#SORTING#240":"240 months (20 years)","#SORTING#180":"180 months (15 years)","#SORTING#120":"120 months (10 years)","#SORTING#96":"96 months (8 years)","#SORTING#84":"84 months (7 years)","#SORTING#60":"60 months (5 years)"},"help":"These two fields are for indicating the term and amortization of your loan. The first box for the term in months that the amortization of your loan will be calculated for. The second box is for the number of months in which the loan will come due. For a 30 year fixed, the term will be 360 and the months due will also be 360. Other loan types may be amortized for 30 years but come due sooner with a balloon payment.","required":false,"position":5},{"id":"amortization_type","label":"Amortization Type","type":"select","options":{"fixed-rate":"Fixed Rate","gpm":"GPM","arm":"ARM","other":"Other"},"event":"new appEvent().trigger(\"_LOAN_TERM_AMORTIZATION_TYPE_SELECT_\");","help":"Choose the type of loan program you are interested in. If you are interested in an ARM, please specify the type you are interested in such as 3\/1, 5\/1 or 7\/1. If you are interested in some other loan type, please specify. Fixed Rate Mortgages have interest rates and payments that do not change during the entire term of the loan. An Adjustable Rate Mortgage (ARM) has an interest rate and payment that change periodically over the life of the loan based on changes in a specific financial index. A Graduated Payment Mortgage (GPM) has payments that are scheduled to increase, usually annually, for a set number of years, and then level off. GPM can be used with either a fixed or adjustable interest rate, and usually has a 30-year term.","required":false,"position":6},{"id":"arm_type","label":"ARM Type","type":"text","required":false,"position":7},{"id":"other_amortization_type_explanation","label":"Please Explain","type":"text","required":false,"position":8}],"disabled":false},"detailsOfTransaction":{"title":"Transaction Details","menu":"Transaction","link":"\/app\/details-of-transaction","type":"form","model":"transactionDetail","form":[{"id":"purchase_price","label":"Purchase Price","type":"number_dollar"},{"id":"alterations_improvements_repairs","label":"Alterations, improvements, repairs","type":"number_dollar"},{"id":"land","label":"Land (if acquired separately)","type":"number_dollar"},{"id":"refinance","label":"Refinance (incl. debts to be paid off)","type":"number_dollar"},{"id":"estimated_prepaid_items","label":"Estimated prepaid items","type":"number_dollar"},{"id":"estimated_closing_costs","label":"Estimated closing costs","type":"number_dollar"},{"id":"pmi_mip_funding_fee","label":"PMI, MIP, Funding Fee","type":"number_dollar"},{"id":"discount","label":"Discount (if Borrower will pay)","type":"number_dollar"},{"id":"subordinate_financing","label":"Subordinate financing","type":"number_dollar"},{"id":"borrower_closing_cost_paid_by_seller","label":"Borrower\u2019s closing costs paid by Seller","type":"number_dollar"},{"id":"other_credits","label":"Other Credits","type":"number_dollar"},{"id":"other_credits_explanation","label":"Other Credits Explanation","type":"text"},{"id":"pmi_mip_funding_fee_financed","label":"PMI, MIP, Funding Fee financed","type":"number_dollar"}],"disabled":true},"propertyAddress":{"title":"Subject Property Address","menu_title":"Address","link":"\/app\/property-address","type":"form","model":"property","form":[{"id":"subject_property_address_1","label":"Address 1","type":"text"},{"id":"subject_property_address_2","label":"Address 2 (optional)","type":"text"},{"id":"subject_property_address_city","label":"City","type":"text"},{"id":"subject_property_address_state","label":"State","type":"select","default":"Select a State","options":{"AL":"Alabama","AK":"Alaska","AZ":"Arizona","AR":"Arkansas","CA":"California","CO":"Colorado","CT":"Connecticut","DE":"Delaware","DC":"District Of Columbia","FL":"Florida","GA":"Georgia","HI":"Hawaii","ID":"Idaho","IL":"Illinois","IN":"Indiana","IA":"Iowa","KS":"Kansas","KY":"Kentucky","LA":"Louisiana","ME":"Maine","MD":"Maryland","MA":"Massachusetts","MI":"Michigan","MN":"Minnesota","MS":"Mississippi","MO":"Missouri","MT":"Montana","NE":"Nebraska","NV":"Nevada","NH":"New Hampshire","NJ":"New Jersey","NM":"New Mexico","NY":"New York","NC":"North Carolina","ND":"North Dakota","OH":"Ohio","OK":"Oklahoma","OR":"Oregon","PA":"Pennsylvania","RI":"Rhode Island","SC":"South Carolina","SD":"South Dakota","TN":"Tennessee","TX":"Texas","UT":"Utah","VT":"Vermont","VA":"Virginia","WA":"Washington","WV":"West Virginia","WI":"Wisconsin","WY":"Wyoming"}},{"id":"subject_property_address_zip_code","label":"Zip Code","type":"zipcode"},{"id":"number_of_units","label":"Number of Units","type":"number","step":1,"min":0,"help":"If this is a multi-unit property such as a duplex, fourplex, or multi-family, enter the number of units."},{"id":"year_built","label":"Year Built","type":"number","step":1,"min":0,"help":"Enter the year construction was completed on the property."},{"id":"legal_description_of_subject_property","label":"Legal Description of Property","type":"text","help":"Enter the full legal description of the property from the warrantee deed, appraisal or other official source."}],"disabled":true},"propertyPurpose":{"title":"Loan Purpose","menu_title":"Purpose","link":"\/app\/loan-purpose","type":"form","model":"property","form":[{"id":"purpose_of_loan","label":"Purpose of Loan","type":"select","options":{"purchase":"Purchasing a home","refinance":"Refinance my existing loan","construction":"Construction","construction-permanent":"Construction Permanent","other":"Other"},"event":"new appEvent().trigger(\"_PURPOSE_OF_LOAN_\");","help":"Select the option that best describes the reason you are applying for this loan. If \"other\", please use the box below to describe the reason.","required":true,"position":1},{"id":"other_explanation","label":"Please Explain...","type":"text","checkIfRequireNeededForLoanPurpose":{},"required":false,"position":2},{"id":"property_will_be","label":"Property will be","type":"select","options":{"primary-residence":"Primary Residence","secondary-residence":"Secondary Residence","investment":"Investment"},"help":"Choose the option that best describes the use of the property (Primary Residence, Secondary Residence or Investment Property)","required":true,"position":3},{"id":"purchase_price","label":"Property Value","type":"number_dollar","required":false,"position":4},{"id":"amount_existing_liens","label":"Amount Existing Liens","type":"number_dollar","group_class":"construction-group refinance-group","checkIfRequireNeededForLoanPurpose":{},"required":false,"position":7},{"id":"purpose_of_refinance","label":"Purpose of refinance","type":"select","options":{"no_cash_out":"No Cash Out","cash_out_other":"Cash-Out\/Other","cash_out_home_improvement":"Cash-Out\/Home Improvement","cash_out_debt_consolidation":"Cash-Out\/Debt Consolidation","limited_cash_out":"Limited Cash-Out"},"group_class":"refinance-group","checkIfRequireNeededForLoanPurpose":{},"required":false,"position":11},{"id":"manner_in_which_title_will_be_held","label":"Manner in which title will be held","type":"text","required":false,"position":12},{"id":"financing_source","label":"Down Payment source","type":"select","options":{"checking_saving":"Checking\/Savings","deposit_on_sales_contract":"Deposit on Sales Contract","equity_on_sold_property":"Equity on Sold Property","equity_from_ending_sale":"Equity from Pending Sale","equity_from_subject_property":"Equity from Subject Property","gift_funds":"Gift Funds","stocks_and_bonds":"Stocks & Bonds","lot_equity":"Lot Equity","bridge_loan":"Bridge Loan","unsecured_borrowed_funds":"Unsecured Borrowed Funds","trust_funds":"Trust Funds","retirement_funds":"Retirement Funds","rent_with_option_to_purchase":"Rent with Option to Purchase","life_insurance_cash_value":"Life Insurance Cash Value","sale_of_chattel":"Sale of Chattel","trade_equity":"Trade Equity","sweat_equity":"Sweat Equity","cash_on_hand":"Cash on Hand","other_type_of_down_payment":"Other Type of Down Payment","secured_borrowed_funds":"Secured Borrowed Funds"},"required":false,"position":13}],"disabled":false},"borrowersExpenses":{"title":"Combined Housing Expense","menu_title":"Combined Housing Expense","link":"\/app\/housing-expenses","type":"form","model":"expenses","form":[{"type":"table","rows":[{"id":"rent","label":"Rent","help":"Enter your current Rent payments","required":false,"position":1},{"id":"first_mortgage","label":"First Mortgage P&I","help":"Enter the current\/proposed Principal and Interest payment for the new loan. If your payment will include an amount for taxes and insurance, be sure to enter the whole amount of the payment including those.","required":false,"position":2},{"id":"other_financing","label":"Other Financing","help":"If you will have additional financing on the new property, list the current\/proposed payments.","required":false,"position":3},{"id":"hazard_insurance","label":"Hazard Insurance","help":"If your current\/proposed mortgage payment will not include amounts for insurance, list the monthly payments here. Divide the total proposed annual hazard insurance by 12 to arrive at a monthly amount.","required":false,"position":4},{"id":"real_estate_taxes","label":"Real Estate Taxes","help":"If your current\/proposed mortgage payment will not include amounts for taxes, list the monthly payments here. Divide the total proposed annual taxes by 12 to arrive at a monthly amount.","required":false,"position":5},{"id":"mortgage_insurance","label":"Mortgage Insurance","help":"If the loan on the new property will require mortgage insurance and you did not list it as part of the current\/proposed mortgage payment above, list the monthly amount here.","required":false,"position":6},{"id":"hoa_dues","label":"Homeowner Assn. Dues","help":"If you live in a planned unit development (PUD) there are usually dues associated with the homeowners association. If this pertains to you on your current and\/or proposed mortgage payment, enter the amounts here.","required":false,"position":7},{"id":"other","label":"Other","help":"If you have other monthly housing expense either on your current mortgage or the proposed new mortgage that are not listed above, enter those amounts here.","required":false,"position":8},{"id":"total","label":"Total","help":"Current\/Proposed Payment fields above will be summed up automatically to display the total monthly Proposed Payment.","required":false,"position":9}],"columns":[{"id":"present","label":"Present"},{"id":"proposed","label":"Proposed (optional)"}],"table_content":[{"id":"rent","row_id":"rent","column_id":"present","type":"number_dollar","required":false,"position":1,"label":"Rent"},{"id":"first_mortgage","row_id":"first_mortgage","column_id":"present","type":"number_dollar","required":false,"position":2,"label":"First Mortgage P&I"},{"id":"proposed_first_mortgage","row_id":"first_mortgage","column_id":"proposed","type":"number_dollar","required":false,"position":3},{"id":"other_financing","row_id":"other_financing","column_id":"present","type":"number_dollar","required":false,"position":3,"label":"Other Financing"},{"id":"proposed_other_financing","row_id":"other_financing","column_id":"proposed","type":"number_dollar","required":false,"position":4},{"id":"hazard_insurance","row_id":"hazard_insurance","column_id":"present","type":"number_dollar","required":false,"position":4,"label":"Hazard Insurance"},{"id":"proposed_hazard_insurance","row_id":"hazard_insurance","column_id":"proposed","type":"number_dollar","required":false,"position":5},{"id":"real_estate_taxes","row_id":"real_estate_taxes","column_id":"present","type":"number_dollar","required":false,"position":5,"label":"Real Estate Taxes"},{"id":"proposed_real_estate_taxes","row_id":"real_estate_taxes","column_id":"proposed","type":"number_dollar","required":false,"position":6},{"id":"mortgage_insurance","row_id":"mortgage_insurance","column_id":"present","type":"number_dollar","required":false,"position":6,"label":"Mortgage Insurance"},{"id":"proposed_mortgage_insurance","row_id":"mortgage_insurance","column_id":"proposed","type":"number_dollar","required":false,"position":7},{"id":"hoa_dues","row_id":"hoa_dues","column_id":"present","type":"number_dollar","required":false,"position":7,"label":"Homeowner Assn. Dues"},{"id":"proposed_hoa_dues","row_id":"hoa_dues","column_id":"proposed","type":"number_dollar","required":false,"position":8},{"id":"other","row_id":"other","column_id":"present","type":"number_dollar","required":false,"position":8,"label":"Other"},{"id":"proposed_other","row_id":"other","column_id":"proposed","type":"number_dollar","required":false,"position":9},{"id":"total","row_id":"total","column_id":"present","type":"text","required":false,"readonly":true,"event":"new appEvent().trigger(\"_CALCULATE_TOTALS_\");","position":9,"label":"Total"},{"id":"proposed_total","row_id":"total","column_id":"proposed","type":"text","required":false,"readonly":true,"position":10}]}]},"borrowersAssetAccounts":{"title":"Liquid Assets","menu_title":"Liquid Assets","link":"\/app\/asset-accounts","objectID":"borrowersAssetAccountsAdd","empty_message":"You don't have any accounts listed yet, please list all your checking and savings accounts.","type":"list","items":[],"add_button":"Add account"},"borrowersAssetAccountsAdd":{"title":"List checking and savings accounts below","link":"\/app\/asset-accounts\/$1","listPageID":"borrowersAssetAccounts","type":"form","model":"assetAccount","numberOfItems":0,"form":[{"id":"borrower_id","label":"This asset belongs to","type":"radio","options":{"69967":"Borrower","69968":"Co-Borrower"},"default_value":"69967","skip_if":["!_HAS_CO_BORROWER","_IS_JOINT_STATEMENT_"],"required":false,"position":1},{"id":"type","label":"Account Type","type":"select","options":{"savings-account":"Savings Account","checking-account":"Checking Account","stocks":"Stocks","bonds":"Bonds","certificate-deposit":"Certificate Deposit","money-market-fund":"Money Market Fund","mutual-fund":"Mutual Fund","trust-fund":"Trust Fund","other":"Other"},"required":false,"position":2},{"id":"financial_institution_name","label":"Name","type":"text","help":"Enter the name of the financial institution where you have an account. This can be a bank, saving and loan, credit union or other financial entity where you have a checking or savings account.","required":false,"position":3},{"id":"account_number","label":"Account Number","type":"text","required":false,"position":4},{"id":"account_balance","label":"Account Balance","type":"number_dollar","help":"Enter the total amount you currently have in this account.","required":false,"position":5}],"disabled":false},"borrowersAutomobiles":{"title":"Automobiles","menu_title":"Autos","link":"\/app\/automobiles","objectID":"borrowersAutomobilesAdd","empty_message":"You don't have any automobiles listed yet, please list all your automobiles below.","type":"list","items":[],"add_button":"Add automobile"},"borrowersAutomobilesAdd":{"title":"Add Automobile","link":"\/app\/automobiles\/$1","listPageID":"borrowersAutomobiles","type":"form","model":"automobile","numberOfItems":0,"form":[{"id":"borrower_id","label":"This automobile belongs to","type":"radio","options":{"69967":"Borrower","69968":"Co-Borrower"},"default_value":"69967","skip_if":["!_HAS_CO_BORROWER","_IS_JOINT_STATEMENT_"],"required":false,"position":1},{"id":"year","label":"Year","type":"number","step":1,"min":0,"required":false,"position":3},{"id":"make","label":"Make","type":"text","required":false,"position":2},{"id":"model","label":"Model","type":"text","required":false,"position":4},{"id":"value","label":"Value","type":"number_dollar","required":false,"position":5}],"disabled":false},"borrowersRealEstateSchedules":{"title":"Real Estate Owned","menu_title":"Real Estate Owned","link":"\/app\/real-estate-schedule","objectID":"borrowersRealEstateSchedulesAdd","empty_message":"You don't have any real estate schedules listed yet, please list all your real estate schedules below.","type":"list","items":[],"add_button":"Add real estate schedule"},"borrowersRealEstateSchedulesAdd":{"title":"Real Estate Schedule","link":"\/app\/real-estate-schedule\/$1","listPageID":"borrowersRealEstateSchedules","type":"form","model":"realEstateSchedule","numberOfItems":0,"form":[{"id":"borrower_id","label":"This real estate schedule belongs to","type":"radio","options":{"69967":"Borrower","69968":"Co-Borrower"},"default_value":"69967","skip_if":["!_HAS_CO_BORROWER","_IS_JOINT_STATEMENT_"],"required":false,"position":1},{"id":"status","label":"Status","type":"select","options":{"sold":"Sold","pending-sale":"Pending Sale","rental":"Rental"},"help":"Select the following from the drop-down list: Choose \"Sold\" if the property is sold but still in your name; choose \"Pending Sale\" if the property is currently listed for sale with a real estate broker or you are selling it yourself; choose \"Rental\" if the property is being held for income purposes; or, choose held as primary or secondary residence if you intend to keep this property.","required":false,"position":2},{"id":"type_of_property","label":"Type of Property","type":"select","options":{"single-family-residence":"Single Family Residence","two-to-fourplex":"Two to Fourplex","commercial-non-residential":"Commercial Non-residential","commercial-residential":"Commercial Residential","condominium":"Condominium","co-op":"Co-Op","farm":"Farm","land":"Land","mixed-use-property":"Mixed Use Property","mobile-home":"Mobile Home","multi-family-property":"Multi-Family Property","townhouse":"Townhouse"},"help":"Select the item in the dropdown list that best describes the property.","required":false,"position":3},{"id":"address_1","label":"Address 1","type":"text","help":"Enter the physical address of the property owned. If property owned is land with no street address, enter the number of lots or acres owned in the street field.","required":false,"position":4},{"id":"address_2","label":"Address 2","type":"text","required":false,"position":5},{"id":"city","label":"City","type":"text","required":false,"position":6},{"id":"state","label":"State","type":"select","default":"Select a State","options":{"AL":"Alabama","AK":"Alaska","AZ":"Arizona","AR":"Arkansas","CA":"California","CO":"Colorado","CT":"Connecticut","DE":"Delaware","DC":"District Of Columbia","FL":"Florida","GA":"Georgia","HI":"Hawaii","ID":"Idaho","IL":"Illinois","IN":"Indiana","IA":"Iowa","KS":"Kansas","KY":"Kentucky","LA":"Louisiana","ME":"Maine","MD":"Maryland","MA":"Massachusetts","MI":"Michigan","MN":"Minnesota","MS":"Mississippi","MO":"Missouri","MT":"Montana","NE":"Nebraska","NV":"Nevada","NH":"New Hampshire","NJ":"New Jersey","NM":"New Mexico","NY":"New York","NC":"North Carolina","ND":"North Dakota","OH":"Ohio","OK":"Oklahoma","OR":"Oregon","PA":"Pennsylvania","RI":"Rhode Island","SC":"South Carolina","SD":"South Dakota","TN":"Tennessee","TX":"Texas","UT":"Utah","VT":"Vermont","VA":"Virginia","WA":"Washington","WV":"West Virginia","WI":"Wisconsin","WY":"Wyoming"},"required":false,"position":7},{"id":"zip_code","label":"Zip Code","type":"zipcode","required":false,"position":8},{"id":"present_market_value","label":"Present Market Value","type":"number_dollar","help":"Enter the present appraised value of the property. If a recent appraisal has not been done on the property, use a comparable property recently sold.","required":false,"position":12},{"id":"amount_of_mortgages_and_liens","label":"Amount of Mortgages & Liens","type":"number_dollar","help":"List the total amount of any remaining loans including first, second and third mortgages. If there are any other types of government or private liens include those amounts also. Example: if your current first mortgage balance is $200,000 and you have a second mortgage for home improvement with a balance of $50,000, you would enter 250000 in this field.","required":false,"position":9},{"id":"gross_rental_income","label":"Gross Rental Income","type":"number_dollar","help":"Enter in the gross monthly income of the rental property. If this is not a rental property, leave this field blank.","required":false,"position":11},{"id":"mortgage_payments","label":"Mortgage Payment","type":"number_dollar","help":"Enter the total monthly mortgage payments for the property. If the monthly payment includes an amount for property taxes and hazard insurance, be sure to include those in this amount.","required":false,"position":13},{"id":"insurance_maintenance_taxes_misc","label":"Insurance, Maintenance, Taxes & Misc","type":"number_dollar","help":"If your monthly mortgage payment for the property does not include property taxes and hazard insurance, enter the monthly amount of these plus any maintenance or other costs associated with the property. If needed, sum up the values for the entire year and divide by 12 to calculate the monthly amount.","required":false,"position":14},{"id":"net_rental_income","label":"Net Rental Income","type":"number_dollar","help":"Enter in the net monthly income of the rental property. If this is not a rental property, leave this field blank.","required":false,"position":10}],"disabled":false},"borrowersOtherAssets":{"title":"Other Assets","menu_title":"Other Assets","link":"\/app\/assets-other","objectID":"borrowersOtherAssetsAdd","empty_message":"If you have any other assets, please list them here.","type":"list","items":[],"add_button":"Add asset account"},"borrowersOtherAssetsAdd":{"title":"Other Assets (itemize)","link":"\/app\/assets-other\/$1","listPageID":"borrowersOtherAssets","type":"form","model":"otherAsset","numberOfItems":0,"form":[{"id":"borrower_id","label":"This asset belongs to","type":"radio","options":{"69967":"Borrower","69968":"Co-Borrower"},"default_value":"69967","skip_if":["!_HAS_CO_BORROWER","_IS_JOINT_STATEMENT_"],"required":false,"position":1},{"id":"name","label":"Name","type":"text","required":false,"position":2},{"id":"value","label":"Value","type":"number_dollar","required":false,"position":3}],"disabled":false},"borrowersDeclarations":{"title":"Borrower's Declarations","menu_title":"Borrower","link":"\/app\/borrower\/primary\/declarations","type":"form","model":"declaration","form":[{"id":"textblock2","type":"textblock","label":"If you answer 'Yes' to any questions \"a\" through \"i\", please use continuation sheet for explanation.","position":1,"required":false},{"id":"outstanding_judgement","label":"a. Are there any outstanding judgments against you?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":2},{"id":"bankrupt_last_seven_years","label":"b. Have you been declared bankrupt within the past 7 years?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":3},{"id":"property_foreclosure_last_seven_years","label":"c. Have you had property foreclosed upon or given title or deed in lieu thereof in the last 7 years?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":4},{"id":"party_to_a_lawsuit","label":"d. Are you a party to a lawsuit?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":5},{"id":"obligated_on_loan","label":"e. Have you directly or indirectly been obligated on\n                    any loan which resulted in foreclosure, transfer of title in lieu of foreclosure, or\n                    judgment? <br\/><br\/><small>(This would include such loans as home mortgage loans, SBA loans, home\n                    improvement loans, educational loans, manufactured (mobile) home loans, any\n                    mortgage, financial obligation, bond, or loan guarantee. If \"Yes,\" provide\n                    details, including date, name, and address of Lender, FHA or VA case number,\n                    if any, and reasons for the action.)<\/small>","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":6},{"id":"delinquent_default_loan","label":"f. Are you presently delinquent or in default on\n                    any Federal debt or any other loan, mortgage, financial obligation, bond, or loan guarantee?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":7},{"id":"alimony_child_support_separate_maintenance","label":"g. Are you obligated to pay alimony, child support, or separate maintenance?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":8},{"id":"down_payment_borrowed","label":"h. Is any part of the down payment borrowed?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":9},{"id":"co_maker_endorser_on_a_note","label":"i. Are you a co-maker or endorser on a note?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":10},{"id":"us_citizen","label":"j. Are you a U.S. citizen?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":11},{"id":"permanent_resident_alien","label":"k. Are you a permanent resident alien?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":12},{"id":"primary_residence","label":"l. Do you intend to occupy the property as your primary residence?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":13},{"id":"ownership_interest","label":"m. Have you had an ownership interest in a property in the last three years?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":14}],"disabled":false},"coBorrowersDeclarations":{"title":"Co-Borrower's Declarations","menu_title":"Co-Borrower","link":"\/app\/borrower\/co\/declarations","type":"form","model":"declaration","form":[{"id":"textblock2","type":"textblock","label":"If you answer 'Yes' to any questions \"a\" through \"i\", please use continuation sheet for explanation.","position":1,"required":false},{"id":"outstanding_judgement","label":"a. Are there any outstanding judgments against you?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":2},{"id":"bankrupt_last_seven_years","label":"b. Have you been declared bankrupt within the past 7 years?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":3},{"id":"property_foreclosure_last_seven_years","label":"c. Have you had property foreclosed upon or given title or deed in lieu thereof in the last 7 years?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":4},{"id":"party_to_a_lawsuit","label":"d. Are you a party to a lawsuit?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":5},{"id":"obligated_on_loan","label":"e. Have you directly or indirectly been obligated on\n                    any loan which resulted in foreclosure, transfer of title in lieu of foreclosure, or\n                    judgment? <br\/><br\/><small>(This would include such loans as home mortgage loans, SBA loans, home\n                    improvement loans, educational loans, manufactured (mobile) home loans, any\n                    mortgage, financial obligation, bond, or loan guarantee. If \"Yes,\" provide\n                    details, including date, name, and address of Lender, FHA or VA case number,\n                    if any, and reasons for the action.)<\/small>","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":6},{"id":"delinquent_default_loan","label":"f. Are you presently delinquent or in default on\n                    any Federal debt or any other loan, mortgage, financial obligation, bond, or loan guarantee?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":7},{"id":"alimony_child_support_separate_maintenance","label":"g. Are you obligated to pay alimony, child support, or separate maintenance?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":8},{"id":"down_payment_borrowed","label":"h. Is any part of the down payment borrowed?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":9},{"id":"co_maker_endorser_on_a_note","label":"i. Are you a co-maker or endorser on a note?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":10},{"id":"us_citizen","label":"j. Are you a U.S. citizen?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":11},{"id":"permanent_resident_alien","label":"k. Are you a permanent resident alien?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":12},{"id":"primary_residence","label":"l. Do you intend to occupy the property as your primary residence?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":13},{"id":"ownership_interest","label":"m. Have you had an ownership interest in a property in the last three years?","type":"yes-no-horizontal","yes_value":"yes","no_value":"no","required":true,"position":14}],"isCOBorrower":true,"disabled":false},"HMDA":{"title":"HMDA","link":"\/app\/hmda","type":"form","model":"informationMonitoringPurpose","form":[{"id":"textblock3","type":"textblock","label":"The following information is requested by the Federal Government for certain types of loans related to a\n        dwelling in order to monitor the lender's compliance with equal credit opportunity, fair housing\n        and home mortgage disclosure laws. You are not required to furnish this in formation, but are encouraged\n        to do so. The law provides that a lender may not discriminate either on the basis of this\n        information, or on whether you choose to furnish it. If you furnish the information, please provide both\n        ethnicity and race. For race, you may check more than one designation. If you do not furnish\n        ethnicity, race, or sex, under Federal regulations, this lender is required to note the information on the basis\n        of visual observation and surname if you have made this application in person. If you do not\n        wish to furnish the information, please check the box below. (Lender must review the above material to assure\n        that the disclosures satisfy all requirements to which the lender is subject under applicable\n        state law for the particular type of loan applied for.)","position":0},{"type":"fieldset","title":"Borrower","link":"\/app\/hmda","model":"informationMonitoringPurpose","form":[{"id":"furbished_hdma1","label":"I do not wish to furnish this information","type":"checkbox","default_value":"0","required":false,"position":6},{"id":"ethnicity_hdma1","label":"Ethnicity","type":"select","options":{"hispanic-or-latino":"Hispanic or Latino","not-hispanic-or-latino":"Not Hispanic or Latino"},"required":false,"position":7},{"id":"race_hdma1","label":"Race","type":"multicheckbox","checkboxes":[{"id":"american-indian-or-alaska-native","label":"American Indian or Alaska Native","type":"checkbox","default_value":"0"},{"id":"asian","label":"Asian","type":"checkbox","default_value":"0"},{"id":"black-or-african-american","label":"Black or African American","type":"checkbox","default_value":"0"},{"id":"native-hawaiian-or-other-pacific-islander","label":"Native Hawaiian or Other Pacific Islander","type":"checkbox","default_value":"0"},{"id":"white","label":"White","type":"checkbox","default_value":"0"}],"required":false,"position":8},{"id":"sex_hdma1","label":"Sex","type":"select","options":{"m":"Male","f":"Female"},"required":false,"position":9}],"disabled":false},{"isCOBorrower":true,"type":"fieldset","title":"Co-Borrower","link":"\/app\/hmda","model":"informationMonitoringPurpose","form":[{"id":"furbished_hdma2","label":"I do not wish to furnish this information","type":"checkbox","default_value":"0","required":false,"position":6},{"id":"ethnicity_hdma2","label":"Ethnicity","type":"select","options":{"hispanic-or-latino":"Hispanic or Latino","not-hispanic-or-latino":"Not Hispanic or Latino"},"required":false,"position":7},{"id":"race_hdma2","label":"Race","type":"multicheckbox","checkboxes":[{"id":"american-indian-or-alaska-native","label":"American Indian or Alaska Native","type":"checkbox","default_value":"0"},{"id":"asian","label":"Asian","type":"checkbox","default_value":"0"},{"id":"black-or-african-american","label":"Black or African American","type":"checkbox","default_value":"0"},{"id":"native-hawaiian-or-other-pacific-islander","label":"Native Hawaiian or Other Pacific Islander","type":"checkbox","default_value":"0"},{"id":"white","label":"White","type":"checkbox","default_value":"0"}],"required":false,"position":8},{"id":"sex_hdma2","label":"Sex","type":"select","options":{"m":"Male","f":"Female"},"required":false,"position":9}],"disabled":false}]},"finish":{"title":"Finish","link":"\/app\/finish","display_options":{"show_navigation":false,"force_refresh":"\/app\/finish"},"type":"html","html":"<h3>Finish<\/h3>\n\n    <h4>Your application is 11% complete!<\/h4>\n    <div class=\"progress\">\n      <div class=\"progress-bar progress-bar-info progress-bar-striped\" role=\"progressbar\"\n      aria-valuenow=\"11\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:11%\">\n      <\/div>\n    <\/div>\n    \n        \n        <div class=\"alert alert-warning\">\n            <p>You are missing some required fields before being able to submit, please navigate to these pages and fill out the remaining fields:<\/p>\n                            <a href=\"\/app\/start?show_missing=1\">Start<\/a><br\/>\n                            <a href=\"\/app\/borrower\/primary\/information?show_missing=1\">Borrower Information<\/a><br\/>\n                            <a href=\"\/app\/borrower\/primary\/address?show_missing=1\">Borrower Address<\/a><br\/>\n                            <a href=\"\/app\/borrower\/primary\/employment?show_missing=1\">Borrower's Employment History<\/a><br\/>\n                            <a href=\"\/app\/borrower\/primary\/employment\/1?show_missing=1\">Employment History (1)<\/a><br\/>\n                            <a href=\"\/app\/loan-information?show_missing=1\">Loan Information<\/a><br\/>\n                            <a href=\"\/app\/loan-purpose?show_missing=1\">Loan Purpose<\/a><br\/>\n                            <a href=\"\/app\/borrower\/primary\/declarations?show_missing=1\">Borrower's Declarations<\/a><br\/>\n                            <a href=\"\/app\/loan-information?show_missing=1\">Property Section<\/a><br\/>\n                            <a href=\"\/app\/asset-accounts?show_missing=1\">Financial Section<\/a><br\/>\n                            <a href=\"\/app\/borrower\/primary\/declarations?show_missing=1\">Disclosures Section<\/a><br\/>\n                    <\/div>\n    \n    "},"export":{"title":"Export","link":"\/app\/export","type":"html","html":"<div class=\"col-xs-12\">\n    <div class=\"col-xs-8\">Fannie Mae 3.2<\/div>\n    <a href=\"\/app\/export\/fnm\" class=\"btn btn-primary col-xs-4 fnm-export\">Export<\/a>\n<\/div>\n<br \/><br \/>\n<div class=\"col-xs-12\">\n    <div class=\"col-xs-8\">Fannie Mae 3.2 PDF<\/div>\n    <a href=\"\/app\/export\/pdf\" class=\"btn btn-primary col-xs-4 fnm-export\">Export<\/a>\n<\/div>"},"documents":{"title":"Document Uploader","link":"\/app\/documents","display_options":{"show_navigation":false,"force_refresh":"\/app\/finish"},"type":"html","html":""}};
        
    var csrf_token = '9bMcyqDDTvClPlwb0yZMHzlEkjr9GMNpuAA4IPen';
    // ]]>
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrf_token
        }
    });
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="//gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>
<script src="/js/router.jquery.js?c=2017041505"></script>
<!-- <script src="/js/lib/maskedinput.jquery.js"></script> -->
<script src="/js/lib/validator.min.js?c=2017041505"></script>
<!--
<script src="/js/drawer.jquery.js"></script> -->

<script src="/lib/jquery-ui-custom-datepicker/jquery-ui.min.js"></script>

<script src="/oldjs/jquery.maskedinput.js?c=2017041505"></script>
<!--
<script src="/oldjs/jquery.validate.js"></script>
<script src="/oldjs/jquery.calculation.js"></script>
<script src="/oldjs/jquery.form.js"></script>
<script src="/oldjs/additional-methods.js"></script> -->


<script src="/js/app.lender411formbuilder.js?c=2017041505"></script>
<script src="/js/app.lender411listbuilder.js?c=2017041505"></script>
<script src="/js/app.data.adapter.js?c=2017041505"></script>
<script src="/js/app.data.storage.js?c=2017041505"></script>
<script src="/js/app.validator.js?c=2017041505"></script>
<script src="/js/app.events.js?c=2017041505"></script>
<script src="/js/app.menu.js?c=2017041505"></script>
<script src="/js/app.client.js?c=2017041505"></script>
<script src="/js/app.core.js?c=2017041505"></script>



</body>
</html>
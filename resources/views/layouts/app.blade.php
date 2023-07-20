<!DOCTYPE HTML>
<html lang='ar'>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<meta http-equiv="expires" content="0">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="private, max-age=0, no-cache">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title>ERB Nova System</title>

	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="./public/css/app.css" rel="stylesheet">

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="apple-touch-icon" sizes="180x180" href="public/vendors/images/deskapp-logo.png">
	<link rel="icon" type="image/png" sizes="32x32" href="public/vendors/images/deskapp-logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="public/vendors/images/deskapp-logo.png">
	
<!-- CSS only -->	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="public/vendors/styles/icon-font.min.css">	
	<link rel="stylesheet" type="text/css" href="public/vendors/styles/style2.css">
	<link rel="stylesheet" type="text/css" href="public/vendors/styles/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		.mCSB_inside{
			max-height: 100%;
		}
		.logo_text{
			font-size: -webkit-xxx-large;
			color: #990505;
			font-family: fantasy;
			font-kerning: auto;
			font-style: italic;
		}
	</style>
</head>
<body class="header-dark sidebar-dark">
	

	<div id="app">
		<div class="alert_kero">
			<div class="icon_alert_kero">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
					<path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
					<path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
				  </svg>
			</div>
			<div class="text_alert_kero">your opctins is sucsses</div>
		</div>
	@yield('loading')

	<header-top></header-top>

	<div class="left-side-bar style_option_0">
				<div class="brand-logo">
					<img src="public/src/images/ERP_Nova_System2.png" style="height:70px;" alt="" class="light-logo">
					<div class="close-sidebar" data-toggle="left-sidebar-close">
						<i class="ion-close-round close_slide_dev"></i>
					</div>
					<hr>
				</div>
			<bell-section></bell-section>
		<div class="menu-block customscroll" style="overflow-y: auto;">
                <br>
			<div class="sidebar-menu" style="height: fit-content;">
				<sit></sit>
                <span class="span_time" id="span_time"></span>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>
	
	<div class="main-container" id="app">
            @yield('content_body')
	</div>

	

	<div class="div_covers_loading">
		
		<!-- <img src="./img/gif_/img2.gif" alt="" srcset=""> -->
	</div>
	<!-- js -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/jquery.PrintArea.min.js" integrity="sha512-mPA/BA22QPGx1iuaMpZdSsXVsHUTr9OisxHDtdsYj73eDGWG2bTSTLTUOb4TG40JvUyjoTcLF+2srfRchwbodg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/PrintArea/2.4.1/PrintArea.min.css" rel="stylesheet" media="all">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="./public/js/app.js" defer></script>

    <script>
		
		$(document).ready(function index() {

		var mails=[];
        var times_page;
        function locking(){
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        var ampm = h >= 12 ? '@lang("message.pm")' : '@lang("message.am")';
		$('.span_time').text( h + ":" + m + ":" + s +' '+ ampm);
        times_page=h + ":" + m + ":" + s +' '+ ampm;
        if(times_page == "8:0:10 AM"||times_page == "8:0:10 ص"){//"8:0:0 PM"
         
            }
        }
        setInterval(locking,1000);


			/*
				<img src="public/src/images/logo.png" style="height:90%;width: fit-content;" alt="" class="light-logo">
				
			$('.notifi_showe').click(function(){
			});
				SELECT DISTINCT `data_part`.`part_id`,`data_part`.`part_name`,`data_part`.`type_quantity`,`total_part_balance_p`.`Balance` FROM `data_part`,`total_part_balance_p` WHERE `data_part`.minimum_quantity+15 = `total_part_balance_p`.Balance OR  `data_part`.minimum_quantity+10 = `total_part_balance_p`.Balance OR  `data_part`.minimum_quantity+5 = `total_part_balance_p`.Balance OR  `data_part`.minimum_quantity = `total_part_balance_p`.Balance OR  `data_part`.minimum_quantity > `total_part_balance_p`.Balance ORDER BY data_part.id;
			*/

		});
    </script>
    @yield('script')
</body>
</html>

<template>
    	<div class="cover_report_master">	
			<div class="alert_kero">
				<div class="icon_alert_kero">
					<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
						<path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
						<path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
					</svg>
				</div>
				<div class="text_alert_kero">your opctins is sucsses</div>
			</div>
			<section class="cover_body_mails">

				<button class="btn btn-danger exit_mails">X</button>
				<h4>The All Mails</h4>
				<h6><button class="btn btn-outline-primary clisk_senders" @click="send_mail_for_all()">Send All</button>
				<button class="btn btn-outline-info clisk_senders_as_one" style="margin-left:5px" @click="send_evre_one()">Send</button>
				 <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-check" viewBox="0 0 16 16">
					<path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
					<path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
					</svg>({{count_of_selection_mail}})</span> </h6>
				<hr>
				<table class="table table-striped border" style="text-align:center">
					<thead>
						<tr>
							<th style="width:400px">mail</th>
							<th>selection</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="item in mails" :key="item.id">
							<td style="width:400px">{{item.email}}</td>
							<td>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" @click="selected_datas($event,item)" :id="'flexCheckDefault'+item.id" style="width:24px;height:24px;">
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</section>
		<section class="content_report" id="print" style="height: auto;" >
			<div class="report_two" >
			  <div class="header_report">
					<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAA1BMVEX///+nxBvIAAAASElEQVR4nO3BgQAAAADDoPlTX+AIVQEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwDcaiAAFXD1ujAAAAAElFTkSuQmCC" style="height:50px;" alt="" class="light-logo">
				<div class="title" style="color: #e53935;display:inline-block">بيان التشغيل و التوقفات و الأعطال و القدرة الاستخراج بالساعة</div>
				<div class="wish_hober">
					<h6 style="float: left;width:300px">(<span class="serul_num" style="display:inline-block"></span>)رقم</h6>
					<h6 style="float: left;width:300px"><span class="date_report" style="display:inline-block"></span> :التاريخ</h6>
					<h6 style="float: left;width:300px"><span class="day_report" style="display:inline-block"></span></h6>
				</div>
			  </div>
			  <div class="body_report" style="height: 1000px;">
		
				<div class="row align-items-center" style="width: 100%">


				  <form class="form_0" method="post" style="margin-top: 1px" enctype='multipart/form-data'>
					<table class="table_class">
						<thead>
						<tr class="tr_class">
						  <th class="th_class" colspan="2" style="width: 14%">القدرة</th>
						  <th class="th_class" rowspan="2" style="width: 5%">الوقت</th>
						  <th class="th_class" rowspan="2" style="width: 7%">نوع العطل</th>
						  <th class="th_class" rowspan="2" colspan="2" style="width: 55%;">سبب التوقف</th>
						  <th class="th_class" colspan="2" style="width: 9%;">الوقت</th>
						  <th class="th_class" rowspan="2" style="width: 4%;">الخط</th>
						  <th class="th_class" rowspan="2" style="width: 5.5%;">الوردية</th>
						</tr>
						<tr class="tr_class">
						  <th class="th_class">B</th>
						  <th class="th_class">A</th>
						  <th class="th_class">التشغيل</th>
						  <th class="th_class">التوقف</th>
						</tr>
					</thead>
						<tbody class="form_0_shift_1">
						<tr class="tr_class">
						  <td class="td_class sh_1_line_1_line_b"> 9 </td>
						  <td class="td_class sh_1_line_1_line_a"> 8 </td>
						  <td class="td_class sh_1_line_1_line_time"> 7 </td>
						  <td class="td_class sh_1_line_1_line_type"> 6 </td>
						  <td class="td_class sh_1_line_1_line_reason"> 5 </td>
						  <td class="td_class sh_1_line_1_line_time_start"> 4 </td>
						  <td class="td_class sh_1_line_1_line_time_end"> 3 </td>
						  <td class="td_class sh_1_line_1_line_name"> 2 </td>
						  <td rowspan ="5" class="td_class shift_one"> 1 </td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_2_line_b"> 9 </td>
							<td class="td_class sh_1_line_2_line_a"> 8 </td>
							<td class="td_class sh_1_line_2_line_time"> 7 </td>
							<td class="td_class sh_1_line_2_line_type"> 6 </td>
							<td class="td_class sh_1_line_2_line_reason"> 5 </td>
							<td class="td_class sh_1_line_2_line_time_start"> 4 </td>
							<td class="td_class sh_1_line_2_line_time_end"> 3 </td>
							<td class="td_class sh_1_line_2_line_name"> 2 </td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_3_line_b"> 9 </td>
							<td class="td_class sh_1_line_3_line_a"> 8 </td>
							<td class="td_class sh_1_line_3_line_time"> 7 </td>
							<td class="td_class sh_1_line_3_line_type"> 6 </td>
							<td class="td_class sh_1_line_3_line_reason"> 5 </td>
							<td class="td_class sh_1_line_3_line_time_start"> 4 </td>
							<td class="td_class sh_1_line_3_line_time_end"> 3 </td>
							<td class="td_class sh_1_line_3_line_name"> 2 </td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_4_line_b"> 9 </td>
							<td class="td_class sh_1_line_4_line_a"> 8 </td>
							<td class="td_class sh_1_line_4_line_time"> 7 </td>
							<td class="td_class sh_1_line_4_line_type"> 6 </td>
							<td class="td_class sh_1_line_4_line_reason"> 5 </td>
							<td class="td_class sh_1_line_4_line_time_start"> 4 </td>
							<td class="td_class sh_1_line_4_line_time_end"> 3 </td>
							<td class="td_class sh_1_line_4_line_name"> 2 </td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_5_line_b"> 9 </td>
							<td class="td_class sh_1_line_5_line_a"> 8 </td>
							<td class="td_class sh_1_line_5_line_time"> 7 </td>
							<td class="td_class sh_1_line_5_line_type"> 6 </td>
							<td class="td_class sh_1_line_5_line_reason"> 5 </td>
							<td class="td_class sh_1_line_5_line_time_start"> 4 </td>
							<td class="td_class sh_1_line_5_line_time_end"> 3 </td>
							<td class="td_class sh_1_line_5_line_name"> 2 </td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_6_line_b"> 9 </td>
							<td class="td_class sh_1_line_6_line_a"> 8 </td>
						  <td style="td_class padding:2px;position:relative;">الـــقـــمـــح</td>
						  <td  rowspatd_class n='4'>الكمية المطحونة</td>
						  <td class="td_class" rowspan="4" colspan="5" style="width: 65%;position:relative;display: revert">
							<aside class="sh_me_1">مسؤل الوردية<br></aside>
							<aside class="sh_me_2">
							نسبة الاستخراج <br>
							<span>A % </span>
							<span>B % </span>
							</aside>
							<aside class="sh_me_3">مسؤل الكنترول <br></aside>
						</td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_7_line_b"> 9 </td>
							<td class="td_class sh_1_line_7_line_a"> 8 </td>
						  <td style="td_class padding:2px">دقـــيـــق</td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_8_line_b"> 9 </td>
							<td class="td_class sh_1_line_8_line_a"> 8 </td>
						  <td style="td_class padding:2px">الســــــــــن</td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_9_line_b"> 9 </td>
							<td class="td_class sh_1_line_9_line_a"> 8 </td>
						  <td style="td_class padding:2px">ردة</td>
						</tr>
					</tbody>
					</table>
				  </form>





				  <form class="form_0" method="post" style="margin-top: 20px" enctype='multipart/form-data'>
					<table class="table_class">
						<thead>
						<tr class="tr_class">
						  <th class="th_class" colspan="2" style="width: 14%">القدرة</th>
						  <th class="th_class" rowspan="2" style="width: 5%">الوقت</th>
						  <th class="th_class" rowspan="2" style="width: 7%">نوع العطل</th>
						  <th class="th_class" rowspan="2" colspan="2" style="width: 55%;">سبب التوقف</th>
						  <th class="th_class" colspan="2" style="width: 9%;">الوقت</th>
						  <th class="th_class" rowspan="2" style="width: 4%;">الخط</th>
						  <th class="th_class" rowspan="2" style="width: 5.5%;">الوردية</th>
						</tr>
						<tr class="tr_class">
						  <th class="th_class">B</th>
						  <th class="th_class">A</th>
						  <th class="th_class">التشغيل</th>
						  <th class="th_class">التوقف</th>
						</tr>
					</thead>
						<tbody class="form_0_shift_2">
						<tr class="tr_class">
						  <td class="td_class sh_1_line_1_line_b"> 9 </td>
						  <td class="td_class sh_1_line_1_line_a"> 8 </td>
						  <td class="td_class sh_1_line_1_line_time"> 7 </td>
						  <td class="td_class sh_1_line_1_line_type"> 6 </td>
						  <td class="td_class sh_1_line_1_line_reason"> 5 </td>
						  <td class="td_class sh_1_line_1_line_time_start"> 4 </td>
						  <td class="td_class sh_1_line_1_line_time_end"> 3 </td>
						  <td class="td_class sh_1_line_1_line_name"> 2 </td>
						  <td rowspan ="5" class="td_class shift_one"> 1 </td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_2_line_b"> 9 </td>
							<td class="td_class sh_1_line_2_line_a"> 8 </td>
							<td class="td_class sh_1_line_2_line_time"> 7 </td>
							<td class="td_class sh_1_line_2_line_type"> 6 </td>
							<td class="td_class sh_1_line_2_line_reason"> 5 </td>
							<td class="td_class sh_1_line_2_line_time_start"> 4 </td>
							<td class="td_class sh_1_line_2_line_time_end"> 3 </td>
							<td class="td_class sh_1_line_2_line_name"> 2 </td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_3_line_b"> 9 </td>
							<td class="td_class sh_1_line_3_line_a"> 8 </td>
							<td class="td_class sh_1_line_3_line_time"> 7 </td>
							<td class="td_class sh_1_line_3_line_type"> 6 </td>
							<td class="td_class sh_1_line_3_line_reason"> 5 </td>
							<td class="td_class sh_1_line_3_line_time_start"> 4 </td>
							<td class="td_class sh_1_line_3_line_time_end"> 3 </td>
							<td class="td_class sh_1_line_3_line_name"> 2 </td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_4_line_b"> 9 </td>
							<td class="td_class sh_1_line_4_line_a"> 8 </td>
							<td class="td_class sh_1_line_4_line_time"> 7 </td>
							<td class="td_class sh_1_line_4_line_type"> 6 </td>
							<td class="td_class sh_1_line_4_line_reason"> 5 </td>
							<td class="td_class sh_1_line_4_line_time_start"> 4 </td>
							<td class="td_class sh_1_line_4_line_time_end"> 3 </td>
							<td class="td_class sh_1_line_4_line_name"> 2 </td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_5_line_b"> 9 </td>
							<td class="td_class sh_1_line_5_line_a"> 8 </td>
							<td class="td_class sh_1_line_5_line_time"> 7 </td>
							<td class="td_class sh_1_line_5_line_type"> 6 </td>
							<td class="td_class sh_1_line_5_line_reason"> 5 </td>
							<td class="td_class sh_1_line_5_line_time_start"> 4 </td>
							<td class="td_class sh_1_line_5_line_time_end"> 3 </td>
							<td class="td_class sh_1_line_5_line_name"> 2 </td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_6_line_b"> 9 </td>
							<td class="td_class sh_1_line_6_line_a"> 8 </td>
						  <td style="td_class padding:2px;position:relative;">الـــقـــمـــح</td>
						  <td  rowspatd_class n='4'>الكمية المطحونة</td>
						  <td class="td_class" rowspan="4" colspan="5" style="width: 65%;position:relative;display: revert">
							<aside class="sh_me_1">مسؤل الوردية<br></aside>
							<aside class="sh_me_2">
							نسبة الاستخراج <br>
							<span>A % </span>
							<span>B % </span>
							</aside>
							<aside class="sh_me_3">مسؤل الكنترول <br></aside>
						</td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_7_line_b"> 9 </td>
							<td class="td_class sh_1_line_7_line_a"> 8 </td>
						  <td style="td_class padding:2px">دقـــيـــق</td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_8_line_b"> 9 </td>
							<td class="td_class sh_1_line_8_line_a"> 8 </td>
						  <td style="td_class padding:2px">الســــــــــن</td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_9_line_b"> 9 </td>
							<td class="td_class sh_1_line_9_line_a"> 8 </td>
						  <td style="td_class padding:2px">ردة</td>
						</tr>
					</tbody>
					</table>
				  </form>


				  



				  <form class="form_0" method="post" style="margin-top: 20px" enctype='multipart/form-data'>
					<table class="table_class">
						<thead>
						<tr class="tr_class">
						  <th class="th_class" colspan="2" style="width: 14%">القدرة</th>
						  <th class="th_class" rowspan="2" style="width: 5%">الوقت</th>
						  <th class="th_class" rowspan="2" style="width: 7%">نوع العطل</th>
						  <th class="th_class" rowspan="2" colspan="2" style="width: 55%;">سبب التوقف</th>
						  <th class="th_class" colspan="2" style="width: 9%;">الوقت</th>
						  <th class="th_class" rowspan="2" style="width: 4%;">الخط</th>
						  <th class="th_class" rowspan="2" style="width: 5.5%;">الوردية</th>
						</tr>
						<tr class="tr_class">
						  <th class="th_class">B</th>
						  <th class="th_class">A</th>
						  <th class="th_class">التشغيل</th>
						  <th class="th_class">التوقف</th>
						</tr>
					</thead>
						<tbody class="form_0_shift_3">
						<tr class="tr_class">
						  <td class="td_class sh_1_line_1_line_b"> 9 </td>
						  <td class="td_class sh_1_line_1_line_a"> 8 </td>
						  <td class="td_class sh_1_line_1_line_time"> 7 </td>
						  <td class="td_class sh_1_line_1_line_type"> 6 </td>
						  <td class="td_class sh_1_line_1_line_reason"> 5 </td>
						  <td class="td_class sh_1_line_1_line_time_start"> 4 </td>
						  <td class="td_class sh_1_line_1_line_time_end"> 3 </td>
						  <td class="td_class sh_1_line_1_line_name"> 2 </td>
						  <td rowspan ="5" class="td_class shift_one"> 1 </td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_2_line_b"> 9 </td>
							<td class="td_class sh_1_line_2_line_a"> 8 </td>
							<td class="td_class sh_1_line_2_line_time"> 7 </td>
							<td class="td_class sh_1_line_2_line_type"> 6 </td>
							<td class="td_class sh_1_line_2_line_reason"> 5 </td>
							<td class="td_class sh_1_line_2_line_time_start"> 4 </td>
							<td class="td_class sh_1_line_2_line_time_end"> 3 </td>
							<td class="td_class sh_1_line_2_line_name"> 2 </td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_3_line_b"> 9 </td>
							<td class="td_class sh_1_line_3_line_a"> 8 </td>
							<td class="td_class sh_1_line_3_line_time"> 7 </td>
							<td class="td_class sh_1_line_3_line_type"> 6 </td>
							<td class="td_class sh_1_line_3_line_reason"> 5 </td>
							<td class="td_class sh_1_line_3_line_time_start"> 4 </td>
							<td class="td_class sh_1_line_3_line_time_end"> 3 </td>
							<td class="td_class sh_1_line_3_line_name"> 2 </td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_4_line_b"> 9 </td>
							<td class="td_class sh_1_line_4_line_a"> 8 </td>
							<td class="td_class sh_1_line_4_line_time"> 7 </td>
							<td class="td_class sh_1_line_4_line_type"> 6 </td>
							<td class="td_class sh_1_line_4_line_reason"> 5 </td>
							<td class="td_class sh_1_line_4_line_time_start"> 4 </td>
							<td class="td_class sh_1_line_4_line_time_end"> 3 </td>
							<td class="td_class sh_1_line_4_line_name"> 2 </td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_5_line_b"> 9 </td>
							<td class="td_class sh_1_line_5_line_a"> 8 </td>
							<td class="td_class sh_1_line_5_line_time"> 7 </td>
							<td class="td_class sh_1_line_5_line_type"> 6 </td>
							<td class="td_class sh_1_line_5_line_reason"> 5 </td>
							<td class="td_class sh_1_line_5_line_time_start"> 4 </td>
							<td class="td_class sh_1_line_5_line_time_end"> 3 </td>
							<td class="td_class sh_1_line_5_line_name"> 2 </td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_6_line_b"> 9 </td>
							<td class="td_class sh_1_line_6_line_a"> 8 </td>
						  <td style="td_class padding:2px;position:relative;">الـــقـــمـــح</td>
						  <td  rowspatd_class n='4'>الكمية المطحونة</td>
						  <td class="td_class" rowspan="4" colspan="5" style="width: 65%;position:relative;display: revert">
							<aside class="sh_me_1">مسؤل الوردية<br></aside>
							<aside class="sh_me_2">
							نسبة الاستخراج <br>
							<span>A </span>
							<span>B </span>
							</aside>
							<aside class="sh_me_3">مسؤل الكنترول <br></aside>
						</td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_7_line_b"> 9 </td>
							<td class="td_class sh_1_line_7_line_a"> 8 </td>
						  <td style="td_class padding:2px">دقـــيـــق</td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_8_line_b"> 9 </td>
							<td class="td_class sh_1_line_8_line_a"> 8 </td>
						  <td style="td_class padding:2px">الســــــــــن</td>
						</tr>
						<tr class="tr_class">
							<td class="td_class sh_1_line_9_line_b"> 9 </td>
							<td class="td_class sh_1_line_9_line_a"> 8 </td>
						  <td style="td_class padding:2px">ردة</td>
						</tr>
					</tbody>
					</table>
				  </form>



				</div>
		
				<form method="post" style="margin-top: 10px">
					<table class="table_class table_class_privet" style="margin-top: 25px;width: 300px;height: fit-content;">
						<thead>
							<tr class="tr_class">
							  <th class="th_class" colspan="5">الكمية المطحون في المطحن اليوم</th>
							</tr>
							<tr class="tr_class">
								<th class="th_class" scope="col" style="width:21.5%;display:inline-table">القمح</th>
								<th class="th_class" scope="col" style="width:21.5%;display:inline-table">الدقيق</th>
								<th class="th_class" scope="col" style="width:21.5%;display:inline-table">الردة</th>
								<th class="th_class" scope="col" style="width:21%;display:inline-table">الســــــــن</th>
								<th class="th_class" scope="col" style="width:14.5%;display:inline-block">خطوط</th>
							</tr>
						</thead>
						<tbody class="data_showr">
							<tr class="tr_class">
								<th class="th_class" scope="col" style="width:21.5%;display:inline-table;height: 100%;border: 2px solid;">.....</th>
								<th class="th_class" scope="col" style="width:21.5%;display:inline-table;height: 100%;border: 2px solid;">......</th>
								<th class="th_class" scope="col" style="width:21.5%;display:inline-table;height: 100%;border: 2px solid;">......</th>
								<th class="th_class" scope="col" style="width:21.5%;display:inline-table;height: 100%;border: 2px solid;">......</th>
								<th class="th_class" scope="col" style="width:14%;display:inline-table;height: 100%;border: 2px solid;">.....</th>
							</tr>
							<tr class="tr_class">
								<th class="th_class" scope="col" style="width:21.5%;display:inline-table;height: 100%;border: 2px solid;">.....</th>
								<th class="th_class" scope="col" style="width:21.5%;display:inline-table;height: 100%;border: 2px solid;">......</th>
								<th class="th_class" scope="col" style="width:21.5%;display:inline-table;height: 100%;border: 2px solid;">......</th>
								<th class="th_class" scope="col" style="width:21.5%;display:inline-table;height: 100%;border: 2px solid;">......</th>
								<th class="th_class" scope="col" style="width:14%;display:inline-table;height: 100%;border: 2px solid;">.....</th>
							</tr>
						</tbody>
					</table>
		
					<div class="row linne_a">
						<div class="col" style="text-align: right;">
							................. :اجمالي الاستخراج
						</div>
						<div class="col" style="text-align: right;">
							................. :اجمالي عدد ساعات التوقف
						</div>
						<div class="col" style="text-align: right;">
							................. :Aاجمالي ساعات التشغيل للخط
						</div>
					</div>
					<div class="row linne_b">
						<div class="col" style="text-align: right;">
							................ :اجمالي الاستخراج
						</div>
						<div class="col" style="text-align: right;">
							................. :اجمالي عدد ساعات التوقف
						</div>
						<div class="col" style="text-align: right;">
							................ :Bاجمالي ساعات التشغيل للخط
						</div>
					</div>
				</form>
			  </div>
			</div>
		</section>
		<div class="dropdown div_btn">
		  <button
			class="btn btn-primary buton_drop"
			type="button"
			id="dropdownMenuButton"
			data-mdb-toggle="dropdown"
			aria-expanded="false"
		  >
		  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
			<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
			<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
		  </svg>
		  </button>
		  <ul class="dropdown-menu buton_drop2" aria-labelledby="dropdownMenuButton">
			<li><button class="btn btn-primary print" style="width: 100%;margin:2px;font-size: 11.5px;" @click="print()">Print</button></li>
			<li><button class="btn btn-info send_master_report" style="width: 100%;margin:2px;font-size: 11.5px;" @click="send()">Send</button></li>
			<li><button class="btn btn-dark close_master_report" style="width: 100%;margin:2px;font-size: 11.5px;">Close</button></li>
		  </ul>
		</div>
	 </div>
	 
</template>

<script>
import axios from 'axios';
    export default {
		props:['user_login','id_re'],
        mounted() {
			
			$('.buton_drop').click(function () { //exit_mails
				$('.buton_drop2').slideToggle();
			});
			$('.close_master_report').click(function (e) {
				$('.cover_report_master').fadeOut();
				$('.cover_body_mails').fadeOut();
				
			});
			$('.exit_mails').click(function (e) {
				$('.buton_drop2').fadeOut(); 
				$('.cover_report_master').fadeOut();
				$('.content_report').fadeIn();
				$('.cover_body_mails').fadeOut();
				
			});

			$('.clcik_silde_sid').click(function(){
				$('.style_option_0').css('left','0px');
				$('.close_slide_dev').click(function(){
					$('.style_option_0').css('left','-281px');
				});
				
			});
			
			$('.content_report').fadeIn();
			axios.post('./get_all_mails').then((res)=>this.mails=res.data);
        },
        data() {
            return{
				user_login:this.user_login,
				mails:{},
				selected_data:[],
				count_of_selection_mail:0,
				re_id:this.id_re
            }
        },
		methods:{
            selected_datas(event,d)
            {
                if(event.target.checked)
				{
                    this.selected_data.push(d);
					this.count_of_selection_mail++;//send_mail_for_all
				}
                else
				{
                    this.selected_data.pop(d);
					this.count_of_selection_mail--;
				}
            },
			send_mail_for_all()
			{
				
    			$('.clisk_senders').attr('disabled','disabled');
				axios.post('./send_mail_for_all',{id_report:this.re_id})
				.then((res)=>{
                        $(".alert_kero").css('display', 'flex');
                        $(".alert_kero").delay(1800).fadeOut();
    					$('.clisk_senders').removeAttr('disabled');
				});
			},
			send_evre_one(){
    			$('.clisk_senders_as_one').attr('disabled','disabled');
				axios.post('./send_mails',{counters:this.count_of_selection_mail,data:this.selected_data})
				.then((res)=>{
                        $(".alert_kero").css('display', 'flex');
                        $(".alert_kero").delay(1800).fadeOut();
    					$('.clisk_senders_as_one').removeAttr('disabled');
				});
			},
			send()
			{
				var tables=$('.content_report').html();
				axios.post('./PDF_control',{table:tables,id:this.re_id}).then((res)=>{
					$('.content_report').fadeOut();
					$('.cover_body_mails').fadeIn();
				});
			},
			print(){
				
  let contents = document.getElementById("print").innerHTML;
                let frame1 = document.createElement('iframe');
                frame1.name = "frame1";
                frame1.style.position = "absolute";
                frame1.style.top = "-1000000px";
                frame1.style.boxSizing = "100000px";
                document.body.appendChild(frame1);
                let frameDoc = frame1.contentWindow ? frame1.contentWindow : frame1.contentDocument.document ? frame1.contentDocument.document : frame1.contentDocument;
                frameDoc.document.open();
                frameDoc.document.write('<html lang="en"><head><title>Fiche Client</title>');
                frameDoc.document.write('<link rel="stylesheet" type="text/css" href="http://localhost/convert_swiss/public/css/print.css"/>');
                frameDoc.document.write('<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"/>');
                frameDoc.document.write('<link rel="stylesheet" type="text/css" href="http://localhost/convert_swiss/public/vendors/styles/style2.css"/>');
                frameDoc.document.write('<link rel="stylesheet" type="text/css" href="http://localhost/convert_swiss/public/vendors/styles/style.css"/>');
                frameDoc.document.write('</head><body>');
                frameDoc.document.write(contents);
                frameDoc.document.write('</body></html>');
                frameDoc.document.close();
                setTimeout(function () {
                    window.frames["frame1"].focus();
                    window.frames["frame1"].print();
                    document.body.removeChild(frame1);
                }, 500);

			}
		}
    }
</script>

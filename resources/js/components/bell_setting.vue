<style>
.notifi_counts{ 
    width: 15px;
    height: 15px;
    background-color: crimson;
    color: white;
    border-radius: 15px;
    position: absolute;
    right: 0%;
    top: 5%;
    text-align: center;
    display: block;
    font-size: 10px;
}
</style>
<template>
<div>
	<div class="dropdown-menu dropdown-menu-right show_notifi" style="position:fixed;top:9%;right:12%;overflow:auto;width:220px">
		<div class="notification-list mx-h-350 customscroll">
            
	<div class="alert_kero">
        <div class="icon_alert_kero">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
              </svg>
        </div>
        <div class="text_alert_kero">your opctins is sucsses</div>
    </div>

			<ul class="okey_zero">

                    <span v-if="isObjectEmpty(data)">
                        <h5>6لا يوجد أي أشعارات</h5>
                    </span>
                    <span v-else-if="isObjectEmpty(data[0])&&isObjectEmpty(data[1])">
                        <h5>2لا يوجد أي أشعارات</h5>
                    </span>
                    <span v-else>
                        <span v-if="user_login.status == 'Top_Admin'">
<li v-for="datas in data" :key="datas.id_num">
                                

                            <a v-if="datas.my_name == 'أذن صرف'" v-on:click="open_pay_report(datas.id_num,'h_pay_part_db')">
                                <img src="https://e7.pngegg.com/pngimages/438/417/png-clipart-computer-icons-report-icon-design-draw-big-prizes-miscellaneous-angle.png" alt="">
                                <h3>{{datas.my_name}}({{datas.id_num}}) </h3>
                                <p>يرجا تأكيد الاذن</p>
                                <p>{{datas.date}}</p>
                            </a>
                            <a v-if="datas.my_name == 'اخطار اعطال'" v-on:click="open_stop_report(datas.id_num,'notifacationwrning_db')">
                                <img src="https://e7.pngegg.com/pngimages/438/417/png-clipart-computer-icons-report-icon-design-draw-big-prizes-miscellaneous-angle.png" alt="">
                                <h3>{{datas.my_name}}({{datas.id_num}}) </h3>
                                <p>يرجا تأكيد الاذن</p>
                                <p>{{datas.date}}</p>
                            </a>
                            <a v-if="datas.my_name == 'طلب شراء'" v-on:click="open_order_buy_report(datas.id_num,'h_payrequest_report_db')">
                                <img src="https://e7.pngegg.com/pngimages/438/417/png-clipart-computer-icons-report-icon-design-draw-big-prizes-miscellaneous-angle.png" alt="">
                                <h3>{{datas.my_name}}({{datas.id_num}}) </h3>
                                <p>يرجا تأكيد الاذن</p>
                                <p>{{datas.date}}</p>
                            </a>
                            <a v-if="datas.my_name == 'طلب شراء عادى'" v-on:click="open_normal_buy_report(datas.id_num,'h_payrequest_normal_report_db')">
                                <img src="https://e7.pngegg.com/pngimages/438/417/png-clipart-computer-icons-report-icon-design-draw-big-prizes-miscellaneous-angle.png" alt="">
                                <h3>{{datas.my_name}}({{datas.id_num}}) </h3>
                                <p>يرجا تأكيد الاذن</p>
                                <p>{{datas.date}}</p>
                            </a>
                            <a v-if="datas.my_name == 'طلب فحص'" v-on:click="open_check_report(datas.id_num,'h_chack_report_db')">
                                <img src="https://e7.pngegg.com/pngimages/438/417/png-clipart-computer-icons-report-icon-design-draw-big-prizes-miscellaneous-angle.png" alt="">
                                <h3>{{datas.my_name}}({{datas.id_num}}) </h3>
                                <p>يرجا تأكيد الاذن</p>
                                <p>{{datas.date}}</p>
                            </a>
                            <a v-if="datas.my_name == 'اذن اضافة'" v-on:click="open_add_report(datas.id_num,'h_add_part_db')">
                                <img src="https://e7.pngegg.com/pngimages/438/417/png-clipart-computer-icons-report-icon-design-draw-big-prizes-miscellaneous-angle.png" alt="">
                                <h3>{{datas.my_name}}({{datas.id_num}}) </h3>
                                <p>يرجا تأكيد الاذن</p>
                                <p>{{datas.date}}</p>
                            </a>
                            <a v-if="datas.my_name == 'اذن اضافة مرتجع'" v-on:click="open_add_return_report(datas.id_num,'h_addreturn_report_db')">
                                <img src="https://e7.pngegg.com/pngimages/438/417/png-clipart-computer-icons-report-icon-design-draw-big-prizes-miscellaneous-angle.png" alt="">
                                <h3>{{datas.my_name}}({{datas.id_num}}) </h3>
                                <p>يرجا تأكيد الاذن</p>
                                <p>{{datas.date}}</p>
                            </a>

                            </li>
                        </span>
                    <span v-else>
                            <li v-for="datas in data" :key="datas.id_num">
                                

                            <a v-if="datas.my_name == 'أذن صرف'" v-on:click="open_pay_report(datas.id_num,'h_pay_part_db')">
                                <img src="https://e7.pngegg.com/pngimages/438/417/png-clipart-computer-icons-report-icon-design-draw-big-prizes-miscellaneous-angle.png" alt="">
                                <h3>{{datas.my_name}}({{datas.id_num}}) </h3>
                                <p>يرجا تأكيد الاذن</p>
                                <p>{{datas.date}}</p>
                            </a>
                            <a v-if="datas.my_name == 'اخطار اعطال'" v-on:click="open_stop_report(datas.id_num,'notifacationwrning_db')">
                                <img src="https://e7.pngegg.com/pngimages/438/417/png-clipart-computer-icons-report-icon-design-draw-big-prizes-miscellaneous-angle.png" alt="">
                                <h3>{{datas.my_name}}({{datas.id_num}}) </h3>
                                <p>يرجا تأكيد الاذن</p>
                                <p>{{datas.date}}</p>
                            </a>
                            <a v-if="datas.my_name == 'طلب شراء'" v-on:click="open_order_buy_report(datas.id_num,'h_payrequest_report_db')">
                                <img src="https://e7.pngegg.com/pngimages/438/417/png-clipart-computer-icons-report-icon-design-draw-big-prizes-miscellaneous-angle.png" alt="">
                                <h3>{{datas.my_name}}({{datas.id_num}}) </h3>
                                <p>يرجا تأكيد الاذن</p>
                                <p>{{datas.date}}</p>
                            </a>
                            <a v-if="datas.my_name == 'طلب شراء عادى'" v-on:click="open_normal_buy_report(datas.id_num,'h_payrequest_normal_report_db')">
                                <img src="https://e7.pngegg.com/pngimages/438/417/png-clipart-computer-icons-report-icon-design-draw-big-prizes-miscellaneous-angle.png" alt="">
                                <h3>{{datas.my_name}}({{datas.id_num}}) </h3>
                                <p>يرجا تأكيد الاذن</p>
                                <p>{{datas.date}}</p>
                            </a>
                            <a v-if="datas.my_name == 'طلب فحص'" v-on:click="open_check_report(datas.id_num,'h_chack_report_db')">
                                <img src="https://e7.pngegg.com/pngimages/438/417/png-clipart-computer-icons-report-icon-design-draw-big-prizes-miscellaneous-angle.png" alt="">
                                <h3>{{datas.my_name}}({{datas.id_num}}) </h3>
                                <p>يرجا تأكيد الاذن</p>
                                <p>{{datas.date}}</p>
                            </a>
                            <a v-if="datas.my_name == 'اذن اضافة'" v-on:click="open_add_report(datas.id_num,'h_add_part_db')">
                                <img src="https://e7.pngegg.com/pngimages/438/417/png-clipart-computer-icons-report-icon-design-draw-big-prizes-miscellaneous-angle.png" alt="">
                                <h3>{{datas.my_name}}({{datas.id_num}}) </h3>
                                <p>يرجا تأكيد الاذن</p>
                                <p>{{datas.date}}</p>
                            </a>
                            <a v-if="datas.my_name == 'اذن اضافة مرتجع'" v-on:click="open_add_return_report(datas.id_num,'h_addreturn_report_db')">
                                <img src="https://e7.pngegg.com/pngimages/438/417/png-clipart-computer-icons-report-icon-design-draw-big-prizes-miscellaneous-angle.png" alt="">
                                <h3>{{datas.my_name}}({{datas.id_num}}) </h3>
                                <p>يرجا تأكيد الاذن</p>
                                <p>{{datas.date}}</p>
                            </a>

                            </li>
                    </span>
                    </span>
			</ul>
		</div>





        <div class="cover_opp1_1 style_blocks">
            <div class="Page_Report1">
                <header>
                <button class="btn btn-danger exit1 style_exit">X</button>
                    <h3>أذن صرف (مخزن قطع الغيار)</h3>
                    <div class="report_number1">({{data_he.id_num}})أذن رقم</div>
                    <section class="Shefts1">
                        <section>
                                (<label for="radio1" v-text="data_he.shift"></label>)
                        </section>
                    </section>
                    <input readonly type="date" v-model="data_he.date" class="date">
                    <input readonly type="text" class="for" v-model="data_he.couses" placeholder="اسم المستلم">
                    <select readonly name="" class="department1" v-model="data_he.department_name" placeholder="الجهة الطالبة">
                        <option>{{data_he.department_name}}</option>
                    </select>
                    <input readonly type="number" class="number_order_work" v-model="data_he.oprating_order_id" placeholder="رقم امر الشغل">
                    
                </header>
                <section class="Body1" style="direction: rtl;">
                    <table>
                        <tr>
                            <th>رقم الصنف</th>
                            <th>اسم الصنف</th>
                            <th>الوحدة</th>
                            <th>الكمية المنصرفة</th>
                            <th>الملاحظات</th>
                        </tr>
                    <tr v-for="data in data_tables" :key="data.id">
                            <td><input readonly type="text" v-model="data.part_id" class="p_number1" placeholder = "...................."></td>
                            <td><input readonly type="text" v-model="data.part_name" class="p_name1" placeholder="...................."></td>
                            <td><input readonly type="text" v-model="data.part_unit" class="p_Quantety1" placeholder="...................."></td>
                            <td><input readonly type="text" v-model="data.part_count" class="Quantety1" placeholder="...................."></td>
                            <td><input readonly type="text" v-model="data.note" class="notes1" placeholder="...................."></td>
                        </tr>

                    </table>
                </section>
                <footer>
                    <div class="tfooter1">المدير العام</div>
                    <div class="tfooter1">مسئول المخزن</div>
                    <div class="tfooter1">المستلم</div>
            <div class="bfooter"><input type="text" v-model="data_he.recipient_name" class="notes1" placeholder="...................." readonly></div>
            <div class="bfooter"><input type="text" v-model="data_he.storage_manger" class="notes1" placeholder="...................." readonly></div>
            <div class="bfooter"><input type="text" v-model="data_he.ginral_manger" class="notes1" placeholder="...................." readonly></div>
                </footer>
                <button class="btn btn-success save1 style_save_butn" style="background-color: #227ee8;" v-on:click="accept_pay_report(data_he.id_num,'h_pay_part_db',$event)"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
						<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
						<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
					</svg>
                </button>
                <button class="btn btn-success save1 style_save_butn" style="background-color: red;border: red;margin-right:50px" v-on:click="no_accept_pay_report(data_he.id_num,'h_pay_part_db')"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-journal-x" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M6.146 6.146a.5.5 0 0 1 .708 0L8 7.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 8l1.147 1.146a.5.5 0 0 1-.708.708L8 8.707 6.854 9.854a.5.5 0 0 1-.708-.708L7.293 8 6.146 6.854a.5.5 0 0 1 0-.708z"/>
						<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
						<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
					</svg>
                </button>
            </div>
        </div>

		

<div class="cover_opp2_2 style_blocks">
    <div class="Page_Report2">
        <button class="btn btn-danger exit2 style_exit">X</button>
        <header>
            <h3>أذن أضافة (مخزن قطع الغيار)</h3>
            <div class="report_number2">أذن رقم({{data_he.id_num}})</div>
            <section class="Shefts2">
                <section>
                                <label for="radio1" v-text="data_he.shift">الوردية الاولى </label>
                                <input type="radio" id="radio1" checked name="Sheft">
                    
                </section>
            </section>
            <input type="date" class="date" v-model="data_he.date">
            <input type="text" class="supplayer" v-model="data_he.supplayer" placeholder="اسم المورد">
            <input type="number" class="chack_id" v-model="data_he.chackReport_id" placeholder="رقم محضر الفحص">
            <input type="number" class="income_id" v-model="data_he.incomeOrder_id" placeholder="رقم امر التوريد">
            <select v-model="data_he.department_name" class="classifacition2">
                <option value="0">اختر قسم</option>
                <option>ميكانيكا</option>
                <option>كهرباء</option>
                <option>اخر</option>
            </select>
        </header>
        <section class="Body2" style="direction: rtl;">
            <table>
                <tr>
                    <th>رقم الصنف</th>
                    <th>اسم الصنف</th>
                    <th>الوحدة</th>
                    <th>الكمية الواردة</th>
                    <th>الملاحظات</th>
                </tr>
                
                <tr v-for="data2 in data_tables" :key="data2.id">
                    <td><input type="text" v-model="data2.part_id" class="p_number1" placeholder="...................."></td>
                    <td><input type="text" v-model="data2.part_name" class="p_name1" placeholder="...................."></td>
                    <td><input type="text" v-model="data2.part_unit" class="p_Quantety1" placeholder="...................."></td>
                    <td><input type="text" v-model="data2.part_count" class="Quantety1" placeholder="...................."></td>
                    <td><input type="text" v-model="data2.note" class="notes1" placeholder="...................."></td>
                </tr>

            </table>
        </section>
        <footer>
            <div class="tfooter">المستلم</div>
            <div class="tfooter">مسئول المخزن</div>
            <div class="tfooter">المدير العام</div>
            <div class="bfooter"><input type="text" v-model="data_he.recipient_name" class="notes1" placeholder="...................." readonly></div>
            <div class="bfooter"><input type="text" v-model="data_he.storage_manger" class="notes1" placeholder="...................." readonly></div>
            <div class="bfooter"><input type="text" v-model="data_he.ginral_manger" class="notes1" placeholder="...................." readonly></div>
        </footer>
                <button class="btn btn-success save1 style_save_butn" style="background-color: #227ee8;" v-on:click="accept_pay_report(data_he.id_num,'h_add_part_db',$event)"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
						<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
						<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
					</svg>
                </button>
                <button class="btn btn-success save1 style_save_butn" style="background-color: red;border: red;margin-right:50px" v-on:click="no_accept_pay_report(data_he.id_num,'h_add_part_db')"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-journal-x" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M6.146 6.146a.5.5 0 0 1 .708 0L8 7.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 8l1.147 1.146a.5.5 0 0 1-.708.708L8 8.707 6.854 9.854a.5.5 0 0 1-.708-.708L7.293 8 6.146 6.854a.5.5 0 0 1 0-.708z"/>
						<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
						<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
					</svg>
                </button>
    </div>
</div>







<div class="cover_opp3_3 style_blocks">
    <div class="Page_Report3">
        <button class="btn btn-danger exit3 style_exit">X</button>
        <header>
            <h3>اذن اضافة مرتجعات للمخازن</h3>
            <div class="report_number3">أذن رقم({{data_he.id_num}})</div>
            <div class="container" style="width:820px">
                <div class="row">
                    <div class="col col-12" style="text-align:center">
                        <section class="Shefts1">
                            <section>
                                <label for="radio1" v-text="data_he.shift">الوردية الاولى </label>
                                <input type="radio" id="radio1" checked name="Sheft">
                            </section>
                        </section>
                    </div>
                </div>
            </div>
            <br/>
            <div class="container" style="width:820px">
                <div class="row">
                    <div class="col col-6">
                        <input type="date" class="couses" style="width: 215px;" v-model="data_he.date">
                        <input type="text" class="couses" placeholder=" سبب الارتجاع " v-model="data_he.Cause_of_reflux">
                    </div>
                    <div class="col col-6">
                        <input type="text" class="from" style="float:right;margin-bottom:2px" placeholder="مرتجع من" v-model="data_he.return_from">
                        <input type="text" class="depart" style="float:right;" placeholder=" الجهة الساببق الصرف لها " v-model="data_he.payed_befor">
                    </div>
                </div>
            </div>
        </header>
        <section class="Body3" style="direction: rtl;">
            <table>
                <tr>
                    <th>اسم الصنف</th>
                    <th> رقم الصنف</th>
                    <th>الوحدة</th>
                    <th>الكمية الواردة</th>
                    <th>  ملاحظات </th>
                </tr>
                <tr v-for="data2 in data_tables" :key="data2.id">
                    <td><input type="text" v-model="data2.part_name" class="p_number1" placeholder="..............."></td>
                    <td><input type="text" v-model="data2.part_id" class="p_name1" placeholder="..............."></td>
                    <td><input type="text" v-model="data2.part_unit" class="p_Quantety1" placeholder="..............."></td>
                    <td><input type="text" v-model="data2.income_balance" class="Quantety1" placeholder="..............."></td>
                    <td><input type="text" v-model="data2.note" class="notes1" placeholder="..............."></td>
                </tr>

            </table>
        </section>
        <footer>
            <div class="tfooter3">مُسلَم</div>
            <div class="tfooter3">مسئول المخزن</div>
            <div class="tfooter3">المدير العام</div>
            <div class="bfooter"><input type="text" v-model="data_he.delivered_name" class="notes1" placeholder="...................." readonly></div>
            <div class="bfooter"><input type="text" v-model="data_he.storage_manage" class="notes1" placeholder="...................." readonly></div>
            <div class="bfooter"><input type="text" v-model="data_he.ginral_manage" class="notes1" placeholder="...................." readonly></div>
        </footer>
                <button class="btn btn-success save1 style_save_butn" style="background-color: #227ee8;" v-on:click="accept_pay_report(data_he.id_num,'h_addreturn_report_db',$event)"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
						<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
						<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
					</svg>
                </button>
                <button class="btn btn-success save1 style_save_butn" style="background-color: red;border: red;margin-right:50px" v-on:click="no_accept_pay_report(data_he.id_num,'h_addreturn_report_db')"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-journal-x" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M6.146 6.146a.5.5 0 0 1 .708 0L8 7.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 8l1.147 1.146a.5.5 0 0 1-.708.708L8 8.707 6.854 9.854a.5.5 0 0 1-.708-.708L7.293 8 6.146 6.854a.5.5 0 0 1 0-.708z"/>
						<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
						<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
					</svg>
                </button>
    </div>
</div>






<div class="cover_opp4_4 style_blocks">
    <div class="Page_Report4">
        <button class="btn btn-danger exit4 style_exit">X</button>
        <header>
            <h3>محضر فحص و استلام</h3>
            <div class="report_number4">أذن رقم({{data_he.id_num}})</div>    

            <div class="tfooter4">التاريخ</div>
            <div class="tfooter4">اسم الموردة</div>
            <div class="tfooter4">الجهة الطالبة (اسم الفنى)</div>
            <div class="tfooter4">تاريخ الوصول من البوابة</div>
            <div class="bfooter4"><input type="date" v-model="data_he.date" class="date"></div> 
            <div class="bfooter4"><input type="text" v-model="data_he.recipient  " class="supplairs" placeholder="اسم المورد"></div> 
            <div class="bfooter4"><input type="text" v-model="data_he.department" class="department" placeholder="الجهة الطالبة"></div> 
            <div class="bfooter4"><input type="date" v-model="data_he.date_arrived" class="date_income" placeholder="تاريخ الوصول من البوابة"></div> 
        </header>
        <section class="Body4" style="direction: rtl;">
            <table>
                <tr>
                    <th>اسم الصنف</th>
                    <th>الوحدة</th>
                    <th>الكمية</th>
                    <th>مواصفاتة </th>
                    <th>نتيجة الفحص</th>
                    <th>الملاحظات </th>
                </tr>
                
                <tr v-for="data2 in data_tables" :key="data2.id">
                    <td><input type="text" v-model="data2.part_name" class="p_number1" placeholder="...................."></td>
                    <td><input type="text" v-model="data2.part_unit" class="p_name1" placeholder="...................."></td>
                    <td><input type="text" v-model="data2.part_count" class="p_Quantety1" placeholder="...................."></td>
                    <td><input type="text" v-model="data2.part_discription" class="Quantety1" placeholder="...................."></td>
                     <td>
                        <select name="" v-model="data2.resuilt_chack" id="">
                            <option>نعم نتيجة الفحص إيجابية و يتم قبول المنتج </option>
                            <option>لا نتيجة الفحص سلبية و يتم رفض المنتج</option>
                            <option selected>....................</option>
                        </select>
                    </td>
                    <td><input type="text" class="part_unit1" v-model="data2.note" placeholder="...................."></td>
                </tr>

            </table>
        </section>
        <footer>
            <div class="tfooter4">الفنى المختص</div>
            <div class="tfooter4">مسئول المخزن</div>
            <div class="bfooter"><input type="text" v-model="data_he.recipient_name" class="notes1" placeholder="...................." readonly></div>
            <div class="bfooter"><input type="text" v-model="data_he.storage_manage" class="notes1" placeholder="...................." readonly></div>
        </footer>
                <button class="btn btn-success save1 style_save_butn" style="background-color: #227ee8;" v-on:click="accept_pay_report(data_he.id_num,'h_chack_report_db',$event)"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
						<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
						<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
					</svg>
                </button>
    </div>
</div>






<div class="cover_opp5_5 style_blocks">
    <div class="Page_Report5">
        <button class="btn btn-danger exit5 style_exit">X</button>
        <header>
            <h3>طلب شراء محلى / خارجى</h3>
            <div class="report_number5">أذن رقم({{data_he.id_num}})</div>

            <input type="date" class="date" v-model="data_he.date">
            <input type="text" class="department" v-model="data_he.who_want" placeholder=" اسم الفنى">
            <select name="" id=""  v-model="data_he.depart">
                <option>ميكانيكا</option>
                <option>كهرباء</option>
                <option selected>اخر</option>
            </select>
        </header>
        <section class="Body5" style="direction: rtl;">
            <table>
                <tr>
                    <th>اسم الصنف و مواصفاتة</th>
                    <th>الكمية المطلوبة </th>
                    <th>رصيد المخزن</th>
                    <th>كود الصنف</th>
                    <th>الملاحظات</th>
                </tr>
                <tr v-for="data2 in data_tables" :key="data2.id">
                    <td><input type="text" v-model="data2.part_name" class="p_number1" placeholder="..............."></td>
                    <td><input type="number" v-model="data2.part_quantity" class="p_name1" placeholder="..............."></td>
                    <td><input type="number" v-model="data2.part_balance" class="p_Quantety1" placeholder="..............."></td>
                    <td><input type="text" v-model="data2.part_id" class="Quantety1" placeholder="..............."></td>
                    <td><input type="text" v-model="data2.note" class="notes1" placeholder="..............."></td>
                </tr>

            </table>
        </section>
        <footer  style="direction: rtl;">
            <div class="tfooter5">
                <div>مسئول المخزن</div>
                <div> الفنى المختص </div>
                <div> مدير المطحن</div>
                <div>المدير العام</div>
                <div> مدير المشتريات</div>
            </div>
            <div class="bfooter5">
            <div class="bfooter"><input type="text" v-model="data_he.storag_manage" class="notes1" placeholder="...................." readonly></div>
            <div class="bfooter"><input type="text" v-model="data_he.who_want_name" class="notes1" placeholder="...................." readonly></div>
            <div class="bfooter"><input type="text" v-model="data_he.milling_manage" class="notes1" placeholder="...................." readonly></div>
            <div class="bfooter"><input type="text" v-model="data_he.ginral_manage" class="notes1" placeholder="...................." readonly></div>
            <div class="bfooter"><input type="text" v-model="data_he.paying_manage" class="notes1" placeholder="...................." readonly></div>
            </div>
        </footer>
                <button class="btn btn-success save1 style_save_butn" style="background-color: #227ee8;" v-on:click="accept_pay_report(data_he.id_num,'h_payrequest_report_db',$event)"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
						<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
						<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
					</svg>
                </button>
                <button class="btn btn-success save1 style_save_butn" style="background-color: red;border: red;margin-right:50px" v-on:click="no_accept_pay_report(data_he.id_num,'h_payrequest_report_db')"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-journal-x" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M6.146 6.146a.5.5 0 0 1 .708 0L8 7.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 8l1.147 1.146a.5.5 0 0 1-.708.708L8 8.707 6.854 9.854a.5.5 0 0 1-.708-.708L7.293 8 6.146 6.854a.5.5 0 0 1 0-.708z"/>
						<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
						<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
					</svg>
                </button>
    </div>
</div>







<div class="cover_opp6_6 style_blocks">
    <div class="Page_Report6">
        <button class="btn btn-danger exit6 style_exit">X</button>
        <header>
            <h3>طلب شراء محلى / خارجى</h3>
            <div class="report_number6">أذن رقم({{data_he.id_num}})</div>

            <input type="date" class="date" v-model="data_he.date">
        </header>
        <section class="Body6" style="direction: rtl;">
            <table>
                <tr>
                    <th>اسم الصنف و مواصفاتة</th>
                    <th>الكمية المطلوبة </th>
                    <th>رصيد المخزن</th>
                    <th>كود الصنف</th>
                    <th>الملاحظات</th>
                </tr>
                
                <tr v-for="data2 in data_tables" :key="data2.id">
                    <td><input type="text" v-model="data2.part_name" class="p_number1" placeholder="..............."></td>
                    <td><input type="number" v-model="data2.part_quantity" class="p_name1" placeholder="..............."></td>
                    <td><input type="number" v-model="data2.part_balance" class="p_Quantety1" placeholder="..............."></td>
                    <td><input type="text" v-model="data2.part_id" class="Quantety1" placeholder="..............."></td>
                    <td><input type="text" v-model="data2.note" class="notes1" placeholder="..............."></td>
                </tr>

            </table>
        </section>
        <footer style="direction: rtl;">
            <div class="tfooter6" style="direction: rtl;">
                <div>مسئول المخزن</div>
                <div> مدير المطحن</div>
                <div> مدير المشتريات</div>
            </div>
            <div class="bfooter6" style="direction: rtl;">
            <div class="bfooter"><input type="text" v-model="data_he.storag_manage" class="notes1" placeholder="...................." readonly></div>
            <div class="bfooter"><input type="text" v-model="data_he.milling_manage" class="notes1" placeholder="...................." readonly></div>
            <div class="bfooter"><input type="text" v-model="data_he.paying_manage" class="notes1" placeholder="...................." readonly></div>
            </div>
        </footer>
                <button class="btn btn-success save1 style_save_butn" style="background-color: #227ee8;" v-on:click="accept_pay_report(data_he.id_num,'h_payrequest_normal_report_db',$event)"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
						<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
						<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
					</svg>
                </button>
                <button class="btn btn-success save1 style_save_butn" style="background-color: red;border: red;margin-right:50px" v-on:click="no_accept_pay_report(data_he.id_num,'h_payrequest_normal_report_db')"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-journal-x" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M6.146 6.146a.5.5 0 0 1 .708 0L8 7.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 8l1.147 1.146a.5.5 0 0 1-.708.708L8 8.707 6.854 9.854a.5.5 0 0 1-.708-.708L7.293 8 6.146 6.854a.5.5 0 0 1 0-.708z"/>
						<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
						<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
					</svg>
                </button>
    </div>
</div>














	</div>
<div class="convert_for_body_notifi">
            <div class="NotifacationWrningReport" style="width:1000px;background-color: white;">

                <button class="btn btn-success save1 style_save_butn" style="top:5px;right:310px" @click="accept_stop_report()"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                    <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                    </svg>
                </button>
                <button class="btn btn-danger style_save_butn " @click="closes()" style="top:5px;right:260px" > 
                    X
                </button>
                <header>
                    <h3>اخطار اعطال </h3>
                    <h4>({{form_data.id_num}})</h4>
                    <label for="" class="l1">التاريخ :</label>
                    <input type="date"  readonly v-model="form_data.date" placeholder="التاريخ">
                    <label for="">مكان العطل :</label>
                    <input type="text"  readonly v-model="form_data.error_location" placeholder="مكان العطل">
                    <label for="" class="l1">الجهة الطالبة للاصلاح :</label>
                    <input type="text" readonly v-model="form_data.dp_WanteFix" placeholder="الجهة الطالبة للاصلاح">
                    <label for="">توقيت بداية العطل :</label>
                    <input type="time" readonly v-model="form_data.start_time_error" placeholder="توقيت بداية العطل">
                    <label for="">المسئول :</label>
                    <input type="text" readonly v-model="form_data.shift_manger" placeholder="المسئول">
                    <label for="" class="l1">مسئول الكنترول :</label>
                        <input type="text" readonly v-model="form_data.controll_boy">
                    <div class="depart">
                        <label for="elctronic" name="dep">صيانة الكهرباء :</label>
                        <input type="radio" disabled id="elctronic" v-model="form_data.department" name="dep" value="4">
                        <label for="mechnical" name="dep">صيانة الميكانيكا :</label>
                        <input type="radio" disabled id="mechnical" v-model="form_data.department" name="dep" value="3">
                    </div>

                </header>
                <section class="body container">
                    <div class="tstart">
                        <div class="section1">
                            <label for="">الفنى المكلف  بالاصلاح :</label>
                            <input type="text" readonly v-model="form_data.who_will_fix">
                        </div>
                        <div class="section2">
                            <label for="">اسم المعدة :</label>
                            <input type="text" readonly v-model="form_data.part_name">
                            <label for="">رقم المعدة :</label>
                            <input type="text" readonly v-model="form_data.part_id">
                        </div>
                        <div class="section3">
                            <label for="">تاريخ بداية الاصلاح :</label>
                            <input readonly type="date" v-model="form_data.start_date_fix" placeholder="تاريخ بداية الاصلاح">
                            <label for="">توقيت بداية الاصلاح :</label>
                            <input readonly type="time" v-model="form_data.start_time_fix" placeholder="توقيت بداية الاصلاح">
                        </div>
                    </div>
                    <div class="container" style="border:1px solid;padding-right:1px">
                        <div class="row">
                            <div class="col col-12" style="text-align:center">
                                <h5 style="text-align:right">المطلوب عملة :</h5>
                                 {{form_data.requerd}}
                            </div>
                        </div>
                    </div>
                    <div class="container" style="text-align:center">
                        <div class="row" style="border:1px solid;height: 250px;position: relative;display: flex;flex-direction: row;justify-content: flex-end;align-content: stretch;flex-wrap: nowrap;align-items: stretch;">
                            <div class="col col-3" style="padding:0px;margin:0px">
                                <table class="table table-bordered" style="height:100%">
                                    <tr>
                                        <th colspan="3" style="height:10%">ما تم عمله</th>
                                    </tr>
                                    <tr>
                                        <td style="height:90%"><textarea class="form-control" v-model="form_data.what_did" style="height:160px" placeholder="ما تم عمله"></textarea></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col col-6" style="overflow:hidden;padding:0px;margin:0px">
                                <table class="table table-bordered" style="margin:0px;">
                                        <tr>
                                            <th colspan="3">قطع الغيار المستخدمة</th>
                                        </tr>
                                        <tr>
                                            <th style="width:70%">الاسم</th>
                                            <th style="width:15%">الوحدة</th>
                                            <th style="width:15%">الكمية</th>
                                        </tr>
                                </table>
                                <table class="table table-bordered">
                                    <div style="overflow:auto;height:150px;margin:0px;width:100%">
                                       
                                                <tr v-for="items in form_in_form" :key="items.key" style="padding:2px;width:100%;display: inline-table;">
                                                    <td style="width:70%;">{{items.part_name}}</td>
                                                    <td style="width:15%">{{items.part_unit}}</td>
                                                    <td style="width:15%">{{items.part_count}}</td>
                                                </tr> 
                                                
                                    </div>
                                </table>
                            </div>
                            <div class="col col-3" style="padding:0px;margin:0px">
                                
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="3">الملاحظات</th>
                                    </tr>
                                    <tr>
                                        <td><textarea class="form-control" v-model="form_data.note" style="height:160px" placeholder="الملاحظات">

                                        </textarea></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <footer class="footer">
                    <label for=""> القائم بالعمل</label>
                    <label for="">الجهة الطالبة للاصلاح </label>
                    <label for="">مدير الصيانة</label>
                    <input type="text" v-model="form_data.who_fix" placeholder="القائم بالعمل" readonly>
                    <input type="text" v-model="form_data.name_WanteFix" placeholder="الجهة الطالبة للاصلاح" required>
                    <input type="text" v-model="form_data.mintanice_manger" placeholder="مدير الصيانة" required>
                </footer>
            </div>
        </div>
</div>
</template>



<script>
    export default {
        
        mounted() {
            
                axios.post('./get_notifi')
                .then((response)=>{
					this.data=response.data;
				 axios.post('./count_notifi_api').then((res)=>{
                    if(res.data > 0){this.run_not();}
                    $('.notifi_counts').text(res.data);
                    
                 });
                });

            axios.post('./login_here').then((res)=>{
                    this.user_login=res.data;

                    Echo.channel('my-channel'+res.data.id)//this channel for get all data from database (notifiction)
                    .listen('who_pay', (e) => {
                        axios.post('./get_notifi')
                        .then((response)=>{
                            this.data=response.data;
                            if(response.data)
                                this.counts_notifi();
                        });
                    });
                    Echo.channel('stop_reports_ch'+res.data.id)//this channel for get all data from database (notifiction)
                    .listen('stop_reports', (e) => {
                        axios.post('./get_notifi')
                        .then((response)=>{
                            this.data=response.data;
                            if(response.data)
                                this.counts_notifi();
                        });
                    });


                });


			
            $('.exit1').click(function(){
                $('.cover_opp1_1').fadeOut();
            });
            $('.exit2').click(function(){
                $('.cover_opp2_2').fadeOut();
            });
            $('.exit3').click(function(){
                $('.cover_opp3_3').fadeOut();
            });
            $('.exit4').click(function(){
                $('.cover_opp4_4').fadeOut();
            });
            $('.exit5').click(function(){
                $('.cover_opp5_5').fadeOut();
            });
            $('.exit6').click(function(){
                $('.cover_opp6_6').fadeOut();
            });
        },
		data(){
			return{
                data_he:[],
                data_tables:{},
				data:{},
				message:"",
                form_data:{id_num:''},
                form_in_form:{},
                user_login:{},
                id_activ_user:0,
			}
		},
		methods:{
        counts_notifi(){
				 axios.post('./count_notifi_api').then((res)=>{
                    if(res.data > 0){this.run_not();}
                    $('.notifi_counts').text(res.data);
                    
                 });
        },
            run_not(){
                var audio = new Audio('public/audio/a.mp3');
                audio.play();
            },
            isObjectEmpty(someObject){
                return !(Object.keys(someObject).length);
            },
            accept_stop_report()
            {
				 axios.post('./accept_stop_report',{id:this.form_data.id_num,data:this.form_data})
				 .then((response)=>{
                        this.closes();
                        $(".alert_kero").css('display', 'flex');
                        $(".alert_kero").delay(1800).fadeOut();
                        this.data=response.data;
                         axios.post('./get_notifi')
                        .then((response)=>{
                            this.data=response.data;
                            axios.post('./count_notifi_api').then((res)=>{
                                $('.notifi_counts').text(res.data);
                                
                            });
                        });
			            axios.post('./i_open');
                        axios.post('./do_event_one/'+this.id_activ_user);
                        //axios.post('./login_here');
                        //this.counts_notifi();
				}).catch((response)=>{
                    alert("error syntax");
                });
            },
            closes()
            {
                $('.convert_for_body_notifi').fadeOut();
            },
			accept_pay_report(id,tables,event)
			{
				 axios.post('./accept_pay_report',{id:id,tables:tables,data:this.data_tables})
				 .then((response)=>{
                     if(response.data.stat == "Error")
                     {
                         alert("لا يوجد رصيد في المخزن");
                     }else{
                        $(".alert_kero").css('display', 'flex');
                        $(".alert_kero").delay(1800).fadeOut();
                        this.data=response.data;
                        $('.style_blocks').fadeOut();
                         axios.post('./get_notifi')
                        .then((response)=>{
                            this.data=response.data;
                            axios.post('./count_notifi_api').then((res)=>{
                                $('.notifi_counts').text(res.data);
                                
                            });
                        });
                        axios.post('./do_event_one/'+this.id_activ_user);
                        axios.post('./count_buy_report');
                     }
                    $('.style_save_butn').attr('disabled',false);
				}).catch((response)=>{
                    alert("error syntax");
                });
			},
            open_stop_report(id,tables)
            {
                axios.post('./get_data_stop_report',{id:id,tables:tables})
                .then((response)=>{
                    this.form_data=response.data;
                    axios.post('./get_data_form_in_form',{id:this.form_data.id_num}).then((res)=>{
                        this.form_in_form=res.data;
                    });
					$('.convert_for_body_notifi').fadeIn();
                    this.get_users_of_der();
                    axios.post('./i_open');
				}).catch((response)=>{
                    alert("error syntax");
                }); 
            },
			open_add_report(id,tables)
			{
                axios.post('./get_data_h_b',{id:id,tables:tables})
                .then((response)=>{
                    this.data_he=response.data.data_h;
                    this.data_tables=response.data.data_table;
					$('.cover_opp2_2').fadeIn();
                    this.get_users_of_der();
				}).catch((response)=>{
                    alert("error syntax");
                });
			},
			open_check_report(id,tables)
			{
                axios.post('./get_data_h_b',{id:id,tables:tables})
                .then((response)=>{
                    this.data_he=response.data.data_h;
                    this.data_tables=response.data.data_table;
					$('.cover_opp4_4').fadeIn();
                    this.get_users_of_der();
				}).catch((response)=>{
                    alert("error syntax");
                });
			},
			open_normal_buy_report(id,tables)
			{
                axios.post('./get_data_h_b',{id:id,tables:tables})
                .then((response)=>{
                    this.data_he=response.data.data_h;
                    this.data_tables=response.data.data_table;
					$('.cover_opp6_6').fadeIn();
                this.get_users_of_der();
				}).catch((response)=>{
                    alert("error syntax");
                });
			},
			open_order_buy_report(id,tables)
			{
                axios.post('./get_data_h_b',{id:id,tables:tables})
                .then((response)=>{
                    this.data_he=response.data.data_h;
                    this.data_tables=response.data.data_table;
					$('.cover_opp5_5').fadeIn();
                this.get_users_of_der();
				}).catch((response)=>{
                    alert("error syntax");
                });
			},
			open_add_return_report(id,tables)
			{
                axios.post('./get_data_h_b',{id:id,tables:tables})
                .then((response)=>{
                    this.data_he=response.data.data_h;
                    this.data_tables=response.data.data_table;
					$('.cover_opp3_3').fadeIn();
                this.get_users_of_der();
				}).catch((response)=>{
                    alert("error syntax");
                });
			},
			open_pay_report(id,tables)
			{
                axios.post('./get_data_h_b',{id:id,tables:tables})
                .then((response)=>{
                    this.data_he=response.data.data_h;
                    this.data_tables=response.data.data_table;
					$('.cover_opp1_1').fadeIn();
                this.get_users_of_der();
				}).catch((response)=>{
                    alert("error syntax");
                });
			},
			no_accept_pay_report(id,tables)//no accepte
			{
				 axios.post('./no_accept_pay_report',{id:id,tables:tables})
				 .then((response)=>{
					this.data=response.data;
					$('.style_blocks').fadeOut();
                      $(".alert_kero").css('display', 'flex');
                      $(".alert_kero").delay(1800).fadeOut();
                      
                         axios.post('./get_notifi')
                        .then((response)=>{
                            this.data=response.data;
                            axios.post('./count_notifi_api').then((res)=>{
                                if(res.data > 0){this.run_not();}
                                $('.notifi_counts').text(res.data);
                                
                            });
                        });
                        
                    axios.post('./do_event_one/'+this.id_activ_user);
				}).catch((response)=>{
                    alert("error syntax");
                });
			},
            get_users_of_der()
            {
                if(this.data_he.storage_manage)
                {
                    axios.post('./get_users_of_der',{seg:this.data_he.storage_manage})
                    .then((res)=>{
                        this.id_activ_user=res.data.id;
                    })
                    .catch((res)=>{
                        alert("sorry");
                    });
                }
               else if(this.data_he.storage_manger)
                {
                    axios.post('./get_users_of_der',{seg:this.data_he.storage_manger})//department
                    .then((res)=>{
                        this.id_activ_user=res.data.id;
                    })
                    .catch((res)=>{
                        alert("sorry");
                    });
                }
               else if(this.data_he.storag_manage)
                {
                    axios.post('./get_users_of_der',{seg:this.data_he.storag_manage})
                    .then((res)=>{
                        this.id_activ_user=res.data.id;
                    })
                    .catch((res)=>{
                        alert("sorry");
                    });
                }
               else if(this.form_data.controll_boy)
                {
                    axios.post('./get_users_of_der',{seg:this.form_data.controll_boy})
                    .then((res)=>{
                        this.id_activ_user=res.data.id;
                    })
                    .catch((res)=>{
                        alert("sorry");
                    });
                }else{
                    alert('depyg');
                }

            }
		}
    }
</script>
<!--


				$('.okey_zero').html();

                        <label for="">المطلوب عملة :</label>
                        <input type="text" readonly v-model="form_data.requerd" name="" id="" placeholder="المطلوب عملة">

                        <label for="">المطلوب عملة :</label>
                        <input type="text" readonly v-model="form_data.requerd" name="" id="" placeholder="المطلوب عملة">
                    </div>
                    <div class="tend">
                        <div class="th">
                            <label for="" >ما تم عملة </label>
                            <label for="" > </label>
                            <label for="" >الملاحظات</label>
                        </div>
                        <div class="td">
                            <input type="text" readonly v-model="form_data.what_did" placeholder="ما تم عملة">
                            <div>
                                <span>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>الاسم</th>
                                            <th>الوحدة</th>
                                            <th>الكمية</th>
                                        </tr>
                                        <tr v-for="items in form_in_form" :key="items.key" style="padding:2px">
                                            <td>{{items.part_name}}</td>
                                            <td>{{items.part_unit}}</td>
                                            <td>{{items.part_count}}</td>
                                        </tr>
                                    </table>
                                </span>
                            </div>

                        </div>









-->

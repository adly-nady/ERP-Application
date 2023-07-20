<template>

	<div class="pd-ltr-20" id="app">
        
        <span v-if="user_login.dep_id == 2 || user_login.dep_id == 15">

		<div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
            <div class="container">
                <div class="row">
                    <div class="col col-4">
                        <br>
                        <button class="btn btn-success" style="width:150px;padding:5px;background-color: white;background-image: linear-gradient(to bottom right, #004affd9, #3de91e);" v-on:click="search_about_reports()">search</button>
                    </div>
                    <div class="col col-4">
                        <h5>التاريخ</h5>
                        <input type="date" class="form-control" v-model="storage_settinng_data.date">
                    </div>
                    <div class="col col-4">
                        <h5>sections</h5>
                        <select value="0" class="form-control" v-model="storage_settinng_data.type_of_reports">
                            <option value="0">اختر نوع التقرير</option>
                            <option value="h_pay_part_db"> الصرف </option>
                            <option value="h_add_part_db"> الاضافة </option>
                            <option value="h_addreturn_report_db"> المرتجع </option>
                            <option value="h_chack_report_db"> الفحص </option>
                            <option value="h_payrequest_report_db">  طلب الشراء لأول مره</option>
                            <option value="h_payrequest_normal_report_db"> طلب الشراء الاعتيادي</option>
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <table class="table table-striped border">
                <thead>
                    <tr>
                        <th style="width:100px">الحذف</th>
                        <th style="width:100px">عرض</th>
                        <th style="width:100px">التاريخ</th>
                        <th style="width:100px">أذن رقم</th>
                    </tr>
                </thead>
                <tbody>
                        <tr v-for="data in table" :key="data.id">
                            <td style="width:100px"><button class="btn btn-danger" style="box-shadow: 0px 0px 5px 1px red" v-on:click="delet_dp(data.id_num,storage_settinng_data.type_of_reports)">حذف</button></td>
                            <td style="width:100px"><button v-bind:class="'btn btn-info '+typese" style="box-shadow: 0px 0px 5px 1px #17a2b8" v-on:click="show_dp(data.id_num,storage_settinng_data.type_of_reports)">عرض</button></td>
                            <td style="width:100px">{{data.date}}</td>
                            <td style="width:100px">{{data.id_num}}</td>
                        </tr>
                </tbody>
            </table>
        </div>

        </span>
        <span v-else>
            <div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
                <h2>لا يمكنك الدخول الى هذة الصفحة</h2>
            </div>
        </span>


        <div class="cover_opp1_1 style_blocks">
            <div class="Page_Report1">
                <header>
                <button class="btn btn-danger exit1 style_exit">X</button>
                    <h3>أذن صرف (مخزن قطع الغيار)</h3>
                    <div class="report_number1">({{data_he.id_num}})أذن رقم</div>
                    <section class="Shefts1">
                        <section>
                                <label for="radio1" v-text="data_he.shift">الوردية الاولى </label>
                                <input type="radio" id="radio1" checked name="Sheft">
                        </section>
                    </section>
                    <input type="date" v-model="data_he.date" class="date">
                    <input type="text" class="for" v-model="data_he.recipient_name" placeholder="اسم المستلم">
                    <select name="" class="department1" v-model="data_he.department_name" placeholder="الجهة الطالبة">
                        <option value="0">اختر القسم</option>
                        <option>ميكانيكا</option>
                        <option>كهرباء</option>
                        <option>اخر</option>
                    </select>
                    <input type="number" class="number_order_work" v-model="data_he.oprating_order_id" placeholder="رقم امر الشغل">
                    
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
                            <td><input type="text" v-model="data.part_id" class="p_number1" placeholder="...................."></td>
                            <td><input type="text" v-model="data.part_name" class="p_name1" placeholder="...................."></td>
                            <td><input type="text" v-model="data.part_unit" class="p_Quantety1" placeholder="...................."></td>
                            <td><input type="text" v-model="data.part_count" class="Quantety1" placeholder="...................."></td>
                            <td><input type="text" v-model="data.note" class="notes1" placeholder="...................."></td>
                        </tr>

                    </table>
                </section>
                <footer>
                    <div class="tfooter1">المستلم</div>
                    <div class="tfooter1">مسئول المخزن</div>
                    <div class="tfooter1">المدير العام</div>
                    <div class="bfooter1"><input type="text" v-model="data_he.recipient_name" class="notes1" placeholder="...................." readonly></div>
                    <div class="bfooter1"><input type="text" v-model="data_he.storage_manger" class="notes1" placeholder="...................." readonly></div>
                    <div class="bfooter1"><input type="text" v-model="data_he.ginral_manger" class="notes1" placeholder="...................." ></div>
                </footer>
                <button class="btn btn-success save1 style_save_butn" v-on:click.prevent="update_pay_report(data_he.id_num,storage_settinng_data.type_of_reports)"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                    <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
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
            <div class="bfooter"><input type="text" v-model="data_he.recipient_name" class="note1" readonly placeholder="...................."></div>
            <div class="bfooter"><input type="text" v-model="data_he.storage_manger" class="note1" readonly placeholder="...................."></div>
            <div class="bfooter"><input type="text" v-model="data_he.ginral_manger" class="note1" placeholder="...................." readonly></div>
        </footer>
                <button class="btn btn-success save1 style_save_butn" v-on:click="update_add_report(data_he.id_num,storage_settinng_data.type_of_reports)"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                    <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
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
                        <input type="text" class="depart" style="float:right;" placeholder=" الجهة الساببق الصرف لها " v-model="data_he.delivered_name">
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
                    <th> الرصيد السابق</th>
                    <th>الكمية الواردة</th>
                    <th> الرصيد بعد الاضافة</th>
                    <th>  ملاحظات </th>
                </tr>
                <tr v-for="data2 in data_tables" :key="data2.id">
                    <td><input type="text" v-model="data2.part_name" class="p_number1" placeholder="..............."></td>
                    <td><input type="text" v-model="data2.part_id" class="p_name1" placeholder="..............."></td>
                    <td><input type="text" v-model="data2.part_unit" class="p_Quantety1" placeholder="..............."></td>
                    <td><input type="text" v-model="data2.old_balance" class="Quantety1" placeholder="..............."></td>
                    <td><input type="text" v-model="data2.income_balance" class="Quantety1" placeholder="..............."></td>
                    <td><input type="text" v-model="data2.balance_after_add" class="Quantety1" placeholder="..............."></td>
                    <td><input type="text" v-model="data2.note" class="notes1" placeholder="..............."></td>
                </tr>

            </table>
        </section>
        <footer>
            <div class="tfooter3">مُسلَم</div>
            <div class="tfooter3">مسئول المخزن</div>
            <div class="tfooter3">المدير العام</div>
            <div class="bfooter"><input type="text" v-model="data_he.recipient_name" class="note1" readonly placeholder="...................."></div>
            <div class="bfooter"><input type="text" v-model="data_he.storage_manger" class="note1" readonly placeholder="...................."></div>
            <div class="bfooter"><input type="text" v-model="data_he.ginral_manger" class="note1" placeholder="...................." readonly></div>
        </footer>
                <button class="btn btn-success save1 style_save_butn" v-on:click="update_addreturn_report(data_he.id_num,storage_settinng_data.type_of_reports)"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                    <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
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
            <div class="bfooter4"><input type="text" v-model="data_he.supplier  " class="supplairs" placeholder="اسم المورد"></div> 
            <div class="bfooter4"><input type="text" v-model="data_he.recipient" class="department" placeholder="الجهة الطالبة"></div> 
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
            <div class="bfooter"><input type="text" v-model="data_he.recipient_name" class="note1" readonly placeholder="...................."></div>
            <div class="bfooter"><input type="text" v-model="data_he.storage_manger" class="note1" readonly placeholder="...................."></div>
        </footer>
                <button class="btn btn-success save1 style_save_butn" v-on:click="update_check_report(data_he.id_num,storage_settinng_data.type_of_reports)"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                    <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
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
                    <th>الكمية المعتمدة</th>
                    <th>كود الصنف</th>
                    <th>الملاحظات</th>
                </tr>
                <tr v-for="data2 in data_tables" :key="data2.id">
                    <td><input type="text" v-model="data2.part_name" class="p_number1" placeholder="..............."></td>
                    <td><input type="number" v-model="data2.part_quantity" class="p_name1" placeholder="..............."></td>
                    <td><input type="number" v-model="data2.part_balance" class="p_Quantety1" placeholder="..............."></td>
                    <td><input type="number" v-model="data2.part_quantity_want" class="Quantety1" placeholder="..............."></td>
                    <td><input type="text" v-model="data2.part_id" class="Quantety1" placeholder="..............."></td>
                    <td><input type="text" v-model="data2.note" class="notes1" placeholder="..............."></td>
                </tr>

            </table>
        </section>
        <footer>
            <div class="tfooter5">
                <div>مسئول المخزن</div>
                <div> الفنى المختص </div>
                <div> مدير المطحن</div>
                <div>المدير العام</div>
                <div> مدير المشتريات</div>
            </div>
            <div class="bfooter5">
                <div><input type="text" v-model="data_he.storag_manage" class="notes1" placeholder="...................." readonly></div>
                <div><input type="text" v-model="data_he.who_want_name" class="notes1" placeholder="...................." readonly></div>
                <div><input type="text" v-model="data_he.milling_manage" class="notes1" placeholder="...................." readonly></div>
                <div><input type="text" v-model="data_he.ginral_manage" class="notes1" placeholder="...................." readonly></div>
                <div><input type="text" v-model="data_he.paying_manage" class="notes1" placeholder="...................." readonly></div>
            </div>
        </footer>
                <button class="btn btn-success save1 style_save_butn" v-on:click="update_ordder_buy_report(data_he.id_num,storage_settinng_data.type_of_reports)"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                    <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
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
            <input type="text" class="department" v-model="data_he.who_want" placeholder=" اسم الفنى">
            <select name="" id=""  v-model="data_he.depart">
                <option>ميكانيكا</option>
                <option>كهرباء</option>
                <option>اخر</option>
            </select>
        </header>
                <section class="Body6" style="direction: rtl;">
                    <table>
                        <tr>
                            <th>اسم الصنف و مواصفاتة</th>
                            <th>الكمية المطلوبة </th>
                            <th>رصيد المخزن</th>
                            <th>الكمية المعتمدة</th>
                            <th>كود الصنف</th>
                            <th>الملاحظات</th>
                        </tr>
                        <tr v-for="data2 in data_tables" :key="data2.id">
                            <td><input type="text" v-model="data2.part_name" class="p_number1" placeholder="..............."></td>
                            <td><input type="number" v-model="data2.part_quantity" class="p_name1" placeholder="..............."></td>
                            <td><input type="number" v-model="data2.part_balance" class="p_Quantety1" placeholder="..............."></td>
                            <td><input type="number" v-model="data2.part_quantity_want" class="Quantety1" placeholder="..............."></td>
                            <td><input type="text" v-model="data2.part_id" class="Quantety1" placeholder="..............."></td>
                            <td><input type="text" v-model="data2.note" class="notes1" placeholder="..............."></td>
                        </tr>

                    </table>
                </section>
                <footer>
                    <div class="tfooter6">
                        <div>مسئول المخزن</div>
                        <div> مدير المطحن</div>
                        <div> مدير المشتريات</div>
                    </div>
                    <div class="bfooter6">
                        <div><input type="text" v-model="data_he.storag_manage" class="notes1" placeholder="...................." readonly></div>
                        <div><input type="text" v-model="data_he.milling_manage" class="notes1" placeholder="...................." readonly></div>
                        <div><input type="text" v-model="data_he.paying_manage" class="notes1" placeholder="...................." readonly></div>
                    </div>
                </footer>
                        <button class="btn btn-success save1 style_save_butn" v-on:click="update_ordder_buy_report1(data_he.id_num,storage_settinng_data.type_of_reports)"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                            <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                            </svg>
                        </button>
            </div>
        </div>


    </div>
</template>


<script>
	import $ from "jquery";
    import axios from 'axios';
    export default 
    {
        mounted() {
            

            axios.post('./login_here').then((res)=>{this.user_login=res.data});

            $('.exit1').click(function(){//push
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
				$('.no-arrow').removeClass('active');
				$('.storages').addClass('active');//exit1
				$('.toolser').click(function(){
					$('.buttons_group').slideToggle();
				});
        },
		data() {
			return {
                storage_settinng_data:{type_of_reports:0},
                table:[],
                typese:'',
                user_login:{},
                data_he:[],
                data_tables:{}
            }
        },
        methods:{
            update_ordder_buy_report1(id,n_table)
            {
                var data_he,data_tables;
                data_he=this.data_he;
                data_tables=this.data_tables;
                axios.post('./update_ordder_buy_report1',{id,n_table,data_he,data_tables})
                .then((response)=>{
                    alert("Done!");
                })
                .catch((response)=>{
                    alert("error syntax")
                });
            },
            update_ordder_buy_report(id,n_table)
            {
                var data_he,data_tables;
                data_he=this.data_he;
                data_tables=this.data_tables;
                axios.post('./update_ordder_buy_report',{id,n_table,data_he,data_tables})
                .then((response)=>{
                    alert("Done!");
                })
                .catch((response)=>{
                    alert("error syntax")
                });
            },
            update_check_report(id,n_table)
            {
                var data_he,data_tables;
                data_he=this.data_he;
                data_tables=this.data_tables;
                axios.post('./update_check_report',{id,n_table,data_he,data_tables})
                .then((response)=>{
                    $('.cover_opp1_1').fadeOut();
                })
                .catch((response)=>{
                    alert("error syntax")
                });
            },
            update_pay_report(id,n_table)
            {
                var data_he,data_tables;
                data_he=this.data_he;
                data_tables=this.data_tables;
                axios.post('./update_pay_report',{id,n_table,data_he,data_tables})
                .then((response)=>{
                    $('.cover_opp1_1').fadeOut();
                })
                .catch((response)=>{
                    alert("error syntax")
                });
            },
            update_add_report(id,n_table)
            {
                var data_he,data_tables;
                data_he=this.data_he;
                data_tables=this.data_tables;
                axios.post('./update_add_report',{id,n_table,data_he,data_tables})
                .then((response)=>{
                    alert("Done!");
                })
                .catch((response)=>{
                    alert("error syntax")
                });
            },
            update_addreturn_report(id,n_table)
            {
                var data_he,data_tables;
                data_he=this.data_he;
                data_tables=this.data_tables;
                axios.post('./update_addreturn_report',{id,n_table,data_he,data_tables})
                .then((response)=>{
                    alert("Done!");
                })
                .catch((response)=>{
                    alert("error syntax")
                });//delet_dp
            },
            delet_dp(id,tables)
            {
                axios.post('./delet_dp',{id,tables})
                .then((res)=>{
                    this.table=res.data;
                });
            },
            show_dp(id,tables)
            {
                axios.post('./get_data_h_b',{id,tables})
                .then((response)=>{
                        this.data_he=response.data.data_h;
                        this.data_tables=response.data.data_table;
                        if(this.typese == 'butn1')
                        {
                            $('.cover_opp1_1').fadeIn();
                        }
                        if(this.typese == 'butn2')
                        {
                            $('.cover_opp2_2').fadeIn();
                        }
                        if(this.typese == 'butn3')
                        {
                            $('.cover_opp3_3').fadeIn();
                        }
                        if(this.typese == 'butn4')
                        {
                            $('.cover_opp4_4').fadeIn();
                        }
                        if(this.typese == 'butn5')
                        {
                            $('.cover_opp5_5').fadeIn();
                        }
                        if(this.typese == 'butn6')
                        {
                            $('.cover_opp6_6').fadeIn();
                        }
                })
                .catch((response)=>{
                    alert("error syntax")
                });
            },
            search_about_reports()
            {
                axios.post('./storage_settinng_data',this.storage_settinng_data)
                .then((response)=>{
                    this.table=response.data.table;
                    this.typese=response.data.ty;
                });
            }
        }
    }
</script>
<!--

            im_ready()
            {
                axios.post('./im_ready_pay',{"*":"*"})
                .then((data)=>{
                    this.id_num=data.data.id;
                })
                .catch((data)=>{
                    alert("error syntaxs");
                });
            },

-->

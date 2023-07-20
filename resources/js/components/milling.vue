<template>

	<div class="pd-ltr-20">
        
        <span v-if="user_login.dep_id == 1 || user_login.dep_id == 15 || user_login.dep_id == 16">
		<div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
            <h3> انــشــاء تــقــاريــر الــطــحــن  </h3>
        </div>
		<div class="card-box pd-20 height-100-p mb-30" style="height: fit-content;padding-bottom: 50px;">
			<div class="align-items-center" style="height:fit-content;">
                <div class="container">
                    <div class="row" style="display: flex;height:50px;margin-bottom:30px">
                        <div class="col col-2">
                            <span v-if="status_report == 'normal'">
                            <input type="submit" class="btn btn-outline-success save add_in_milling" v-on:click="add_in_milling($event)" style="height:60px;width:63px;text-align:center;border-radius: 100%;" value="Save">
                            </span>
                            <span v-else>
                            <input type="submit" class="btn btn-outline-success save add_in_milling" v-on:click="update_in_milling($event)" style="height:60px;width:63px;text-align:center;border-radius: 100%;" value="Save">
                            </span>
                        </div>
                        <div class="dropdown col col-5" style="margin-top:10px">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                ادوات التعديل
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="padding:5px;text-align:center">
                                <li><label for="texts0"> التاريخ </label><input type="date" class="form-control" id="texts0" v-model="data_edit.date"></li>
                                <li><label for="texts0"> الوردية </label><select class="form-control" style="width:100%" v-model="data_edit.shift"> <option>الوردية الاولي</option><option>الوردية الثانية</option><option>الوردية الثالثة</option> </select></li>
                                <li> <button class="btn btn-outline-success" style="margin-top:5px" @click="get_data_report_for_edit($event)">Get Data</button></li>
                            </ul>
                        </div>
                        <div class="col col-5" style="padding-top:10px">
                            <div class="container">
                                <div class="row">
                                    <div class="col col-4"><button class="btn btn-success" v-on:click="give_me_report($event)" style="width:100px;display:flex">search</button></div>
                                    <div class="col col-8"><input type="date" v-model="date_search"  style="width:100%;display:flex" class="form-control"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span v-if="status_report == 'normal'">
                    <table class="table_class"  style="height:fit-content;margin-top:-50px">
                        <thead>
                            <tr class="tr_class">
                                <th class="th_class"  colspan="12"><span style="display: inline-block"><span style="display:inline-block;margin-right:50px;">( <input type="text" name="serul_num" class="serul_num" v-model="data_table.numid" placeholder="............................." style="width:25%;border:none;background-color:inherit;text-align:center" id="" disabled> ) رقم </span>  </span><lable> <span style="display:inline-block"><input type="date" class="emp date_ere" name="date" v-model="data_table.date" placeholder="............................." style="width:90%;border:none;background-color:inherit;margin-top:10px;text-align:center"></span>: التاريخ </lable><lable><span style="display:inline-block"><input type="day" class="emp day_ere" name="day" v-model="data_table.day" placeholder="............................." style="width:40%;border:none;background-color:inherit;margin-top:10px;text-align:right"> :يوم</span></lable></th>
                            </tr>
                            <tr class="tr_class">
                                <th class="th_class" colspan="2" style="width: 14%">القدرة</th>
                                <th class="th_class" rowspan="2" style="width: 5%">الوقت</th>
                                <th class="th_class" rowspan="2" style="width: 7%">نوع العطل</th>
                                <th class="th_class" rowspan="2" style="width: 55%;">سبب التوقف</th>
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
                        <tbody class="tbody_sirz">  
                            <tr class="tr_class">
                                <td class="td_class"><input type="number" class="emp B1" name="B1" v-model="data_table.B[0]" placeholder="............................." style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="number" class="emp A1" name="A1" v-model="data_table.A[0]" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class">
                                    <input type="text" name="the_stop_time1" v-model="data_table.the_stop_time[0]" readonly class="the_stop_time1 emp emp2" style="text-align:center;width:85px;border:none;background-color:inherit" placeholder="............................">
                                </td>
                                <td class="td_class"><input type="text" name="type_error1" v-model="data_table.type_error[0]" class="type_error1 emp" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="text" name="cause_stop1" v-model="data_table.cause_stop[0]" class="cause_stop1 emp" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="time" name="time_start1" v-on:change="change_time(1)" v-model="data_table.time_start[0]" class="time_start1 emp" style="border:none;background-color:inherit"></td>
                                <td class="td_class"><input type="time" name="time_stop1" v-on:change="change_time(1)" v-model="data_table.time_stop[0]" class="time_stop1 emp" style="border:none;background-color:inherit"></td>
                                <td class="td_class">
                                    <select class="emp2 line_start1" name="line_start1" v-model="data_table.line_start[0]" style="border:none;background-color:inherit">
                                        <option value="0">...</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </td>
                                <td class="td_class" rowspan='5'>
                                    <select name="shift" class="shift emp2" v-model="data_table.shift" style="border:none;background-color:inherit">
                                        <option value="0">اختر الوردية</option>
                                        <option>الوردية الاولي</option>
                                        <option>الوردية الثانية</option>
                                        <option>الوردية الثالثة</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="tr_class">
                                <td class="td_class"><input type="number" class="emp B2" name="B2" v-model="data_table.B[1]" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="number" class="emp A2" name="A2" v-model="data_table.A[1]" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class">
                                <input type="text" name="the_stop_time2" v-model="data_table.the_stop_time[1]" readonly class="the_stop_time5 emp emp2" style="text-align:center;width:85px;border:none;background-color:inherit" placeholder="............................">
                                </td>
                                <td class="td_class"><input type="text" class="emp type_error2" v-model="data_table.type_error[1]" name="type_error2" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="text" class="emp cause_stop2" v-model="data_table.cause_stop[1]" name="cause_stop2" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="time" class="emp time_start2" v-on:change="change_time(2)" v-model="data_table.time_start[1]" name="time_start2" style="border:none;background-color:inherit"></td>
                                <td class="td_class"><input type="time" class="emp time_stop2" v-on:change="change_time(2)" v-model="data_table.time_stop[1]" name="time_stop2" style="border:none;background-color:inherit"></td>
                                <td class="td_class">
                                    <select class="emp2 line_start2" name="line_start2" v-model="data_table.line_start[1]" style="border:none;background-color:inherit">
                                        <option value="0">...</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="tr_class">
                                <td class="td_class"><input type="number" class="emp B2" name="B2" v-model="data_table.B[2]" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="number" class="emp A2" name="A2" v-model="data_table.A[2]" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class">
                                <input type="text" name="the_stop_time2" v-model="data_table.the_stop_time[2]" readonly class="the_stop_time5 emp emp2" style="text-align:center;width:85px;border:none;background-color:inherit" placeholder="............................">
                                </td>
                                <td class="td_class"><input type="text" class="emp type_error2" v-model="data_table.type_error[2]" name="type_error2" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="text" class="emp cause_stop2" v-model="data_table.cause_stop[2]" name="cause_stop2" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="time" class="emp time_start2" v-on:change="change_time(3)" v-model="data_table.time_start[2]" name="time_start2" style="border:none;background-color:inherit"></td>
                                <td class="td_class"><input type="time" class="emp time_stop2" v-on:change="change_time(3)" v-model="data_table.time_stop[2]" name="time_stop2" style="border:none;background-color:inherit"></td>
                                <td class="td_class">
                                    <select class="emp2 line_start2" name="line_start2" v-model="data_table.line_start[2]" style="border:none;background-color:inherit">
                                        <option value="0">...</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="tr_class">
                                <td class="td_class"><input type="number" class="emp B2" name="B2" v-model="data_table.B[3]" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="number" class="emp A2" name="A2" v-model="data_table.A[3]" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class">
                                <input type="text" name="the_stop_time2" v-model="data_table.the_stop_time[3]" readonly class="the_stop_time5 emp emp2" style="text-align:center;width:85px;border:none;background-color:inherit" placeholder="............................">
                                </td>
                                <td class="td_class"><input type="text" class="emp type_error2" v-model="data_table.type_error[3]" name="type_error2" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="text" class="emp cause_stop2" v-model="data_table.cause_stop[3]" name="cause_stop2" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="time" class="emp time_start2" v-on:change="change_time(4)" v-model="data_table.time_start[3]" name="time_start2" style="border:none;background-color:inherit"></td>
                                <td class="td_class"><input type="time" class="emp time_stop2" v-on:change="change_time(4)" v-model="data_table.time_stop[3]" name="time_stop2" style="border:none;background-color:inherit"></td>
                                <td class="td_class">
                                    <select class="emp2 line_start2" name="line_start2" v-model="data_table.line_start[3]" style="border:none;background-color:inherit">
                                        <option value="0">...</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="tr_class">
                                <td class="td_class"><input type="number" class="emp B2" name="B2" v-model="data_table.B[4]" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="number" class="emp A2" name="A2" v-model="data_table.A[4]" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class">
                                <input type="text" name="the_stop_time2" v-model="data_table.the_stop_time[4]" readonly class="the_stop_time5 emp emp2" style="text-align:center;width:85px;border:none;background-color:inherit" placeholder="............................">
                                </td>
                                <td class="td_class"><input type="text" class="emp type_error2" v-model="data_table.type_error[4]" name="type_error2" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="text" class="emp cause_stop2" v-model="data_table.cause_stop[4]" name="cause_stop2" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="time" class="emp time_start2" v-on:change="change_time(5)" v-model="data_table.time_start[4]" name="time_start2" style="border:none;background-color:inherit"></td>
                                <td class="td_class"><input type="time" class="emp time_stop2" v-on:change="change_time(5)" v-model="data_table.time_stop[4]" name="time_stop2" style="border:none;background-color:inherit"></td>
                                <td class="td_class">
                                    <select class="emp2 line_start2" name="line_start2" v-model="data_table.line_start[4]" style="border:none;background-color:inherit">
                                        <option value="0">...</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="tr_class">
                            <td class="td_class"><input type="number" class="emp B6" name="B6" v-model="data_table.ZB[0]" placeholder="zb..........." style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                            <td class="td_class"><input type="number" class="emp A6" name="A6" v-model="data_table.ZA[0]" placeholder="za" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                            <td class="td_class" style="padding:5px;position:relative;">الـــقـــمـــح</td>
                            <td class="td_class"  rowspan='4'>الكمية المطحونة</td>
                            <td class="td_class" rowspan='4' colspan="5" style="width: 65%;position:relative;">
                                <span style="width:30%;position:absolute;right:5%;top:10px;height:100px;display:block">مسؤل الوردية<br><input name="shift_manager" v-model="data_table.shift_manager" type="text" class="emp shift_manager" placeholder="............................" style="width:110px;border:none;background-color:inherit;margin-top:10px;text-align:center"></span>
                                <span style="width:32%;position:absolute;left:28%;top:10px;height:100px;display:block">
                                نسبة الاستخراج <br>
                                <h6>A <input type="number" class="emp A7_" name="A7_" v-model="data_table.totalA" placeholder="...ce......." style="width:90px;border:none;background-color:inherit;margin-top:10px;text-align:center">%</h6>
                                <h6>B <input type="number" class="emp B7_" name="B7_" v-model="data_table.totalB" placeholder="...ce......." style="width:90px;border:none;background-color:inherit;text-align:center">%</h6>
                                </span>
                                <span style="width:22%;position:absolute;left:1%;top:10px;height:100px;display:block">مسؤل الكنترول <br><input name="control_manager" type="text" class="emp control_manager" v-model="data_table.control_manager" placeholder="............................" style="width:110px;border:none;background-color:inherit;margin-top:10px;text-align:center"></span>
                            </td>
                            </tr>
                            <tr class="tr_class">
                            <td class="td_class"><input type="number" class="emp B8" name="B8" v-model="data_table.ZB[1]" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                            <td class="td_class"><input type="number" class="emp A8" name="A8" v-model="data_table.ZA[1]" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                            <td class="td_class" style="padding:5px">دقـــيـــق</td>
                            </tr>
                            <tr class="tr_class">
                            <td class="td_class"><input type="number" class="emp B9" name="B9" v-model="data_table.ZB[2]" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                            <td class="td_class"><input type="number" class="emp A9" name="A9" v-model="data_table.ZA[2]" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                            <td class="td_class" style="padding:5px">الســــــــــن</td>
                            </tr>
                            <tr class="tr_class">
                            <td class="td_class"><input type="number" class="emp B10" name="B10" v-model="data_table.ZB[3]" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                            <td class="td_class"><input type="number" class="emp A10" name="A10" v-model="data_table.ZA[3]" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                            <td class="td_class" style="padding:5px">ردة</td>
                            </tr>
                        </tbody>
                    </table>
                </span>
                <span v-else>
                    <table class="table_class"  style="height:fit-content;margin-top:-50px">
                        <thead>
                            <tr class="tr_class">
                                <th class="th_class"  colspan="12"><span style="display: inline-block"><span style="display:inline-block;margin-right:50px;">( <input type="text" name="serul_num" class="serul_num" v-model="now_table_heade.id_num" placeholder="............................." style="width:25%;border:none;background-color:inherit;text-align:center" id="" disabled> ) رقم </span>  </span><lable> <span style="display:inline-block"><input type="date" class="emp date_ere" name="date" v-model="now_table_heade.Date" placeholder="............................." style="width:90%;border:none;background-color:inherit;margin-top:10px;text-align:center"></span>: التاريخ </lable><lable><span style="display:inline-block"><input type="day" class="emp day_ere" name="day" v-model="now_table_heade.Day_Name" placeholder="............................." style="width:40%;border:none;background-color:inherit;margin-top:10px;text-align:right"> :يوم</span></lable></th>
                            </tr>
                            <tr class="tr_class">
                                <th class="th_class" colspan="2" style="width: 14%">القدرة</th>
                                <th class="th_class" rowspan="2" style="width: 5%">الوقت</th>
                                <th class="th_class" rowspan="2" style="width: 7%">نوع العطل</th>
                                <th class="th_class" rowspan="2" style="width: 55%;">سبب التوقف</th>
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
                        <tbody class="tbody_sirz">

                            <tr class="tr_class" v-for="item in now_table" :key="item.id">
                                <td class="td_class"><input type="number" class="emp B2" name="B2" v-model="item.power_b" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="number" class="emp A2" name="A2" v-model="item.power_a" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class">
                                <input type="text" v-model="item.error_time" readonly :class="'adly_time_stop'+item.id+' emp'+' emp2'" style="text-align:center;width:85px;border:none;background-color:inherit">
                                </td>
                                <td class="td_class"><input type="text" class="emp type_error2" v-model="item.error_type" name="type_error2" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="text" class="emp cause_stop2" v-model="item.reason" name="cause_stop2" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                                <td class="td_class"><input type="time" :class="'emp '+'time_start'+item.id" v-on:change="change_time_in_update(item.id,item.time_start)" v-model="item.time_start" name="time_start2" style="border:none;background-color:inherit"></td>
                                <td class="td_class"><input type="time" :class="'emp '+'time_stop'+item.id" v-on:change="change_time_in_update(item.id,item.time_start,item.time_stop)" v-model="item.time_stop" name="time_stop2" style="border:none;background-color:inherit"></td>
                                <td class="td_class">
                                    <select class="emp2 line_start2" name="line_start2" v-model="item.line" style="border:none;background-color:inherit">
                                        <option value="0">...</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </td>

                                <td class="td_class" :rowspan='now_table.length' v-if="item.id == now_table[0].id">
                                    <select name="shift" class="shift emp2" v-model="item.shift" style="border:none;background-color:inherit">
                                        <option value="0">اختر الوردية</option>
                                        <option>الوردية الاولي</option>
                                        <option>الوردية الثانية</option>
                                        <option>الوردية الثالثة</option>
                                    </select>
                                </td>
                            </tr>

                            <tr class="tr_class">
                            <td class="td_class"><input type="number" class="emp B6" name="B6" v-model="now_table_footer.total_wheal_b" placeholder="zb..........." style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                            <td class="td_class"><input type="number" class="emp A6" name="A6" v-model="now_table_footer.total_wheal_a" placeholder="za" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                            <td class="td_class" style="padding:5px;position:relative;">الـــقـــمـــح</td>
                            <td class="td_class"  rowspan='4'>الكمية المطحونة</td>
                            <td class="td_class" rowspan='4' colspan="5" style="width: 65%;position:relative;">
                                <span style="width:30%;position:absolute;right:5%;top:10px;height:100px;display:block">مسؤل الوردية<br><input name="shift_manager" v-model="now_table_footer.shift_manager" type="text" class="emp shift_manager" placeholder="............................" style="width:110px;border:none;background-color:inherit;margin-top:10px;text-align:center"></span>
                                <span style="width:32%;position:absolute;left:28%;top:10px;height:100px;display:block">
                                نسبة الاستخراج <br>
                                <h6>A <input type="number" class="emp A7_" name="A7_" v-model="now_table_footer.ratio_A" placeholder="...ce......." style="width:90px;border:none;background-color:inherit;margin-top:10px;text-align:center">%</h6>
                                <h6>B <input type="number" class="emp B7_" name="B7_" v-model="now_table_footer.ratio_B" placeholder="...ce......." style="width:90px;border:none;background-color:inherit;text-align:center">%</h6>
                                </span>
                                <span style="width:22%;position:absolute;left:1%;top:10px;height:100px;display:block">مسؤل الكنترول <br><input name="control_manager" type="text" class="emp control_manager" v-model="now_table_footer.controll_manager" placeholder="............................" style="width:110px;border:none;background-color:inherit;margin-top:10px;text-align:center"></span>
                            </td>
                            </tr>
                            <tr class="tr_class">
                            <td class="td_class"><input type="number" class="emp B8" name="B8" v-model="now_table_footer.total_Flour_b" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                            <td class="td_class"><input type="number" class="emp A8" name="A8" v-model="now_table_footer.total_Flour_a" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                            <td class="td_class" style="padding:5px">دقـــيـــق</td>
                            </tr>
                            <tr class="tr_class">
                            <td class="td_class"><input type="number" class="emp B9" name="B9" v-model="now_table_footer.total_sien_b" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                            <td class="td_class"><input type="number" class="emp A9" name="A9" v-model="now_table_footer.total_sien_a" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                            <td class="td_class" style="padding:5px">الســــــــــن</td>
                            </tr>
                            <tr class="tr_class">
                            <td class="td_class"><input type="number" class="emp B10" name="B10" v-model="now_table_footer.total_apostasy_b" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                            <td class="td_class"><input type="number" class="emp A10" name="A10" v-model="now_table_footer.total_apostasy_a" placeholder="............................" style="width:100%;border:none;background-color:inherit;margin-top:10px;text-align:center"></td>
                            <td class="td_class" style="padding:5px">ردة</td>
                            </tr>
                        </tbody>
                    </table>
                </span>
			</div>
		</div>
        <report-mill :user_login="user_login" :id_re="id"></report-mill>
        </span>
        <span v-else>
            <div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
                <h2>you can`t enter this page</h2>
            </div>
        </span>
    </div>
</template>


<script>
	import $ from "jquery";
    import axios from 'axios';
    export default {
		props:['max_id'],
        mounted() {
            
			$(".print").click(function () { 
					var mode="iframe";
					var close=mode=="popup";
					var options = {mode:mode,popClose:close};
					$('.content_report').printArea( options );
			});
            $('.add_in_milling').click(function (e) { 
                e.preventDefault();
                $(this).attr('disabled','disabled');
            });
				$('.no-arrow').removeClass('active');
				$('.milling').addClass('active');
            axios.post('./login_here').then((res)=>{this.user_login=res.data});
            axios.post('./git_id_milling').then((res)=>{this.data_table.numid=res.data});
        },
        data() {
            return{
                nnm:1,
                user_login:{},
                items:12,
                data_edit:{shift:1,date:null},
                data_table:{
                    numid:0,
                    shift:0,
                    B:{},
                    A:{},
                    the_stop_time:{},
                    type_error:{},
                    cause_stop:{},
                    time_start:{},
                    time_stop:{},
                    line_start:{},
                    ZB:{},
                    ZA:{},
                },
                date_search:"",
                masse:{},
                status_report:'normal',
                now_table:{},
                now_table_footer:{},
                now_table_heade:{},
                id:0
            }
        },
        methods:{
            get_data_report_for_edit()
            {
                axios.post('./get_data_report_for_edit',{date:this.data_edit.date,shift:this.data_edit.shift})
                .then((res)=>{
                    this.now_table=res.data.body;
                    this.now_table_footer=res.data.footer;
                    this.now_table_heade=res.data.heade;
                    this.status_report='no';
                });
            },
            update_in_milling()
            {
                axios.post('./update_in_milling',{now_table:this.now_table,now_table_footer:this.now_table_footer,now_table_heade:this.now_table_heade})
                .then((res)=>{
                    this.now_table={};
                    this.now_table_footer={};
                    this.now_table_heade={};
                    this.status_report='normal';
                    alert("Done!");
                });
            },
            change_time(id)
            {
                    axios.post('./calcuo', { stop_time: this.data_table.time_stop[id-1],start_time:this.data_table.time_start[id-1] })
                    .then((response) => {
                        this.data_table.the_stop_time[id-1]  = response.data.h+":"+response.data.m+":"+response.data.s;
                    }).catch((error) => {
                        alert("have errors");
                    });
                
                
            },
            change_time_in_update(id,time_starts,time_ends)
            {
                    axios.post('./calcuo', { stop_time: time_ends,start_time:time_starts })
                    .then((response) => {
                        //this.now_table.error_time=response.data.h+":"+response.data.m+":"+response.data.s;
                        $(".adly_time_stop"+id).val(response.data.h+":"+response.data.m+":"+response.data.s);
                    }).catch((error) => {
                        alert("have errors");
                    });
                
                
            },
            give_me_report(e)
            {
                e.preventDefault();
                axios.post('./date_search',{ get_number_report:this.date_search } )
                .then((response)=>{
                        this.id=response.data.id;
						$('.cover_report_master').fadeToggle();
						$('.save_idd').attr('id',response.data.id);
						$('.form_0_shift_1').html(response.data.body1);
						$('.form_0_shift_2').html(response.data.body2);
						$('.form_0_shift_3').html(response.data.body3);
						$('.serul_num').html(response.data.id);
						$('.date_report').text(response.data.day_report);
						$('.day_report').text("اليوم: "+response.data.date_report);
						$('.linne_a').html(response.data.end_re1);
						$('.linne_b').html(response.data.end_re2);
						$('.data_showr').html(response.data.end_table_re);
                })
                .catch((response)=>{alert("error in your action")});
            },
          add_in_milling(event){
                $('.add_in_milling').attr('disabled',true);
                axios.post('./add_in_milling',this.data_table)
                .then((res)=>{
                    alert("success");
                    this.data_table.numid=res.data;
                $('.add_in_milling').attr('disabled',false);
                })
                .catch((res)=>{
                    alert("erro in syntax");
                $('.add_in_milling').attr('disabled',false);
                });
          }
        }
    }
</script>
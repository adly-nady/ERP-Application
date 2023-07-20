<template>

	<div class="pd-ltr-20">
        <span >
		<div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
            <h3>  تــقــاريــر اخــطــار الاعــطــال </h3>
        </div>
		<div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
            <div class="row" style="direction: rtl;text-align:center">
                <div class="col col-4">
                    <label for="text0">ابحث بستخدام:</label>
                    <select class="form-control" v-model="selecter" style="text-align:center" id="text0">
                        <option value="0">التاريخ</option>
                        <option value="1">الاسم</option>
                        <option value="2">الكود</option>
                    </select>
                </div>
                <div class="col col-8">
                    <span v-if="selecter == 1">
                        <label for="text0">الاسم:</label>
                        <input type="text" class="form-control" style="text-align:center" @keyup="search_by_name_milling($event)" placeholder="الاسم">
                    </span>
                    <span v-else-if="selecter == 0">
                        <label for="text0">التاريخ:</label>
                        <input type="date" class="form-control" style="text-align:center" @change="search_by_date_milling($event)">
                    </span>
                    <span v-else-if="selecter == 2">
                        <label for="text0">ادخل الكود:</label>
                        <input type="text" class="form-control" style="text-align:center" @keyup="search_by_code_milling($event)" placeholder="ادخل الكود">
                    </span>
                </div>
            </div>
            <hr>
            <table class="table table-bordered  table-striped">
                <thead>
                    <tr>
                        <th>وحدة التحكم</th>
                        <th>حال الارسالة</th>
                        <th>الملاحظات</th>
                        <th>التاريخ</th>
                        <th>رقم الاذن</th>
                        <th>ما تم عمله</th>
                        <th>من سيقوم بلأصلاح</th>
                        <th>الكود</th>
                        <th>اسم الصنف</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in data_table" :key="item.id">
                        <td style="background-color: white;">
                            <button class="btn btn-success rounded-circle" style="box-shadow:0px 0px 10px 0.2px #2782d0;border-color: #2782d0;background-color: #2782d0;width:50px;height:50px" @click="open_stop_report0_2(item.id_num,'notifacationwrning_db')"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-file-earmark-easel" viewBox="2 2 13 13">
                                    <path d="M8.5 6a.5.5 0 1 0-1 0h-2A1.5 1.5 0 0 0 4 7.5v2A1.5 1.5 0 0 0 5.5 11h.473l-.447 1.342a.5.5 0 1 0 .948.316L7.027 11H7.5v1a.5.5 0 0 0 1 0v-1h.473l.553 1.658a.5.5 0 1 0 .948-.316L10.027 11h.473A1.5 1.5 0 0 0 12 9.5v-2A1.5 1.5 0 0 0 10.5 6h-2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5v-2z"/>
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                </svg>
                            </button>
                            </td>
                        <td v-if="item.if_read == 0 && item.open == 0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                            </svg>
                        </td>
                        <td v-if="item.if_read == 0 && item.open == 1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                            </svg>
                        </td>
                        <td v-if="item.if_read == 1 && item.open == 1 || item.if_read == 1 && item.open == 0">
                            <svg style="color:blue;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                            </svg>
                        </td>
                        <td>{{ item.note }}</td>
                        <td>{{ item.date }}</td>
                        <td>{{ item.id_num }}</td>
                        <td>{{ item.what_did }}</td>
                        <td>{{ item.who_will_fix }}</td>
                        <td>{{ item.part_id }}</td>
                        <td>{{ item.part_name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        </span>
<div class="convert_for_body_notifi">
            <div class="NotifacationWrningReport" style="width:1000px;background-color: white;">

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
                        <input type="radio" disabled id="elctronic" v-model="form_data.department" v-on:change="depart_change()" name="dep" value="4">
                        <label for="mechnical" name="dep">صيانة الميكانيكا :</label>
                        <input type="radio" disabled id="mechnical" v-model="form_data.department" v-on:change="depart_change()" name="dep" value="3">
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
import axios from 'axios'
    export default {//statment_equipment
        mounted() {
             Echo.channel('i_opens')//this channel for get all data from database (notifiction)
            .listen('i_open', (e) => {
                    axios.post('./get_data_milling_reports')//for get all data from database
                    .then((res)=>{
                        this.data_table=res.data;
                    });            
                    axios.post('./login_here').then((res)=>{
                            this.user_login=res.data;
                });
            });
            
            axios.post('./get_data_milling_reports')//for get all data from database
            .then((res)=>{
                this.data_table=res.data;
            });            
            axios.post('./login_here').then((res)=>{
                    this.user_login=res.data;
            });
        },
        data(){
            return{
                form_in_form:{},
                form_data:{},
                user_login:{},
                data_table:{},
                selecter:1
            }
        },
        methods:{
            open_stop_report0_2(id,tables)
            {
                axios.post('./get_data_stop_report',{id:id,tables:tables})
                .then((response)=>{
					$('.convert_for_body_notifi').fadeIn();
                    this.form_data=response.data;
                    axios.post('./get_data_form_in_form',{id:response.data.id_num}).then((res)=>{
                        this.form_in_form=res.data;
                    });
                    this.get_users_of_der();
				}); 
            },
            closes()
            {
                $('.convert_for_body_notifi').fadeOut();
            },
            search_by_name_milling(event)
            {
                axios.post('./search_by_name_milling',{words:event.target.value}).then((res)=>{
                    this.data_table=res.data;
                });
            },
            search_by_date_milling(event)
            {
                axios.post('./search_by_date_milling',{words:event.target.value}).then((res)=>{
                    this.data_table=res.data;
                });
            },
            search_by_code_milling(event)
            {
                axios.post('./search_by_code_milling',{words:event.target.value}).then((res)=>{
                    this.data_table=res.data;
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

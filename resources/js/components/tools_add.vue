<style>
.button_exit{
    cursor: pointer;
}
.NotifacationWrningReport
{
    width: 840px;
    height: 750px;
    margin: 5px auto;
    padding: 7px;
    display: grid;
    grid-template-rows: 29% 63% 8%;
    direction: rtl;
    box-shadow: 0px 0px 20px 5px gray;
    border-radius: 10px;
}
.NotifacationWrningReport input{text-align: center;border: 0px solid white;}
/* ______________________________________________________________________Header_________________________________________________ */
.NotifacationWrningReport Header{
    display: grid;
    grid-template-rows: 15% 15% auto auto auto 20%;
    grid-template-columns: 15% 30% 20% 30%;
    justify-content: space-between;
    align-content: space-around;
    background-image: linear-gradient(#eee , #fff);

}

.NotifacationWrningReport Header h3 ,h4{
    grid-column: span 4;
    text-align: center;
    font-size: 18px;
    margin: 10px;

}
.NotifacationWrningReport Header input{
    justify-self:flex-start;
    font-size: 16px;
    font-weight: bold;
}
.NotifacationWrningReport Header label{
    justify-self:flex-end;
    font-size: 14px;
    font-weight: bold;
}
NotifacationWrningReport Header ,l1{
    justify-self:flex-start;
    font-size: 16px;
    font-weight: bold;
}
.NotifacationWrningReport Header .depart{
    grid-column: span 4;
    text-align: center;
}

/* ______________________________________________________________________Body_________________________________________________ */

.NotifacationWrningReport .body{
    width: 100%;
    display: grid;
    grid-template-rows: 15% 30% 55%;
}
.NotifacationWrningReport .body .tstart{
    width: 100%;
    display: grid;
    grid-template-columns: repeat(3 , 33.3%);
    justify-content: space-around;
    box-shadow: 1px 1px 1px 0px black;
}
.NotifacationWrningReport .body .tstart .section1  , .NotifacationWrningReport .body .tstart  .section2 ,.NotifacationWrningReport .body .tstart  .section3 {
    border: 1px solid black;
    padding: 3px;
}
.NotifacationWrningReport .body .tstart .section1 label , .NotifacationWrningReport .body .tstart  .section2 label,.NotifacationWrningReport .body .tstart  .section3 label{
    text-align: right;
    font-size: 12px;
    font-weight: bold;
}
.NotifacationWrningReport .body .tstart .section1 input , .NotifacationWrningReport .body .tstart  .section2 input,.NotifacationWrningReport .body .tstart  .section3 input{
    text-align: right;
    font-size: 12px;
    font-weight: bold;
    
}
.NotifacationWrningReport .body .tstart .section1 {
    border: 1px solid black;
    padding: 3px;
    display: grid;
    grid-template-rows: 33% 66%;
}
.NotifacationWrningReport .body .tstart  .section2{
    border: 1px solid black;
    padding: 3px;
    display: grid;
    grid-template-columns: 23% 76%;
    grid-template-rows: 49% 49%;
    align-content: space-between;
    align-items: flex-start;

}
.NotifacationWrningReport .body .tstart  .section3{
    border: 1px solid black;
    padding: 3px;
    display: grid;
    grid-template-columns: 40% 60%;
    grid-template-rows: 49% 49%;
    align-content: space-between;
    align-items: center;
}

.NotifacationWrningReport .body .tmeddal{
    padding: 10px;
    display: grid;
    grid-template-rows: 20% 80%;
    align-content: space-between;
    align-items: flex-end;
    text-align: right;
    box-shadow: 1px 1px 1px 0px black;
}
.NotifacationWrningReport .body .tmeddal label{font-size: 16px; font-weight: bold; text-decoration: underline;}
.NotifacationWrningReport .body .tmeddal input{font-size: 16px; font-weight: bold; height: 100%;}

.NotifacationWrningReport .body .tend{
    padding: 3px;
    display: grid;
    grid-template-rows: 15% 85%;
    align-content: center;
    align-items: center;
    box-shadow: 1px 1px 1px 0px black;
}
    
.NotifacationWrningReport .body .tend .th {
    padding: 3px;
    display: grid;
    grid-template-columns: 30% 30% 7% 33%;
    align-content: center;
    text-align: center;
    box-shadow: 0px 1px 2px 0px black;
}
.NotifacationWrningReport .body .tend .td{
    height: 100%;
    padding: 3px;
    display: grid;
    grid-template-columns: 30% 30% 7% 33%;
    grid-template-rows: 100%;
    align-content: flex-start;
    text-align: center;

}

.NotifacationWrningReport .body .tend .td input{ height: 100%;font-size: 15px; font-weight: bold;box-shadow: 1px 1px 1px 0px black;}
.NotifacationWrningReport .body .tend .th label{ font-size: 15px; font-weight: bold;box-shadow: 1px 1px 1px 0px black;}

/* ______________________________________________________________________Footer_________________________________________________ */

.NotifacationWrningReport .footer{

    padding: 3px;
    display: grid;
    grid-template-columns: repeat(3 , 30%);
    justify-content: space-around;
    align-content: space-between;
    text-align: center;

    box-shadow: -5px 28px 20px 0px #eee;
}

.NotifacationWrningReport  .footer label{font-size: 15px; font-weight: bold; text-decoration: underline;}

.NotifacationWrningReport  .footer input{font-size: 15px; font-weight: bold;}
</style>
<template>
	<div class="pd-ltr-20" id="app">
        <span v-if="user_login.dep_id == 16 || user_login.dep_id == 15">
		<div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
            <h3> انــشــاء تــقــاريــر اخــطــار الاعــطــال  </h3>
        </div>

		<div class="card-box height-100-p " style="text-align:center">
        
	<div class="alert_kero">
        <div class="icon_alert_kero">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
              </svg>
        </div>
        <div class="text_alert_kero">your opctins is sucsses</div>
    </div>
            <div class="box_of_tools">
                <div class="card-box pd-20 mb-30 box_of_tools2" style="text-align:center">
                    <span class="button_exit" @click="button_exit()">X</span>
                    <form method="post" class="form-group">
                        <input type="text" class="form-control" v-model="qm_name" placeholder="ادخل اسم المعده">
                        <input type="text" class="form-control" v-model="qm_number" placeholder="ادخل رقم المعده">
                        <button type="submit" class="btn btn-success ssvc" style="margin-top:15px;" v-on:click="inserts_tools($event)">حفظ</button>
                    </form>
                </div>
            </div>
  
        <div class="NotifacationWrningReport table" style="width:950px">
            <header>
                <h3>اخطار اعطال </h3>
                <h4>({{form_data.id_num}})</h4>
                <label for="" class="l1">التاريخ :</label>
                <input type="date" v-model="form_data.date" placeholder="التاريخ">
                <label for="">مكان العطل :</label>
                <input type="text" v-model="form_data.error_location" placeholder="مكان العطل">
                <label for="" class="l1">الجهة الطالبة للاصلاح :</label>
                <input type="text" v-model="form_data.dp_WanteFix" placeholder="الجهة الطالبة للاصلاح">
                <label for="">توقيت بداية العطل :</label>
                <input type="time" v-model="form_data.start_time_error" placeholder="توقيت بداية العطل">
                <label for="">المسئول :</label>
                <input type="text" v-model="form_data.shift_manger" placeholder="المسئول">
                <label for="" class="l1">مسئول الكنترول :</label>
                    <input type="text" v-model="form_data.controll_boy" />
                <div class="depart">
                    <select class="m-auto" style="width:200px" v-model="form_data.department" v-on:change="depart_change()">
                        <option value="0" disabled> اختر الفسم </option>
                        <option value="3"> ميكانيكا </option>
                        <option value="4"> الكهرباء </option>
                        <option value="1"> الطحن </option>
                    </select>
                    <br>
                </div>

            </header>
            <section class="body">
                <div class="tstart">
                    <div class="section1">
                        <label for="">الفنى المكلف  بالاصلاح :</label>
                        <select v-model="form_data.who_will_fix" @change="get_users_of_der()">
                                <option v-for="items in who_fix" :key="items.id">{{items.Signature}}</option>
                        </select>
                    </div>
                    <div class="section2">
                        <label for="">اسم المعدة :</label>
                        <select v-model="form_data.part_name" @change="get_after_change($event)">
                                <option v-for="items in tools_name" :key="items.id">{{items.MQ_name}}</option>
                        </select>
                        <label for="">رقم المعدة :</label>
                        <select v-model="form_data.part_id">
                                <option v-for="items in tools_num" :key="items.id">{{items.MQ_number}}</option>
                        </select>
                    </div>
                    <div class="section3">
                        <label for="">تاريخ بداية الاصلاح :</label>
                        <input type="date" v-model="form_data.start_date_fix" placeholder="تاريخ بداية الاصلاح">
                        <label for="">توقيت بداية الاصلاح :</label>
                        <input type="time" v-model="form_data.start_time_fix" placeholder="توقيت بداية الاصلاح">
                    </div>
                </div>
                <div class="tmeddal">
                    <label for="">المطلوب عملة :</label>
                    <input type="text" v-model="form_data.requerd" name="" id="" placeholder="المطلوب عملة">
                </div>
                <div class="tend">
                    <div class="th">
                        <label for="">ما تم عملة </label>
                        <label for="">قطع الغيار المستخدمة</label>
                        <label for="">العدد</label>
                        <label for="">الملاحظات</label>
                    </div>
                    <div class="td">
                        <input type="text" v-model="form_data.what_did" placeholder="ما تم عملة" readonly>
                        <input type="text" v-model="form_data.part_use" placeholder="قطع الغيار المستخدمة" readonly>
                        <input type="text" v-model="form_data.part_count" placeholder="العدد" readonly>
                        <input type="text" v-model="form_data.note" placeholder="الملاحظات">

                    </div>
                </div>
            </section>
            <footer class="footer">
                <label for=""> القائم بالعمل</label>
                <label for="">الجهة الطالبة للاصلاح </label>
                <label for="">مدير الصيانة</label>
                <input type="text" v-model="form_data.who_fix" placeholder="القائم بالعمل" readonly>
                <input type="text" v-model="form_data.name_WanteFix" placeholder="الجهة الطالبة للاصلاح">
                <input type="text" v-model="form_data.mintanice_manger" placeholder="مدير الصيانة" required>
            </footer>
        </div>
    
        <div class="tools_page">
                <div class="buttons_group">
                    <button class="btn btn-outline-success w-100 tool_add" v-on:click="save_data_stop_report()" type="submit">اضافة</button>
                    <button class="btn btn-outline-primary w-100 tool_equipment" v-on:click="tool_update()" type="submit">اضافة معدة</button>
                    <button class="btn btn-outline-secondary w-100 tool_clear" v-on:click="tool_clear()" type="submit">تفريغ</button>
                </div>
                <button class="btn btn-dark rounded-circle toolser" @click="fun_shows()" style="margin-left: 20%">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-gear m-auto" viewBox="0 0 16 16">
                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                    </svg>
                </button>
        </div>

    </div>
        </span>
        <span v-else>
            <div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
                <h2>لا يمكنك الدخول الى هذة الصفحة </h2>
            </div>
        </span>
    </div>
</template>


<script>
import axios from 'axios';
    export default {
      props:['tooles'],
        mounted() {
        
				$('.no-arrow').removeClass('active');
				$('.milling').addClass('active');
        
				$('.toolser').click(function(){
					$('.buttons_group').fadeToggle();
				});
                $('.ssvc').click(function(){
                $('.box_of_tools').fadeToggle();
                });
            axios.post('./get_all_equ_milling').then((res)=>{ this.tools_name=res.data.MQ_name; this.form_data.id_num=res.data.id_nums; });//id_nums
            axios.post('./get_users_controlle_milling').then((res)=>{ this.users_controllers=res.data; });
            axios.post('./login_here').then((res)=>{
                    this.form_data.controll_boy=res.data.Signature;
                    this.user_login=res.data;
            });

        },
        data() {
            return{
                items:12,
                i:5,
                user_login:{},
                tools_name:{},
                tools_num:{},
                users_controllers:{},
                who_fix:{},
                qm_name:'',
                qm_number:'',
                form_data:{id_num:'',department:0},
                id_activ_user:0,
            }
        },
        methods:{
            button_exit(){$('.box_of_tools').fadeToggle();},
            tool_update(){$('.box_of_tools').fadeToggle();},
            fun_shows(){$('.buttons_group').fadeToggle();},
            tool_clear()
            {
                var id=this.form_data.id_num;
                this.form_data={id_num:id,date:'',error_location:'',dp_WanteFix:'',start_time_error:'',shift_manger:'',department:0,part_name:'',part_id:'',start_date_fix:'',start_time_fix:'',requerd:'',name_WanteFix:''};
                this.form_data.controll_boy=this.user_login.Signature;
            },
            depart_change()//who_fix
            {
                axios.post('./depart_change',{department:this.form_data.department}).then((res)=>{ this.who_fix=res.data; });
            },
            get_after_change(event)
            {
                axios.post('./get_after_change',{tools_name:event.target.value}).then((res)=>{ this.tools_num=res.data; });
            },
            save_data_stop_report()
            {
                axios.post('./save_data_stop_report',this.form_data)
                .then((res)=>{
                    this.form_data={date:'',error_location:'',dp_WanteFix:'',start_time_error:'',shift_manger:'',department:0,part_name:'',part_id:'',start_date_fix:'',start_time_fix:'',requerd:'',name_WanteFix:''};
                    this.form_data['id_num']=res.data;
                      $(".alert_kero").css('display', 'flex');
                      $(".alert_kero").delay(1500).fadeOut();
                        axios.post('./notifi_stop_report/'+this.id_activ_user);
                }).catch((res)=>{
                    alert('syntax');
                });
            },
            get_users_of_der()
            {
                 axios.post('./get_users_of_der',{id:this.form_data.department,seg:this.form_data.who_will_fix})
                 .then((res)=>{
                     this.id_activ_user=res.data.id;
                 })
                 .catch((res)=>{
                     alert("sorry");
                 });
            },
          inserts_tools(e){
              e.preventDefault();
                axios.post('./inserts_tools', {qm_name:this.qm_name,qm_number:this.qm_number})
                .then((res) => {
                    this.tools_name = res.data;
                      $(".alert_kero").css('display', 'flex');
                      $(".alert_kero").delay(1500).fadeOut();})
                .catch((error) => {alert("you have error!")});
          }
        }
    }
</script>
<!--
@include('form_total_work')

    <div class="swal2-container swal2-center swal2-fade swal2-shown caver_miss" style="overflow-y: auto;z-index: 9999;display:none">
        <div aria-labelledby="swal2-title" arixa-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show body_miss">
            <div class="swal2-headerannely gerritsen">
                <ul class="swal2-progresssteps" style="display: none;"></ul>
                <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;">
                    <span class="swal2-x-mark">
                        <span class="swal2-x-mark-line-left"></span>
                        <span class="swal2-x-mark-line-right"></span>
                    </span>
                </div>
                <img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title">Oops...</h2>
                <button type="button" class="swal2-close" style="display: none;">×</button>
                </div>
                <div class="swal2-content">
                    <div id="swal2-content" class="miss" style="display: block;"></div>
                <input class="swal2-input" style="display: none;">
                <input type="file" class="swal2-file" style="display: none;">
                <div class="swal2-range" style="display: none;"></div>
                <div class="swal2-validationerror" id="swal2-validationerror" style="display: none;"></div>
            </div>
            <div class="swal2-actions" style="display: flex;">
                <button type="button" class="swal2-confirm swal2-styled _okey_" aria-label="" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">OK</button>
            </div>
            <div class="swal2-footer" style="display: none;"></div>
        </div>
    </div>


    <div class="swal2-container swal2-center swal2-fade swal2-shown caver_miss2" style="overflow-y: auto;z-index: 9999;display:none">
        <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show body_miss2">
            <div class="swal2-header"><ul class="swal2-progresssteps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div><div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div><div class="swal2-icon swal2-warning" style="display: none;"><span class="swal2-icon-text">!</span></div><div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div><div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title">Success!</h2><button type="button" class="swal2-close" style="display: none;">×</button></div>
                <div class="swal2-content">
                    <div id="swal2-content" class="miss2" style="display: block;"></div>
                <input class="swal2-input" style="display: none;">
                <input type="file" class="swal2-file" style="display: none;">
                <div class="swal2-range" style="display: none;"></div>
                <div class="swal2-validationerror" id="swal2-validationerror" style="display: none;"></div>
            </div>
            <div class="swal2-actions" style="display: flex;">
                <button type="button" class="swal2-confirm swal2-styled _okey_2" aria-label="" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">OK</button>
            </div>
            <div class="swal2-footer" style="display: none;"></div>
        </div>
    </div>

-->
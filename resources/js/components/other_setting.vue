<style>

.alert_keroo
{
    width: 250px;
    height: 45px;
    border: 1px solid #ff3929;
    border-radius: 5px;
    display: none;
    background-color: #ff3929;
    color:white;
    block-size: 45px;
    position: fixed;
    right: 30px;
    top:50px;
    padding: 6.2px;
    padding-left: 7px;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    box-shadow: 0px 0px 10px 0.5px #ff3929;
    z-index: 9999999999999999999999999999999999999999;
    transition: 0.5s;
}
.icon_alert_keroo{
    width:30px;
    height:30px;
    position: relative;
    left: 0px;
    top:0px;
    border-radius: 50%;
    background-color: #ff3929;
    box-shadow:  0px 0px 10px 1px #ff3929;
}
.text_alert_keroo
{
    height:25px;
    position: relative;
    left: 10px;
    top:0px;
    color: rgb(0, 0, 0);
    font-weight: 600;
}
</style>
<template>
<div>
	<div class="pd-ltr-20">
            
        <span v-if="user_login.dep_id == 15">
              
            <div class="card-box pd-20 height-100-p mb-30">
                  <h1 style="text-align:center;font-family: 'Inter';">صــفــحــة اضــافــة الــمــوظـــفــيــن و الــمــديــريــــــــــــن</h1>
            </div>
                  <div class="alert_kero">
                        <div class="icon_alert_kero">
                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                              <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                              <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                              </svg>
                        </div>
                        <div class="text_alert_kero">your opctins is sucsses</div>
                  </div>
                  
                  <div class="alert_keroo">
                        <div class="icon_alert_keroo">
                              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                              <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                              <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                              </svg>
                        </div>
                        <div class="text_alert_keroo">your opctins is sucsses</div>
                  </div>

                        <div class="card-box pd-20 height-100-p mb-30">
                        <div v-if="user['status'] == 'user'">
                              <h1>انت لست مسؤول ولا يمكنك الاطلاع على هذة الصفحة</h1>
                        </div>
                        <div v-else>
                        <form class="form_users" method="POST" enctype="multipart/form-data">
                              <div class="form-group row">
                              <label class="col-sm-12 col-md-2 col-form-label">اختيار صورة</label>
                                    <div class="col-sm-12 col-md-10">
                                          <span class="give_img"><i class="icon-copy fa fa-file-image-o" style="font-size: 200px" aria-hidden="true"></i></span>
                                          <input class="form-control img_click file" type="file" name="file" multiple @change="form_data.file" placeholder="select image" style="display: none">
                                          <label class="error_file" style="color: red;margin-left:250px"></label>
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">اسم المستخدم</label>
                                    <div class="col-sm-12 col-md-10">
                                          <input class="form-control name" v-model="form_data.name" type="text" name="name" placeholder="اسم المستخدم">
                                          <label class="error_name" style="color: red"></label>
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">التوقيع</label>
                                    <div class="col-sm-12 col-md-10">
                                          <input class="form-control signature" v-model="form_data.signature" name="signature" placeholder="التوقيع .." type="signature">
                                          <label class="error_signature" style="color: red"></label>
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">البريد الالكترونى</label>
                                    <div class="col-sm-12 col-md-10">
                                          <input class="form-control email" v-model="form_data.email" name="email" placeholder="example@swiss.com" type="email">
                                          <label class="error_email" style="color: red"></label>
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">رقم الهاتف</label>
                                    <div class="col-sm-12 col-md-10">
                                          <input class="form-control phone" v-model="form_data.phone"  name="phone" placeholder="رقم الهاتف" type="tel">
                                          <label class="error_phone" style="color: red"></label>
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">كلمة المرور</label>
                                    <div class="col-sm-12 col-md-10">
                                          <input class="form-control pass" v-model="form_data.pass" name="pass" placeholder="كلمة المرور" type="password">
                                          <label class="error_pass" style="color: red"></label>
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">فئة القسم ...</label><!--  @lang('message.Officer layer') -->
                                    <div class="col-sm-12 col-md-10">
                                          
                                          <select class="custom-select col-12" v-model="form_data.department" v-if="user['status'] == 'Top_Admin'">
                                                <option disabled value="0">القسم</option>
                                                <option v-for="items in dta" :key="items.id" :value="items.id">{{items.dep_name}}</option>
                                          </select>

                                    </div>

                              </div>
                              <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Officer layer</label><!--  @lang('message.Officer layer') -->
                                    <div class="col-sm-12 col-md-10">
                                          
                                          <select class="custom-select col-12" v-model="form_data.Officer" v-if="user['status'] == 'Admin'">
                                                <option>User</option>
                                          </select>
                                          <select class="custom-select col-12" v-model="form_data.Officer" v-if="user['status'] == 'Top_Admin'">
                                                <option disabled value="0">Officer layer</option>
                                                <option >User</option>
                                                <option >Admin</option>
                                                <option >Top Admin</option>
                                          </select>

                                    </div>

                              </div>
                              <button type="button" class="btn btn-outline-success" v-on:click="save_now_user()" style="margin-left: 45%">حفظ البيانات</button>
                        </form>
                        </div>
                  </div>
        </span>
        <span v-else>
            <div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
                <h2>لا يمكنك الدخول الى هذة الصفحة</h2>
            </div>
        </span>
</div>
<br/>
</div>
</template>


<script>
import $ from "jquery";
import axios from 'axios';
    export default {
		props:['data_user','depart'],
        mounted() {
              
			$('.no-arrow').removeClass('active');
			$('.other_setting').addClass('active');
              $('.give_img').click(function (e) { 
                    $('.file').click();
              });
         $('.file').change(function (e) { 
                  $('.fa-file-image-o').remove();
                  $('.give_img').html("<img src="+URL.createObjectURL(e.target.files[0])+" style='width:100%;height:100%;margin-top:-25px;margin-left:-8px'>");
                  $('.give_img').css('border', '1px solid green');
                  $('.error_file').html(null);
            });
            axios.post('./login_here').then((res)=>{this.user_login=res.data});
        },
	data() {
	      return {
	            user:this.data_user,
                  form_data:{file:'',department:0,Officer:0},
                  dta:this.depart,
                  user_login:{},
	      }
	},
      methods:{
            save_now_user(){
                  axios.post('./save_now_user',this.form_data)
                  .then((response)=>{
                    if(response.data.errors != null)
                    {
                        $('.text_alert_keroo').text("الاسم مكرر");
                        $(".alert_keroo").css('display', 'flex');
                        $(".alert_keroo").delay(3000).fadeOut();
                    }else{ 
                        this.form_data={file:'',department:0,Officer:0};
                      $(".alert_kero").css('display', 'flex');
                      $(".alert_kero").delay(1500).fadeOut();
					$('.cover_opp1_1').fadeOut();
                    }
                  })
                  .catch((res)=>{
                        this.form_data={file:'',department:0,Officer:0};
                  });
            }
      }
    }
</script>

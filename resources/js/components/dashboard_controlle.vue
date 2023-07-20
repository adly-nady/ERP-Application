<style>
.body_hash label{
    text-align: right;
    right: 0px;
    direction: rtl;
    display: block;
}
   .body_hash{
       width: 950px;
       height: 700px;
       position: relative;
       left: 50%;
       top: 50%;
       transform: translate(-50%,-50%);
       display: inline-block;
   }
</style>
<template>

	<div class="pd-ltr-20">
        
        <span v-if="user_login.dep_id == 15">
            
	<div class="alert_kero">
        <div class="icon_alert_kero">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
              </svg>
        </div>
        <div class="text_alert_kero">your opctins is sucsses</div>
    </div>

        <div class="pd-20 card-box mb-30 row">
            <div class="col-xl-3 mb-30 user_click" style="position:relative;left:10px;cursor:pointer">
                <button type="submit" v-on:click="users_show('user')" style="background:none;border:none">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">
                                <div class="progress-data" style="position: relative;height:100px" >
                                    <img src="https://www.kindpng.com/picc/m/699-6997452_administrator-network-icons-system-avatar-computer-transparent-admin.png" style="width: 100%" alt="" srcset="">
                                </div>
                                <div class="widget-data">
                                    <div class="h4 mb-0">users</div>
                                    <div class="weight-600 font-12">لوحة تحكم للبريد الالكترونى لكل المستخدمين</div>
                                </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-xl-3 mb-30 admin_click" style="position:relative;left:12%;cursor:pointer">
                <button type="submit" v-on:click="admins_show('admins')" style="background:none;border:none">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">
                                <div class="progress-data" style="position: relative;height:100px" >
                                    <img src="https://hdfinancialco.com/wp-content/uploads/2016/11/180644.png" style="width: 100%" alt="" srcset="">
                                </div>
                                <div class="widget-data">
                                    <div class="h4 mb-0">admins</div>
                                    <div class="weight-600 font-12">لوحة تحكم للبريد الالكترونى لجميع المسؤولين </div>
                                </div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-xl-3 mb-30 topadmin_click" style="position:relative;left:23%;cursor:pointer">
                <button type="submit" v-on:click="topadmins_show('top_admins')" style="background:none;border:none">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">
                                <div class="progress-data" style="position: relative;height:100px" >
                                    <img src="https://cdn4.vectorstock.com/i/thumb-large/52/38/avatar-icon-vector-11835238.jpg" style="width: 100%" alt="" srcset="">
                                </div>
                                <div class="widget-data">
                                    <div class="h4 mb-0">top admins</div>
                                    <div class="weight-600 font-12">لوحة تحكم للبريد الالكترونى لكل المسؤولين الاعلى</div>
                                </div>
                        </div>
                    </div>
                </button>
            </div>
                                                
        </div>

      <div class="hash_div">
            <div class="pd-20 card-box mb-30 body_hash" style="height: 720px;">
                  <button type="submit" class="btn btn-outline-danger" @click="ex_hash"><i class="icon-copy ion-android-close"></i></button>
                  <div class="row">
                    <form class="row form_user" method="post" enctype="multipart/form-data">
                            <div class="col-md-6 col-sm-12">
                                    <div class="col-sm-12 col-md-12" style="width: 140px;height:210px;margin-left:18%">
                                        <span class="give_img" style="width: 140px;height:210px;margin-left:0%">
                                            <img :src="form_data.img" :alt="form_data.Signature" :title="form_data.Signature">
                                        </span>
                                        <input class="form-control img_click file" type="file" name="img" placeholder="اختر الصورة" style="display: none">
                                        <label class="error_file" style="color: red;margin-left:250px"></label>
                                    </div>
                            </div>
                            <div class="col-md-6 col-sm-12" style="height:fit-content">
                                <div class="form-group">
                                        <label class="error_name"> ادخل اسم المستخدم <span style="color:red">*</span></label>
                                        <input class="form-control name" v-model="form_data.name" type="text" name="name" placeholder="اسم المستخدم">
                                        <label class="error_name" style="color: red"></label>
                                </div>
                                <div class="form-group">
                                        <label class="error_name"> ادخل البريد الالكتروني <span style="color:red">*</span></label>
                                        <input class="form-control email" v-model="form_data.email" name="email" placeholder="example@swiss.com" type="email">
                                        <label class="error_email" style="color: red"></label>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                        <label class="error_name"> ادخل رقم الهاتف <span style="color:red">*</span></label>
                                        <input class="form-control phone" v-model="form_data.phone" name="phone" placeholder="رقم الهاتف" type="tel">
                                        <label class="error_phone" style="color: red"></label>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                        <label class="error_name"> ادخل كلمة السر <span style="color:red">*</span></label>
                                        <input class="form-control pass" v-model="form_data.other_data" name="pass" placeholder="كلمة المرور" type="text">
                                        <label class="error_pass" style="color: red"></label>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                        <label class="error_name"> ادخل التوقيع <span style="color:red">*</span></label>
                                        <input class="form-control" v-model="form_data.Signature" placeholder="التوقيع" type="text">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                        <label class="error_name"> اختر القسم <span style="color:red">*</span></label>
                                          <select class="custom-select col-12" v-model="form_data.dep_id">
                                                <option disabled value="0">القسم</option>
                                                <option v-for="items in dta" :key="items.id" :value="items.id">{{items.dep_name}}</option>
                                          </select>
                                            <label class="error_status" style="color: red"></label>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                        <label class="error_name"> اختر الفئه <span style="color:red">*</span></label>
                                            <select class="custom-select col-12 status"  v-model="form_data.status" disabled>
                                                <option value="0" disabled>اختر...</option> 
                                                <option value="user">User</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Top_Admin">Top Admin</option>
                                            </select>
                                            <label class="error_status" style="color: red"></label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary m-auto" @click="save_change_data_now($event)" style="margin-top:5px">حفظ البيانات</button>
                    </form>
                </div>
            </div>
            
      </div>
      
         <div class="card-box mb-30">
            <section class="table_shose">
                <table class="data-table table nowrap">
                    <thead>
                        <tr>
                            <th style="font-size:13px">الصورة الشخصية</th>
                            <th style="font-size:13px">اسم المستخدم</th>
                            <th style="font-size:13px">البريد الالكترونى</th>
                            <th style="font-size:13px">كلمة المرور</th>
                            <th style="font-size:13px">رقم الهاتف</th>
                            <th style="font-size:13px">اسم القسم</th>
                            <th style="font-size:13px">الصلاحية</th>
                            <th style="font-size:13px">الحالة</th>
                            <th style="font-size:13px">الحذف</th>
                            <th style="font-size:13px">التعديل</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="value in tables_data" :key="value.id">
                            <td><img v-bind:src="value.img" alt="" style="width:100px"></td>
                            <td v-text="value.name"></td>
                            <td v-text="value.email"></td>
                            <td v-text="value.other_data"></td>
                            <td v-text="value.phone"></td>
                            <td v-text="value.dep_name"></td>
                            <td v-text="value.status"></td>
                            <td v-if="value.open == 0">
                                <span class="offline"><i class="icon-copy ion-ios-circle-filled" style="font-size:20px"></i></span>
                            </td>
                            <td v-else>
                                <span class="online"><i class="icon-copy ion-ios-circle-filled" style="font-size:20px"></i></span>
                            </td>
                            <td><a class="dropdown-item Delete_user" stat="user" id="1" style="cursor:pointer;width:fit-content;float:left" @click="delete_users_table(value.id,text_add)"><i class="dw dw-delete-3"></i> حذف</a> </td>
                            <td><a class="dropdown-item Edit_user" stat="user" id="1" style="cursor:pointer;width:fit-content;float:left" @click="edit_users_table(value.id,text_add)"><i class="dw dw-edit2"></i> تعديل</a></td>
                        </tr>
                    </tbody>
                </table>
            </section>
         </div>
        </span>
        <span v-else>
            <div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
                <h2>لا يمكنك الدخول على هذة الصفحة</h2>
            </div>
        </span>
</div>

</template>


<script>
import axios from 'axios';
    export default {
		props:['data_user','depart'],
        mounted() {
        
             Echo.channel('i_opens')//this channel for get all data from database (notifiction)
            .listen('i_open', (e) => {
                axios.post('./get_notifi')
                .then((response)=>{
                    if(this.text_add=='user')
                    {
                        axios.get('./users_show', { params: { text_add: 'user' } })
                            .then(res => this.tables_data = res.data);
                        
                    }
                    if(this.text_add=='admins')
                    {
                        axios.get('./admins_show', { params: { text_add: 'admins' } })
                            .then(res => this.tables_data = res.data);
                    }
                    if(this.text_add=='top_admins')
                    {
                        axios.get('./topadmins_show', { params: { text_add: 'top_admins' } })
                            .then(res => this.tables_data = res.data);
                    }
                })
                .catch((response)=>{alert("error in your action")});
            });
			$('.no-arrow').removeClass('active');
			$('.dashboard_controlle').addClass('active');
            axios.post('./login_here').then((res)=>{this.user_login=res.data});
        },
		data() {
			return {
                dta:this.depart,
				user:this.data_user,
                tables_data:{},
                user_login:{},
                text_add:'',
                form_data:{department:0,status:0},
                data_change:{},
			}
		},
        methods:{//hash_div
            save_change_data_now(e)
            {
                e.preventDefault();
                var data=this.form_data;
                axios.post('./save_change_data_now',data)
                .then((res)=>{
                        if(res.data.error)
                        {
                              alert(res.data.error['data.name'][0]+"\n"+res.data.error['data.Signature'][0]);
                        }else{
                                $('.hash_div').slideUp();
                                $(".alert_kero").css('display', 'flex');
                                $(".alert_kero").delay(1500).fadeOut();
                                this.tables_data = res.data;
                        }
                }).catch((res)=>{
                    alert('Error !');
                });
            },
            ex_hash()
            {
                $('.hash_div').slideUp();
            },
            edit_users_table(id,nameta){
                axios.post('./edit_users_table',{id:id,name:nameta})
                .then((res)=>{
                    this.form_data = res.data;
                    $('.hash_div').fadeIn();
                }).catch((res)=>{
                    alert('Error !');
                });
            },
            delete_users_table(id,nameta){
                axios.post('./delete_users_table',{id:id,name:nameta})
                .then((res)=>{
                    this.tables_data = res.data;
                }).catch((res)=>{
                    alert('Error !');
                });
            },
            users_show(name){
                this.text_add=name;
            axios.get('./users_show', { params: { text_add: name } })
                .then(res => this.tables_data = res.data)
                .catch(error => {});
            },
            admins_show(name){
                this.text_add=name;
            axios.get('./admins_show', { params: { text_add: name } })
                .then(res => this.tables_data = res.data)
                .catch(error => {});
            },
            topadmins_show(name){
                this.text_add=name;
            axios.get('./topadmins_show', { params: { text_add: name } })
                .then(res => this.tables_data = res.data)
                .catch(error => {});
            }
        }
    }
</script>

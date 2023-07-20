<template>
<div>
        <div class="pd-20 card-box row">
            <h1 style="text-align:center;font-family: 'Inter';">الـصـفـحـة الاعــدادات الـشـخـصـيـة</h1>
        </div>
        
	<div class="pd-ltr-20">



		<div class="card-box pd-20 height-100-p mb-30">
            <div class="form-group row">
                  <label class="col-sm-12 col-md-2 col-form-label">تحديد صورة</label>
                  <div class="col-sm-12 col-md-10">
                        <span class="give_img"><img class="img_real" v-bind:src="user['img']" alt="" srcset=""></span>
                        
                        <input class="form-control img_click file" @change="file" enctype="multipart/form-data" type="file" name="file" placeholder="اختيار صورة" style="display: none">
                        <label class="error_file" style="color: red;margin-left:250px"></label>
                  </div>
            </div>
            <div class="form-group row">
                  <label class="col-sm-12 col-md-2 col-form-label">اسم المستخدم</label>
                  <div class="col-sm-12 col-md-10">
                        <input class="form-control name" type="text" name="name" v-model="user.name" placeholder="اسم المستخدم">
                        <label class="error_name" style="color: red"></label>
                  </div>
            </div>
            <div class="form-group row">
                  <label class="col-sm-12 col-md-2 col-form-label">التوقيع</label>
                  <div class="col-sm-12 col-md-10">
                        <input class="form-control signature" v-model="user.Signature" name="signature" placeholder="التوقيع .." type="signature">
                        <label class="error_signature" style="color: red"></label>
                  </div>
            </div>
            <div class="form-group row">
                  <label class="col-sm-12 col-md-2 col-form-label">البريد الالكترونى</label>
                  <div class="col-sm-12 col-md-10">
                        <input class="form-control email" name="email" v-model="user.email" placeholder="example@swiss.com" type="email">
                        <label class="error_email" style="color: red"></label>
                  </div>
            </div>
            <div class="form-group row">
                  <label class="col-sm-12 col-md-2 col-form-label">رقم الهاتف</label>
                  <div class="col-sm-12 col-md-10">
                        <input class="form-control phone" v-model="user.phone" name="phone" placeholder="رقم الهاتف" type="tel">
                        <label class="error_phone" style="color: red"></label>
                  </div>
            </div>
            <div class="form-group row">
                  <label class="col-sm-12 col-md-2 col-form-label">كلمة المرور</label>
                  <div class="col-sm-12 col-md-10">
                        <input class="form-control pass" v-model="user.pass" name="pass" placeholder="كلمة المرور" type="password">
                        <label class="error_pass" style="color: red"></label>
                  </div>
            </div>
            <div class="form-group row">
                  <label class="col-sm-12 col-md-2 col-form-label">نوع القسم</label><!--  @lang('message.Officer layer') -->
                  <div class="col-sm-12 col-md-10">

                        <select class="custom-select col-12" v-model="user.dep_id" disabled>
                              <option disabled value="0">القسم</option>
                              <option v-for="items in dta" :key="items.id" :value="items.id">{{items.dep_name}}</option>
                        </select>

                  </div>

            </div>
            <div class="form-group row">
                  <label class="col-sm-12 col-md-2 col-form-label">نوع الصلاحية</label><!--  @lang('message.Officer layer') -->
                  <div class="col-sm-12 col-md-10">

                        <select disabled class="custom-select col-12" v-if="user['status'] == 'user'">
                              <option value="1" selected>User</option>
                        </select>
                        <select disabled class="custom-select col-12" v-if="user['status'] == 'Admin'">
                              <option value="1" selected>Admin</option>
                        </select>
                        <select disabled class="custom-select col-12" v-if="user['status'] == 'Top_Admin'">
                              <option value="1" selected>Top_Admin</option>
                        </select>

                  </div>

            </div>
            <button type="submit" class="btn btn-outline-success change_my_data0" v-on:click="change_my_data($event)" v-bind:id="user.id" style="margin-left: 45%">حفظ البيانات الخاصة بي</button>
            </div>
      </div>
<br>
      </div>
</template>


<script>
    export default {
		props:['data_user','depart'],
        mounted() {
        
			$('.no-arrow').removeClass('active');
			$('.setting_person').addClass('active');
        },
		data() {
			return {
                        dta:this.depart,
				user:this.data_user,
                        file:'',
			}
		},
		methods:{
                  change_my_data(event)
                  {
                        event.preventDefault();
                        axios.post('./change_my_data', { data: this.user ,img:this.file })
                        .then((res)=>{//error
                        if(res.data.error)
                        {
                              alert(res.data.error['data.name'][0]+"\n"+res.data.error['data.Signature'][0]);
                        }else{
                              alert('success');
                              this.user = res.data;
                        }
                              
                        })
                        .catch(error => {});
                        $('.user-name').html(this.user['status']+'/'+this.user['name']);
                  }
            }
    }
</script>

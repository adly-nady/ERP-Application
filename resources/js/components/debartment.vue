<template>
<div>
    

        <span v-if="user_login.dep_id == 15">

    <div class="card-box pd-20 mb-30 container" style="text-align:center">
        <h3>صفحة التحكم </h3>
    </div>
    <div class="card-box pd-20 mb-30 container">
        <div class="row">
            <div class="col col-9 m-auto" style="text-align:center">
                <label for="myBrowser">انشاء قسم جديد:</label>
                    <input type="list" list="browsers" style="width:250px;border:none;box-shadow:0px 0px 5px 1px gray;padding:5px;border-radius:10px" v-model="dep_name" id="myBrowser" name="myBrowser" placeholder="enter the name of department" />
                    
                    <button class="btn btn-outline-primary save_ele" v-on:click="create_dep()">حفظ</button>
                    <button class="btn btn-outline-primary update_ele" style="display:none" v-on:click="update_dep()">تعديل</button>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col col-11 m-auto">
                <div class="col col-9 m-auto">
                    <table class="table table-light" style="text-align:center">
                        <thead>
                            <tr>
                                <th>حذف</th>
                                <th>تعديل</th>
                                <th>الاسم</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in items" :key="item.id">
                                <td><button class="btn btn-outline-danger" v-on:click="delete_element(item.id)">حذف</button></td>
                                <td><button class="btn btn-outline-success" v-on:click="edit_element(item.id)">تعديل</button></td>
                                <td>{{item.dep_name}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
        </span>
        <span v-else>
            <div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
                <h2>لا يمكنك الوصول الى هذة الصفحة</h2>
            </div>
        </span>
</div>
</template>


<script>
import axios from 'axios';
    export default {
      props:['depart'],
        mounted() {
        
				$('.no-arrow').removeClass('active');
				$('.debartment_setting').addClass('active');
        
				$('.toolser').click(function(){
					$('.buttons_group').fadeToggle();
				});
            axios.post('./login_here').then((res)=>{this.user_login=res.data});
        },
        data() {
            return{
                items:this.depart,
                dep_name:"",
                ids:0,
                user_login:{},
            }
        },
        methods:{
            create_dep()
            {
                var dep_name=this.dep_name;
                axios.post('./create_dep',{dep_name})
                .then((response)=>{this.items=response.data.items;this.dep_name=null;});
            },
            delete_element(id)
            {
                axios.post('./delete_element',{id})
                .then((response)=>{this.items=response.data.items});
            },
            edit_element(id)
            {
                $('.update_ele').fadeIn();
                $('.save_ele').hide();
                this.ids=id;
                axios.post('./edit_element',{id})
                .then((response)=>{this.dep_name=response.data.items});
            },
            update_dep()
            {
                axios.post('./update_element',{id:this.ids,dep_name:this.dep_name})
                .then((response)=>{
                    $('.update_ele').hide();
                    $('.save_ele').fadeIn();
                    this.items=response.data.items;
                    this.dep_name=null;
                    });
            }
        }
    }
</script>
<!--
@include('form_total_work')
<datalist id="browsers">
                        <option>Chrome</option>
                        <option>Chrome2</option>
                        <option>Chrome3</option>
                        <option>Chrome4</option>
                        <option>Chrome5</option>
                    </datalist>

    <div class="swal2-container swal2-center swal2-fade swal2-shown caver_miss" style="overflow-y: auto;z-index: 9999;display:none">
        <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show body_miss">
            <div class="swal2-header">
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
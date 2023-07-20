<template>
	<div class="pd-ltr-20">
    

        <span v-if="user_login.dep_id == 17 || user_login.dep_id == 15">
            
		<div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
            <h3>لوحة تحكم لاسعار المشتريات</h3>
        </div>
		<div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
        <div class="row">
           
                    <table class="table table-striped border" style="text-align:center">
                        <thead>
                            <tr>
                                <th>التاريخ</th>
                                <th>امين المخزن</th>
                                <th>السعر</th>
                                <th>الكمية الوارد</th>
                                <th>الكود</th>
                                <th>اسم الصنف</th>
                                <th>زر الحفظ</th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center">
                            <tr>  
                                <td><input type="text" class="form-control" v-model="data_form.date" style="text-align:center" placeholder="........................"></td>
                                <td><input type="text" class="form-control" v-model="data_form.recipient" style="text-align:center" placeholder="........................"></td>
                                <td><input type="text" class="form-control" v-model="data_form.price" style="text-align:center" placeholder="........................"></td>
                                <td><input type="text" class="form-control" v-model="data_form.income_quantity" style="text-align:center" placeholder="........................"></td>
                                <td><input type="text" class="form-control" v-model="data_form.id_part" style="text-align:center" placeholder="........................"></td>
                                <td><input type="text" class="form-control" v-model="data_form.name_f" style="text-align:center" placeholder="........................"></td>
                                <td><button class="btn btn-outline-primary" @click="save_now_change_buy()"> حفظ </button></td>
                            </tr>
                        </tbody>

                    </table>
        </div>
        <hr>
        <div class="row" style="direction: rtl;text-align:center">
            <div class="col col-5">
                <label for="text0">ابحث بستخدام:</label>
                <select class="form-control" v-model="selecter" style="text-align:center">
                    <option value="0">التاريخ</option>
                    <option value="1">الاسم</option>
                    <option value="2">الكود</option>
                </select>
            </div>
            <div class="col col-7">
                <span v-if="selecter == 1">
                    <label for="text0">الاسم:</label>
                    <input type="text" class="form-control" style="text-align:center" @keyup="search_by_name_buy($event)" placeholder="الاسم">
                </span>
                <span v-else-if="selecter == 0">
                    <label for="text0">التاريخ:</label>
                    <input type="date" class="form-control" style="text-align:center" @change="search_by_date_buy($event)">
                </span>
                <span v-else-if="selecter == 2">
                    <label for="text0">ادخل الكود:</label>
                    <input type="text" class="form-control" style="text-align:center" @keyup="search_by_code_buy($event)" placeholder="ادخل الكود">
                </span>
                <span v-else>
                    <h3>لا خيار ...</h3>
                </span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col col-12 m-auto">
                <div class="col col-12 m-auto">
                    <table class="table table-striped border" style="text-align:center">
                        <thead>
                            <tr>
                                <th>تحديد</th>
                                <th>التاريخ</th>
                                <th>امين المخزن</th>
                                <th>السعر</th>
                                <th>الكمية الوارد</th>
                                <th>الكود</th>
                                <th>اسم الصنف</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in data_table" :key="item.id">  
                                <td> <button class="btn btn-outline-success" @click="select_item(item)">تحديد</button> </td>
                                <td v-text="item.date"></td>
                                <td v-text="item.recipient"></td>
                                <td v-text="item.price"></td>
                                <td v-text="item.income_quantity"></td>
                                <td v-text="item.id_part"></td>
                                <td v-text="item.name_f"></td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <button class="btn btn-outline-dark" style="position: fixed;bottom:5px;right:5px" @click="clearing()"> تفريغ </button>
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
      props:['depart'],
        mounted() {
            axios.post('./get_data_buy_sec').
            then((res)=>{
                this.data_table=res.data;
            });
            axios.post('./login_here').then((res)=>{
                    this.user_login=res.data;
            });
        },
        data() {
            return{
                data_table:{},
                selecter:1,
                data_form:{},
                user_login:{}
            }
        },
        methods:{
            select_item(item)
            {
                this.data_form=item;
            },
            clearing()
            {
                this.data_form={};
            },
            search_by_name_buy(event)
            {
                axios.post('./search_by_name_buy',{words:event.target.value}).then((res)=>{
                    this.data_table=res.data;
                });

            },
            search_by_date_buy(event)
            {
                axios.post('./search_by_date_buy',{date:event.target.value}).then((res)=>{
                    this.data_table=res.data;
                });
            },
            search_by_code_buy(event)
            {
                axios.post('./search_by_code_buy',{code:event.target.value}).then((res)=>{
                    this.data_table=res.data;
                });
            },
            save_now_change_buy()
            {
                axios.post('./save_now_change_buy',this.data_form).then((res)=>{
                    this.data_table=res.data;
                    this.data_form={};
                });
            }
        }
    }
</script>
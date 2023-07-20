<template>

	<div class="pd-ltr-20">
        <span v-if="user_login.dep_id == 17 || user_login.dep_id == 15">
            
		<div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
            <h3> الـــتــــقـــريـــر الـــعـــــام للــــــحــركـــة </h3>
        </div>
		<div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
            <div class="row" style="direction: rtl;text-align:center">
                <div class="col col-4">
                    <label for="text0">ابحث بستخدام:</label>
                    <select class="form-control" v-model="selecter" style="text-align:center" id="text0">
                        <option value="0">التاريخ</option>
                        <option value="1">الاسم</option>
                        <option value="2">الكود</option>
                        <option value="3">نوع الأذن</option>
                        <option value="4">مسئول المخزن</option>
                        <option value="5">المستلم</option>
                        <option value="6">القسم</option>
                    </select>
                </div>
                <div class="col col-8">
                    <span v-if="selecter == 1">
                        <label for="text0">الاسم:</label>
                        <input type="text" class="form-control" style="text-align:center" @keyup="search_by_name_buy_two($event)" placeholder="الاسم">
                    </span>
                    <span v-else-if="selecter == 0">
                        <label for="text0">التاريخ:</label>
                        <input type="date" class="form-control" style="text-align:center" @change="search_by_date_buy_two($event)">
                    </span>
                    <span v-else-if="selecter == 2">
                        <label for="text0">ادخل الكود:</label>
                        <input type="text" class="form-control" style="text-align:center" @keyup="search_by_code_buy_two($event)" placeholder="ادخل الكود">
                    </span>
                    <span v-else-if="selecter == 3">
                        <label for="text0">نوع الأذن:</label>
                        <input type="text" class="form-control" style="text-align:center" @keyup="search_by_type_report_buy_two($event)" placeholder="نوع الأذن">
                    </span>
                    <span v-else-if="selecter == 4">
                        <label for="text0">مسئول المخزن:</label>
                        <input type="text" class="form-control" style="text-align:center" @keyup="search_by_menager_storage_buy_two($event)" placeholder="مسئول المخزن">
                    </span>
                    <span v-else-if="selecter == 5">
                        <label for="text0">المستلم:</label>
                        <input type="text" class="form-control" style="text-align:center" @keyup="search_by_recipted_report_buy_two($event)" placeholder="المستلم">
                    </span>
                    <span v-else-if="selecter == 6">
                        <label for="text0">الــقــســم:</label>
                        <input type="text" class="form-control" style="text-align:center" @keyup="search_by_name_of_department_buy_two($event)" placeholder="الــقــســم">
                    </span>
                </div>
            </div>
            <hr>
            <table class="table table-bordered  table-striped">
                <thead>
                    <tr>
                        <th>المستلم</th>
                        <th>نوع الاذن</th>
                        <th>مسئول المخزن</th>
                        <th>التكلفه</th>
                        <th>السعر</th>
                        <th>الكمية</th>
                        <th>الوحده</th>
                        <th>القسم</th>
                        <th>التاريخ</th>
                        <th>الكود</th>
                        <th>اسم الصنف</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in data_table" :key="item.id">
                        <td>{{ item.recipient_name }}</td>
                        <td>{{ item.my_name }}</td>
                        <td>{{ item.storage_manger }}</td>
                        <td>{{ item.Cost }}</td>
                        <td>{{ item.price }}</td>
                        <td>{{ item.part_count }}</td>
                        <td>{{ item.part_unit }}</td>
                        <td>{{ item.department_name }}</td>
                        <td>{{ item.date }}</td>
                        <td>{{ item.part_id }}</td>
                        <td>{{ item.part_name }}</td>
                    </tr>
                </tbody>
            </table>
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
import axios from 'axios'
    export default {
        mounted() {
            axios.post('./get_data_ge_report')
            .then((res)=>{
                this.data_table=res.data;
            });
            axios.post('./login_here').then((res)=>{
                    this.user_login=res.data;
            });
        },
        data(){
            return{
                user_login:{},
                data_table:{},
                selecter:1
            }
        },
        methods:{
            search_by_name_buy_two(event)
            {
                axios.post('./search_by_name_buy_two',{words:event.target.value}).then((res)=>{
                    this.data_table=res.data;
                });
            },
            search_by_date_buy_two(event)
            {
                axios.post('./search_by_date_buy_two',{words:event.target.value}).then((res)=>{
                    this.data_table=res.data;
                });
            },
            search_by_code_buy_two(event)
            {
                axios.post('./search_by_code_buy_two',{words:event.target.value}).then((res)=>{
                    this.data_table=res.data;
                });
            },
            search_by_type_report_buy_two(event)
            {
                axios.post('./search_by_type_report_buy_two',{words:event.target.value}).then((res)=>{
                    this.data_table=res.data;
                });
            },
            search_by_menager_storage_buy_two(event)
            {
                axios.post('./search_by_menager_storage_buy_two',{words:event.target.value}).then((res)=>{
                    this.data_table=res.data;
                });///
            },
            search_by_recipted_report_buy_two(event)
            {
                axios.post('./search_by_recipted_report_buy_two',{words:event.target.value}).then((res)=>{
                    this.data_table=res.data;
                });
            },
            search_by_name_of_department_buy_two(event)
            {
                axios.post('./search_by_name_of_department_buy_two',{words:event.target.value}).then((res)=>{
                    this.data_table=res.data;
                });
            },
        }
    }
</script>

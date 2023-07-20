<template>

	<div class="pd-ltr-20">
        <span v-if="user_login.dep_id == 17 || user_login.dep_id == 15">
            
		<div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
            <h3> بــيــانــات قــطــع الــغــيــار </h3>
        </div>
		<div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
            <div class="row" style="direction: rtl;text-align:center">
                <div class="col col-4">
                    <label for="text0">ابحث بستخدام:</label>
                    <select class="form-control" v-model="selecter" style="text-align:center" id="text0">
                        <option value="1">الاسم</option>
                        <option value="2">الكود</option>
                    </select>
                </div>
                <div class="col col-6">
                    <span v-if="selecter == 1">
                        <label for="text0">الاسم:</label>
                        <input type="text" class="form-control" style="text-align:center" @keyup="search_by_name_buy_two2($event)" placeholder="الاسم">
                    </span>
                    <span v-else-if="selecter == 2">
                        <label for="text0">ادخل الكود:</label>
                        <input type="text" class="form-control" style="text-align:center" @keyup="search_by_code_buy_two2($event)" placeholder="ادخل الكود">
                    </span>
                </div>
                <div class="col col-2">
                    <label for="text0"> اجمالي التكلفة:</label>
                    <input type="number" class="form-control" v-model="totals_price" style="text-align:center" id="text0" readonly>
                </div>
            </div>
            <hr>
            <table class="table table-bordered  table-striped">
                <thead>
                    <tr>
                        <th>التكلفة</th>
                        <th>السعر</th>
                        <th>الرصيد</th>
                        <th>الكود</th>
                        <th>اسم الصنف</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in data_table" :key="item.id">
                        <td>{{ item.Cost }}</td>
                        <td>{{ item.price }}</td>
                        <td>{{ item.Balance }}</td>
                        <td>{{ item.part_id }}</td>
                        <td>{{ item.Name }}</td>
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
            axios.post('./get_data_ge_report2')
            .then((res)=>{
                this.data_table=res.data.data;
                this.totals_price=res.data.totals;
            });
            axios.post('./login_here').then((res)=>{
                    this.user_login=res.data;
            });
        },
        data(){
            return{
                user_login:{},
                data_table:{},
                selecter:1,
                totals_price:0
            }
        },
        methods:{
            search_by_name_buy_two2(event)
            {
                axios.post('./search_by_name_buy_two2',{words:event.target.value}).then((res)=>{
                this.data_table=res.data.data;
                this.totals_price=res.data.totals;
                });
            },
            search_by_code_buy_two2(event)
            {
                axios.post('./search_by_code_buy_two2',{words:event.target.value}).then((res)=>{
                this.data_table=res.data.data;
                this.totals_price=res.data.totals;
                });
            },
        }
    }
</script>

<template>

	<div class="pd-ltr-20">
        <span v-if="user_login.dep_id == 2 || user_login.dep_id == 15">
		<div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
            

            <h3>قسم أضافة قطع الغيار للمخزن</h3>
            <hr>

            <div class="row g-2" style="direction: rtl;">
                <div class="col-md">
                    <div class="form-floating" style="direction: rtl;">
                    <input type="text" v-model="data.part_name" class="form-control" style="direction: rtl;" id="floatingInputGrid" placeholder="---------------" value="">
                    <label for="floatingInputGrid">ادخل اسم قطعة الغيار</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                    <select class="form-select" v-model="data.part_depart" id="floatingSelectGrid" aria-label="Floating label select example">
                        <option disabled value="0">اختر القسم</option>
                        <option v-for="item in daparts" :key="item.id">{{item.dep_name}}</option>
                    </select>
                    <label for="floatingSelectGrid">كل الاقسام</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                    <input type="text" v-model="data.part_id" class="form-control" style="direction: rtl;" id="floatingInputGrid" placeholder="---------------" value="">
                    <label for="floatingInputGrid">رقم قطعة الغيار</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                    <input type="text" v-model="data.type_quantity" class="form-control" style="direction: rtl;" id="floatingInputGrid" placeholder="---------------" value="">
                    <label for="floatingInputGrid">الوحده</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                    <input type="text" v-model="data.minimum_quantity" class="form-control" style="direction: rtl;" id="floatingInputGrid" placeholder="---------------" value="">
                    <label for="floatingInputGrid">الحد الادني من رصيد قطعة الغيار</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                    <input type="text" v-model="data.part_type" class="form-control" style="direction: rtl;" id="floatingInputGrid" placeholder="---------------" value="">
                    <label for="floatingInputGrid">تصنيف المعده</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row g-2">
                <div class="col-10">
                    <div class="form-floating" v-if="btns=='one'">
                        <button class="btn btn-success" style="width:150px;margin-left:200px" @click="save_add_new_tools()">حفظ</button>
                    </div>
                    <div class="form-floating" v-if="btns=='two'">
                        <button class="btn btn-success" style="width:150px;margin-left:200px" @click="update_add_new_tools()">تغيير</button>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-floating">
                        <input type="search" class="form-control" style="height:30px;padding:2px;margin-top:5px;" v-model="live_text" @keyup="live_search_of_qu()" placeholder="بحث ...">
                    </div>
                </div>
            </div>


            
            <br>
            <table class="table table-striped border">
                <thead>
                    <tr>
                        <th style="width:100px">الحذف</th>
                        <th style="width:100px">التعديل</th>
                        <th style="width:100px">القسم التابع له</th>
                        <th style="width:100px">التصنيف</th>
                        <th style="width:100px">الحد الادني</th>
                        <th style="width:100px">الوحدة</th>
                        <th style="width:150px">اسم الصنف</th>
                        <th style="width:100px">الكود</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in table_datas" :key="item.id">
                        <td style="width:100px"><button class="btn btn-danger" @click="delete_this_ele(item.id)" style="box-shadow: 0px 0px 5px 1px red">حذف</button></td>
                        <td style="width:100px"><button class="btn btn-info" @click="edit_this_ele(item.id)" style="box-shadow: 0px 0px 5px 1px #17a2b8">تعديل</button></td>
                        <td style="width:100px">{{item.part_depart}}</td>
                        <td style="width:100px">{{item.part_type}}</td>
                        <td style="width:100px">{{item.minimum_quantity}}</td>
                        <td style="width:100px">{{item.type_quantity}}</td>
                        <td style="width:150px">{{item.part_name}}</td>
                        <td style="width:100px">{{item.part_id}}</td>
                    </tr>
                </tbody>
            </table>


        </div>
        
        </span>
        <span v-else>
            <div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
                <h2>لا يمكنك الدخول الى هذة الصفحة</h2>
            </div>
        </span>

        <br>
    </div>


</template>


<script>
import axios from 'axios'
    export default {
        props:['depart'],
        mounted() {
            axios.post('./get_all_data')
            .then((res)=>{
                this.table_datas=res.data.table;
            });
            axios.post('./login_here').then((res)=>{this.user_login=res.data});
        },
        data(){
            return{
                btns:'one',
                daparts:this.depart,
                data:{part_depart:0},
                table_datas:{},
                live_text:'',
                user_login:{},
            }
        },
        methods:{
            live_search_of_qu()
            {
                axios.post('./live_search_of_qu',{live_text:this.live_text})
                .then((res)=>{
                    this.table_datas=res.data.table;
                })
                .catch((res)=>{
                    alert("syntax");
                });
            },
            update_add_new_tools()
            {
                axios.post('./update_add_new_tools',this.data)
                .then((res)=>{
                    this.data={};
                    this.btns='one';
                    this.table_datas=res.data.table;
                })
                .catch((res)=>{
                    alert("syntax");
                });
            },
            edit_this_ele(id)
            {
                    this.data.ides=id;
                axios.post('./edit_this_ele',{id:id})
                .then((res)=>{
                    this.data=res.data.row;
                    this.btns='two';
                })
                .catch((res)=>{
                    alert("syntax");
                });
            },
            delete_this_ele(id)
            {
                axios.post('./delete_this_ele',{id:id})
                .then((res)=>{
                    this.table_datas=res.data.table;
                })
                .catch((res)=>{
                    alert("syntax");
                });
            },
            save_add_new_tools()
            {
                axios.post('./save_add_new_tools',this.data)
                .then((res)=>{
                    this.table_datas=res.data.table;
                    this.data={};
                })
                .catch((res)=>{
                    alert("syntax");
                });
            }
        }
    }
</script>

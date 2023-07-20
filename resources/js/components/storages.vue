<style>
.clo_dro{
    position: fixed;
    right: 1px;
    bottom: 1px;
}
</style>
<template>

	<div class="pd-ltr-20" id="app">
        <span v-if="user_login.dep_id == 2 || user_login.dep_id == 15">

		<div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
            <h3>المخزن</h3>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col" style="width:170px;margin:0px"><button class="btn btn-outline-dark m-1 butn1" style="width:170px" @click="poen0()">أذن صرف</button></div>
                    <div class="col" style="width:170px;margin:0px"><button class="btn btn-outline-dark m-1 butn2" style="width:170px" @click="poen1()">أذن أضافة</button></div>
                    <div class="col" style="width:170px;margin:0px"><button class="btn btn-outline-dark m-1 butn3" style="width:170px" @click="poen2()">أذن أضافة مرتجع</button></div>
                    <div class="col" style="width:170px;margin:0px"><button class="btn btn-outline-dark m-1 butn4" style="width:170px" @click="poen3()">أذن فحص</button></div>
                    <div class="col" style="width:170px;margin:0px"><button class="btn btn-outline-dark m-1 butn5" style="width:170px" @click="poen4()">أذن طلب شراء جديد</button></div>
                    <div class="col" style="width:170px;margin:0px"><button class="btn btn-outline-dark m-1 butn6" style="width:170px" @click="poen5()">أذن طلب شراء</button></div>
                </div>
            </div>
            <br>
            <table class="table table-dark table-striped" style="border-radius:10px" >
                    <tr style="border-radius:10px" v-for="item in selected_data" :key="item.id">
                        <td style="width:100px" v-text="item.Balance"></td>
                        <td style="width:100px" v-text="item.part_id"></td>
                        <td style="width:150px" v-text="item.Name"></td>
                    </tr>
            </table>
            <br>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col col-6 m-auto" v-if="choose_search == 1">
                        <h5>search by name</h5>
                        <h3><input type="search" class="form-control" v-model="search_storage" @keyup="live_search_storage_name()" placeholder="بحث عن ........"></h3>
                    </div>
                    <div class="col col-7" v-if="choose_search == 2">
                        <h5>search by code</h5>
                        <h3><input type="search" class="form-control" v-model="search_storage" @keyup="live_search_storage_code()" placeholder="بحث عن ........"></h3>
                    </div>
                    <div class="col col-5 m-auto">
                        <h5>search by</h5>
                            <select v-model="choose_search" class="form-control"> 
                                <option value="1">الاسم</option>
                                <option value="2">الكود</option>
                            </select>
                    </div>
                </div>
            </div>
            <br>
            <table class="table table-striped border">
                <thead>
                    <tr>
                        <th style="width:100px">تحديد</th>
                        <th style="width:100px">الرصيد</th>
                        <th style="width:100px">الكود</th>
                        <th style="width:300px">اسم الصنف</th>
                    </tr>
                </thead>
                <tbody>

                    <tr v-for="item in datas" :key="item.id">
                        <td style="width:200px">
                            <div class="form-check">
                                <input class="form-check-input myCheckbox" type="checkbox" @click="selected_datas($event,item)" style="width:30px;height:30px;">
                            </div>
                        </td>
                        <td style="width:100px" v-text="item.Balance"></td>
                        <td style="width:100px" v-text="item.part_id"></td>
                        <td style="width:150px" v-text="item.Name"></td>
                    </tr>
                </tbody>

            </table>
        </div>
        
            <input class="btn btn-danger clo_dro" value="تفريغ" type="button" @click="empty_lists()">
        </span>
        <span v-else>
            <div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
                <h2>you can`t enter this page</h2>
            </div>
        </span>
        <add-Report v-bind:id_num_add="id_num_add2" :data_bs="selected_data" :departs="departs"></add-Report>
        <addReturn-Report v-bind:id_num_return_add="id_num_return_add" :data_bs="selected_data" :departs="departs"></addReturn-Report>
        <chack-Report v-bind:id_num_check_report="id_num_check_report" :data_bs="selected_data" :departs="departs"></chack-Report>
        <pay-part v-bind:id_num_pay="id_num_pay" :data_bs="selected_data" :departs="departs"></pay-part>
        <payRequest-Report1 v-bind:id_num_order_pay1="id_num_order_pay1" :data_bs="selected_data" :departs="departs"></payRequest-Report1>
        <payRequest-Report2 v-bind:id_num_order_pay2="id_num_order_pay2" :data_bs="selected_data" :departs="departs"></payRequest-Report2>
    </div>


</template>


<script>
	import $ from "jquery";
    import axios from 'axios';
    export default 
    {
        props:['id_num_pay','id_num_add','id_num_return_add','id_num_check_report','id_num_order_pay1','id_num_order_pay2','depart'],
        mounted() {
            axios.post('./login_here').then((res)=>{
                this.user_login=res.data;

                    Echo.channel('my-channel'+res.data.id)//this channel for get all data from database (notifiction)
                    .listen('who_pay', (e) => {
                            axios.post('./get_all_equp')
                            .then((response)=>{
                                this.datas=response.data;
                            });
                    });
                    Echo.channel('show_data_equps')//this channel for get all data from database (notifiction)
                    .listen('show_data_equp', (e) => {
                            axios.post('./get_all_equp')
                            .then((response)=>{
                                this.datas=response.data;
                            });
                    });
                    
                });
           
				$('.no-arrow').removeClass('active');
				$('.storages').addClass('active');
				$('.toolser').click(function(){
					$('.buttons_group').slideToggle();
				});
            axios.post('./get_all_equp')
            .then((res)=>{
                this.datas=res.data;
            });
        },
        data(){
            return{
                counters:[],
                datas:{},
                selected_data:[],
                departs:this.depart,
                id_num_pay:parseInt(this.id_num_pay),
                id_num_add2:parseInt(this.id_num_add),
                id_num_return_add:parseInt(this.id_num_return_add),
                id_num_check_report:parseInt(this.id_num_check_report),
                id_num_order_pay1:parseInt(this.id_num_order_pay1),
                id_num_order_pay2:parseInt(this.id_num_order_pay2),
                messages:"",
                search_storage:null,
                user_login:{},
                choose_search:1,
                statu:{},
            }
        },
        methods:{
            empty_lists(){
                $(':checkbox').prop('checked', false);
                for (let index = -1; index <= this.selected_data.length; index++) {
                    this.selected_data.shift();
                    
                }
            },
            poen0(){$('.cover_opp1').fadeIn();}
            ,poen1(){$('.cover_opp2').fadeIn();}
            ,poen2(){$('.cover_opp3').fadeIn();},
            poen3(){$('.cover_opp4').fadeIn();}
            ,poen4(){$('.cover_opp5').fadeIn();}
            ,poen5(){$('.cover_opp6').fadeIn();},
            selected_datas(event,d)
            {
                if(event.target.checked)
                {
                    this.selected_data.push(d);
                }
                else
                {
                    this.selected_data.pop(d);
                }
            },
            live_search_storage_name()
            {   
                axios.post('./live_search_storage_name',{search_storage:this.search_storage})
                .then((res)=>{
                    this.datas=res.data;
                });
            },
            live_search_storage_code()
            {   
                axios.post('./live_search_storage_code',{search_storage:this.search_storage})
                .then((res)=>{
                    this.datas=res.data;
                });
            }
        }
    }
</script>
<!--


	<div class="dropdown-menu dropdown-menu-right show_notifi">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								<li>
									<a href="#">
										<img src="./vendors/images/generate-report-icon.png" alt="">
										<h3>John Doe</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
							</ul>
						</div>
					</div>

            im_ready()
            {
                axios.post('./im_ready_pay',{"*":"*"})
                .then((data)=>{
                    this.id_num=data.data.id;
                })
                .catch((data)=>{
                    alert("error syntaxs");
                });
            },

-->

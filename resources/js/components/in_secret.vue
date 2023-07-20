<template>

	<div class="pd-ltr-20" id="app">
		<div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
            <div class="container">
                <div class="row">
                    <div class="col col-4">
                        <h5>search</h5>
                        <h3><input type="search" class="form-control" placeholder="بحث عن........"></h3>
                    </div>
                    <div class="col col-4">
                        <h5>sorting </h5>
                        <select value="0" class="form-control">
                            <option value="0"> التاريخ </option>
                            <option value="1"> الكمية الاكبر </option>
                            <option value="2"> الكمية الاصغر </option>
                        </select>
                    </div>
                    <div class="col col-4">
                        <h5>sections</h5>
                        <select class="form-control">
                            <option disabled value="0" selected>اختر القسم</option>
                            <option v-for="item in departs" :key="item.id" :value="item.id">{{ item.dep_name }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <table class="table table-striped border">
                <thead>
                    <tr>
                        <th style="width:100px">الحذف</th>
                        <th style="width:100px">التعديل</th>
                        <th style="width:100px">صرف</th>
                        <th style="width:100px">أضافة</th>
                        <th style="width:100px">الرصيد</th>
                        <th style="width:100px">الكود</th>
                        <th style="width:300px">اسم الصنف</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width:100px"><button class="btn btn-danger" style="box-shadow: 0px 0px 5px 1px red">حذف</button></td>
                        <td style="width:100px"><button class="btn btn-info" style="box-shadow: 0px 0px 5px 1px #17a2b8">تعديل</button></td>
                        <td style="width:100px"><button class="btn btn-outline-primary">صرف</button></td>
                        <td style="width:100px"><button class="btn btn-outline-success">أضافة</button></td>
                        <td style="width:100px">124</td>
                        <td style="width:100px">565432</td>
                        <td style="width:300px">سيليندر</td>
                    </tr>
                    <tr>
                        <td style="width:100px"><button class="btn btn-danger" style="box-shadow: 0px 0px 5px 1px red">حذف</button></td>
                        <td style="width:100px"><button class="btn btn-info" style="box-shadow: 0px 0px 5px 1px #17a2b8">تعديل</button></td>
                        <td style="width:100px"><button class="btn btn-outline-primary">صرف</button></td>
                        <td style="width:100px"><button class="btn btn-outline-success">أضافة</button></td>
                        <td style="width:100px">124</td>
                        <td style="width:100px">565432</td>
                        <td style="width:300px">سيليندر</td>
                    </tr>
                    <tr>
                        <td style="width:100px"><button class="btn btn-danger" style="box-shadow: 0px 0px 5px 1px red">حذف</button></td>
                        <td style="width:100px"><button class="btn btn-info" style="box-shadow: 0px 0px 5px 1px #17a2b8">تعديل</button></td>
                        <td style="width:100px"><button class="btn btn-outline-primary">صرف</button></td>
                        <td style="width:100px"><button class="btn btn-outline-success">أضافة</button></td>
                        <td style="width:100px">124</td>
                        <td style="width:100px">565432</td>
                        <td style="width:300px">سيليندر</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
	<div class="tools_page" style="width: 150px;">
			<div class="buttons_group rounded" style="background-color: rgba(220, 220, 220, 0.85);padding-right:20px">
				<button class="btn btn-outline-dark w-100 m-1 butn1" type="submit" v-on:click="one_click('pay')">أذن صرف</button>
				<button class="btn btn-outline-dark w-100 m-1 butn2" type="submit" v-on:click="one_click('add')">أذن أضافة</button>
				<button class="btn btn-outline-dark w-100 m-1 butn3" type="submit" v-on:click="one_click('re_add')">أذن أضافة مرتجع</button>
				<button class="btn btn-outline-dark w-100 m-1 butn4" type="submit" v-on:click="one_click('check')">أذن فحص</button>
				<button class="btn btn-outline-dark w-100 m-1 butn5" type="submit" v-on:click="one_click('buy')">أذن طلب شراء اول مرة</button>
				<button class="btn btn-outline-dark w-100 m-1 butn6" type="submit" v-on:click="one_click('buy2')">أذن طلب شراء</button>
			</div>
			<button class="btn btn-success rounded toolser" style="margin-left: 30%">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
			</button>
	</div>
        <add-Report v-bind:id_num_add="id_num_add2" :departs="departs"></add-Report>
        <addReturn-Report v-bind:id_num_return_add="id_num_return_add" :departs="departs"></addReturn-Report>
        <chack-Report v-bind:id_num_check_report="id_num_check_report" :departs="departs"></chack-Report>
        <pay-part v-bind:id_num_pay="id_num_pay" :departs="departs"></pay-part>
        <payRequest-Report1 v-bind:id_num_order_pay1="id_num_order_pay1" :departs="departs"></payRequest-Report1>
        <payRequest-Report2 v-bind:id_num_order_pay2="id_num_order_pay2" :departs="departs"></payRequest-Report2>
    </div>


</template>


<script>
import axios from 'axios';
    export default 
    {
        props:['id_num_pay','id_num_add','id_num_return_add','id_num_check_report','id_num_order_pay1','id_num_order_pay2','depart'],
        mounted() {
           
	

            for (let index = 1; index <= 6; index++) {
            $('.butn'+index).click(function(){
                $('.cover_opp'+index).fadeIn();
            });
            }
            for (let index = 1; index <= 6; index++) {
            $('.exit'+index).click(function(){
                $('.cover_opp'+index).fadeOut();
            });
            }
            
				$('.no-arrow').removeClass('active');
				$('.storages').addClass('active');
				$('.toolser').click(function(){
					$('.buttons_group').slideToggle();
				});
        },
        data(){
            return{
                departs:this.depart,
                id_num_pay:parseInt(this.id_num_pay),
                id_num_add2:parseInt(this.id_num_add),
                id_num_return_add:parseInt(this.id_num_return_add),
                id_num_check_report:parseInt(this.id_num_check_report),
                id_num_order_pay1:parseInt(this.id_num_order_pay1),
                id_num_order_pay2:parseInt(this.id_num_order_pay2),
                messages:"",
            }
        },
        methods:{
            test_pusher()
            {
                axios.post('./do_event_two');
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
                axios.post('/im_ready_pay',{"*":"*"})
                .then((data)=>{
                    this.id_num=data.data.id;
                })
                .catch((data)=>{
                    alert("error syntaxs");
                });
            },

-->

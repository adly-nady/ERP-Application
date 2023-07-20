<template>

	<div class="pd-ltr-20">

        <span v-if="user_login.dep_id == 15">

		<div class="card-box pd-20 height-100-p mb-30">
			<div class="cover_op">
				<form method="POST" class="display_op" >
					<div style="width:100%">
						<div style="width:100%;text-align: center">

							<h4 style="position: absolute;left:35%;top:10%;">اضافة بريد الكترونى<button type="button" class="float-right btn btn-outline-danger hide_option" @click="ex_bodys()" style="margin-top:-12%;margin-right:-110%"><i class="icon-copy dw dw-exit"></i></button></h4>
							<div class="form-group has-success">
								<input type="text" class="form-control mail_sen" v-model="text_val" placeholder="كتابة البريد الالكترونى" style="margin-top: 10px">
								<label class="form-control-label has_error" style="color:red;display:none;position:absolute">اضافة بريد الكترونى</label>
							</div>
							<button type="submit" class="float-center btn btn-outline-primary Add_mail" v-on:click="Add_mail($event)" id="ops_mail" style="margin-top:15%">اضافة</button>
							<button type="submit" class="float-center btn btn-outline-primary update_mail" v-on:click="update_mail($event)" id="ops_mail" style="margin-top:15%">تعديل</button>
						</div>
					</div>
				</form>
			</div>
		<div class="pd-ltr-20">
			<div class="card-box mb-30">
				<h2 class="h4 pd-20 title_mal" id="title_mal">البريد الالكترونى<button type="submit" class="float-right btn btn-outline-primary show_option" @click="addeding()" >اضافة</button></h2>
				<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                    <table class="table data-table nowrap dataTable no-footer dtr-inline collapsed" id="DataTables_Table_0" role="grid" style="width: 100%">
					<thead>
						<tr role="row">
                            <th class="sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 90%;" aria-label="Name: activate to sort column ascending">البريد الالكترونى</th>
                            <th style="text-align: center">تعديل</th>
                            <th style="text-align: center">حذف</th>
                        </tr>
					</thead>
					<tbody class="body_table">
                            <tr v-for="mail in data_mails" :key="mail.id" v-bind:class="'raw'+mail.id" v-bind:id="mail.id">
                                <td>
                                    <h5 v-bind:class="'font-16 email'+mail.id">{{mail['email']}}</h5>
                                </td>
                                <td>
                                    <button type="submit" class="rounded dropdown-item Edit" v-on:click="editz($event)" v-bind:id="mail.id"><i class="dw dw-edit2"></i>تعديل</button>
                                </td>
                                <td>
                                    <button type="submit" class="rounded dropdown-item Drop" v-on:click="dropz($event)" v-bind:id="mail.id"><i class="dw dw-delete-3"></i>حذف</button>
                                </td>
                            </tr>
                    </tbody>
				</table></div></div><div class="row"><div class="col-sm-12 col-md-5"></div><div class="col-sm-12 col-md-7"></div></div></div>
			</div>
		</div>
		</div>
		
        </span>
        <span v-else>
            <div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
                <h2>لا يمكنك الدخول الى هذة الصفحة</h2>
            </div>
        </span>

		</div>

</template>


<script>
	import $ from "jquery";
    export default {
		props:['mails'],
        mounted() {
			
			$('.no-arrow').removeClass('active');
			$('.add_email').addClass('active');
            axios.post('./login_here').then((res)=>{this.user_login=res.data});
        },
        data() {
            return{
				data_mails:this.mails,
				text_val:'',
				ram_id:null,
                user_login:{},
            }
        },
		methods:{
			sendering(){
            	axios.post('./sender_');
			},
			addeding(){
				$('.cover_op').fadeIn();
					$('.update_mail').hide();
					$('.Add_mail').show();
				$('.mail_sen').removeClass('form-control-danger');
			},
			Add_mail(event){
				event.preventDefault();
            axios.post('./Add_mail', { text_add: this.text_val })
                .then((res) => {
					this.data_mails = res.data;
					$('.cover_op').hide();
					$('.update_mail').hide();
					$('.Add_mail').hide();
					this.text_val='';
				});
			},
			ex_bodys(){
					$('.cover_op').fadeOut();
					$('.update_mail').hide();
					$('.Add_mail').hide();
					this.text_val='';
			}
			,
			dropz(event){
				event.preventDefault();
            axios.post('./dropz',{ text_add: event.target.id })
                .then(res => this.data_mails = res.data);
			},

			editz(event){
				event.preventDefault();
            axios.post('./editz',{ id_text: event.target.id })
                .then((res) => {
					this.text_val = res.data;
					this.ram_id=event.target.id;
					$('.cover_op').fadeIn();
					$('.update_mail').show();
					$('.Add_mail').hide();
				});
			},

			update_mail(event){
				event.preventDefault();
            axios.post('./update_mail',{ id_text: this.ram_id , text_add: this.text_val  })
                .then((res) => {
					this.data_mails = res.data;
				$('.cover_op').fadeOut();
				$('.update_mail').hide();
				$('.Add_mail').hide();
				});
			}

		},
    }
</script>

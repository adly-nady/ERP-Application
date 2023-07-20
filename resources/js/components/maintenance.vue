<template>

	<div id="app">
		
        <span v-if="user_login.dep_id == 3 || user_login.dep_id == 15">

		<div class="card-box pd-10 height-100-p mb-15 row">
			<div class="card pd-10 col-6">
				<table class="table">
					<thead>
						<tr>
							<th style="text-align: center;" scope="col">وصف ما يجب القيام به</th>
							<th style="text-align: center;" scope="col">تاريخ اليوم</th>
							<th style="text-align: center;" scope="col">القسم</th>
							<th style="text-align: center;" scope="col">حذف و تعديل</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="maintenances in maintenance" :key="maintenances.id">
							<td style="text-align: center;">{{maintenances.title}}</td>
							<td style="text-align: center;">{{maintenances.date}}</td>
							<td style="text-align: center;">{{maintenances.type_dep}}</td>
							<td style="text-align: center;"><button class="btn btn-success p-1" style="font-size:13px" v-bind:id="maintenances.id" v-on:click="tool_edit($event)">تعديل</button> <button class="btn btn-danger p-1" style="font-size:13px" v-bind:id="maintenances.id" v-on:click="tool_drop($event)">حذف</button></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="card pd-10 col-6 row" style="margin-left:5px;">

				<div class="mb-3 row">
					<div class="col-sm-10">
					<select v-model="data_set.type" class="form-control">
						<option value="0">اختر القسم</option>
						<option value="1">الميكانيكة</option>
						<option value="2">الكهرباء</option>
					</select>
					</div>
					<label for="inputname_of_section" class="col-sm-2 col-form-label">اسم القسم</label>
				</div>
				<div class="mb-3 row">
					<div class="col-sm-10">
					<input type="date" v-model="data_set.date" class="form-control" id="inputdate">
					</div>
					<label for="inputdate" class="col-sm-2 col-form-label">التاريخ</label>
				</div>
				<div class="mb-3 row">
					<div class="col-sm-10">
					<textarea style="width:100%;height:200px" v-model="data_set.texter" name="inputtextarea"></textarea>
					</div>
					<label for="inputtextarea" class="col-sm-2 col-form-label">ما تم القيام به</label>
				</div>

			</div>
			<div class="card pd-10 col-10 m-auto" >
				<FullCalendar :options="calendarOptions" :eventsources="eventSources" />
			</div>
		</div>
		
			<div class="tools_page">
					<div class="buttons_group">
						<button class="btn btn-outline-success w-100 tool_add" v-on:click="tool_add()" type="submit">اضافة</button>
						<button class="btn btn-outline-primary w-100 tool_update" v-on:click="tool_update()" type="submit">تعديل</button>
						<button class="btn btn-outline-secondary w-100 tool_clear" v-on:click="tool_clear()" type="submit">تفريغ</button>
					</div>
					<button class="btn btn-dark rounded-circle toolser" @click="toolser()" style="margin-left: 20%">
						<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-gear m-auto" viewBox="0 0 16 16">
							<path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
							<path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
						</svg>
					</button>
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
    import FullCalendar from '@fullcalendar/vue'
    import dayGridPlugin from '@fullcalendar/daygrid'
    import axios from 'axios'
	import $ from "jquery"
    export default {
		props:['maintenance_db'],
        mounted() {
				$('.no-arrow').removeClass('active');
				$('.maintenance').addClass('active');
            axios.post('./login_here').then((res)=>{this.user_login=res.data});
			axios.post('./maintenance_db').then((res)=>{
				this.maintenance=res.data;
  				this.calendarOptions['eventSources'] = [res.data];
				});
        },
		data() {
			return {
                user_login:{},
				maintenance:this.maintenance_db,
                data_set:{type:0,date:'',texter:''},
                id:'1',
                data_get:{type_dep:0,date:'',title:''},
				calendarOptions: {
					plugins: [ dayGridPlugin ],
					initialView: 'dayGridMonth',
					eventSources: [this.maintenance_db]
				}
			}
		},
        methods:{
			toolser()
			{
				$('.buttons_group').fadeToggle();
			},
            tool_add(){
            axios.get('./tool_add', { params: { text_add: this.data_set } })
			.then((response) => {
  				this.calendarOptions['eventSources'] = [response.data];
				this.maintenance = response.data;
			}).catch(error => {alert('error!')});

            },
            tool_update(){
            axios.get('./tool_update', { params: { text_add: this.data_set , id:this.id } })
			.then((response) => {
  				this.calendarOptions['eventSources'] = [response.data];
				this.maintenance = response.data;
			}).catch(error => {});

            },
            tool_edit(event){
			this.id=event.target.id;
            axios.get('./tool_edit', { params: { id: event.target.id } })
			.then((res) => {
				this.data_set['type']=res.data['type_dep']== 'الكهرباء'? '2':'1';
				this.data_set['date']=res.data['date'];
				this.data_set['texter']=res.data['title'];
			}).catch(error => {alert('error!')});

            },
            tool_drop(event){
            axios.get('./tool_drop', { params: { id: event.target.id } })
			.then((response) => {
  				this.calendarOptions['eventSources'] = [response.data];
				this.maintenance = response.data;
			}).catch(error => {alert('error!')});

            },
            tool_clear(){
				this.data_set['type']=0;
				this.data_set['date']='';
				this.data_set['texter']='';
            }
        }
    }
</script>
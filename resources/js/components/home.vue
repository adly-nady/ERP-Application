<template>
	<div class="pd-ltr-20" id="app">
		<div class="card-box pd-20 height-100-p mb-30" style="text-align:center">
				<h1>welcome mr/{{ this.data_user.name }}</h1>
			<hr>
			<div class="card pd-10 col-10 m-auto" >
				<FullCalendar :options="calendarOptions" :eventsources="eventSources" />
			</div>
		</div>
    </div>
</template>


<script>
    //import dayGridPlugin from '@fullcalendar/daygrid'
    import FullCalendar from '@fullcalendar/vue'
    import dayGridPlugin from '@fullcalendar/daygrid'
import axios from 'axios'
    export default {
		props:['maintenance_db','data_user'],
        mounted() {
			axios.post('./i_open');
			axios.post('./maintenance_db').then((res)=>{
				this.maintenance=res.data;
  				this.calendarOptions['eventSources'] = [res.data];
				});
			$('.no-arrow').removeClass('active');
			$('.sections').addClass('active');
        },
		data() {
			return {
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
    }
</script>
<!--
{{--

{{ Auth::guard('users')->user()->name??'' }}{{ Auth::guard('admins')->user()->name??'' }}{{ Auth::guard('top_admins')->user()->name??'' }}

--}}
-->

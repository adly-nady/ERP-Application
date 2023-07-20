<style>
.woraning{
    margin-top: -12px;
}
.notifi_counts2 {
    width: 17px;
    height: 17px;
    background-color: rgb(0, 156, 0);
    color: white;
    border-radius: 15px;
    position: absolute;
    right: -160%;
    top: 20%;
    text-align: center;
    display: block;
    font-size: 10px;
    padding-top: 2px;
}
</style>
<template>

<div>

	<div class="user-notification" style="height: 100%;width: 30px;text-align: center;padding: 0px;padding-bottom:5px">
		<div class="dropdown">
                <span v-if="this.user_login.dep_id == 2">
			<a class="dropdown-toggle no-arrow notifi_showe_2" @click="notifi_showe_2()" role="button" data-toggle="dropdown">
                
                    <div class="woraning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                            <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                        </svg>
                    </div>
                    <span class="notifi_counts2">{{count_data_notifi}}</span>
			</a>
                </span>
		</div>
	</div>
    
	<div class="dropdown-menu dropdown-menu-right show_notifi2_2" style="position:fixed;top:9%;right:12%;overflow:auto;width:220px">
		<div class="notification-list mx-h-350 customscroll">
            <div v-if="isObjectEmpty(data_notifi)">
                جميع الارصيده في حال جيد
            </div>
            <div v-else>
                <span>
                    <ul>
                        <li v-for="datas in data_notifi" :key="datas.id">
                            <a style="text-align:center">
                                <img src="https://e7.pngegg.com/pngimages/438/417/png-clipart-computer-icons-report-icon-design-draw-big-prizes-miscellaneous-angle.png" alt="">
                                <h3 style="font-size:15px;">الاسم:{{datas.Name}},العدد:<span style="color:red;font-size:15px;">{{datas.Balance}}</span></h3>
                                <p style="font-size:12px;"> من فضلك قم بعمل طلب شراء </p>
                            </a>
                        </li>
                    </ul>
                </span>
            </div>
        </div>
    </div>
</div>


</template>


<script>
import axios from 'axios'
    export default {
        mounted() {
            
            axios.post('./login_here').then((res)=>{
            this.user_login=res.data;

                axios.post('./get_all_qup_need_order_buy').then((res)=>{
                    this.data_notifi=res.data.data;
                    this.count_data_notifi=res.data.counts;
                });
                if(res.data.dep_id == 2){
                    Echo.channel('channels_buy_report_count')//this channel for get all data from database (notifiction)
                    .listen('count_buy_report', (e) => {
                        axios.post('./get_all_qup_need_order_buy')
                        .then((res)=>{
                        this.data_notifi=res.data.data;
                        this.count_data_notifi=res.data.counts;
                            if(res.data.counts != 0)
                                this.run_not();
                        });
                    });
                }else{
                    Echo.channel('channels_buy_report_countss')//this channel for get all data from database (notifiction)
                    .listen('count_buy_reportss', (e) => {
                        axios.post('./get_all_qup_need_order_buy')
                        .then((res)=>{
                        this.data_notifi=res.data.data;
                        this.count_data_notifi=res.data.counts;
                            if(res.data.counts != 0)
                                this.run_not();
                        });
                    });
                }
            });
        },
        data(){
            return{
                data_notifi:{},
                count_data_notifi:0,
                user_login:{},
            }
        },
        methods:{
            run_not(){
                var audio = new Audio('public/audio/a.mp3');
                audio.play();
            },
            notifi_showe_2(){
				$('.show_notifi2_2').fadeToggle();
				$('.show_notifi').fadeOut();
            },     
            isObjectEmpty(someObject){
                return !(Object.keys(someObject).length);
            }
        }
    }
</script>

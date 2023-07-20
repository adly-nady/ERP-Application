<template>


<div class="header" id="app">
		<div class="header-left">
			<a class="clcik_silde_sid"><div class="menu-icon dw dw-menu"> </div></a>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
			</div>
		</div>
		<div class="header-right">

			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow notifi_showe" @click="openses()" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="notifi_counts"></span>
						
					</a>
				</div>
			</div>

				<notifi-woraning></notifi-woraning>
			
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle show_person_sett" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img :src="user_login.img" alt="" srcset="">
						</span>
						<span class="user-name" style="font-size:12px;">{{user_login.status}}/ {{user_login.name}}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list show_person_sett2"><!--
						<a class="dropdown-item"><i class="dw dw-settings2"></i> {{--@lang(message.Settings --}})</a>-->
						<a class="dropdown-item" href="script:;"><i class="dw dw-help"></i> Help</a>
						<a class="dropdown-item" href="http://localhost/convert_swiss/Sign_out"><i class="dw dw-logout"></i> Logout</a>
					</div>
				</div>
			</div>
		</div>
	</div>


</template>


<script>
    export default {
        mounted() {           
            axios.post('./login_here').then((res)=>{
                    this.user_login=res.data;
            });
        },
        data(){
            return{
                user_login:{}
            }
        },
        methods:{
            openses()
            {
				$('.show_notifi').fadeToggle();
				$('.show_notifi2_2').fadeOut();
            }
        }
    }
</script>

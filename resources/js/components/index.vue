<template>
<ul id="accordion-menu" style="height: fit-content;z-index:9;">
    
	<li>
        <router-link to="/" class="dropdown-toggle no-arrow home">
			<span class="micon dw"><i class="icon-copy dw dw-home"></i></span><span class="mtext">الصفحة الرئيسية</span>
        </router-link><!-- @lang('message.Home') -->
	</li>
	<li>
        <router-link to="/milling" class="dropdown-toggle no-arrow milling">
			<span class="micon dw"><i class="icon-copy dw dw-windmill-1"></i></span><span class="mtext">الطحن</span>
            </router-link><!-- @lang('message.Mill') -->
	</li>
	<li class="dropdown">
		<a href="javascript:;" onclick="$('.shesz0').slideToggle()" class="dropdown-toggle" data-option="off">
			<span class="micon dw"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
			<path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
			<path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
			</svg></span><span class="mtext">تقرير اخطار الاعطال</span><!-- @lang('message.Settings')  add_parts -->
		</a>
		<ul class="submenu shesz0">
			<li><router-link to="/tools_opations" class="dropdown-toggle no-arrow setting_person">اخطار الاعطال</router-link></li><!-- @lang('message.my setting') -->
			<li><router-link to="/data_of_milling_reporets" class="dropdown-toggle no-arrow add_parts"> تقارير اخطار الاعطال</router-link></li><!-- @lang('message.other setting') -->
		</ul>
	</li>
	<li>
        <router-link to="/maintenance" class="dropdown-toggle no-arrow maintenance">
			<span class="micon dw"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
  <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/>
</svg></span><span class="mtext">الصيانة</span>
            </router-link><!-- @lang('message.Mill') for other lang -->
	</li>
	<li class="dropdown">
		<a href="javascript:;" onclick="$('.shes').slideToggle()" class="dropdown-toggle" data-option="off">
			<span class="micon dw"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
			<path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>
			</svg></span><span class="mtext">المخزن</span><!-- @lang('message.Settings')  add_parts -->
		</a>
		<ul class="submenu shes">
			<li><router-link to="/storages" class="dropdown-toggle no-arrow setting_person">الصفحة الرئيسية</router-link></li><!-- @lang('message.my setting') -->
			<li><router-link to="/add_parts" class="dropdown-toggle no-arrow add_parts">صفحة التحكم في </router-link></li><!-- @lang('message.my setting') -->
			<li><router-link to="/storages_setting" class="dropdown-toggle no-arrow other_setting">وحدادت التخزين</router-link></li><!-- @lang('message.other setting') -->
		</ul>
	</li>
	<li class="dropdown">
		<a href="javascript:;" onclick="$('.shes00').slideToggle()" class="dropdown-toggle" data-option="off">
			<span class="micon dw"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
			<path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
			<path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
			<path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
			</svg></span><span class="mtext">المشتريات </span><!-- @lang('message.Settings')  add_parts -->
		</a>
		<ul class="submenu shes00">
			<li><router-link to="/Procurement_Section" class="dropdown-toggle no-arrow setting_person">لوحة التحكم</router-link></li><!-- @lang('message.my setting') -->
			<li><router-link to="/the_Generale_report" class="dropdown-toggle no-arrow add_parts">التقرير العام للحركة</router-link></li><!-- @lang('message.other setting') -->
			<li><router-link to="/the_Generale_report2" class="dropdown-toggle no-arrow add_parts">بيانات قطع الغيار</router-link></li><!-- @lang('message.other setting') -->
		</ul>
	</li>
	<li>
        <router-link to="/add_email" class="dropdown-toggle no-arrow add_email">
			<span class="micon dw"><i class="icon-copy dw dw-email1"></i></span><span class="mtext">البريد الالكترونى</span><!--  {{--  DB::table('tools list in database')_>get()</span> --}}}  -->
            </router-link><!-- @lang('message.Email') for other lang   -->
	</li>
	<li class="dropdown">
		<a href="javascript:;" onclick="$('.submenu2').slideToggle()" class="dropdown-toggle" data-option="off">
			<span class="micon dw"><i class="icon-copy dw dw-settings1"></i></span><span class="mtext">الاعدادات</span><!-- @lang('message.Settings') -->
		</a>
		<ul class="submenu submenu2">
			<li><router-link to="/debartment_setting" class="dropdown-toggle no-arrow debartment_setting">اعدادات الاقسام</router-link></li>
			<li><router-link to="/setting_person" class="dropdown-toggle no-arrow setting_person">اعداداتى الخاصة</router-link></li><!-- @lang('message.my setting') -->
			<li><router-link to="/other_setting" class="dropdown-toggle no-arrow other_setting">اعدادات الاخرين</router-link></li><!-- @lang('message.other setting') -->
			<li><router-link to="/dashboard_controlle" class="dropdown-toggle no-arrow dashboard_controlle">صفحة التحكم</router-link></li><!-- @lang('message.the Dashboard') -->
		</ul>
	</li>
	<li>
        <router-link to="/do_iser" class="dropdown-toggle no-arrow">
			<span class="micon dw"><i class="icon-copy dw dw-door"></i></span><span class="mtext">الامان</span>
            </router-link><!-- @lang('message.Security') -->
	</li>
	<li>
        <router-link to="/do_iser" class="dropdown-toggle no-arrow">
			<span class="micon dw"><i class="icon-copy dw dw-chat-11"></i></span><span class="mtext">غرفة الدردشة</span>
            </router-link><!-- @lang('message.Chat Room') -->
	</li>
</ul>

</template>



<script>
	import $ from "jquery";
    export default {
        mounted() {

			$('.no-arrow').click(function(){
				$('.no-arrow').removeClass('active');
				$(this).addClass('active');
			});
        },
      data() {
		  return{
        	messages: [],
		  }
      }
    }
</script>

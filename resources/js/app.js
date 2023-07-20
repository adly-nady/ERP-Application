
require('./bootstrap');


window.Vue = require('vue').default;
 
import FullCalendar from 'vue-full-calendar'; 
import $ from "jquery";

Vue.use(FullCalendar);
Vue.use($);




Vue.component('sit', require('./components/index.vue').default);
Vue.component('report-mill', require('./components/reports/report_mill.vue').default);
Vue.component('fullcalendar-component', require('./components/reports/test.vue').default);
Vue.component('bell-section', require('./components/bell_setting.vue').default);
Vue.component('notifi-woraning', require('./components/woraning.vue').default);
Vue.component('header-top', require('./components/hearder.vue').default);


/*      ------  storage page \/  -------      */

Vue.component('add-Report', require('./components/reports/Add_Report.vue').default);
Vue.component('addReturn-Report', require('./components/reports/AddReturn_Report.vue').default);
Vue.component('chack-Report', require('./components/reports/Chack_Report.vue').default);
Vue.component('pay-part', require('./components/reports/pay_part.vue').default);
Vue.component('payRequest-Report1', require('./components/reports/PayRequest_Report1.vue').default);
Vue.component('payRequest-Report2', require('./components/reports/PayRequest_Report2.vue').default);

/*      ------  storage page /\  -------      */


import VueRouter from 'vue-router';
//import VueResource from 'vue-resource'


Vue.use(VueRouter);
//Vue.use(VueResource);

const routes = [
  { path: '/', component: require('./components/home.vue').default },
  { path: '/milling', component: require('./components/milling.vue').default },
  { path: '/add_email', component: require('./components/add_email.vue').default },
  { path: '/setting_person', component: require('./components/setting_person.vue').default },
  { path: '/other_setting', component: require('./components/other_setting.vue').default },
  { path: '/dashboard_controlle', component: require('./components/dashboard_controlle.vue').default },
  { path: '/do_iser', component: require('./components/do_iser.vue').default },
  { path: '/maintenance', component: require('./components/maintenance.vue').default },
  { path: '/reports', component: require('./components/reports/Chack_Report.vue').default },
  { path: '/tools_opations', component: require('./components/tools_add.vue').default },
  { path: '/storages', component: require('./components/storages.vue').default },
  { path: '/storages_setting', component: require('./components/storages_setting.vue').default },
  { path: '/debartment_setting', component: require('./components/debartment.vue').default },
  { path: '/add_parts', component: require('./components/add_parts.vue').default },
  { path: '/Procurement_Section', component: require('./components/Procurement_Section.vue').default },
  { path: '/the_Generale_report', component: require('./components/the_Generale_report.vue').default },
  { path: '/the_Generale_report2', component: require('./components/wait_beshoy.vue').default },
  { path: '/data_of_milling_reporets', component: require('./components/data_of_milling_reporets.vue').default },
  ];

    //
  const router = new VueRouter({
    routes 
  });

const app = new Vue({
    el: '#app',router
});
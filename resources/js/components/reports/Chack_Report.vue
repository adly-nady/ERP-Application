<style>
.Page_Report4{
    width: 900px;
    height: 400px;
    border: 2px solid black;
    display: grid;
    grid-template-rows: 35% 50% 15%;
    align-content: space-between;
    background-image: linear-gradient(#eee , #fff);
    box-shadow: 0px 0px 12px 1px black;
    position: absolute;
    top: 45%;
    left: 50%;
    transform: translate(-45%,-50%);
}
.Page_Report4 header{
    margin: 10px 20px 0px 20px;
    display: grid;
    grid-template-columns: repeat(4 , 22%);
    grid-template-rows: 33% 20% 20% 20% ;
    justify-content: space-between;
    align-content: space-between;
    box-shadow: -1px -1px 1px 0px black;
    padding-bottom: 4px;

}
.Page_Report4 header section
{
    display: inline;
}
.Page_Report4 header h3{

    grid-column: span 4;
    text-align: center;
    text-decoration: underline;
}
.Page_Report4 header .report_number4{
    grid-column: span 4;
    text-align: center;
}
.Page_Report4 header .Shefts{
    grid-column: span 4;
    text-align: center;
}
.Page_Report4 header .space{grid-row: span 2 ; grid-column: span 1;}
.Page_Report4 header input {
    font-size: 15px;
    font-weight: bold;
    color: black;
    text-align: center;
    border: 0px solid white;
}
.Page_Report4 header label{
    font-size: 18px;
}
/* _______________________________________________________________________Body4___________________________________________________ */
:root{
    --heightRows: 30px
}

.Page_Report4 .Body4 table{
    margin: 10px 20px 10px 20px;
    border: 2px solid black;
    box-shadow: 1px 1px 5px 0px black ;
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    
}
.Body4 table tr  {
    width:100%;
    display: grid;
    grid-template-columns: 20% 10% 10% 20% 20% 20%;
    justify-content: center;
    align-content: center;
}
.Body4 table tr th {
    height: 40px;
    border: 1px solid black;
    background-color: darkslategray;
    color: white;
    display: flex; justify-content: center;align-items: center;
    
}

.Body4 table td  {
    border: 1px solid black;padding: 0px;
    height: var(--heightRows)+5px;

}

.Body4 table td input , .Body4 table td select {border-spacing: 0px ;font-size: 15px ;font-weight: bold; text-align: center; border-width: 0px; width: 98%;height: var(--heightRows);padding: 0px; border-color: white;border-radius: 0%;}

/* ______________________________________________________________________Footer________________________________________________________________ */

footer{
    margin: 0px 20px 10px 20px;
    display: grid;
    grid-template-columns: repeat(2 , 45%);
    grid-template-rows: repeat(2 ,45%);
    text-align: center;
    justify-content: space-between;
    align-content: space-between;
    box-shadow: 1px 1px 1px 0px black;
    padding-bottom: 4px;
}

 .tfooter4{
    
    font-size: 15px;
    font-weight: bold;
    text-decoration: underline;
    text-align: center;
    justify-content: space-between;
}
.bfooter4{
    font-size: 15px;
    justify-content: space-between;
}
footer .bfooter4 .notes1 {border-spacing: 0px ; font-size: 15px ;font-weight: bold; text-align: center; border-width: 0px;padding: 0px; border-color: white;border-radius: 0%;}


.cover_opp4{
    width: 100%;
    height: 100%;
    position: fixed;
    top:0px;
    left: 0px;
    background-color: rgba(20,20,20,0.7);
    z-index: 9999999999;
    display: none;
}

</style>
<template>
<div class="cover_opp4">
	<div class="alert_kero">
        <div class="icon_alert_kero">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
              </svg>
        </div>
        <div class="text_alert_kero">your opctins is sucsses</div>
    </div>
    <div class="Page_Report4" style="direction: rtl;">
        <button class="btn btn-danger exit4 style_exit" v-on:click="exits3()">X</button>
        <header>
            <h3>محضر فحص و استلام</h3>
            <div class="report_number4">أذن رقم({{Chack_Report_data.id_num}})</div>    

            <div class="tfooter4">التاريخ</div>
            <div class="tfooter4">اسم الموردة</div>
            <div class="tfooter4">الجهة الطالبة (اسم الفنى)</div>
            <div class="tfooter4">تاريخ الوصول من البوابة</div>
            <div class="bfooter4"><input type="date" v-model="Chack_Report_data.date" class="date"></div> 
            <div class="bfooter4">
                <select  class="supplairs" v-model="Chack_Report_data.supplairs" @change="get_users_of_der()">
                    <option disabled value="0">اسم المورد</option>
                    <option v-for="item in itemsto" :key="item.id">{{ item.Signature }}</option>
                </select>
            </div> 
            <select class="supplairs" v-model="Chack_Report_data.department" v-on:change="get_users_of_dpart()">
                <option disabled  value="0">اختر القسم</option>
                <option v-for="item in items" :key="item.id" :value="item.id">{{ item.dep_name }}</option>
            </select> 
            <div class="bfooter4"><input type="date" v-model="Chack_Report_data.date_income" class="date_income" placeholder="تاريخ الوصول من البوابة"></div> 
        </header>
        <section class="Body4" style="direction: rtl;">
            <table>
                <tr>
                    <th>اسم الصنف</th>
                    <th>الوحدة</th>
                    <th>الكمية</th>
                    <th>مواصفاتة </th>
                    <th>نتيجة الفحص</th>
                    <th>الملاحظات </th>
                </tr>
                
                <span v-if="isObjectEmpty(data_b)">
                    <tr>
                        <td><input type="text" readonly class="part_name1" placeholder="-----------------"></td>
                        <td><input type="text" readonly class="part_unit1" placeholder="-----------------"></td>
                        <td><input type="text" readonly class="part_count1" placeholder="-----------------"></td>
                        <td><input type="text" readonly class="part_discription1" placeholder="-----------------"></td>
                        <td>
                            <select name="" disabled>
                                <option>نعم نتيجة الفحص إيجابية و يتم قبول المنتج </option>
                                <option>لا نتيجة الفحص سلبية و يتم رفض المنتج</option>
                                <option selected>....................</option>
                            </select>
                        </td>
                        <td><input type="text" readonly class="notes1" placeholder="-----------------"></td>
                    </tr>
                </span>
                <span v-else>
                    <tr v-for="data_b in data_b" :key="data_b.id">
                        <td><input type="text" v-model="data_b.Name" class="part_name1" placeholder="---------------"></td>
                        <td><input type="text" v-model="data_b.part_unit" class="part_unit1" placeholder="---------------"></td>
                        <td><input type="text" v-model="data_b.part_count" class="part_count1" placeholder="---------------"></td>
                        <td><input type="text" v-model="data_b.description" class="part_discription1" placeholder="---------------"></td>
                        <td>
                            <select name="" v-model="data_b.resuilt_chack" disabled>
                                <option>نعم نتيجة الفحص إيجابية و يتم قبول المنتج </option>
                                <option>لا نتيجة الفحص سلبية و يتم رفض المنتج</option>
                                <option selected>....................</option>
                            </select>
                        </td>
                        <td><input type="text" v-model="data_b.notes" class="notes1" placeholder="---------------"></td>
                    </tr>
                </span>

            </table>
        </section>
        <footer>
            <div class="tfooter4">الفنى المختص</div>
            <div class="tfooter4">مسئول المخزن</div>
            <div class="bfooter4"><input type="text" class="notes1" placeholder="...................."></div>
            <div class="bfooter4"><input type="text" class="notes1" placeholder="...................."></div>
        </footer>
        <button class="btn btn-success save1 style_save_butn" v-on:click="save_Chack_Report()"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
            <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
            </svg>
        </button>
    </div>
</div>
</template>

<script>
import axios from 'axios'
    export default {
        props:['id_num_check_report','departs','data_bs'],
        mounted() {
            $('.style_save_butn').click(function (e) { 
                e.preventDefault();
                $(this).attr('disabled','disabled');
            });
        },
        data(){
            return{
                id_activ_user:0,
                itemsto:{},
                items:this.departs,
                data_b:this.data_bs,
                Chack_Report_data:{department:0,supplairs:0,id_num:1+parseInt(this.id_num_check_report)},
            }
        },
        methods:{
            exits3(){$('.cover_opp4').fadeOut();},
    isObjectEmpty(someObject){
      return !(Object.keys(someObject).length)
    },
            get_users_of_dpart:function()
            {
                 axios.post('./get_users_of_dpart',{id:this.Chack_Report_data.department})
                 .then((res)=>{
                     this.itemsto=res.data;
                 })
                 .catch((res)=>{
                     alert("sorry");
                 });
            },
            save_Chack_Report(event)
            {
                axios.post('./save_Chack_Report',{data_b:this.data_b,data_h_f:this.Chack_Report_data})
                .then((response)=>{var ms="";
                
                //////////////   if the data have errors   \\\\\\\\\\\\\\\\
                    if(response.data.errors)
                    {
                        for (let index = 0; index < response.data.errors.length; index++) {
                            ms += response.data.errors[index]+"\n";
                            
                        }
                    alert(ms);
                        this.Chack_Report_data['id_num']=response.data.new_id;
                    }
                //////////////   if the data don`t have errors   \\\\\\\\\\\\\\\\
                    else{
                      $(".alert_kero").css('display', 'flex');
                      $(".alert_kero").delay(1300).fadeOut();
					    $('.cover_opp4').fadeOut();
                    }
                        this.Chack_Report_data['id_num']=response.data.new_id;
                        axios.post('./do_event_one/'+this.id_activ_user);
                        $('.style_save_butn').attr('disabled',false);
                })
                .catch((respones)=>{
                    alert("error syntax");
                    $('.style_save_butn').attr('disabled',false);
                    });
            },
            get_users_of_der()
            {
                 axios.post('./get_users_of_der',{seg:this.Chack_Report_data.supplairs})
                 .then((res)=>{
                     this.id_activ_user=res.data.id;
                 })
                 .catch((res)=>{
                     alert("sorry");
                 });
            }
        }
    }
</script>
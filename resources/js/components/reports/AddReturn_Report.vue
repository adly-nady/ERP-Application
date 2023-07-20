<style>

.Page_Report3{
    width: 900px;
    height: 450px;
    border: 2px solid black;
    display: grid;
    grid-template-rows: 35% 50% 15%;
    align-content: space-between;
    background-image: linear-gradient(#eee , #fff);
    box-shadow: 0px 0px 12px 1px rgb(0, 0, 0);
    position: absolute;
    top: 45%;
    left: 50%;
    transform: translate(-45%,-50%);
}
.Page_Report3 header{
    margin: 10px 20px 0px 20px;
    grid-template-columns: repeat(4 , 22%);
    grid-template-rows: 33% 20% 20% 20% ;
    justify-content: center;
    align-content: space-between;
    box-shadow: -1px -1px 1px 0px black;
    padding-bottom: 4px;

}
.Page_Report3 header section
{
    display: inline;
}
.Page_Report3 header h3{

    grid-column: span 4;
    text-align: center;
    text-decoration: underline;
}
.Page_Report3 header .report_number3{
    grid-column: span 4;
    text-align: center;
}
.Page_Report3 header .Shefts{
    grid-column: span 4;
    text-align: center;
}
.Page_Report3 header .space { grid-column: span 2; grid-row: span 2;
}
.Page_Report3 header input{
    font-size: 15px;
    font-weight: bold;
    color: black;
    text-align: center;
    border: 0px;
}
.Page_Report3 header label{
    font-size: 18px;
}
/* _______________________________________________________________________Body3___________________________________________________ */
:root{
    --heightRows: 30px
}

.Page_Report3 .Body3 table{
    margin: 35px 20px 10px 20px;
    border: 2px solid black;
    box-shadow: 1px 1px 5px 0px black ;
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
}
.Body3 table tr  {
    width: 100%;
    display: grid;
    grid-template-columns: 35% 15% 13% 13% 25% 0% 0%;
    justify-content: center;
    align-content: center;
    text-align: center;
}
.Body3 table tr th {
    width: 100%;
    height: 40px;
    border: 1px solid black;
    background-color: darkslategray;
    color: white;
    display: flex; justify-content: center;align-items: center;
    
}

.Body3 table td  {
    border: 1px solid black;padding: 0px;
    height: var(--heightRows)+5px;

}

.Body3 table td input {border-spacing: 0px ;font-size: 15px ;font-weight: bold; text-align: center; border-width: 0px; width: 98%;height: var(--heightRows);padding: 0px; border-color: white;border-radius: 0%;}

/* ______________________________________________________________________Footer________________________________________________________________ */

footer{
    margin: 0px 20px 10px 20px;
    display: grid;
    grid-template-columns: repeat(3 , 30%);
    grid-template-rows: repeat(2 ,45%);
    text-align: center;
    justify-content: space-between;
    align-content: flex-start;
    box-shadow: 1px 1px 1px 0px black;
    padding-bottom: 4px;
}

footer .tfooter3{
    
    font-size: 15px;
    font-weight: bold;
    text-decoration: underline;
}
footer .bfooter{
    font-size: 15px;
}
footer .bfooter .notes1 {border-spacing: 0px ; font-size: 15px ;font-weight: bold; text-align: center; border-width: 0px;padding: 0px; border-color: white;border-radius: 0%;}

.cover_opp3{
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
<div class="cover_opp3">
	<div class="alert_kero">
        <div class="icon_alert_kero">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
              </svg>
        </div>
        <div class="text_alert_kero">your opctins is sucsses</div>
    </div>
    <div class="Page_Report3" style="direction: rtl;">
        <button class="btn btn-danger exit3 style_exit" v-on:click="exits2()">X</button>
        <header>
            <h3>اذن اضافة مرتجعات للمخازن</h3>
            <div class="report_number3">أذن رقم({{data_h_f.id_num}})</div>
            <div class="container" style="width:820px">
                <div class="row">
                    <div class="col col-12" style="text-align:center">
                        <section class="Shefts1">
                            <section>
                                <label for="radio1">الوردية الاولى </label>
                                <input type="radio" id="radio1" value="الوردية الاولى" v-model="data_h_f.shift" name="Sheft">
                            </section>
                            <section>
                                <label for="radio2">الوردية الثانية </label>
                                <input type="radio" id="radio2" value="الوردية الثانية" v-model="data_h_f.shift" name="Sheft">
                            </section>
                            <section>
                                <label for="radio3">الوردية الثالثة </label>
                                <input type="radio" id="radio3" value="الوردية الثالثة" v-model="data_h_f.shift" name="Sheft">
                            </section>
                        </section>
                    </div>
                </div>
            </div>
            <br/>
            <div class="container" style="width:820px">
                <div class="row">
                    <div class="col col-6">
                        <input type="date" class="couses" style="width: 215px;" v-model="data_h_f.date">
                        <input type="text" class="couses" placeholder=" سبب الارتجاع " v-model="data_h_f.Cause_of_reflux">
                    </div>
                    <div class="col col-6">
                        <select class="from" style="float:right;margin-bottom:2px" v-model="data_h_f.returned_from" @change="get_users_of_der()">
                            <option disabled value="0">مرتجع من</option>
                            <option v-for="item in itemsto" :key="item.id">{{ item.Signature }}</option>
                        </select>
                        <select class="depart" v-model="data_h_f.Previous_exchange_for_t" style="float:right;" @change="get_users_of_dpart()">
                            <option disabled  value="0">الجهة الساببق الصرف لها</option>
                            <option v-for="item in items" :key="item.id" :value="item.id">{{ item.dep_name }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </header>
        <section class="Body3" style="direction: rtl;">
            <table>
                <tr>
                    <th>اسم الصنف</th>
                    <th> رقم الصنف</th>
                    <th>الوحدة</th>
                    <th>الكمية الواردة</th>
                    <th>  ملاحظات </th>
                </tr>
                <span v-if="isObjectEmpty(data_b)">
                    <tr>
                        <td><input type="text" readonly class="p_Quantety1" placeholder="----------------------"></td>
                        <td><input type="text" readonly class="Quantety1" placeholder="----------------------"></td>
                        <td><input type="text" readonly class="p_Quantety1" placeholder="----------------------"></td>
                        <td><input type="text" readonly class="p_number1" placeholder="----------------------"></td>
                        <td><input type="text" readonly class="notes1" placeholder="----------------------"></td>
                    </tr>
                </span>
                <span v-else>
                    <tr v-for="data_b in data_b" :key="data_b.id">
                        <td><input type="text" v-model="data_b.Name" class="p_Quantety1" placeholder="---------------"></td>
                        <td><input type="text" v-model="data_b.part_id" class="p_number1" placeholder="---------------"></td>
                        <td><input type="text" v-model="data_b.part_unit" class="p_Quantety1" placeholder="---------------"></td>
                        <td><input type="text" v-model="data_b.part_count" class="Quantety1" placeholder="---------------"></td>
                        <td><input type="text" v-model="data_b.note" class="notes1" placeholder="---------------"></td>
                    </tr>
                </span>

            </table>
        </section>
        <footer>
            <div class="tfooter3">مُسلَم</div>
            <div class="tfooter3">مسئول المخزن</div>
            <div class="tfooter3">المدير العام</div>
            <div class="bfooter"><input type="text" class="notes1" placeholder="...................."></div>
            <div class="bfooter"><input type="text" class="notes1" placeholder="...................."></div>
            <div class="bfooter"><input type="text" class="notes1" placeholder="...................." readonly></div>
        </footer>
        <button class="btn btn-success save1 style_save_butn" @click="save_return_add($even)"> 
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
        props:['id_num_return_add','departs','data_bs'],
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
                data_h_f:{id_num:parseInt(this.id_num_return_add)+1,sec:0,},
                data_b:this.data_bs,
                }
        },
        methods:{
            exits2(){$('.cover_opp3').fadeOut();},
    isObjectEmpty(someObject){
      return !(Object.keys(someObject).length)
    },
            get_users_of_dpart()
            {
                 axios.post('./get_users_of_dpart',{id:this.data_h_f.Previous_exchange_for_t})
                 .then((res)=>{
                     this.itemsto=res.data;
                 })
                 .catch((res)=>{
                     alert("sorry");
                 });
            },
            save_return_add(event)
            {
                axios.post('./save_return_add',{data:this.data_h_f,data_b:this.data_b})
                .then((response)=>{var ms="";
                
                //////////////   if the data have errors   \\\\\\\\\\\\\\\\
                    if(response.data.errors)
                    {
                        for (let index = 0; index < response.data.errors.length; index++) {
                            ms += response.data.errors[index]+"\n";
                            
                        }
                    alert(ms);
                    }
                //////////////   if the data don`t have errors   \\\\\\\\\\\\\\\\
                    else{
                      $(".alert_kero").css('display', 'flex');
                      $(".alert_kero").delay(1300).fadeOut();
					    $('.cover_opp3').fadeOut();
                    }
                        this.data_h_f['id_num']=response.data.new_id;
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
                 axios.post('./get_users_of_der',{id:this.data_h_f.sec,seg:this.data_h_f.returned_from})
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
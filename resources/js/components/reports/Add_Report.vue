<style>

.Page_Report2{
    width: 900px;
    height: 470px;
    border: 2px solid black;
    display: grid;
    grid-template-rows: 44% 43% 13%;
    align-content: space-between;
    background-image: linear-gradient(#eee , #fff);
    position: absolute;
    top: 45%;
    left: 50%;
    transform: translate(-45%,-50%);
}
.Page_Report2 header{
    margin: 10px 20px 0px 20px;
    display: grid;
    grid-template-columns: repeat(4 , 22%);
    grid-template-rows: 20% 20% 20% 20% 20%;
    justify-content: center;
    align-content: space-between;
    box-shadow: -1px -1px 1px 0px black;

}
.Page_Report2 header section
{
    display: inline;
}
.Page_Report2 header h3{
    margin-top: 10px;
    font-size: 22px;
    grid-column: span 4;
    text-align: center;
    text-decoration: underline;
}
.Page_Report2 header .classifacition2{text-align: center;justify-content: center; border: 1px solid white; grid-column: span 4;}
.Page_Report2 header .report_number2{
    grid-column: span 4;
    text-align: center;
}
.Page_Report2 header .Shefts2{
    grid-column: span 4;
    text-align: center;
}
.Page_Report2 header input , .Page_Report2 header .classifacition2{
    font-size: 15px;
    font-weight: bold;
    color: black;
    text-align: center;
    border: 0px;
}
.Page_Report2 header label{
    font-size: 18px;
}
/* _______________________________________________________________________Body2___________________________________________________ */
:root{
    --heightRows: 30px
}

.Page_Report2 .Body2 table{
    margin: 10px 20px 10px 20px;
    border: 2px solid black;
    box-shadow: 1px 1px 5px 0px black ;
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    
}
.Body2 table tr  {
    width: 100%;
    text-align: center;
    display: grid;
    grid-template-columns: 10% 30% 10% 10% 40%;
    justify-content: center;
    align-content: center;
}
.Body2 table tr th {
    height: 40px;
    border: 1px solid black;
    background-color: darkslategray;
    color: white;
    display: flex; justify-content: center;align-items: center;
    
}

.Body2 table td  {
    border: 1px solid black;padding: 0px;
    height: var(--heightRows)+5px;

}

.Body2 table td input {border-spacing: 0px ;font-size: 15px ;font-weight: bold; text-align: center; border-width: 0px; width: 98%;height: var(--heightRows);padding: 0px; border-color: white;border-radius: 0%;}

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

footer .tfooter{
    
    font-size: 15px;
    font-weight: bold;
    text-decoration: underline;
}
footer .bfooter{
    font-size: 15px;
}
footer .bfooter .note1 {border-spacing: 0px ; font-size: 15px ;font-weight: bold; text-align: center; border-width: 0px;padding: 0px; border-color: white;border-radius: 0%;}

.cover_opp2{
    width: 100%;
    height: 100%;
    position: fixed;
    top:0px;
    left: 0px;
    background-color: rgba(20,20,20,0.7);
    z-index: 9999999999;
    display: none;
}
.style_blocks{
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
<div class="cover_opp2">
	<div class="alert_kero">
        <div class="icon_alert_kero">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
              </svg>
        </div>
        <div class="text_alert_kero">your opctins is sucsses</div>
    </div>
    <div class="Page_Report2" style="direction: rtl;">
        <button class="btn btn-danger exit2 style_exit" v-on:click="exits1()">X</button>
        <header>
            <h3>أذن أضافة (مخزن قطع الغيار)</h3>
            <div class="report_number2">أذن رقم({{data_h_f.id_num}})</div>
            <section class="Shefts2">
                <section>
                    <label for="radio1">الوردية الاولى </label>
                    <input type="radio" id="radio1" v-model="data_h_f.shift"  value="الوردية الاولى" name="Sheft">
                    
                </section>
                <section>
                    <label for="radio2">الوردية الثانية </label>
                    <input type="radio" id="radio2" v-model="data_h_f.shift"  value="الوردية الثانية" name="Sheft">
                    
                </section>
                <section>
                    <label for="radio3">الوردية الثالثة </label>
                    <input type="radio" id="radio3" v-model="data_h_f.shift"  value="الوردية الثالثة" name="Sheft">
                    
                </section>
            </section>
            <input type="date" class="date" v-model="data_h_f.date">
            <input type="text" class="supplayer" v-model="data_h_f.supplayer" placeholder="المورد">
            <input type="number" class="chack_id" v-model="data_h_f.chack_id" placeholder="رقم محضر الفحص">
            <input type="number" class="income_id" v-model="data_h_f.income_id" placeholder="رقم الوارد">
            <select class="classifacition2" v-model="data_h_f.sec" v-on:change="get_users_of_dpart()">
                <option disabled  value="0">اختر القسم</option>
                <option v-for="item in items" :key="item.id">{{ item.dep_name }}</option>
            </select> 
        </header>
        <section class="Body2">
            <table>
                <tr>
                    <th>رقم الصنف</th>
                    <th>اسم الصنف</th>
                    <th>الوحدة</th>
                    <th>الكمية الواردة</th>
                    <th>الملاحظات</th>
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
                        <td><input type="text" v-model="data_b.part_id" class="p_number1" placeholder="---------------"></td>
                        <td><input type="text" v-model="data_b.Name" class="p_Quantety1" placeholder="---------------"></td>
                        <td><input type="text" v-model="data_b.part_unit" class="p_Quantety1" placeholder="---------------"></td>
                        <td><input type="text" v-model="data_b.part_count" class="Quantety1" placeholder="---------------"></td>
                        <td><input type="text" v-model="data_b.notes" class="notes1" placeholder="---------------"></td>
                    </tr>
                </span>

            </table>
        </section>
        <footer>
            <div class="tfooter">المستلم</div>
            <div class="tfooter">مسئول المخزن</div>
            <div class="tfooter">المدير العام</div>
            <div class="bfooter"><input type="text" class="note1" placeholder="...................."></div>
            <div class="bfooter"><input type="text" class="note1" placeholder="...................."></div>
            <div class="bfooter"><input type="text" class="note1" placeholder="...................." readonly></div>
        </footer>
        <button class="btn btn-success save1 style_save_butn" v-on:click="save_add_part($event)"> 
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
        props:['id_num_add','departs','data_bs'],
        mounted() {
            $('.style_save_butn').click(function (e) { 
                e.preventDefault();
                $(this).attr('disabled','disabled');
            });
        },
        data(){
            return{
                items:this.departs,
                data_b:this.data_bs,
                data_h_f:{sec:0,id_num:1+parseInt(this.id_num_add)}
            }
        },
        methods:{
            exits1(){$('.cover_opp2').fadeOut();},
    isObjectEmpty(someObject){
      return !(Object.keys(someObject).length)
    },
            save_add_part(event)
            {
                axios.post('./save_add_part',{ data:this.data_b,data_h_f:this.data_h_f})
                .then((response)=>{var ms="";
                //////////////   if the data have errors   \\\\\\\\\\\\\\\\
                    if(response.data.errors)
                    {
                        this.data_h_f['id_num']=response.data.new_id;
                        if(response.data.stat == "error"){
                            ms += "الكمية لا تكفي"+"\n";
                        }
                        for (let index = 0; index < response.data.errors.length; index++) {
                            ms += response.data.errors[index]+"\n";
                            
                        }
                    alert(ms);
                    }
                    else if(response.data.stat == "error"){
                        alert("الكمية لا تكفي");
                        this.data_h_f['id_num']=response.data.new_id;
                    }
                //////////////   if the data don`t have errors   \\\\\\\\\\\\\\\\table_data
                    else{
                        $(".alert_kero").css('display', 'flex');
                        $(".alert_kero").delay(1300).fadeOut();
					    $('.cover_opp2').fadeOut();
                    }
                        this.data_h_f['id_num']=response.data.new_id;
                        axios.post('./show_data_equ');
                    $('.style_save_butn').attr('disabled',false);
                });
            }
        }
    }
</script>
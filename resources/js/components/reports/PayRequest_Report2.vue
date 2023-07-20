<style>


.Page_Report6{
    width: 900px;
    height: 400px;
    border: 2px solid black;
    display: grid;
    grid-template-columns: 99%;
    grid-template-rows: 30% 50% 20%;
    align-content: space-between;
    background-image: linear-gradient(#eee , #fff);
    box-shadow: 0px 0px 12px 1px black;
    position: absolute;
    top: 45%;
    left: 50%;
    transform: translate(-45%,-50%);
}
.Page_Report6 header h3{
    box-shadow: 1px 1px 1px 0px #eee;
}
.Page_Report6 header{
    margin: 10px 20px 0px 20px;
    display: grid;
    grid-template-columns: repeat(4 , 22%);
    grid-template-rows: 35% 30% 30% ;
    justify-content: center;
    align-content: space-between;
    box-shadow: -1px -1px 1px 0px black;
    padding-bottom: 4px;

}
.Page_Report6 header section
{
    display: inline;
}
.Page_Report6 header h3{

    grid-column: span 4;
    text-align: center;
    text-decoration: underline;
}
.Page_Report6 header  .date{

    grid-column: span 1;
    -ms-grid-row-align: start;
}
.Page_Report6 head .space{
    grid-column: span 3;
}
.Page_Report6 header  .department{

    grid-column: span 2;
}
.Page_Report6 header .report_number6{
    grid-column: span 4;
    text-align: center;
}
.Page_Report6 header .Shefts{
    grid-column: span 4;
    text-align: center;
}
.Page_Report6 header input , .Page_Report6 header select{
    font-size: 15px;
    font-weight: bold;
    color: black;
    text-align: center;
    border: 0px solid white;
}
.Page_Report6 header label{
    font-size: 18px;
}
/* _______________________________________________________________________Body6___________________________________________________ */
:root{
    --heightRows: 30px
}

.Page_Report6 .Body6 table{
    margin: 10px 20px  10px 20px;
    border: 2px solid black;
    box-shadow: 1px 1px 5px 0px black ;
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    
}
.Body6 table tr  {
    width: 100%;
    display: grid;
    grid-template-columns: 35% 15% 15% 15% 20% 0%;
    justify-content: center;
    align-content: center;
}
.Body6 table tr th {
    height: 40px;
    border: 1px solid black;
    background-color: darkslategray;
    color: white;
    display: flex; justify-content: center;align-items: center;
    
}

.Body6 table td  {
    border: 1px solid black;padding: 0px;
    height: var(--heightRows)+5px;

}

.Body6 table td input {border-spacing: 0px ;font-size: 15px ;font-weight: bold; text-align: center; border-width: 0px; width: 98%;height: var(--heightRows);padding: 0px; border-color: white;border-radius: 0%;}

/* ______________________________________________________________________Footer________________________________________________________________ */

.Page_Report6 footer{
    margin: 0px 20px 10px 20px;
    display: grid;
    grid-template-columns: repeat(1,99%);
    grid-template-rows: repeat(2 ,45%);
    text-align: center;
    justify-content: space-around;
    align-content:space-around;
    box-shadow: 1px 1px 1px 0px black;
    padding-bottom: 4px;
}

.Page_Report6 footer .tfooter6{
    display: grid;
    grid-template-columns: repeat(3,30%);
    justify-content: space-between;
}
.Page_Report6 footer .tfooter6{ font-size: 17px; font-weight: bold; text-decoration: underline; }
.Page_Report6 footer .bfooter6{
    display: grid;
    grid-template-columns: repeat(3,30%);
    justify-content: space-between;
}
.Page_Report6 footer .bfooter6 input{ font-size: 13px; font-weight: bold; text-align: center; border: 0px solid white;}

.cover_opp6{
    width: 100%;
    height: 100%;
    position: fixed;
    top:0px;
    left: 0px;
    background-color: rgba(20,20,20,0.7);
    z-index: 9999999999;
    display: none;
}
.style_exit{
    width: 40px;
    height: 40px;
    border-radius: 50px;
    position: absolute;
    right: -20px;
    top: -20px;
}

</style>
<template>
<div class="cover_opp6">
	<div class="alert_kero">
        <div class="icon_alert_kero">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
              </svg>
        </div>
        <div class="text_alert_kero">your opctins is sucsses</div>
    </div>
    <div class="Page_Report6" style="direction: rtl;">
        <header>
        <button class="btn btn-danger exit6 style_exit" v-on:click="exits5()">X</button>
            <h3>طلب شراء محلى / خارجى</h3>
            <div class="report_number6">أذن رقم({{PayRequest_Report2_data.id_num}})</div>

            <input type="date" class="date" v-model="PayRequest_Report2_data.date">
        </header>
        <section class="Body6" style="direction: rtl;">
            <table>
                <tr>
                    <th>اسم الصنف و مواصفاتة</th>
                    <th>الكمية المطلوبة </th>
                    <th>رصيد المخزن</th>
                    <th>كود الصنف</th>
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
                        <td><input type="text" v-model="data_b.Name" class="p_Quantety1" placeholder="---------------"></td>
                        <td><input type="text" v-model="data_b.part_count" class="Quantety1" placeholder="---------------"></td>
                        <td><input type="text" v-model="data_b.Balance" class="p_Quantety1" placeholder="---------------"></td>
                        <td><input type="text" v-model="data_b.part_id" class="p_number1" placeholder="---------------"></td>
                        <td><input type="text" v-model="data_b.notes" class="notes1" placeholder="---------------"></td>
                    </tr>
                </span>

            </table>
        </section>
        <footer>
            <div class="tfooter6">
                <div>مسئول المخزن</div>
                <div> مدير المطحن</div>
                <div> مدير المشتريات</div>
            </div>
            <div class="bfooter6">
                <div><input type="text" class="notes1" placeholder="...................." ></div>
                <div><input type="text" class="notes1" placeholder="...................." ></div>
                <div><input type="text" class="notes1" placeholder="...................." readonly></div>
            </div>
        </footer>
        <button class="btn btn-success save1 style_save_butn" v-on:click="save_order_pay2()"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
            <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
            </svg>
        </button>
    </div>
</div>
</template>

<script>
    export default {
        props:['id_num_order_pay2','departs','data_bs'],
        mounted() {
            $('.style_save_butn').click(function (e) { 
                e.preventDefault();
                $(this).attr('disabled','disabled');
            });
        },
        data(){
            return{
                itemsto:{},
                items:this.departs,
                data_b:this.data_bs,
                PayRequest_Report2_data:{id_num:parseInt(this.id_num_order_pay2)+1},
            }
        },
        methods:{
            exits5(){$('.cover_opp6').fadeOut();},
    isObjectEmpty(someObject){
      return !(Object.keys(someObject).length)
    },
            save_order_pay2(event){
                axios.post('./save_order_pay2',{hadr_foter:this.PayRequest_Report2_data,data_b:this.data_b})
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
					    $('.cover_opp6').fadeOut();
                    }
                        this.PayRequest_Report2_data['id_num']=response.data.new_id;
                        axios.post('./do_event_one');
                        $('.style_save_butn').attr('disabled',false);
                })
                .catch((response)=>{
                        this.PayRequest_Report2_data['id_num']=response.data.new_id;
                    alert("error syntex");
                        $('.style_save_butn').attr('disabled',false);
                });
            }
        }
    }
</script>
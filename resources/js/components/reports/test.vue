<template>
	<div class="pd-ltr-20">
        <link rel="stylesheet" href="/public/style_reports/style.css">
		<div class="card-box pd-20 height-100-p mb-30">
			<div class="row align-items-center" style="height:fit-content;">
                <div class="body_controlers"  style="height:fit-content;">
                    
                    
                    
      <div class="header_report">
        <span class="for_logo">
          <img src="img/title.png" class="img_titll" alt="" srcset="">
        </span>
        <span class="for_title">
          <h1>اِخطار أعطال</h1>
          <h2>( <input type="text" class="numb_" style="width: 60px;" id="" placeholder="........"> ) رقم</h2>
        </span>
      </div>
      <div class="body_report">
        <div class="part_one_of_body">
          <h3 class="title_opject">:بيانات تملأ بمعرفة الجهة الطالية للاصلاح</h3>
          <br>
          <span class="input_group_one">
            <h4>التاريــخ: <input type="text" class="numb_" style="width: 60px;" id="" placeholder="........">/ <input type="text" class="numb_" style="width: 60px;" id="" placeholder="........">/<input type="text" class="numb_" style="width: 20px;" id="" placeholder="........">202م</h4>
            <h4> <input type="text" class="numb_" style="width: 120px;" id="" placeholder="........................">:مكان العطل</h4>
            <h4> <input type="text" class="numb_" style="width: 120px;" id="" placeholder="........................">:الجهة الطالبة للاصلاح</h4>
            <h4> <input type="text" class="numb_" style="width: 120px;" id="" placeholder="........................">:الجهة الطالبة للاصلاح</h4>
          </span>
          <span class="input_group_two">
            <h4><input type="text" class="numb_" style="width: 50px;" id="" placeholder="........................"> : <input type="text" class="numb_" style="width: 50px;" id="" placeholder="........................">  توقيت بداية العطل</h4>
            <h4> <input type="text" class="numb_" style="width: 120px;" id="" placeholder="........................">:اســــــم المعدة</h4>
            <h4> <input type="text" class="numb_" style="width: 120px;" id="" placeholder="........................">:توقيع المســــؤل</h4>
            <h4> <input type="text" class="numb_" style="width: 120px;" id="" placeholder="........................">:مســــؤل الكنترول</h4>
          </span>
          <span class="end_input_part_one">
           <span class="title_sec">
            <span class="space"></span> <span class="body_inp_p_n"><input type="radio" name="checkbox_" id="don1"  onclick="doco()"> الصيانة الميكانيكية </span> <span class="space"></span> <span class="body_inp_p_n"><input type="radio" name="checkbox_" id="don2" onclick="doco()"> الصيانة الكهربية </span>
           </span>
           <span class="title_sec" id="text_fon">
            <span class="space"></span> :موجه الي قسم
           </span>
          </span>
        </div>
        <div class="part_tow_of_body">
          <h3 class="title_opject">: بيانات تُملأ بمعرفة ادارة الصيانة</h3>
          <table class="table" style="margin-top: 10px;">
            <tbody>
              <tr>
                <td style="width: 60px;"><h6><input type="text" class="numb_" style="width: 60px;" id="" placeholder="........................"> /<input type="text" class="numb_" style="width: 30px;" id="" placeholder="........................"> /<input type="text" class="numb_" style="width: 30px;" id="" placeholder="........................"> :تاريخ بداية الاصلاح</h6><h6><input type="text" class="numb_" style="width: 120px;" id="" placeholder="........................">:توقيت بداية الاصلاح</h6></td>
                <td style="width: 60px;"><h5><input type="text" class="numb_" style="width: 120px;" id="" placeholder="........................">:اسم المعدة</h5><h5><input type="text" class="numb_" style="width: 120px;" id="" placeholder="........................">:رقم المعدة</h5></td>
                <td colspan="2" style="width: 60px;font-size:20px"><input type="text" class="numb_" style="width: 120px;" id="" placeholder="........................"> :الفني المكلف بالاصلاح</td>
              </tr>
              <tr>
                <th colspan="4">
                  <h6>:المطلوب عمله</h6>
                  <textarea rows="" cols="" class="numb_" style="width: 100%;height:50px" placeholder=".........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................."></textarea>
                </th>
              </tr>
              <tr>
                <td style="width: 60px; text-align:center;font-size:17px">
                  ملاحظات
                </td>
                <td style="width: 60px; text-align:center;font-size:17px">
                  عددها
                </td>
                <td style="width: 60px; text-align:center;font-size:17px">
                  قطع الغيار المستخدمة
                </td>
                <td style="width: 60px; text-align:center;font-size:17px">
                  ماتم عملة
                </td>
              </tr>
              <tr>
                <td style="width: 60px; text-align:center">
                  <textarea rows="" cols="" class="numb_" style="width: 100%;height:180px" placeholder="......................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................."></textarea>

                </td>
                <td style="width: 60px; text-align:center">
                  <textarea rows="" cols="" class="numb_" style="width: 100%;height:180px" placeholder="....................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................."></textarea>

                </td>
                <td style="width: 60px; text-align:center">
                  <textarea rows="" cols="" class="numb_" style="width: 100%;height:180px" placeholder="..........................................................................................................................................................................................................................................................................................................................................."></textarea>

                </td>
                <td style="width: 60px; text-align:center">
                  <textarea rows="" cols="" class="numb_" style="width: 100%;height:180px" placeholder="...................................................................................................................................................................................................................................................................................................................................................................."></textarea>

                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <span class="n_mang">(<input type="text" class="numb_" style="width: 140px;" id="" placeholder="..............................................">)<br>مدير الصيانة</span>
                  <h6>.تم الاصلاح ساعة <input type="text" class="numb_" style="width: 140px;" id="" placeholder=".............................................."> بتاريـــــخ <input type="text" class="numb_" style="width: 23px;" id="" placeholder="........................">/<input type="text" class="numb_" style="width: 23px;" id="" placeholder="........................"> /<input type="text" class="numb_" style="width: 50px;" id="" placeholder="........................"><span class="space"></span><span class="space"></span> واصبحت المعدة جاهزة للعمل</h6>
                  <span class="n_mang_two">(<input type="text" class="numb_" style="width: 140px;" id="" placeholder="..............................................">)<br>توقيع الجهة الطالبة للاصلاح</span>
                <br><br><br></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>


                </div>
			</div>
		</div>
    </div>
</template>


<script>
    export default {
        mounted() {
        
				$('.no-arrow').removeClass('active');
				$('.milling').addClass('active');
        },
        data() {
            return{
                items:12,
                i:5,
            }
        }
    }
</script>
<!--
@include('form_total_work')

    <div class="swal2-containerlola kicsapongo swal2-center swal2-fade swal2-shown caver_miss" style="overflow-y: auto;z-index: 9999;display:none">
        <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show body_miss">
            <div class="swal2-header-arietta adams">
                <ul class="swal2-progresssteps" style="display: none;"></ul>
                <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;">
                    <span class="swal2-x-mark">
                        <span class="swal2-x-mark-line-left"></span>
                        <span class="swal2-x-mark-line-right"></span>
                    </span>
                </div>
                <img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title">Oops...</h2>
                <button type="button" class="swal2-close" style="display: none;">×</button>
                </div>
                <div class="swal2-content">
                    <div id="swal2-content" class="miss" style="display: block;"></div>
                <input class="swal2-input" style="display: none;">
                <input type="file" class="swal2-file" style="display: none;">
                <div class="swal2-range" style="display: none;"></div>
                <div class="swal2-validationerror" id="swal2-validationerror" style="display: none;"></div>
            </div>
            <div class="swal2-actions" style="display: flex;">
                <button type="button" class="swal2-confirm swal2-styled _okey_" aria-label="" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">OK</button>
            </div>
            <div class="swal2-footer" style="display: none;"></div>
        </div>
    </div>


    <div class="swal2-container swal2-center swal2-fade swal2-shown caver_miss2" style="overflow-y: auto;z-index: 9999;display:none">
        <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show body_miss2">
            <div class="swal2-header"><ul class="swal2-progresssteps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div><div class="swal2-icon swal2-question" style="display: none;"><span class="swal2-icon-text">?</span></div><div class="swal2-icon swal2-warning" style="display: none;"><span class="swal2-icon-text">!</span></div><div class="swal2-icon swal2-info" style="display: none;"><span class="swal2-icon-text">i</span></div><div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title">Success!</h2><button type="button" class="swal2-close" style="display: none;">×</button></div>
                <div class="swal2-content">
                    <div id="swal2-content" class="miss2" style="display: block;"></div>
                <input class="swal2-input" style="display: none;">
                <input type="file" class="swal2-file" style="display: none;">
                <div class="swal2-range" style="display: none;"></div>
                <div class="swal2-validationerror" id="swal2-validationerror" style="display: none;"></div>
            </div>
            <div class="swal2-actions" style="display: flex;">
                <button type="button" class="swal2-confirm swal2-styled _okey_2" aria-label="" style="border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">OK</button>
            </div>
            <div class="swal2-footer" style="display: none;"></div>
        </div>
    </div>

-->
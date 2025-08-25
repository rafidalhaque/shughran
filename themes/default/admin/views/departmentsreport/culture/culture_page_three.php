<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'শিল্প ও সংস্কৃতি বিভাগ - পেইজ ০৩ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/culture-page-three' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/culture-page-three' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/culture-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/culture-page-three' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/culture-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/culture-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/culture-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
    }
}
?>
&nbsp;&nbsp;

<span class="dropdown">

    <button class="btn btn-primary dropdown-toggle" type="button" id="archive" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Archive
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="archive">


        <?php

        echo   ' <li>' . anchor('admin/departmentsreport/culture-page-three' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/culture-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/culture-page-three' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
        }
        ?>

    </ul>
</span>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">

                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/culture-page-three') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/culture-page-three/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
                <li>
                    <a id='export_all_table'><i class="icon fa fa-file-excel-o"></i> <?= lang('Export_all_table') ?> 	</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php // lang('list_results'); ?></p>


<script>
$(document).ready(function(){
    $("#export_all_table").on("click",function(){
        for(let i=1; i<=12;i++)
        {
            $("#table_"+i).click();
        }
    });
});
</script>

                <div class="table-responsive">


				<style type="text/css">
                    #export_all_table{
                        cursor: pointer;
                    }
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-izx2{border-color:black;background-color:#efefef;}
.tg .tg-pwj7{background-color:#efefef;border-color:black;}
.tg .tg-0pky{border-color:black;vertical-align:top}
.tg .tg-y698{background-color:#efefef;border-color:black;vertical-align:top}
.tg .tg-0lax{border-color:black;vertical-align:top}
@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}

.table-header-rotated {
  border-collapse: collapse;
}
.table-header-rotated td {
  width: 30px;
}
.no-csstransforms .table-header-rotated td {
  padding: 5px 10px;
}
.table-header-rotated td {
  text-align: center;
  padding: 10px 5px;
  border: 1px solid #ccc;
}
.table-header-rotated td.rotate {
  height: 140px;
  white-space: nowrap;
}
 .table-header-rotated td.rotate > div {
  -webkit-transform: translate(10px, 51px) rotate(270deg);
          transform: translate(10px, 51px) rotate(270deg);
  width: 20px;
}
 .table-header-rotated td.rotate > div > span {
   
  padding: 5px 10px;
}
.table-header-rotated td.row-header {
  padding: 0 10px;
  border-bottom: 1px solid #ccc;
}
.table > tbody > tr > td {
	border: 1px solid #ccc;
}
</style>
                    <div class="tg-wrap">
                    <table class="tg table table-header-rotated" id="testTable1">
                    <tr>                           
                        <td class="tg-pwj7" colspan='7'><b>পরিবেশনা </b></td>
                        <td class="tg-pwj7" colspan="2">
                            <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Culture_পরিবেশনা.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>
                   <tr>
                        <td class="tg-pwj7" rowspan=""> বিবরণ  </td>
                        <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>

                        <td class="tg-pwj7" rowspan=""> বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>

                       <td class="tg-pwj7" rowspan=""> বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">উপস্থিতি </td>
                   </tr>

                   <tr>
                       <td class="tg-y698 type_1"> সাংস্কৃতিক অনুষ্ঠান 	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $cultural_onushthan_num = $culture_poribeshona['cultural_onushthan_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $cultural_onushthan_pre = $culture_poribeshona['cultural_onushthan_pre'] ?>
                       </td>

                       <td class="tg-y698"> ভ্রাম্যমাণ পরিবেশনা  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $vrammoman_poribeshona_num = $culture_poribeshona['vrammoman_poribeshona_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $vrammoman_poribeshona_pre = $culture_poribeshona['vrammoman_poribeshona_pre'] ?>
                       </td>

                       <td class="tg-y698">সাংস্কৃতিক উৎসব </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shangsritik_utshob_num = $culture_poribeshona['shangsritik_utshob_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $shangsritik_utshob_pre = $culture_poribeshona['shangsritik_utshob_pre'] ?>
                       </td>      
                   </tr>

                   <tr>
                       <td class="tg-y698">সঙ্গীতানুষ্ঠান  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shongit_onushthan_num = $culture_poribeshona['shongit_onushthan_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $shongit_onushthan_pre = $culture_poribeshona['shongit_onushthan_pre'] ?>
                       </td>

                       <td class="tg-y698"> সাংস্কৃতিক আড্ডা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sangsritik_add_num = $culture_poribeshona['sangsritik_add_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $sangsritik_add_pre = $culture_poribeshona['sangsritik_add_pre'] ?>
                       </td>
                     
                   
                  
                       <td class="tg-y698">নাট্য উৎসব </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $natto_utshob_num = $culture_poribeshona['natto_utshob_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $natto_utshob_pre = $culture_poribeshona['natto_utshob_pre'] ?>
                       </td>
                     
                   
                   </tr>

                   <td class="tg-y698">আবৃত্তি অনুষ্ঠান  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $abritti_onushthan_num = $culture_poribeshona['abritti_onushthan_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $abritti_onushthan_pre = $culture_poribeshona['abritti_onushthan_pre'] ?>
                       </td>

                       <td class="tg-y698"> পথনাট্য </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $pothonatto_num = $culture_poribeshona['pothonatto_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $pothonatto_pre = $culture_poribeshona['pothonatto_pre'] ?>
                       </td>
                     
                   
                  
                       <td class="tg-y698">প্রকাশনা উৎসব </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $prokashona_utshob_num = $culture_poribeshona['prokashona_utshob_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $prokashona_utshob_pre = $culture_poribeshona['prokashona_utshob_pre'] ?>
                    </td>

                   <tr>
                       <td class="tg-y698">নাটক মঞ্চায়ন  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $natok_monchayon_num = $culture_poribeshona['natok_monchayon_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $natok_monchayon_pre = $culture_poribeshona['natok_monchayon_pre'] ?>
                       </td>
                     
              
                   
                   
                       
                       <td class="tg-y698">মুকাভিনয় </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $mukavinoy_num = $culture_poribeshona['mukavinoy_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $mukavinoy_pre = $culture_poribeshona['mukavinoy_pre'] ?>
                       </td>
                     
              
                   
                  
                       <td class="tg-y698">সাংস্কৃতিক প্রতিযোগিতা  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shangsritik_protijogita_num = $culture_poribeshona['shangsritik_protijogita_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $shangsritik_protijogita_pre = $culture_poribeshona['shangsritik_protijogita_pre'] ?>
                       </td>
                     
              
                   
                   </tr>
                  
                   
                   <tr>
                       <td class="tg-y698">টিভি অনুষ্ঠান</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $tv_onushtahan_num = $culture_poribeshona['tv_onushtahan_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $tv_onushtahan_pre = $culture_poribeshona['tv_onushtahan_pre'] ?>
                       </td>
                  
                       <td class="tg-y698"> একাঙ্কিকা </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $ekangkika_num = $culture_poribeshona['ekangkika_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $ekangkika_pre = $culture_poribeshona['ekangkika_pre'] ?>
                       </td>
                  
                       <td class="tg-y698">চিত্রাঙ্কন প্রতিযোগিতা  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $chitrangkon_protijogita_num = $culture_poribeshona['chitrangkon_protijogita_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $chitrangkon_protijogita_pre = $culture_poribeshona['chitrangkon_protijogita_pre'] ?>
                       </td>
                
                   
                   </tr>

                   <tr>
                       <td class="tg-y698"> কবিতা পাঠের আসর  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $kobita_pather_ashor_num = $culture_poribeshona['kobita_pather_ashor_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $kobita_pather_ashor_pre = $culture_poribeshona['kobita_pather_ashor_pre'] ?>
                       </td>
                    
              
                   
                   
                       <td class="tg-y698">প্রদর্শনী </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $prodorshoni_num = $culture_poribeshona['prodorshoni_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $prodorshoni_pre = $culture_poribeshona['prodorshoni_pre'] ?>
                       </td>
                
                   
                  
                       <td class="tg-y698">উন্মুক্ত সাংস্কৃতিক অনুুষ্ঠান </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $unmukto_shang_onushthan_num = $culture_poribeshona['unmukto_shang_onushthan_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $unmukto_shang_onushthan_pre = $culture_poribeshona['unmukto_shang_onushthan_pre'] ?>
                       </td>
                    
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698"> পুঁথি পাঠের আসর  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $puthi_pather_ashor_num = $culture_poribeshona['puthi_pather_ashor_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $puthi_pather_ashor_pre = $culture_poribeshona['puthi_pather_ashor_pre'] ?>
                       </td>
                    
              
                   
                   
                       <td class="tg-y698">গীতি আলেখ্য	 </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $giti_alekkho_num = $culture_poribeshona['giti_alekkho_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $giti_alekkho_pre = $culture_poribeshona['giti_alekkho_pre'] ?>
                       </td>

                       <td class="tg-y698">অন্যান্য  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $others_num = $culture_poribeshona['others_num'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $others_pre = $culture_poribeshona['others_pre'] ?>
                       </td>
                
                   
                   </tr>
               
               

                 </table>

                <table class="tg table table-header-rotated" id="testTable2">
                    <tr>                           
                        <td class="tg-pwj7" colspan='7'><b>আইটি, প্রচার ও মিডিয়া  </b></td>
                        <td class="tg-pwj7" colspan="2">
                            <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Culture_আইটি, প্রচার ও মিডিয়া.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>
                        
                   <tr>
                    <td class="tg-pwj7" rowspan="">আপলোড </td>
                       <td class="tg-pwj7" colspan="">গান  </td>
                       <td class="tg-pwj7" colspan="">অভিনয়  </td>
                       <td class="tg-pwj7" colspan="">আবৃত্তি </td>
                       <td class="tg-pwj7" colspan="">তেলোয়াত  </td>
                       <td class="tg-pwj7" colspan="">শর্ট ফিল্ম  </td>
                       <td class="tg-pwj7" colspan="">নিউজ </td>
                       <td class="tg-pwj7" colspan="">নিউজ প্রকাশ </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা</td>
                 
                   </tr>

                   <tr>
                       <td class="tg-y698 type_1"> ফেসবুক আপলোড	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $fb_upload_gan = $culture_it_prochar_media_upload['fb_upload_gan'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $fb_upload_ovinoy = $culture_it_prochar_media_upload['fb_upload_ovinoy'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $fb_upload_abritti = $culture_it_prochar_media_upload['fb_upload_abritti'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $fb_upload_tilawat = $culture_it_prochar_media_upload['fb_upload_tilawat'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $fb_upload_short_film = $culture_it_prochar_media_upload['fb_upload_short_film'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $fb_upload_news = $culture_it_prochar_media_upload['fb_upload_news']   ?>
                       </td>
                       <td class="tg-y698  type_2">
                       জাতীয় পত্রিকায় 
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $jatio_potrika = $culture_it_prochar_media_news_prokash['jatio_potrika'] ?>
                       </td>
                      
                   </tr>

                   <tr>
                       <td class="tg-y698 type_1"> টুইটার পোস্ট	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $tw_post_gan = $culture_it_prochar_media_upload['tw_post_gan'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $tw_post_ovinoy = $culture_it_prochar_media_upload['tw_post_ovinoy'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $tw_post_abritti = $culture_it_prochar_media_upload['tw_post_abritti'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $tw_post_tilawat = $culture_it_prochar_media_upload['tw_post_tilawat'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $tw_post_short_film = $culture_it_prochar_media_upload['tw_post_short_film'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $tw_post_news = $culture_it_prochar_media_upload['tw_post_news']   ?>
                       </td>
                       <td class="tg-y698  type_2">
                       স্থানীয় পত্রিকায় 
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $sthanio_potrika = $culture_it_prochar_media_news_prokash['sthanio_potrika'] ?>
                       </td>
             
                      
                   </tr>


                   <tr>
                       <td class="tg-y698">ইউটিউব  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $yt_gan = $culture_it_prochar_media_upload['yt_gan'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $yt_ovinoy = $culture_it_prochar_media_upload['yt_ovinoy'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $yt_abritti = $culture_it_prochar_media_upload['yt_abritti'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $yt_tilawat = $culture_it_prochar_media_upload['yt_tilawat'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $yt_short_film = $culture_it_prochar_media_upload['yt_short_film'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $yt_news = $culture_it_prochar_media_upload['yt_news']   ?>
                       </td>
                       <td class="tg-y698  type_2">
                       অনলাইন পত্রিকায়
                        </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $online_potrika = $culture_it_prochar_media_news_prokash['online_potrika'] ?>
                       </td>
             
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">ওয়েবসাইট  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $web_gan = $culture_it_prochar_media_upload['web_gan'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $web_ovinoy = $culture_it_prochar_media_upload['web_ovinoy'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $web_abritti = $culture_it_prochar_media_upload['web_abritti'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $web_tilawat = $culture_it_prochar_media_upload['web_tilawat'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $web_short_film = $culture_it_prochar_media_upload['web_short_film'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $web_news = $culture_it_prochar_media_upload['web_news']   ?>
                       </td>
                       <td class="tg-y698  type_2">
                       অনলাইন ব্লগে লেখা
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $online_blog = $culture_it_prochar_media_news_prokash['online_blog'] ?>
                       </td>
             
                   
                   </tr>
                   <tr>
                       <td class="tg-y698"> অন্যান্য </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $other_gan = $culture_it_prochar_media_upload['other_gan'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $other_ovinoy = $culture_it_prochar_media_upload['other_ovinoy'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $other_abritti = $culture_it_prochar_media_upload['other_abritti'] ?>
                       </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $other_tilawat = $culture_it_prochar_media_upload['other_tilawat'] ?>
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $other_short_film = $culture_it_prochar_media_upload['other_short_film'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $other_news = $culture_it_prochar_media_upload['other_news']   ?>
                       </td>
                       <td class="tg-y698  type_2">
                       উইকিপিডিয়ায় লেখা
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $wikipedia = $culture_it_prochar_media_news_prokash['wikipedia'] ?>
                       </td>
             
                   
                   </tr>
                 
               
                </table>
                <table class="tg table table-header-rotated" id="testTable3">
                      
                   
                    <tr>                           
                    <td class="tg-pwj7" colspan='6'><b>বিশেষ কার্যক্রম  </b></td>
                    <td class="tg-pwj7" colspan="2">
                            <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Culture_বিশেষ কার্যক্রম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>
                   <tr>
                       <td class="tg-pwj7" rowspan="">বিবরণ</td>
                       <td class="tg-pwj7" colspan="">সংখ্যা</td>
                       <td class="tg-pwj7" colspan="">অংশগ্রহণ</td>
                       <td class="tg-pwj7" colspan="">মেয়াদকাল</td>

                       <td class="tg-pwj7" colspan="">বিবরণ  </td>
                       <td class="tg-pwj7" colspan="">সংখ্যা </td>
                       <td class="tg-pwj7" colspan="">অংশগ্রহণ</td>
                       <td class="tg-pwj7" colspan="">মেয়াদকাল</td>


                   </tr>

                   <tr>
                       <td class="tg-pwj7  type_1">
                       শিল্পী সংগ্রহ অভিযান 
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $shilpi_shongroho_num = $culture_bishes_karjokrom['shilpi_shongroho_num'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $shilpi_shongroho_attend = $culture_bishes_karjokrom['shilpi_shongroho_attend'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $shilpi_shongroho_meyad = $culture_bishes_karjokrom['shilpi_shongroho_meyad'] ?>
                       </td>

                       <td class="tg-pwj7  type_1">
                       বিক্রয় ও বিতরণ কার্যক্রম
                        </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $bikroy_bitoron_karjokrom_num = $culture_bishes_karjokrom['bikroy_bitoron_karjokrom_num'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $bikroy_bitoron_karjokrom_attend = $culture_bishes_karjokrom['bikroy_bitoron_karjokrom_attend'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $bikroy_bitoron_karjokrom_meyad = $culture_bishes_karjokrom['bikroy_bitoron_karjokrom_meyad'] ?>
                       </td>


                   </tr>
                   <tr>
                       <td class="tg-pwj7  type_1">
                       বিশেষ প্রতিযোগিতা
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $bishes_protijogita_num = $culture_bishes_karjokrom['bishes_protijogita_num'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $bishes_protijogita_attend = $culture_bishes_karjokrom['bishes_protijogita_attend'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $bishes_protijogita_meyad = $culture_bishes_karjokrom['bishes_protijogita_meyad'] ?>
                       </td>

                       <td class="tg-pwj7  type_1">
                       বৃক্ষরোপণ কর্মসূচী
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $brikkhoropon_kormoshuchi_num = $culture_bishes_karjokrom['brikkhoropon_kormoshuchi_num'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $brikkhoropon_kormoshuchi_attend = $culture_bishes_karjokrom['brikkhoropon_kormoshuchi_attend'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $brikkhoropon_kormoshuchi_meyad = $culture_bishes_karjokrom['brikkhoropon_kormoshuchi_meyad'] ?>
                       </td>

                    
                   </tr>
                   <td class="tg-pwj7  type_1">
                   কুইজ/সাধারণ জ্ঞান প্রতিযোগিতা 
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $quiz_protijogita_num = $culture_bishes_karjokrom['quiz_protijogita_num'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $quiz_protijogita_attend = $culture_bishes_karjokrom['quiz_protijogita_attend'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $quiz_protijogita_meyad = $culture_bishes_karjokrom['quiz_protijogita_meyad'] ?>
                       </td>

                       <td class="tg-pwj7  type_1">
                       রক্তদান কর্মসূচী
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $rokto_kormoshuchi_num = $culture_bishes_karjokrom['rokto_kormoshuchi_num'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $rokto_kormoshuchi_attend = $culture_bishes_karjokrom['rokto_kormoshuchi_attend'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $rokto_kormoshuchi_meyad = $culture_bishes_karjokrom['rokto_kormoshuchi_meyad'] ?>
                       </td>

                    
                   </tr>

                   <tr>
                   <td class="tg-pwj7  type_1">
                   রচনা/প্রবন্ধ প্রতিযোগিতা
                       
                     </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $rochona_protijogita_num = $culture_bishes_karjokrom['rochona_protijogita_num'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $rochona_protijogita_attend = $culture_bishes_karjokrom['rochona_protijogita_attend'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $rochona_protijogita_meyad = $culture_bishes_karjokrom['rochona_protijogita_meyad'] ?>
                       </td>

                       <td class="tg-pwj7  type_1">
                       শিক্ষা সফর 
                       </td>
                       <td class="tg-0pky  type_2">
                       <?php echo $shikkha_sofor_num = $culture_bishes_karjokrom['shikkha_sofor_num'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $shikkha_sofor_attend = $culture_bishes_karjokrom['shikkha_sofor_attend'] ?>
                       </td>
                       <td class="tg-0pky  type_3">
                       <?php echo $shikkha_sofor_meyad = $culture_bishes_karjokrom['shikkha_sofor_meyad'] ?>
                       </td>

                      
                   </tr>
               

                </table>
                <table class="tg table table-header-rotated" id="testTable4">
                    <tr>                           
                        <td class="tg-pwj7" colspan='6'><b>আউটপুট রিপোর্ট  </b></td>
                        <td class="tg-pwj7" colspan="2">
                            <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Culture_আউটপুট রিপোর্ট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                        </td>
                    </tr>

                   <tr>
                       <td class="tg-pwj7" rowspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি </td>
                       <td class="tg-pwj7" rowspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি </td>
                       <td class="tg-pwj7" rowspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি </td>
                       <td class="tg-pwj7" rowspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি </td>
                   
                   </tr>

                   <tr>
                       <td class="tg-y698 type_1"> গীতিকার 	</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $gitikar = $culture_output_report['gitikar'] ?>
                       </td>           
                       <td class="tg-y698">উপস্থাপক </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $uposthapok = $culture_output_report['uposthapok'] ?>
                       </td>                 
                
                       <td class="tg-y698">বক্তা</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $bokta = $culture_output_report['bokta'] ?>
                       </td>
                                
                       <td class="tg-y698">সেট ডিজাইনার </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $set_designer = $culture_output_report['set_designer'] ?>
                       </td>
                   </tr>
                   <tr>
                       <td class="tg-y698">সুরকার  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shurokar = $culture_output_report['shurokar'] ?>
                       </td>
      
                       <td class="tg-y698">ক্বারী		  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $kari = $culture_output_report['kari'] ?>
                       </td>            

                       <td class="tg-y698">বিতার্কিক		  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $bitarkik = $culture_output_report['bitarkik'] ?>
                       </td>

                       <td class="tg-y698">কার্টুনিস্ট	  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $cartoonist = $culture_output_report['cartoonist'] ?>
                       </td>
                     
                    </tr>
                    <tr>
                  
                       <td class="tg-y698">নাট্যকার		 </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $nattokar = $culture_output_report['nattokar'] ?>
                       </td>
                      
                       <td class="tg-y698">কবি  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $kobi = $culture_output_report['kobi'] ?>
                       </td>

                       <td class="tg-y698">প্রশিক্ষক		  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $proshikkhok = $culture_output_report['proshikkhok'] ?>
                       </td>

                       <td class="tg-y698">চারু শিল্পী  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $charu_shilpi = $culture_output_report['charu_shilpi'] ?>
                       </td>
                     
                       </tr>
                       <tr>                   
                         <td class="tg-y698">নির্দেশক		   </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $nirdeshok = $culture_output_report['nirdeshok'] ?>
                       </td>
                   
                       <td class="tg-y698">লেখক		   </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $lekhok = $culture_output_report['lekhok'] ?>
                       </td>
                       <td class="tg-y698">ফটোগ্রাফার  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $photographer = $culture_output_report['photographer'] ?>
                       </td>
  
                       <td class="tg-y698">ক্যালিওগ্রাফার   </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $calligraphr = $culture_output_report['calligraphr'] ?>
                       </td>

                       </tr>

                       <td class="tg-y698">সংগীতশিল্পী  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shongit_shilpi = $culture_output_report['shongit_shilpi'] ?>
                       </td>

                       <td class="tg-y698">সাংবাদিক  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $shangbadik = $culture_output_report['shangbadik'] ?>
                       </td>
                
                       <td class="tg-y698">ক্যামেরাম্যান   </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $camreaman = $culture_output_report['camreaman'] ?>
                       </td>
                       <td class="tg-y698">হস্ত(কারু)শিল্পী  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $hosto_shilp = $culture_output_report['hosto_shilp'] ?>
                       </td>
                   </tr>

                   </tr>

                       <td class="tg-y698">অভিনেতা  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $ovineta = $culture_output_report['ovineta'] ?>
                       </td>

                       <td class="tg-y698">ভিডিও এডিটর  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $video_editor = $culture_output_report['video_editor'] ?>
                       </td>

                       <td class="tg-y698"> মেকআপম্যান  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $makeupman = $culture_output_report['makeupman'] ?>
                       </td>
                      
                       <td class="tg-y698">ফ্যাশন ডিজাইনার  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $fashion_designer = $culture_output_report['fashion_designer'] ?>
                       </td>
                     
                   
                   </tr>

                   </tr>

                       <td class="tg-y698">আবৃত্তিকার		 </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $abrittikar = $culture_output_report['abrittikar'] ?>
                       </td>

                       <td class="tg-y698">সাউন্ড ইঞ্জিনিয়ার  </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sound_engineer = $culture_output_report['sound_engineer'] ?>
                       </td>
                      
                       <td class="tg-y698">গ্রাফিক্স ডিজাইনার   </td>
                       <td class="tg-0pky  type_1">
                       <?php echo $graphics_designer = $culture_output_report['graphics_designer'] ?>
                       </td>
                      
                       <td class="tg-y698">স্থাপত্য শিল্পী</td>
                       <td class="tg-0pky  type_1">
                       <?php echo $sthapotto_shilpi = $culture_output_report['sthapotto_shilpi'] ?>
                       </td>       
                   
                   </tr>        

                </table>
                <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>সামিট</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Culture_সামিট.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr> 
                            <tr>
                                <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                                <td class="tg-pwj7" colspan=''>গড়</td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সাংস্কৃতিক কর্মীদের নিয়ে সামিট (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $culture_worker_central_s=$culture_summit['culture_worker_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $culture_worker_central_p=$culture_summit['culture_worker_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($culture_worker_central_s>0 && $culture_worker_central_p>0)
                                {echo ($culture_worker_central_p/$culture_worker_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সাংস্কৃতিক কর্মীদের নিয়ে সামিট (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $culture_worker_shakha_s=$culture_summit['culture_worker_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $culture_worker_shakha_p=$culture_summit['culture_worker_shakha_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($culture_worker_shakha_s>0 && $culture_worker_shakha_p>0)
                                {echo ($culture_worker_shakha_p/$culture_worker_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                        </table>
                        <table class="tg table table-header-rotated" id="testTable6">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_6' onclick="doit('xlsx','testTable6','<?php echo 'Culture_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr> 
                            <tr>
                                <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                                <td class="tg-pwj7" colspan=''>গড়</td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $shikkha_central_s=$culture_training_program['shikkha_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_central_p=$culture_training_program['shikkha_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                                {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $shikkha_shakha_s=$culture_training_program['shikkha_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $shikkha_shakha_p=$culture_training_program['shikkha_shakha_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                                {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $kormoshala_central_s=$culture_training_program['kormoshala_central_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormoshala_central_p=$culture_training_program['kormoshala_central_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                                {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <?php echo $kormoshala_shakha_s=$culture_training_program['kormoshala_shakha_s'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $kormoshala_shakha_p=$culture_training_program['kormoshala_shakha_p'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_shakha_s>0 && $kormoshala_shakha_p>0)
                                {echo ($kormoshala_shakha_p/$kormoshala_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 

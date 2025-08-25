<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'শিল্প ও সংস্কৃতি বিভাগ - পেইজ ০৩ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
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

                <li>
                    <a id='export_all_table'><i class="icon fa fa-file-excel-o"></i> <?= lang('Export_all_table') ?> 	</a>
                </li>
            </ul>
        </div>
    </div>
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
<style type="text/css">
    #export_all_table{
        cursor: pointer;
    }
</style>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">

                        <!-- first table -->
                        <table class="tg table table-header-rotated" id="testTable1">
                    <tr>                           
                        <td class="tg-pwj7" colspan='7'><b>পরিবেশনা </b></td>
                        <td class="tg-pwj7" colspan="2">
                            <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Culture_পরিবেশনা_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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

							<?php $pk = (isset($culture_poribeshona['id']))?$culture_poribeshona['id']:'';?>

                            <tr>
                                <td class="tg-y698 type_1"> সাংস্কৃতিক অনুষ্ঠান 	</td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="cultural_onushthan_num" data-title="Enter">
										<?php echo $cultural_onushthan_num=  (isset( $culture_poribeshona['cultural_onushthan_num']))?$culture_poribeshona['cultural_onushthan_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="cultural_onushthan_pre" data-title="Enter">
										<?php echo $cultural_onushthan_pre=  (isset( $culture_poribeshona['cultural_onushthan_pre']))?$culture_poribeshona['cultural_onushthan_pre']:0; ?></a>
                                </td>

                                <td class="tg-y698"> ভ্রাম্যমাণ পরিবেশনা  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="vrammoman_poribeshona_num" data-title="Enter">
										<?php echo $vrammoman_poribeshona_num=  (isset( $culture_poribeshona['vrammoman_poribeshona_num']))?$culture_poribeshona['vrammoman_poribeshona_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="vrammoman_poribeshona_pre" data-title="Enter">
										<?php echo $vrammoman_poribeshona_pre=  (isset( $culture_poribeshona['vrammoman_poribeshona_pre']))?$culture_poribeshona['vrammoman_poribeshona_pre']:0; ?></a>
                                </td>

                                <td class="tg-y698">সাংস্কৃতিক উৎসব </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shangsritik_utshob_num" data-title="Enter">
										<?php echo $shangsritik_utshob_num=  (isset( $culture_poribeshona['shangsritik_utshob_num']))?$culture_poribeshona['shangsritik_utshob_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shangsritik_utshob_pre" data-title="Enter">
										<?php echo $shangsritik_utshob_pre=  (isset( $culture_poribeshona['shangsritik_utshob_pre']))?$culture_poribeshona['shangsritik_utshob_pre']:0; ?></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="tg-y698">সঙ্গীতানুষ্ঠান  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shongit_onushthan_num" data-title="Enter">
										<?php echo $shongit_onushthan_num=  (isset( $culture_poribeshona['shongit_onushthan_num']))?$culture_poribeshona['shongit_onushthan_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shongit_onushthan_pre" data-title="Enter">
										<?php echo $shongit_onushthan_pre=  (isset( $culture_poribeshona['shongit_onushthan_pre']))?$culture_poribeshona['shongit_onushthan_pre']:0; ?></a>
                                </td>

                                <td class="tg-y698"> সাংস্কৃতিক আড্ডা </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sangsritik_add_num" data-title="Enter">
										<?php echo $sangsritik_add_num=  (isset( $culture_poribeshona['sangsritik_add_num']))?$culture_poribeshona['sangsritik_add_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sangsritik_add_pre" data-title="Enter">
										<?php echo $sangsritik_add_pre=  (isset( $culture_poribeshona['sangsritik_add_pre']))?$culture_poribeshona['sangsritik_add_pre']:0; ?></a>
                                </td>

                                <td class="tg-y698">নাট্য উৎসব </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="natto_utshob_num" data-title="Enter">
										<?php echo $natto_utshob_num=  (isset( $culture_poribeshona['natto_utshob_num']))?$culture_poribeshona['natto_utshob_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="natto_utshob_pre" data-title="Enter">
										<?php echo $natto_utshob_pre=  (isset( $culture_poribeshona['natto_utshob_pre']))?$culture_poribeshona['natto_utshob_pre']:0; ?></a>
                                </td>


                            </tr>

                            <td class="tg-y698">আবৃত্তি অনুষ্ঠান  </td>
                            <td class="tg-0pky  type_1">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abritti_onushthan_num" data-title="Enter">
										<?php echo $abritti_onushthan_num=  (isset( $culture_poribeshona['abritti_onushthan_num']))?$culture_poribeshona['abritti_onushthan_num']:0; ?></a>
                            </td>
                            <td class="tg-0pky  type_2">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abritti_onushthan_pre" data-title="Enter">
										<?php echo $abritti_onushthan_pre=  (isset( $culture_poribeshona['abritti_onushthan_pre']))?$culture_poribeshona['abritti_onushthan_pre']:0; ?></a>
                            </td>

                            <td class="tg-y698"> পথনাট্য </td>
                            <td class="tg-0pky  type_1">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pothonatto_num" data-title="Enter">
										<?php echo $pothonatto_num=  (isset( $culture_poribeshona['pothonatto_num']))?$culture_poribeshona['pothonatto_num']:0; ?></a>
                            </td>
                            <td class="tg-0pky  type_2">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="pothonatto_pre" data-title="Enter">
										<?php echo $pothonatto_pre=  (isset( $culture_poribeshona['pothonatto_pre']))?$culture_poribeshona['pothonatto_pre']:0; ?></a>
                            </td>

                            <td class="tg-y698">প্রকাশনা উৎসব </td>
                            <td class="tg-0pky  type_1">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="prokashona_utshob_num" data-title="Enter">
										<?php echo $prokashona_utshob_num=  (isset( $culture_poribeshona['prokashona_utshob_num']))?$culture_poribeshona['prokashona_utshob_num']:0; ?></a>
                            </td>
                            <td class="tg-0pky  type_2">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="prokashona_utshob_pre" data-title="Enter">
										<?php echo $prokashona_utshob_pre=  (isset( $culture_poribeshona['prokashona_utshob_pre']))?$culture_poribeshona['prokashona_utshob_pre']:0; ?></a>
                            </td>

                            <tr>
                                <td class="tg-y698">নাটক মঞ্চায়ন  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="natok_monchayon_num" data-title="Enter">
										<?php echo $natok_monchayon_num=  (isset( $culture_poribeshona['natok_monchayon_num']))?$culture_poribeshona['natok_monchayon_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="natok_monchayon_pre" data-title="Enter">
										<?php echo $natok_monchayon_pre=  (isset( $culture_poribeshona['natok_monchayon_pre']))?$culture_poribeshona['natok_monchayon_pre']:0; ?></a>
                                </td>

                                <td class="tg-y698">মুকাভিনয় </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mukavinoy_num" data-title="Enter">
										<?php echo $mukavinoy_num=  (isset( $culture_poribeshona['mukavinoy_num']))?$culture_poribeshona['mukavinoy_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="mukavinoy_pre" data-title="Enter">
										<?php echo $mukavinoy_pre=  (isset( $culture_poribeshona['mukavinoy_pre']))?$culture_poribeshona['mukavinoy_pre']:0; ?></a>
                                </td>

                                <td class="tg-y698">সাংস্কৃতিক প্রতিযোগিতা  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shangsritik_protijogita_num" data-title="Enter">
										<?php echo $shangsritik_protijogita_num=  (isset( $culture_poribeshona['shangsritik_protijogita_num']))?$culture_poribeshona['shangsritik_protijogita_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shangsritik_protijogita_pre" data-title="Enter">
										<?php echo $shangsritik_protijogita_pre=  (isset( $culture_poribeshona['shangsritik_protijogita_pre']))?$culture_poribeshona['shangsritik_protijogita_pre']:0; ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-y698">টিভি অনুষ্ঠান</td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="tv_onushtahan_num" data-title="Enter">
										<?php echo $tv_onushtahan_num=  (isset( $culture_poribeshona['tv_onushtahan_num']))?$culture_poribeshona['tv_onushtahan_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="tv_onushtahan_pre" data-title="Enter">
										<?php echo $tv_onushtahan_pre=  (isset( $culture_poribeshona['tv_onushtahan_pre']))?$culture_poribeshona['tv_onushtahan_pre']:0; ?></a>
                                </td>

                                <td class="tg-y698"> একাঙ্কিকা </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ekangkika_num" data-title="Enter">
										<?php echo $ekangkika_num=  (isset( $culture_poribeshona['ekangkika_num']))?$culture_poribeshona['ekangkika_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ekangkika_pre" data-title="Enter">
										<?php echo $ekangkika_pre=  (isset( $culture_poribeshona['ekangkika_pre']))?$culture_poribeshona['ekangkika_pre']:0; ?></a>
                                </td>

                                <td class="tg-y698">চিত্রাঙ্কন প্রতিযোগিতা  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="chitrangkon_protijogita_num" data-title="Enter">
										<?php echo $chitrangkon_protijogita_num=  (isset( $culture_poribeshona['chitrangkon_protijogita_num']))?$culture_poribeshona['chitrangkon_protijogita_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="chitrangkon_protijogita_pre" data-title="Enter">
										<?php echo $chitrangkon_protijogita_pre=  (isset( $culture_poribeshona['chitrangkon_protijogita_pre']))?$culture_poribeshona['chitrangkon_protijogita_pre']:0; ?></a>
                                </td>


                            </tr>

                            <tr>
                                <td class="tg-y698"> কবিতা পাঠের আসর  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kobita_pather_ashor_num" data-title="Enter">
										<?php echo $kobita_pather_ashor_num=  (isset( $culture_poribeshona['kobita_pather_ashor_num']))?$culture_poribeshona['kobita_pather_ashor_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kobita_pather_ashor_pre" data-title="Enter">
										<?php echo $kobita_pather_ashor_pre=  (isset( $culture_poribeshona['kobita_pather_ashor_pre']))?$culture_poribeshona['kobita_pather_ashor_pre']:0; ?></a>
                                </td>
                                <td class="tg-y698">প্রদর্শনী </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="prodorshoni_num" data-title="Enter">
										<?php echo $prodorshoni_num=  (isset( $culture_poribeshona['prodorshoni_num']))?$culture_poribeshona['prodorshoni_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="prodorshoni_pre" data-title="Enter">
										<?php echo $prodorshoni_pre=  (isset( $culture_poribeshona['prodorshoni_pre']))?$culture_poribeshona['prodorshoni_pre']:0; ?></a>
                                </td>
                                <td class="tg-y698">উন্মুক্ত সাংস্কৃতিক অনুুষ্ঠান </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="unmukto_shang_onushthan_num" data-title="Enter">
										<?php echo $unmukto_shang_onushthan_num=  (isset( $culture_poribeshona['unmukto_shang_onushthan_num']))?$culture_poribeshona['unmukto_shang_onushthan_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="unmukto_shang_onushthan_pre" data-title="Enter">
										<?php echo $unmukto_shang_onushthan_pre=  (isset( $culture_poribeshona['unmukto_shang_onushthan_pre']))?$culture_poribeshona['unmukto_shang_onushthan_pre']:0; ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698"> পুঁথি পাঠের আসর  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="puthi_pather_ashor_num" data-title="Enter">
										<?php echo $puthi_pather_ashor_num=  (isset( $culture_poribeshona['puthi_pather_ashor_num']))?$culture_poribeshona['puthi_pather_ashor_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="puthi_pather_ashor_pre" data-title="Enter">
										<?php echo $puthi_pather_ashor_pre=  (isset( $culture_poribeshona['puthi_pather_ashor_pre']))?$culture_poribeshona['puthi_pather_ashor_pre']:0; ?></a>
                                </td>
                                <td class="tg-y698">গীতি আলেখ্য	 </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="giti_alekkho_num" data-title="Enter">
										<?php echo $giti_alekkho_num=  (isset( $culture_poribeshona['giti_alekkho_num']))?$culture_poribeshona['giti_alekkho_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="giti_alekkho_pre" data-title="Enter">
										<?php echo $giti_alekkho_pre=  (isset( $culture_poribeshona['giti_alekkho_pre']))?$culture_poribeshona['giti_alekkho_pre']:0; ?></a>
                                </td>
                                <td class="tg-y698">অন্যান্য  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="others_num" data-title="Enter">
										<?php echo $others_num=  (isset( $culture_poribeshona['others_num']))?$culture_poribeshona['others_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_poribeshona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="others_pre" data-title="Enter">
										<?php echo $others_pre=  (isset( $culture_poribeshona['others_pre']))?$culture_poribeshona['others_pre']:0; ?></a>
                                </td>
                            </tr>
                        </table>

                        <!-- second table -->
                        <table class="tg table table-header-rotated" id="testTable2">
                    <tr>                           
                        <td class="tg-pwj7" colspan='7'><b>আইটি, প্রচার ও মিডিয়া  </b></td>
                        <td class="tg-pwj7" colspan="2">
                            <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Culture_আইটি, প্রচার ও মিডিয়া_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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

							<?php $pk = (isset($culture_it_prochar_media_upload['id']))?$culture_it_prochar_media_upload['id']:'';?>
							<?php $pk_prokash = (isset($culture_it_prochar_media_news_prokash['id']))?$culture_it_prochar_media_news_prokash['id']:'';?>

                            <tr>
                                <td class="tg-y698 type_1"> ফেসবুক আপলোড	</td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fb_upload_gan" data-title="Enter">
										<?php echo $fb_upload_gan=  (isset( $culture_it_prochar_media_upload['fb_upload_gan']))?$culture_it_prochar_media_upload['fb_upload_gan']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fb_upload_ovinoy" data-title="Enter">
										<?php echo $fb_upload_ovinoy=  (isset( $culture_it_prochar_media_upload['fb_upload_ovinoy']))?$culture_it_prochar_media_upload['fb_upload_ovinoy']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fb_upload_abritti" data-title="Enter">
										<?php echo $fb_upload_abritti=  (isset( $culture_it_prochar_media_upload['fb_upload_abritti']))?$culture_it_prochar_media_upload['fb_upload_abritti']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fb_upload_tilawat" data-title="Enter">
										<?php echo $fb_upload_tilawat=  (isset( $culture_it_prochar_media_upload['fb_upload_tilawat']))?$culture_it_prochar_media_upload['fb_upload_tilawat']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fb_upload_short_film" data-title="Enter">
										<?php echo $fb_upload_short_film=  (isset( $culture_it_prochar_media_upload['fb_upload_short_film']))?$culture_it_prochar_media_upload['fb_upload_short_film']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fb_upload_news" data-title="Enter">
										<?php echo $fb_upload_news=  (isset( $culture_it_prochar_media_upload['fb_upload_news']))?$culture_it_prochar_media_upload['fb_upload_news']:0; ?></a>
                                </td>
                                <td class="tg-y698  type_2">
                                    জাতীয় পত্রিকায়
                                </td>
                                <td class="tg-0pky  type_3">
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_news_prokash" data-pk="<?php echo $pk_prokash ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="jatio_potrika" data-title="Enter">
										<?php echo $jatio_potrika=  (isset( $culture_it_prochar_media_news_prokash['jatio_potrika']))?$culture_it_prochar_media_news_prokash['jatio_potrika']:0; ?></a>
                                </td>

                            </tr>

                            <tr>
                                <td class="tg-y698 type_1"> টুইটার পোস্ট	</td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="tw_post_gan" data-title="Enter">
										<?php echo $tw_post_gan=  (isset( $culture_it_prochar_media_upload['tw_post_gan']))?$culture_it_prochar_media_upload['tw_post_gan']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="tw_post_ovinoy" data-title="Enter">
										<?php echo $tw_post_ovinoy=  (isset( $culture_it_prochar_media_upload['tw_post_ovinoy']))?$culture_it_prochar_media_upload['tw_post_ovinoy']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="tw_post_abritti" data-title="Enter">
										<?php echo $tw_post_abritti=  (isset( $culture_it_prochar_media_upload['tw_post_abritti']))?$culture_it_prochar_media_upload['tw_post_abritti']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="tw_post_tilawat" data-title="Enter">
										<?php echo $tw_post_tilawat=  (isset( $culture_it_prochar_media_upload['tw_post_tilawat']))?$culture_it_prochar_media_upload['tw_post_tilawat']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="tw_post_short_film" data-title="Enter">
										<?php echo $tw_post_short_film=  (isset( $culture_it_prochar_media_upload['tw_post_short_film']))?$culture_it_prochar_media_upload['tw_post_short_film']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="tw_post_news" data-title="Enter">
										<?php echo $tw_post_news=  (isset( $culture_it_prochar_media_upload['tw_post_news']))?$culture_it_prochar_media_upload['tw_post_news']:0; ?></a>
                                </td>
                                <td class="tg-y698  type_2">
                                    স্থানীয় পত্রিকায়
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_news_prokash" data-pk="<?php echo $pk_prokash ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sthanio_potrika" data-title="Enter">
										<?php echo $sthanio_potrika=  (isset( $culture_it_prochar_media_news_prokash['sthanio_potrika']))?$culture_it_prochar_media_news_prokash['sthanio_potrika']:0; ?></a>
                                </td>


                            </tr>


                            <tr>
                                <td class="tg-y698">ইউটিউব  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="yt_gan" data-title="Enter">
										<?php echo $yt_gan=  (isset( $culture_it_prochar_media_upload['yt_gan']))?$culture_it_prochar_media_upload['yt_gan']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="yt_ovinoy" data-title="Enter">
										<?php echo $yt_ovinoy=  (isset( $culture_it_prochar_media_upload['yt_ovinoy']))?$culture_it_prochar_media_upload['yt_ovinoy']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="yt_abritti" data-title="Enter">
										<?php echo $yt_abritti=  (isset( $culture_it_prochar_media_upload['yt_abritti']))?$culture_it_prochar_media_upload['yt_abritti']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="yt_tilawat" data-title="Enter">
										<?php echo $yt_tilawat=  (isset( $culture_it_prochar_media_upload['yt_tilawat']))?$culture_it_prochar_media_upload['yt_tilawat']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="yt_short_film" data-title="Enter">
										<?php echo $yt_short_film=  (isset( $culture_it_prochar_media_upload['yt_short_film']))?$culture_it_prochar_media_upload['yt_short_film']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="yt_news" data-title="Enter">
										<?php echo $yt_news=  (isset( $culture_it_prochar_media_upload['yt_news']))?$culture_it_prochar_media_upload['yt_news']:0; ?></a>
                                </td>
                                <td class="tg-y698  type_2">
                                    অনলাইন পত্রিকায়
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_news_prokash" data-pk="<?php echo $pk_prokash ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="online_potrika" data-title="Enter">
										<?php echo $online_potrika=  (isset( $culture_it_prochar_media_news_prokash['online_potrika']))?$culture_it_prochar_media_news_prokash['online_potrika']:0; ?></a>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">ওয়েবসাইট  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="web_gan" data-title="Enter">
										<?php echo $web_gan=  (isset( $culture_it_prochar_media_upload['web_gan']))?$culture_it_prochar_media_upload['web_gan']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="web_ovinoy" data-title="Enter">
										<?php echo $web_ovinoy=  (isset( $culture_it_prochar_media_upload['web_ovinoy']))?$culture_it_prochar_media_upload['web_ovinoy']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="web_abritti" data-title="Enter">
										<?php echo $web_abritti=  (isset( $culture_it_prochar_media_upload['web_abritti']))?$culture_it_prochar_media_upload['web_abritti']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="web_tilawat" data-title="Enter">
										<?php echo $web_tilawat=  (isset( $culture_it_prochar_media_upload['web_tilawat']))?$culture_it_prochar_media_upload['web_tilawat']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="web_short_film" data-title="Enter">
										<?php echo $web_short_film=  (isset( $culture_it_prochar_media_upload['web_short_film']))?$culture_it_prochar_media_upload['web_short_film']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="web_news" data-title="Enter">
										<?php echo $web_news=  (isset( $culture_it_prochar_media_upload['web_news']))?$culture_it_prochar_media_upload['web_news']:0; ?></a>
                                </td>
                                <td class="tg-y698  type_2">
                                    অনলাইন ব্লগে লেখা
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_news_prokash" data-pk="<?php echo $pk_prokash ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="online_blog" data-title="Enter">
										<?php echo $online_blog=  (isset( $culture_it_prochar_media_news_prokash['online_blog']))?$culture_it_prochar_media_news_prokash['online_blog']:0; ?></a>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698"> অন্যান্য </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="other_gan" data-title="Enter">
										<?php echo $other_gan=  (isset( $culture_it_prochar_media_upload['other_gan']))?$culture_it_prochar_media_upload['other_gan']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="other_ovinoy" data-title="Enter">
										<?php echo $other_ovinoy=  (isset( $culture_it_prochar_media_upload['other_ovinoy']))?$culture_it_prochar_media_upload['other_ovinoy']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="other_abritti" data-title="Enter">
										<?php echo $other_abritti=  (isset( $culture_it_prochar_media_upload['other_abritti']))?$culture_it_prochar_media_upload['other_abritti']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="other_tilawat" data-title="Enter">
										<?php echo $other_tilawat=  (isset( $culture_it_prochar_media_upload['other_tilawat']))?$culture_it_prochar_media_upload['other_tilawat']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="other_short_film" data-title="Enter">
										<?php echo $other_short_film=  (isset( $culture_it_prochar_media_upload['other_short_film']))?$culture_it_prochar_media_upload['other_short_film']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_upload" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="other_news" data-title="Enter">
										<?php echo $other_news=  (isset( $culture_it_prochar_media_upload['other_news']))?$culture_it_prochar_media_upload['other_news']:0; ?></a>
                                </td>
                                <td class="tg-y698  type_2">
                                    উইকিপিডিয়ায় লেখা
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_it_prochar_media_news_prokash" data-pk="<?php echo $pk_prokash ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="wikipedia" data-title="Enter">
										<?php echo $wikipedia=  (isset( $culture_it_prochar_media_news_prokash['wikipedia']))?$culture_it_prochar_media_news_prokash['wikipedia']:0; ?></a>
                                </td>


                            </tr>


                        </table>

                        <!-- third table -->
                        <table class="tg table table-header-rotated" id="testTable3">
                      
                   
                      <tr>                           
                      <td class="tg-pwj7" colspan='6'><b>বিশেষ কার্যক্রম  </b></td>
                      <td class="tg-pwj7" colspan="2">
                              <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Culture_বিশেষ কার্যক্রম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
							<?php $pk = (isset($culture_bishes_karjokrom['id']))?$culture_bishes_karjokrom['id']:'';?>
                            <tr>
                                <td class="tg-pwj7  type_1">
                                    শিল্পী সংগ্রহ অভিযান
                                </td>
                                <td class="tg-0pky  type_2">
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shilpi_shongroho_num" data-title="Enter">
										<?php echo $shilpi_shongroho_num=  (isset( $culture_bishes_karjokrom['shilpi_shongroho_num']))?$culture_bishes_karjokrom['shilpi_shongroho_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shilpi_shongroho_attend" data-title="Enter">
										<?php echo $shilpi_shongroho_attend=  (isset( $culture_bishes_karjokrom['shilpi_shongroho_attend']))?$culture_bishes_karjokrom['shilpi_shongroho_attend']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shilpi_shongroho_meyad" data-title="Enter">
										<?php echo $shilpi_shongroho_meyad=  (isset( $culture_bishes_karjokrom['shilpi_shongroho_meyad']))?$culture_bishes_karjokrom['shilpi_shongroho_meyad']:0; ?></a>
                                </td>

                                <td class="tg-pwj7  type_1">
                                    বিক্রয় ও বিতরণ কার্যক্রম
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bikroy_bitoron_karjokrom_num" data-title="Enter">
										<?php echo $bikroy_bitoron_karjokrom_num=  (isset( $culture_bishes_karjokrom['bikroy_bitoron_karjokrom_num']))?$culture_bishes_karjokrom['bikroy_bitoron_karjokrom_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bikroy_bitoron_karjokrom_attend" data-title="Enter">
										<?php echo $bikroy_bitoron_karjokrom_attend=  (isset( $culture_bishes_karjokrom['bikroy_bitoron_karjokrom_attend']))?$culture_bishes_karjokrom['bikroy_bitoron_karjokrom_attend']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bikroy_bitoron_karjokrom_meyad" data-title="Enter">
										<?php echo $bikroy_bitoron_karjokrom_meyad=  (isset( $culture_bishes_karjokrom['bikroy_bitoron_karjokrom_meyad']))?$culture_bishes_karjokrom['bikroy_bitoron_karjokrom_meyad']:0; ?></a>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-pwj7  type_1">
                                    বিশেষ প্রতিযোগিতা
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bishes_protijogita_num" data-title="Enter">
										<?php echo $bishes_protijogita_num=  (isset( $culture_bishes_karjokrom['bishes_protijogita_num']))?$culture_bishes_karjokrom['bishes_protijogita_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bishes_protijogita_attend" data-title="Enter">
										<?php echo $bishes_protijogita_attend=  (isset( $culture_bishes_karjokrom['bishes_protijogita_attend']))?$culture_bishes_karjokrom['bishes_protijogita_attend']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bishes_protijogita_meyad" data-title="Enter">
										<?php echo $bishes_protijogita_meyad=  (isset( $culture_bishes_karjokrom['bishes_protijogita_meyad']))?$culture_bishes_karjokrom['bishes_protijogita_meyad']:0; ?></a>
                                </td>

                                <td class="tg-pwj7  type_1">
                                    বৃক্ষরোপণ কর্মসূচী
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="brikkhoropon_kormoshuchi_num" data-title="Enter">
										<?php echo $brikkhoropon_kormoshuchi_num=  (isset( $culture_bishes_karjokrom['brikkhoropon_kormoshuchi_num']))?$culture_bishes_karjokrom['brikkhoropon_kormoshuchi_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="brikkhoropon_kormoshuchi_attend" data-title="Enter">
										<?php echo $brikkhoropon_kormoshuchi_attend=  (isset( $culture_bishes_karjokrom['brikkhoropon_kormoshuchi_attend']))?$culture_bishes_karjokrom['brikkhoropon_kormoshuchi_attend']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="brikkhoropon_kormoshuchi_meyad" data-title="Enter">
										<?php echo $brikkhoropon_kormoshuchi_meyad=  (isset( $culture_bishes_karjokrom['brikkhoropon_kormoshuchi_meyad']))?$culture_bishes_karjokrom['brikkhoropon_kormoshuchi_meyad']:0; ?></a>
                                </td>


                            </tr>
                            <td class="tg-pwj7  type_1">
                                কুইজ/সাধারণ জ্ঞান প্রতিযোগিতা
                            </td>
                            <td class="tg-0pky  type_2">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="quiz_protijogita_num" data-title="Enter">
										<?php echo $quiz_protijogita_num=  (isset( $culture_bishes_karjokrom['quiz_protijogita_num']))?$culture_bishes_karjokrom['quiz_protijogita_num']:0; ?></a>
                            </td>
                            <td class="tg-0pky  type_3">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="quiz_protijogita_attend" data-title="Enter">
										<?php echo $quiz_protijogita_attend=  (isset( $culture_bishes_karjokrom['quiz_protijogita_attend']))?$culture_bishes_karjokrom['quiz_protijogita_attend']:0; ?></a>
                            </td>
                            <td class="tg-0pky  type_3">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="quiz_protijogita_meyad" data-title="Enter">
										<?php echo $quiz_protijogita_meyad=  (isset( $culture_bishes_karjokrom['quiz_protijogita_meyad']))?$culture_bishes_karjokrom['quiz_protijogita_meyad']:0; ?></a>
                            </td>

                            <td class="tg-pwj7  type_1">
                                রক্তদান কর্মসূচী
                            </td>
                            <td class="tg-0pky  type_2">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="rokto_kormoshuchi_num" data-title="Enter">
										<?php echo $rokto_kormoshuchi_num=  (isset( $culture_bishes_karjokrom['rokto_kormoshuchi_num']))?$culture_bishes_karjokrom['rokto_kormoshuchi_num']:0; ?></a>
                            </td>
                            <td class="tg-0pky  type_3">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="rokto_kormoshuchi_attend" data-title="Enter">
										<?php echo $rokto_kormoshuchi_attend=  (isset( $culture_bishes_karjokrom['rokto_kormoshuchi_attend']))?$culture_bishes_karjokrom['rokto_kormoshuchi_attend']:0; ?></a>
                            </td>
                            <td class="tg-0pky  type_3">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="rokto_kormoshuchi_meyad" data-title="Enter">
										<?php echo $rokto_kormoshuchi_meyad=  (isset( $culture_bishes_karjokrom['rokto_kormoshuchi_meyad']))?$culture_bishes_karjokrom['rokto_kormoshuchi_meyad']:0; ?></a>
                            </td>


                            </tr>

                            <tr>
                                <td class="tg-pwj7  type_1">
                                    রচনা/প্রবন্ধ প্রতিযোগিতা

                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="rochona_protijogita_num" data-title="Enter">
										<?php echo $rochona_protijogita_num=  (isset( $culture_bishes_karjokrom['rochona_protijogita_num']))?$culture_bishes_karjokrom['rochona_protijogita_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="rochona_protijogita_attend" data-title="Enter">
										<?php echo $rochona_protijogita_attend=  (isset( $culture_bishes_karjokrom['rochona_protijogita_attend']))?$culture_bishes_karjokrom['rochona_protijogita_attend']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="rochona_protijogita_meyad" data-title="Enter">
										<?php echo $rochona_protijogita_meyad=  (isset( $culture_bishes_karjokrom['rochona_protijogita_meyad']))?$culture_bishes_karjokrom['rochona_protijogita_meyad']:0; ?></a>
                                </td>

                                <td class="tg-pwj7  type_1">
                                    শিক্ষা সফর
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shikkha_sofor_num" data-title="Enter">
										<?php echo $shikkha_sofor_num=  (isset( $culture_bishes_karjokrom['shikkha_sofor_num']))?$culture_bishes_karjokrom['shikkha_sofor_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shikkha_sofor_attend" data-title="Enter">
										<?php echo $shikkha_sofor_attend=  (isset( $culture_bishes_karjokrom['shikkha_sofor_attend']))?$culture_bishes_karjokrom['shikkha_sofor_attend']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_bishes_karjokrom" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shikkha_sofor_meyad" data-title="Enter">
										<?php echo $shikkha_sofor_meyad=  (isset( $culture_bishes_karjokrom['shikkha_sofor_meyad']))?$culture_bishes_karjokrom['shikkha_sofor_meyad']:0; ?></a>
                                </td>


                            </tr>


                        </table>

                        <!-- forth table -->
                        <table class="tg table table-header-rotated" id="testTable4">
                    <tr>                           
                        <td class="tg-pwj7" colspan='6'><b>আউটপুট রিপোর্ট  </b></td>
                        <td class="tg-pwj7" colspan="2">
                            <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Culture_আউটপুট রিপোর্ট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
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
							<?php $pk = (isset($culture_output_report['id']))?$culture_output_report['id']:'';?>
                            <tr>
                                <td class="tg-y698 type_1"> গীতিকার 	</td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gitikar" data-title="Enter">
										<?php echo $gitikar=  (isset( $culture_output_report['gitikar']))?$culture_output_report['gitikar']:0; ?></a>
                                </td>
                                <td class="tg-y698">উপস্থাপক </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="uposthapok" data-title="Enter">
										<?php echo $uposthapok=  (isset( $culture_output_report['uposthapok']))?$culture_output_report['uposthapok']:0; ?></a>
                                </td>

                                <td class="tg-y698">বক্তা</td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bokta" data-title="Enter">
										<?php echo $bokta=  (isset( $culture_output_report['bokta']))?$culture_output_report['bokta']:0; ?></a>
                                </td>

                                <td class="tg-y698">সেট ডিজাইনার </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="set_designer" data-title="Enter">
										<?php echo $set_designer=  (isset( $culture_output_report['set_designer']))?$culture_output_report['set_designer']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সুরকার  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shurokar" data-title="Enter">
										<?php echo $shurokar=  (isset( $culture_output_report['shurokar']))?$culture_output_report['shurokar']:0; ?></a>
                                </td>

                                <td class="tg-y698">ক্বারী		  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kari" data-title="Enter">
										<?php echo $kari=  (isset( $culture_output_report['kari']))?$culture_output_report['kari']:0; ?></a>
                                </td>

                                <td class="tg-y698">বিতার্কিক		  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="bitarkik" data-title="Enter">
										<?php echo $bitarkik=  (isset( $culture_output_report['bitarkik']))?$culture_output_report['bitarkik']:0; ?></a>
                                </td>

                                <td class="tg-y698">কার্টুনিস্ট	  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="cartoonist" data-title="Enter">
										<?php echo $cartoonist=  (isset( $culture_output_report['cartoonist']))?$culture_output_report['cartoonist']:0; ?></a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698">নাট্যকার		 </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nattokar" data-title="Enter">
										<?php echo $nattokar=  (isset( $culture_output_report['nattokar']))?$culture_output_report['nattokar']:0; ?></a>
                                </td>

                                <td class="tg-y698">কবি  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kobi" data-title="Enter">
										<?php echo $kobi=  (isset( $culture_output_report['kobi']))?$culture_output_report['kobi']:0; ?></a>
                                </td>

                                <td class="tg-y698">প্রশিক্ষক		  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="proshikkhok" data-title="Enter">
										<?php echo $proshikkhok=  (isset( $culture_output_report['proshikkhok']))?$culture_output_report['proshikkhok']:0; ?></a>
                                </td>

                                <td class="tg-y698">চারু শিল্পী  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="charu_shilpi" data-title="Enter">
										<?php echo $charu_shilpi=  (isset( $culture_output_report['charu_shilpi']))?$culture_output_report['charu_shilpi']:0; ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">নির্দেশক		   </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nirdeshok" data-title="Enter">
										<?php echo $nirdeshok=  (isset( $culture_output_report['nirdeshok']))?$culture_output_report['nirdeshok']:0; ?></a>
                                </td>

                                <td class="tg-y698">লেখক		   </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="lekhok" data-title="Enter">
										<?php echo $lekhok=  (isset( $culture_output_report['lekhok']))?$culture_output_report['lekhok']:0; ?></a>
                                </td>
                                <td class="tg-y698">ফটোগ্রাফার  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="photographer" data-title="Enter">
										<?php echo $photographer=  (isset( $culture_output_report['photographer']))?$culture_output_report['photographer']:0; ?></a>
                                </td>

                                <td class="tg-y698">ক্যালিওগ্রাফার   </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="calligraphr" data-title="Enter">
										<?php echo $calligraphr=  (isset( $culture_output_report['calligraphr']))?$culture_output_report['calligraphr']:0; ?></a>
                                </td>

                            </tr>

                            <td class="tg-y698">সংগীতশিল্পী  </td>
                            <td class="tg-0pky  type_1">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shongit_shilpi" data-title="Enter">
										<?php echo $shongit_shilpi=  (isset( $culture_output_report['shongit_shilpi']))?$culture_output_report['shongit_shilpi']:0; ?></a>
                            </td>

                            <td class="tg-y698">সাংবাদিক  </td>
                            <td class="tg-0pky  type_1">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shangbadik" data-title="Enter">
										<?php echo $shangbadik=  (isset( $culture_output_report['shangbadik']))?$culture_output_report['shangbadik']:0; ?></a>
                            </td>

                            <td class="tg-y698">ক্যামেরাম্যান   </td>
                            <td class="tg-0pky  type_1">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="camreaman" data-title="Enter">
										<?php echo $camreaman=  (isset( $culture_output_report['camreaman']))?$culture_output_report['camreaman']:0; ?></a>
                            </td>
                            <td class="tg-y698">হস্ত(কারু)শিল্পী  </td>
                            <td class="tg-0pky  type_1">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hosto_shilp" data-title="Enter">
										<?php echo $hosto_shilp=  (isset( $culture_output_report['hosto_shilp']))?$culture_output_report['hosto_shilp']:0; ?></a>
                            </td>
                            </tr>

                            <tr>

                            <td class="tg-y698">অভিনেতা  </td>
                            <td class="tg-0pky  type_1">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ovineta" data-title="Enter">
										<?php echo $ovineta=  (isset( $culture_output_report['ovineta']))?$culture_output_report['ovineta']:0; ?></a>
                            </td>

                            <td class="tg-y698">ভিডিও এডিটর  </td>
                            <td class="tg-0pky  type_1">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="video_editor" data-title="Enter">
										<?php echo $video_editor=  (isset( $culture_output_report['video_editor']))?$culture_output_report['video_editor']:0; ?></a>
                            </td>

                            <td class="tg-y698">মেকআপম্যান   </td>
                            <td class="tg-0pky  type_1">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="makeupman" data-title="Enter">
										<?php echo $makeupman=  (isset( $culture_output_report['makeupman']))?$culture_output_report['makeupman']:0; ?></a>
                            </td>

                            <td class="tg-y698">ফ্যাশন ডিজাইনার  </td>
                            <td class="tg-0pky  type_1">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fashion_designer" data-title="Enter">
										<?php echo $fashion_designer=  (isset( $culture_output_report['fashion_designer']))?$culture_output_report['fashion_designer']:0; ?></a>
                            </td>


                            </tr>

                            <tr>

                            <td class="tg-y698">আবৃত্তিকার		 </td>
                            <td class="tg-0pky  type_1">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abrittikar" data-title="Enter">
										<?php echo $abrittikar=  (isset( $culture_output_report['abrittikar']))?$culture_output_report['abrittikar']:0; ?></a>
                            </td>

                            <td class="tg-y698">সাউন্ড ইঞ্জিনিয়ার  </td>
                            <td class="tg-0pky  type_1">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sound_engineer" data-title="Enter">
										<?php echo $sound_engineer=  (isset( $culture_output_report['sound_engineer']))?$culture_output_report['sound_engineer']:0; ?></a>
                            </td>

                            <td class="tg-y698">গ্রাফিক্স ডিজাইনার   </td>
                            <td class="tg-0pky  type_1">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="graphics_designer" data-title="Enter">
										<?php echo $graphics_designer=  (isset( $culture_output_report['graphics_designer']))?$culture_output_report['graphics_designer']:0; ?></a>
                            </td>

                            <td class="tg-y698">স্থাপত্য শিল্পী</td>
                            <td class="tg-0pky  type_1">
								<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_output_report" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sthapotto_shilpi" data-title="Enter">
										<?php echo $sthapotto_shilpi=  (isset( $culture_output_report['sthapotto_shilpi']))?$culture_output_report['sthapotto_shilpi']:0; ?></a>
                            </td>

                            </tr>

                        </table>
                        <table class="tg table table-header-rotated" id="testTable5">
                            <tr>
                                <td class="tg-pwj7" colspan="3"><b>সামিট</b></td>
                                <td class="tg-pwj7" colspan="1">
                                    <a href="#" id='table_5' onclick="doit('xlsx','testTable5','<?php echo 'Culture_সামিট_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr> 
                            <?php
                                $pk = (isset($culture_summit['id']))?$culture_summit['id']:'';
                                
                            ?>
                            <tr>
                                <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                                <td class="tg-pwj7" colspan=''>গড়</td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সাংস্কৃতিক কর্মীদের নিয়ে সামিট (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="culture_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="culture_worker_central_s" 
                                    data-title="Enter">
                                    <?php echo $culture_worker_central_s=(isset( $culture_summit['culture_worker_central_s']))? $culture_summit['culture_worker_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="culture_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="culture_worker_central_p" 
                                    data-title="Enter">
                                    <?php echo $culture_worker_central_p=(isset( $culture_summit['culture_worker_central_p']))? $culture_summit['culture_worker_central_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($culture_worker_central_s>0 && $culture_worker_central_p>0)
                                {echo ($culture_worker_central_p/$culture_worker_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">সাংস্কৃতিক কর্মীদের নিয়ে সামিট (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="culture_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="culture_worker_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $culture_worker_shakha_s=(isset( $culture_summit['culture_worker_shakha_s']))? $culture_summit['culture_worker_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="culture_summit" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="culture_worker_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $culture_worker_shakha_p=(isset( $culture_summit['culture_worker_shakha_p']))? $culture_summit['culture_worker_shakha_p']:'' ?>
                                    </a>
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
                                    <a href="#" id='table_6' onclick="doit('xlsx','testTable6','<?php echo 'Culture_বিভাগীয় প্রশিক্ষণমূলক প্রোগ্রাম_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                                </td>
                            </tr> 
                            <?php
                                $pk = (isset($culture_training_program['id']))?$culture_training_program['id']:'';
                                
                            ?>
                            <tr>
                                <td class="tg-pwj7" rowspan=''>প্রোগ্রামের নাম</td>
                                <td class="tg-pwj7" colspan=''> সংখ্যা </td>
                                <td class="tg-pwj7" colspan=''>উপস্থিতি </td>
                                <td class="tg-pwj7" colspan=''>গড়</td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="culture_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_central_s" 
                                    data-title="Enter">
                                    <?php echo $shikkha_central_s=(isset( $culture_training_program['shikkha_central_s']))? $culture_training_program['shikkha_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="culture_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_central_p" 
                                    data-title="Enter">
                                    <?php echo $shikkha_central_p=(isset( $culture_training_program['shikkha_central_p']))? $culture_training_program['shikkha_central_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_central_s>0 && $shikkha_central_p>0)
                                {echo ($shikkha_central_p/$shikkha_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">শিক্ষাশিবির (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="culture_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $shikkha_shakha_s=(isset( $culture_training_program['shikkha_shakha_s']))? $culture_training_program['shikkha_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="culture_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="shikkha_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $shikkha_shakha_p=(isset( $culture_training_program['shikkha_shakha_p']))? $culture_training_program['shikkha_shakha_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($shikkha_shakha_s>0 && $shikkha_shakha_p>0)
                                {echo ($shikkha_shakha_p/$shikkha_shakha_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (কেন্দ্র)</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="culture_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_central_s" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_central_s=(isset( $culture_training_program['kormoshala_central_s']))? $culture_training_program['kormoshala_central_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="culture_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_central_p" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_central_p=(isset( $culture_training_program['kormoshala_central_p']))? $culture_training_program['kormoshala_central_p']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php if($kormoshala_central_s>0 && $kormoshala_central_p>0)
                                {echo ($kormoshala_central_p/$kormoshala_central_s);}else{echo 0;}?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-y698">কর্মশালা (শাখা)</td>
                                <td class="tg-0pky type_1">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="culture_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_shakha_s" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_shakha_s=(isset( $culture_training_program['kormoshala_shakha_s']))? $culture_training_program['kormoshala_shakha_s']:'' ?>
                                    </a>
                                </td>
                                <td class="tg-0pky  type_2">
                                <a href="#"  class="editable editable-click"  data-id="" data-idname=""   data-type="number"
                                    data-table="culture_training_program" data-pk="<?php echo $pk ?>"
                                    data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" 
                                    data-name="kormoshala_shakha_p" 
                                    data-title="Enter">
                                    <?php echo $kormoshala_shakha_p=(isset( $culture_training_program['kormoshala_shakha_p']))? $culture_training_program['kormoshala_shakha_p']:'' ?>
                                    </a>
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

<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-izx2{border-color:black;background-color:#efefef;}
    .tg .tg-pwj7{background-color:#efefef;border-color:black;}
    .tg .tg-0pky{border-color:black;vertical-align:top}
    .tg .tg-y698{background-color:#efefef;border-color:black;vertical-align:top}
    .tg .tg-0lax{border-color:black;vertical-align:top}
    @media screen and (max-width: 767px) {
        .tg {width: auto !important;}
        .tg col {width: auto !important;}
        .tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}
    }

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

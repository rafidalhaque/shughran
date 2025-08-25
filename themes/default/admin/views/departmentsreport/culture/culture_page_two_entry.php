<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'শিল্প ও সংস্কৃতি বিভাগ - পেইজ ০২ ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
    if ($report_info['type'] == 'annual') {
        echo anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ডিসেম্বর 2023 - নভেম্বর ' . $report_info['year']);
        echo "&nbsp;|&nbsp;";
        echo anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'X ' . $report_info['year']);
    } else {
        echo anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
        echo  "&nbsp;|&nbsp;" . anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);
    }
} else {

    if ($report_info['type'] == 'annual') {
        echo    anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
    } else {

        echo   anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);
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

        echo   ' <li>' . anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

        for ($i = date('Y') - 1; $i >= 2019; $i--) {
            echo   ' <li>' . anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';
            echo   ' <li>' . anchor('admin/departmentsreport/culture-page-two' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';
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
                        <td class="tg-pwj7" colspan='7'><b>যোগাযোগ</b></td>
                        <td class="tg-pwj7" colspan="2">
                              <a href="#" id='table_1' onclick="doit('xlsx','testTable1','<?php echo 'Culture_যোগাযোগ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                         </td>
                    </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিবরণ  </td>
                                <td class="tg-pwj7" colspan="">কতজন  </td>
                                <td class="tg-pwj7" colspan="">কতবার</td>

                                <td class="tg-pwj7" colspan="">বিবরণ  </td>
                                <td class="tg-pwj7" colspan="">কতজন  </td>
                                <td class="tg-pwj7" colspan="">কতবার</td>

                                <td class="tg-pwj7" colspan="">বিবরণ  </td>
                                <td class="tg-pwj7" colspan="">কতজন  </td>
                                <td class="tg-pwj7" colspan="">কতবার</td>
                            </tr>

							<?php $pk = (isset($culture_contact['id']))?$culture_contact['id']:'';?>

                            <tr>
                                <td class="tg-0pky  type_1">
                                    গীতিকার
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gitikar_jon" data-title="Enter">
										<?php echo $gitikar_jon=  (isset( $culture_contact['gitikar_jon']))?$culture_contact['gitikar_jon']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="gitikar_bar" data-title="Enter">
										<?php echo $gitikar_bar=  (isset( $culture_contact['gitikar_bar']))?$culture_contact['gitikar_bar']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    ক্বারী
                                </td>

                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kari_jon" data-title="Enter">
										<?php echo $kari_jon=  (isset( $culture_contact['kari_jon']))?$culture_contact['kari_jon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kari_bar" data-title="Enter">
										<?php echo $kari_bar=  (isset( $culture_contact['kari_bar']))?$culture_contact['kari_bar']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    সাংস্কৃতিক প্রতিষ্ঠান
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shang_protishthan_jon" data-title="Enter">
										<?php echo $shang_protishthan_jon=  (isset( $culture_contact['shang_protishthan_jon']))?$culture_contact['shang_protishthan_jon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shang_protishthan_bar" data-title="Enter">
										<?php echo $shang_protishthan_bar=  (isset( $culture_contact['shang_protishthan_bar']))?$culture_contact['shang_protishthan_bar']:0; ?></a>
                                </td>

                            </tr>


                            <tr>
                                <td class="tg-0pky  type_1">
                                    সুরকার
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shurokar_jon" data-title="Enter">
										<?php echo $shurokar_jon=  (isset( $culture_contact['shurokar_jon']))?$culture_contact['shurokar_jon']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shurokar_bar" data-title="Enter">
										<?php echo $shurokar_bar=  (isset( $culture_contact['shurokar_bar']))?$culture_contact['shurokar_bar']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    আবৃত্তিকার
                                </td>

                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abrittikar_jon" data-title="Enter">
										<?php echo $abrittikar_jon=  (isset( $culture_contact['abrittikar_jon']))?$culture_contact['abrittikar_jon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abrittikar_bar" data-title="Enter">
										<?php echo $abrittikar_bar=  (isset( $culture_contact['abrittikar_bar']))?$culture_contact['abrittikar_bar']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    সাংবাদিক
                                </td>


                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shangbadik_jon" data-title="Enter">
										<?php echo $shangbadik_jon=  (isset( $culture_contact['shangbadik_jon']))?$culture_contact['shangbadik_jon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shangbadik_bar" data-title="Enter">
										<?php echo $shangbadik_bar=  (isset( $culture_contact['shangbadik_bar']))?$culture_contact['shangbadik_bar']:0; ?></a>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    নাট্যকার
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nattokar_jon" data-title="Enter">
										<?php echo $nattokar_jon=  (isset( $culture_contact['nattokar_jon']))?$culture_contact['nattokar_jon']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nattokar_bar" data-title="Enter">
										<?php echo $nattokar_bar=  (isset( $culture_contact['nattokar_bar']))?$culture_contact['nattokar_bar']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    উপস্থাপক
                                </td>

                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="uposthapok_jon" data-title="Enter">
										<?php echo $uposthapok_jon=  (isset( $culture_contact['uposthapok_jon']))?$culture_contact['uposthapok_jon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="uposthapok_bar" data-title="Enter">
										<?php echo $uposthapok_bar=  (isset( $culture_contact['uposthapok_bar']))?$culture_contact['uposthapok_bar']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    ইলেকট্রনিক মিডিয়া
                                </td>

                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="electronic_media_jon" data-title="Enter">
										<?php echo $electronic_media_jon=  (isset( $culture_contact['electronic_media_jon']))?$culture_contact['electronic_media_jon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="electronic_media_bar" data-title="Enter">
										<?php echo $electronic_media_bar=  (isset( $culture_contact['electronic_media_bar']))?$culture_contact['electronic_media_bar']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    নির্দেশক
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nirdeshok_jon" data-title="Enter">
										<?php echo $nirdeshok_jon=  (isset( $culture_contact['nirdeshok_jon']))?$culture_contact['nirdeshok_jon']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="nirdeshok_bar" data-title="Enter">
										<?php echo $nirdeshok_bar=  (isset( $culture_contact['nirdeshok_bar']))?$culture_contact['nirdeshok_bar']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    কবি
                                </td>

                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kobi_jon" data-title="Enter">
										<?php echo $kobi_jon=  (isset( $culture_contact['kobi_jon']))?$culture_contact['kobi_jon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kobi_bar" data-title="Enter">
										<?php echo $kobi_bar=  (isset( $culture_contact['kobi_bar']))?$culture_contact['kobi_bar']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    অভিভাবক
                                </td>


                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ovivabok_jon" data-title="Enter">
										<?php echo $ovivabok_jon=  (isset( $culture_contact['ovivabok_jon']))?$culture_contact['ovivabok_jon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ovivabok_bar" data-title="Enter">
										<?php echo $ovivabok_bar=  (isset( $culture_contact['ovivabok_bar']))?$culture_contact['ovivabok_bar']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    শিল্পী
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shilpi_jon" data-title="Enter">
										<?php echo $shilpi_jon=  (isset( $culture_contact['shilpi_jon']))?$culture_contact['shilpi_jon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shilpi_bar" data-title="Enter">
										<?php echo $shilpi_bar=  (isset( $culture_contact['shilpi_bar']))?$culture_contact['shilpi_bar']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    লেখক
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="lekhok_jon" data-title="Enter">
										<?php echo $lekhok_jon=  (isset( $culture_contact['lekhok_jon']))?$culture_contact['lekhok_jon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="lekhok_bar" data-title="Enter">
										<?php echo $lekhok_bar=  (isset( $culture_contact['lekhok_bar']))?$culture_contact['lekhok_bar']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    উপদেষ্টা
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="upodeshta_jon" data-title="Enter">
										<?php echo $upodeshta_jon=  (isset( $culture_contact['upodeshta_jon']))?$culture_contact['upodeshta_jon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="upodeshta_bar" data-title="Enter">
										<?php echo $upodeshta_bar=  (isset( $culture_contact['upodeshta_bar']))?$culture_contact['upodeshta_bar']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    অভিনেতা
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ovineta_jon" data-title="Enter">
										<?php echo $ovineta_jon=  (isset( $culture_contact['ovineta_jon']))?$culture_contact['ovineta_jon']:0; ?></a>
                                </td>

                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ovineta_bar" data-title="Enter">
										<?php echo $ovineta_bar=  (isset( $culture_contact['ovineta_bar']))?$culture_contact['ovineta_bar']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    সাংস্কৃতিক পৃষ্ঠপোষক
                                </td>

                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shang_pri_jon" data-title="Enter">
										<?php echo $shang_pri_jon=  (isset( $culture_contact['shang_pri_jon']))?$culture_contact['shang_pri_jon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shang_pri_bar" data-title="Enter">
										<?php echo $shang_pri_bar=  (isset( $culture_contact['shang_pri_bar']))?$culture_contact['shang_pri_bar']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    অন্যান্য
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="onnanno_jon" data-title="Enter">
										<?php echo $onnanno_jon=  (isset( $culture_contact['onnanno_jon']))?$culture_contact['onnanno_jon']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_contact" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="onnanno_bar" data-title="Enter">
										<?php echo $onnanno_bar=  (isset( $culture_contact['onnanno_bar']))?$culture_contact['onnanno_bar']:0; ?></a>
                                </td>
                            </tr>

                        </table>

                        <!-- second table -->
                        <table class="tg table table-header-rotated" id="testTable2">
                    <tr>                           
                        <td class="tg-pwj7" colspan='6'><b>প্রকাশনা </b></td>
                        <td class="tg-pwj7" colspan="2">
                              <a href="#" id='table_2' onclick="doit('xlsx','testTable2','<?php echo 'Culture_প্রকাশনা_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                         </td>
                    </tr>
                            <tr>
                                <td class="tg-pwj7" colspan="">বিবরণ </td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>

                                <td class="tg-pwj7" colspan="">বিবরণ </td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>

                                <td class="tg-pwj7" colspan="">বিবরণ </td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>

                                <td class="tg-pwj7" colspan="">বিবরণ </td>
                                <td class="tg-pwj7" colspan="">সংখ্যা </td>

                            </tr>
							<?php $pk = (isset($culture_prokashona['id']))?$culture_prokashona['id']:'';?>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    নতুন গান বাঁধা
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="notun_gan_badha" data-title="Enter">
										<?php echo $notun_gan_badha=  (isset( $culture_prokashona['notun_gan_badha']))?$culture_prokashona['notun_gan_badha']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    নতুন গান নির্মাণ
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="notun_gan_nirman" data-title="Enter">
										<?php echo $notun_gan_nirman=  (isset( $culture_prokashona['notun_gan_nirman']))?$culture_prokashona['notun_gan_nirman']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    ছড়া-কবিতার বই
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="chora_kobitar_boi" data-title="Enter">
										<?php echo $chora_kobitar_boi=  (isset( $culture_prokashona['chora_kobitar_boi']))?$culture_prokashona['chora_kobitar_boi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    ম্যাগাজিন
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="magazine" data-title="Enter">
										<?php echo $magazine=  (isset( $culture_prokashona['magazine']))?$culture_prokashona['magazine']:0; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    নতুন সুরারোপ
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="notun_shurarop" data-title="Enter">
										<?php echo $notun_shurarop=  (isset( $culture_prokashona['notun_shurarop']))?$culture_prokashona['notun_shurarop']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    ভিজ্যুয়াল নাটক
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="visual_natok" data-title="Enter">
										<?php echo $visual_natok=  (isset( $culture_prokashona['visual_natok']))?$culture_prokashona['visual_natok']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    শর্টফিল্ম নির্মাণ
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shortflim_nirman" data-title="Enter">
										<?php echo $shortflim_nirman=  (isset( $culture_prokashona['shortflim_nirman']))?$culture_prokashona['shortflim_nirman']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    প্রচারপত্র
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="prochar_potro" data-title="Enter">
										<?php echo $prochar_potro=  (isset( $culture_prokashona['prochar_potro']))?$culture_prokashona['prochar_potro']:0; ?></a>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    নাটকের পাণ্ডুলিপি
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="natoker_pandulipi" data-title="Enter">
										<?php echo $natoker_pandulipi=  (isset( $culture_prokashona['natoker_pandulipi']))?$culture_prokashona['natoker_pandulipi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    কবিতার পাণ্ডুলিপি
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kobitar_pandulipi" data-title="Enter">
										<?php echo $kobitar_pandulipi=  (isset( $culture_prokashona['kobitar_pandulipi']))?$culture_prokashona['kobitar_pandulipi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                পুঁথি নির্মাণ
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="puthi_nirman" data-title="Enter">
										<?php echo $puthi_nirman=  (isset( $culture_prokashona['puthi_nirman']))?$culture_prokashona['puthi_nirman']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    মঞ্চ নাটক
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="moncho_natok" data-title="Enter">
										<?php echo $moncho_natok=  (isset( $culture_prokashona['moncho_natok']))?$culture_prokashona['moncho_natok']:0; ?></a>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    চিত্রনাট্য পাণ্ডুলিপি
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="chitronatto_pandulipi" data-title="Enter">
										<?php echo $chitronatto_pandulipi=  (isset( $culture_prokashona['chitronatto_pandulipi']))?$culture_prokashona['chitronatto_pandulipi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    ভিডিও অ্যালবাম
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="video_album" data-title="Enter">
										<?php echo $video_album=  (isset( $culture_prokashona['video_album']))?$culture_prokashona['video_album']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    সাহিত্য পত্রিকা
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sahitto_potrika" data-title="Enter">
										<?php echo $sahitto_potrika=  (isset( $culture_prokashona['sahitto_potrika']))?$culture_prokashona['sahitto_potrika']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    ক্যালিওগ্রাফী
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="calligraphy" data-title="Enter">
										<?php echo $calligraphy=  (isset( $culture_prokashona['calligraphy']))?$culture_prokashona['calligraphy']:0; ?></a>
                                </td>


                            </tr>


                            <tr>
                                <td class="tg-0pky  type_1">
                                    নাটিকার পাণ্ডুলিপি
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="natikar_pandulipi" data-title="Enter">
										<?php echo $natikar_pandulipi=  (isset( $culture_prokashona['natikar_pandulipi']))?$culture_prokashona['natikar_pandulipi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    অডিও অ্যালবাম
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="audio_album" data-title="Enter">
										<?php echo $audio_album=  (isset( $culture_prokashona['audio_album']))?$culture_prokashona['audio_album']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    ক্যালেন্ডার
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="calender" data-title="Enter">
										<?php echo $calender=  (isset( $culture_prokashona['calender']))?$culture_prokashona['calender']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    চিত্রাংকন
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="chitrangkon" data-title="Enter">
										<?php echo $chitrangkon=  (isset( $culture_prokashona['chitrangkon']))?$culture_prokashona['chitrangkon']:0; ?></a>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    কৌতুকের পাণ্ডুলিপি
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="koutuk_pandulipi" data-title="Enter">
										<?php echo $koutuk_pandulipi=  (isset( $culture_prokashona['koutuk_pandulipi']))?$culture_prokashona['koutuk_pandulipi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    গানের বই
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ganer_boi" data-title="Enter">
										<?php echo $ganer_boi=  (isset( $culture_prokashona['ganer_boi']))?$culture_prokashona['ganer_boi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    স্মরণিকা/স্মারক
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sharok" data-title="Enter">
										<?php echo $sharok=  (isset( $culture_prokashona['sharok']))?$culture_prokashona['sharok']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    অন্যান্য
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="onnano" data-title="Enter">
										<?php echo $onnano=  (isset( $culture_prokashona['onnano']))?$culture_prokashona['onnano']:0; ?></a>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    শর্টফিল্ম পাণ্ডুলিপি
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shortfilm_pandulipi" data-title="Enter">
										<?php echo $shortfilm_pandulipi=  (isset( $culture_prokashona['shortfilm_pandulipi']))?$culture_prokashona['shortfilm_pandulipi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    নাটকের বই
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="natoker_boi" data-title="Enter">
										<?php echo $natoker_boi=  (isset( $culture_prokashona['natoker_boi']))?$culture_prokashona['natoker_boi']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
                                    দেয়ালিকা
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_prokashona" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="deyalika" data-title="Enter">
										<?php echo $deyalika=  (isset( $culture_prokashona['deyalika']))?$culture_prokashona['deyalika']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">

                                </td>
                                <td class="tg-0pky  type_2">

                                </td>
                            </tr>

                        </table>

                        <!-- third table -->
                        <table class="tg table table-header-rotated" id="testTable3">
                    <tr>                           
                        <td class="tg-pwj7" colspan='6'><b>নিয়মিত প্রশিক্ষণ </b></td>
                        <td class="tg-pwj7" colspan="2">
                              <a href="#" id='table_3' onclick="doit('xlsx','testTable3','<?php echo 'Culture_নিয়মিত প্রশিক্ষণ_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                         </td>
                    </tr>  
                            <tr>
                                <td class="tg-pwj7" colspan="">বিবরণ  </td>
                                <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="">মোট উপস্থিতি</td>
                                <td class="tg-pwj7" colspan="">গড় উপস্থিতি  </td>
                                <td class="tg-pwj7" colspan="">বিবরণ  </td>
                                <td class="tg-pwj7" colspan="">সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="">মোট উপস্থিতি</td>
                                <td class="tg-pwj7" colspan="">গড় উপস্থিতি  </td>
                            </tr>
							<?php $pk = (isset($culture_regular_training['id']))?$culture_regular_training['id']:'';?>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    সংগীত ক্লাস
                                </td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shongit_class_num" data-title="Enter">
										<?php echo $shongit_class_num=  (isset( $culture_regular_training['shongit_class_num']))?$culture_regular_training['shongit_class_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shongit_class_pre" data-title="Enter">
										<?php echo $shongit_class_pre=  (isset( $culture_regular_training['shongit_class_pre']))?$culture_regular_training['shongit_class_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($shongit_class_pre!=0 && $shongit_class_num!=0 )?$shongit_class_pre/$shongit_class_num:0,2)?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    অগ্রজ কুরআন ক্লাস
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ogroj_quran_class_num" data-title="Enter">
										<?php echo $ogroj_quran_class_num=  (isset( $culture_regular_training['ogroj_quran_class_num']))?$culture_regular_training['ogroj_quran_class_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ogroj_quran_class_pre" data-title="Enter">
										<?php echo $ogroj_quran_class_pre=  (isset( $culture_regular_training['ogroj_quran_class_pre']))?$culture_regular_training['ogroj_quran_class_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($ogroj_quran_class_pre!=0 && $ogroj_quran_class_num!=0 )?$ogroj_quran_class_pre/$ogroj_quran_class_num:0,2)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    অভিনয় ক্লাস
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ovinoy_class_num" data-title="Enter">
										<?php echo $ovinoy_class_num=  (isset( $culture_regular_training['ovinoy_class_num']))?$culture_regular_training['ovinoy_class_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ovinoy_class_pre" data-title="Enter">
										<?php echo $ovinoy_class_pre=  (isset( $culture_regular_training['ovinoy_class_pre']))?$culture_regular_training['ovinoy_class_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($ovinoy_class_pre!=0 && $ovinoy_class_num!=0 )?$ovinoy_class_pre/$ovinoy_class_num:0,2)?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    অগ্রজ আলোচনা চক্র
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ogroj_alochona_chokro_num" data-title="Enter">
										<?php echo $ogroj_alochona_chokro_num=  (isset( $culture_regular_training['ogroj_alochona_chokro_num']))?$culture_regular_training['ogroj_alochona_chokro_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ogroj_alochona_chokro_pre" data-title="Enter">
										<?php echo $ogroj_alochona_chokro_pre=  (isset( $culture_regular_training['ogroj_alochona_chokro_pre']))?$culture_regular_training['ogroj_alochona_chokro_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($ogroj_alochona_chokro_pre!=0 && $ogroj_alochona_chokro_num!=0 )?$ogroj_alochona_chokro_pre/$ogroj_alochona_chokro_num:0,2)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    আবৃত্তি-উপস্থাপনা ক্লাস
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abritti_presentation_class_num" data-title="Enter">
										<?php echo $abritti_presentation_class_num=  (isset( $culture_regular_training['abritti_presentation_class_num']))?$culture_regular_training['abritti_presentation_class_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abritti_presentation_class_pre" data-title="Enter">
										<?php echo $abritti_presentation_class_pre=  (isset( $culture_regular_training['abritti_presentation_class_pre']))?$culture_regular_training['abritti_presentation_class_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($abritti_presentation_class_pre!=0 && $ogroj_alochona_chokro_num!=0 )?$abritti_presentation_class_pre/$ogroj_alochona_chokro_num:0,2)?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    উন্মেষ আলোচনা চক্র
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="unmesh_alochona_chokro_num" data-title="Enter">
										<?php echo $unmesh_alochona_chokro_num=  (isset( $culture_regular_training['unmesh_alochona_chokro_num']))?$culture_regular_training['unmesh_alochona_chokro_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="unmesh_alochona_chokro_pre" data-title="Enter">
										<?php echo $unmesh_alochona_chokro_pre=  (isset( $culture_regular_training['unmesh_alochona_chokro_pre']))?$culture_regular_training['unmesh_alochona_chokro_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($unmesh_alochona_chokro_pre!=0 && $unmesh_alochona_chokro_num!=0 )?$unmesh_alochona_chokro_pre/$unmesh_alochona_chokro_num:0,2)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    ক্বিরাআত ক্লাস
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kirat_class_num" data-title="Enter">
										<?php echo $kirat_class_num=  (isset( $culture_regular_training['kirat_class_num']))?$culture_regular_training['kirat_class_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kirat_class_pre" data-title="Enter">
										<?php echo $kirat_class_pre=  (isset( $culture_regular_training['kirat_class_pre']))?$culture_regular_training['kirat_class_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($kirat_class_pre!=0 && $kirat_class_num!=0 )?$kirat_class_pre/$kirat_class_num:0,2)?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    সামষ্টিক পাঠ
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shamoshtik_path_num" data-title="Enter">
										<?php echo $shamoshtik_path_num=  (isset( $culture_regular_training['shamoshtik_path_num']))?$culture_regular_training['shamoshtik_path_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shamoshtik_path_pre" data-title="Enter">
										<?php echo $shamoshtik_path_pre=  (isset( $culture_regular_training['shamoshtik_path_pre']))?$culture_regular_training['shamoshtik_path_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($shamoshtik_path_pre!=0 && $shamoshtik_path_num!=0 )?$shamoshtik_path_pre/$shamoshtik_path_num:0,2)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    রংতুলি ক্লাস
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="rongtuli_class_num" data-title="Enter">
										<?php echo $rongtuli_class_num=  (isset( $culture_regular_training['rongtuli_class_num']))?$culture_regular_training['rongtuli_class_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="rongtuli_class_pre" data-title="Enter">
										<?php echo $rongtuli_class_pre=  (isset( $culture_regular_training['rongtuli_class_pre']))?$culture_regular_training['rongtuli_class_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($rongtuli_class_pre!=0 && $rongtuli_class_num!=0 )?$rongtuli_class_pre/$rongtuli_class_num:0,2)?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    অনুষ্ঠান প্রস্তুতি ক্লাস
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="onushtha_prep_class_num" data-title="Enter">
										<?php echo $onushtha_prep_class_num=  (isset( $culture_regular_training['onushtha_prep_class_num']))?$culture_regular_training['onushtha_prep_class_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="onushtha_prep_class_pre" data-title="Enter">
										<?php echo $onushtha_prep_class_pre=  (isset( $culture_regular_training['onushtha_prep_class_pre']))?$culture_regular_training['onushtha_prep_class_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($onushtha_prep_class_pre!=0 && $onushtha_prep_class_num!=0 )?$onushtha_prep_class_pre/$onushtha_prep_class_num:0,2)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    হস্তশিল্প (কারু) ক্লাস
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hostoshilpo_class_num" data-title="Enter">
										<?php echo $hostoshilpo_class_num=  (isset( $culture_regular_training['hostoshilpo_class_num']))?$culture_regular_training['hostoshilpo_class_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="hostoshilpo_class_pre" data-title="Enter">
										<?php echo $hostoshilpo_class_pre=  (isset( $culture_regular_training['hostoshilpo_class_pre']))?$culture_regular_training['hostoshilpo_class_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($hostoshilpo_class_pre!=0 && $hostoshilpo_class_num!=0 )?$hostoshilpo_class_pre/$hostoshilpo_class_num:0,2)?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    শব্বেদারী
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shobbedari_num" data-title="Enter">
										<?php echo $shobbedari_num=  (isset( $culture_regular_training['shobbedari_num']))?$culture_regular_training['shobbedari_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shobbedari_pre" data-title="Enter">
										<?php echo $shobbedari_pre=  (isset( $culture_regular_training['shobbedari_pre']))?$culture_regular_training['shobbedari_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($shobbedari_pre!=0 && $shobbedari_num!=0 )?$shobbedari_pre/$shobbedari_num:0,2)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    ক্যালিওগ্রাফি ক্লাস
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="calligraphy_class_num" data-title="Enter">
										<?php echo $calligraphy_class_num=  (isset( $culture_regular_training['calligraphy_class_num']))?$culture_regular_training['calligraphy_class_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="calligraphy_class_pre" data-title="Enter">
										<?php echo $calligraphy_class_pre=  (isset( $culture_regular_training['calligraphy_class_pre']))?$culture_regular_training['calligraphy_class_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($calligraphy_class_pre!=0 && $calligraphy_class_num!=0 )?$calligraphy_class_pre/$calligraphy_class_num:0,2)?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    টেকনিক্যাল/আইটি ক্লাস
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="it_class_num" data-title="Enter">
										<?php echo $it_class_num=  (isset( $culture_regular_training['it_class_num']))?$culture_regular_training['it_class_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="it_class_pre" data-title="Enter">
										<?php echo $it_class_pre=  (isset( $culture_regular_training['it_class_pre']))?$culture_regular_training['it_class_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($it_class_pre!=0 && $it_class_num!=0 )?$it_class_pre/$it_class_num:0,2)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    স্থাপত্য শিল্প ক্লাস
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sthapotto_class_num" data-title="Enter">
										<?php echo $sthapotto_class_num=  (isset( $culture_regular_training['sthapotto_class_num']))?$culture_regular_training['sthapotto_class_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="sthapotto_class_pre" data-title="Enter">
										<?php echo $sthapotto_class_pre=  (isset( $culture_regular_training['sthapotto_class_pre']))?$culture_regular_training['sthapotto_class_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($sthapotto_class_pre!=0 && $sthapotto_class_num!=0 )?$sthapotto_class_pre/$sthapotto_class_num:0,2)?>
                                </td>
                                <td class="tg-0pky  type_1">
                                    অন্যান্য
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="other_num" data-title="Enter">
										<?php echo $other_num=  (isset( $culture_regular_training['other_num']))?$culture_regular_training['other_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="other_pre" data-title="Enter">
										<?php echo $other_pre=  (isset( $culture_regular_training['other_pre']))?$culture_regular_training['other_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($other_pre!=0 && $other_num!=0 )?$other_pre/$other_num:0,2)?>
                                </td>
                            </tr>
                            <tr>
                                <td class="tg-0pky  type_1">
                                    ফ্যাশন ডিজাইন ক্লাস
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fashion_class_num" data-title="Enter">
										<?php echo $fashion_class_num=  (isset( $culture_regular_training['fashion_class_num']))?$culture_regular_training['fashion_class_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_regular_training" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="fashion_class_pre" data-title="Enter">
										<?php echo $fashion_class_pre=  (isset( $culture_regular_training['fashion_class_pre']))?$culture_regular_training['fashion_class_pre']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_1">
									<?php echo number_format(($fashion_class_pre!=0 && $fashion_class_num!=0 )?$fashion_class_pre/$fashion_class_num:0,2)?>
                                </td>
                                <td class="tg-0pky  type_1">

                                </td>
                                <td class="tg-0pky  type_1">

                                </td>
                                <td class="tg-0pky  type_1">

                                </td>
                                <td class="tg-0pky  type_1">

                                </td>
                            </tr>
                        </table>

                        <!-- forth table -->
                        <table class="tg table table-header-rotated" id="testTable4">
                    <tr>                           
                        <td class="tg-pwj7" colspan='6'><b>কর্মশালা </b></td>
                        <td class="tg-pwj7" colspan="2">
                              <a href="#" id='table_4' onclick="doit('xlsx','testTable4','<?php echo 'Culture_কর্মশালা_'.$branch_id.'.xlsx' ?>');  return false;"><i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?> 	</a>
                         </td>
                    </tr>  

                            <tr>
                                <td class="tg-pwj7" rowspan="">বিবরণ</td>
                                <td class="tg-pwj7" colspan=""> সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="">মেয়াদকাল  </td>
                                <td class="tg-pwj7" colspan="">উপস্থিতি</td>

                                <td class="tg-pwj7" rowspan="">বিবরণ</td>
                                <td class="tg-pwj7" colspan=""> সংখ্যা  </td>
                                <td class="tg-pwj7" colspan="">মেয়াদকাল  </td>
                                <td class="tg-pwj7" colspan="">উপস্থিতি</td>
                            </tr>
							<?php $pk = (isset($culture_workshop['id']))?$culture_workshop['id']:'';?>
                            <tr>
                                <td class="tg-y698 type_1">  সঙ্গীত কর্মশালা 	</td>
                                <td class="tg-0pky  type_1">
                                    <a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shongit_workshop_num" data-title="Enter">
										<?php echo $shongit_workshop_num=  (isset( $culture_workshop['shongit_workshop_num']))?$culture_workshop['shongit_workshop_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shongit_workshop_dur" data-title="Enter">
										<?php echo $shongit_workshop_dur=  (isset( $culture_workshop['shongit_workshop_dur']))?$culture_workshop['shongit_workshop_dur']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shongit_workshop_pre" data-title="Enter">
										<?php echo $shongit_workshop_pre=  (isset( $culture_workshop['shongit_workshop_pre']))?$culture_workshop['shongit_workshop_pre']:0; ?></a>
                                </td>

                                <td class="tg-y698">শিশুতোষ সঙ্গীত কর্মশালা </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shishutosh_shong_workshop_num" data-title="Enter">
										<?php echo $shishutosh_shong_workshop_num=  (isset( $culture_workshop['shishutosh_shong_workshop_num']))?$culture_workshop['shishutosh_shong_workshop_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shishutosh_shong_workshop_dur" data-title="Enter">
										<?php echo $shishutosh_shong_workshop_dur=  (isset( $culture_workshop['shishutosh_shong_workshop_dur']))?$culture_workshop['shishutosh_shong_workshop_dur']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shishutosh_shong_workshop_pre" data-title="Enter">
										<?php echo $shishutosh_shong_workshop_pre=  (isset( $culture_workshop['shishutosh_shong_workshop_pre']))?$culture_workshop['shishutosh_shong_workshop_pre']:0; ?></a>
                                </td>


                            </tr>


                            <tr>
                                <td class="tg-y698">নাট্য কর্মশালা </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="natto_workshop_num" data-title="Enter">
										<?php echo $natto_workshop_num=  (isset( $culture_workshop['natto_workshop_num']))?$culture_workshop['natto_workshop_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="natto_workshop_dur" data-title="Enter">
										<?php echo $natto_workshop_dur=  (isset( $culture_workshop['natto_workshop_dur']))?$culture_workshop['natto_workshop_dur']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="natto_workshop_pre" data-title="Enter">
										<?php echo $natto_workshop_pre=  (isset( $culture_workshop['natto_workshop_pre']))?$culture_workshop['natto_workshop_pre']:0; ?></a>
                                </td>

                                <td class="tg-y698">শিশুতোষ নাট্য কর্মশালা  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shishutosh_natto_workshop_num" data-title="Enter">
										<?php echo $shishutosh_natto_workshop_num=  (isset( $culture_workshop['shishutosh_natto_workshop_num']))?$culture_workshop['shishutosh_natto_workshop_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shishutosh_natto_workshop_dur" data-title="Enter">
										<?php echo $shishutosh_natto_workshop_dur=  (isset( $culture_workshop['shishutosh_natto_workshop_dur']))?$culture_workshop['shishutosh_natto_workshop_dur']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="shishutosh_natto_workshop_pre" data-title="Enter">
										<?php echo $shishutosh_natto_workshop_pre=  (isset( $culture_workshop['shishutosh_natto_workshop_pre']))?$culture_workshop['shishutosh_natto_workshop_pre']:0; ?></a>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">আবৃত্তি উপস্থাপনা কর্মশালা </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abritti_workshop_num" data-title="Enter">
										<?php echo $abritti_workshop_num=  (isset( $culture_workshop['abritti_workshop_num']))?$culture_workshop['abritti_workshop_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abritti_workshop_dur" data-title="Enter">
										<?php echo $abritti_workshop_dur=  (isset( $culture_workshop['abritti_workshop_dur']))?$culture_workshop['abritti_workshop_dur']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="abritti_workshop_pre" data-title="Enter">
										<?php echo $abritti_workshop_pre=  (isset( $culture_workshop['abritti_workshop_pre']))?$culture_workshop['abritti_workshop_pre']:0; ?></a>
                                </td>

                                <td class="tg-y698">টেকনিক্যাল কর্মশালা  </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="technical_workshop_num" data-title="Enter">
										<?php echo $technical_workshop_num=  (isset( $culture_workshop['technical_workshop_num']))?$culture_workshop['technical_workshop_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="technical_workshop_dur" data-title="Enter">
										<?php echo $technical_workshop_dur=  (isset( $culture_workshop['technical_workshop_dur']))?$culture_workshop['technical_workshop_dur']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="technical_workshop_pre" data-title="Enter">
										<?php echo $technical_workshop_pre=  (isset( $culture_workshop['technical_workshop_pre']))?$culture_workshop['technical_workshop_pre']:0; ?></a>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">ক্বিরাআত কর্মশালা </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kirat_workshop_num" data-title="Enter">
										<?php echo $kirat_workshop_num=  (isset( $culture_workshop['kirat_workshop_num']))?$culture_workshop['kirat_workshop_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kirat_workshop_dur" data-title="Enter">
										<?php echo $kirat_workshop_dur=  (isset( $culture_workshop['kirat_workshop_dur']))?$culture_workshop['kirat_workshop_dur']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="kirat_workshop_pre" data-title="Enter">
										<?php echo $kirat_workshop_pre=  (isset( $culture_workshop['kirat_workshop_pre']))?$culture_workshop['kirat_workshop_pre']:0; ?></a>
                                </td>

                                <td class="tg-y698">সাংস্কৃতিক কর্মশালা </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="cultural_workshop_num" data-title="Enter">
										<?php echo $cultural_workshop_num=  (isset( $culture_workshop['cultural_workshop_num']))?$culture_workshop['cultural_workshop_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="cultural_workshop_dur" data-title="Enter">
										<?php echo $cultural_workshop_dur=  (isset( $culture_workshop['cultural_workshop_dur']))?$culture_workshop['cultural_workshop_dur']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="cultural_workshop_pre" data-title="Enter">
										<?php echo $cultural_workshop_pre=  (isset( $culture_workshop['cultural_workshop_pre']))?$culture_workshop['cultural_workshop_pre']:0; ?></a>
                                </td>


                            </tr>
                            <tr>
                                <td class="tg-y698">অগ্রজ মানোন্নয়ন কর্মশালা </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ogroj_man_workshop_num" data-title="Enter">
										<?php echo $ogroj_man_workshop_num=  (isset( $culture_workshop['ogroj_man_workshop_num']))?$culture_workshop['ogroj_man_workshop_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ogroj_man_workshop_dur" data-title="Enter">
										<?php echo $ogroj_man_workshop_dur=  (isset( $culture_workshop['ogroj_man_workshop_dur']))?$culture_workshop['ogroj_man_workshop_dur']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="ogroj_man_workshop_pre" data-title="Enter">
										<?php echo $ogroj_man_workshop_pre=  (isset( $culture_workshop['ogroj_man_workshop_pre']))?$culture_workshop['ogroj_man_workshop_pre']:0; ?></a>
                                </td>


                                <td class="tg-y698">উন্মেষ মানোন্নয়ন কর্মশালা </td>
                                <td class="tg-0pky  type_1">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="unmesh_man_workshop_num" data-title="Enter">
										<?php echo $unmesh_man_workshop_num=  (isset( $culture_workshop['unmesh_man_workshop_num']))?$culture_workshop['unmesh_man_workshop_num']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_2">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="unmesh_man_workshop_dur" data-title="Enter">
										<?php echo $unmesh_man_workshop_dur=  (isset( $culture_workshop['unmesh_man_workshop_dur']))?$culture_workshop['unmesh_man_workshop_dur']:0; ?></a>
                                </td>
                                <td class="tg-0pky  type_3">
									<a href="#" class="editable editable-click" data-id="" data-idname=""
                                       data-type="number" data-table="culture_workshop" data-pk="<?php echo $pk ?>"
                                       data-url="<?php echo admin_url('departmentsreport/detailupdate');?>"
                                       data-name="unmesh_man_workshop_pre" data-title="Enter">
										<?php echo $unmesh_man_workshop_pre=  (isset( $culture_workshop['unmesh_man_workshop_pre']))?$culture_workshop['unmesh_man_workshop_pre']:0; ?></a>
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

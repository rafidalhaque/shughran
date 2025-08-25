<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
  
 
<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'প্রফেশনাল আউটপুট ট-০৪(অন্যান্য) ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon fa fa-tasks tip" data-placement="left" title="<?= lang("actions") ?>"></i>
                    </a>
                    <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                      
                         
                        
                        
                    </ul>
                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= "সকল শাখা" ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('departmentsreport/professional-output04') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/professional-output04/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php // lang('list_results'); ?></p>

				 
				
				
                <div class="table-responsive">
				
	
				<style type="text/css">
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
                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" rowspan="2">সেক্টরসমূহ</td>
                                <td class="tg-pwj7" colspan="2">সদস্য </td>
                                <td class="tg-pwj7" colspan="2">সাথী  </td>
                                <td class="tg-pwj7" colspan="2"> কর্মী </td>
                                <td class="tg-pwj7" colspan="2">সমর্থক  </td>
                                <td class="tg-pwj7" colspan="2">মোট  </td>
                                
                            </tr>

                            <tr>
                                <td class="tg-pwj7 "><div><span>আবেদন</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>আবেদন</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>আবেদন </span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>আবেদন</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                                <td class="tg-pwj7 "><div><span>আবেদন</span></div></td>
                                <td class="tg-pwj7 "><div><span>অর্জন </span></div></td>
                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"> পাব্লিক বিশ্ববিদ্যালয়	</td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pblkuvs_so_abedon=$total_profesonal_output_4['pblkuvs_so_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $pblkuvs_so_orjon=$total_profesonal_output_4['pblkuvs_so_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $pblkuvs_sa_abedon=$total_profesonal_output_4['pblkuvs_sa_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $pblkuvs_sa_orjon=$total_profesonal_output_4['pblkuvs_sa_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $pblkuvs_ko_abedon=$total_profesonal_output_4['pblkuvs_ko_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $pblkuvs_ko_orjon=$total_profesonal_output_4['pblkuvs_ko_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $pblkuvs_som_abedon=$total_profesonal_output_4['pblkuvs_som_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $pblkuvs_som_orjon=$total_profesonal_output_4['pblkuvs_som_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($pblkuvs_so_abedon!=0)?($pblkuvs_so_abedon+$pblkuvs_sa_abedon+$pblkuvs_ko_abedon+$pblkuvs_som_abedon):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($pblkuvs_so_orjon!=0)?($pblkuvs_so_orjon+$pblkuvs_sa_orjon+$pblkuvs_ko_orjon+$pblkuvs_som_orjon):0?>
                                </td>


                            </tr>


                            <tr>
                                <td class="tg-y698">প্রাইভেট বিশ্ববিদ্যালয় </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $pvtuvs_so_abedon=$total_profesonal_output_4['pvtuvs_so_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $pvtuvs_so_orjon=$total_profesonal_output_4['pvtuvs_so_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $pvtuvs_sa_abedon=$total_profesonal_output_4['pvtuvs_sa_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $pvtuvs_sa_orjon=$total_profesonal_output_4['pvtuvs_sa_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $pvtuvs_ko_abedon=$total_profesonal_output_4['pvtuvs_ko_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $pvtuvs_ko_orjon=$total_profesonal_output_4['pvtuvs_ko_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $pvtuvs_som_abedon=$total_profesonal_output_4['pvtuvs_som_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $pvtuvs_som_orjon=$total_profesonal_output_4['pvtuvs_som_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($pvtuvs_so_abedon!=0)?($pvtuvs_so_abedon+$pvtuvs_sa_abedon+$pvtuvs_ko_abedon+$pvtuvs_som_abedon):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($pvtuvs_so_orjon!=0)?($pvtuvs_so_orjon+$pvtuvs_sa_orjon+$pvtuvs_ko_orjon+$pvtuvs_som_orjon):0?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">পুলিশ এস আই ও সার্জেন্ট </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $plcsichjt_so_abedon=$total_profesonal_output_4['plcsichjt_so_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $plcsichjt_so_orjon=$total_profesonal_output_4['plcsichjt_so_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $plcsichjt_sa_abedon=$total_profesonal_output_4['plcsichjt_sa_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $plcsichjt_sa_orjon=$total_profesonal_output_4['plcsichjt_sa_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $plcsichjt_ko_abedon=$total_profesonal_output_4['plcsichjt_ko_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $plcsichjt_ko_orjon=$total_profesonal_output_4['plcsichjt_ko_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $plcsichjt_som_abedon=$total_profesonal_output_4['plcsichjt_som_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $plcsichjt_som_orjon=$total_profesonal_output_4['plcsichjt_som_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($plcsichjt_so_abedon!=0)?($plcsichjt_so_abedon+$plcsichjt_sa_abedon+$plcsichjt_ko_abedon+$plcsichjt_som_abedon):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($plcsichjt_so_orjon!=0)?($plcsichjt_so_orjon+$plcsichjt_sa_orjon+$plcsichjt_ko_orjon+$plcsichjt_som_orjon):0?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">এটভোকেটশীপ </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $avsh_so_abedon=$total_profesonal_output_4['avsh_so_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $avsh_so_orjon=$total_profesonal_output_4['avsh_so_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $avsh_sa_abedon=$total_profesonal_output_4['avsh_sa_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $avsh_sa_orjon=$total_profesonal_output_4['avsh_sa_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $avsh_ko_abedon=$total_profesonal_output_4['avsh_ko_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $avsh_ko_orjon=$total_profesonal_output_4['avsh_ko_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $avsh_som_abedon=$total_profesonal_output_4['avsh_som_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $avsh_som_orjon=$total_profesonal_output_4['avsh_som_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($avsh_so_abedon!=0)?($avsh_so_abedon+$avsh_sa_abedon+$avsh_ko_abedon+$avsh_som_abedon):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($avsh_so_orjon!=0)?($avsh_so_orjon+$avsh_sa_orjon+$avsh_ko_orjon+$avsh_som_orjon):0?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">বেসরকারী কলেজ শীক্ষক </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bskcllgskhok_so_abedon=$total_profesonal_output_4['bskcllgskhok_so_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $bskcllgskhok_so_orjon=$total_profesonal_output_4['bskcllgskhok_so_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $bskcllgskhok_sa_abedon=$total_profesonal_output_4['bskcllgskhok_sa_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $bskcllgskhok_sa_orjon=$total_profesonal_output_4['bskcllgskhok_sa_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $bskcllgskhok_ko_abedon=$total_profesonal_output_4['bskcllgskhok_ko_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $bskcllgskhok_ko_orjon=$total_profesonal_output_4['bskcllgskhok_ko_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $bskcllgskhok_som_abedon=$total_profesonal_output_4['bskcllgskhok_som_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $bskcllgskhok_som_orjon=$total_profesonal_output_4['bskcllgskhok_som_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($bskcllgskhok_so_abedon!=0)?($bskcllgskhok_so_abedon+$bskcllgskhok_sa_abedon+$bskcllgskhok_ko_abedon+$bskcllgskhok_som_abedon):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($bskcllgskhok_so_orjon!=0)?($bskcllgskhok_so_orjon+$bskcllgskhok_sa_orjon+$bskcllgskhok_ko_orjon+$bskcllgskhok_som_orjon):0?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">প্রাথমিক বিদ্যাঃ শিক্ষক </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ptmbliskhok_so_abedon=$total_profesonal_output_4['ptmbliskhok_so_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ptmbliskhok_so_orjon=$total_profesonal_output_4['ptmbliskhok_so_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $ptmbliskhok_sa_abedon=$total_profesonal_output_4['ptmbliskhok_sa_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $ptmbliskhok_sa_orjon=$total_profesonal_output_4['ptmbliskhok_sa_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $ptmbliskhok_ko_abedon=$total_profesonal_output_4['ptmbliskhok_ko_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $ptmbliskhok_ko_orjon=$total_profesonal_output_4['ptmbliskhok_ko_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $ptmbliskhok_som_abedon=$total_profesonal_output_4['ptmbliskhok_som_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $ptmbliskhok_som_orjon=$total_profesonal_output_4['ptmbliskhok_som_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($ptmbliskhok_so_abedon!=0)?($ptmbliskhok_so_abedon+$ptmbliskhok_sa_abedon+$ptmbliskhok_ko_abedon+$ptmbliskhok_som_abedon):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($ptmbliskhok_so_orjon!=0)?($ptmbliskhok_so_orjon+$ptmbliskhok_sa_orjon+$ptmbliskhok_ko_orjon+$ptmbliskhok_som_orjon):0?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">বেসরকারী স্কুল শিক্ষক </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bskscllskhok_so_abedon=$total_profesonal_output_4['bskscllskhok_so_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $bskscllskhok_so_orjon=$total_profesonal_output_4['bskscllskhok_so_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $bskscllskhok_sa_abedon=$total_profesonal_output_4['bskscllskhok_sa_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $bskscllskhok_sa_orjon=$total_profesonal_output_4['bskscllskhok_sa_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $bskscllskhok_ko_abedon=$total_profesonal_output_4['bskscllskhok_ko_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $bskscllskhok_ko_orjon=$total_profesonal_output_4['bskscllskhok_ko_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $bskscllskhok_som_abedon=$total_profesonal_output_4['bskscllskhok_som_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $bskscllskhok_som_orjon=$total_profesonal_output_4['bskscllskhok_som_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($bskscllskhok_so_abedon!=0)?($bskscllskhok_so_abedon+$bskscllskhok_sa_abedon+$bskscllskhok_ko_abedon+$bskscllskhok_som_abedon):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($bskscllskhok_so_orjon!=0)?($bskscllskhok_so_orjon+$bskscllskhok_sa_orjon+$bskscllskhok_ko_orjon+$bskscllskhok_som_orjon):0?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">ইংলিশ মিডিয়াম শিক্ষক </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $engmdmskhok_so_abedon=$total_profesonal_output_4['engmdmskhok_so_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $engmdmskhok_so_orjon=$total_profesonal_output_4['engmdmskhok_so_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $engmdmskhok_sa_abedon=$total_profesonal_output_4['engmdmskhok_sa_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $engmdmskhok_sa_orjon=$total_profesonal_output_4['engmdmskhok_sa_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $engmdmskhok_ko_abedon=$total_profesonal_output_4['engmdmskhok_ko_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $engmdmskhok_ko_orjon=$total_profesonal_output_4['engmdmskhok_ko_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $engmdmskhok_som_abedon=$total_profesonal_output_4['engmdmskhok_som_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $engmdmskhok_som_orjon=$total_profesonal_output_4['engmdmskhok_som_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($engmdmskhok_so_abedon!=0)?($engmdmskhok_so_abedon+$engmdmskhok_sa_abedon+$engmdmskhok_ko_abedon+$engmdmskhok_som_abedon):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($engmdmskhok_so_orjon!=0)?($engmdmskhok_so_orjon+$engmdmskhok_sa_orjon+$engmdmskhok_ko_orjon+$engmdmskhok_som_orjon):0?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">বেসরকারী কোম্পানী </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $bskcpn_so_abedon=$total_profesonal_output_4['bskcpn_so_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $bskcpn_so_orjon=$total_profesonal_output_4['bskcpn_so_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $bskcpn_sa_abedon=$total_profesonal_output_4['bskcpn_sa_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $bskcpn_sa_orjon=$total_profesonal_output_4['bskcpn_sa_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $bskcpn_ko_abedon=$total_profesonal_output_4['bskcpn_ko_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $bskcpn_ko_orjon=$total_profesonal_output_4['bskcpn_ko_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $bskcpn_som_abedon=$total_profesonal_output_4['bskcpn_som_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $bskcpn_som_orjon=$total_profesonal_output_4['bskcpn_som_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($bskcpn_so_abedon!=0)?($bskcpn_so_abedon+$bskcpn_sa_abedon+$bskcpn_ko_abedon+$bskcpn_som_abedon):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($bskcpn_so_orjon!=0)?($bskcpn_so_orjon+$bskcpn_sa_orjon+$bskcpn_ko_orjon+$bskcpn_som_orjon):0?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">আন্তর্জাতিক সংস্থা </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ajtssth_so_abedon=$total_profesonal_output_4['ajtssth_so_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ajtssth_so_orjon=$total_profesonal_output_4['ajtssth_so_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $ajtssth_sa_abedon=$total_profesonal_output_4['ajtssth_sa_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $ajtssth_sa_orjon=$total_profesonal_output_4['ajtssth_sa_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $ajtssth_ko_abedon=$total_profesonal_output_4['ajtssth_ko_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $ajtssth_ko_orjon=$total_profesonal_output_4['ajtssth_ko_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $ajtssth_som_abedon=$total_profesonal_output_4['ajtssth_som_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $ajtssth_som_orjon=$total_profesonal_output_4['ajtssth_som_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($ajtssth_so_abedon!=0)?($ajtssth_so_abedon+$ajtssth_sa_abedon+$ajtssth_ko_abedon+$ajtssth_som_abedon):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($ajtssth_so_orjon!=0)?($ajtssth_so_orjon+$ajtssth_sa_orjon+$ajtssth_ko_orjon+$ajtssth_som_orjon):0?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">এন জি ও </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $ango_so_abedon=$total_profesonal_output_4['ango_so_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $ango_so_orjon=$total_profesonal_output_4['ango_so_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $ango_sa_abedon=$total_profesonal_output_4['ango_sa_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $ango_sa_orjon=$total_profesonal_output_4['ango_sa_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $ango_ko_abedon=$total_profesonal_output_4['ango_ko_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $ango_ko_orjon=$total_profesonal_output_4['ango_ko_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $ango_som_abedon=$total_profesonal_output_4['ango_som_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $ango_som_orjon=$total_profesonal_output_4['ango_som_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($ango_so_abedon!=0)?($ango_so_abedon+$ango_sa_abedon+$ango_ko_abedon+$ango_som_abedon):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($ango_so_orjon!=0)?($ango_so_orjon+$ango_sa_orjon+$ango_ko_orjon+$ango_som_orjon):0?>
                                </td>

                            </tr>
                            <tr>
                                <td class="tg-y698">অন্যান্য </td>
                                <td class="tg-0pky  type_1">
                                <?php echo $onnoanno_so_abedon=$total_profesonal_output_4['onnoanno_so_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_2">
                                <?php echo $onnoanno_so_orjon=$total_profesonal_output_4['onnoanno_so_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_3">
                                <?php echo $onnoanno_sa_abedon=$total_profesonal_output_4['onnoanno_sa_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_4">
                                <?php echo $onnoanno_sa_orjon=$total_profesonal_output_4['onnoanno_sa_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_5">
                                <?php echo $onnoanno_ko_abedon=$total_profesonal_output_4['onnoanno_ko_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_6">
                                <?php echo $onnoanno_ko_orjon=$total_profesonal_output_4['onnoanno_ko_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_7">
                                <?php echo $onnoanno_som_abedon=$total_profesonal_output_4['onnoanno_som_abedon'] ?>
                                </td>
                                <td class="tg-0pky  type_8">
                                <?php echo $onnoanno_som_orjon=$total_profesonal_output_4['onnoanno_som_orjon'] ?>
                                </td>
                                <td class="tg-0pky  type_9">
                                <?php echo ($onnoanno_so_abedon!=0)?($onnoanno_so_abedon+$onnoanno_sa_abedon+$onnoanno_ko_abedon+$onnoanno_som_abedon):0?>
                                </td>
                                <td class="tg-0pky  type_10">
                                <?php echo ($onnoanno_so_orjon!=0)?($onnoanno_so_orjon+$onnoanno_sa_orjon+$onnoanno_ko_orjon+$onnoanno_som_orjon):0?>
                                </td>

                            </tr>

                        </table>
                    </div>
				
				
				
		 
			   </div>
            </div>
        </div>
    </div>
</div>
 

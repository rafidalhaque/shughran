<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'আউটপুট রিপোর্ট' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/output-report') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/output-report/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                <p class="introtext">
                <div class="table-responsive">
                    <div class="tg-wrap">
                    <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                            <td class="tg-pwj7" rowspan="3">বিবরণ </td>
                   
                                
                                
                   </tr>
                   <tr>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি </td>


                       <td class="tg-pwj7" rowspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি </td>

                       <td class="tg-pwj7" rowspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি </td>

                       <td class="tg-pwj7" rowspan="">বিবরণ </td>
                       <td class="tg-pwj7" colspan="">বৃদ্ধি </td>
                   

                   </tr>
                   <tr>
                 
                   </tr>

                   <?php $pk = (isset($output_riport['id']))?$output_riport['id']:'';?>


                   <tr>
                       <td class="tg-y698 type_1"> গীতিকার 	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gk_br" data-title="Enter"><?php echo $gk_br=  (isset( $output_riport['gk_br']))?$output_riport['gk_br']:'' ?></a>
                       </td>
                     
                       <td class="tg-y698">উপস্থাপক  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sk_br" data-title="Enter"><?php echo $sk_br=  (isset( $output_riport['sk_br']))?$output_riport['sk_br']:'' ?></a>
                       </td>
                      
                   
                       <td class="tg-y698">বক্তা  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="nk_br" data-title="Enter"><?php echo $nk_br=  (isset( $output_riport['nk_br']))?$output_riport['nk_br']:'' ?></a>
                       </td>
                 
                
                       <td class="tg-y698">সেট ডিজাইনার  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="dn_br" data-title="Enter"><?php echo $dn_br=  (isset( $output_riport['dn_br']))?$output_riport['dn_br']:'' ?></a>
                       </td>
                  
              
                   </tr>


                   <tr>
                       <td class="tg-y698">সুরকার  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="shilpi_br" data-title="Enter"><?php echo $shilpi_br=  (isset( $output_riport['shilpi_br']))?$output_riport['shilpi_br']:'' ?></a>
                       </td>
                    
                   
                  
                       <td class="tg-y698">ক্বারী </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ovn_br" data-title="Enter"><?php echo $ovn_br=  (isset( $output_riport['ovn_br']))?$output_riport['ovn_br']:'' ?></a>
                       </td>
                   
                   
                   
                       <td class="tg-y698">বিতার্কিক </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="ak_br" data-title="Enter"><?php echo $ak_br=  (isset( $output_riport['ak_br']))?$output_riport['ak_br']:'' ?></a>
                       </td>
                     
              
                   
                  
                       <td class="tg-y698">কার্টুনিস্ট  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="up_br" data-title="Enter"><?php echo $up_br=  (isset( $output_riport['up_br']))?$output_riport['up_br']:'' ?></a>
                       </td>
                     
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">নাট্যকার </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kr_br" data-title="Enter"><?php echo $kr_br=  (isset( $output_riport['kr_br']))?$output_riport['kr_br']:'' ?></a>
                       </td>
                      
                   
                   
                       <td class="tg-y698">কবি  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kb_br" data-title="Enter"><?php echo $kb_br=  (isset( $output_riport['kb_br']))?$output_riport['kb_br']:'' ?></a>
                       </td>
                      
              
                   
                   
                       <td class="tg-y698">প্রশিক্ষক  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="le_br" data-title="Enter"><?php echo $le_br=  (isset( $output_riport['le_br']))?$output_riport['le_br']:'' ?></a>
                       </td>
                      
                   
                  
                       <td class="tg-y698">চারু শিল্পী  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sbdk_br" data-title="Enter"><?php echo $sbdk_br=  (isset( $output_riport['sbdk_br']))?$output_riport['sbdk_br']:'' ?></a>
                       </td>
                     
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">নির্দেশক   </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bt_br" data-title="Enter"><?php echo $bt_br=  (isset( $output_riport['bt_br']))?$output_riport['bt_br']:'' ?></a>
                       </td>
                     
              
                   
                   
                       <td class="tg-y698">লেখক   </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="bk_br" data-title="Enter"><?php echo $bk_br=  (isset( $output_riport['bk_br']))?$output_riport['bk_br']:'' ?></a>
                       </td>
                     
                   
                   
                       <td class="tg-y698">ফটোগ্রাফার  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sh_br" data-title="Enter"><?php echo $sh_br=  (isset( $output_riport['sh_br']))?$output_riport['sh_br']:'' ?></a>
                       </td>
                      
                   
                   
                       <td class="tg-y698">ক্যালিওগ্রাফার  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="fgf_br" data-title="Enter"><?php echo $fgf_br=  (isset( $output_riport['fgf_br']))?$output_riport['fgf_br']:'' ?></a>
                       </td>
                      
              
                   
                   </tr>
                   <tr>
                       <td class="tg-y698">সঙ্গীতশিল্পী   </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="km_br" data-title="Enter"><?php echo $km_br=  (isset( $output_riport['km_br']))?$output_riport['km_br']:'' ?></a>
                       </td>
                      
                   
                   
                       <td class="tg-y698">সাংবাদিক  </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="mm_br" data-title="Enter"><?php echo $mm_br=  (isset( $output_riport['mm_br']))?$output_riport['mm_br']:'' ?></a>
                       </td>
                    
                       <td class="tg-y698 type_1"> ক্যামেরাম্যান 	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="at_br" data-title="Enter"><?php echo $at_br=  (isset( $output_riport['at_br']))?$output_riport['at_br']:'' ?></a>
                       </td>
                     
                   
                       <td class="tg-y698 type_1"> হস্ত(কারু)শিল্পী 	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gfdn_br" data-title="Enter"><?php echo $gfdn_br=  (isset( $output_riport['gfdn_br']))?$output_riport['gfdn_br']:'' ?></a>
                       </td>
                     
                   </tr>

                    <tr>
                       <td class="tg-y698 type_1"> অভিনেতা 	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sdn_br" data-title="Enter"><?php echo $sdn_br=  (isset( $output_riport['sdn_br']))?$output_riport['sdn_br']:'' ?></a>
                       </td>
                     
                  
                       <td class="tg-y698 type_1"> ভিডিও এডিটর 	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sounden_br" data-title="Enter"><?php echo $sounden_br=  (isset( $output_riport['sounden_br']))?$output_riport['sounden_br']:'' ?></a>
                       </td>
                     
                  
                       <td class="tg-y698 type_1"> মেকআপম্যান 	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="kn_br" data-title="Enter"><?php echo $kn_br=  (isset( $output_riport['kn_br']))?$output_riport['kn_br']:'' ?></a>
                       </td>
                     
                   
                       <td class="tg-y698 type_1"> ফ্যাশন ডিজাইনার	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="cshilpi_br" data-title="Enter"><?php echo $cshilpi_br=  (isset( $output_riport['cshilpi_br']))?$output_riport['cshilpi_br']:'' ?></a>
                       </td>
                     
                   </tr>

                   </tr>

                    <tr>
                       <td class="tg-y698 type_1"> আবৃত্তিকার 	</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="abkr_s" data-title="Enter"><?php echo $abkr_s=  (isset( $output_riport['abkr_s']))?$output_riport['abkr_s']:'' ?></a>
                       </td>
                     
                  
                       <td class="tg-y698 type_1"> সাউন্ড ইঞ্জিনিয়ার </td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="souend_e" data-title="Enter"><?php echo $souend_e=  (isset( $output_riport['souend_e']))?$output_riport['souend_e']:'' ?></a>
                       </td>
                     
                  
                       <td class="tg-y698 type_1"> গ্রাফিক্স ডিজাইনার</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="gar_s" data-title="Enter"><?php echo $gar_s=  (isset( $output_riport['gar_s']))?$output_riport['gar_s']:'' ?></a>
                       </td>
                     
                   
                       <td class="tg-y698 type_1"> স্থাপত্য শিল্পী</td>
                       <td class="tg-0pky  type_1">
                       <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="output_riport" data-pk="<?php echo $pk ?>"data-url="<?php echo admin_url('departmentsreport/detailupdate');?>" data-name="sthapoti_s" data-title="Enter"><?php echo $sthapoti_s=  (isset( $output_riport['sthapoti_s']))?$output_riport['sthapoti_s']:'' ?></a>
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

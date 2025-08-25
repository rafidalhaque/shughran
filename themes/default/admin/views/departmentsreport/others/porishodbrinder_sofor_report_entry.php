<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'প্রফেশনাল আউটপুট ট-০২(মানবসেবা/বিজেএস)' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                            <li><a href="<?= admin_url('departmentsreport/porishodbrinder-sofor-report') ?>"><i class="fa fa-building-o"></i> <?= "সকল শাখা" ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('departmentsreport/porishodbrinder-sofor-report/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
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
                                <td class="tg-pwj7" rowspan="2">নং  </td>
                                <td class="tg-pwj7" colspan=""style="border-bottom: hidden;">সফরকারীর নাম </td>
                                
                                <td class="tg-pwj7" colspan="">কতবার   </td>
                                <td class="tg-pwj7" colspan="">প্রোগ্রামের ধরন </td>
                           
                            </tr>
                            <tr>
                          
                            </tr>
                            <tr>
                  
                               
                            </tr>




                            <tr>
                                <td class="tg-y698 type_1"></td>
                                <td class="tg-0pky">
                                মুহতারাম আমীরে জামায়াত
                                </td>
                                <td class="tg-0pky">
                               
                                </td>
                                <td class="tg-0pky">
                               
                                </td>
                                

                            </tr>


                            <tr>
                                <td class="tg-y698"> </td>
                                <td class="tg-0pky">
                                মুহতারাম সেক্রেটারী জেনারেল 
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                             
                            </tr>
                            <tr>
                                <td class="tg-y698"></td>
                                <td class="tg-0pky">
                                জেনারেল জনাব আ ন ম আব্দুজ জাহের
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                             

                            </tr>
                            <tr>
                                <td class="tg-y698"> </td>
                                <td class="tg-0pky">
                                জনাব অধ্যক্ষ মাওলানা আবু তাহের
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                            
                            </tr>
                            <tr>
                                <td class="tg-y698"></td>
                                <td class="tg-0pky">
                                জনাব এনামুল হক মঞ্জু
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>

                            <tr>
                                <td class="tg-y698"></td>
                                <td class="tg-0pky">
                                জনাব সাইফুল আলম খান মিলন
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"> </td>
                                <td class="tg-0pky">
                                জনাব অধ্যাপক তাসনিম আলম 
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"> </td>
                                <td class="tg-0pky">
                                জনাব ডক্টর সৈয়দ আব্দুল মোহাম্মদ তাহের জনাব
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"> </td>
                                <td class="tg-0pky">
                                মাওলানা শামসুল ইসলাম
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"> </td>
                                <td class="tg-0pky">
                                জনাব আজম ওবায়দুল্লাহ
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"> </td>
                                <td class="tg-0pky">
                                জনাব রফিকুল ইসলাম খান
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"></td>
                                <td class="tg-0pky">
                                জনাব মোঃ শাহজাহান
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"> </td>
                                <td class="tg-0pky">
                                জনাব মতিউর রহমান আকন্দ 
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"></td>
                                <td class="tg-0pky">
                                এহসানুল মাহবুব জুবায়ের
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"> </td>
                                <td class="tg-0pky">
                                জনাব নূরুল ইসলাম বুলবুল 
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"> </td>
                                <td class="tg-0pky">
                                জনাব মজিবুর রহমান মঞ্জু
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"> </td>
                                <td class="tg-0pky">
                                মোহাম্মদ  সেলিম উদ্দিন 
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"></td>
                                <td class="tg-0pky">
                                ডঃ শফিকুল ইসলাম মাসুদ 
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"> </td>
                                <td class="tg-0pky">
                                মোঃ জাহিদুর রহমান
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"> </td>
                                <td class="tg-0pky">
                                ডঃ মোঃ রেজাউল করিম 
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"></td>
                                <td class="tg-0pky">
                                দেলোয়ার হোসেন 
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"> </td>
                                <td class="tg-0pky">
                                মোহাম্মদ আবদুল জব্বার
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                              
                            </tr>
                            <tr>
                                <td class="tg-y698"> </td>
                                <td class="tg-0pky">
                                মোঃ আতিকুর রহমান
                                </td>
                                <td class="tg-0pky">
                                
                                </td>
                                <td class="tg-0pky">
                                
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

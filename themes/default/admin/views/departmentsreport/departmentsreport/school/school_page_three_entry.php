<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<link href="<?= $assets ?>plugins/xedit/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<div class="box">
    <div class="box-header">
        <h2 class="blue">
            <i class="fa-fw fa fa-barcode"></i><?= 'স্কুল বিভাগ - পেইজ ০৩' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>

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
                                <td class="tg-pwj7" colspan="5"><b>বিতরণ</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">প্রোগ্রাম</td>
                                <td class="tg-pwj7">পুর্বের সংখ্যা </td>
                                <td class="tg-pwj7">বর্তমান সংখ্যা</td>
                            </tr>
                            <?php
                                $pk = (isset($school_bitoron['id']))?$school_bitoron['id']:'';
                            ?>
                            <tr>

                                <td class="tg-y698 type_1"> কিশোর পত্রিকা বাংলা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kishor_potrika_bn_prev" data-title="Enter">
                                        <?php echo $kishor_potrika_bn_prev =  (isset($school_bitoron['kishor_potrika_bn_prev'])) ? $school_bitoron['kishor_potrika_bn_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kishor_potrika_bn_pres" data-title="Enter">
                                        <?php echo $kishor_potrika_bn_pres =  (isset($school_bitoron['kishor_potrika_bn_pres'])) ? $school_bitoron['kishor_potrika_bn_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">প্রেরণা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="prerona_prev" data-title="Enter">
                                        <?php echo $prerona_prev =  (isset($school_bitoron['prerona_prev'])) ? $school_bitoron['prerona_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="prerona_pres" data-title="Enter">
                                        <?php echo $prerona_pres =  (isset($school_bitoron['prerona_pres'])) ? $school_bitoron['prerona_pres'] : 0 ?>
                                    </a>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">কিশোর পত্রিকা ইংরেজি</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kishor_portrika_en_prev" data-title="Enter">
                                        <?php echo $kishor_portrika_en_prev =  (isset($school_bitoron['kishor_portrika_en_prev'])) ? $school_bitoron['kishor_portrika_en_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kishor_portrika_en_pres" data-title="Enter">
                                        <?php echo $kishor_portrika_en_pres =  (isset($school_bitoron['kishor_portrika_en_pres'])) ? $school_bitoron['kishor_portrika_en_pres'] : 0 ?>
                                    </a>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">স্টিকার/কার্ড</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sticker_prev" data-title="Enter">
                                        <?php echo $sticker_prev =  (isset($school_bitoron['sticker_prev'])) ? $school_bitoron['sticker_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sticker_pres" data-title="Enter">
                                        <?php echo $sticker_pres =  (isset($school_bitoron['sticker_pres'])) ? $school_bitoron['sticker_pres'] : 0 ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> ক্লাস রুটিন</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="class_routine_prev" data-title="Enter">
                                        <?php echo $class_routine_prev =  (isset($school_bitoron['class_routine_prev'])) ? $school_bitoron['class_routine_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="class_routine_pres" data-title="Enter">
                                        <?php echo $class_routine_pres =  (isset($school_bitoron['class_routine_pres'])) ? $school_bitoron['class_routine_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> দেয়ালিকা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="deyalika_prev" data-title="Enter">
                                        <?php echo $deyalika_prev =  (isset($school_bitoron['deyalika_prev'])) ? $school_bitoron['deyalika_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="deyalika_pres" data-title="Enter">
                                        <?php echo $deyalika_pres =  (isset($school_bitoron['deyalika_pres'])) ? $school_bitoron['deyalika_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">ছড়া পাতা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="chora_pata_prev" data-title="Enter">
                                        <?php echo $chora_pata_prev =  (isset($school_bitoron['chora_pata_prev'])) ? $school_bitoron['chora_pata_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="chora_pata_pres" data-title="Enter">
                                        <?php echo $chora_pata_pres =  (isset($school_bitoron['chora_pata_pres'])) ? $school_bitoron['chora_pata_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> পরীক্ষার রুটিন</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="exam_routine_prev" data-title="Enter">
                                        <?php echo $exam_routine_prev =  (isset($school_bitoron['exam_routine_prev'])) ? $school_bitoron['exam_routine_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="exam_routine_pres" data-title="Enter">
                                        <?php echo $exam_routine_pres =  (isset($school_bitoron['exam_routine_pres'])) ? $school_bitoron['exam_routine_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1"> মাসিক/দ্বিমাসিক সাময়িকী</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="masik_shamoyiki_prev" data-title="Enter">
                                        <?php echo $masik_shamoyiki_prev =  (isset($school_bitoron['masik_shamoyiki_prev'])) ? $school_bitoron['masik_shamoyiki_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="masik_shamoyiki_pres" data-title="Enter">
                                        <?php echo $masik_shamoyiki_pres =  (isset($school_bitoron['masik_shamoyiki_pres'])) ? $school_bitoron['masik_shamoyiki_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">হাসির কাগজ</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hashir_kagoj_prev" data-title="Enter">
                                        <?php echo $hashir_kagoj_prev =  (isset($school_bitoron['hashir_kagoj_prev'])) ? $school_bitoron['hashir_kagoj_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="hashir_kagoj_pres" data-title="Enter">
                                        <?php echo $hashir_kagoj_pres =  (isset($school_bitoron['hashir_kagoj_pres'])) ? $school_bitoron['hashir_kagoj_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">ফুলেল শুভেচ্ছা বাণী</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="fulel_shuvechcha_prev" data-title="Enter">
                                        <?php echo $fulel_shuvechcha_prev =  (isset($school_bitoron['fulel_shuvechcha_prev'])) ? $school_bitoron['fulel_shuvechcha_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="fulel_shuvechcha_pres" data-title="Enter">
                                        <?php echo $fulel_shuvechcha_pres =  (isset($school_bitoron['fulel_shuvechcha_pres'])) ? $school_bitoron['fulel_shuvechcha_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সংক্ষিপ্ত পরিচিতি</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="porchiti_prev" data-title="Enter">
                                        <?php echo $porchiti_prev =  (isset($school_bitoron['porchiti_prev'])) ? $school_bitoron['porchiti_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="porchiti_pres" data-title="Enter">
                                        <?php echo $porchiti_pres =  (isset($school_bitoron['porchiti_pres'])) ? $school_bitoron['porchiti_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সাহিত্য</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shahitto_prev" data-title="Enter">
                                        <?php echo $shahitto_prev =  (isset($school_bitoron['shahitto_prev'])) ? $school_bitoron['shahitto_prev'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_bitoron" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shahitto_pres" data-title="Enter">
                                        <?php echo $shahitto_pres =  (isset($school_bitoron['shahitto_pres'])) ? $school_bitoron['shahitto_pres'] : 0 ?>
                                    </a>
                                </td>
                            </tr>

                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>যোগাযোগ</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ধরন </td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7"> কেন্দ্র থেকে</td>
                                <td class="tg-pwj7">শাখা থেকে</td>
                                <td class="tg-pwj7">অন্যান্য</td>
                                
                            </tr>
                            <?php
                                $pk = (isset($school_contact['id']))?$school_contact['id']:'';
                            ?>
                            <tr>

                                <td class="tg-y698 type_1"> সার্কুলার</td>

                                <td class="tg-0pky">
                                    <?= $school_contact['circular_kendro_theke']+$school_contact['circular_shaka_theke']+$school_contact['circular_other'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="circular_kendro_theke" data-title="Enter">
                                        <?php echo $circular_kendro_theke =  (isset($school_contact['circular_kendro_theke'])) ? $school_contact['circular_kendro_theke'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="circular_shaka_theke" data-title="Enter">
                                        <?php echo $circular_shaka_theke =  (isset($school_contact['circular_shaka_theke'])) ? $school_contact['circular_shaka_theke'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="circular_other" data-title="Enter">
                                        <?php echo $circular_other =  (isset($school_contact['circular_other'])) ? $school_contact['circular_other'] : 0 ?>
                                    </a>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">চিঠি</td>

                                <td class="tg-0pky">
                                    <?= $school_contact['letter_kendro_theke']+$school_contact['letter_shaka_theke']+$school_contact['letter_other'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="letter_kendro_theke" data-title="Enter">
                                        <?php echo $letter_kendro_theke =  (isset($school_contact['letter_kendro_theke'])) ? $school_contact['letter_kendro_theke'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="letter_shaka_theke" data-title="Enter">
                                        <?php echo $letter_shaka_theke =  (isset($school_contact['letter_shaka_theke'])) ? $school_contact['letter_shaka_theke'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="letter_other" data-title="Enter">
                                        <?php echo $letter_other =  (isset($school_contact['letter_other'])) ? $school_contact['letter_other'] : 0 ?>
                                    </a>
                                </td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">ইমেইল</td>

                                <td class="tg-0pky">
                                    <?= $school_contact['email_kendro_theke']+$school_contact['email_shaka_theke']+$school_contact['email_other'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="email_kendro_theke" data-title="Enter">
                                        <?php echo $email_kendro_theke =  (isset($school_contact['email_kendro_theke'])) ? $school_contact['email_kendro_theke'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="email_shaka_theke" data-title="Enter">
                                        <?php echo $email_shaka_theke =  (isset($school_contact['email_shaka_theke'])) ? $school_contact['email_shaka_theke'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="email_other" data-title="Enter">
                                        <?php echo $email_other =  (isset($school_contact['email_other'])) ? $school_contact['email_other'] : 0 ?>
                                    </a>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">এসএমএস</td>
                                <td class="tg-0pky">
                                    <?= $school_contact['sms_kendro_theke']+$school_contact['sms_shaka_theke']+$school_contact['sms_other'] ?>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sms_kendro_theke" data-title="Enter">
                                        <?php echo $sms_kendro_theke =  (isset($school_contact['sms_kendro_theke'])) ? $school_contact['sms_kendro_theke'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sms_shaka_theke" data-title="Enter">
                                        <?php echo $sms_shaka_theke =  (isset($school_contact['sms_shaka_theke'])) ? $school_contact['sms_shaka_theke'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_contact" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sms_other" data-title="Enter">
                                        <?php echo $sms_other =  (isset($school_contact['sms_other'])) ? $school_contact['sms_other'] : 0 ?>
                                    </a>
                                </td>

                            </tr>

                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="2"><b>সফর</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">কোথা থেকে </td>
                                <td class="tg-pwj7">কতবার </td>
                            </tr>
                            <?php
                                $pk = (isset($school_sofor['id']))?$school_sofor['id']:'';
                            ?>
                            <tr>

                                <td class="tg-y698 type_1"> কেন্দ্র</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_sofor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kendro_theke_kotobar" data-title="Enter">
                                        <?php echo $kendro_theke_kotobar =  (isset($school_sofor['kendro_theke_kotobar'])) ? $school_sofor['kendro_theke_kotobar'] : 0 ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">শাখা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_sofor" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shakha_theke_kotobar" data-title="Enter">
                                        <?php echo $shakha_theke_kotobar =  (isset($school_sofor['shakha_theke_kotobar'])) ? $school_sofor['shakha_theke_kotobar'] : 0 ?>
                                    </a>
                                </td>

                            </tr>
                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>বৈঠক</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">বিবরণ </td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7">উপস্থিতি</td>

                            </tr>
                            <?php
                                $pk = (isset($school_boithok['id']))?$school_boithok['id']:'';
                            ?>
                            <tr>

                                <td class="tg-y698 type_1"> সাথী বৈঠক</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_boithok" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_boithok_num" data-title="Enter">
                                        <?php echo $sathi_boithok_num =  (isset($school_boithok['sathi_boithok_num'])) ? $school_boithok['sathi_boithok_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_boithok" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_boithok_pre" data-title="Enter">
                                        <?php echo $sathi_boithok_pre =  (isset($school_boithok['sathi_boithok_pre'])) ? $school_boithok['sathi_boithok_pre'] : 0 ?>
                                    </a>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">সাথীপ্রার্থী বৈঠক</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_boithok" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_prarthi_boithok_num" data-title="Enter">
                                        <?php echo $sathi_prarthi_boithok_num =  (isset($school_boithok['sathi_prarthi_boithok_num'])) ? $school_boithok['sathi_prarthi_boithok_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_boithok" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sathi_prarthi_boithok_pre" data-title="Enter">
                                        <?php echo $sathi_prarthi_boithok_pre =  (isset($school_boithok['sathi_prarthi_boithok_pre'])) ? $school_boithok['sathi_prarthi_boithok_pre'] : 0 ?>
                                    </a>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">কর্মী বৈঠক</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_boithok" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_boithok_num" data-title="Enter">
                                        <?php echo $kormi_boithok_num =  (isset($school_boithok['kormi_boithok_num'])) ? $school_boithok['kormi_boithok_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_boithok" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="kormi_boithok_pre" data-title="Enter">
                                        <?php echo $kormi_boithok_pre =  (isset($school_boithok['kormi_boithok_pre'])) ? $school_boithok['kormi_boithok_pre'] : 0 ?>
                                    </a>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">স্কুল প্রতিনিধি বৈঠক</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_boithok" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="school_protinidhi_num" data-title="Enter">
                                        <?php echo $school_protinidhi_num =  (isset($school_boithok['school_protinidhi_num'])) ? $school_boithok['school_protinidhi_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_boithok" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="school_protinidhi_pre" data-title="Enter">
                                        <?php echo $school_protinidhi_pre =  (isset($school_boithok['school_protinidhi_pre'])) ? $school_boithok['school_protinidhi_pre'] : 0 ?>
                                    </a>
                                </td>

                            </tr>

                        </table>

                        <table class="tg table table-header-rotated" id="testTable2">
                            <tr>
                                <td class="tg-pwj7" colspan="5"><b>ক্যারিয়ার ডিজাইন</b></td>
                            </tr>
                            <tr>
                                <td class="tg-pwj7">ধরন </td>
                                <td class="tg-pwj7">সংখ্যা</td>
                                <td class="tg-pwj7"> মোট উপস্থিতি </td>
                                <td class="tg-pwj7">গড়</td>
                            </tr>
                            <?php
                                $pk = (isset($school_career_design['id']))?$school_career_design['id']:'';
                            ?>
                            <tr>

                                <td class="tg-y698 type_1"> সুন্দর হাতের লেখা</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_career_design" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shundor_hater_lekha_num" data-title="Enter">
                                        <?php echo $shundor_hater_lekha_num =  (isset($school_career_design['shundor_hater_lekha_num'])) ? $school_career_design['shundor_hater_lekha_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_career_design" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="shundor_hater_lekha_pre" data-title="Enter">
                                        <?php echo $shundor_hater_lekha_pre =  (isset($school_career_design['shundor_hater_lekha_pre'])) ? $school_career_design['shundor_hater_lekha_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($shundor_hater_lekha_pre!=0 && $shundor_hater_lekha_num!=0 )? $shundor_hater_lekha_pre / $shundor_hater_lekha_num:0 ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">দেশটাকে গড়তে চাই বেশি করে পড়ছি তাই</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_career_design" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="deshtake_gorte_num" data-title="Enter">
                                        <?php echo $deshtake_gorte_num =  (isset($school_career_design['deshtake_gorte_num'])) ? $school_career_design['deshtake_gorte_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_career_design" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="deshtake_gorte_pre" data-title="Enter">
                                        <?php echo $deshtake_gorte_pre =  (isset($school_career_design['deshtake_gorte_pre'])) ? $school_career_design['deshtake_gorte_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($deshtake_gorte_pre!=0 && $deshtake_gorte_num!=0 )? $deshtake_gorte_pre / $deshtake_gorte_num:0 ?>
                                </td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">মেধার শীর্ষে যারা সেই মেধাবীদের সেরা কারা?</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_career_design" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="medhabi_num" data-title="Enter">
                                        <?php echo $medhabi_num =  (isset($school_career_design['medhabi_num'])) ? $school_career_design['medhabi_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_career_design" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="medhabi_pre" data-title="Enter">
                                        <?php echo $medhabi_pre =  (isset($school_career_design['medhabi_pre'])) ? $school_career_design['medhabi_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($medhabi_pre!=0 && $medhabi_num!=0 )? $medhabi_pre / $medhabi_num:0 ?>
                                </td>

                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">Academic & Moral Development programe</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_career_design" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="moral_development_num" data-title="Enter">
                                        <?php echo $moral_development_num =  (isset($school_career_design['moral_development_num'])) ? $school_career_design['moral_development_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_career_design" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="moral_development_pre" data-title="Enter">
                                        <?php echo $moral_development_pre =  (isset($school_career_design['moral_development_pre'])) ? $school_career_design['moral_development_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($moral_development_pre!=0 && $moral_development_num!=0 )? $moral_development_pre / $moral_development_num:0 ?>
                                </td>
                            </tr>

                            <tr>

                                <td class="tg-y698 type_1">Spoken English</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_career_design" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sopken_english_num" data-title="Enter">
                                        <?php echo $sopken_english_num =  (isset($school_career_design['sopken_english_num'])) ? $school_career_design['sopken_english_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_career_design" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="sopken_english_pre" data-title="Enter">
                                        <?php echo $sopken_english_pre =  (isset($school_career_design['sopken_english_pre'])) ? $school_career_design['sopken_english_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($sopken_english_pre!=0 && $sopken_english_num!=0 )? $sopken_english_pre / $sopken_english_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">Computer Course</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_career_design" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="coumputer_course_num" data-title="Enter">
                                        <?php echo $coumputer_course_num =  (isset($school_career_design['coumputer_course_num'])) ? $school_career_design['coumputer_course_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_career_design" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="coumputer_course_pre" data-title="Enter">
                                        <?php echo $coumputer_course_pre =  (isset($school_career_design['coumputer_course_pre'])) ? $school_career_design['coumputer_course_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($coumputer_course_pre!=0 && $coumputer_course_num!=0 )? $coumputer_course_pre / $coumputer_course_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">Academic Exam</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_career_design" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="academic_exam_num" data-title="Enter">
                                        <?php echo $academic_exam_num =  (isset($school_career_design['academic_exam_num'])) ? $school_career_design['academic_exam_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_career_design" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="academic_exam_pre" data-title="Enter">
                                        <?php echo $academic_exam_pre =  (isset($school_career_design['academic_exam_pre'])) ? $school_career_design['academic_exam_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($academic_exam_pre!=0 && $academic_exam_num!=0 )? $academic_exam_pre / $academic_exam_num:0 ?>
                                </td>
                            </tr>
                            <tr>

                                <td class="tg-y698 type_1">Career Guideline programme</td>

                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_career_design" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="cg_prog_num" data-title="Enter">
                                        <?php echo $cg_prog_num =  (isset($school_career_design['cg_prog_num'])) ? $school_career_design['cg_prog_num'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <a href="#" class="editable editable-click" data-id="" data-idname="" data-type="number" data-table="school_career_design" 
                                        data-pk="<?php echo $pk ?>" data-url="<?php echo admin_url('departmentsreport/detailupdate'); ?>" data-name="cg_prog_pre" data-title="Enter">
                                        <?php echo $cg_prog_pre =  (isset($school_career_design['cg_prog_pre'])) ? $school_career_design['cg_prog_pre'] : 0 ?>
                                    </a>
                                </td>
                                <td class="tg-0pky">
                                    <?php echo ($cg_prog_pre!=0 && $cg_prog_num!=0 )? $cg_prog_pre / $cg_prog_num:0 ?>
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
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        font-family: Arial, sans-serif;
        font-size: 14px;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg th {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg .tg-izx2 {
        border-color: black;
        background-color: #efefef;
    }

    .tg .tg-pwj7 {
        background-color: #efefef;
        border-color: black;
    }

    .tg .tg-0pky {
        border-color: black;
        vertical-align: top
    }

    .tg .tg-y698 {
        background-color: #efefef;
        border-color: black;
        vertical-align: top
    }

    .tg .tg-0lax {
        border-color: black;
        vertical-align: top
    }

    @media screen and (max-width: 767px) {
        .tg {
            width: auto !important;
        }

        .tg col {
            width: auto !important;
        }

        .tg-wrap {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
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

    .table-header-rotated td.rotate>div {
        -webkit-transform: translate(10px, 51px) rotate(270deg);
        transform: translate(10px, 51px) rotate(270deg);
        width: 20px;
    }

    .table-header-rotated td.rotate>div>span {

        padding: 5px 10px;
    }

    .table-header-rotated td.row-header {
        padding: 0 10px;
        border-bottom: 1px solid #ccc;
    }

    .table>tbody>tr>td {
        border: 1px solid #ccc;
    }
</style>
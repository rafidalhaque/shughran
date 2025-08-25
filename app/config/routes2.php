<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Framework routes
$route['default_controller'] = 'main';
$route['404_override'] = 'notify/error_404';
$route['translate_uri_dashes'] = TRUE;

// Shop routes
$route['shop'] = 'main';
$route['shop/search'] = 'shop/shop/search';
$route['shop/products'] = 'shop/shop/products';
$route['product/(:any)'] = 'shop/shop/product/$1';
$route['category/(:any)'] = 'shop/shop/products/$1';
$route['brand/(:any)'] = 'shop/shop/products/0/0/$1';
$route['category/(:any)/(:any)'] = 'shop/shop/products/$1/$2';

// Page route
$route['page/(:any)'] = 'shop/shop/page/$1';

// Cart routes
$route['cart'] = 'shop/cart_ajax';
$route['cart/(:any)'] = 'shop/cart_ajax/$1';
$route['cart/(:any)/(:any)'] = 'shop/cart_ajax/$1/$2';

// Misc routes
$route['shop/(:any)'] = 'shop/shop/$1';
$route['shop/(:any)/(:any)'] = 'shop/shop/$1/$2';
$route['shop/(:any)/(:any)/(:any)'] = 'shop/shop/$1/$2/$3';

// Auth routes
$route['login'] = 'main/login';
$route['logout'] = 'main/logout';
$route['profile'] = 'main/profile';
$route['register'] = 'main/register';
$route['login/(:any)'] = 'main/login/$1';
$route['logout/(:any)'] = 'main/logout/$1';
$route['profile/(:any)'] = 'main/profile/$1';
$route['forgot_password'] = 'main/forgot_password';
$route['activate/(:any)/(:any)'] = 'main/activate/$1/$2';
$route['reset_password/(:any)'] = 'main/reset_password/$1';

// Admin area routes
$route['admin'] = 'admin/welcome';
$route['admin/users'] = 'admin/auth/users';
$route['admin/users/create_user'] = 'admin/auth/create_user';
$route['admin/users/profile/(:num)'] = 'admin/auth/profile/$1';
$route['admin/login'] = 'admin/auth/login';
$route['admin/login/(:any)'] = 'admin/auth/login/$1';
$route['admin/logout'] = 'admin/auth/logout';
$route['admin/logout/(:any)'] = 'admin/auth/logout/$1';
// $route['admin/register'] = 'admin/auth/register';
$route['admin/forgot_password'] = 'admin/auth/forgot_password';
$route['admin/sales/(:num)'] = 'admin/sales/index/$1';
$route['admin/manpower/(:num)'] = 'admin/manpower/index/$1';
$route['admin/departmentsreport/(:num)'] = 'admin/departmentsreport/index/$1';
$route['admin/dawat/(:num)'] = 'admin/dawat/index/$1'; 
$route['admin/organization/(:num)'] = 'admin/organization/index/$1'; 
$route['admin/training/(:num)'] = 'admin/training/index/$1'; 
$route['admin/bm/(:num)'] = 'admin/bm/index/$1'; 
$route['admin/guest/(:num)'] = 'admin/guest/index/$1'; 
$route['admin/highersyllabus/(:num)'] = 'admin/highersyllabus/index/$1'; 
$route['admin/others/(:num)'] = 'admin/others/index/$1'; 
$route['admin/associate/(:num)'] = 'admin/associate/index/$1'; 
$route['admin/membercandidate/(:num)'] = 'admin/membercandidate/index/$1'; 
$route['admin/worker/(:num)'] = 'admin/worker/index/$1';

$route['admin/departmentsreport'] =  'admin/departmentsreport/index';

//$route['admin/departmentsreport'] = 'admin/departments_report/Literature/potrikar_grahok_briddi';

$route['admin/departmentsreport/potrikar-grahok-briddi'] = 'admin/departments_report/Literature/potrikar_grahok_briddi';
$route['admin/departmentsreport/potrikar-grahok-briddi/(:num)'] = 'admin/departments_report/Literature/potrikar_grahok_briddi/$1';

$route['admin/departmentsreport/shakhar-uddege-shahitto-prokash'] = 'admin/departments_report/Literature/shakhar_uddege_shahitto_prokash';
$route['admin/departmentsreport/shakhar-uddege-shahitto-prokash/(:num)'] = 'admin/departments_report/Literature/shakhar_uddege_shahitto_prokash/$1';

$route['admin/departmentsreport/sahitto-somporkito-dawati-program'] = 'admin/departments_report/Literature/sahitto_somporkito_dawati_program';
$route['admin/departmentsreport/sahitto-somporkito-dawati-program/(:num)'] = 'admin/departments_report/Literature/sahitto_somporkito_dawati_program/$1';

$route['admin/departmentsreport/sahitto-songothon-somporkito'] = 'admin/departments_report/Literature/sahitto_songothon_somporkito';
$route['admin/departmentsreport/sahitto-songothon-somporkito/(:num)'] = 'admin/departments_report/Literature/sahitto_songothon_somporkito/$1';

$route['admin/departmentsreport/sahitto-asor-somporkito'] = 'admin/departments_report/Literature/sahitto_asor_somporkito';
$route['admin/departmentsreport/sahitto-asor-somporkito/(:num)'] = 'admin/departments_report/Literature/sahitto_asor_somporkito/$1';


$route['admin/departmentsreport/sahitto-asorer-program'] = 'admin/departments_report/Literature/sahitto_asorer_program';
$route['admin/departmentsreport/sahitto-asorer-program/(:num)'] = 'admin/departments_report/Literature/sahitto_asorer_program/$1';


$route['admin/departmentsreport/lekhok-jogajog'] = 'admin/departments_report/Literature/lekhok_jogajog';
$route['admin/departmentsreport/lekhok-jogajog/(:num)'] = 'admin/departments_report/Literature/lekhok_jogajog/$1';


$route['admin/departmentsreport/output'] = 'admin/departments_report/Literature/output';
$route['admin/departmentsreport/output/(:num)'] = 'admin/departments_report/Literature/output/$1';


//international
$route['admin/departmentsreport/conference'] = 'admin/departments_report/International/conference';
$route['admin/departmentsreport/conference/(:num)'] = 'admin/departments_report/International/conference/$1';


$route['admin/departmentsreport/jonoshokti-vashasikkha-songkranto'] = 'admin/departments_report/International/jonoshokti_vashasikkha_songkranto';
$route['admin/departmentsreport/jonoshokti-vashasikkha-songkranto/(:num)'] = 'admin/departments_report/International/jonoshokti_vashasikkha_songkranto/$1';


$route['admin/departmentsreport/bideshe-oddhoyonroto-jonosoktir-talika'] = 'admin/departments_report/International/bideshe_oddhoyonroto_jonosoktir_talika';
$route['admin/departmentsreport/bideshe-oddhoyonroto-jonosoktir-talika/(:num)'] = 'admin/departments_report/International/bideshe_oddhoyonroto_jonosoktir_talika/$1';
$route['admin/departmentsreport/getHigherEducationManpower'] = 'admin/departments_report/International/getHigherEducationManpower';
$route['admin/departmentsreport/getHigherEducationManpower/(:num)'] = 'admin/departments_report/International/getHigherEducationManpower/$1';
$route['admin/departmentsreport/deleteHigherEducationManpower/(:num)'] = 'admin/departments_report/International/deleteHigherEducationManpower/$1';
$route['admin/departmentsreport/addhighereducationmanpower/(:num)'] = 'admin/departments_report/International/addhighereducationmanpower/$1';
 


$route['admin/departmentsreport/embassy-job'] = 'admin/departments_report/International/embassy_job';
$route['admin/departmentsreport/embassy-job/(:num)'] = 'admin/departments_report/International/embassy_job/$1';
$route['admin/departmentsreport/getEmbassyJob'] = 'admin/departments_report/International/getEmbassyJob';
$route['admin/departmentsreport/getEmbassyJob/(:num)'] = 'admin/departments_report/International/getEmbassyJob/$1';
$route['admin/departmentsreport/deleteEmbassyJob/(:num)'] = 'admin/departments_report/International/deleteEmbassyJob/$1';
$route['admin/departmentsreport/addembassyjob/(:num)'] = 'admin/departments_report/International/addembassyjob/$1';
 




$route['admin/departmentsreport/bideshe-oddhoyonroto-jonosoktir-talika-create'] = 'admin/departments_report/International/bideshe_oddhoyonroto_jonosoktir_talika_create';
$route['admin/departmentsreport/bideshe-oddhoyonroto-jonosoktir-talika-create/(:num)'] = 'admin/departments_report/International/bideshe_oddhoyonroto_jonosoktir_talika_create/$1';

$route['admin/departmentsreport/othersin'] = 'admin/departments_report/International/othersin';
$route['admin/departmentsreport/othersin/(:num)'] = 'admin/departments_report/International/othersin/$1';

//eduation
$route['admin/departmentsreport/ideal-home'] = 'admin/departments_report/Education/ideal_home';
$route['admin/departmentsreport/ideal-home/(:num)'] = 'admin/departments_report/Education/ideal_home/$1';

$route['admin/departmentsreport/motivational-program'] = 'admin/departments_report/Education/motivational_program';
$route['admin/departmentsreport/motivational-program/(:num)'] = 'admin/departments_report/Education/motivational_program/$1';

$route['admin/departmentsreport/academic-output'] = 'admin/departments_report/Education/academic_output';
$route['admin/departmentsreport/academic-output/(:num)'] = 'admin/departments_report/Education/academic_output/$1';

$route['admin/departmentsreport/professional-output01'] = 'admin/departments_report/Education/professional_output01';
$route['admin/departmentsreport/professional-output01/(:num)'] = 'admin/departments_report/Education/professional_output01/$1';

$route['admin/departmentsreport/professional-output02'] = 'admin/departments_report/Education/professional_output02';
$route['admin/departmentsreport/professional-output02/(:num)'] = 'admin/departments_report/Education/professional_output02/$1';

$route['admin/departmentsreport/professional-output03'] = 'admin/departments_report/Education/professional_output03';
$route['admin/departmentsreport/professional-output03/(:num)'] = 'admin/departments_report/Education/professional_output03/$1';

$route['admin/departmentsreport/professional-output04'] = 'admin/departments_report/Education/professional_output04';
$route['admin/departmentsreport/professional-output04/(:num)'] = 'admin/departments_report/Education/professional_output04/$1';

$route['admin/departmentsreport/professional-output05'] = 'admin/departments_report/Education/professional_output05';
$route['admin/departmentsreport/professional-output05/(:num)'] = 'admin/departments_report/Education/professional_output05/$1';

$route['admin/departmentsreport/shakha-niyontrito-amader-coaching'] = 'admin/departments_report/Education/shakha_niyontrito_amader_coaching';
$route['admin/departmentsreport/shakha-niyontrito-amader-coaching/(:num)'] = 'admin/departments_report/Education/shakha_niyontrito_amader_coaching/$1';

$route['admin/departmentsreport/medhabider-khoje-program'] = 'admin/departments_report/Education/medhabider_khoje_program';
$route['admin/departmentsreport/medhabider-khoje-program/(:num)'] = 'admin/departments_report/Education/medhabider_khoje_program/$1';

$route['admin/departmentsreport/protisthanvittik-jonosokti-oddhoyoner-porisonkhan'] = 'admin/departments_report/Education/protisthanvittik_jonosokti_oddhoyoner_porisonkhan';
$route['admin/departmentsreport/protisthanvittik-jonosokti-oddhoyoner-porisonkhan/(:num)'] = 'admin/departments_report/Education/protisthanvittik_jonosokti_oddhoyoner_porisonkhan/$1';

//madrasha

$route['admin/departmentsreport/ek-nojore-songothon'] = 'admin/departments_report/Madrasha/ek_nojore_songothon';
$route['admin/departmentsreport/ek-nojore-songothon/(:num)'] = 'admin/departments_report/Madrasha/ek_nojore_songothon/$1';

$route['admin/departmentsreport/program-list'] = 'admin/departments_report/Madrasha/program_list';
$route['admin/departmentsreport/program-list/(:num)'] = 'admin/departments_report/Madrasha/program_list/$1';

$route['admin/departmentsreport/islami-scholars-porisonkhan'] = 'admin/departments_report/Madrasha/islami_scholars_porisonkhan';
$route['admin/departmentsreport/islami-scholars-porisonkhan/(:num)'] = 'admin/departments_report/Madrasha/islami_scholars_porisonkhan/$1';

$route['admin/departmentsreport/ek-nojore-madrasha'] = 'admin/departments_report/Madrasha/ek_nojore_madrasha';
$route['admin/departmentsreport/ek-nojore-madrasha/(:num)'] = 'admin/departments_report/Madrasha/ek_nojore_madrasha/$1';

$route['admin/departmentsreport/jdc-folafol-porisonkhan'] = 'admin/departments_report/Madrasha/jdc_folafol_porisonkhan';
$route['admin/departmentsreport/jdc-folafol-porisonkhan/(:num)'] = 'admin/departments_report/Madrasha/jdc_folafol_porisonkhan/$1';

$route['admin/departmentsreport/dakhil-folafol-porisonkhan'] = 'admin/departments_report/Madrasha/dakhil_folafol_porisonkhan';
$route['admin/departmentsreport/dakhil-folafol-porisonkhan/(:num)'] = 'admin/departments_report/Madrasha/dakhil_folafol_porisonkhan/$1';

$route['admin/departmentsreport/alim-folafol-porisonkhan'] = 'admin/departments_report/Madrasha/alim_folafol_porisonkhan';
$route['admin/departmentsreport/alim-folafol-porisonkhan/(:num)'] = 'admin/departments_report/Madrasha/alim_folafol_porisonkhan/$1';

$route['admin/departmentsreport/fajil-folafol-porisonkhan'] = 'admin/departments_report/Madrasha/fajil_folafol_porisonkhan';
$route['admin/departmentsreport/fajil-folafol-porisonkhan/(:num)'] = 'admin/departments_report/Madrasha/fajil_folafol_porisonkhan/$1';

$route['admin/departmentsreport/kamil-folafol-porisonkhan'] = 'admin/departments_report/Madrasha/kamil_folafol_porisonkhan';
$route['admin/departmentsreport/kamil-folafol-porisonkhan/(:num)'] = 'admin/departments_report/Madrasha/kamil_folafol_porisonkhan/$1';

$route['admin/departmentsreport/qwami-folafol-porisonkhan'] = 'admin/departments_report/Madrasha/qwami_folafol_porisonkhan';
$route['admin/departmentsreport/qwami-folafol-porisonkhan/(:num)'] = 'admin/departments_report/Madrasha/qwami_folafol_porisonkhan/$1';

//Publicity
$route['admin/departmentsreport/jonoshokti'] = 'admin/departments_report/Publicity/jonoshokti';
$route['admin/departmentsreport/jonoshokti/(:num)'] = 'admin/departments_report/Publicity/jonoshokti/$1';

$route['admin/departmentsreport/online-activities'] = 'admin/departments_report/Publicity/online_activities';
$route['admin/departmentsreport/online-activities/(:num)'] = 'admin/departments_report/Publicity/online_activities/$1';

$route['admin/departmentsreport/nijeder-porichalito-online-news-media'] = 'admin/departments_report/Publicity/nijeder_porichalito_online_news_media';
$route['admin/departmentsreport/nijeder-porichalito-online-news-media/(:num)'] = 'admin/departments_report/Publicity/nijeder_porichalito_online_news_media/$1';

$route['admin/departmentsreport/sovasumoho'] = 'admin/departments_report/Publicity/sovasumoho';
$route['admin/departmentsreport/sovasumoho/(:num)'] = 'admin/departments_report/Publicity/sovasumoho/$1';

$route['admin/departmentsreport/publicity-jogajog'] = 'admin/departments_report/Publicity/jogajog';
$route['admin/departmentsreport/publicity-jogajog/(:num)'] = 'admin/departments_report/Publicity/jogajog/$1';

$route['admin/departmentsreport/soujonno-prodan'] = 'admin/departments_report/Publicity/soujonno_prodan';
$route['admin/departmentsreport/soujonno-prodan/(:num)'] = 'admin/departments_report/Publicity/soujonno_prodan/$1';

//College
$route['admin/departmentsreport/songothon'] = 'admin/departments_report/College/songothon';
$route['admin/departmentsreport/songothon/(:num)'] = 'admin/departments_report/College/songothon/$1';

$route['admin/departmentsreport/jonoshokti-dawat'] = 'admin/departments_report/College/jonoshokti_dawat';
$route['admin/departmentsreport/jonoshokti-dawat/(:num)'] = 'admin/departments_report/College/jonoshokti_dawat/$1';

$route['admin/departmentsreport/hsc-folafol-porisonkhan'] = 'admin/departments_report/College/hsc_folafol_porisonkhan';
$route['admin/departmentsreport/hsc-folafol-porisonkhan/(:num)'] = 'admin/departments_report/College/hsc_folafol_porisonkhan/$1';

$route['admin/departmentsreport/bissobiddyaloy-vorti'] = 'admin/departments_report/College/bissobiddyaloy_vorti';
$route['admin/departmentsreport/bissobiddyaloy-vorti/(:num)'] = 'admin/departments_report/College/bissobiddyaloy_vorti/$1';

//chatro andolon

$route['admin/departmentsreport/jogajog'] = 'admin/departments_report/ChatroAndolon/jogajog';
$route['admin/departmentsreport/jogajog/(:num)'] = 'admin/departments_report/ChatroAndolon/jogajog/$1';

$route['admin/departmentsreport/parsho-songothon-songkranto'] = 'admin/departments_report/ChatroAndolon/parsho_songothon_songkranto';
$route['admin/departmentsreport/parsho-songothon-songkranto/(:num)'] = 'admin/departments_report/ChatroAndolon/parsho_songothon_songkranto/$1';

//media

$route['admin/departmentsreport/parsho-songothon-songkranto'] = 'admin/departments_report/ChatroAndolon/parsho_songothon_songkranto';
$route['admin/departmentsreport/parsho-songothon-songkranto/(:num)'] = 'admin/departments_report/ChatroAndolon/parsho_songothon_songkranto/$1';

//debate

$route['admin/departmentsreport/bitorko-bivage-niyojito-jonoshokti'] = 'admin/departments_report/Debate/bitorko_bivage_niyojito_jonoshokti';
$route['admin/departmentsreport/bitorko-bivage-niyojito-jonoshokti/(:num)'] = 'admin/departments_report/Debate/bitorko_bivage_niyojito_jonoshokti/$1';

$route['admin/departmentsreport/bitorko-jonosokti'] = 'admin/departments_report/Debate/bitorko_jonosokti';
$route['admin/departmentsreport/bitorko-jonosokti/(:num)'] = 'admin/departments_report/Debate/bitorko_jonosokti/$1';

$route['admin/departmentsreport/bitorko-club-biboron'] = 'admin/departments_report/Debate/bitorko_club_biboron';
$route['admin/departmentsreport/bitorko-club-biboron/(:num)'] = 'admin/departments_report/Debate/bitorko_club_biboron/$1';

$route['admin/departmentsreport/program-sumoho'] = 'admin/departments_report/Debate/program_sumoho';
$route['admin/departmentsreport/program-sumoho/(:num)'] = 'admin/departments_report/Debate/program_sumoho/$1';

$route['admin/departmentsreport/bitorko-bivag-yearly-plan'] = 'admin/departments_report/Debate/bitorko_bivag_yearly_plan';
$route['admin/departmentsreport/bitorko-bivag-yearly-plan/(:num)'] = 'admin/departments_report/Debate/bitorko_bivag_yearly_plan/$1';

//Information

$route['admin/departmentsreport/nijer-shakha-theke-prokashito'] = 'admin/departments_report/Information/nijer_shakha_theke_prokashito';
$route['admin/departmentsreport/nijer-shakha-theke-prokashito/(:num)'] = 'admin/departments_report/Information/nijer_shakha_theke_prokashito/$1';

$route['admin/departmentsreport/chobi-songroho'] = 'admin/departments_report/Information/chobi_songroho';
$route['admin/departmentsreport/chobi-songroho/(:num)'] = 'admin/departments_report/Information/chobi_songroho/$1';

$route['admin/departmentsreport/potrika-online-cutting'] = 'admin/departments_report/Information/potrika_online_cutting';
$route['admin/departmentsreport/potrika-online-cutting/(:num)'] = 'admin/departments_report/Information/potrika_online_cutting/$1';

$route['admin/departmentsreport/vedio-songrokkhon'] = 'admin/departments_report/Information/vedio_songrokkhon';
$route['admin/departmentsreport/vedio-songrokkhon/(:num)'] = 'admin/departments_report/Information/vedio_songrokkhon/$1';

$route['admin/departmentsreport/karjokari-songrokkhon'] = 'admin/departments_report/Information/karjokari_songrokkhon';
$route['admin/departmentsreport/karjokari-songrokkhon/(:num)'] = 'admin/departments_report/Information/karjokari_songrokkhon/$1';

$route['admin/departmentsreport/shahid-info-bornona'] = 'admin/departments_report/Information/shahid_info_bornona';
$route['admin/departmentsreport/shahid-info-bornona/(:num)'] = 'admin/departments_report/Information/shahid_info_bornona/$1';

$route['admin/departmentsreport/apnar-shakhay-songroho'] = 'admin/departments_report/Information/apnar_shakhay_songroho';
$route['admin/departmentsreport/apnar-shakhay-songroho/(:num)'] = 'admin/departments_report/Information/apnar_shakhay_songroho/$1';

//social

$route['admin/departmentsreport/social-program'] = 'admin/departments_report/Social/social_program';
$route['admin/departmentsreport/social-program/(:num)'] = 'admin/departments_report/Social/social_program/$1';

$route['admin/departmentsreport/roktodata-songothon'] = 'admin/departments_report/Social/roktodata_songothon';
$route['admin/departmentsreport/roktodata-songothon/(:num)'] = 'admin/departments_report/Social/roktodata_songothon/$1';

$route['admin/departmentsreport/sakkhorota-ovijan'] = 'admin/departments_report/Social/sakkhorota_ovijan';
$route['admin/departmentsreport/sakkhorota-ovijan/(:num)'] = 'admin/departments_report/Social/sakkhorota_ovijan/$1';

$route['admin/departmentsreport/tree-plantation-ovijan'] = 'admin/departments_report/Social/tree_plantation_ovijan';
$route['admin/departmentsreport/tree-plantation-ovijan/(:num)'] = 'admin/departments_report/Social/tree_plantation_ovijan/$1';

$route['admin/departmentsreport/shitbostro-bitoron'] = 'admin/departments_report/Social/shitbostro_bitoron';
$route['admin/departmentsreport/shitbostro-bitoron/(:num)'] = 'admin/departments_report/Social/shitbostro_bitoron/$1';



$route['admin/departmentsreport/register-non-register'] = 'admin/departments_report/Social/register_non_register';
$route['admin/departmentsreport/register-non-register/(:num)'] = 'admin/departments_report/Social/register_non_register/$1';
$route['admin/departmentsreport/getSocialOrganization'] = 'admin/departments_report/Social/getSocialOrganization';
$route['admin/departmentsreport/getSocialOrganization/(:num)'] = 'admin/departments_report/Social/getSocialOrganization/$1';
$route['admin/departmentsreport/deleteSocialOrganization/(:num)'] = 'admin/departments_report/Social/deleteSocialOrganization/$1';
$route['admin/departmentsreport/addsocialorganization/(:num)'] = 'admin/departments_report/Social/addsocialorganization/$1';









//Research

$route['admin/departmentsreport/research-jonoshokti'] = 'admin/departments_report/Research/research_jonoshokti';
$route['admin/departmentsreport/research-jonoshokti/(:num)'] = 'admin/departments_report/Research/research_jonoshokti/$1';

$route['admin/departmentsreport/niyomito-program'] = 'admin/departments_report/Research/niyomito_program';
$route['admin/departmentsreport/niyomito-program/(:num)'] = 'admin/departments_report/Research/niyomito_program/$1';

$route['admin/departmentsreport/bishesh-program'] = 'admin/departments_report/Research/bishesh_program';
$route['admin/departmentsreport/bishesh-program/(:num)'] = 'admin/departments_report/Research/bishesh_program/$1';

$route['admin/departmentsreport/research-jogajog'] = 'admin/departments_report/Research/research_jogajog';
$route['admin/departmentsreport/research-jogajog/(:num)'] = 'admin/departments_report/Research/research_jogajog/$1';

$route['admin/departmentsreport/lekhalekhi-prokashona'] = 'admin/departments_report/Research/lekhalekhi_prokashona';
$route['admin/departmentsreport/lekhalekhi-prokashona/(:num)'] = 'admin/departments_report/Research/lekhalekhi_prokashona/$1';

//Culture

$route['admin/departmentsreport/culture-jonoshokti'] = 'admin/departments_report/Culture/culture_jonoshokti';
$route['admin/departmentsreport/culture-jonoshokti/(:num)'] = 'admin/departments_report/Culture/culture_jonoshokti/$1';

$route['admin/departmentsreport/culture-dawat'] = 'admin/departments_report/Culture/culture_dawat';
$route['admin/departmentsreport/culture-dawat/(:num)'] = 'admin/departments_report/Culture/culture_dawat/$1';

$route['admin/departmentsreport/culture-sovasumoho'] = 'admin/departments_report/Culture/culture_sovasumoho';
$route['admin/departmentsreport/culture-sovasumoho/(:num)'] = 'admin/departments_report/Culture/culture_sovasumoho/$1';

$route['admin/departmentsreport/culture-songothon'] = 'admin/departments_report/Culture/culture_songothon';
$route['admin/departmentsreport/culture-songothon/(:num)'] = 'admin/departments_report/Culture/culture_songothon/$1';

$route['admin/departmentsreport/culture-jogajog'] = 'admin/departments_report/Culture/culture_jogajog';
$route['admin/departmentsreport/culture-jogajog/(:num)'] = 'admin/departments_report/Culture/culture_jogajog/$1';

$route['admin/departmentsreport/culture-prokashona'] = 'admin/departments_report/Culture/culture_prokashona';
$route['admin/departmentsreport/culture-prokashona/(:num)'] = 'admin/departments_report/Culture/culture_prokashona/$1';

$route['admin/departmentsreport/niyomito-proshikkhon'] = 'admin/departments_report/Culture/niyomito_proshikkhon';
$route['admin/departmentsreport/niyomito-proshikkhon/(:num)'] = 'admin/departments_report/Culture/niyomito_proshikkhon/$1';

$route['admin/departmentsreport/culture-kormoshala'] = 'admin/departments_report/Culture/culture_kormoshala';
$route['admin/departmentsreport/culture-kormoshala/(:num)'] = 'admin/departments_report/Culture/culture_kormoshala/$1';

$route['admin/departmentsreport/culture-poribeshona'] = 'admin/departments_report/Culture/culture_poribeshona';
$route['admin/departmentsreport/culture-poribeshona/(:num)'] = 'admin/departments_report/Culture/culture_poribeshona/$1';

$route['admin/departmentsreport/it-prochar-media'] = 'admin/departments_report/Culture/it_prochar_media';
$route['admin/departmentsreport/it-prochar-media/(:num)'] = 'admin/departments_report/Culture/it_prochar_media/$1';

$route['admin/departmentsreport/bishesh-karjokrom'] = 'admin/departments_report/Culture/bishesh_karjokrom';
$route['admin/departmentsreport/bishesh-karjokrom/(:num)'] = 'admin/departments_report/Culture/bishesh_karjokrom/$1';

$route['admin/departmentsreport/output-report'] = 'admin/departments_report/Culture/output_report';
$route['admin/departmentsreport/output-report/(:num)'] = 'admin/departments_report/Culture/output_report/$1';

//Library

$route['admin/departmentsreport/pathagar-briddhi-ghatti'] = 'admin/departments_report/Library/pathagar_briddhi_ghatti';
$route['admin/departmentsreport/pathagar-briddhi-ghatti/(:num)'] = 'admin/departments_report/Library/pathagar_briddhi_ghatti/$1';
$route['admin/departmentsreport/getLibraryIncreaseDecrease'] = 'admin/departments_report/Library/getLibraryIncreaseDecrease';
$route['admin/departmentsreport/getLibraryIncreaseDecrease/(:num)'] = 'admin/departments_report/Library/getLibraryIncreaseDecrease/$1';
$route['admin/departmentsreport/deleteLibraryIncreaseDecrease/(:num)'] = 'admin/departments_report/Library/deleteLibraryIncreaseDecrease/$1';
$route['admin/departmentsreport/addlibraryincreasedecrease/(:num)'] = 'admin/departments_report/Library/addlibraryincreasedecrease/$1';






$route['admin/departmentsreport/sticker-lagano'] = 'admin/departments_report/Library/sticker_lagano';
$route['admin/departmentsreport/sticker-lagano/(:num)'] = 'admin/departments_report/Library/sticker_lagano/$1';

$route['admin/departmentsreport/foundation-info'] = 'admin/departments_report/Foundation/foundation_info';
$route['admin/departmentsreport/foundation-info/(:num)'] = 'admin/departments_report/Foundation/foundation_info/$1';
$route['admin/departmentsreport/getFoundationInfo'] = 'admin/departments_report/Foundation/getFoundationInfo';
$route['admin/departmentsreport/getFoundationInfo/(:num)'] = 'admin/departments_report/Foundation/getFoundationInfo/$1';
$route['admin/departmentsreport/deleteFoundationInfo/(:num)'] = 'admin/departments_report/Foundation/deleteFoundationInfo/$1';
$route['admin/departmentsreport/addfoundationinfo/(:num)'] = 'admin/departments_report/Foundation/addfoundationinfo/$1';







$route['admin/departmentsreport/guide-coaching'] = 'admin/departments_report/Library/guide_coaching';
$route['admin/departmentsreport/guide-coaching/(:num)'] = 'admin/departments_report/Library/guide_coaching/$1';

//Law

$route['admin/departmentsreport/bipokkhe-mamla'] = 'admin/departments_report/Law/bipokkhe_mamla';
$route['admin/departmentsreport/bipokkhe-mamla/(:num)'] = 'admin/departments_report/Law/bipokkhe_mamla/$1';

$route['admin/departmentsreport/guruttopurno-mamlar-info'] = 'admin/departments_report/Law/guruttopurno_mamlar_info';
$route['admin/departmentsreport/guruttopurno-mamlar-info/(:num)'] = 'admin/departments_report/Law/guruttopurno_mamlar_info/$1';

$route['admin/departmentsreport/khalas-songkranto-info'] = 'admin/departments_report/Law/khalas_songkranto_info';
$route['admin/departmentsreport/khalas-songkranto-info/(:num)'] = 'admin/departments_report/Law/khalas_songkranto_info/$1';

$route['admin/departmentsreport/karagar-songkranto'] = 'admin/departments_report/Law/karagar_songkranto';
$route['admin/departmentsreport/karagar-songkranto/(:num)'] = 'admin/departments_report/Law/karagar_songkranto/$1';

$route['admin/departmentsreport/pokkhe-mamla'] = 'admin/departments_report/Law/pokkhe_mamla';
$route['admin/departmentsreport/pokkhe-mamla/(:num)'] = 'admin/departments_report/Law/pokkhe_mamla/$1';

$route['admin/departmentsreport/potrikay-prochar-songkranto'] = 'admin/departments_report/Law/potrikay_prochar_songkranto';
$route['admin/departmentsreport/potrikay-prochar-songkranto/(:num)'] = 'admin/departments_report/Law/potrikay_prochar_songkranto/$1';

//science

$route['admin/departmentsreport/science-jonoshokti'] = 'admin/departments_report/Science/science_jonoshokti';
$route['admin/departmentsreport/science-jonoshokti/(:num)'] = 'admin/departments_report/Science/science_jonoshokti/$1';

$route['admin/departmentsreport/science-somporkito'] = 'admin/departments_report/Science/science_somporkito';
$route['admin/departmentsreport/science-somporkito/(:num)'] = 'admin/departments_report/Science/science_somporkito/$1';

$route['admin/departmentsreport/ucchoshikkha-somporkito'] = 'admin/departments_report/Science/ucchoshikkha_somporkito';
$route['admin/departmentsreport/ucchoshikkha-somporkito/(:num)'] = 'admin/departments_report/Science/ucchoshikkha_somporkito/$1';

$route['admin/departmentsreport/bigyan-magazine-songkranto'] = 'admin/departments_report/Science/bigyan_magazine_songkranto';
$route['admin/departmentsreport/bigyan-magazine-songkranto/(:num)'] = 'admin/departments_report/Science/bigyan_magazine_songkranto/$1';
$route['admin/departmentsreport/getScienceMagazine'] = 'admin/departments_report/Science/getScienceMagazine';
$route['admin/departmentsreport/getScienceMagazine/(:num)'] = 'admin/departments_report/Science/getScienceMagazine/$1';
$route['admin/departmentsreport/deleteScienceMagazine/(:num)'] = 'admin/departments_report/Science/deleteScienceMagazine/$1';
$route['admin/departmentsreport/addsciencemagazine/(:num)'] = 'admin/departments_report/Science/addsciencemagazine/$1';
 




$route['admin/departmentsreport/science-club'] = 'admin/departments_report/Science/science_club';
$route['admin/departmentsreport/science-club/(:num)'] = 'admin/departments_report/Science/science_club/$1';

$route['admin/departmentsreport/bishesh-program-report'] = 'admin/departments_report/Science/bishesh_program_report';
$route['admin/departmentsreport/bishesh-program-report/(:num)'] = 'admin/departments_report/Science/bishesh_program_report/$1';

$route['admin/departmentsreport/academic-sohojogita'] = 'admin/departments_report/Science/academic_sohojogita';
$route['admin/departmentsreport/academic-sohojogita/(:num)'] = 'admin/departments_report/Science/academic_sohojogita/$1';

//It

$route['admin/departmentsreport/it-jonoshokti'] = 'admin/departments_report/It/it_jonoshokti';
$route['admin/departmentsreport/it-jonoshokti/(:num)'] = 'admin/departments_report/It/it_jonoshokti/$1';

$route['admin/departmentsreport/shakhar-online-resource'] = 'admin/departments_report/It/shakhar_online_resource';
$route['admin/departmentsreport/shakhar-online-resource/(:num)'] = 'admin/departments_report/It/shakhar_online_resource/$1';

$route['admin/departmentsreport/it-proshikkhon'] = 'admin/departments_report/It/it_proshikkhon';
$route['admin/departmentsreport/it-proshikkhon/(:num)'] = 'admin/departments_report/It/it_proshikkhon/$1';

//sports

$route['admin/departmentsreport/tournament-songkranto'] = 'admin/departments_report/Sports/tournament_songkranto';
$route['admin/departmentsreport/tournament-songkranto/(:num)'] = 'admin/departments_report/Sports/tournament_songkranto/$1';

$route['admin/departmentsreport/sports-songkranto'] = 'admin/departments_report/Sports/sports_sonkranto';
$route['admin/departmentsreport/sports-songkranto/(:num)'] = 'admin/departments_report/Sports/sports_sonkranto/$1';

$route['admin/departmentsreport/sports-songothon-sonkranto'] = 'admin/departments_report/Sports/sports_songothon_sonkranto';
$route['admin/departmentsreport/sports-songothon-sonkranto/(:num)'] = 'admin/departments_report/Sports/sports_songothon_sonkranto/$1';

$route['admin/departmentsreport/team-sonkranto'] = 'admin/departments_report/Sports/team_sonkranto';
$route['admin/departmentsreport/team-sonkranto/(:num)'] = 'admin/departments_report/Sports/team_sonkranto/$1';

//dawah

$route['admin/departmentsreport/quran-sikkha-report'] = 'admin/departments_report/Dawah/quran_sikkha_report';
$route['admin/departmentsreport/quran-sikkha-report/(:num)'] = 'admin/departments_report/Dawah/quran_sikkha_report/$1';

$route['admin/departmentsreport/dawati-barer-report'] = 'admin/departments_report/Dawah/dawati_barer_report';
$route['admin/departmentsreport/dawati-barer-report/(:num)'] = 'admin/departments_report/Dawah/dawati_barer_report/$1';

$route['admin/departmentsreport/bhinno-dhormalombi-dawat'] = 'admin/departments_report/Dawah/bhinno_dhormalombi_dawat';
$route['admin/departmentsreport/bhinno-dhormalombi-dawat/(:num)'] = 'admin/departments_report/Dawah/bhinno_dhormalombi_dawat/$1';

$route['admin/departmentsreport/dawati-group-songkranto'] = 'admin/departments_report/Dawah/dawati_group_songkranto';
$route['admin/departmentsreport/dawati-group-songkranto/(:num)'] = 'admin/departments_report/Dawah/dawati_group_songkranto/$1';

$route['admin/departmentsreport/dawah-sovasumoho'] = 'admin/departments_report/Dawah/dawah_sovasumoho';
$route['admin/departmentsreport/dawah-sovasumoho/(:num)'] = 'admin/departments_report/Dawah/dawah_sovasumoho/$1';

$route['admin/departmentsreport/dawah-prokashona'] = 'admin/departments_report/Dawah/dawah_prokashona';
$route['admin/departmentsreport/dawah-prokashona/(:num)'] = 'admin/departments_report/Dawah/dawah_prokashona/$1';

$route['admin/departmentsreport/dawah-jogajog'] = 'admin/departments_report/Dawah/dawah_jogajog';
$route['admin/departmentsreport/dawah-jogajog/(:num)'] = 'admin/departments_report/Dawah/dawah_jogajog/$1';

//School

$route['admin/departmentsreport/jsc-folafol-porisonkhan'] = 'admin/departments_report/School/jsc_folafol_porisonkhan';
$route['admin/departmentsreport/jsc-folafol-porisonkhan/(:num)'] = 'admin/departments_report/School/jsc_folafol_porisonkhan/$1';

$route['admin/departmentsreport/ssc-folafol-porisonkhan'] = 'admin/departments_report/School/ssc_folafol_porisonkhan';
$route['admin/departmentsreport/ssc-folafol-porisonkhan/(:num)'] = 'admin/departments_report/School/ssc_folafol_porisonkhan/$1';

//school karjokrom bivag

$route['admin/departmentsreport/school-karjokrom-bivag'] = 'admin/departments_report/SchoolKarjokrom/school_karjokrom_bivag';
$route['admin/departmentsreport/school-karjokrom-bivag/(:num)'] = 'admin/departments_report/SchoolKarjokrom/school_karjokrom_bivag/$1';


//Others

$route['admin/departmentsreport/sangothonik-sofor-sonkranto'] = 'admin/departments_report/Others/sangothonik_sofor_sonkranto';
$route['admin/departmentsreport/sangothonik-sofor-sonkranto/(:num)'] = 'admin/departments_report/Others/sangothonik_sofor_sonkranto/$1';

$route['admin/departmentsreport/brriddhi-shakha-nam'] = 'admin/departments_report/Others/brriddhi_shakha_nam';
$route['admin/departmentsreport/brriddhi-shakha-nam/(:num)'] = 'admin/departments_report/Others/brriddhi_shakha_nam/$1';
$route['admin/departmentsreport/getIncreasedBranch'] = 'admin/departments_report/Others/getIncreasedBranch';
$route['admin/departmentsreport/getIncreasedBranch/(:num)'] = 'admin/departments_report/Others/getIncreasedBranch/$1';
$route['admin/departmentsreport/deleteIncreasedBranch/(:num)'] = 'admin/departments_report/Others/deleteIncreasedBranch/$1';
$route['admin/departmentsreport/addincreasedbranch/(:num)'] = 'admin/departments_report/Others/addincreasedbranch/$1';
 

$route['admin/departmentsreport/ghatti-shakha-nam'] = 'admin/departments_report/Others/ghatti_shakha_nam';
$route['admin/departmentsreport/ghatti-shakha-nam/(:num)'] = 'admin/departments_report/Others/ghatti_shakha_nam/$1';
$route['admin/departmentsreport/getDecreasedBranch'] = 'admin/departments_report/Others/getDecreasedBranch';
$route['admin/departmentsreport/getDecreasedBranch/(:num)'] = 'admin/departments_report/Others/getDecreasedBranch/$1';
$route['admin/departmentsreport/deleteDecreasedBranch/(:num)'] = 'admin/departments_report/Others/deleteDecreasedBranch/$1';
$route['admin/departmentsreport/adddecreasedbranch/(:num)'] = 'admin/departments_report/Others/adddecreasedbranch/$1';
 

$route['admin/departmentsreport/songothon-gahtti'] = 'admin/departments_report/Others/songothon_gahtti';
$route['admin/departmentsreport/songothon-gahtti/(:num)'] = 'admin/departments_report/Others/songothon_gahtti/$1';
$route['admin/departmentsreport/getDeficitOrgInstitute'] = 'admin/departments_report/Others/getDeficitOrgInstitute';
$route['admin/departmentsreport/getDeficitOrgInstitute/(:num)'] = 'admin/departments_report/Others/getDeficitOrgInstitute/$1';
$route['admin/departmentsreport/deleteDeficitOrgInstitute/(:num)'] = 'admin/departments_report/Others/deleteDeficitOrgInstitute/$1';
$route['admin/departmentsreport/adddeficitorginstitute/(:num)'] = 'admin/departments_report/Others/adddeficitorginstitute/$1';




$route['admin/departmentsreport/uposhakha-mojbutikoron'] = 'admin/departments_report/Others/uposhakha_mojbutikoron';
$route['admin/departmentsreport/uposhakha-mojbutikoron/(:num)'] = 'admin/departments_report/Others/uposhakha_mojbutikoron/$1';




$route['admin/departmentsreport/uposhakha-briddhi'] = 'admin/departments_report/Others/uposhakha_briddhi';
$route['admin/departmentsreport/uposhakha-briddhi/(:num)'] = 'admin/departments_report/Others/uposhakha_briddhi/$1';
$route['admin/departmentsreport/getIncreasedSubBranch'] = 'admin/departments_report/Others/getIncreasedSubBranch';
$route['admin/departmentsreport/getIncreasedSubBranch/(:num)'] = 'admin/departments_report/Others/getIncreasedSubBranch/$1';
$route['admin/departmentsreport/deleteIncreasedSubBranch/(:num)'] = 'admin/departments_report/Others/deleteIncreasedSubBranch/$1';
$route['admin/departmentsreport/addincreasedsubbranch/(:num)'] = 'admin/departments_report/Others/addincreasedsubbranch/$1';
 







$route['admin/departmentsreport/uposhakha-ghatti'] = 'admin/departments_report/Others/uposhakha_ghatti';
$route['admin/departmentsreport/uposhakha-ghatti/(:num)'] = 'admin/departments_report/Others/uposhakha_ghatti/$1';
$route['admin/departmentsreport/getDecreasedSubBranch'] = 'admin/departments_report/Others/getDecreasedSubBranch';
$route['admin/departmentsreport/getDecreasedSubBranch/(:num)'] = 'admin/departments_report/Others/getDecreasedSubBranch/$1';
$route['admin/departmentsreport/deleteDecreasedSubBranch/(:num)'] = 'admin/departments_report/Others/deleteDecreasedSubBranch/$1';
$route['admin/departmentsreport/adddecreasedsubbranch/(:num)'] = 'admin/departments_report/Others/adddecreasedsubbranch/$1';
 







$route['admin/departmentsreport/week-pokkho-report'] = 'admin/departments_report/Others/week_pokkho_report';
$route['admin/departmentsreport/week-pokkho-report/(:num)'] = 'admin/departments_report/Others/week_pokkho_report/$1';

$route['admin/departmentsreport/library-book-branch-report'] = 'admin/departments_report/Others/library_book_branch_report';
$route['admin/departmentsreport/library-book-branch-report/(:num)'] = 'admin/departments_report/Others/library_book_branch_report/$1';

$route['admin/departmentsreport/chatro-songsod-nirbachon'] = 'admin/departments_report/Others/chatro_songsod_nirbachon';
$route['admin/departmentsreport/chatro-songsod-nirbachon/(:num)'] = 'admin/departments_report/Others/chatro_songsod_nirbachon/$1';
$route['admin/departmentsreport/getStudentUnionElection'] = 'admin/departments_report/Others/getStudentUnionElection';
$route['admin/departmentsreport/getStudentUnionElection/(:num)'] = 'admin/departments_report/Others/getStudentUnionElection/$1';
$route['admin/departmentsreport/deleteStudentUnionElection/(:num)'] = 'admin/departments_report/Others/deleteStudentUnionElection/$1';
$route['admin/departmentsreport/addstudentunionelection/(:num)'] = 'admin/departments_report/Others/addstudentunionelection/$1';
 

//sma_other_student_union_election/



$route['admin/departmentsreport/porishodbrinder-sofor-report'] = 'admin/departments_report/Others/porishodbrinder_sofor_report';
$route['admin/departmentsreport/porishodbrinder-sofor-report/(:num)'] = 'admin/departments_report/Others/porishodbrinder_sofor_report/$1';

$route['admin/departmentsreport/porishodbrinder-sofor-report'] = 'admin/departments_report/Others/porishodbrinder_sofor_report';
$route['admin/departmentsreport/porishodbrinder-sofor-report/(:num)'] = 'admin/departments_report/Others/porishodbrinder_sofor_report/$1';

$route['admin/departmentsreport/sabek-sofor-report'] = 'admin/departments_report/Others/sabek_sofor_report';
$route['admin/departmentsreport/sabek-sofor-report/(:num)'] = 'admin/departments_report/Others/sabek_sofor_report/$1';






//media
$route['admin/departmentsreport/media-jonosokti'] = 'admin/departments_report/Media/media_jonosokti';
$route['admin/departmentsreport/media-jonosokti/(:num)'] = 'admin/departments_report/Media/media_jonosokti/$1';

$route['admin/departmentsreport/media-briddhi'] = 'admin/departments_report/Media/media_briddhi';
$route['admin/departmentsreport/media-briddhi/(:num)'] = 'admin/departments_report/Media/media_briddhi/$1';

$route['admin/departmentsreport/media-jogajog'] = 'admin/departments_report/Media/media_jogajog';
$route['admin/departmentsreport/media-jogajog/(:num)'] = 'admin/departments_report/Media/media_jogajog/$1';

$route['admin/departmentsreport/media-sovasumoho-proshikkhon'] = 'admin/departments_report/Media/media_sovasumoho_proshikkhon';
$route['admin/departmentsreport/media-sovasumoho-proshikkhon/(:num)'] = 'admin/departments_report/Media/media_sovasumoho_proshikkhon/$1';

$route['admin/departmentsreport/electric-print-online'] = 'admin/departments_report/Media/electric_print_online';
$route['admin/departmentsreport/electric-print-online/(:num)'] = 'admin/departments_report/Media/electric_print_online/$1';
$route['admin/departmentsreport/getAllMedia'] = 'admin/departments_report/Media/getAllMedia';
$route['admin/departmentsreport/getAllMedia/(:num)'] = 'admin/departments_report/Media/getAllMedia/$1';
$route['admin/departmentsreport/deleteAllMedia/(:num)'] = 'admin/departments_report/Media/deleteAllMedia/$1';
$route['admin/departmentsreport/addallmedia/(:num)'] = 'admin/departments_report/Media/addallmedia/$1';
 







$route['admin/departmentsreport/eknojore-requirement'] = 'admin/departments_report/Media/eknojore_requirement';
$route['admin/departmentsreport/eknojore-requirement/(:num)'] = 'admin/departments_report/Media/eknojore_requirement/$1';

//chatro kollan

$route['admin/departmentsreport/chatrokollan-porisonkhan'] = 'admin/departments_report/Chatrokollan/chatrokollan_porisonkhan';
$route['admin/departmentsreport/chatrokollan-porisonkhan/(:num)'] = 'admin/departments_report/Chatrokollan/chatrokollan_porisonkhan/$1';

$route['admin/departmentsreport/chatrokollan-sahajjo'] = 'admin/departments_report/Chatrokollan/chatrokollan_sahajjo';
$route['admin/departmentsreport/chatrokollan-sahajjo/(:num)'] = 'admin/departments_report/Chatrokollan/chatrokollan_sahajjo/$1';

//manobadhikar songothon

$route['admin/departmentsreport/manobadhikar-songothon-protistha'] = 'admin/departments_report/Manobadhikar/manobadhikar_songothon_protistha';
$route['admin/departmentsreport/manobadhikar-songothon-protistha/(:num)'] = 'admin/departments_report/Manobadhikar/manobadhikar_songothon_protistha/$1';

$route['admin/departmentsreport/manobadhikar-program'] = 'admin/departments_report/Manobadhikar/manobadhikar_program';
$route['admin/departmentsreport/manobadhikar-program/(:num)'] = 'admin/departments_report/Manobadhikar/manobadhikar_program/$1';

$route['admin/departmentsreport/manobadhikar-longhon-porisonkhan'] = 'admin/departments_report/Manobadhikar/manobadhikar_longhon_porisonkhan';
$route['admin/departmentsreport/manobadhikar-longhon-porisonkhan/(:num)'] = 'admin/departments_report/Manobadhikar/manobadhikar_longhon_porisonkhan/$1';





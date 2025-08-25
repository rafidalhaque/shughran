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

$route['admin/manpowerlist/(:num)'] = 'admin/manpowerlist/index/$1';

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

//poriklpona-bivag
$route['admin/departmentsreport/poriklpona-bivag']='admin/departments_report/Poriklpona/poriklpona_bivag';
$route['admin/departmentsreport/poriklpona-bivag/(:num)']='admin/departments_report/Poriklpona/poriklpona_bivag/$1';

//Literature
$route['admin/departmentsreport/delete-row'] = 'admin/departments_report/literature/delete_row';
$route['admin/departmentsreportdetailupdate'] = 'admin/departments_report/literature/detailupdate';
$route['admin/departmentsreport/detailupdate2'] = 'admin/departments_report/literature/detailupdate2';

$route['admin/departmentsreport/add-literature-publication/(:num)'] = 'admin/departments_report/literature/add_literature_publication/$1';

$route['admin/departmentsreport/add-literature-songothon/(:num)'] = 'admin/departments_report/literature/add_literature_songothon/$1';

$route['admin/departmentsreport/literature-page-one'] = 'admin/departments_report/literature/literature_page_one';
$route['admin/departmentsreport/literature-page-one/(:num)'] = 'admin/departments_report/literature/literature_page_one/$1';

$route['admin/departmentsreport/literature-page-two'] = 'admin/departments_report/Literature/literature_page_two';
$route['admin/departmentsreport/literature-page-two/(:num)'] = 'admin/departments_report/Literature/literature_page_two/$1';


//international
$route['admin/departmentsreport/add-international-bideshe-study/(:num)'] = 'admin/departments_report/International/add_international_bideshe_study/$1';
$route['admin/departmentsreport/add-international-language-interested/(:num)'] = 'admin/departments_report/International/add_international_language_interested/$1';
$route['admin/departmentsreport/add-international-manpower-course/(:num)'] = 'admin/departments_report/International/add_international_manpower_course/$1';
$route['admin/departmentsreport/add-international-shabek-embassy/(:num)'] = 'admin/departments_report/International/add_international_shabek_embassy/$1';

$route['admin/departmentsreport/international-page-one'] = 'admin/departments_report/International/international_page_one';
$route['admin/departmentsreport/international-page-one/(:num)'] = 'admin/departments_report/International/international_page_one/$1';

$route['admin/departmentsreport/international-page-two'] = 'admin/departments_report/International/international_page_two';
$route['admin/departmentsreport/international-page-two/(:num)'] = 'admin/departments_report/International/international_page_two/$1';

//eduation 
$route['admin/departmentsreport/shikha-page-one'] = 'admin/departments_report/Education/shikha_page_one';
$route['admin/departmentsreport/shikha-page-one/(:num)'] = 'admin/departments_report/Education/shikha_page_one/$1';

$route['admin/departmentsreport/shikha-page-two'] = 'admin/departments_report/Education/shikha_page_two';
$route['admin/departmentsreport/shikha-page-two/(:num)'] = 'admin/departments_report/Education/shikha_page_two/$1';

$route['admin/departmentsreport/shikha-page-three'] = 'admin/departments_report/Education/shikha_page_three';
$route['admin/departmentsreport/shikha-page-three/(:num)'] = 'admin/departments_report/Education/shikha_page_three/$1';

//business
$route['admin/departmentsreport/business-page-one'] = 'admin/departments_report/Business/business_page_one';
$route['admin/departmentsreport/business-page-one/(:num)'] = 'admin/departments_report/Business/business_page_one/$1';

$route['admin/departmentsreport/business-page-two'] = 'admin/departments_report/Business/business_page_two';
$route['admin/departmentsreport/business-page-two/(:num)'] = 'admin/departments_report/Business/business_page_two/$1';

//madrasha
$route['admin/departmentsreport/madrasha-page-one'] = 'admin/departments_report/Madrasha/madrasha_page_one';
$route['admin/departmentsreport/madrasha-page-one/(:num)'] = 'admin/departments_report/Madrasha/madrasha_page_one/$1';

$route['admin/departmentsreport/madrasha-page-two'] = 'admin/departments_report/Madrasha/madrasha_page_two';
$route['admin/departmentsreport/madrasha-page-two/(:num)'] = 'admin/departments_report/Madrasha/madrasha_page_two/$1';

$route['admin/departmentsreport/madrasha-page-three'] = 'admin/departments_report/Madrasha/madrasha_page_three';
$route['admin/departmentsreport/madrasha-page-three/(:num)'] = 'admin/departments_report/Madrasha/madrasha_page_three/$1';

$route['admin/departmentsreport/madrasha-page-four'] = 'admin/departments_report/Madrasha/madrasha_page_four';
$route['admin/departmentsreport/madrasha-page-four/(:num)'] = 'admin/departments_report/Madrasha/madrasha_page_four/$1';

$route['admin/departmentsreport/madrasha-page-five'] = 'admin/departments_report/Madrasha/madrasha_page_five';
$route['admin/departmentsreport/madrasha-page-five/(:num)'] = 'admin/departments_report/Madrasha/madrasha_page_five/$1';
$route['admin/departmentsreport/madrasha-page-six'] = 'admin/departments_report/Madrasha/madrasha_page_six';
$route['admin/departmentsreport/madrasha-page-six/(:num)'] = 'admin/departments_report/Madrasha/madrasha_page_six/$1';


//Publicity
$route['admin/departmentsreport/publicity-page-one'] = 'admin/departments_report/Publicity/publicity_page_one';
$route['admin/departmentsreport/publicity-page-one/(:num)'] = 'admin/departments_report/Publicity/publicity_page_one/$1';

$route['admin/departmentsreport/publicity-page-two'] = 'admin/departments_report/Publicity/publicity_page_two';
$route['admin/departmentsreport/publicity-page-two/(:num)'] = 'admin/departments_report/Publicity/publicity_page_two/$1';


//College
$route['admin/departmentsreport/college-page-one'] = 'admin/departments_report/College/college_page_one';
$route['admin/departmentsreport/college-page-one/(:num)'] = 'admin/departments_report/College/college_page_one/$1';

$route['admin/departmentsreport/college-page-two'] = 'admin/departments_report/College/college_page_two';
$route['admin/departmentsreport/college-page-two/(:num)'] = 'admin/departments_report/College/college_page_two/$1';

$route['admin/departmentsreport/college-page-three'] = 'admin/departments_report/College/college_page_three';
$route['admin/departmentsreport/college-page-three/(:num)'] = 'admin/departments_report/College/college_page_three/$1';

//chatro andolon
$route['admin/departmentsreport/chatro-andolon-bivag'] = 'admin/departments_report/ChatroAndolon/chatro_andolon_bivag';
$route['admin/departmentsreport/chatro-andolon-bivag/(:num)'] = 'admin/departments_report/ChatroAndolon/chatro_andolon_bivag/$1';

$route['admin/departmentsreport/add-chatroandolon-institution/(:num)'] = 'admin/departments_report/ChatroAndolon/add_chatroandolon_institution/$1';

$route['admin/departmentsreport/add-chatroandolon-sonsod/(:num)'] = 'admin/departments_report/ChatroAndolon/add_chatroandolon_sonsod/$1';


//media

$route['admin/departmentsreport/parsho-songothon-songkranto'] = 'admin/departments_report/ChatroAndolon/parsho_songothon_songkranto';
$route['admin/departmentsreport/parsho-songothon-songkranto/(:num)'] = 'admin/departments_report/ChatroAndolon/parsho_songothon_songkranto/$1';

//debate
$route['admin/departmentsreport/bitorko-page-one'] = 'admin/departments_report/Debate/bitorko_page_one';
$route['admin/departmentsreport/bitorko-page-one/(:num)'] = 'admin/departments_report/Debate/bitorko_page_one/$1';

$route['admin/departmentsreport/bitorko-page-two'] = 'admin/departments_report/Debate/bitorko_page_two';
$route['admin/departmentsreport/bitorko-page-two/(:num)'] = 'admin/departments_report/Debate/bitorko_page_two/$1';

//Information
$route['admin/departmentsreport/information-bivag'] = 'admin/departments_report/Information/information_bivag';
$route['admin/departmentsreport/information-bivag/(:num)'] = 'admin/departments_report/Information/information_bivag/$1';

$route['admin/departmentsreport/add-information-file-sonrokkhon/(:num)'] = 'admin/departments_report/Information/add_information_file_sonrokkhon/$1';

$route['admin/departmentsreport/add-information-sharok/(:num)'] = 'admin/departments_report/Information/add_information_sharok/$1';


//social
$route['admin/departmentsreport/social-welfare-bivag'] = 'admin/departments_report/Social/social_welfare_bivag';
$route['admin/departmentsreport/social-welfare-bivag/(:num)'] = 'admin/departments_report/Social/social_welfare_bivag/$1';

$route['admin/departmentsreport/add-social-welfare-shamajik-shong/(:num)']  = 'admin/departments_report/Social/add_social_welfare_shamajik_shong/$1';




//Research
$route['admin/departmentsreport/research-page-one'] = 'admin/departments_report/Research/research_page_one';
$route['admin/departmentsreport/research-page-one/(:num)'] = 'admin/departments_report/Research/research_page_one/$1';

$route['admin/departmentsreport/research-page-two'] = 'admin/departments_report/Research/research_page_two';
$route['admin/departmentsreport/research-page-two/(:num)'] = 'admin/departments_report/Research/research_page_two/$1';

$route['admin/departmentsreport/add-gobeshona-gobeshonay-agrohi/(:num)'] = 'admin/departments_report/Research/add_gobeshona_gobeshonay_agrohi/$1';
$route['admin/departmentsreport/add-gobeshona-gobeshonaroto-vai/(:num)'] = 'admin/departments_report/Research/add_gobeshona_gobeshonaroto_vai/$1';


//Culture
$route['admin/departmentsreport/culture-page-one'] = 'admin/departments_report/Culture/culture_page_one';
$route['admin/departmentsreport/culture-page-one/(:num)'] = 'admin/departments_report/Culture/culture_page_one/$1';

$route['admin/departmentsreport/culture-page-two'] = 'admin/departments_report/Culture/culture_page_two';
$route['admin/departmentsreport/culture-page-two/(:num)'] = 'admin/departments_report/Culture/culture_page_two/$1';

$route['admin/departmentsreport/culture-page-three'] = 'admin/departments_report/Culture/culture_page_three';
$route['admin/departmentsreport/culture-page-three/(:num)'] = 'admin/departments_report/Culture/culture_page_three/$1';

//publication
$route['admin/departmentsreport/publication-page-one'] = 'admin/departments_report/Publication/publication_page_one';
$route['admin/departmentsreport/publication-page-one/(:num)'] = 'admin/departments_report/Publication/publication_page_one/$1';

$route['admin/departmentsreport/publication-page-two'] = 'admin/departments_report/Publication/publication_page_two';
$route['admin/departmentsreport/publication-page-two/(:num)'] = 'admin/departments_report/Publication/publication_page_two/$1';

$route['admin/departmentsreport/add-publication-bibidh/(:num)'] = 'admin/departments_report/Publication/add_publication_bibidh/$1';
//manpower development

$route['admin/departmentsreport/manpower-bivag'] = 'admin/departments_report/Manpower/manpower_bivag';
$route['admin/departmentsreport/manpower-bivag/(:num)'] = 'admin/departments_report/Manpower/manpower_bivag/$1';


//Library

$route['admin/departmentsreport/pathagar-bivag'] = 'admin/departments_report/Library/pathagar_bivag';
$route['admin/departmentsreport/pathagar-bivag/(:num)'] = 'admin/departments_report/Library/pathagar_bivag/$1';

//foundation

$route['admin/departmentsreport/foundation-bivag'] = 'admin/departments_report/Foundation/foundation_bivag';
$route['admin/departmentsreport/foundation-bivag/(:num)'] = 'admin/departments_report/Foundation/foundation_bivag/$1';

$route['admin/departmentsreport/add-foundation-jomi-shongkranto/(:num)'] = 'admin/departments_report/Foundation/add_foundation_jomi_shongkranto/$1';
$route['admin/departmentsreport/add-foundation-flat-shongkranto/(:num)'] = 'admin/departments_report/Foundation/add_foundation_flat_shongkranto/$1';
$route['admin/departmentsreport/add-foundation-others/(:num)'] = 'admin/departments_report/Foundation/add_foundation_others/$1';




//Law

$route['admin/departmentsreport/law-page-one'] = 'admin/departments_report/Law/law_page_one';
$route['admin/departmentsreport/law-page-one/(:num)'] = 'admin/departments_report/Law/law_page_one/$1';

$route['admin/departmentsreport/law-page-two'] = 'admin/departments_report/Law/law_page_two';
$route['admin/departmentsreport/law-page-two/(:num)'] = 'admin/departments_report/Law/law_page_two/$1';

$route['admin/departmentsreport/add-law-shaja-shongkranto-mamla/(:num)'] = 'admin/departments_report/Law/add_law_shaja_shongkranto_mamla/$1';
$route['admin/departmentsreport/add-law-khalash-inffo/(:num)'] = 'admin/departments_report/Law/add_law_khalash_inffo/$1';
$route['admin/departmentsreport/add-law-amader-pokkhe-mamla/(:num)'] = 'admin/departments_report/Law/add_law_amader_pokkhe_mamla/$1';
$route['admin/departmentsreport/add-law-gum-khun-hamla/(:num)'] = 'admin/departments_report/Law/add_law_gum_khun_hamla/$1';
$route['admin/departmentsreport/add-law-shakhar-shongrokkhon/(:num)'] = 'admin/departments_report/Law/add_law_shakhar_shongrokkhon/$1';

//science
$route['admin/departmentsreport/science-page-one'] = 'admin/departments_report/Science/science_page_one';
$route['admin/departmentsreport/science-page-one/(:num)'] = 'admin/departments_report/Science/science_page_one/$1';

$route['admin/departmentsreport/science-page-two'] = 'admin/departments_report/Science/science_page_two';
$route['admin/departmentsreport/science-page-two/(:num)'] = 'admin/departments_report/Science/science_page_two/$1';

$route['admin/departmentsreport/science-page-three'] = 'admin/departments_report/Science/science_page_three';
$route['admin/departmentsreport/science-page-three/(:num)'] = 'admin/departments_report/Science/science_page_three/$1';

$route['admin/departmentsreport/science-page-four'] = 'admin/departments_report/Science/science_page_four';
$route['admin/departmentsreport/science-page-four/(:num)'] = 'admin/departments_report/Science/science_page_four/$1';

//It
$route['admin/departmentsreport/it-bivag'] = 'admin/departments_report/It/it_bivag';
$route['admin/departmentsreport/it-bivag/(:num)'] = 'admin/departments_report/It/it_bivag/$1';

//sports

$route['admin/departmentsreport/sports_page_one'] = 'admin/departments_report/Sports/page_one';
$route['admin/departmentsreport/sports_page_one/(:num)'] = 'admin/departments_report/Sports/page_one/$1';

$route['admin/departmentsreport/sports_page_two'] = 'admin/departments_report/Sports/page_two';
$route['admin/departmentsreport/sports_page_two/(:num)'] = 'admin/departments_report/Sports/page_two/$1';

$route['admin/departmentsreport/add-sports-contact/(:num)'] = 'admin/departments_report/Sports/add_sports_contact/$1';


//dawah
$route['admin/departmentsreport/dawah-page-one'] = 'admin/departments_report/Dawah/dawah_page_one';
$route['admin/departmentsreport/dawah-page-one/(:num)'] = 'admin/departments_report/Dawah/dawah_page_one/$1';

$route['admin/departmentsreport/dawah-page-two'] = 'admin/departments_report/Dawah/dawah_page_two';
$route['admin/departmentsreport/dawah-page-two/(:num)'] = 'admin/departments_report/Dawah/dawah_page_two/$1';

//School
$route['admin/departmentsreport/school-page-one'] = 'admin/departments_report/School/school_page_one';
$route['admin/departmentsreport/school-page-one/(:num)'] = 'admin/departments_report/School/school_page_one/$1';

$route['admin/departmentsreport/school-page-two'] = 'admin/departments_report/School/school_page_two';
$route['admin/departmentsreport/school-page-two/(:num)'] = 'admin/departments_report/School/school_page_two/$1';

$route['admin/departmentsreport/school-page-three'] = 'admin/departments_report/School/school_page_three';
$route['admin/departmentsreport/school-page-three/(:num)'] = 'admin/departments_report/School/school_page_three/$1';

$route['admin/departmentsreport/school-page-four'] = 'admin/departments_report/School/school_page_four';
$route['admin/departmentsreport/school-page-four/(:num)'] = 'admin/departments_report/School/school_page_four/$1';


//school karjokrom bivag

$route['admin/departmentsreport/school-karjokrom-bivag'] = 'admin/departments_report/SchoolKarjokrom/school_karjokrom_bivag';
$route['admin/departmentsreport/school-karjokrom-bivag/(:num)'] = 'admin/departments_report/SchoolKarjokrom/school_karjokrom_bivag/$1';


//Others

$route['admin/departmentsreport/others-page-one'] = 'admin/departments_report/Others/others_page_one';
$route['admin/departmentsreport/others-page-one/(:num)'] = 'admin/departments_report/Others/others_page_one/$1';

$route['admin/departmentsreport/others-page-two'] = 'admin/departments_report/Others/others_page_two';
$route['admin/departmentsreport/others-page-two/(:num)'] = 'admin/departments_report/Others/others_page_two/$1';

$route['admin/departmentsreport/others-page-three'] = 'admin/departments_report/Others/others_page_three';
$route['admin/departmentsreport/others-page-three/(:num)'] = 'admin/departments_report/Others/others_page_three/$1';

$route['admin/departmentsreport/others-page-four'] = 'admin/departments_report/Others/others_page_four';
$route['admin/departmentsreport/others-page-four/(:num)'] = 'admin/departments_report/Others/others_page_four/$1';

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
$route['admin/departmentsreport/media-page-one'] = 'admin/departments_report/Media/media_page_one';
$route['admin/departmentsreport/media-page-one/(:num)'] = 'admin/departments_report/Media/media_page_one/$1';

$route['admin/departmentsreport/media-page-two'] = 'admin/departments_report/Media/media_page_two';
$route['admin/departmentsreport/media-page-two/(:num)'] = 'admin/departments_report/Media/media_page_two/$1';

$route['admin/departmentsreport/media-page-three'] = 'admin/departments_report/Media/media_page_three';
$route['admin/departmentsreport/media-page-three/(:num)'] = 'admin/departments_report/Media/media_page_three/$1';

$route['admin/departmentsreport/media-jonosokti'] = 'admin/departments_report/Media/media_jonosokti';
$route['admin/departmentsreport/media-jonosokti/(:num)'] = 'admin/departments_report/Media/media_jonosokti/$1';

$route['admin/departmentsreport/media-briddhi'] = 'admin/departments_report/Media/media_briddhi';
$route['admin/departmentsreport/media-briddhi/(:num)'] = 'admin/departments_report/Media/media_briddhi/$1';

$route['admin/departmentsreport/media-jogajog'] = 'admin/departments_report/Media/media_jogajog';
$route['admin/departmentsreport/media-jogajog/(:num)'] = 'admin/departments_report/Media/media_jogajog/$1';

$route['admin/departmentsreport/media-pathagar'] = 'admin/departments_report/Media/media_pathagar';
$route['admin/departmentsreport/media-pathagar/(:num)'] = 'admin/departments_report/Media/media_pathagar/$1';

$route['admin/departmentsreport/media-sovasumoho-proshikkhon'] = 'admin/departments_report/Media/media_sovasumoho_proshikkhon';
$route['admin/departmentsreport/media-sovasumoho-proshikkhon/(:num)'] = 'admin/departments_report/Media/media_sovasumoho_proshikkhon/$1';

$route['admin/departmentsreport/media-hrd'] = 'admin/departments_report/Media/media_hrd';
$route['admin/departmentsreport/media-hrd/(:num)'] = 'admin/departments_report/Media/media_hrd/$1';

$route['admin/departmentsreport/media-course-report'] = 'admin/departments_report/Media/media_course_report';
$route['admin/departmentsreport/media-course-report/(:num)'] = 'admin/departments_report/Media/media_course_report/$1';

$route['admin/departmentsreport/media-rekrutment-report'] = 'admin/departments_report/Media/media_rekrutment_report';
$route['admin/departmentsreport/media-rekrutment-report/(:num)'] = 'admin/departments_report/Media/media_rekrutment_report/$1';

$route['admin/departmentsreport/media-ak-nojore'] = 'admin/departments_report/Media/media_ak_nojore';
$route['admin/departmentsreport/media-ak-nojore/(:num)'] = 'admin/departments_report/Media/media_ak_nojore/$1';

$route['admin/departmentsreport/media-portal-report'] = 'admin/departments_report/Media/media_portal_report';
$route['admin/departmentsreport/media-portal-report/(:num)'] = 'admin/departments_report/Media/media_portal_report/$1';

$route['admin/departmentsreport/media-songothon-report'] = 'admin/departments_report/Media/media_songothon_report';
$route['admin/departmentsreport/media-songothon-report/(:num)'] = 'admin/departments_report/Media/media_songothon_report/$1';

$route['admin/departmentsreport/electric-print-online'] = 'admin/departments_report/Media/electric_print_online';
$route['admin/departmentsreport/electric-print-online/(:num)'] = 'admin/departments_report/Media/electric_print_online/$1';
$route['admin/departmentsreport/getAllMedia'] = 'admin/departments_report/Media/getAllMedia';
$route['admin/departmentsreport/getAllMedia/(:num)'] = 'admin/departments_report/Media/getAllMedia/$1';
$route['admin/departmentsreport/deleteAllMedia/(:num)'] = 'admin/departments_report/Media/deleteAllMedia/$1';
$route['admin/departmentsreport/addallmedia/(:num)'] = 'admin/departments_report/Media/addallmedia/$1';
 







$route['admin/departmentsreport/eknojore-requirement'] = 'admin/departments_report/Media/eknojore_requirement';
$route['admin/departmentsreport/eknojore-requirement/(:num)'] = 'admin/departments_report/Media/eknojore_requirement/$1';

//chatro kollan

$route['admin/departmentsreport/chatrokollan-bivag'] = 'admin/departments_report/Chatrokollan/chatrokollan_bivag';
$route['admin/departmentsreport/chatrokollan-bivag/(:num)'] = 'admin/departments_report/Chatrokollan/chatrokollan_bivag/$1';

//manobadhikar songothon

$route['admin/departmentsreport/manobadhikar-bivag'] = 'admin/departments_report/Manobadhikar/manobadhikar_bivag';
$route['admin/departmentsreport/manobadhikar-bivag/(:num)'] = 'admin/departments_report/Manobadhikar/manobadhikar_bivag/$1';

$route['admin/departmentsreport/manobadhikar-songothon-protistha'] = 'admin/departments_report/Manobadhikar/manobadhikar_songothon_protistha';
$route['admin/departmentsreport/manobadhikar-songothon-protistha/(:num)'] = 'admin/departments_report/Manobadhikar/manobadhikar_songothon_protistha/$1';

$route['admin/departmentsreport/manobadhikar-program'] = 'admin/departments_report/Manobadhikar/manobadhikar_program';
$route['admin/departmentsreport/manobadhikar-program/(:num)'] = 'admin/departments_report/Manobadhikar/manobadhikar_program/$1';

$route['admin/departmentsreport/manobadhikar-longhon-porisonkhan'] = 'admin/departments_report/Manobadhikar/manobadhikar_longhon_porisonkhan';
$route['admin/departmentsreport/manobadhikar-longhon-porisonkhan/(:num)'] = 'admin/departments_report/Manobadhikar/manobadhikar_longhon_porisonkhan/$1';

$route['admin/departmentsreport/manobadhikar-jogajog'] = 'admin/departments_report/Manobadhikar/manobadhikar_jogajog';
$route['admin/departmentsreport/manobadhikar-jogajog/(:num)'] = 'admin/departments_report/Manobadhikar/manobadhikar_jogajog/$1';





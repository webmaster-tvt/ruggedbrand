<?php


// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
   
   /*Woo shortcodes kit options*/
   
        delete_option('wshk_enable');
    	delete_option('wshk_test');
    	delete_option('wshk-inlinecss');
    	delete_option('wshk_text');
    	delete_option('wshk_min'); 
    	delete_option('wshk_perpage'); 
    	delete_option('wshk_nperpage');
    	delete_option('wshk_nperpagecats');
    	delete_option('wshk_enablecat');
    	delete_option('wshk_firstcat');
    	delete_option('wshk_secondcat');
    	delete_option('wshk_thirdcat');
    	/*v.1.9.0*/
    	delete_option('wshk_display_cats_search');
    	delete_option('wshk_hide_prodin_cats');
    	delete_option('wshk_display_excats_search');
    	delete_option('wshk_hide_exprodin_cats');
    	
    	delete_option('wshk_enablebought');
    	delete_option('wshk_buttontext');
    	delete_option('wshk_enablectbp');
    	delete_option('wshk_textprefix'); 
    	delete_option('wshk_textsuffix');
    	delete_option('wshk_textpsuffix');
    	delete_option('wshk_textnobp');
    	delete_option('wshk_enablectbo');
    	delete_option('wshk_tordersprefix');
    	delete_option('wshk_torderssuffix');
    	delete_option('wshk_torderspsuffix');
    	delete_option('wshk_textnobo');
    	delete_option('wshk_enablewmessage');
    	delete_option('wshk_wmorders');
    	delete_option('wshk_textwmssg');
    	delete_option('wshk_textsales');
    	delete_option('wshk_minsales');
    	delete_option('wshk_nonotice');
    	delete_option('wshk_morenotice');
    	delete_option('wshk_enablereviews');
    	delete_option('wshk_textavsize');
    	delete_option('wshk_textavbdsize');
    	delete_option('wshk_textavbdradius');
    	delete_option('wshk_textavbdtype');
    	delete_option('wshk_textavbdcolor');
    	delete_option('wshk_texttbwsize');
    	delete_option('wshk_textbxfsize');
    	delete_option('wshk_textbxbdsize');
    	delete_option('wshk_textbxbdradius');
    	delete_option('wshk_textbxbdtype');
    	delete_option('wshk_textbxbdcolor');
    	delete_option('wshk_textbxbgcolor');
    	delete_option('wshk_textbtnbdsize');
    	delete_option('wshk_textbtnbdradius');
    	delete_option('wshk_textbtnbdtype');
    	delete_option('wshk_textbtnbdcolor');
    	delete_option('wshk_textbtntarget');
    	delete_option('wshk_textbtntxd');
    	
    	/*Nuevas opciones desde v.1.7.8*/
    	delete_option( 'wshk_enablemydownloadsht');
    	delete_option( 'wshk_enablemyaddressessht');
    	delete_option( 'wshk_enablemypaymentsht');
    	delete_option( 'wshk_enablemyeditaccsht');
    	delete_option( 'wshk_enabledashbsht');
    	delete_option( 'wshk_enabletheipsht');
    	delete_option( 'wshk_enablethenamesurnsht');
    	delete_option( 'wshk_enabletheuseremailsht');
    	delete_option( 'wshk_enablethetotsalessht');
    	delete_option( 'wshk_enablethetotprosht');
    	delete_option( 'wshk_enabletheboughtsht');
    	/*FIN nuevas opciones*/
    	
    	/*Since 1.8.4*/
    	delete_option( 'wshk_enablethetotsalesamount');
    	delete_option( 'wshk_blockadmredirect');
    	
    	/*Since 1.8.5*/
    	delete_option( 'wshk_nosendusers');
    	delete_option( 'wshk_disablenewdashboardwc');
    	
    	/*Since 1.8.7*/
    	delete_option('wshk_displaywoonotices');
    	delete_option('wshk_userinmenuoptions');
    	
    	/*Since 1.8.9*/
    	delete_option('wshk_sales_sht_one');
    	delete_option('wshk_sales_sht_two');
    	delete_option('wshk_sales_sht_three');
    	delete_option('wshk_sales_sht_four');
    	
    	/*Since 1.9.0*/
    	delete_option('wshk_get_terms_hide');
    	delete_option('wshk_get_pol_hide');
    	delete_option('wshk_enablepropurchtimes');
    	
    	/*Since 1.9.1*/
    	delete_option('wshk_numeropedidosnew');
    	delete_option('wshk_enablesavingprices');
    	delete_option('wshk_yessalebadge');
    	delete_option('wshk_customtxtdownbtn');
    	
    	/*Since 1.9.3*/
    	delete_option('wshk_enablemaxminvariablepro');
    	delete_option('wshk_minpricevarpro');
    	delete_option('wshk_maxpricevarpro');
    	//delete_option('wshk_mintextvarpro');
    	//delete_option('wshk_maxtextvarpro');
    	delete_option('wshk_enablepreviousvisited');
    	
    	
    	/*Since 1.9.4*/
    	delete_option('wshk_gdpr_comments_link_text');
    	delete_option('wshk_gdpr_checkout_link_text');
    	delete_option('wshk_gdpr_reviews_link_text');
    	delete_option('wshk_gdpr_regform_link_text');
    	
    	/*Since 2.0.0*/
    	delete_option('wshk_disableorderstemplate');
    	delete_option('wshk_enableuserrole');
    	delete_option('wshk_userroleoptions');
    	
    	
    	delete_option('wshk_yesenable');
    	delete_option('wshk_yesenabletwo');
    	delete_option('wshk_yesenablethree');
    	delete_option('wshk_nnoenable');
    	delete_option('wshk_nnoenabletwo');
    	delete_option('wshk_nnoenablethree');
    	
    	delete_option('wshk_alignthereviews');
    	delete_option('wshk_aligntheorders');
    	delete_option('wshk_aligntheproducts');
    	
    	delete_option('wshk_enabledisplayreviews');
    	delete_option('wshk_disretextavsize');
    	delete_option('wshk_disretextavbdsize');
    	delete_option('wshk_disretextavbdradius');
    	delete_option('wshk_disretextavbdtype');
    	delete_option('wshk_disretextavbdcolor');
    	delete_option('wshk_disretexttbwsize');
    	delete_option('wshk_disretextbxfsize');
    	delete_option('wshk_disretextmargintop');
    	delete_option('wshk_disretextbxbdsize');
    	delete_option('wshk_disretextbxbdradius');
    	delete_option('wshk_disretextbxbdtype');
    	delete_option('wshk_disretextbxbdcolor');
    	delete_option('wshk_disretextbxbgcolor');
    	delete_option('wshk_disretextbxpadding');
    	delete_option('wshk_disretextbxminheight');
    	delete_option('wshk_disretextcolor');
    	delete_option('wshk_numbrevdis');
    	delete_option('wshk_showpoints');
    	delete_option('wshk_limitcomm');
    	delete_option('wshk_readmoretextlim');
    	
    	delete_option('wshk_enableorderscontrol');
    	delete_option('wshk_numeropedidos');
    	
    	delete_option('wshk_bougcolumnum');
    	
    	
    	
    	delete_option('wshk_disretextlinktarget');
    	delete_option('wshk_disretextlinktxd');
    	delete_option('wshk_disretextlinktxtsize');
    	delete_option('wshk_disretextlinktxtcolor');
    	
    	delete_option('wshk_disredisplaynumber');
    	delete_option('wshk_disrecolumnsnumber');
    	
    	
    	delete_option('wshk_enablerwcounter');
    	delete_option('wshk_treviewprefix');
    	delete_option('wshk_treviewsuffix');
    	delete_option('wshk_treviewpsuffix');
    	delete_option('wshk_textnoreview');
    	delete_option('wshk_enableusername');
    	delete_option('wshk_usernmtc');
    	delete_option('wshk_usernmts');
    	delete_option('wshk_usernmta');
    	delete_option('wshk_enablelogoutbtn');
    	delete_option('wshk_logbtnbdsize');
    	delete_option('wshk_logbtnbdradius');
    	delete_option('wshk_logbtnbdtype');
    	delete_option('wshk_logbtnbdcolor');
    	delete_option('wshk_logbtntd');
    	delete_option('wshk_logbtnta');
    	delete_option('wshk_logbtnwd');
    	delete_option('wshk_logbtntext');
    	delete_option('wshk_enableloginform');
    	delete_option('wshk_loginredi');
    	delete_option('wshk_blockmya');
    	delete_option('wshk_enableaddtocarttxt');
    	delete_option('wshk_atctxtexternal');
    	delete_option('wshk_atctxtgrouped');
    	delete_option('wshk_atctxtsimple');
    	delete_option('wshk_atctxtvariable');
    	/*delete_option('wshk_atctxtntin');    */
    	delete_option('wshk_textbxpadding');
    	delete_option('wshk_textbtntxt');
    	delete_option('wshk_avshadow');
    	delete_option('wshk_textusernmpf');
    	delete_option('wshk_textusernmsf');
    	delete_option('wshk_enablegravatar');
    	delete_option('wshk_textgravasize');
    	delete_option('wshk_textgravashd');
    	delete_option('wshk_textgravabdsz');
    	delete_option('wshk_textgravabdtp');
    	delete_option('wshk_textgravabdcl');
    	delete_option('wshk_textgravabdrd');
    	delete_option('wshk_emailordersizes');
    	delete_option('wshk_excludecat');
    	delete_option('wshk_exfirstcat');
    	delete_option('wshk_exsecondcat');
    	delete_option('wshk_exthirdcat');
    	delete_option('wshk_enablecustomenu');
    	delete_option('wshk_menulocation');
    	delete_option('wshk_logmenu');
    	delete_option('wshk_nonlogmenu');
    	delete_option('wshk_enableshtmenu');
    	delete_option('wshk_enableuserinmenu');
    	delete_option('wshk_enablesloginsec');
    	delete_option('wshk_enablesadminbar');
    	delete_option('wshk_enablerestrictctnt');
    	delete_option('wshk_enableoffctnt');
    	delete_option('wshk_btnlogoutredi');
    	delete_option('wshk_showusername');
    	delete_option('wshk_showonlyname');
    	delete_option('wshk_showdisplay');
    	
    	delete_option('wshk_enableautocom');
    	delete_option('wshk_enableacustomshopage');
    	delete_option('wshk_shopageslug');
    	delete_option('wshk_enablehidelogerror');
    	delete_option('wshk_hidelogerrorcustomessage');
    	delete_option('wshk_enablesecheaders');

    	
    	delete_option('wshk_enableacustomthankyoupage');
    	delete_option('wshk_customthankyouoneid');
    	delete_option('wshk_customthankyouone');
    	delete_option('wshk_customthankyoutwoid');
    	delete_option('wshk_customthankyoutwo');
    	delete_option('wshk_customthankyouthreeid');
    	delete_option('wshk_customthankyouthree');
    	delete_option('wshk_customthankyougeneral');
    	
    	delete_option('wshk_gprdiread');
    	delete_option('wshk_gprdurlslug');
    	delete_option('wshk_gprdpolit');
    	delete_option('wshk_gprderror');
    	delete_option('wshk_gprduserlegalinfo');
    	delete_option('wshk_gprdsettings');
    	delete_option('wshk_gprdcomments');
    	delete_option('wshk_gprdorders');
    	delete_option('wshk_gprdreviews');
    	delete_option('wshk_gprdcomveri');
    	delete_option('wshk_gprdordveri');
    	delete_option('wshk_gprdrewveri');
    	delete_option('wshk_gprdregveri');
    	delete_option('wshk_gprdwcregisterform');
    	delete_option('wshk_wcregisterformfieldsextra');
    	
    	/*Since v.1.8.6*/
    	delete_option('wshk_gprdireadcomments');
    	delete_option('wshk_gprdireadcheckout');
    	delete_option('wshk_gprdireadreviews');
    	delete_option('wshk_gprdireadregister');
    	/*end v.1.8.6*/
    	
    	delete_option('wshk_wcnewtermsbox ');
    	delete_option('wshk_termstexto');
    	delete_option('wshk_termslink');
    	delete_option('wshk_termstextlink');
        delete_option('wshk_enableskipcart');
    	
    	delete_option('wshk_gprdcommentsbdsize');
    	delete_option('wshk_gprdcommentsbdtype');
    	delete_option('wshk_gprdcommentsbdcolor');
    	delete_option('wshk_gprdcommentsbdradius');
    	delete_option('wshk_gprdcommentspadding');
    	delete_option('wshk_gprdcommentsbgcolor');
    	
    	delete_option('wshk_gprdcheckoutbdsize');
    	delete_option('wshk_gprdcheckoutbdtype');
    	delete_option('wshk_gprdcheckoutbdcolor');
    	delete_option('wshk_gprdcheckoutbdradius');
    	delete_option('wshk_gprdcheckoutpadding');
    	delete_option('wshk_gprdcheckoutbgcolor');
    	
    	delete_option('wshk_gprdreviewsbdsize');
    	delete_option('wshk_gprdreviewsbdtype');
    	delete_option('wshk_gprdreviewsbdcolor');
    	delete_option('wshk_gprdreviewsbdradius');
    	delete_option('wshk_gprdreviewspadding');
    	delete_option('wshk_gprdreviewsbgcolor');
    	
    	delete_option('wshk_gprdregisterbdsize');
    	delete_option('wshk_gprdregisterbdtype');
    	delete_option('wshk_gprdregisterbdcolor');
    	delete_option('wshk_gprdregisterbdradius');
    	delete_option('wshk_gprdregisterpadding');
    	delete_option('wshk_gprdregisterbgcolor');
    	
    	/*From v.1.8.0*/
    	
    	delete_option('wshk_enableonlyoneincart');
    	delete_option('wshk_productsincart');
    	
    	delete_option('wshk_returntoshopbtn');
    	delete_option('wshk_retshopbtntext');
    	delete_option('wshk_retshopurlredi');
    	
    	/*Easy my account builder options*/
    	
    	/*delete_option('wshk_enablesemab');
    	
    	delete_option('wshk_enablescontntdash');
    	delete_option('wshk_editdashb');
    	delete_option('wshk_editaftdashb');
    	
    	delete_option('wshk_enablescontntord');
    	delete_option('wshk_editorde');
    	delete_option('wshk_editaftorde');
    	
    	delete_option('wshk_enablescontntdow');
    	delete_option('wshk_editdown');
    	delete_option('wshk_editaftdown');
    	
    	delete_option('wshk_enablescontntadd');
    	delete_option('wshk_editaddre');
    	delete_option('wshk_editaftaddre');
    	
    	delete_option('wshk_enablescontntpay');
    	delete_option('wshk_editpaym');
    	delete_option('wshk_editaftpaym');
    	
    	delete_option('wshk_enablescontntrev');
    	delete_option('wshk_editrevi');
    	delete_option('wshk_editaftrevi');
    	
    	delete_option('wshk_enablescontntedi');
    	delete_option('wshk_editedit');
    	delete_option('wshk_editaftedit');
    	
    	delete_option('wshk_enablescontntlog');
    	delete_option('wshk_editlogo');
    	delete_option('wshk_editaftlogo');
    	
    	delete_option('wshk_tabsbdsize');
    	delete_option('wshk_tabsbdtype');
    	delete_option('wshk_tabsbdcolor');
    	delete_option('wshk_tabsbdradius');
    	
    	delete_option('wshk_tabspdtop');
    	delete_option('wshk_tabspdright');
    	delete_option('wshk_tabspdbottom');
    	delete_option('wshk_tabspdleft');
    	
    	delete_option('wshk_tabstxtsize');
    	delete_option('wshk_tabstxtcolor');
    	delete_option('wshk_tabstxtalign');
    	delete_option('wshk_tabstxtdeco');
    	
    	delete_option('wshk_tabsbgcolor');
    	delete_option('wshk_tabswdsize');
    	delete_option('wshk_tabshgsize');
    	
    	
    	delete_option('wshk_actabsbdsize');
    	delete_option('wshk_actabsbdtype');
    	delete_option('wshk_actabsbdcolor');
    	delete_option('wshk_actabsbdradius');
    	
    	delete_option('wshk_actabstxtcolor');
    	delete_option('wshk_actabstxtdeco');
    	delete_option('wshk_actabsbgcolor');
    	
    	
    	delete_option('wshk_hotabsbdsize');
    	delete_option('wshk_hotabsbdtype');
    	delete_option('wshk_hotabsbdcolor');
    	delete_option('wshk_hotabsbdradius');
    	
    	delete_option('wshk_hotabstxtcolor');
    	delete_option('wshk_hotabstxtdeco');
    	delete_option('wshk_hotabsbgcolor');
    	
    	delete_option('wshk_contbbdsize');
    	delete_option('wshk_contbbdtype');
    	delete_option('wshk_contbbdcolor');
    	delete_option('wshk_contbbdradius');
    	
    	delete_option('wshk_contbpdtop');
    	delete_option('wshk_contbpdright');
    	delete_option('wshk_contbpdbottom');
    	delete_option('wshk_contbpdleft');
    	
    	delete_option('wshk_contbctheight');
    	delete_option('wshk_contbctbgcolor');
    	
    	delete_option('wshk_keeplastab');
    	
    	delete_option('wshk_icondashb');
    	delete_option('wshk_iconorder');
    	delete_option('wshk_icondownl');
    	delete_option('wshk_iconaddre');
    	delete_option('wshk_iconpayme');
    	delete_option('wshk_iconrevie');
    	delete_option('wshk_iconedita');
    	delete_option('wshk_iconlogou');*/
    	
    	/*Custom Blocks options*/
    	
    	/*delete_option('wshk_enablescusre');
    	delete_option('wshk_vieworderid');
    	delete_option('wshk_miaddressesid');
    	delete_option('wshk_mipaymentsid');
    	
    	delete_option('wshk_enablecustomblockss');
    	
    	delete_option('wshk_enablescusrecharts');
    	
    	delete_option('wshk_tbcharttitleone');
    	delete_option('wshk_tbcharttitletwo');
    	delete_option('wshk_tbcharttitletres');
    	delete_option('wshk_tbcharttitlefour');
    	delete_option('wshk_tbcharttitlefive');
    	delete_option('wshk_tbcharttitlesix');
    	delete_option('wshk_tbcharttitleseven');
    	
    	delete_option('wshk_occharttitleone');
    	delete_option('wshk_occharttitletwo');
    	delete_option('wshk_occharttitletres');
    	delete_option('wshk_occharttitlefour');
    	delete_option('wshk_occharttitlefive');
    	delete_option('wshk_occharttitlesix');
    	delete_option('wshk_occharttitleoseven');*/
    	
    	/*Beta tester section*/
    	
    	delete_option('wshk_enablebillinguserdata');
    	delete_option('wshk_enableshippinguserdata');
    	delete_option('wshk_enabletotalspender');
    	delete_option('wshk_enableordercountser');
    	delete_option('wshk_enableproimage');
    	
    	delete_option('wshk_prodimagesize');
    	delete_option('wshk_prodimagebordsize');
    	delete_option('wshk_prodimagebordtype');
    	delete_option('wshk_prodimagebordcolor');
    	delete_option('wshk_prodimagebordradius');
   
    ?>
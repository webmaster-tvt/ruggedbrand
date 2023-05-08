<?php

if(!function_exists('wshk_register_settings')):

	function wshk_register_settings() {
    	register_setting( 'wshk_options', 'wshk_enable');
    	register_setting( 'wshk_options', 'wshk_test');
    	register_setting( 'wshk_options', 'wshk-inlinecss');
    	register_setting( 'wshk_options', 'wshk_text');
    	register_setting( 'wshk_options', 'wshk_min'); 
    	register_setting( 'wshk_options', 'wshk_perpage'); 
    	register_setting( 'wshk_options', 'wshk_nperpage');
    	register_setting( 'wshk_options', 'wshk_nperpagecats');
    	register_setting( 'wshk_options', 'wshk_enablecat');
    	register_setting( 'wshk_options', 'wshk_firstcat');
    	register_setting( 'wshk_options', 'wshk_secondcat');
    	register_setting( 'wshk_options', 'wshk_thirdcat');
    	/*v.1.9.0*/
    	register_setting('wshk_options', 'wshk_display_cats_search');
    	register_setting('wshk_options','wshk_hide_prodin_cats');
    	register_setting('wshk_options', 'wshk_display_excats_search');
    	register_setting('wshk_options','wshk_hide_exprodin_cats');
    	/*v1.9.1*/
    	register_setting('wshk_options', 'wshk_numeropedidosnew');
    	register_setting('wshk_options', 'wshk_enablesavingprices');
    	register_setting('wshk_options', 'wshk_yessalebadge');
    	register_setting('wshk_options', 'wshkhide_salebadge');
    	register_setting('wshk_options', 'wshk_salebadge_sht');
    	/*V.1.9.3*/
    	register_setting('wshk_options', 'wshk_enablemaxminvariablepro');
    	register_setting('wshk_options', 'wshk_minpricevarpro');
    	register_setting('wshk_options', 'wshk_maxpricevarpro');
    	register_setting('wshk_options', 'wshk_mintextvarpro');
    	register_setting('wshk_options', 'wshk_maxtextvarpro');
    	register_setting('wshk_options', 'wshk_sufmaxtextvarpro');
    	register_setting('wshk_options', 'wshk_sufmintextvarpro');
    	register_setting('wshk_options', 'wshk_enableviewbilling');
    	register_setting('wshk_options', 'wshk_viewbillingtext');
    	register_setting('wshk_options', 'wshk_enablepreviousvisited');
    	register_setting('wshk_options', 'wshk_cuspurprocoundays');
    	register_setting('wshk_options', 'wshk_custotordcoundays');
    	register_setting('wshk_options', 'wshk_fakeaddprodincounter');
    	register_setting('wshk_options', 'wshk_enablewebtoffeesubsht');
    	/*v.1.9.4 - v.1.1.4*/
    	register_setting('wshk_options', 'wshk_animatedcounterpro');
    	register_setting('wshk_options', 'wshk_animatedcounterord');
    	register_setting('wshk_options', 'wshk_animatedcounterrev');
    	register_setting('wshk_options', 'wshk_gdpr_comments_link_text');
    	register_setting('wshk_options', 'wshk_gdpr_checkout_link_text');
    	register_setting('wshk_options', 'wshk_gdpr_reviews_link_text');
    	register_setting('wshk_options', 'wshk_gdpr_regform_link_text');
    	
    	/*v.2.0.0*/
    	register_setting('wshk_options', 'wshk_disableorderstemplate');
    	
    	
    	
    	register_setting('wshk_options', 'wshk_customtxtdownbtn');
    	
    	register_setting('wshk_options', 'wshk_onsalebg');
    	register_setting('wshk_options', 'wshk_onsalebdsize');
    	register_setting('wshk_options', 'wshk_onsalebdtype');
    	register_setting('wshk_options', 'wshk_onsalebdcolor');
    	register_setting('wshk_options', 'wshk_onsalebdradius');
    	register_setting('wshk_options', 'wshk_onsaletextsize');
    	register_setting('wshk_options', 'wshk_onsaletxtweight');
    	register_setting('wshk_options', 'wshk_onsaleftcolor');
    	register_setting('wshk_options', 'wshk_onsaletxttransf');
    	register_setting('wshk_options', 'wshk_onsalepadding');
    	
    	
    	register_setting( 'wshk_options', 'wshk_enablebought');
    	register_setting( 'wshk_options', 'wshk_buttontext');
    	register_setting( 'wshk_options', 'wshk_enablectbp');
    	register_setting( 'wshk_options', 'wshk_textprefix'); 
    	register_setting( 'wshk_options', 'wshk_textsuffix');
    	register_setting( 'wshk_options', 'wshk_textpsuffix');
    	register_setting( 'wshk_options', 'wshk_textnobp');
    	register_setting( 'wshk_options', 'wshk_enablectbo');
    	register_setting( 'wshk_options', 'wshk_tordersprefix');
    	register_setting( 'wshk_options', 'wshk_torderssuffix');
    	register_setting( 'wshk_options', 'wshk_torderspsuffix');
    	register_setting( 'wshk_options', 'wshk_textnobo');
    	register_setting( 'wshk_options', 'wshk_enablewmessage');
    	register_setting( 'wshk_options', 'wshk_wmorders');
    	register_setting( 'wshk_options', 'wshk_textwmssg');
    	register_setting( 'wshk_options', 'wshk_textsales');
    	register_setting( 'wshk_options', 'wshk_minsales');
    	register_setting( 'wshk_options', 'wshk_nonotice');
    	register_setting( 'wshk_options', 'wshk_morenotice');
    	register_setting( 'wshk_options', 'wshk_enablereviews');
    	register_setting( 'wshk_options', 'wshk_textavsize');
    	register_setting( 'wshk_options', 'wshk_textavbdsize');
    	register_setting( 'wshk_options', 'wshk_textavbdradius');
    	register_setting( 'wshk_options', 'wshk_textavbdtype');
    	register_setting( 'wshk_options', 'wshk_textavbdcolor');
    	register_setting( 'wshk_options', 'wshk_texttbwsize');
    	register_setting( 'wshk_options', 'wshk_textbxfsize');
    	register_setting( 'wshk_options', 'wshk_textbxbdsize');
    	register_setting( 'wshk_options', 'wshk_textbxbdradius');
    	register_setting( 'wshk_options', 'wshk_textbxbdtype');
    	register_setting( 'wshk_options', 'wshk_textbxbdcolor');
    	register_setting( 'wshk_options', 'wshk_textbxbgcolor');
    	register_setting( 'wshk_options', 'wshk_textbtnbdsize');
    	register_setting( 'wshk_options', 'wshk_textbtnbdradius');
    	register_setting( 'wshk_options', 'wshk_textbtnbdtype');
    	register_setting( 'wshk_options', 'wshk_textbtnbdcolor');
    	register_setting( 'wshk_options', 'wshk_textbtntarget');
    	register_setting( 'wshk_options', 'wshk_textbtntxd');
    	
    	/*Nuevas opciones desde v.1.7.8*/
    	register_setting( 'wshk_options', 'wshk_enablemydownloadsht');
    	register_setting( 'wshk_options', 'wshk_enablemyaddressessht');
    	register_setting( 'wshk_options', 'wshk_enablemypaymentsht');
    	register_setting( 'wshk_options', 'wshk_enablemyeditaccsht');
    	register_setting( 'wshk_options', 'wshk_enabledashbsht');
    	register_setting( 'wshk_options', 'wshk_enabletheipsht');
    	register_setting( 'wshk_options', 'wshk_enablethenamesurnsht');
    	register_setting( 'wshk_options', 'wshk_enabletheuseremailsht');
    	register_setting( 'wshk_options', 'wshk_enablethetotsalessht');
    	register_setting( 'wshk_options', 'wshk_enablethetotprosht');
    	register_setting( 'wshk_options', 'wshk_enabletheboughtsht');
    	/*FIN nuevas opciones*/
    	
    	/*since 1.8.4*/
    	register_setting( 'wshk_options', 'wshk_enablethetotsalesamount');
    	register_setting( 'wshk_options', 'wshk_blockadmredirect');
    	register_setting( 'wshk_options', 'wshk_tablaymod');
    	
    	/*since 1.8.5*/
    	register_setting( 'wshk_options', 'wshk_nosendusers');
    	register_setting( 'wshk_options', 'wshk_disablenewdashboardwc');
    	
    	/*Since 1.8.7*/
    	register_setting( 'wshk_options', 'wshk_displaywoonotices');
    	register_setting( 'wshk_options', 'wshk_userinmenuoptions');
    	
    	/*Since 1.8.9*/
    	register_setting( 'wshk_options', 'wshk_sales_sht_one');
    	register_setting( 'wshk_options', 'wshk_sales_sht_two');
    	register_setting( 'wshk_options', 'wshk_sales_sht_three');
    	register_setting( 'wshk_options', 'wshk_sales_sht_four');
    	register_setting( 'wshk_options', 'wshk_myfilesizelimit');
    	register_setting( 'wshk_options', 'wshk_displaycustavatartoo');
    	
    	/*Since 1.9.0*/
    	register_setting( 'wshk_options', 'wshk_get_terms_hide');
    	register_setting( 'wshk_options', 'wshk_get_pol_hide');
    	register_setting( 'wshk_options', 'wshk_enablepropurchtimes' );
    	
    	/*Since 2.0.0*/
    	register_setting( 'wshk_options', 'wshk_enableuserrole' );
    	register_setting( 'wshk_options', 'wshk_userroleoptions' );
    	
    	
    	register_setting( 'wshk_options', 'wshk_yesenable');
    	register_setting( 'wshk_options', 'wshk_yesenabletwo');
    	register_setting( 'wshk_options', 'wshk_yesenablethree');
    	register_setting( 'wshk_options', 'wshk_nnoenable');
    	register_setting( 'wshk_options', 'wshk_nnoenabletwo');
    	register_setting( 'wshk_options', 'wshk_nnoenablethree');
    	
    	register_setting( 'wshk_options', 'wshk_alignthereviews');
    	register_setting( 'wshk_options', 'wshk_aligntheorders');
    	register_setting( 'wshk_options', 'wshk_aligntheproducts');
    	
    	register_setting( 'wshk_options', 'wshk_enabledisplayreviews');
    	register_setting( 'wshk_options', 'wshk_disretextavsize');
    	register_setting( 'wshk_options', 'wshk_disretextavbdsize');
    	register_setting( 'wshk_options', 'wshk_disretextavbdradius');
    	register_setting( 'wshk_options', 'wshk_disretextavbdtype');
    	register_setting( 'wshk_options', 'wshk_disretextavbdcolor');
    	register_setting( 'wshk_options', 'wshk_disretexttbwsize');
    	register_setting( 'wshk_options', 'wshk_disretextbxfsize');
    	register_setting( 'wshk_options', 'wshk_disretextmargintop');
    	register_setting( 'wshk_options', 'wshk_disretextbxbdsize');
    	register_setting( 'wshk_options', 'wshk_disretextbxbdradius');
    	register_setting( 'wshk_options', 'wshk_disretextbxbdtype');
    	register_setting( 'wshk_options', 'wshk_disretextbxbdcolor');
    	register_setting( 'wshk_options', 'wshk_disretextbxbgcolor');
    	register_setting( 'wshk_options', 'wshk_disretextbxpadding');
    	register_setting( 'wshk_options', 'wshk_disretextbxminheight');
    	register_setting( 'wshk_options', 'wshk_disretextcolor');
    	register_setting( 'wshk_options', 'wshk_numbrevdis');
    	register_setting( 'wshk_options', 'wshk_showpoints');
    	register_setting( 'wshk_options', 'wshk_limitcomm');
    	register_setting( 'wshk_options', 'wshk_readmoretextlim');
    	
    	register_setting( 'wshk_options', 'wshk_enableorderscontrol');
    	register_setting( 'wshk_options', 'wshk_numeropedidos');
    	
    	register_setting( 'wshk_options', 'wshk_bougcolumnum');
    	
    	
    	
    	register_setting( 'wshk_options', 'wshk_disretextlinktarget');
    	register_setting( 'wshk_options', 'wshk_disretextlinktxd');
    	register_setting( 'wshk_options', 'wshk_disretextlinktxtsize');
    	register_setting( 'wshk_options', 'wshk_disretextlinktxtcolor');
    	
    	register_setting( 'wshk_options', 'wshk_disredisplaynumber');
    	register_setting( 'wshk_options', 'wshk_disrecolumnsnumber');
    	
    	
    	register_setting( 'wshk_options', 'wshk_enablerwcounter');
    	register_setting( 'wshk_options', 'wshk_treviewprefix');
    	register_setting( 'wshk_options', 'wshk_treviewsuffix');
    	register_setting( 'wshk_options', 'wshk_treviewpsuffix');
    	register_setting( 'wshk_options', 'wshk_textnoreview');
    	register_setting( 'wshk_options', 'wshk_enableusername');
    	register_setting( 'wshk_options', 'wshk_usernmtc');
    	register_setting( 'wshk_options', 'wshk_usernmts');
    	register_setting( 'wshk_options', 'wshk_usernmta');
    	register_setting( 'wshk_options', 'wshk_enablelogoutbtn');
    	register_setting( 'wshk_options', 'wshk_logbtnbdsize');
    	register_setting( 'wshk_options', 'wshk_logbtnbdradius');
    	register_setting( 'wshk_options', 'wshk_logbtnbdtype');
    	register_setting( 'wshk_options', 'wshk_logbtnbdcolor');
    	register_setting( 'wshk_options', 'wshk_logbtntd');
    	register_setting( 'wshk_options', 'wshk_logbtnta');
    	register_setting( 'wshk_options', 'wshk_logbtnwd');
    	register_setting( 'wshk_options', 'wshk_logbtntext');
    	register_setting( 'wshk_options', 'wshk_enableloginform');
    	register_setting( 'wshk_options', 'wshk_loginredi');
    	register_setting( 'wshk_options', 'wshk_blockmya');
    	register_setting( 'wshk_options', 'wshk_enableaddtocarttxt');
    	register_setting( 'wshk_options', 'wshk_atctxtexternal');
    	register_setting( 'wshk_options', 'wshk_atctxtgrouped');
    	register_setting( 'wshk_options', 'wshk_atctxtsimple');
    	register_setting( 'wshk_options', 'wshk_atctxtvariable');
    	/*register_setting( 'wshk_options', 'wshk_atctxtntin');    */
    	register_setting( 'wshk_options', 'wshk_textbxpadding');
    	register_setting( 'wshk_options', 'wshk_textbtntxt');
    	register_setting( 'wshk_options', 'wshk_avshadow');
    	register_setting( 'wshk_options', 'wshk_textusernmpf');
    	register_setting( 'wshk_options', 'wshk_textusernmsf');
    	register_setting( 'wshk_options', 'wshk_enablegravatar');
    	register_setting( 'wshk_options', 'wshk_textgravasize');
    	register_setting( 'wshk_options', 'wshk_textgravashd');
    	register_setting( 'wshk_options', 'wshk_textgravabdsz');
    	register_setting( 'wshk_options', 'wshk_textgravabdtp');
    	register_setting( 'wshk_options', 'wshk_textgravabdcl');
    	register_setting( 'wshk_options', 'wshk_textgravabdrd');
    	register_setting( 'wshk_options', 'wshk_emailordersizes');
    	register_setting( 'wshk_options', 'wshk_excludecat');
    	register_setting( 'wshk_options', 'wshk_exfirstcat');
    	register_setting( 'wshk_options', 'wshk_exsecondcat');
    	register_setting( 'wshk_options', 'wshk_exthirdcat');
    	register_setting( 'wshk_options', 'wshk_enablecustomenu');
    	register_setting( 'wshk_options', 'wshk_menulocation');
    	register_setting( 'wshk_options', 'wshk_logmenu');
    	register_setting( 'wshk_options', 'wshk_nonlogmenu');
    	register_setting( 'wshk_options', 'wshk_enableshtmenu');
    	register_setting( 'wshk_options', 'wshk_enableuserinmenu');
    	register_setting( 'wshk_options', 'wshk_enablesloginsec');
    	register_setting( 'wshk_options', 'wshk_enablesadminbar');
    	register_setting( 'wshk_options', 'wshk_enablerestrictctnt');
    	register_setting( 'wshk_options', 'wshk_enableoffctnt');
    	register_setting( 'wshk_options', 'wshk_btnlogoutredi');
    	register_setting( 'wshk_options', 'wshk_showusername');
    	register_setting( 'wshk_options', 'wshk_showonlyname');
    	register_setting( 'wshk_options', 'wshk_showdisplay');
    	
    	register_setting( 'wshk_options', 'wshk_enableautocom');
    	register_setting( 'wshk_options', 'wshk_enableacustomshopage');
    	register_setting( 'wshk_options', 'wshk_shopageslug');
    	register_setting( 'wshk_options', 'wshk_enablehidelogerror');
    	register_setting( 'wshk_options', 'wshk_hidelogerrorcustomessage');
    	register_setting( 'wshk_options', 'wshk_enablesecheaders');

    	
    	register_setting( 'wshk_options', 'wshk_enableacustomthankyoupage');
    	register_setting( 'wshk_options', 'wshk_customthankyouoneid');
    	register_setting( 'wshk_options', 'wshk_customthankyouone');
    	register_setting( 'wshk_options', 'wshk_customthankyoutwoid');
    	register_setting( 'wshk_options', 'wshk_customthankyoutwo');
    	register_setting( 'wshk_options', 'wshk_customthankyouthreeid');
    	register_setting( 'wshk_options', 'wshk_customthankyouthree');
    	register_setting( 'wshk_options', 'wshk_customthankyougeneral');
    	
    	register_setting( 'wshk_options', 'wshk_gprdiread');
    	register_setting( 'wshk_options', 'wshk_gprdurlslug');
    	register_setting( 'wshk_options', 'wshk_gprdpolit');
    	register_setting( 'wshk_options', 'wshk_gprderror');
    	register_setting( 'wshk_options', 'wshk_gprduserlegalinfo');
    	register_setting( 'wshk_options', 'wshk_gprdsettings');
    	register_setting( 'wshk_options', 'wshk_gprdcomments');
    	register_setting( 'wshk_options', 'wshk_gprdorders');
    	register_setting( 'wshk_options', 'wshk_gprdreviews');
    	register_setting( 'wshk_options', 'wshk_gprdcomveri');
    	register_setting( 'wshk_options', 'wshk_gprdordveri');
    	register_setting( 'wshk_options', 'wshk_gprdrewveri');
    	register_setting( 'wshk_options', 'wshk_gprdregveri');
    	register_setting( 'wshk_options', 'wshk_gprdwcregisterform');
    	register_setting( 'wshk_options', 'wshk_wcregisterformfieldsextra');
    	/*Since v.1.8.6*/
    	register_setting( 'wshk_options', 'wshk_gprdireadcomments');
    	register_setting( 'wshk_options', 'wshk_gprdireadcheckout');
    	register_setting( 'wshk_options', 'wshk_gprdireadreviews');
    	register_setting( 'wshk_options', 'wshk_gprdireadregister');
    	/*end 1.8.6*/
    	
    	
    	register_setting( 'wshk_options', 'wshk_wcnewtermsbox ');
    	register_setting( 'wshk_options', 'wshk_termstexto');
    	register_setting( 'wshk_options', 'wshk_termslink');
    	register_setting( 'wshk_options', 'wshk_termstextlink');
        register_setting( 'wshk_options', 'wshk_enableskipcart');
    	
    	register_setting( 'wshk_options', 'wshk_gprdcommentsbdsize');
    	register_setting( 'wshk_options', 'wshk_gprdcommentsbdtype');
    	register_setting( 'wshk_options', 'wshk_gprdcommentsbdcolor');
    	register_setting( 'wshk_options', 'wshk_gprdcommentsbdradius');
    	register_setting( 'wshk_options', 'wshk_gprdcommentspadding');
    	register_setting( 'wshk_options', 'wshk_gprdcommentsbgcolor');
    	
    	register_setting( 'wshk_options', 'wshk_gprdcheckoutbdsize');
    	register_setting( 'wshk_options', 'wshk_gprdcheckoutbdtype');
    	register_setting( 'wshk_options', 'wshk_gprdcheckoutbdcolor');
    	register_setting( 'wshk_options', 'wshk_gprdcheckoutbdradius');
    	register_setting( 'wshk_options', 'wshk_gprdcheckoutpadding');
    	register_setting( 'wshk_options', 'wshk_gprdcheckoutbgcolor');
    	
    	register_setting( 'wshk_options', 'wshk_gprdreviewsbdsize');
    	register_setting( 'wshk_options', 'wshk_gprdreviewsbdtype');
    	register_setting( 'wshk_options', 'wshk_gprdreviewsbdcolor');
    	register_setting( 'wshk_options', 'wshk_gprdreviewsbdradius');
    	register_setting( 'wshk_options', 'wshk_gprdreviewspadding');
    	register_setting( 'wshk_options', 'wshk_gprdreviewsbgcolor');
    	
    	register_setting( 'wshk_options', 'wshk_gprdregisterbdsize');
    	register_setting( 'wshk_options', 'wshk_gprdregisterbdtype');
    	register_setting( 'wshk_options', 'wshk_gprdregisterbdcolor');
    	register_setting( 'wshk_options', 'wshk_gprdregisterbdradius');
    	register_setting( 'wshk_options', 'wshk_gprdregisterpadding');
    	register_setting( 'wshk_options', 'wshk_gprdregisterbgcolor');
    	
    	
    	/*EMAB*/
    	register_setting( 'wshk_options', 'wshk_enablesemab');
    	
    	register_setting( 'wshk_options', 'wshk_enablescontntdash');
    	register_setting( 'wshk_options', 'wshk_editdashb');
    	register_setting( 'wshk_options', 'wshk_editaftdashb');
    	
    	register_setting( 'wshk_options', 'wshk_enablescontntord');
    	register_setting( 'wshk_options', 'wshk_editorde');
    	register_setting( 'wshk_options', 'wshk_editaftorde');
    	
    	register_setting( 'wshk_options', 'wshk_enablescontntdow');
    	register_setting( 'wshk_options', 'wshk_editdown');
    	register_setting( 'wshk_options', 'wshk_editaftdown');
    	
    	register_setting( 'wshk_options', 'wshk_enablescontntadd');
    	register_setting( 'wshk_options', 'wshk_editaddre');
    	register_setting( 'wshk_options', 'wshk_editaftaddre');
    	
    	register_setting( 'wshk_options', 'wshk_enablescontntpay');
    	register_setting( 'wshk_options', 'wshk_editpaym');
    	register_setting( 'wshk_options', 'wshk_editaftpaym');
    	
    	register_setting( 'wshk_options', 'wshk_enablescontntrev');
    	register_setting( 'wshk_options', 'wshk_editrevi');
    	register_setting( 'wshk_options', 'wshk_editaftrevi');
    	
    	register_setting( 'wshk_options', 'wshk_enablescontntedi');
    	register_setting( 'wshk_options', 'wshk_editedit');
    	register_setting( 'wshk_options', 'wshk_editaftedit');
    	
    	register_setting( 'wshk_options', 'wshk_enablescontntlog');
    	register_setting( 'wshk_options', 'wshk_editlogo');
    	register_setting( 'wshk_options', 'wshk_editaftlogo');
    	
    	register_setting( 'wshk_options', 'wshk_tabsbdsize');
    	register_setting( 'wshk_options', 'wshk_tabsbdtype');
    	register_setting( 'wshk_options', 'wshk_tabsbdcolor');
    	register_setting( 'wshk_options', 'wshk_tabsbdradius');
    	
    	register_setting( 'wshk_options', 'wshk_tabspdtop');
    	register_setting( 'wshk_options', 'wshk_tabspdright');
    	register_setting( 'wshk_options', 'wshk_tabspdbottom');
    	register_setting( 'wshk_options', 'wshk_tabspdleft');
    	
    	register_setting( 'wshk_options', 'wshk_tabstxtsize');
    	register_setting( 'wshk_options', 'wshk_tabstxtcolor');
    	register_setting( 'wshk_options', 'wshk_tabstxtalign');
    	register_setting( 'wshk_options', 'wshk_tabstxtdeco');
    	
    	register_setting( 'wshk_options', 'wshk_tabsbgcolor');
    	register_setting( 'wshk_options', 'wshk_tabswdsize');
    	register_setting( 'wshk_options', 'wshk_tabshgsize');
    	
    	
    	register_setting( 'wshk_options', 'wshk_actabsbdsize');
    	register_setting( 'wshk_options', 'wshk_actabsbdtype');
    	register_setting( 'wshk_options', 'wshk_actabsbdcolor');
    	register_setting( 'wshk_options', 'wshk_actabsbdradius');
    	
    	register_setting( 'wshk_options', 'wshk_actabstxtcolor');
    	register_setting( 'wshk_options', 'wshk_actabstxtdeco');
    	register_setting( 'wshk_options', 'wshk_actabsbgcolor');
    	
    	
    	register_setting( 'wshk_options', 'wshk_hotabsbdsize');
    	register_setting( 'wshk_options', 'wshk_hotabsbdtype');
    	register_setting( 'wshk_options', 'wshk_hotabsbdcolor');
    	register_setting( 'wshk_options', 'wshk_hotabsbdradius');
    	
    	register_setting( 'wshk_options', 'wshk_hotabstxtcolor');
    	register_setting( 'wshk_options', 'wshk_hotabstxtdeco');
    	register_setting( 'wshk_options', 'wshk_hotabsbgcolor');
    	
    	register_setting( 'wshk_options', 'wshk_contbbdsize');
    	register_setting( 'wshk_options', 'wshk_contbbdtype');
    	register_setting( 'wshk_options', 'wshk_contbbdcolor');
    	register_setting( 'wshk_options', 'wshk_contbbdradius');
    	
    	register_setting( 'wshk_options', 'wshk_contbpdtop');
    	register_setting( 'wshk_options', 'wshk_contbpdright');
    	register_setting( 'wshk_options', 'wshk_contbpdbottom');
    	register_setting( 'wshk_options', 'wshk_contbpdleft');
    	
    	register_setting( 'wshk_options', 'wshk_contbctheight');
    	register_setting( 'wshk_options', 'wshk_contbctbgcolor');
    	
    	register_setting( 'wshk_options', 'wshk_keeplastab');
    	register_setting( 'wshk_options', 'wshk_choosingstyles');
    	
    	
    	register_setting( 'wshk_options', 'wshk_icondashb');
    	register_setting( 'wshk_options', 'wshk_iconorder');
    	register_setting( 'wshk_options', 'wshk_icondownl');
    	register_setting( 'wshk_options', 'wshk_iconaddre');
    	register_setting( 'wshk_options', 'wshk_iconpayme');
    	register_setting( 'wshk_options', 'wshk_iconrevie');
    	register_setting( 'wshk_options', 'wshk_iconedita');
    	register_setting( 'wshk_options', 'wshk_iconlogou');
    	
    	/*WSHK PRO*/
    	register_setting( 'wshk_options', 'wshk_enablescusre');
    	register_setting( 'wshk_options', 'wshk_vieworderid');
    	register_setting( 'wshk_options', 'wshk_miaddressesid');
    	register_setting( 'wshk_options', 'wshk_mipaymentsid');
    	register_setting( 'wshk_options', 'wshk_viewsubscriptionid');
    	
    	
    	register_setting( 'wshk_options', 'wshk_enablecustomblockss');
    	
    	register_setting( 'wshk_options', 'wshk_enablescusrecharts');
    	
    	register_setting( 'wshk_options', 'wshk_tbcharttitleone');
    	register_setting( 'wshk_options', 'wshk_tbcharttitletwo');
    	register_setting( 'wshk_options', 'wshk_tbcharttitletres');
    	register_setting( 'wshk_options', 'wshk_tbcharttitlefour');
    	register_setting( 'wshk_options', 'wshk_tbcharttitlefive');
    	register_setting( 'wshk_options', 'wshk_tbcharttitlesix');
    	register_setting( 'wshk_options', 'wshk_tbcharttitleseven');
    	
    	register_setting( 'wshk_options', 'wshk_occharttitleone');
    	register_setting( 'wshk_options', 'wshk_occharttitletwo');
    	register_setting( 'wshk_options', 'wshk_occharttitletres');
    	register_setting( 'wshk_options', 'wshk_occharttitlefour');
    	register_setting( 'wshk_options', 'wshk_occharttitlefive');
    	register_setting( 'wshk_options', 'wshk_occharttitlesix');
    	register_setting( 'wshk_options', 'wshk_occharttitleoseven');
    	
    	register_setting( 'wshk_options', 'wshk_enablebillinguserdata');
    	register_setting( 'wshk_options', 'wshk_enableshippinguserdata');
    	register_setting( 'wshk_options', 'wshk_enabletotalspender');
    	register_setting( 'wshk_options', 'wshk_enableordercountser');
    	register_setting( 'wshk_options', 'wshk_enableproimage');
    	
    	register_setting( 'wshk_options', 'wshk_prodimagesize');
    	register_setting( 'wshk_options', 'wshk_prodimagebordsize');
    	register_setting( 'wshk_options', 'wshk_prodimagebordtype');
    	register_setting( 'wshk_options', 'wshk_prodimagebordcolor');
    	register_setting( 'wshk_options', 'wshk_prodimagebordradius');
    	
    	
    	
    	register_setting( 'wshk_options', 'wshk_onlyoneincartt');
    	register_setting( 'wshk_options', 'wshk_productsincart');
    	
    	register_setting( 'wshk_options', 'wshk_returntoshopbtn');
    	register_setting( 'wshk_options', 'wshk_retshopbtntext');
    	register_setting( 'wshk_options', 'wshk_retshopurlredi');
    	
    	register_setting( 'wshk_options', 'wshk_enableelemtbdetect');
    	
    	register_setting( 'wshk_options', 'wshk_enablesubscription');
    	register_setting( 'wshk_options', 'wshk_enablesubscriptionshortcode');
    	
    	/*cbar v.1.0.8*/
    	register_setting( 'wshk_options', 'wshk_enablecustomeravataruploader');
    	register_setting( 'wshk_options', 'wshk_enablecustomeravatarshortcode');
    	/*cbar v.1.0.9 -now WSHK PRO*/
    	register_setting( 'wshk_options', 'wshk_enablecustomblockselementor');
    	register_setting( 'wshk_options', 'wshk_enablewshkshortcodeselementor');
    	register_setting( 'wshk_options', 'wshk_enablewshkcustomelemlibrary');
    	register_setting( 'wshk_options', 'wshk_enablerestrictcategories');
    	/*WSHK PRO v.1.1.0*/
    	register_setting( 'wshk_options', 'wshk_enabledivitbdetect');
    	register_setting( 'wshk_options', 'wshk_customdivitabsmodule');
    	register_setting( 'wshk_options', 'wshk_customdivitextsmodule');
    	//WSHK PRO v.1.1.2
    	register_setting( 'wshk_options', 'wshk_enablemembershipcompat');
    	register_setting( 'wshk_options', 'wshk_viewmembershipid');
    	//WSHK PRO v.1.1.9
    	register_setting( 'wshk_options', 'wshk_enableprototsalamocats');
    	register_setting( 'wshk_options', 'wshk_enableprototsalcountcats');
    	
    	
    	
	}
	add_action( 'admin_init', 'wshk_register_settings' );
	endif;
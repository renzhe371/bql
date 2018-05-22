<?php
$db_amdin = array(
	"admin_id"=>array("text"=>"管理员ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"admin_name"=>array("text"=>"管理员名","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"admin_password"=>array("text"=>"管理员密码","type"=>"alnum","minlength"=>"0","maxlength"=>"100","isNull"=>"N")
	,"permission"=>array("text"=>"管理员权限","type"=>"num","minlength"=>"0","maxlength"=>"1","isNull"=>"S")
	,"last_login_time"=>array("text"=>"最近一次登录时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")

);

$db_company = array(
	"company_name"=>array("text"=>"公司名称","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"keywords"=>array("text"=>"关键词","type"=>"text","minlength"=>"0","maxlength"=>"300","isNull"=>"")
	,"description"=>array("text"=>"描 述","type"=>"text","minlength"=>"0","maxlength"=>"300","isNull"=>"")
	,"title"=>array("text"=>"标 题","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"qq"=>array("text"=>"客服QQ","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"email"=>array("text"=>"电子邮箱","type"=>"text","minlength"=>"0","maxlength"=>"200","isNull"=>"")
	,"about"=>array("text"=>"企业介绍","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
  ,"ceospeech"=>array("text"=>"董事长致辞","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"organization"=>array("text"=>"组织架构","type"=>"text","minlength"=>"0","maxlength"=>"100000000","isNull"=>"")
  ,"image"=>array("text"=>"企业形象","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"culture"=>array("text"=>"企业文化","type"=>"text","minlength"=>"0","maxlength"=>"10000","isNull"=>"")
  ,"certification"=>array("text"=>"荣誉证书","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
  ,"law"=>array("text"=>"法律声明","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"strategy"=>array("text"=>"人才策略","type"=>"text","minlength"=>"0","maxlength"=>"10000","isNull"=>"")
  ,"social"=>array("text"=>"社会招聘","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"campus"=>array("text"=>"校园招聘","type"=>"text","minlength"=>"0","maxlength"=>"10000","isNull"=>"")
  ,"contact"=>array("text"=>"联系我们","type"=>"text","minlength"=>"0","maxlength"=>"10000","isNull"=>"") 
  ,"service"=>array("text"=>"服务政策","type"=>"text","minlength"=>"0","maxlength"=>"10000","isNull"=>"")
  ,"network"=>array("text"=>"招商服务政策","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"download"=>array("text"=>"下载中心","type"=>"text","minlength"=>"0","maxlength"=>"10000","isNull"=>"")
  ,"customer"=>array("text"=>"联系客服","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
  ,"map"=>array("text"=>"网站地图","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
  ,"link"=>array("text"=>"友情连接","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
  ,"security"=>array("text"=>"隐私保护","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
);

$db_investor = array(
	
	"develop"=>array("text"=>"企业发展","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"manager"=>array("text"=>"高管介绍","type"=>"text","minlength"=>"0","maxlength"=>"10000","isNull"=>"")
	,"stock"=>array("text"=>"股票信息","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"report"=>array("text"=>"分析报告","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"way"=>array("text"=>"联系方式","type"=>"text","minlength"=>"0","maxlength"=>"10000","isNull"=>"")
	,"relations"=>array("text"=>"投资者关系","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
);

$db_chanye = array(
	
	"hardware"=>array("text"=>"咨询服务","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"internet"=>array("text"=>"体验服务","type"=>"text","minlength"=>"0","maxlength"=>"10000","isNull"=>"")
	,"newmedia"=>array("text"=>"客户支持","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
);

$db_tech = array(
	
	"tech_id"=>array("text"=>"信息ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"tech_name"=>array("text"=>"信息标题","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"N")
	,"tech_content"=>array("text"=>"信息内容","type"=>"text","minlength"=>"0","maxlength"=>"1000000","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_chanyem = array(
	
	"carm"=>array("text"=>"汽车视像","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"tezm"=>array("text"=>"特种视像","type"=>"text","minlength"=>"0","maxlength"=>"10000","isNull"=>"")
	,"minym"=>array("text"=>"民用视像","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"shangym"=>array("text"=>"商用视像","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"anfm"=>array("text"=>"安防视像","type"=>"text","minlength"=>"0","maxlength"=>"10000","isNull"=>"")
	,"zihm"=>array("text"=>"智慧视像","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
);

$db_notice = array(
	"notice_id"=>array("text"=>"信息ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"notice_title"=>array("text"=>"信息标题","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"N")
	,"notice_title_en"=>array("text"=>"信息标题（英文）","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"notice_pdf"=>array("text"=>"pdf文档","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"notice_content"=>array("text"=>"信息内容","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"notice_content_en"=>array("text"=>"信息内容（英文）","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_report = array(
	"report_id"=>array("text"=>"信息ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"report_title"=>array("text"=>"信息标题","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"N")
	,"report_title_en"=>array("text"=>"信息标题（英文）","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"report_pdf"=>array("text"=>"pdf文档","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"report_content"=>array("text"=>"信息内容","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"report_content_en"=>array("text"=>"信息内容（英文）","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_job_category = array(
	"category_id"=>array("text"=>"分类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_name"=>array("text"=>"分类名","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"parent_id"=>array("text"=>"父类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_job = array(
	"job_id"=>array("text"=>"信息ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"job_jobs"=>array("text"=>"招聘岗位","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"N")
	,"place"=>array("text"=>"工作地点","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"N")
	,"gender"=>array("text"=>"招聘性别","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"age"=>array("text"=>"招聘年龄","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"treatment"=>array("text"=>"工资待遇","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"professional"=>array("text"=>"专业技能","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"N")
	,"schooling"=>array("text"=>"学历文凭","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"N")
	,"number"=>array("text"=>"招聘人数","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"linit"=>array("text"=>"有效期限","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"N")
	,"category_id"=>array("text"=>"排列","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"title"=>array("text"=>"招聘信息","type"=>"text","minlength"=>"0","maxlength"=>"20000","isNull"=>"N")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_news_category = array(
	"category_id"=>array("text"=>"分类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_name"=>array("text"=>"分类名","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"category_name_en"=>array("text"=>"分类名（英文）","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"parent_id"=>array("text"=>"父类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_news = array(
	"news_id"=>array("text"=>"信息ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"news_title"=>array("text"=>"信息标题","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"N")
	,"news_title2"=>array("text"=>"信息副标题","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"news_title_en"=>array("text"=>"信息标题（英文）","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"category_id"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"news_from"=>array("text"=>"来源","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"news_from_en"=>array("text"=>"来源（英文）","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"author"=>array("text"=>"作者","type"=>"text","minlength"=>"0","maxlength"=>"10","isNull"=>"")
	,"author_en"=>array("text"=>"作者（英文）","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"image_path"=>array("text"=>"信息图片","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"news_content"=>array("text"=>"信息内容","type"=>"text","minlength"=>"0","maxlength"=>"1000000","isNull"=>"")
	,"news_ms"=>array("text"=>"文字描述","type"=>"text","minlength"=>"0","maxlength"=>"1000000","isNull"=>"")
	,"news_content_en"=>array("text"=>"信息内容（英文）","type"=>"text","minlength"=>"0","maxlength"=>"1000000","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"case_status"=>array("text"=>"案例状态","type"=>"num","minlength"=>"0","maxlength"=>"1","isNull"=>"")
	,"case_corp"=>array("text"=>"案例分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_pic_category = array(
	"category_id"=>array("text"=>"分类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_name"=>array("text"=>"分类名","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_picnews = array(
	"image_id"=>array("text"=>"图片ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
    ,"image_name"=>array("text"=>"图片名称","type"=>"text","minlength"=>"0","maxlength"=>"200","isNull"=>"N")
	,"image_name2"=>array("text"=>"图片简介","type"=>"text","minlength"=>"0","maxlength"=>"200","isNull"=>"")
	,"category_id"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"image_path"=>array("text"=>"信息图片","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"image_path2"=>array("text"=>"信息小图","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"description"=>array("text"=>"图片描述","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_picdesc = array(
	"desc_id"=>array("text"=>"图片ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
    ,"desc_name"=>array("text"=>"图片名称","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"N")
	,"category_id"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"image_path"=>array("text"=>"图片报道","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"description"=>array("text"=>"图片描述","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_djs_category = array(
	"category_id"=>array("text"=>"分类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_name"=>array("text"=>"分类名","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"N")
	,"parent_id"=>array("text"=>"父类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_djs = array(
	"djs_id"=>array("text"=>"信息ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"djs_title"=>array("text"=>"大记事年月","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"djs_content"=>array("text"=>"大记事内容","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"N")
	,"category_id"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"djs_from"=>array("text"=>"来源","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"author"=>array("text"=>"作者","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"image_path"=>array("text"=>"大记事图片","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);


$db_video_category = array(
	"category_id"=>array("text"=>"分类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_name"=>array("text"=>"分类名","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"parent_id"=>array("text"=>"父类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_video = array(
	"video_id"=>array("text"=>"信息ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"video_title"=>array("text"=>"信息标题","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"N")
	,"category_id"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"video_from"=>array("text"=>"来源","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"author"=>array("text"=>"作者","type"=>"text","minlength"=>"0","maxlength"=>"10","isNull"=>"")
	,"image_path"=>array("text"=>"信息图片","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"video_flv"=>array("text"=>"上传flv视频","type"=>"text","minlength"=>"0","maxlength"=>"10000","isNull"=>"")
	,"video_mp4"=>array("text"=>"上传mp4视频","type"=>"text","minlength"=>"0","maxlength"=>"10000","isNull"=>"")
	,"video_content"=>array("text"=>"信息内容","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_service_category = array(
	"category_id"=>array("text"=>"分类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_name"=>array("text"=>"分类名","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"category_name_en"=>array("text"=>"分类名（英文）","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"parent_id"=>array("text"=>"父类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_service = array(
	"service_id"=>array("text"=>"信息ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"service_title"=>array("text"=>"信息标题","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"N")
	,"service_title_en"=>array("text"=>"信息标题（英文）","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"category_id"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"service_from"=>array("text"=>"来源","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"service_from_en"=>array("text"=>"来源（英文）","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"author"=>array("text"=>"作者","type"=>"text","minlength"=>"0","maxlength"=>"10","isNull"=>"")
	,"author_en"=>array("text"=>"作者（英文）","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"image_path"=>array("text"=>"信息图片","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"service_content"=>array("text"=>"信息内容","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"service_content_en"=>array("text"=>"信息内容（英文）","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_case = array(
	"case_id"=>array("text"=>"方案ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"case_name"=>array("text"=>"方案名","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"N")
	,"case_name_en"=>array("text"=>"方案名（英文）","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"category_id"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"S")
	,"image_path"=>array("text"=>"方案图片","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"case_ms"=>array("text"=>"方案简单描述","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"case_content"=>array("text"=>"方案内容","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"case_content_en"=>array("text"=>"方案内容（英文）","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);


$db_case_category = array(
	"category_id"=>array("text"=>"分类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_name"=>array("text"=>"分类名","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"category_name_en"=>array("text"=>"分类名（英文）","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"parent_id"=>array("text"=>"父类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_market = array(
	"market_id"=>array("text"=>"专题ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"market_name"=>array("text"=>"专题名","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"N")
	,"market_name_en"=>array("text"=>"专题名（英文）","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"category_id"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"S")
	,"image_path"=>array("text"=>"视频报道图片","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"image_path2"=>array("text"=>"专题焦点图片","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"intro"=>array("text"=>"活动简介","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"visitor"=>array("text"=>"媒体专访","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"video_content"=>array("text"=>"视频报道内容","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"media"=>array("text"=>"相关媒体","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"market_content"=>array("text"=>"专题内容","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"market_content_en"=>array("text"=>"专题内容（英文）","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);


$db_market_category = array(
	"category_id"=>array("text"=>"分类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_name"=>array("text"=>"分类名","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"category_name_en"=>array("text"=>"分类名（英文）","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"parent_id"=>array("text"=>"父类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_market_flv = array(
	"flv_id"=>array("text"=>"视频ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"flv_name"=>array("text"=>"视频名称","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"N")
	,"category_id"=>array("text"=>"专题分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"image_path"=>array("text"=>"视频图片","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"flv_news"=>array("text"=>"视频报道","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"video_mp4"=>array("text"=>"手机视频报道","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_market_image = array(
	"image_id"=>array("text"=>"图片ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
    ,"image_name"=>array("text"=>"图片名称","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"N")
	,"category_id"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"image_path"=>array("text"=>"图片报道","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"description"=>array("text"=>"图片描述","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);


$db_market_zhibo_image = array(
	"image_id"=>array("text"=>"图片ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
    ,"image_name"=>array("text"=>"图片名称","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"N")
	,"category_id"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"image_path"=>array("text"=>"直播图片","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"image_path2"=>array("text"=>"VR图片","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"description"=>array("text"=>"图片描述","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);


$db_h5_category = array(
	"category_id"=>array("text"=>"分类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_name"=>array("text"=>"分类名","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
);

$db_zhibo_h5 = array(
	"img_id"=>array("text"=>"图片ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_id"=>array("text"=>"专题分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"hid"=>array("text"=>"活动分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
    ,"img_title"=>array("text"=>"H5名称","type"=>"text","minlength"=>"0","maxlength"=>"200","isNull"=>"N")
	,"img_path"=>array("text"=>"H5图片","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"image_path2"=>array("text"=>"H5大图","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
    ,"img_url"=>array("text"=>"H5链接","type"=>"text","minlength"=>"0","maxlength"=>"200","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_market_other = array(
    "other_id"=>array("text"=>"其它ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
    ,"category_id"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
    ,"other_name"=>array("text"=>"其它名称","type"=>"text","minlength"=>"0","maxlength"=>"200","isNull"=>"N")
    ,"other_url"=>array("text"=>"其它链接","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"N")
    ,"image_path"=>array("text"=>"其它图片","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
    ,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
    ,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
    ,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_market_live = array(
	"image_id"=>array("text"=>"图片ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"image_name"=>array("text"=>"图片名称","type"=>"text","minlength"=>"0","maxlength"=>"200","isNull"=>"")
	,"category_id"=>array("text"=>"分类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_id"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"image_path"=>array("text"=>"现场图片","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_market_media = array(
	"media_id"=>array("text"=>"视频ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"media_title"=>array("text"=>"视频标题","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"N")
	,"category_id"=>array("text"=>"专题分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"cate_id"=>array("text"=>"视频分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"image_path"=>array("text"=>"视频图片","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"media_news"=>array("text"=>"视频合辑","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"media_mp4"=>array("text"=>"手机视频合辑","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"description"=>array("text"=>"视频描述","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_media_category = array(
	"category_id"=>array("text"=>"分类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_name"=>array("text"=>"分类名","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_zhibo = array(
	"zb_id"=>array("text"=>"直播ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"zb_title"=>array("text"=>"直播标题","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"N")
	,"zb_url"=>array("text"=>"直播链接","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"N")
	,"category_id"=>array("text"=>"专题分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"zb_status"=>array("text"=>"直播状态","type"=>"num","minlength"=>"0","maxlength"=>"1","isNull"=>"")
	,"image_path"=>array("text"=>"直播焦点图","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"image_path2"=>array("text"=>"直播二维码图片","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"image_path3"=>array("text"=>"直播缩略图","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"order_num"=>array("text"=>"在线人数","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"content"=>array("text"=>"直播描述","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"最后更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_status = array(
	"status_id"=>array("text"=>"ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"status_name"=>array("text"=>"直播状态","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")

);


$db_active = array(
	"active_id"=>array("text"=>"ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"category_id"=>array("text"=>"专题分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"active_title"=>array("text"=>"活动名称","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"active_content"=>array("text"=>"活动内容","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")

);


$db_message = array(
	"message_id"=>array("text"=>"ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"message_title"=>array("text"=>"留言标题","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"N")
	,"name"=>array("text"=>"留言人姓名","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"tel"=>array("text"=>"联系电话","type"=>"tel","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"email"=>array("text"=>"EMAIL","type"=>"email","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"company_name"=>array("text"=>"咨询或建议","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"company_tel"=>array("text"=>"公司电话","type"=>"tel","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"company_fax"=>array("text"=>"公司传真","type"=>"tel","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"company_address"=>array("text"=>"公司地址","type"=>"text","minlength"=>"0","maxlength"=>"300","isNull"=>"")
	,"content"=>array("text"=>"留言内容","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"read_state"=>array("text"=>"查阅状态","type"=>"num","minlength"=>"0","maxlength"=>"1","isNull"=>"")
	,"reply_state"=>array("text"=>"回复状态","type"=>"num","minlength"=>"0","maxlength"=>"1","isNull"=>"")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")

);

$db_post = array(
	"pid"=>array("text"=>"ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"category_id"=>array("text"=>"分类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"nick_name"=>array("text"=>"昵称","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"tel"=>array("text"=>"手机号码","type"=>"tel","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"content"=>array("text"=>"留言内容","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"status"=>array("text"=>"查阅状态","type"=>"num","minlength"=>"0","maxlength"=>"1","isNull"=>"")
	,"creat_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")

);

$db_reply = array(
	"rid"=>array("text"=>"ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"pid"=>array("text"=>"ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"r_nick_name"=>array("text"=>"回复昵称","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"r_email"=>array("text"=>"回复EMAIL","type"=>"email","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"r_content"=>array("text"=>"回复内容","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"r_status"=>array("text"=>"回复状态","type"=>"num","minlength"=>"0","maxlength"=>"1","isNull"=>"")
	,"r_creat_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")

);
$db_corp = array(
	"corp_id"=>array("text"=>"公司ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"corp_name"=>array("text"=>"公司名","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"corp_logo"=>array("text"=>"公司LOGO","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
);

$db_corp_category = array(
	"category_id"=>array("text"=>"分类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"category_name"=>array("text"=>"分类名","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"parent_id"=>array("text"=>"父类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
);

$db_soft = array(
	"soft_id"=>array("text"=>"软件ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"soft_cid"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"soft_name"=>array("text"=>"软件名称","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"soft_img"=>array("text"=>"信息图片","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"soft_url"=>array("text"=>"下载链接","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"soft_hits"=>array("text"=>"访问次数","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"soft_sys"=>array("text"=>"支持系统","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"soft_size"=>array("text"=>"软件大小","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"description"=>array("text"=>"软件描述","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"content"=>array("text"=>"软件详情","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
);

$db_train = array(
	"train_id"=>array("text"=>"培训ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"train_corp"=>array("text"=>"培训公司","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"train_content"=>array("text"=>"培训内容","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
);

$db_policy = array(
	"id"=>array("text"=>"政策ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_id"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"name"=>array("text"=>"政策名称","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"content"=>array("text"=>"内容详情","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
);

$db_intro = array(
	"id"=>array("text"=>"说明ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_id"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"name"=>array("text"=>"说明名称","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"content"=>array("text"=>"内容详情","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
);

$db_customer = array(
	"id"=>array("text"=>"售后ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_id"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"name"=>array("text"=>"售后名称","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"content"=>array("text"=>"内容详情","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
);

$db_exper = array(
	"id"=>array("text"=>"ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_id"=>array("text"=>"所属分类","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"name"=>array("text"=>"店名","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"c_name"=>array("text"=>"联系人1","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"c_phone"=>array("text"=>"联系电话1","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"c_name2"=>array("text"=>"联系人2","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"c_phone2"=>array("text"=>"联系电话2","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"address"=>array("text"=>"店址","type"=>"text","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"postcode"=>array("text"=>"邮编","type"=>"text","minlength"=>"0","maxlength"=>"6","isNull"=>"")
	,"jingw"=>array("text"=>"经纬度","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"image_path"=>array("text"=>"缩略图","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"img_path1"=>array("text"=>"信息图片1","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"img_path2"=>array("text"=>"信息图片2","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"img_path3"=>array("text"=>"信息图片3","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"img_path4"=>array("text"=>"信息图片4","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
);

$db_exper_category = array(
	"category_id"=>array("text"=>"分类ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"category_name"=>array("text"=>"分类名","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"image_path"=>array("text"=>"信息图片","type"=>"text","minlength"=>"0","maxlength"=>"1000","isNull"=>"")
	,"order_num"=>array("text"=>"排序号","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
);

$db_gymessage = array(
	"gyId"=>array("text"=>"ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"gyName"=>array("text"=>"供应商姓名","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"gyCname"=>array("text"=>"公司名称","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"N")
	,"gyAddress"=>array("text"=>"公司地址","type"=>"text","minlength"=>"0","maxlength"=>"300","isNull"=>"N")
	,"gyTel"=>array("text"=>"供应商电话","type"=>"tel","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"gyEmail"=>array("text"=>"供应商EMAIL","type"=>"email","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"gyProduct"=>array("text"=>"供应产品","type"=>"text","minlength"=>"0","maxlength"=>"200","isNull"=>"")
	,"gyNum"=>array("text"=>"供应数量","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"gyPrice"=>array("text"=>"供应价格","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"gyLevel"=>array("text"=>"代理级别","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"gyRegist"=>array("text"=>"注册资金","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"gySale"=>array("text"=>"年销售额","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"gyContent"=>array("text"=>"留言内容","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"readState"=>array("text"=>"查阅状态","type"=>"num","minlength"=>"0","maxlength"=>"1","isNull"=>"")
	,"replyState"=>array("text"=>"回复状态","type"=>"num","minlength"=>"0","maxlength"=>"1","isNull"=>"")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")

);

$db_jxmessage = array(
	"jxId"=>array("text"=>"ID","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"N")
	,"jxName"=>array("text"=>"经销商姓名","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"jxCname"=>array("text"=>"公司名称","type"=>"text","minlength"=>"0","maxlength"=>"50","isNull"=>"N")
	,"jxAddress"=>array("text"=>"公司地址","type"=>"text","minlength"=>"0","maxlength"=>"300","isNull"=>"N")
	,"jxTel"=>array("text"=>"经销商电话","type"=>"tel","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"jxEmail"=>array("text"=>"经销商EMAIL","type"=>"email","minlength"=>"0","maxlength"=>"100","isNull"=>"")
	,"jxProduct"=>array("text"=>"经销产品","type"=>"text","minlength"=>"0","maxlength"=>"200","isNull"=>"")
	,"jxNum"=>array("text"=>"经销数量","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"jxPrice"=>array("text"=>"经销价格","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"jxLevel"=>array("text"=>"代理级别","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"jxRegist"=>array("text"=>"注册资金","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"jxSale"=>array("text"=>"年销售额","type"=>"num","minlength"=>"0","maxlength"=>"5","isNull"=>"")
	,"jxContent"=>array("text"=>"留言内容","type"=>"text","minlength"=>"0","maxlength"=>"100000","isNull"=>"")
	,"readState"=>array("text"=>"查阅状态","type"=>"num","minlength"=>"0","maxlength"=>"1","isNull"=>"")
	,"replyState"=>array("text"=>"回复状态","type"=>"num","minlength"=>"0","maxlength"=>"1","isNull"=>"")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")

);

$db_accesslog = array(
	"log_id"=>array("text"=>"日志ID","type"=>"num","minlength"=>"0","maxlength"=>"10","isNull"=>"N")
	,"access_ip"=>array("text"=>"访问IP","type"=>"text","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"access_time"=>array("text"=>"访问时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"N")
	,"code"=>array("text"=>"省份代码","type"=>"text","minlength"=>"0","maxlength"=>"2","isNull"=>"N")
	,"create_time"=>array("text"=>"创建时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")
	,"update_time"=>array("text"=>"更新时间","type"=>"date","minlength"=>"0","maxlength"=>"20","isNull"=>"")

);

?>
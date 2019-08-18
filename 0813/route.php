<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/16
 * Time: 9:19
 */
//web端路由
return array(
    'URL_ROUTE_RULES'=>array(
        /* 'news/:year/:month/:day' => array('News/archive', 'status=1'),
         'news/:id'               => 'News/read',
    'news/read/:id'          => '/news/:1', */

        //格式如：design/4-7-8-9.html  URL：design/index?key=4-7-8-9
        //'/^design\/((\w|-|%)+)$/' => 'design/index?key=:1',      //设计馆列表
        '/^design\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'design/index?key=:1',      //设计馆列表
        '/^design\/info\/((\w|-)+)$/'    => 'design/info?key=:1',       //设计馆详情
        '/^design\/map\/((\w|-)+)$/'    => 'design/map?key=:1',       //地图设计馆
        '/^design\/ablums\/((\w|-)+)$/'    => 'design/ablums?key=:1',   //相册

        //'/^fhome\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u'   => 'fhome/index?key=:1',    //楼盘列表  网址含 中文
        '/^fhome\/index\/((\w|-|%)+)$/' => 'fhome/index?key=:1',       //楼盘列表    网址含  %
        '/^fhome\/info\/((\w|-)+)$/'     => 'fhome/info?key=:1',        //楼盘详情
        '/^fhome\/map\/((\w|-)+)$/'     => 'fhome/map?key=:1',        //地图楼盘详情
        '/^fhome\/show\/((\w|-)+)$/'     => 'fhome/show?key=:1',        //预览楼盘详情
        '/^fhome\/unit\/((\w|-)+)$/'     => 'fhome/unit?key=:1',       //户型筛选
        '/^fhome\/deswin\/((\w|-)+)$/'   => 'fhome/deswin?key=:1',     //方案筛选
        '/^fhome\/sms\/((\w|-)+)$/'     => 'fhome/sms?key=:1',       //发送手机

        '/^buyhouse\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u'        => 'buyhouse/index?key=:1',    //买房子列表
        '/^buyhouse\/info\/((\w|-)+)$/'  => 'buyhouse/info?key=:1',     //买房子详情
        '/^buyhouse\/unit\/((\w|-)+)$/'     => 'buyhouse/unit?key=:1',       //户型筛选
        '/^buyhouse\/deswin\/((\w|-)+)$/'   => 'buyhouse/deswin?key=:1',     //方案筛选

        '/^housetype\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u'       => 'housetype/index?key=:1',   //户型列表
        '/^housetype\/info\/((\w|-)+)$/' => 'housetype/info?key=:1',    //户型详情
        '/^housetype\/show\/((\w|-)+)$/' => 'housetype/show?key=:1',    //预览户型详情
        '/^ranking\/ranklist\/((\w|-|%)+)$/' => 'ranking/ranklist?key=:1',//各角色排行版
        '/^Ranklist\/ranklist_new\/((\w|-|%)+)$/' => 'Ranklist/ranklist_new?key=:1',//各角色排行版

        '/^designwin\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u'       => 'designwin/index?key=:1',   //设计方案列表
        '/^designwin\/info\/((\w|-)+)$/' => 'designwin/info?key=:1',    //设计方案详情
        '/^designwin\/show\/((\w|-)+)$/' => 'designwin/show?key=:1',    //预览设计方案详情
        '/^designwin\/dpage\/((\w|-)+)$/'=> 'designwin/dpage?pages=:1', // ok
        '/^designwin\/mydesigndetail\/((\w|-)+)$/'=> 'designwin/mydesigndetail?key=:1', // 方案详情
        '/^designwin\/mydesignfview\/((\w|-)+)$/'=> 'designwin/mydesignfview?key=:1', //全景上传表单页面
        '/^designwin\/mydesign\/((\w|-)+)$/'=> 'designwin/mydesign', //方案上传页面
        '/^designwin\/mydesignlist\/((\w|-)+)$/'=> 'designwin/mydesignlist', //方案列表
        '/^designwin\/myfviewupload\/((\w|-)+)$/'=> 'designwin/myfviewupload', //全景上传地址
        '/^designwin\/mydesignupload\/((\w|-)+)$/'=> 'designwin/mydesignupload', //设计方案上传

        '/^designwin\/detail\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'designwin/detail?key=:1',//设计方案详情
        '/^designwin\/evaluation_content\/((\w|-)+)$/'  => 'designwin/evaluation_content?key=:1',
        '/^designwin\/getOfferChoose\/([A-Za-z0-9_\-\s]+)$/u' => 'designwin/getOfferChoose?key=:1',//设计方案中-施工询价/委托施工

        //'/^chargdesign\/((\w|-|%)+)$/' => 'chargdesign/index?key=:1',//收费设计师列表
        //'/^chargdesign\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'chargdesign/index?key=:1',//收费设计师列表
        '/^chargdesign\/info\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'chargdesign/info?key=:1',//收费设计师列表
        '/^chargdesign\/deswin\/((\w|-)+)$/'   => 'chargdesign/deswin?key=:1', //方案筛选
        '/^designer\/((\w|-|%)+)$/' => 'designer/index?key=:1',//免费设计师列表
        '/^chargdesign\/other\/((\w|-)+)$/'   => 'chargdesign/other?key=:1', //方案筛选

        //'/^super\/((\w|-|%)+)$/'       => 'super/index?key=:1',   //监理列表
        '/^super\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u'       => 'super/index?key=:1',   //监理列表
        '/^super\/info\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'super/info?key=:1',   //监理列表
        '/^foreman\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'foreman/index?key=:1', //工长详情
        '/^foreman\/info\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'foreman/info?key=:1', //工长详情
        '/^foreman\/save\/((\w|-)+)$/'     => 'foreman/save?key=:1',        //工长对比
        '/^foreman\/remove\/((\w|-)+)$/'     => 'foreman/remove?key=:1',        //工长对比删除

        //'/^decorate\/((\w|-|%)+)$/'  => 'decorate/index?key=:1',    //装企列表
        // '/^decorate\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u'  => 'decorate/index?key=:1',    //装企列表
        '/^decorate\/info\/((\w|-)+)$/'  => 'decorate/info?key=:1',     //装企详情
        '/^decorate\/referencesite_detail\/((\w|-)+)$/'  => 'decorate/referencesite_detail?key=:1',//工地详情
        '/^decorate\/freferencesite\/((\w|-)+)$/'  => 'decorate/freferencesite?key=:1',//工地列表
        '/^decorate\/deswin\/((\w|-)+)$/'  => 'decorate/deswin?key=:1', //方案筛选
        '/^decorate\/save\/((\w|-)+)$/'     => 'decorate/save?key=:1',        //装企对比
        '/^decorate\/remove\/((\w|-)+)$/'     => 'decorate/remove?key=:1',        //装企对比删除
        '/^decorate\/fconstruction_compare\/((\w|-)+)$/'  => 'decorate/fconstruction_compare?key=:1', //装企对比详情

        '/^decorate\/detail\/((\w|-)+)$/'  => 'decorate/detail?key=:1',     //装企详情-v2
        '/^decorate\/decorate_pack_list\/((\w|-)+)$/'  => 'decorate/decorate_pack_list?key=:1',     //找套餐-v2
        '/^decorate\/design_win\/((\w|-)+)$/'  => 'decorate/design_win?key=:1',     //装企实像设计-v2
        '/^decorate\/project\/((\w|-)+)$/'  => 'decorate/project?key=:1',     //装企工程案例-v2
        '/^decorate\/design_team\/((\w|-)+)$/'  => 'decorate/design_team?key=:1',     //装企设计团队-v2
        '/^decorate\/gongyi\/((\w|-)+)$/'  => 'decorate/gongyi?key=:1',     //装企工艺-v2
        '/^decorate\/visit_construct\/((\w|-)+)$/'  => 'decorate/visit_construct?key=:1',     //装企参考工地-v2
        '/^decorate\/visit_construct_detail\/((\w|-)+)\/((\w|-)+)$/'  => 'decorate/visit_construct_detail?key=:1&order_no=:3',     //装企参考工地详情-v2
        '/^decorate\/evaluation\/((\w|-)+)$/'  => 'decorate/evaluation?key=:1',     //装企-客户评价-v2
        '/^decorate\/evaluation_content\/((\w|-)+)$/'  => 'decorate/evaluation_content?key=:1',     //装企-客户评价-内容-v2
        '/^decorate\/introduce\/((\w|-)+)$/'  => 'decorate/introduce?key=:1',     //装企-企业介绍-v2

        //'/^products\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u'   => 'products/index?key=:1',    //淘商品
        '/^products\/productwinlist\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u'   => 'products/productwinlist?key=:1',    //淘商品
        '/^products\/lists\/((\w|-)+)$/' => 'products/lists?key=:1',    //找特惠
        '/^products\/info\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u'   => 'products/info?key=:1',    //商品详情
        '/^products\/show\/((\w|-)+)$/'  => 'products/show?key=:1',   //商品详情
        '/^products\/info_new\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u'   => 'products/info_new?key=:1',    //淘商品(新)

        '/^supplier\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u'        => 'supplier/index?key=:1',    //供应商列表
        '/^supplier\/info\/((\w|-)+)$/'  => 'supplier/info?key=:1',     //供应商详情

        '/^mydesign\/((\w|-|%)+)$/'        => 'mydesign/index?key=:1',    //客户设计订单列表
        '/^mydesign\/index\/((\w|-)+)$/'  => 'mydesign/index?key=:1',     //客户设计订单详情
        '/^mydesign\/info\/((\w|-)+)$/'  => 'mydesign/info?key=:1',     //客户设计订单详情
        '/^mydesign\/refund\/((\w|-)+)$/'  => 'mydesign/refund?key=:1',     //退单详情
        '/^mydesign\/refundback\/((\w|-)+)$/'  => 'mydesign/refundback',     //退单(保存数据)
        '/^mydesign\/backorder\/((\w|-)+)$/'  => 'mydesign/backorder',     //取消订单
        '/^mydesign\/designchange\/((\w|-)+)$/'  => 'mydesign/designchange',     //设计订单变更需求
        '/^mydesign\/mychangelist\/((\w|-)+)$/'  => 'mydesign/mychangelist',     //设计订单变更需求列表
        '/^mydesign\/mychangeorder\/((\w|-)+)$/'  => 'mydesign/mychangeorder',     //设计订单变更需求列表
        '/^mydesign\/delaydaynum\/((\w|-)+)$/'  => 'mydesign/delaydaynum',     //延期收图
        '/^mydesign\/optimization\/((\w|-)+)$/'  => 'mydesign/optimization',     //继续优化查询应付金额
        '/^mydesign\/jxoptimization\/((\w|-)+)$/'  => 'mydesign/jxoptimization',     //继续优化查询应付金额confirmreceipt
        '/^mydesign\/confirmreceipt\/((\w|-)+)$/'  => 'mydesign/confirmreceipt',     //收图查询金额
        '/^mydesign\/confirmreceiptimg\/((\w|-)+)$/'  => 'mydesign/confirmreceiptimg',     //收图
        '/^mydesign\/paytopt\/((\w|-)+)$/'  => 'mydesign/paytopt',     //付款到平台

        '/^designerorder\/((\w|-|%)+)$/'        => 'designerorder/index?key=:1',    //设计师订单列表
        '/^designerorder\/info\/((\w|-)+)$/'  => 'designerorder/info?key=:1',     //设计师计订单详情
        '/^designerorder\/designchange\/((\w|-)+)$/'  => 'designerorder/designchange',     //设计师变更需求
        '/^designerorder\/orderprice\/((\w|-)+)$/'  => 'designerorder/orderprice',     //查询价格
        '/^designerorder\/changeprice\/((\w|-)+)$/'  => 'designerorder/changeprice',     //调价
        '/^designerorder\/baketz\/((\w|-)+)$/'  => 'designerorder/baketz',     //退款通知
        '/^designerorder\/refuse\/((\w|-)+)$/'  => 'designerorder/refuse',     //拒绝退款agree
        '/^designerorder\/agree\/((\w|-)+)$/'  => 'designerorder/agree',     //同意退款
        '/^designerorder\/myorders\/((\w|-)+)$/'  => 'designerorder/myorders',     //接单
        '/^designerorder\/refuseorders\/((\w|-)+)$/'  => 'designerorder/refuseorders',     //接单

        '/^orderconstruct\/index\/((\w|-)+)$/'        => 'orderconstruct/index?key=:1',    //委托施工订单
        '/^orderconstruct\/consulting\/((\w|-)+)$/'        => 'orderconstruct/consulting?key=:1',    //咨询单修改为委托施工订
        '/^orderdesign\/freeinde\/((\w|-)+)$/'  => 'orderdesign/freeindex?key=:1',     //委托收费设计
        '/^orderdesign\/index\/((\w|-)+)$/'  => 'orderdesign/index?key=:1',    //委托免费设计
        '/^ordersupervision\/index\/((\w|-)+)$/'  => 'ordersupervision/index?key=:1',    //委托监理设计

        '/^myconstruction\/index\/((\w|-)+)$/'  => 'myconstruction/index?key=:1',     //客户施工订单列表
        '/^myconstruction\/info\/((\w|-)+)$/'  => 'myconstruction/info?key=:1',     //客户施工订单详情
        '/^workerconstruction\/index\/((\w|-)+)$/'        => 'workerconstruction/index?key=:1',    //施工方订单列表
        '/^workerconstruction\/info\/((\w|-)+)$/'  => 'workerconstruction/info?key=:1',     //施工方订单详情
        '/^workerconstruction\/adjusted\/((\w|-)+)$/'  => 'workerconstruction/adjusted?key=:1',     //施工方咨询单

        '/^mysupervision\/index\/((\w|-)+)$/'  => 'mysupervision/index?key=:1',     //客户监理订单列表
        '/^mysupervision\/info\/((\w|-)+)$/'  => 'mysupervision/info?key=:1',     //客户监理订单详情
        '/^workersupervision\/index\/((\w|-)+)$/'        => 'workersupervision/index?key=:1',    //监理方订单列表
        '/^workersupervision\/info\/((\w|-)+)$/'  => 'workersupervision/info?key=:1',     //监理方订单详情

        '/^orderdesign\/updateroom\/((\w|-)+)$/'  => 'orderdesign/updateroom?key=:1',     //委托收费设计
        '/^orderdesign\/submitorder\/((\w|-)+)$/'  => 'orderdesign/submitorder?key=:1',//委托收费设计提交订单
        '/^orderdesign\/charg\/((\w|-)+)$/'  => 'orderdesign/charg?key=:1',
        '/^ordersupervision\/updateorder\/((\w|-)+)$/'  => 'ordersupervision/updateorder?key=:1',//监理下单页

        '/^orderproject\/index\/((\w|-)+)$/'  => 'orderproject/index?key=:1',//本案委托施工

        '/^aboutus\/index\/((\w|-)+)$/'  => 'aboutus/index?key=:1',//关于我们
        // '/^helpcenter\/((\w|-)+)$/'  => 'helpcenter/index?key=:1',//帮助中心
        '/^helpcenter\/index\/((\w|-|%)+)$/' => 'helpcenter/index?key=:1',      //帮助中心

        '/^lighting\/save\/((\w|-)+)$/'     => 'lighting/save?key=:1',        //点灯
        '/^lighting\/getname\/((\w|-)+)$/'     => 'lighting/getname?key=:1',        //点灯

        '/^goodsdesigner\/index\/((\w|-)+)$/'  => 'goodsdesigner/index?key=:1',//同步商品设计师列表
        '/^goodsdesigner\/synccommodity\/((\w|-)+)$/'  => 'goodsdesigner/synccommodity',//同步商品设计师
        '/^goodsconstruct\/index\/((\w|-)+)$/'  => 'goodsconstruct/index?key=:1',//业主同步给施工方商品表
        '/^goodsconstruct\/synccommodity\/((\w|-)+)$/'  => 'goodsconstruct/synccommodity',//业主同步给施工方商品

        '/^materialProduct\/index\/((\w|-)+)$/'  => 'materialProduct/index?key=:1',//材料商添加商品首页(新版)
        '/^materialProduct\/editGood\/((\w|-)+)$/'  => 'materialProduct/editGood?key=:1',//商品编辑页面
        '/^materialtrader\/index\/((\w|-)+)$/'  => 'materialtrader/index?key=:1',//材料商添加商品首页
        '/^materialtrader\/modellist\/((\w|-)+)$/'  => 'materialtrader/modellist',//模型列表1
        '/^materialtrader\/modellistcategory\/((\w|-)+)$/'  => 'materialtrader/modellistcategory',//模型列表2*根据类别查询
        '/^materialtrader\/catagorynest\/((\w|-)+)$/'  => 'materialtrader/catagorynest',//下一级分类
        '/^materialtrader\/commodityinfo\/((\w|-)+)$/'  => 'materialtrader/commodityinfo?key=:1',//商品详细页面
        '/^materialtrader\/getarea\/((\w|-)+)$/'  => 'materialtrader/getarea',//获取城市
        '/^materialtrader\/addsuccess\/((\w|-)+)$/'  => 'materialtrader/addsuccess?key=:1',//添加商品完成页面
        //'/^materialtrader\/goodlist\/((\w|-|%)+)$/' => 'materialtrader/goodlist?key=:1',//商品列表
        '/^materialtrader\/goodlist\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'materialtrader/goodlist?key=:1',//商品列表
        '/^materialtrader\/goodedit\/((\w|-)+)$/'  => 'materialtrader/goodedit?key=:1',//商品编辑页面
        '/^materialtrader\/info\/((\w|-)+)$/'  => 'materialtrader/info?key=:1',//查看商品页面
        '/^materialtrader\/get_spec_list\/((\w|-)+)$/'  => 'materialtrader/get_spec_list',//查询规格商品列表
        '/^materialtrader\/shopadd\/((\w|-)+)$/'  => 'materialtrader/shopadd',//上传商品
        '/^materialtrader\/batchshelf\/((\w|-)+)$/'  => 'materialtrader/batchshelf',//批量下架
        '/^materialtrader\/gooddel\/((\w|-)+)$/'  => 'materialtrader/gooddel',//删除单个商品
        '/^materialtrader\/gooddelall\/((\w|-)+)$/'  => 'materialtrader/gooddelall',//删除多个商品
        '/^materialtrader\/qrcode\/((\w|-)+)$/'  => 'materialtrader/qrcode?key=:1',//商品二维码


        '/^myengineering\/info\/((\w|-)+)$/'     => 'myengineering/info?key=:1',        //我的工程
        '/^myengineering\/index\/((\w|-)+)$/'     => 'myengineering/index?key=:1',        //我的工程列表
        '/^myengineering\/constructing\/((\w|-)+)$/'     => 'myengineering/constructing?key=:1',        //我的工程管理
        '/^myengineering\/accessories\/((\w|-)+)$/'     => 'myengineering/accessories?key=:1',        //辅料验收1
        '/^myengineering\/accessories2\/((\w|-)+)$/'     => 'myengineering/accessories2?key=:1',        //辅料验收2
        '/^myengineering\/agreement\/((\w|-)+)$/'     => 'myengineering/agreement?key=:1',        //施工合同
        '/^myengineering\/completion\/((\w|-)+)$/'     => 'myengineering/completion?key=:1',        //竣工验收报告
        '/^myengineering\/controlog\/((\w|-)+)$/'     => 'myengineering/controlog?key=:1',        //施工日志
        '/^myengineering\/change\/((\w|-)+)$/'     => 'myengineering/change?key=:1',        //项目变更
        '/^myengineering\/changereport\/((\w|-)+)$/'     => 'myengineering/changereport?key=:1',        //项目变更日志
        '/^myengineering\/goods\/((\w|-)+)$/'     => 'myengineering/goods?key=:1',        //原房物品移交表
        '/^myengineering\/goodsrt\/((\w|-)+)$/'     => 'myengineering/goodsrt?key=:1',        //原房物品归还表
        '/^myengineering\/handover\/((\w|-)+)$/'     => 'myengineering/handover?key=:1',        //原房交接验收表
        '/^myengineering\/lofting\/((\w|-)+)$/'     => 'myengineering/lofting?key=:1',        //放样验收表
        '/^myengineering\/midphase\/((\w|-)+)$/'     => 'myengineering/midphase?key=:1',        //中期验收报告
        '/^myengineering\/permit\/((\w|-)+)$/'     => 'myengineering/permit?key=:1',        //施工许可证
        '/^myengineering\/prophase\/((\w|-)+)$/'     => 'myengineering/prophase?key=:1',        //前期验收报告
        '/^myengineering\/report\/((\w|-)+)$/'     => 'myengineering/report?key=:1',        //收方报告
        '/^myengineering\/report2\/((\w|-)+)$/'     => 'myengineering/report2?key=:1',        //收方报告
        '/^myengineering\/schedule\/((\w|-)+)$/'     => 'myengineering/schedule?key=:1',        //工期暂停
        '/^myengineering\/propchesub\/((\w|-)+)$/'     => 'myengineering/propchesub?key=:1',        //验收报告
        '/^myengineering\/pause\/((\w|-)+)$/'     => 'myengineering/pause?key=:1',        //暂停详情
        '/^myengineering\/delay\/((\w|-)+)$/'     => 'myengineering/delay?key=:1',        //延期详情
        '/^myengineering\/schapply\/((\w|-)+)$/'     => 'myengineering/schapply?key=:1',        //申请者查看工期变更
        '/^myengineering\/history\/((\w|-)+)$/'     => 'myengineering/history?key=:1',        //变更记录
        '/^myengineering\/consealpic\/((\w|-)+)$/'     => 'myengineering/consealpic?key=:1',        //隐蔽相片
        '/^myengineering\/returnwork\/((\w|-)+)$/'     => 'myengineering/returnwork?key=:1',        //复工
        '/^myengineering\/material\/((\w|-)+)$/'     => 'myengineering/material?key=:1',        //辅材变更

        '/^getbackpassword\/index\/((\w|-)+)$/'  => 'getbackpassword/index?key=:1', //找回密码



        '/^businessshopedit\/infoedit\/((\w|-)+)$/'  => 'businessshopedit/infoedit?key=:1', //店铺信息
        '/^businessshopedit\/detailedit\/((\w|-)+)$/'  => 'businessshopedit/detailedit?key=:1', //店铺信息
        '/^businessshopedit\/storeedit\/((\w|-)+)$/'  => 'businessshopedit/storeedit?key=:1', //店铺信息
        '/^businessshopedit\/aftersaleserviceedit\/((\w|-)+)$/'  => 'businessshopedit/aftersaleserviceedit?key=:1', //店铺信息
        '/^businessshopedit\/banneradd\/((\w|-)+)$/'  => 'businessshopedit/banneradd?key=:1', //店铺信息


        '/^workerprojectmgr\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'workerprojectmgr/index?key=:1',      //工程管理列表



        '/^workerprojectmgr\/schedule\/((\w|-)+)$/'  => 'workerprojectmgr/schedule?key=:1', //工程管理生成进度表
        '/^workerprojectmgr\/constructing\/((\w|-)+)$/'  => 'workerprojectmgr/constructing?key=:1', //工程管理施工中
        '/^workerprojectmgr\/handover\/((\w|-)+)$/'  => 'workerprojectmgr/handover?key=:1', //原房基础设施交接验收表
        '/^workerprojectmgr\/spotfoods\/((\w|-)+)$/'  => 'workerprojectmgr/spotfoods?key=:1', //现场物品移交确认单
        '/^workerprojectmgr\/permit\/((\w|-)+)$/'  => 'workerprojectmgr/permit?key=:1', //开工许可证
        '/^workerprojectmgr\/accessories\/((\w|-)+)$/'  => 'workerprojectmgr/accessories?key=:1', //辅料验收表
        '/^workerprojectmgr\/lofting\/((\w|-)+)$/'  => 'workerprojectmgr/lofting?key=:1', //施工放样验收表
        '/^workerprojectmgr\/change\/((\w|-)+)$/'     => 'workerprojectmgr/change?key=:1',        //项目变更
        '/^workerprojectmgr\/changereport\/((\w|-)+)$/'     => 'workerprojectmgr/changereport?key=:1',        //项目变更日志
        '/^workerprojectmgr\/prophase\/((\w|-)+)$/'  => 'workerprojectmgr/prophase?key=:1', //前期报告
        '/^workerprojectmgr\/propfview\/((\w|-)+)$/'  => 'workerprojectmgr/propfview?key=:1', //前期报告全景
        '/^workerprojectmgr\/propfback\/((\w|-)+)$/'  => 'workerprojectmgr/propfback?key=:1', //前期验收提交
        '/^workerprojectmgr\/propchesub\/((\w|-)+)$/'  => 'workerprojectmgr/propchesub?key=:1', //整改
        '/^workerprojectmgr\/propchepass\/((\w|-)+)$/'  => 'workerprojectmgr/propchepass?key=:1', //整改报告
        '/^workerprojectmgr\/report\/((\w|-)+)$/'  => 'workerprojectmgr/report?key=:1', //收方报告
        '/^workerprojectmgr\/report2\/((\w|-)+)$/'  => 'workerprojectmgr/report2?key=:1', //收方报告2
        '/^workerprojectmgr\/controlog\/((\w|-)+)$/'  => 'workerprojectmgr/controlog?key=:1', //施工日志
        '/^workerprojectmgr\/history\/((\w|-)+)$/'     => 'workerprojectmgr/history?key=:1',        //变更记录
        '/^workerprojectmgr\/consealpic\/((\w|-)+)$/'     => 'workerprojectmgr/consealpic?key=:1',        //隐蔽相片
        '/^workerprojectmgr\/returnwork\/((\w|-)+)$/'     => 'workerprojectmgr/returnwork?key=:1',        //复工
        '/^workerprojectmgr\/pause\/((\w|-)+)$/'     => 'workerprojectmgr/pause?key=:1',        //暂停详情
        '/^workerprojectmgr\/delay\/((\w|-)+)$/'     => 'workerprojectmgr/delay?key=:1',        //延期详情
        '/^workerprojectmgr\/schapply\/((\w|-)+)$/'     => 'workerprojectmgr/schapply?key=:1',        //申请者查看工期变更
        '/^workerprojectmgr\/material\/((\w|-)+)$/'     => 'workerprojectmgr/material?key=:1',        //辅材变更
        '/^workerprojectmgr\/materialinfo\/((\w|-)+)$/'     => 'workerprojectmgr/materialinfo?key=:1',        //辅材变更

        '/^supervisionprojectmgr\/index\/((\w|-)+)$/'  => 'supervisionprojectmgr/index?key=:1', //工程管理列表
        '/^supervisionprojectmgr\/constructing\/((\w|-)+)$/'  => 'supervisionprojectmgr/constructing?key=:1', //工程管理施工中
        '/^supervisionprojectmgr\/handover\/((\w|-)+)$/'  => 'supervisionprojectmgr/handover?key=:1', //原房基础设施交接验收表
        '/^supervisionprojectmgr\/spotfoods\/((\w|-)+)$/'  => 'supervisionprojectmgr/spotfoods?key=:1', //现场物品移交确认单
        '/^supervisionprojectmgr\/permit\/((\w|-)+)$/'  => 'supervisionprojectmgr/permit?key=:1', //开工许可证
        '/^supervisionprojectmgr\/completed\/((\w|-)+)$/'  => 'supervisionprojectmgr/completed?key=:1', //工程管理完工
        '/^supervisionprojectmgr\/lofting\/((\w|-)+)$/'  => 'supervisionprojectmgr/lofting?key=:1', //放样验收表
        '/^supervisionprojectmgr\/accessories\/((\w|-)+)$/'  => 'supervisionprojectmgr/accessories?key=:1', //放样验收表
        '/^supervisionprojectmgr\/report\/((\w|-)+)$/'  => 'supervisionprojectmgr/report?key=:1', //收方报告
        '/^supervisionprojectmgr\/report2\/((\w|-)+)$/'  => 'supervisionprojectmgr/report2?key=:1', //收方报告2
        '/^supervisionprojectmgr\/controlog\/((\w|-)+)$/'  => 'supervisionprojectmgr/controlog?key=:1', //施工日志
        '/^supervisionprojectmgr\/prophase\/((\w|-)+)$/'  => 'supervisionprojectmgr/prophase?key=:1', //前期验收报告
        '/^supervisionprojectmgr\/propfback\/((\w|-)+)$/'  => 'supervisionprojectmgr/propfback?key=:1', //前期验收提交
        '/^supervisionprojectmgr\/propchesub\/((\w|-)+)$/'  => 'supervisionprojectmgr/propchesub?key=:1', //整改
        '/^supervisionprojectmgr\/propchepass\/((\w|-)+)$/'  => 'supervisionprojectmgr/propchepass?key=:1', //整改报告


        '/^spattern\/gdel\/((\w|-)+)$/'  => 'spattern/gDel?key=:1',     //材料商删除数据
        '/^spattern\/getbrand\/((\w|-)+)$/'  => 'spattern/getbrand?key=:1',     //材料商获取二级商品下的品牌id和名称
        '/^spattern\/get\/((\w|-)+)$/'  => 'spattern/get?key=:1',     //材料商获取商品分类
        '/^spattern\/model_list_ajax\/((\w|-)+)$/'  => 'spattern/model_list_ajax?key=:1',     //材料商模型列表ajax
        '/^spattern\/list_edit\/((\w|-)+)$/'  => 'spattern/list_edit?key=:1',     //材料商模型列表-编辑
        '/^spattern\/list_see\/((\w|-)+)$/'  => 'spattern/list_see?key=:1',     //材料商模型列表-查看
        '/^spattern\/model_add\/((\w|-)+)$/'  => 'spattern/model_add?key=:1',     //材料商新增模型
        '/^spattern\/model_list\/((\w|-|%)+)$/' => 'spattern/model_list?key=:1', //材料商模型列表
        '/^spattern\/gsave\/((\w|-)+)$/'  => 'spattern/gsave?key=:1',     //材料商模型保存
        '/^spattern\/moregsave\/((\w|-)+)$/'  => 'spattern/moregsave?key=:1',     //材料商模型保存
        '/^spattern\/get_spec_list\/((\w|-)+)$/'  => 'spattern/get_spec_list',     //查询规格列表
        '/^spattern\/model_custom_see\/((\w|-)+)$/'  => 'spattern/model_custom_see?key=:1',     //查看定制模型
        '/^spattern\/model_custom_edit\/((\w|-)+)$/'  => 'spattern/model_custom_edit?key=:1',     //修改定制模型

        '/^shop\/goods\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'shop/goods?key=:1',  //店铺全部商品
        '/^shop\/good\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'shop/good?key=:1',  //店铺全部商品
        '/^shop\/((\w|-|%)+)$/' => 'shop/index?key=:1',       //店铺首页
        '/^shop\/store\/((\w|-|%)+)$/' => 'shop/store?key=:1',  //店铺门店
        '/^shop\/newproduct\/((\w|-|%)+)$/' => 'shop/newproduct?key=:1', //店铺新品
        '/^shop\/info\/((\w|-)+)$/'  => 'shop/info?key=:1', //店铺详情
        '/^shop\/hot\/((\w|-)+)$/'  => 'shop/hot?key=:1',  //店铺店内促销
        '/^shop\/service\/((\w|-)+)$/'  => 'shop/service?key=:1',  //店铺售后服务
        '/^shop\/shop_license\/((\w|-)+)$/'  => 'shop/shop_license?key=:1',  //店铺工商执照
        '/^shop\/vouchers\/((\w|-)+)$/'  => 'shop/vouchers?key=:1',  //店铺抵用券
		'/^shop\/store\/((\w|-)+)$/'  => 'shop/store?key=:1', //全景店铺

        '/^favorite\/farticle\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'favorite/farticle?key=:1', //收藏文章
        '/^favorite\/fbaby\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'favorite/fbaby?key=:1', //收藏宝贝
        '/^favorite\/fcase\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'favorite/fcase?key=:1', //收藏方案
        '/^favorite\/fbuilding\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'favorite/fbuilding?key=:1', //收藏楼盘
        '/^favorite\/fsupplier\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'favorite/fsupplier?key=:1', //收藏角色
        '/^favorite\/fdesigner\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'favorite/fdesigner?key=:1', //收藏角色
        '/^favorite\/fdecorate\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'favorite/fdecorate?key=:1', //收藏角色
        '/^favorite\/fforeman\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'favorite/fforeman?key=:1', //收藏角色
        '/^favorite\/fsupervision\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'favorite/fsupervision?key=:1', //收藏角色

        '/^favorite\/frole\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'favorite/frole?key=:1', //收藏角色

        '/^order\/((\w|-)+)$/'       => 'order/index?key=:1',   //商品下单

        '/^visit\/index\/((\w|-)+)$/'  => 'visit/index?key=:1',  //预约参观列表

        '/^enterpconst\/index\/((\w|-)+)$/'  => 'enterpconst/index?key=:1',  //装企施工订单列表
        '/^enterpconst\/info\/((\w|-)+)$/'  => 'enterpconst/info?key=:1',  //装企施工订单详情
        '/^enterpconst\/adjusted\/((\w|-)+)$/'  => 'enterpconst/adjusted?key=:1',  //装企施工订单详情
        // '/^enterpconst\/index\/((\w|-)+)$/'  => 'enterporder/index?key=:1',  //装企项目管理
        '/^staffmgr\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'staffmgr/index?key=:1', //装企员工管理
        '/^enterpdesign\/index\/((\w|-)+)$/'  => 'enterpdesign/index?key=:1',    //设计师订单列表
        '/^enterpdesign\/info\/((\w|-)+)$/'  => 'enterpdesign/info?key=:1',     //设计师计订单详情
        '/^enterpdesign\/transfer\/((\w|-)+)$/'  => 'enterpdesign/transfer?key=:1',     //设计师计订单转施工
        '/^enterpdesign\/transferinfo\/((\w|-)+)$/'  => 'enterpdesign/transferinfo?key=:1',     //设计师计订单转施工详情



        '/^entermgr\/index\/((\w|-)+)$/'     => 'entermgr/index?key=:1',        //装企工程管理
        '/^entermgr\/constructing\/((\w|-)+)$/'     => 'entermgr/constructing?key=:1',        //装企工程管理
        '/^entermgr\/accessories\/((\w|-)+)$/'     => 'entermgr/accessories?key=:1',        //辅料验收1
        '/^entermgr\/accessories2\/((\w|-)+)$/'     => 'entermgr/accessories2?key=:1',        //辅料验收2
        '/^entermgr\/agreement\/((\w|-)+)$/'     => 'entermgr/agreement?key=:1',        //施工合同
        '/^entermgr\/changereport\/((\w|-)+)$/'     => 'entermgr/changereport?key=:1',        //整改报告
        '/^entermgr\/completion\/((\w|-)+)$/'     => 'entermgr/completion?key=:1',        //竣工验收报告
        '/^entermgr\/controlog\/((\w|-)+)$/'     => 'entermgr/controlog?key=:1',        //施工日志
        '/^entermgr\/change\/((\w|-)+)$/'     => 'entermgr/change?key=:1',        //项目变更
        '/^entermgr\/goods\/((\w|-)+)$/'     => 'entermgr/goods?key=:1',        //原房物品移交表
        '/^entermgr\/goodsrt\/((\w|-)+)$/'     => 'entermgr/goodsrt?key=:1',        //原房物品归还表
        '/^entermgr\/handover\/((\w|-)+)$/'     => 'entermgr/handover?key=:1',        //原房交接验收表
        '/^entermgr\/lofting\/((\w|-)+)$/'     => 'entermgr/lofting?key=:1',        //放样验收表
        '/^entermgr\/midphase\/((\w|-)+)$/'     => 'entermgr/midphase?key=:1',        //中期验收报告
        '/^entermgr\/permit\/((\w|-)+)$/'     => 'entermgr/permit?key=:1',        //施工许可证
        '/^entermgr\/prophase\/((\w|-)+)$/'     => 'entermgr/prophase?key=:1',        //前期验收报告
        '/^entermgr\/report\/((\w|-)+)$/'     => 'entermgr/report?key=:1',        //收方报告
        '/^entermgr\/report2\/((\w|-)+)$/'     => 'entermgr/report2?key=:1',        //收方报告
        '/^entermgr\/schedule\/((\w|-)+)$/'     => 'entermgr/schedule?key=:1',        //工期暂停
        '/^entermgr\/propchesub\/((\w|-)+)$/'     => 'entermgr/propchesub?key=:1',        //验收报告
        '/^entermgr\/pause\/((\w|-)+)$/'     => 'entermgr/pause?key=:1',        //暂停详情
        '/^entermgr\/delay\/((\w|-)+)$/'     => 'entermgr/delay?key=:1',        //延期详情
        '/^entermgr\/schapply\/((\w|-)+)$/'     => 'entermgr/schapply?key=:1',        //申请者查看工期变更
        '/^entermgr\/history\/((\w|-)+)$/'     => 'entermgr/history?key=:1',        //变更记录
        '/^entermgr\/consealpic\/((\w|-)+)$/'     => 'entermgr/consealpic?key=:1',        //隐蔽相片
        '/^entermgr\/returnwork\/((\w|-)+)$/'     => 'entermgr/returnwork?key=:1',        //复工
        '/^entermgr\/material\/((\w|-)+)$/'     => 'entermgr/material?key=:1',        //辅材变更

        '/^enterfmgr\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'enterfmgr/index?key=:1',      //工程管理列表
        '/^enterfmgr\/schedule\/((\w|-)+)$/'  => 'enterfmgr/schedule?key=:1', //工程管理生成进度表
        '/^enterfmgr\/constructing\/((\w|-)+)$/'  => 'enterfmgr/constructing?key=:1', //工程管理施工中
        '/^enterfmgr\/handover\/((\w|-)+)$/'  => 'enterfmgr/handover?key=:1', //原房基础设施交接验收表
        '/^enterfmgr\/spotfoods\/((\w|-)+)$/'  => 'enterfmgr/spotfoods?key=:1', //现场物品移交确认单
        '/^enterfmgr\/permit\/((\w|-)+)$/'  => 'enterfmgr/permit?key=:1', //开工许可证
        '/^enterfmgr\/accessories\/((\w|-)+)$/'  => 'enterfmgr/accessories?key=:1', //辅料验收表
        '/^enterfmgr\/lofting\/((\w|-)+)$/'  => 'enterfmgr/lofting?key=:1', //施工放样验收表
        '/^enterfmgr\/change\/((\w|-)+)$/'     => 'enterfmgr/change?key=:1',        //项目变更
        '/^enterfmgr\/changereport\/((\w|-)+)$/'     => 'enterfmgr/changereport?key=:1',        //项目变更日志
        '/^enterfmgr\/prophase\/((\w|-)+)$/'  => 'enterfmgr/prophase?key=:1', //前期报告
        '/^enterfmgr\/propfview\/((\w|-)+)$/'  => 'enterfmgr/propfview?key=:1', //前期报告全景
        '/^enterfmgr\/propfback\/((\w|-)+)$/'  => 'enterfmgr/propfback?key=:1', //前期验收提交
        '/^enterfmgr\/propchesub\/((\w|-)+)$/'  => 'enterfmgr/propchesub?key=:1', //整改
        '/^enterfmgr\/propchepass\/((\w|-)+)$/'  => 'enterfmgr/propchepass?key=:1', //整改报告
        '/^enterfmgr\/report\/((\w|-)+)$/'  => 'enterfmgr/report?key=:1', //收方报告
        '/^enterfmgr\/report2\/((\w|-)+)$/'  => 'enterfmgr/report2?key=:1', //收方报告2
        '/^enterfmgr\/controlog\/((\w|-)+)$/'  => 'enterfmgr/controlog?key=:1', //施工日志
        '/^enterfmgr\/history\/((\w|-)+)$/'     => 'enterfmgr/history?key=:1',        //变更记录
        '/^enterfmgr\/consealpic\/((\w|-)+)$/'     => 'enterfmgr/consealpic?key=:1',        //隐蔽相片
        '/^enterfmgr\/returnwork\/((\w|-)+)$/'     => 'enterfmgr/returnwork?key=:1',        //复工
        '/^enterfmgr\/pause\/((\w|-)+)$/'     => 'enterfmgr/pause?key=:1',        //暂停详情
        '/^enterfmgr\/delay\/((\w|-)+)$/'     => 'enterfmgr/delay?key=:1',        //延期详情
        '/^enterfmgr\/schapply\/((\w|-)+)$/'     => 'enterfmgr/schapply?key=:1',        //申请者查看工期变更
        '/^enterfmgr\/material\/((\w|-)+)$/'     => 'enterfmgr/material?key=:1',        //辅材变更
        '/^enterfmgr\/materialinfo\/((\w|-)+)$/'     => 'enterfmgr/materialinfo?key=:1',        //辅材变更

        '/^refsite\/editquotation\/((\w|-)+)$/'  => 'refsite/editquotation?key=:1',  //报价清单修改
        '/^refsite\/change\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'refsite/change?key=:1',
        '/^refsite\/addquotation\/((\w|-)+)$/'  => 'refsite/addquotation?key=:1',  //报价清单修改
        '/^refsite\/quotation\/((\w|-)+)$/'  => 'refsite/quotation?key=:1',  //报价库

        '/^order\/index\/((\w|-)+)$/'  => 'order/index?key=:1',  //商品订单
        '/^orderlist\/index\/((\w|-)+)$/'  => 'orderlist/index?key=:1',  //商品订单列表
        '/^orderlist\/perfectplan\/((\w|-)+)$/'  => 'orderlist/perfectplan?key=:1',  //业主商品完善方案
        '/^orderlist\/info\/((\w|-)+)$/'  => 'orderlist/info?key=:1',  //商品详情
        '/^orderlist\/paydetail\/((\w|-)+)$/'  => 'orderlist/paydetail?key=:1',  //支付订单详情
        '/^arrest\/index\/((\w|-)+)$/'  => 'arrest/index?key=:1',  //承运商证书

        '/^othercase\/index\/((\w|-)+)$/'  => 'othercase/index?key=:1',  //其他案例列表
        '/^othercase\/caseupload\/((\w|-)+)$/'  => 'othercase/caseupload?key=:1',  //其他案例上传
        '/^othercase\/designInfo\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'othercase/designInfo?key=:1',  //设计师其他案例
        '/^othercase\/info\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'othercase/info?key=:1',  //其他案例
        '/^designeruser\/unitlist\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'designeruser/unitlist?key=:1', //设计师户型列表
        '/^designeruser\/caselist\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'designeruser/caselist?key=:1', //设计师实像设计列表

        '/^content\/vr_list\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'content/vr_list?key=:1', //VR方案
        '/^decontent\/vr_list\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'decontent/vr_list?key=:1', //VR方案

        '/^wallet\/balance\/((\w|-)+)$/' => 'wallet/balance?key=:1', //钱包
        '/^wallet\/withdrawals\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'wallet/withdrawals?key=:1', //钱包提现
        '/^wallet\/show\/((\w|-)+)$/'  => 'wallet/show?key=:1',  //流水详情

        '/^materialgood\/index\/((\w|-)+)$/'  => 'materialgood/index?key=:1',  //材料商订单列表
        '/^materialgood\/info\/((\w|-)+)$/'  => 'materialgood/info?key=:1',  //材料商订单列表
        '/^materialgood\/programinfo\/((\w|-)+)$/'  => 'materialgood/programinfo?key=:1',  //材料商上传方案

        '/^commodity\/index\/((\w|-|%)+)' => 'commodity/index?key=:1', //同步商品列表
        '/^commodity\/info\/((\w|-|%)+)' => 'commodity/info?key=:1', //同步商品详情

        '/^designerinfo\/checkemail\/((\w|-|%)+)$/'  => 'designerinfo/checkemail?key=:1',  //设计师邮箱验证
        '/^uinfo\/checkemail\/((\w|-|%)+)$/'  => 'uinfo/checkemail?key=:1',  //业主邮箱验证
        '/^foremaninfo\/checkemail\/((\w|-|%)+)$/'  => 'foremaninfo/checkemail?key=:1',  //工长邮箱验证
        '/^superinfo\/checkemail\/((\w|-|%)+)$/'  => 'superinfo/checkemail?key=:1',  //监理邮箱验证
        '/^service\/index\/((\w|-)+)$/'  => 'service/index?key=:1',  //服务机构

        '/^pay\/((\d|-)+)$/'  => 'pay/index?key=:1',//支付
        '/^pay\/recommend_supervision/$/'  => 'pay/recommend_supervision',  //推荐监理
        '/^pay\/account\/((\w|-)+)$/'  => 'pay/account?key=:1',//余额支付
        '/^pay\/wachat\/((\w|-)+)$/'  => 'pay/wachat?key=:1',//微信支付
        '/^pay\/wachatpay\/((\w|-)+)$/'  => 'pay/wachatpay?key=:1',//微信支付定时刷新取支付状态

        '/^pay\/alipay\/((\w|-)+)$/'  => 'pay/alipay?key=:1',//支付宝支付
        '/^pay\/alireturn\/((\w|-)+)$/'  => 'pay/alireturn?key=:1',//同步通知页面
        '/^pay\/paid\/((\w|-)+)$/'  => 'pay/paid?key=:1',//支付成功
        '/^pay\/payfailure\/((\w|-)+)$/'  => 'pay/payfailure?key=:1',//支付失败
        '/^pay\/ycbankpay\/((\w|-)+)$/'  => 'pay/ycbankpay?key=:1',//邮储银行-标准支付
        '/^pay\/ycunionpay\/((\w|-)+)$/'  => 'pay/ycunionpay?key=:1',//邮储银行-他行支付-银联
        '/^pay\/yeepay\/((\w|-)+)$/'  => 'pay/yeepay?key=:1',//易宝支付



        '/^imgdesign\/index\/((\w|-|%)+)$/' => 'imgdesign/index?key=:1',  //设计馆，装企实像设计
        '/^craft\/index\/((\w|-|%)+)$/' => 'craft/index?key=:1',  //工长，装企工艺展示
        '/^desdesigner\/index\/((\w|-|%)+)$/' => 'desdesigner/index?key=:1',  //设计馆下设计师管理

        '/^decorateuser\/userson\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'decorateuser/userson?key=:1', //装企子账号管理
        '/^decorateuser\/foreman\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'decorateuser/foreman?key=:1', //装企工长管理
        '/^decorateuser\/supervisor\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'decorateuser/supervisor?key=:1', //装企质检管理


        '/^agreement\/order_agt\/((\w|-)+)$/'  => 'agreement/order_agt?key=:1',  //设计订单协议
        '/^agreement\/statement\/((\w|-)+)$/'  => 'agreement/statement?key=:1',  //声明协议
        '/^agreement\/serve_agt\/((\w|-)+)$/'  => 'agreement/serve_agt?key=:1',  //法律解释

        '/^link\/((\d)+)$/'  => 'link/fullview_index?key=:1',   //装企私链详情

        '/^mywin\/index\/((\w|-)+)$/'  => 'mywin/index?key=:1',  //全景方案
        '/^mywin\/scene\/((\w|-)+)$/'  => 'mywin/scene?key=:1',  //场景漫游
        '/^mywin\/roam\/((\w|-)+)$/'  => 'mywin/roam?key=:1',  //场景漫游
        '/^mywin\/roamset\/((\w|-)+)$/'  => 'mywin/roamset?key=:1',  //场景漫游设置
        '/^mywin\/roamadd\/((\w|-)+)$/'  => 'mywin/roamadd?key=:1',  //场景漫游添加

        '/^fullview\/upvote$/'  => 'fullview/upvote',   //点赞
        //'/^fullview\/((\w|-)+)$/'  => 'fullview/index?key=:1',   //查看方案全景
        '/^fullview\/spotxyxml\/((\w|-)+)$/'  => 'fullview/spotxyxml?key=:1',   //查看方案全景
        '/^fullview\/((\d)+)$/'  => 'fullview/index?key=:1',   //查看方案全景
        '/^fullview\/products\/((\w|-)+)$/'  => 'fullview/products?key=:1',   //全景方案商品
        '/^fullview\/goods\/((\w|-)+)$/'  => 'fullview/goods?key=:1',   //全景方案商品详情
        '/^fullview\/weixin\/((\w|-)+)$/'  => 'fullview/weixin?key=:1',   //全景方案微信
        '/^fullview\/log\/((\w|-)+)$/'  => 'fullview/log?key=:1',   //全景方案日志
        '/^fullview\/scene\/((\d)+)$/'  => 'fullview/scene?key=:1',   //全景方案单场景查看
        '/^fullview\/hot\/((\d)+)$/'  => 'fullview/hot?key=:1',   //全景方案热点编辑
        '/^fullview\/xhot\/((\d)+)$/'  => 'fullview/xhot?key=:1',   //全景方案热点XML
        '/^fullview\/save\/((\d)+)$/'  => 'fullview/save?key=:1',   //全景方案热点保存
        '/^fullview\/scase\/((\d)+)$/'  => 'fullview/scase?key=:1',   //其他案例全景单场景查看
        '/^fullview\/caseinfo\/((\d)+)$/'  => 'fullview/caseinfo?key=:1',   //其他案例全景单场景查看

        '/^member\/login\/((\w|-)+)$/'  => 'member/login?key=:1',   //登录
        '/^member\/certiOne\/((\w|-)+)$/'  => 'member/certiOne?key=:1',   //企业认证第一步
        '/^member\/certiTwo\/((\w|-)+)$/'  => 'member/certiTwo?key=:1',   //企业认证第二步
        '/^member\/certiThree\/((\w|-)+)$/'  => 'member/certiThree?key=:1',   //企业认证第三步
        '/^member\/personalCert\/((\w|-)+)$/'  => 'member/personalCert?key=:1',   //个人认证
        //新版专业角色认证
        '/^member\/personalAuth\/((\w|-)+)$/'  => 'member/personalAuth?key=:1',   //个人认证
        '/^member\/companyAuth\/((\w|-)+)$/'  => 'member/companyAuth?key=:1',   //企业认证
        '/^member\/accountAuth\/((\w|-)+)$/'  => 'member/accountAuth?key=:1',   //审核状态是跳转的页面
        '/^member/proRegister\/((\w|-)+)$/'  => 'member/proRegister?key=:1',   //专业角色注册认证

        '/^topsearch\/fdbsearch\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'topsearch/fdbsearch?key=:1', //头部搜索1
        '/^topsearch\/dessearch\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'topsearch/dessearch?key=:1', //头部搜索2
        '/^topsearch\/prosearch\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'topsearch/prosearch?key=:1', //头部搜索3
        '/^topsearch\/consearch\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'topsearch/consearch?key=:1', //头部搜索4

        '/^ownerassess\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'ownerassess/index?key=:1', //业主评论列表
        '/^ownerassess\/assessadd1\/((\w|-)+)$/'  => 'ownerassess/assessadd1?key=:1',  //业主进行商品评论
        '/^ownerassess\/assessinfo1\/((\w|-)+)$/'  => 'ownerassess/assessinfo1?key=:1',  //业主商品评论详情
        '/^ownerassess\/assessedit1\/((\w|-)+)$/'  => 'ownerassess/assessedit1?key=:1',  //业主进行修改商品评论
        '/^ownerassess\/assessedit1z\/((\w|-)+)$/'  => 'ownerassess/assessedit1z?key=:1',  //业主进行修改商品评论
        '/^ownerassess\/assesszhui1\/((\w|-)+)$/'  => 'ownerassess/assesszhui1?key=:1',  //业主进行追加商品评论

        '/^ownerassess\/assessadd2\/((\w|-)+)$/'  => 'ownerassess/assessadd2?key=:1',  //业主进行设计评论
        '/^ownerassess\/assessinfo2\/((\w|-)+)$/'  => 'ownerassess/assessinfo2?key=:1',  //业主设计评论详情
        '/^ownerassess\/assessedit2\/((\w|-)+)$/'  => 'ownerassess/assessedit2?key=:1',  //业主进行修改设计评论
        '/^ownerassess\/assessedit2z\/((\w|-)+)$/'  => 'ownerassess/assessedit2z?key=:1',  //业主进行修改设计评论
        '/^ownerassess\/assesszhui2\/((\w|-)+)$/'  => 'ownerassess/assesszhui2?key=:1',  //业主进行追加设计评论
        '/^ownerassess\/assessaddc2\/((\w|-)+)$/'  => 'ownerassess/assessaddc2?key=:1',  //业主进行设计转施工评论
        '/^ownerassess\/assessinfoc2\/((\w|-)+)$/'  => 'ownerassess/assessinfoc2?key=:1',  //业主设计转施工评论详情
        '/^ownerassess\/assesseditc2\/((\w|-)+)$/'  => 'ownerassess/assesseditc2?key=:1',  //业主进行修改设计转施工评论
        '/^ownerassess\/assessedit2cz\/((\w|-)+)$/'  => 'ownerassess/assessedit2cz?key=:1',  //业主进行修改设计转施工评论
        '/^ownerassess\/assesszhuic2\/((\w|-)+)$/'  => 'ownerassess/assesszhuic2?key=:1',  //业主进行追加设计转施工评论
        '/^ownerassess\/assessadd3\/((\w|-)+)$/'  => 'ownerassess/assessadd3?key=:1',  //业主进行施工评论
        '/^ownerassess\/assessinfo3\/((\w|-)+)$/'  => 'ownerassess/assessinfo3?key=:1',  //业主施工评论详情
        '/^ownerassess\/assessedit3\/((\w|-)+)$/'  => 'ownerassess/assessedit3?key=:1',  //业主进行修改施工评论
        '/^ownerassess\/assessedit3z\/((\w|-)+)$/'  => 'ownerassess/assessedit3z?key=:1',  //业主进行修改施工评论
        '/^ownerassess\/assesszhui3\/((\w|-)+)$/'  => 'ownerassess/assesszhui3?key=:1',  //业主进行追加施工评论
        '/^ownerassess\/assessadd4\/((\w|-)+)$/'  => 'ownerassess/assessadd4?key=:1',  //业主进行监理评论
        '/^ownerassess\/assessinfo4\/((\w|-)+)$/'  => 'ownerassess/assessinfo4?key=:1',  //业主监理评论详情
        '/^ownerassess\/assessedit4\/((\w|-)+)$/'  => 'ownerassess/assessedit4?key=:1',  //业主进行修改监理评论
        '/^ownerassess\/assessedit4z\/((\w|-)+)$/'  => 'ownerassess/assessedit4z?key=:1',  //业主进行修改监理评论
        '/^ownerassess\/assesszhui4\/((\w|-)+)$/'  => 'ownerassess/assesszhui4?key=:1',  //业主进行追加监理评论

        '/^replyshop\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'replyshop/index?key=:1', //材料商评论列表
        '/^replyshop\/add\/((\w|-)+)$/'  => 'replyshop/add?key=:1',  //业主进行添加设计评论
        '/^replyshop\/edit\/((\w|-)+)$/'  => 'replyshop/edit?key=:1',  //业主进行修改设计评论
        '/^replyshop\/info\/((\w|-)+)$/'  => 'replyshop/info?key=:1',  //业主进行展示设计评论
        '/^replyshop\/zhui\/((\w|-)+)$/'  => 'replyshop/zhui?key=:1',  //业主进行追评设计评论
        '/^shop\/shop_license_new\/((\w|-)+)$/'  => 'shop/shop_license_new?key=:1',  //店铺营业执照

        '/^replydesign\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'replydesign/index?key=:1', //设计师评论列表
        '/^replydesign\/add\/((\w|-)+)$/'  => 'replydesign/add?key=:1',  //业主进行添加设计评论
        '/^replydesign\/edit\/((\w|-)+)$/'  => 'replydesign/edit?key=:1',  //业主进行修改设计评论
        '/^replydesign\/info\/((\w|-)+)$/'  => 'replydesign/info?key=:1',  //业主进行展示设计评论
        '/^replydesign\/zhui\/((\w|-)+)$/'  => 'replydesign/zhui?key=:1',  //业主进行追评设计评论

        '/^replyconst\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'replyconst/index?key=:1', //施工方评论列表
        '/^replyconst\/add\/((\w|-)+)$/'  => 'replyconst/add?key=:1',  //业主进行添加设计评论
        '/^replyconst\/edit\/((\w|-)+)$/'  => 'replyconst/edit?key=:1',  //业主进行修改设计评论
        '/^replyconst\/info\/((\w|-)+)$/'  => 'replyconst/info?key=:1',  //业主进行展示设计评论
        '/^replyconst\/zhui\/((\w|-)+)$/'  => 'replyconst/zhui?key=:1',  //业主进行追评设计评论

        '/^replysuper\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'replysuper/index?key=:1', //监理方评论列表
        '/^replysuper\/add\/((\w|-)+)$/'  => 'replysuper/add?key=:1',  //业主进行添加设计评论
        '/^replysuper\/edit\/((\w|-)+)$/'  => 'replysuper/edit?key=:1',  //业主进行修改设计评论
        '/^replysuper\/info\/((\w|-)+)$/'  => 'replysuper/info?key=:1',  //业主进行展示设计评论
        '/^replysuper\/zhui\/((\w|-)+)$/'  => 'replysuper/zhui?key=:1',  //业主进行追评设计评论

        '/^keyofferdb\/index\/((\w|-)+)$/'  => 'keyofferdb/index?key=:1',  //报价单对比

        '/^member\/authentication\/((\w|-)+)$/' => 'member/authentication?key=:1', //认证成功

        '/^enterpriseinfo\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'enterpriseinfo/index?key=:1', //装企个人信息

        '/^myproject\/info\/((\w|-)+)$/'  => 'myproject/info?key=:1',     //项目订单客户设计订单详情
        '/^myproject\/infowin\/((\w|-)+)$/'  => 'myproject/infowin?key=:1',     //项目订单客户设计订单方案详情
        '/^designerorder\/index\/((\w|-)+)$/'  => 'designerorder/index?key=:1',    //设计师订单列表
        '/^designerorder\/transfer\/((\w|-)+)$/'  => 'designerorder/transfer?key=:1',     //设计师计订单转施工
        '/^designerorder\/infowin\/((\w|-)+)$/'  => 'designerorder/infowin?key=:1',     //设计师计订单方案详情
        '/^designerorder\/transferinfo\/((\w|-)+)$/'  => 'designerorder/transferinfo?key=:1',     //设计师计订单转施工详情

        '/^replyenter\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'replyenter/index?key=:1', //装企方评论列表
        '/^replyenter\/add\/((\w|-)+)$/'  => 'replyenter/add?key=:1',  //装企进行添加设计评论
        '/^replyenter\/edit\/((\w|-)+)$/'  => 'replyenter/edit?key=:1',  //装企进行修改设计评论
        '/^replyenter\/info\/((\w|-)+)$/'  => 'replyenter/info?key=:1',  //装企进行展示设计评论
        '/^replyenter\/zhui\/((\w|-)+)$/'  => 'replyenter/zhui?key=:1',  //装企进行追评设计评论
        '/^goodhouse\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'goodhouse/index?key=:1', //商品订单关联房号

        '/^projectcase\/index\/((\w|-)+)$/'  => 'projectcase/index?key=:1',  //工程案例
        '/^projectcase\/other\/((\w|-)+)$/'  => 'projectcase/other?key=:1',  //工程案例

        //20171124
        '/^foreman\/carft\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'foreman/carft?key=:1', //工长详情

        //20171213
        '/^othercase\/design_add\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'othercase/design_add?key=:1',  //其他案例

        //20171219
        '/^scene\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'scene/index?key=:1', //实景照片
        '/^scene\/info\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'scene/info?key=:1', //实景照片详情

        //20171226
        '/^designwork\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'designwork/index?key=:1', //平台案例列表
        '/^reference\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'reference/index?key=:1', //业主预约列表

        //20180115
        '/^agreement\/thd\/((\w|-)+)$/'  => 'agreement/thd?key=:1',  //角色协议

        //20180125
        '/^design\/design_win\/((\w|-)+)$/'    => 'design/design_win?key=:1',       //设计馆设计方案
        '/^design\/design_team\/((\w|-)+)$/'    => 'design/design_team?key=:1',       //设计馆设计团队
        '/^design\/evaluation\/((\w|-)+)$/'    => 'design/evaluation?key=:1',       //设计馆评价
        '/^design\/introduce\/((\w|-)+)$/'    => 'design/introduce?key=:1',       //设计馆公司详情
        '/^design\/project\/((\w|-)+)$/'  => 'design/project?key=:1',     //设计馆其他案例-v2
        '/^institutioninfo\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'institutioninfo/index?key=:1', //设计机构个人信息
        '/^replyinstitu\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'replyinstitu/index?key=:1', //设计机构评论列表

        //20180130
        '/^shop\/activityArea\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'shop/activityArea?key=:1',       //优惠专区
        '/^CouponActivity\/index\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'CouponActivity/index?key=:1',//优惠管理
        '/^CouponActivity\/couponView\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'CouponActivity/couponView?key=:1',//优惠活动详情

        //20180131
        '/^enterpriseinfo\/checkemail\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'enterpriseinfo/checkemail?key=:1', //装企邮箱验证
        '/^institutioninfo\/checkemail\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'institutioninfo/checkemail?key=:1', //设计机构邮箱验证
        //20180209
        //'/^msgcenter\/msgindex\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'msgcenter/msgindex?key=:1',      //消息列表
        //'/^msgcenter\/msgsys\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'msgcenter/msgsys?key=:1',      //消息列表
        //20180327
        '/^replenishment\/index\/((\w|-)+)$/'  => 'replenishment/index?key=:1',  //补货
        '/^replenishment\/replenishdetail\/((\w|-)+)$/'  => 'replenishment/replenishdetail?key=:1',  //补货详情页

        //品牌总部20180626
        '/^brandhqinfo\/checkemail\/((\w|-)+)$/'  => 'brandhqinfo/checkemail?key=:1',  //品牌总部邮箱验证
        '/^brandhqinfo\/reportData\/((\w|-)+)$/'  => 'brandhqinfo/reportData?key=:1',  //品牌总部下材料商数据报表
        '/^brandhqinfo\/product_list\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u'  => 'brandhqinfo/product_list?key=:1',  //品牌总部下材料商商品列表
        '/^BrandhqProduct\/goodlist\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'BrandhqProduct/goodlist?key=:1',//商品列表
        '/^BrandhqProduct\/editGood\/((\w|-)+)$/'  => 'BrandhqProduct/editGood?key=:1',//商品编辑页面
        '/^BrandhqProduct\/qrcode\/((\w|-)+)$/'  => 'BrandhqProduct/qrcode?key=:1',//商品二维码
		
		'/^businessshopedit\/reportData\/((\w|-)+)$/'  => 'businessshopedit/reportData?key=:1',  //品牌总部下材料商数据报表
		'/^businessshopedit\/supplierproduct\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u'  => 'businessshopedit/supplierproduct?key=:1',  

        '/^package\/([\x{4e00}-\x{9fa5}A-Za-z0-9_\-\s]+)$/u' => 'package/index?key=:1',      //套餐装企列表
        '/^package\/info\/((\w|-)+)$/'    => 'package/info?key=:1',       //套餐装企详情
        '/^package\/packages\/((\w|-)+)$/'    => 'package/packages?key=:1',       //套餐装企产品套餐
        '/^package\/design_win\/((\w|-)+)$/'    => 'package/design_win?key=:1',       //套餐装企设计方案
        '/^package\/project\/((\w|-)+)$/'  => 'package/project?key=:1',     //套餐装企其他案例-v2
        '/^package\/design_team\/((\w|-)+)$/'    => 'package/design_team?key=:1',       //套餐装企设计团队
        '/^package\/craft\/((\w|-)+)$/'    => 'package/craft?key=:1',       //套餐装企工艺展示
        '/^package\/sample\/((\w|-)+)$/'    => 'package/sample?key=:1',       //套餐装企参考工地
        '/^package\/evaluation\/((\w|-)+)$/'    => 'package/evaluation?key=:1',       //套餐装企评价
        '/^package\/introduce\/((\w|-)+)$/'    => 'package/introduce?key=:1',       //套餐装企公司详情
        // '/^package\/map\/((\w|-)+)$/'    => 'package/map?key=:1',       //设计馆详情
        // '/^package\/ablums\/((\w|-)+)$/'    => 'package/ablums?key=:1',   //相册
        //
        '/^packageconst\/index\/((\w|-)+)$/'  => 'packageconst/index?key=:1',  //装企施工订单列表
        '/^packageconst\/info\/((\w|-)+)$/'  => 'packageconst/info?key=:1',  //装企施工订单详情
        '/^packageconst\/adjusted\/((\w|-)+)$/'  => 'packageconst/adjusted?key=:1',  //装企施工订单详情

        '/^packmgr\/index\/((\w|-)+)$/'        => 'packmgr/index?key=:1',  //套餐装企工程列表
        '/^packmgr\/constructing\/((\w|-)+)$/' => 'packmgr/constructing?key=:1',        //装企工程管理
        '/^packmgr\/agreement\/((\w|-)+)$/'    => 'packmgr/agreement?key=:1',        //施工合同
        '/^packmgr\/controlog\/((\w|-)+)$/'    => 'packmgr/controlog?key=:1',        //施工日志
        '/^packmgr\/change\/((\w|-)+)$/'       => 'packmgr/change?key=:1',        //项目变更
        '/^packmgr\/changereport\/((\w|-)+)$/' => 'packmgr/changereport?key=:1',        //项目变更日志
        '/^packmgr\/goods\/((\w|-)+)$/'        => 'packmgr/goods?key=:1',        //原房物品移交表
        '/^packmgr\/goodsrt\/((\w|-)+)$/'      => 'packmgr/goodsrt?key=:1',        //原房物品归还表
        '/^packmgr\/handover\/((\w|-)+)$/'     => 'packmgr/handover?key=:1',        //原房交接验收表
        '/^packmgr\/lofting\/((\w|-)+)$/'      => 'packmgr/lofting?key=:1',        //放样验收表
        '/^packmgr\/permit\/((\w|-)+)$/'       => 'packmgr/permit?key=:1',        //施工许可证
        '/^packmgr\/prophase\/((\w|-)+)$/'     => 'packmgr/prophase?key=:1',        //前期验收报告
        '/^packmgr\/schedule\/((\w|-)+)$/'     => 'packmgr/schedule?key=:1',        //工期暂停
        '/^packmgr\/propchesub\/((\w|-)+)$/'   => 'packmgr/propchesub?key=:1',        //验收报告
        '/^packmgr\/pause\/((\w|-)+)$/'        => 'packmgr/pause?key=:1',        //暂停详情
        '/^packmgr\/delay\/((\w|-)+)$/'        => 'packmgr/delay?key=:1',        //延期详情
        '/^packmgr\/schapply\/((\w|-)+)$/'     => 'packmgr/schapply?key=:1',        //申请者查看工期变更
        '/^packmgr\/history\/((\w|-)+)$/'      => 'packmgr/history?key=:1',        //变更记录
        '/^packmgr\/returnwork\/((\w|-)+)$/'   => 'packmgr/returnwork?key=:1',        //复工


        '/^packfmgr\/index\/((\w|-)+)$/'        => 'packfmgr/index?key=:1',  //套餐装企内部工长工程列表
        '/^packfmgr\/constructing\/((\w|-)+)$/' => 'packfmgr/constructing?key=:1', //工程管理施工中
        '/^packfmgr\/handover\/((\w|-)+)$/'     => 'packfmgr/handover?key=:1', //原房基础设施交接验收表
        '/^packfmgr\/spotfoods\/((\w|-)+)$/'    => 'packfmgr/spotfoods?key=:1', //现场物品移交确认单
        '/^packfmgr\/permit\/((\w|-)+)$/'       => 'packfmgr/permit?key=:1', //开工许可证
        '/^packfmgr\/lofting\/((\w|-)+)$/'      => 'packfmgr/lofting?key=:1', //施工放样验收表
        '/^packfmgr\/change\/((\w|-)+)$/'       => 'packfmgr/change?key=:1',        //项目变更
        '/^packfmgr\/changereport\/((\w|-)+)$/' => 'packfmgr/changereport?key=:1',        //项目变更日志
        '/^packfmgr\/prophase\/((\w|-)+)$/'     => 'packfmgr/prophase?key=:1', //前期报告
        '/^packfmgr\/propfview\/((\w|-)+)$/'    => 'packfmgr/propfview?key=:1', //前期报告全景
        '/^packfmgr\/propfback\/((\w|-)+)$/'    => 'packfmgr/propfback?key=:1', //前期验收提交
        '/^packfmgr\/propchesub\/((\w|-)+)$/'   => 'packfmgr/propchesub?key=:1', //整改
        '/^packfmgr\/propchepass\/((\w|-)+)$/'  => 'packfmgr/propchepass?key=:1', //整改报告
        '/^packfmgr\/controlog\/((\w|-)+)$/'    => 'packfmgr/controlog?key=:1', //施工日志
        '/^packfmgr\/history\/((\w|-)+)$/'      => 'packfmgr/history?key=:1',        //变更记录
        '/^packfmgr\/schedule\/((\w|-)+)$/'     => 'packfmgr/schedule?key=:1',        //工期暂停申请
        '/^packfmgr\/returnwork\/((\w|-)+)$/'   => 'packfmgr/returnwork?key=:1',        //复工
        '/^packfmgr\/pause\/((\w|-)+)$/'        => 'packfmgr/pause?key=:1',        //暂停详情
        '/^packfmgr\/delay\/((\w|-)+)$/'        => 'packfmgr/delay?key=:1',        //延期详情
        '/^packfmgr\/schapply\/((\w|-)+)$/'     => 'packfmgr/schapply?key=:1',        //申请者查看工期变更
        '/^packfmgr\/goodchange\/((\w|-)+)$/'   => 'packfmgr/goodchange?key=:1',        //商品变更


        '/^mypackmgr\/index\/((\w|-)+)$/'        => 'mypackmgr/index?key=:1',        //我的工程列表
        '/^mypackmgr\/constructing\/((\w|-)+)$/' => 'mypackmgr/constructing?key=:1',        //我的工程管理
        '/^mypackmgr\/agreement\/((\w|-)+)$/'    => 'mypackmgr/agreement?key=:1',        //施工合同
        '/^mypackmgr\/changereport\/((\w|-)+)$/' => 'mypackmgr/changereport?key=:1',        //整改报告
        '/^mypackmgr\/controlog\/((\w|-)+)$/'    => 'mypackmgr/controlog?key=:1',        //施工日志
        '/^mypackmgr\/change\/((\w|-)+)$/'       => 'mypackmgr/change?key=:1',        //项目变更
        '/^mypackmgr\/goods\/((\w|-)+)$/'        => 'mypackmgr/goods?key=:1',        //原房物品移交表
        '/^mypackmgr\/goodsrt\/((\w|-)+)$/'      => 'mypackmgr/goodsrt?key=:1',        //原房物品归还表
        '/^mypackmgr\/handover\/((\w|-)+)$/'     => 'mypackmgr/handover?key=:1',        //原房交接验收表
        '/^mypackmgr\/lofting\/((\w|-)+)$/'      => 'mypackmgr/lofting?key=:1',        //放样验收表
        '/^mypackmgr\/permit\/((\w|-)+)$/'       => 'mypackmgr/permit?key=:1',        //施工许可证
        '/^mypackmgr\/prophase\/((\w|-)+)$/'     => 'mypackmgr/prophase?key=:1',        //前期验收报告
        '/^mypackmgr\/schedule\/((\w|-)+)$/'     => 'mypackmgr/schedule?key=:1',        //工期暂停
        '/^mypackmgr\/propchesub\/((\w|-)+)$/'   => 'mypackmgr/propchesub?key=:1',        //验收报告
        '/^mypackmgr\/pause\/((\w|-)+)$/'        => 'mypackmgr/pause?key=:1',        //暂停详情
        '/^mypackmgr\/delay\/((\w|-)+)$/'        => 'mypackmgr/delay?key=:1',        //延期详情
        '/^mypackmgr\/returnwork\/((\w|-)+)$/'   => 'mypackmgr/returnwork?key=:1',        //同意复工
        '/^mypackmgr\/schapply\/((\w|-)+)$/'     => 'mypackmgr/schapply?key=:1',        //申请者查看工期变更
        '/^mypackmgr\/history\/((\w|-)+)$/'      => 'mypackmgr/history?key=:1',        //变更记录

        '/^superpackmgr\/constructing\/((\w|-)+)$/' => 'superpackmgr/constructing?key=:1', //工程管理施工中
        '/^superpackmgr\/handover\/((\w|-)+)$/'     => 'superpackmgr/handover?key=:1', //原房基础设施交接验收表
        '/^superpackmgr\/spotfoods\/((\w|-)+)$/'    => 'superpackmgr/spotfoods?key=:1', //现场物品移交确认单
        '/^superpackmgr\/permit\/((\w|-)+)$/'       => 'superpackmgr/permit?key=:1', //开工许可证
        '/^superpackmgr\/lofting\/((\w|-)+)$/'      => 'superpackmgr/lofting?key=:1', //放样验收表
        '/^superpackmgr\/controlog\/((\w|-)+)$/'    => 'superpackmgr/controlog?key=:1', //施工日志
        '/^superpackmgr\/prophase\/((\w|-)+)$/'     => 'superpackmgr/prophase?key=:1', //前期验收报告
        '/^superpackmgr\/propfback\/((\w|-)+)$/'    => 'superpackmgr/propfback?key=:1', //前期验收提交
        '/^superpackmgr\/propchesub\/((\w|-)+)$/'   => 'superpackmgr/propchesub?key=:1', //整改
        '/^superpackmgr\/propchepass\/((\w|-)+)$/'  => 'superpackmgr/propchepass?key=:1', //整改报告
        '/^superpackmgr\/history\/((\w|-)+)$/'      => 'superpackmgr/history?key=:1', //变更记录

        '/^decorateOrder\/placeconorder\/((\w|-)+)$/'        => 'decorateOrder/placeconorder?key=:1',    //给套餐装企委托施工订单
        '/^orderPacksuper\/index\/((\w|-)+)$/'        => 'orderPacksuper/index?key=:1',    //套餐监理订单
        '/^cloud\/voice\/((\w|-)+)$/'  => 'cloud/voice?key=:1',     //方案添加音频
        //20180713
        '/^design\/evaluation_content\/((\w|-)+)$/'  => 'design/evaluation_content?key=:1',     //装企-客户评价-内容-v2
        '/^package\/evaluation_content\/((\w|-)+)$/'         => 'package/evaluation_content?key=:1',     //装企-客户评价-内容-v2
        '/^supervisionprojectmgr\/history\/((\w|-)+)$/'      => 'supervisionprojectmgr/history?key=:1', //施工日志
        '/^supervisionprojectmgr\/changereport\/((\w|-)+)$/' => 'supervisionprojectmgr/changereport?key=:1', //施工日志
        '/^supervisionprojectmgr\/material\/((\w|-)+)$/'     => 'supervisionprojectmgr/material?key=:1', //施工日志

        '/^packageinfo\/checkemail\/((\w|-)+)$/'  => 'packageinfo/checkemail?key=:1',//套餐装企 邮箱验证

        '/^packfmgr\/finalApply\/((\w|-)+)$/'   => 'packfmgr/finalApply?key=:1',        //竣工结算

        '/^mypackmgr\/finalApply\/((\w|-)+)$/'   => 'mypackmgr/finalApply?key=:1',        //复工
        '/^packmgr\/finalApply\/((\w|-)+)$/'   => 'packmgr/finalApply?key=:1',        //竣工结算
        '/^workerprojectmgr\/toapply\/((\w|-)+)$/'                           => 'workerprojectmgr/toapply?key=:1',        //1-5次申请批款
        '/^workerprojectmgr\/finalApply\/((\w|-)+)$/'                        => 'workerprojectmgr/finalApply?key=:1',        //第六次申请批款
        '/^entermgr\/finalApply\/((\w|-)+)$/'     => 'entermgr/finalApply?key=:1',        //竣工批款
        '/^enterfmgr\/toapply\/((\w|-)+)$/'                           => 'enterfmgr/toapply?key=:1',        //1-5次批款
        '/^enterfmgr\/finalApply\/((\w|-)+)$/'                        => 'enterfmgr/finalApply?key=:1',        //竣工批款
        '/^myengineering\/finalApply\/((\w|-)+)$/'   => 'myengineering/finalApply?key=:1',        //辅材变更
        '/^packmgr\/accessories\/((\w|-)+)$/'  => 'packmgr/accessories?key=:1',        //辅料清单
        '/^packfmgr\/accessories\/((\w|-)+)$/'  => 'packfmgr/accessories?key=:1',        //辅料清单
        '/^mypackmgr\/accessories\/((\w|-)+)$/'  => 'mypackmgr/accessories?key=:1',        //辅料清单
        '/^superpackmgr\/accessories\/((\w|-)+)$/'  => 'superpackmgr/accessories?key=:1',        //辅料清单
        //20181120
        '/^package\/other\/((\w|-)+)$/'                      => 'package/other?key=:1',       //套餐装企其他案例
        '/^decorate\/other\/((\w|-)+)$/'                      => 'decorate/other?key=:1',       //个性装企其他案例


        //20190812
        '/^AskDesigner\/details\/((\w|-)+)$/'                      => 'AskDesigner/details?key=:1',       //业主提问详情
        '/^Integral\/index\/((\w|-)+)$/'                      => 'Integral/index?key=:1',       //设计师的积分列表

        '/^QuestionAnswer\/index\/((\w|-)+)$/'                      => 'QuestionAnswer/index?key=:1',       //设计师的问答中心
        '/^QuestionAnswer\/addAnswer\/((\w|-)+)$/'                      => 'QuestionAnswer/addAnswer?key=:1',       //设计师的回答

        '/^QuestionAnswer\/lists\/((\w|-)+)$/'                      => 'QuestionAnswer/lists?key=:1',       //业主的问答中心
        '/^QuestionAnswer\/addQuestions\/((\w|-)+)$/'                      => 'QuestionAnswer/addQuestions?key=:1',       //业主提的问题
        '/^QuestionAnswer\/userStatusUpdate\/((\w|-)+)$/'                      => 'QuestionAnswer/userStatusUpdate?key=:1',       //更新业主的问题的状态

    ),
);
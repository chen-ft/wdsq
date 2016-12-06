<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>消费金融-小微时贷</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?php $this->loadTmplate(TEMPLATE_PATH . "public/css.tpl.php"); ?>
        
    </head>
    <body class="hold-transition skin-blue sidebar-mini <?php echo CFG_DEF_CSS; ?>">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    信审管理
                    <small>-今天不努力工作，明天努力找工作</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/admin.php?module=work&action=index"><i class="fa fa-dashboard"></i> 信审管理</a></li>
                    <li class="active">信审进度查询</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- 右边列表 -->
                    <div style="margin:0 30px;">
                        <!-- general form elements disabled -->
                        <div id="userAllInfo-list"></div>
                        <script id="userAllInfo" type="text/html">
                            {{if isStatus == '0000'}}
                            <!-- 客户信息 -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">客户信息</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <form class="form-horizontal" id="formInfo" name="formInfo">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="strUserIdCardType" class="col-sm-2 control-label" >证件类型:</label>
                                                <div class="col-sm-2">
                                                    <select disabled class="form-control" id="strUserSex" name="userInfo[strUserIdCardType]">        
                                                        <option value="0" {{if list['userInfo']['strUserIdCardType'] == 0}}selected{{/if}}>身份证</option>
                                                        <option value="1" {{if list['userInfo']['strUserIdCardType'] == 1}}selected{{/if}}>户口薄</option>
                                                        <option value="2" {{if list['userInfo']['strUserIdCardType'] == 2}}selected{{/if}}>护照</option>
                                                        <option value="3" {{if list['userInfo']['strUserIdCardType'] == 3}}selected{{/if}}>军官证</option>
                                                        <option value="4" {{if list['userInfo']['strUserIdCardType'] == 4}}selected{{/if}}>士兵证</option>
                                                        <option value="5" {{if list['userInfo']['strUserIdCardType'] == 5}}selected{{/if}}>港澳居民来往澳居内地通行证</option>
                                                        <option value="6" {{if list['userInfo']['strUserIdCardType'] == 6}}selected{{/if}}>台湾同胞来往内地通行证</option>
                                                        <option value="7" {{if list['userInfo']['strUserIdCardType'] == 7}}selected{{/if}}>临时身份证</option>
                                                        <option value="8" {{if list['userInfo']['strUserIdCardType'] == 8}}selected{{/if}}>外国人居留证</option>
                                                        <option value="9" {{if list['userInfo']['strUserIdCardType'] == 9}}selected{{/if}}>警官证</option>
                                                        <option value="A" {{if list['userInfo']['strUserIdCardType'] == A}}selected{{/if}}>香港身份证</option>
                                                        <option value="B" {{if list['userInfo']['strUserIdCardType'] == B}}selected{{/if}}>澳门身份证</option>
                                                        <option value="C" {{if list['userInfo']['strUserIdCardType'] == C}}selected{{/if}}>台湾身份证</option>
                                                        <option value="X" {{if list['userInfo']['strUserIdCardType'] == X}}selected{{/if}}>其他证件</option>
                                                    
                                                    </select>
                                                </div>
                                                <label for="strUserIdCard" class="col-sm-1 control-label">证件号码:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserIdCard" name="userInfo[strUserIdCard]" value="{{list['userInfo']['strUserIdCard']}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="strUserName" class="col-sm-2 control-label">姓名:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control " id="strUserName" name="userInfo[strUserName]" value="{{list['userInfo']['strUserName']}}">
                                                </div>
                                                <label for="phoneNum1" class="col-sm-1 control-label">手机号1:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="userPhone[phoneNum1]" value="{{list['userPhone']['0']}}">
                                                </div>
                                                <label for="phoneNum2" class="col-sm-1 control-label">手机号2:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="userPhone[phoneNum2]" value="{{list['userPhone']['1']}}" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="strUserSex" class="col-sm-2 control-label">性别:</label>
                                                <div class="col-sm-2">
                                                    <select disabled class="form-control" id="strUserSex" name="userInfo[strUserSex]">
                                                        <option value="0">未知</option>
                                                        <option value="1" {{if list['userInfo']['strUserSex'] == '1'}} selected {{/if}}>男</option>
                                                        <option value="2" {{if list['userInfo']['strUserSex'] == '2'}} selected {{/if}}>女</option>
                                                    </select>
                                                </div>
                                                <label for="strUserBirthday" class="col-sm-1 control-label">出身日期:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserBirthday" name="userInfo['strUserBirthday']" value="{{list['userInfo']['strUserBirthday']}}">
                                                </div>
                                                <label for="strUserMarriageState" class="col-sm-1 control-label ">婚姻状况:</label>
                                                <div class="col-sm-2">
                                                    <select disabled class="form-control" id="strUserMarriageState" name="strUserMarriageState">
                                                        <option value="10" {{ if '10' == list['userInfo']['strUserMarriageState'] }} selected {{/if}}>未婚</option>
                                                        <option value="20" {{ if '20' == list['userInfo']['strUserMarriageState'] }} selected {{/if}}>已婚</option>
                                                        <option value="21" {{ if '21' == list['userInfo']['strUserMarriageState'] }} selected {{/if}}>初婚</option>
                                                        <option value="22" {{ if '22' == list['userInfo']['strUserMarriageState'] }} selected {{/if}}>再婚</option>
                                                        <option value="23" {{ if '23' == list['userInfo']['strUserMarriageState'] }} selected {{/if}}>复婚</option>
                                                        <option value="30" {{ if '30' == list['userInfo']['strUserMarriageState'] }} selected {{/if}}>丧婚</option>
                                                        <option value="40" {{ if '40' == list['userInfo']['strUserMarriageState'] }} selected {{/if}}>离婚</option>
                                                        <option value="90" {{ if '90' == list['userInfo']['strUserMarriageState'] }} selected {{/if}}>未知</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="strUserEducation" class="col-sm-2 control-label">学历:</label>
                                                <div class="col-sm-2">
                                                    <select disabled class="form-control" id="strUserEducation" name="userInfo[strUserEducation]">
                                                        <option value="10" {{if '10' == list['userInfo']['strUserEducation']}}selected{{/if}}>研究生</option>
                                                        <option value="20" {{if '20' == list['userInfo']['strUserEducation']}}selected{{/if}}>大学本科</option>
                                                        <option value="30" {{if '30' == list['userInfo']['strUserEducation']}}selected{{/if}}>大学专科</option>
                                                        <option value="40" {{if '40' == list['userInfo']['strUserEducation']}}selected{{/if}}>中等专科</option>
                                                        <option value="50" {{if '50' == list['userInfo']['strUserEducation']}}selected{{/if}}>技术学校</option>
                                                        <option value="60" {{if '60' == list['userInfo']['strUserEducation']}}selected{{/if}}>高中</option>
                                                        <option value="70" {{if '70' == list['userInfo']['strUserEducation']}}selected{{/if}}>初中</option>
                                                        <option value="80" {{if '80' == list['userInfo']['strUserEducation']}}selected{{/if}}>小学</option>
                                                        <option value="90" {{if '90' == list['userInfo']['strUserEducation']}}selected{{/if}}>文盲或半文盲</option>
                                                    </select>
                                                </div>
                                                <label for="strUserQQ" class="col-sm-1 control-label">QQ号码:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserQQ" name="userInfo[strUserQQ]" value="{{list['userInfo']['strUserQQ']}}">
                                                </div>
                                                <label for="strUserWeixin" class="col-sm-1 control-label">微信号:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserWeixin"  name="userInfo[strUserWeixin]" value="{{list['userInfo']['strUserWeixin']}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="strUserBank" class="col-sm-2 control-label ">开户银行:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserBank"  name="userInfo[strUserBank]" value="{{list['userInfo']['strUserBank']}}">
                                                </div>
                                                <label for="strUserBankNum" class="col-sm-1 control-label">银行卡号:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserBankNum"  name="userInfo[strUserBankNum]" value="{{list['userInfo']['strUserBankNum']}}">
                                                </div>
                                                <label for="strUserBankPhone" class="col-sm-1 control-label   ">预留手机:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserBankPhone"  name="userInfo[strUserBankPhone]"value="{{list['userInfo'][strUserBankPhone]}}" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="strUserHousehold" class="col-sm-2 control-label   ">户籍地址:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserHousehold" name="userInfo[strUserHousehold]" value="{{list['userInfo']['strUserHousehold']}}">
                                                </div>
                                                <label for="strUserHouseholdAdder" class="col-sm-1 control-label">户籍详细地址:</label>
                                                <div class="col-sm-5">
                                                    <input disabled type="text" class="form-control" id="strUserHouseholdAdder" value="{{list['userInfo']['strUserHouseholdAdder']}}"  name="userInfo[strUserHouseholdAdder]">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="strUserLive" class="col-sm-2 control-label ">居住地址:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserLive"  name="userInfo[strUserLive]" value="{{list['userInfo']['strUserLive']}}">
                                                </div>
                                                <label for="strUserLiveAdder" class="col-sm-1 control-label">居住详细地址:</label>
                                                <div class="col-sm-5">
                                                    <input disabled type="text" class="form-control" id="strUserLiveAdder"   name="userInfo[strUserLiveAdder]" value="{{list['userInfo']['strUserLiveAdder']}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="strUserLiveState" class="col-sm-2 control-label ">居住状况:</label>
                                                <div class="col-sm-2">
                                                    <select disabled class="form-control" id="strUserLiveState" name="userInfo[strUserLiveState]">
                                                        <option value="1" {{if '1' == list['userInfo']['strUserLiveState']}}selected{{/if}}>自置</option>
                                                        <option value="2" {{if '2' == list['userInfo']['strUserLiveState']}}selected{{/if}}>按揭</option>
                                                        <option value="3" {{if '3' == list['userInfo']['strUserLiveState']}}selected{{/if}}>亲属楼宇</option>
                                                        <option value="4" {{if '4' == list['userInfo']['strUserLiveState']}}selected{{/if}}>集体宿舍</option>
                                                        <option value="5" {{if '5' == list['userInfo']['strUserLiveState']}}selected{{/if}}>租房</option>
                                                        <option value="6" {{if '6' == list['userInfo']['strUserLiveState']}}selected{{/if}}>共有住宅</option>
                                                        <option value="7" {{if '7' == list['userInfo']['strUserLiveState']}}selected{{/if}}>其他</option>
                                                        <option value="9" {{if '9' == list['userInfo']['strUserLiveState']}}selected{{/if}}>未知</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- /.box-body -->
                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- 客户信息 -->

                            <!-- 联系人信息 -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">联系人信息</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-horizontal" id="link-list">
                                    <div class="box-body" id="userLink">
                                        {{each list['userLink'] as value index}} 
                                        <div class="form-group">
                                            <label for="strLink" class="col-sm-1 control-label">联系人 {{index+1}}</label>
                                        </div>
                                        <div class='form-group'>
                                            <label for='strLinkName0' class='col-sm-2 control-label'>姓名:</label>
                                            <div class='col-sm-2'>
                                                <input disabled type='text' class='form-control' id='strLinkName0' name='userLink[strLinkName]' value="{{value['strLinkName']}}"> 
                                            </div> 
                                            <label for='strLinkPhone0' class='col-sm-1 control-label'>电话:</label> 
                                            <div class='col-sm-2'>
                                                <input disabled type='text' class='form-control' id='strLinkPhone0' name='userLink[strLinkPhone]' value="{{value['strLinkPhone']}}"> 
                                            </div>
                                            <label for='strLinkRelation0' class='col-sm-1 control-label'>关系:</label>
                                            <div class='col-sm-2'> 
                                                <select disabled class='form-control' id='strLinkRelation0' name="userLink[strLinkRelation]">
                                                    <option value='0' {{if '0' == value['strLinkRelation']}}selected{{/if}}>父子(女)</option>
                                                    <option value='1' {{if '1' == value['strLinkRelation']}}selected{{/if}}>母子(女)</option>
                                                    <option value='2' {{if '2' == value['strLinkRelation']}}selected{{/if}}>配偶</option>
                                                    <option value='3' {{if '3' == value['strLinkRelation']}}selected{{/if}}>子女</option>
                                                    <option value='4' {{if '4' == value['strLinkRelation']}}selected{{/if}}>其他亲属</option>
                                                    <option value='5' {{if '5' == value['strLinkRelation']}}selected{{/if}}>同事</option>
                                                    <option value='6' {{if '6' == value['strLinkRelation']}}selected{{/if}}>朋友</option>
                                                    <option value='7' {{if '7' == value['strLinkRelation']}}selected{{/if}}>兄弟姐妹</option>
                                                    <option value='8' {{if '8' == value['strLinkRelation']}}selected{{/if}}>其他</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class='form-group'> 
                                            <label for='strLinkReason0' class='col-sm-2 control-label'>联系事由:</label> 
                                            <div class='col-sm-2'> 
                                                <select disabled class='form-control' id='strLinkReason{{index+1}}' name='userLink[strLinkReason]'>
                                                    <option value="1" {{if '1' == value['strLinkReason']}}selected{{/if}}>背景调查</option>
                                                    <option value="2" {{if '2' == value['strLinkReason']}}selected{{/if}}>贷款名义</option>
                                                </select> 
                                            </div>
                                            <label for='strLinkOfficePhone0' class='col-sm-1 control-label'>单位电话:</label> 
                                            <div class='col-sm-2'> 
                                                <input disabled type='text' class='form-control' id='strLinkOfficePhone{{index+1}}' value="{{value['strLinkOfficePhone']}}" name='userLink[strLinkOfficePhone]' >  
                                            </div> 
                                            <label for='enLinkUrgent0' class='col-sm-1 control-label'>紧急联系人:</label>
                                            <div class='col-sm-2'> 
                                                <select disabled class='form-control' id='enLinkUrgent{{index+1}}' name='userLink[enLinkUrgent]'>
                                                    <option value="0" {{if '0' == value['enLinkUrgent']}}selected{{/if}}>否</option>
                                                    <option value="1" {{if '1' == value['enLinkUrgent']}}selected{{/if}}>是</option>
                                                </select>  
                                            </div> 
                                        </div> 
                                        <div class='form-group'> 
                                            <label for='strLinkOfficeName0' class='col-sm-2 control-label'>单位名称:</label>
                                            <div class='col-sm-2'>  
                                                <input disabled type='text' class='form-control' id='strLinkOfficeName{{index+1}}' value="{{value['strLinkOfficeName']}}" name='userLink[strLinkOfficeName]'  >
                                            </div>
                                            <label for='strLinkOffice0' class='col-sm-1 control-label'>单位地址:</label>
                                            <div class='col-sm-2'> 
                                                <input disabled type='text' class='form-control' id='strLinkOffice{{index+1}}' value="{{value['strLinkOffice']}}" name='userLink[strLinkOffice]'>
                                            </div> 
                                            <label for='strLinkOfficeAdder0' class='col-sm-1 control-label'>单位详情:</label>
                                            <div class='col-sm-2'>  
                                                <input disabled type='text' class='form-control' id='strLinkOfficeAdder{{index+1}}' value="{{value['strLinkOfficeAdder']}}" name='userLink[strLinkOfficeAdder]' > 
                                            </div>
                                        </div>
                                        {{/each}}
                                        
                                    </div><!-- /.box-body -->
                                </form>
                            </div><!--联系人信息 -->

                            <!-- 单位信息 -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">单位信息</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form class="form-horizontal" name="office-list">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="strUserOfficeName" class="col-sm-2 control-label">单位名称:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="userOffice[strUserOfficeName]" value="{{list['userOffice']['strUserOfficeName']}}">
                                                </div>
                                                <label for="strUserOfficeNature" class="col-sm-1 control-label">单位性质:</label>
                                                <div class="col-sm-2">
                                                    <select disabled class="form-control" id="userOffice" name="userOffice[strUserOfficeNature]">
                                                        <option value="0" {{if '0' == list['userOffice']['strUserOfficeNature']}}selected{{/if}}>机关单位</option>
                                                        <option value="1" {{if '1' == list['userOffice']['strUserOfficeNature']}}selected{{/if}}>国有单位</option>
                                                        <option value="2" {{if '2' == list['userOffice']['strUserOfficeNature']}}selected{{/if}}>外资</option>
                                                        <option value="3" {{if '3' == list['userOffice']['strUserOfficeNature']}}selected{{/if}}>合资</option>
                                                        <option value="4" {{if '4' == list['userOffice']['strUserOfficeNature']}}selected{{/if}}>民营</option>
                                                        <option value="5" {{if '5' == list['userOffice']['strUserOfficeNature']}}selected{{/if}}>私企</option>
                                                        <option value="6" {{if '6' == list['userOffice']['strUserOfficeNature']}}selected{{/if}}>个体</option>
                                                    </select>
                                                </div>
                                                <label for="strUserDuties" class="col-sm-1 control-label">职务:</label>
                                                <div class="col-sm-2">
                                                    <select disabled class="form-control" id="strUserDuties" name="userOffice['strUserDuties']">
                                                        <option value="1" {{if '1' == list['userOffice']['strUserDuties']}}selected{{/if}}>高级领导</option>
                                                        <option value="2" {{if '2' == list['userOffice']['strUserDuties']}}selected{{/if}}>中级领导</option>
                                                        <option value="3" {{if '3' == list['userOffice']['strUserDuties']}}selected{{/if}}>一般员工</option>
                                                        <option value="4" {{if '4' == list['userOffice']['strUserDuties']}}selected{{/if}}>其他</option>
                                                        <option value="9" {{if '9' == list['userOffice']['strUserDuties']}}selected{{/if}}>未知</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="strUserWages" class="col-sm-2 control-label">月薪:</label>
                                                <div class="col-sm-2">
                                                    <select disabled name="userOffice[strUserWages]" id="strUserWages" class="form-control">
                                                        <option value="1" {{if '1' == list['userOffice']['strUserWages']}}selected{{/if}}>2000以下</option>
                                                        <option value="2" {{if '2' == list['userOffice']['strUserWages']}}selected{{/if}}>2000~3000</option>
                                                        <option value="3" {{if '3' == list['userOffice']['strUserWages']}}selected{{/if}}>3000~5000</option>
                                                        <option value="4" {{if '4' == list['userOffice']['strUserWages']}}selected{{/if}}>5000~8000</option>
                                                        <option value="5" {{if '5' == list['userOffice']['strUserWages']}}selected{{/if}}>8000~12000</option>
                                                        <option value="6" {{if '6' == list['userOffice']['strUserWages']}}selected{{/if}}>12000以上</option>
                                                    </select>
                                                </div>
                                                <label for="strUserWagesMode" class="col-sm-1 control-label   ">发薪渠道:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserWagesMode" name="userOffice[strUserWagesMode]" value="{{list['userOffice']['strUserWagesMode']}}">
                                                </div>
                                                <label for="strUserOtherIncome" class="col-sm-1 control-label   ">其他收入:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserOtherIncome" name="userOffice[strUserOtherIncome]" value="{{list['userOffice']['strUserOtherIncome']}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="strUserWagesDay" class="col-sm-2 control-label">发薪日:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserWagesDay" name="userOffice[strUserWagesDay]" value="{{list['userOffice']['strUserWagesDay']}}">
                                                </div>
                                                <label for="strUserOfficeTime" class="col-sm-1 control-label">入职时间:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserOfficeTime" name="userOffice[strUserOfficeTime]" value="{{list['userOffice']['strUserOfficeTime']}}" >
                                                </div>

                                                <label for="strUserOfficePhone" class="col-sm-1 control-label   ">单位电话:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserOfficePhone"  name="userOffice[strUserOfficePhone]" value="{{list['userOffice']['strUserOfficePhone']}}" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="strUserOfficeBranch" class="col-sm-2 control-label   ">所在部门:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserOfficeBranch" name="userOffice[strUserOfficeBranch]" value="{{list['userOffice']['strUserOfficeBranch']}}">
                                                </div>
                                                <label for="strUserOffice" class="col-sm-1 control-label">单位地址:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserOffice" name="userOffice[strUserOffice]" value="{{list['userOffice']['strUserOffice']}}">
                                                </div>
                                                <label for="strUserOfficeAdder" class="col-sm-1 control-label   ">详细地址:</label>
                                                <div class="col-sm-2">
                                                    <input disabled type="text" class="form-control" id="strUserOfficeAdder" name="userOffice[strUserOfficeAdder]" value="{{list['userOffice']['strUserOfficeAdder']}}">
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label for="strUserOfficeType" class="col-sm-2 control-label">单位所属行业:</label>
                                                <div class="col-sm-3">
                                                    <select disabled class="form-control" id="strUserOfficeType" name="userOffice[strUserOfficeType]">
                                                        <option value="A" {{if 'A' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>农、林、牧、渔业</option>
                                                        <option value="B" {{if 'B' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>采掘业</option>
                                                        <option value="C" {{if 'C' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>制造业</option>
                                                        <option value="D" {{if 'D' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>电力、燃气及水的生产和供应业</option>
                                                        <option value="E" {{if 'E' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>建筑业</option>
                                                        <option value="F" {{if 'F' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>交通运输、仓储和邮政业</option>
                                                        <option value="G" {{if 'G' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>信息传输、计算机服务和软件业</option>
                                                        <option value="H" {{if 'H' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>批发和零售业</option>
                                                        <option value="I" {{if 'I' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>住宿和餐饮业</option>
                                                        <option value="J" {{if 'J' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>金融业</option>
                                                        <option value="K" {{if 'K' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>房地产业</option>
                                                        <option value="L" {{if 'L' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>租赁和商务服务业</option>
                                                        <option value="M" {{if 'M' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>科学研究、技术服务业和地质勘察业</option>
                                                        <option value="N" {{if 'N' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>水利、环境和公共设施管理业</option>
                                                        <option value="O" {{if 'O' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>居民服务和其他服务业</option>
                                                        <option value="P" {{if 'P' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>教育</option>
                                                        <option value="Q" {{if 'Q' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>卫生、社会保障和社会福利业</option>
                                                        <option value="R" {{if 'R' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>文化、体育和娱乐业</option>
                                                        <option value="S" {{if 'S' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>公共管理和社会组织</option>
                                                        <option value="T" {{if 'T' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>国际组织</option>
                                                        <option value="Z" {{if 'Z' == list['userOffice']['strUserOfficeType']}}selected{{/if}}>未知</option>
                                                    </select>
                                                </div>
                                                <label for="strUserOccupation" class="col-sm-2 control-label  ">职业:</label>
                                                <div class="col-sm-3">
                                                    <select disabled class="form-control" id="strUserOccupation" name="userOffice[strUserOccupation]">
                                                        <option value="0" {{if '0' == list['userOffice']['strUserOccupation']}}selected{{/if}}>国家机关、党群组织、企业、事业单位负责人</option>
                                                        <option value="1" {{if '1' == list['userOffice']['strUserOccupation']}}selected{{/if}}>专业技术人员</option>
                                                        <option value="3" {{if '3' == list['userOffice']['strUserOccupation']}}selected{{/if}}>办事人员和有关人员</option>
                                                        <option value="4" {{if '4' == list['userOffice']['strUserOccupation']}}selected{{/if}}>商业、服务业人员</option>
                                                        <option value="5" {{if '5' == list['userOffice']['strUserOccupation']}}selected{{/if}}>农、林、牧、渔、水利业生产人员</option>
                                                        <option value="6" {{if '6' == list['userOffice']['strUserOccupation']}}selected{{/if}}>生产、运输设备操作人员及有关人员</option>
                                                        <option value="X" {{if 'X' == list['userOffice']['strUserOccupation']}}selected{{/if}}>军人</option>
                                                        <option value="Y" {{if 'Y' == list['userOffice']['strUserOccupation']}}selected{{/if}}>不便分类的其他从业人员</option>
                                                        <option value="Z" {{if 'Z' == list['userOffice']['strUserOccupation']}}selected{{/if}}>未知</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div><!-- /.box-body -->
                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- 单位信息 -->
                            {{else}}
                            <p>获取用户数据错误</p>
                            {{/if}}
                            </script>
                            <!-- 申请数据 -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title"> 申请数据 </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form class="form-horizontal">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">申请产品:</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control" name="" id="">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <label for="inputEmail3" class="col-sm-1 control-label">申请额度:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="inputEmail3" value="">
                                                </div>
                                                <label for="inputEmail3" class="col-sm-1 control-label">借款用途:</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name="" id="">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">借款期限:</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control" name="" id="">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <label for="inputEmail3" class="col-sm-1 control-label">最高承受额:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="inputEmail3" value=""  >
                                                </div>
                                                <label for="inputEmail3" class="col-sm-1 control-label"></label>
                                                <div class="col-sm-1">

                                                </div>
                                            </div>
                                        </div><!-- /.box-body -->
                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- 申请数据 -->

                            <!-- 业务员信息 -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title"> 业务员信息 </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form class="form-horizontal">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">销售人员:</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control" name="" id="">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <label for="inputEmail3" class="col-sm-1 control-label">客户来源:</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name="" id="">
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                                <label for="inputEmail3" class="col-sm-1 control-label">客服人员:</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">录件备注:</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputEmail3" value=""  >
                                                </div>
                                            </div>
                                        </div><!-- /.box-body -->
                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- 业务员信息 -->

                            <!-- 影像件 -->
                            <!-- 影像件 -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"> 影像件上传 </h3>
                </div><!-- /.box-header -->
                <form class="form-horizontal" >
                  <div class="box-body" style="margin-bottom: 40px;background: #fff;">
                   <ul id="myTab" class="nav nav-tabs">
                      <li class="active">
                        <a href="#table" data-toggle="tab">
                        申请表
                        </a>
                      </li>
                      <li><a href="#ID" data-toggle="tab">身份证和验磁截屏</a></li>
                      <li><a href="#data" data-toggle="tab">网查资料</a></li>
                      <li><a href="#card" data-toggle="tab">银行卡</a></li>
                      <li><a href="#social" data-toggle="tab">社保公积金</a></li>
                      <li><a href="#insurance" data-toggle="tab">寿险保单</a></li>
                      <li><a href="#other" data-toggle="tab">其他</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div class="tab-pane fade in active" id="table">
                        <input id="file-1" type="file" name="image_data" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
                      </div>
                      <div class="tab-pane fade" id="ID">
                        <input id="file-2" type="file" name="image_data" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
                      </div>
                      <div class="tab-pane fade" id="data">
                        <input id="file-3" type="file" name="image_data" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
                      </div>
                      <div class="tab-pane fade" id="card">
                        <input id="file-4" type="file" name="image_data" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
                      </div>
                      <div class="tab-pane fade" id="social">
                        <input id="file-5" type="file" name="image_data" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
                      </div>
                      <div class="tab-pane fade" id="insurance">
                        <input id="file-6" type="file" name="image_data" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
                      </div>
                      <div class="tab-pane fade" id="other">
                        <input id="file-7" type="file" name="image_data" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
                      </div>
                    </div>
                  </div>
                  <div id="kv-success-modal" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Yippee!</h4>
                        </div>
                        <div id="kv-success-box" class="modal-body">
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>  <!-- 影像件 -->
                            
                            <!--审核列表-->
                            <div class="box box-info">
                                <div class="nav-tabs-custom">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="verifyList-list">
                                            <script id="verifyList" type="text/html">
                                            <!-- Post -->
                                            {{each list as value index}} 
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm" src="/home/dist/img/user1-128x128.jpg" alt="user image">
                                                    <span class="username">
                                                        <a href="#">{{value['strOperationId']}}</a>
                                                    </span>
                                                    <span class="description">{{value['tCreateTime']}}</span>
                                                </div><!-- /.user-block -->
                                                <p>
                                                    {{value['strRemark']}}
                                                </p>
                                            </div><!-- /.post -->
                                            {{/each}}
                                            </script>
                                        </div><!-- /.tab-pane -->

                                    </div><!-- /.tab-content -->
                                </div>
                            </div>
                            <!-- 面审区 -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title"> 审核区 </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form class="form-horizontal">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">面审结果:</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control" name="" id="">
                                                        <option value="">待处理</option>
                                                        <option value="">通过</option>
                                                        <option value="">拒接</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">面审备注:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="" value="该客户无问题可正常放款">
                                                </div>
                                                <div class="col-sm-1">
                                                    <button class="btn btn-danger pull-right btn-block btn-sm">提交</button>
                                                </div>
                                            </div>
                                        </div><!-- /.box-body -->
                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- 面审区 -->
                        </div>   <!-- 右边列表 -->
                    </div>
                </section><!-- /.content -->
            </div>
            <?php $this->loadTmplate(TEMPLATE_PATH . "public/js.tpl.php"); ?>
        </body>
    </html>
    <script src="<?php echo CFG_JS_PATH; ?>/template/template.js"></script>
    <link rel="stylesheet" href="/home/plugins/bootstrap-fileinput/fileinput.min.css">
    <script src="/home/plugins/bootstrap-fileinput/fileinput.min.js"></script>
    <script>
    $(function() {
        $("#example1").DataTable();
    });
    console.log('flowlist-list');
    $.post("/admin.php?module=ajax&action=handle&strUserId=<?php echo $_GET['strUserId'] ?>",
            function(listData) {
                var data = {
                    title: listData['data']['title'],
                    isStatus: listData['ret'],
                    list: listData['data']['content'],
                };
                var html = template('userAllInfo', data);
                $("#userAllInfo-list").html(html);
            }, "json");
    $.post("/admin.php?module=ajax&action=verifyList&strWorkNum=<?php echo $_GET['strWorkNum'] ?>",
            function(listData) {
                var data = {
                    title: listData['data']['title'],
                    isStatus: listData['ret'],
                    list: listData['data']['content'],
                };
                var html = template('verifyList', data);
                $("#verifyList-list").html(html);
            }, "json");
            
            
            //图片上传
        $("#file-1").fileinput({
          language: 'zh',
          uploadUrl: '/jjtong/php/admin/imgUpload.php', // you must set a valid URL here else you will get an error
          allowedFileExtensions : ['jpg', 'png','gif'],
          uploadAsync: true,
          overwriteInitial: false,
          maxFileSize: 1000,
          maxFilesNum: 10,
          //allowedFileTypes: ['image', 'video', 'flash'],
          slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
          }
        }).on('filepreupload', function() {
          $('#kv-success-box').html('');
        }).on('fileuploaded', function(event, data) {
          $('#kv-success-box').append(data.response.link);
          $('#kv-success-modal').modal('show');
        });

         $("#file-2").fileinput({
          language: 'zh',
          uploadUrl: '/jjtong/php/admin/imgUpload.php', // you must set a valid URL here else you will get an error
          allowedFileExtensions : ['jpg', 'png','gif'],
          uploadAsync: true,
          overwriteInitial: false,
          maxFileSize: 1000,
          maxFilesNum: 10,
          //allowedFileTypes: ['image', 'video', 'flash'],
          slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
          }
        }).on('filepreupload', function() {
          $('#kv-success-box').html('');
        }).on('fileuploaded', function(event, data) {
          $('#kv-success-box').append(data.response.link);
          $('#kv-success-modal').modal('show');
        });

        $("#file-3").fileinput({
          language: 'zh',
          uploadUrl: '/jjtong/php/admin/imgUpload.php', // you must set a valid URL here else you will get an error
          allowedFileExtensions : ['jpg', 'png','gif'],
          uploadAsync: true,
          overwriteInitial: false,
          maxFileSize: 1000,
          maxFilesNum: 10,
          //allowedFileTypes: ['image', 'video', 'flash'],
          slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
          }
        }).on('filepreupload', function() {
          $('#kv-success-box').html('');
        }).on('fileuploaded', function(event, data) {
          $('#kv-success-box').append(data.response.link);
          $('#kv-success-modal').modal('show');
        });
        $("#file-4").fileinput({
          language: 'zh',
          uploadUrl: '/jjtong/php/admin/imgUpload.php', // you must set a valid URL here else you will get an error
          allowedFileExtensions : ['jpg', 'png','gif'],
          uploadAsync: true,
          overwriteInitial: false,
          maxFileSize: 1000,
          maxFilesNum: 10,
          //allowedFileTypes: ['image', 'video', 'flash'],
          slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
          }
        }).on('filepreupload', function() {
          $('#kv-success-box').html('');
        }).on('fileuploaded', function(event, data) {
          $('#kv-success-box').append(data.response.link);
          $('#kv-success-modal').modal('show');
        });
        $("#file-5").fileinput({
          language: 'zh',
          uploadUrl: '/jjtong/php/admin/imgUpload.php', // you must set a valid URL here else you will get an error
          allowedFileExtensions : ['jpg', 'png','gif'],
          uploadAsync: true,
          overwriteInitial: false,
          maxFileSize: 1000,
          maxFilesNum: 10,
          //allowedFileTypes: ['image', 'video', 'flash'],
          slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
          }
        }).on('filepreupload', function() {
          $('#kv-success-box').html('');
        }).on('fileuploaded', function(event, data) {
          $('#kv-success-box').append(data.response.link);
          $('#kv-success-modal').modal('show');
        });
        $("#file-6").fileinput({
          language: 'zh',
          uploadUrl: '/jjtong/php/admin/imgUpload.php', // you must set a valid URL here else you will get an error
          allowedFileExtensions : ['jpg', 'png','gif'],
          uploadAsync: true,
          overwriteInitial: false,
          maxFileSize: 1000,
          maxFilesNum: 10,
          //allowedFileTypes: ['image', 'video', 'flash'],
          slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
          }
        }).on('filepreupload', function() {
          $('#kv-success-box').html('');
        }).on('fileuploaded', function(event, data) {
          $('#kv-success-box').append(data.response.link);
          $('#kv-success-modal').modal('show');
        });

       $("#file-7").fileinput({
          language: 'zh',
          uploadUrl: '/jjtong/php/admin/imgUpload.php', // you must set a valid URL here else you will get an error
          allowedFileExtensions : ['jpg', 'png','gif'],
          uploadAsync: true,
          overwriteInitial: false,
          maxFileSize: 1000,
          maxFilesNum: 10,
          //allowedFileTypes: ['image', 'video', 'flash'],
          slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
          }
        }).on('filepreupload', function() {
          $('#kv-success-box').html('');
        }).on('fileuploaded', function(event, data) {
          $('#kv-success-box').append(data.response.link);
          $('#kv-success-modal').modal('show');
        });
    </script>
<?php
$this->renderPartial("_left");
$this->renderPartial("_left1");
$this->renderPartial("_right"); ?>
<div class="panel panel-danger">
  <div class="panel-heading">Dò vé online - may mắn mỗi ngày</div>
  <div class="panel-body">
    
    <table align="center" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td>
        <?php if($error==1){ ?>
        <img src="<?php echo Yii::app()->homeUrl ?>img/137.gif" alt="" hspace="5" border="0" align="absmiddle">
        <?php } if($error==0){ ?>
        <img src="<?php echo Yii::app()->homeUrl ?>img/thantai.gif" alt="" hspace="5" border="0" align="absmiddle">
        <?php } if($error==2){?>
        <img src="<?php echo Yii::app()->homeUrl ?>img/warning-icon.png" alt="" hspace="5" border="0" align="absmiddle">
        <?php } ?>
      </td>
        <td class="vesokotrung" style="font-weight: bold; font-size: 14px;<?php if($error==0){?> color:#DF0000 <?php } ?>"><?php echo $message; ?>
        <?php if($error==0){?> <br /><br /><a href="/doi-so-trung.html" class="btn btn-danger" target="_blank">Đổi số trúng bấm đây!!!</a><?php } ?>
        </td>
      </tr>
    </tbody></table>
    
  </div>
</div>

<div class="panel panel-xs">
  <div class="panel-heading">&nbsp;Những qui định chung:</div>
  <div class="panel-body">
    
        <p style="text-align: justify;">
        	-Vé số trúng là vé có các số cuối trùng với các con số trên bảng kết quả theo thứ tự hàng, vé sai một số so với giải Đặc Biệt (theo cơ cấu giải Khuyến Khích hay Đặc Biệt Phụ đối với vé số Miền Nam và Miền Trung), vé có 2 số cuối trùng với 2 số cuối giải Đặc Biệt (đối với vé số Miền Bắc)</p>
        <p style="text-align: justify;">
        	-Vé số trúng phải còn nguyên hình, nguyên số, không rách rời và không cạo sửa.</p>
        <p style="text-align: justify;">
        	-Vé số trúng được lãnh thưởng 1 lần bằng tiền mặt hoặc chuyển khoản trong thời hạn trả thưởng qui định.</p>
        <p style="text-align: justify;">
        	-Vé số trúng nhiều giải được lãnh đủ giá trị các giải.</p>
        <p style="text-align: justify;">
    	-Các giải có tổng giá trị trên 10 triệu đồng phải đóng thuế thu nhập cá nhân, các Công Ty Xổ Số khấu trừ và nộp vào ngân sách nhà nước khi trả thưởng.</p>

    </div>
</div>

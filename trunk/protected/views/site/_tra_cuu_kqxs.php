<div class="body-r"><script language="javascript">
 function changeformquery(i)
 {
	if(i==1)
	{
		$("#tc_tinh").hide();
		$("#tc_dauduoi").hide();
		$("#tc_mien").fadeTo(200,0.1,function() //start fading the messagebox
		{
		  $(this).fadeTo(900,1);
		});
       
	}
	else if(i==2)
	{
		$("#tc_mien").hide();
		$("#tc_dauduoi").hide();
		$("#tc_tinh").fadeTo(200,0.1,function() //start fading the messagebox
		{
		  $(this).fadeTo(900,1);
		});
       
	}
	else if(i==3)
	{
		$("#tc_mien").hide();
		$("#tc_tinh").hide();
		$("#tc_dauduoi").fadeTo(200,0.1,function() //start fading the messagebox
		{
		  $(this).fadeTo(900,1);
		});
       
	}
 }
</script>
<div id="box_tracuukqxs">
<table width="100%" align="center" cellpadding="0" cellspacing="5">
  <tbody><tr align="left" valign="middle">
    <td><label>
      <input name="slquery" type="radio" id="slquery_0" onclick="javascript:changeformquery(1);" value="1" checked="checked">
       Miền</label></td>
  
    <td><label>
      <input type="radio" name="slquery" value="2" id="slquery_1" onclick="javascript:changeformquery(2);">
       Tỉnh</label></td>
 
    <td><label>
      <input type="radio" name="slquery" value="3" id="slquery_2" onclick="javascript:changeformquery(3);">
      Đầu đuôi</label></td>
  </tr>
</tbody></table>
<div id="tc_mien" style="display: block; opacity: 1;">
<table border="0" cellspacing="0" cellpadding="2" width="100%">
  <form id="tracuukqxs" name="tracuukqxs" method="get" action="/tra-cuu-ket-qua-xo-so.html" style="font-size:10px"></form>
    <tbody><tr>
      <td align="center" nowrap="nowrap" style="padding-bottom:10px">
      <select name="mien" id="mien" style="width:88px;">
          <option value="0">Chọn Miền</option>
                    <option value="1">
          Miền Nam          </option>
                    <option value="2">
          Miền Bắc          </option>
                    <option value="3">
          Miền Trung          </option>
                  </select>
        <select name="thu" id="thu" style="width:88px;">
          <option value="0">Chọn thứ</option>
          <option value="1">Chủ Nhật</option>
          <option value="7">Thứ Bảy</option>
          <option value="6">Thứ Sáu</option>
          <option value="5">Thứ Năm</option>
          <option value="4">Thứ Tư</option>
          <option value="3">Thứ Ba</option>
          <option value="2">Thứ Hai</option>
        </select></td>
    </tr>
    <tr>
      <td nowrap="nowrap" style="padding-bottom:10px" align="center">
      <select name="ngay" id="ngay" style="width:57px;">
          <option value="">Ngày</option>
                    <option value="1">
          1          </option>
                    <option value="2">
          2          </option>
                    <option value="3">
          3          </option>
                    <option value="4">
          4          </option>
                    <option value="5">
          5          </option>
                    <option value="6">
          6          </option>
                    <option value="7">
          7          </option>
                    <option value="8">
          8          </option>
                    <option value="9">
          9          </option>
                    <option value="10">
          10          </option>
                    <option value="11">
          11          </option>
                    <option value="12">
          12          </option>
                    <option value="13">
          13          </option>
                    <option value="14">
          14          </option>
                    <option value="15">
          15          </option>
                    <option value="16">
          16          </option>
                    <option value="17">
          17          </option>
                    <option value="18">
          18          </option>
                    <option value="19">
          19          </option>
                    <option value="20">
          20          </option>
                    <option value="21">
          21          </option>
                    <option value="22">
          22          </option>
                    <option value="23">
          23          </option>
                    <option value="24">
          24          </option>
                    <option value="25">
          25          </option>
                    <option value="26">
          26          </option>
                    <option value="27">
          27          </option>
                    <option value="28">
          28          </option>
                    <option value="29">
          29          </option>
                    <option value="30">
          30          </option>
                    <option value="31">
          31          </option>
                  </select>
        <select name="thang" id="thang" style="width:62px;">
          <option value="">Tháng</option>
                    <option value="1">
          1          </option>
                    <option value="2">
          2          </option>
                    <option value="3">
          3          </option>
                    <option value="4">
          4          </option>
                    <option value="5">
          5          </option>
                    <option value="6">
          6          </option>
                    <option value="7">
          7          </option>
                    <option value="8">
          8          </option>
                    <option value="9">
          9          </option>
                    <option value="10">
          10          </option>
                    <option value="11">
          11          </option>
                    <option value="12">
          12          </option>
                  </select>
        <select name="nam" id="nam" style="width:54px;">
          <option value="">Năm</option>
                    <option value="2014">
          2014          </option>
                    <option value="2013">
          2013          </option>
                    <option value="2012">
          2012          </option>
                    <option value="2011">
          2011          </option>
                    <option value="2010">
          2010          </option>
                    <option value="2009">
          2009          </option>
                    <option value="2008">
          2008          </option>
                    <option value="2007">
          2007          </option>
                    <option value="2006">
          2006          </option>
                    <option value="2005">
          2005          </option>
                  </select></td>
    </tr>
    <tr>
      <td align="right"><input class="btn btn-default btn-sm" type="submit" value="Xem kết quả"></td>
    </tr>
  
</tbody></table>
</div>
<div id="tc_tinh" style="opacity: 1; display: none;">
<table border="0" cellspacing="0" cellpadding="2" width="100%">
  <form id="tracuukqxs" name="tracuukqxs" method="get" action="/tra-cuu-ket-qua-xo-so-tinh.html" style="font-size:10px"></form>
    <tbody><tr>
      <td style="padding-bottom:10px" align="center">
      <select name="tinh" id="tinh" style="width:180px">
          <option value="0">-Chọn Tỉnh / TP-</option>
                    <optgroup label="Miền Nam">
                    <option value="14">Xổ Số
          An Giang          </option>
                    <option value="9">Xổ Số
          Bạc Liêu          </option>
                    <option value="7">Xổ Số
          Bến Tre          </option>
                    <option value="17">Xổ Số
          Bình Dương          </option>
                    <option value="21">Xổ Số
          Bình Phước          </option>
                    <option value="15">Xổ Số
          Bình Thuận          </option>
                    <option value="3">Xổ Số
          Cà Mau          </option>
                    <option value="11">Xổ Số
          Cần Thơ          </option>
                    <option value="24">Xổ Số
          Đà Lạt          </option>
                    <option value="10">Xổ Số
          Đồng Nai          </option>
                    <option value="2">Xổ Số
          Đồng Tháp          </option>
                    <option value="20">Xổ Số
          Hậu Giang          </option>
                    <option value="23">Xổ Số
          Kiên Giang          </option>
                    <option value="19">Xổ Số
          Long An          </option>
                    <option value="12">Xổ Số
          Sóc Trăng          </option>
                    <option value="13">Xổ Số
          Tây Ninh          </option>
                    <option value="22">Xổ Số
          Tiền Giang          </option>
                    <option value="1">Xổ Số
          TP. HCM          </option>
                    <option value="18">Xổ Số
          Trà Vinh          </option>
                    <option value="16">Xổ Số
          Vĩnh Long          </option>
                    <option value="8">Xổ Số
          Vũng Tàu          </option>
                    </optgroup>
                    <optgroup label="Miền Bắc">
                    <option value="48">Xổ Số
          Bắc Ninh          </option>
                    <option value="46">Xổ Số
          Hà Nội          </option>
                    <option value="49">Xổ Số
          Hải Phòng          </option>
                    <option value="50">Xổ Số
          Nam Định          </option>
                    <option value="47">Xổ Số
          Quảng Ninh          </option>
                    <option value="51">Xổ Số
          Thái Bình          </option>
                    </optgroup>
                    <optgroup label="Miền Trung">
                    <option value="32">Xổ Số
          Bình Định          </option>
                    <option value="30">Xổ Số
          Đà Nẵng          </option>
                    <option value="29">Xổ Số
          Đắk Lắk          </option>
                    <option value="38">Xổ Số
          Đắk Nông          </option>
                    <option value="35">Xổ Số
          Gia Lai          </option>
                    <option value="31">Xổ Số
          Khánh Hòa          </option>
                    <option value="39">Xổ Số
          Kon Tum          </option>
                    <option value="36">Xổ Số
          Ninh Thuận          </option>
                    <option value="27">Xổ Số
          Phú Yên          </option>
                    <option value="34">Xổ Số
          Quảng Bình          </option>
                    <option value="28">Xổ Số
          Quảng Nam          </option>
                    <option value="37">Xổ Số
          Quảng Ngãi          </option>
                    <option value="33">Xổ Số
          Quảng Trị          </option>
                    <option value="26">Xổ Số
          Thừa T. Huế          </option>
                    </optgroup>
                  </select></td>
    </tr>
    <tr>
      <td nowrap="nowrap" style="padding-bottom:10px" align="center">
      <select name="ngay" id="ngay" style="width:57px;">
          <option value="">Ngày</option>
                    <option value="1">
          1          </option>
                    <option value="2">
          2          </option>
                    <option value="3">
          3          </option>
                    <option value="4">
          4          </option>
                    <option value="5">
          5          </option>
                    <option value="6">
          6          </option>
                    <option value="7">
          7          </option>
                    <option value="8">
          8          </option>
                    <option value="9">
          9          </option>
                    <option value="10">
          10          </option>
                    <option value="11">
          11          </option>
                    <option value="12">
          12          </option>
                    <option value="13">
          13          </option>
                    <option value="14">
          14          </option>
                    <option value="15">
          15          </option>
                    <option value="16">
          16          </option>
                    <option value="17">
          17          </option>
                    <option value="18">
          18          </option>
                    <option value="19">
          19          </option>
                    <option value="20">
          20          </option>
                    <option value="21">
          21          </option>
                    <option value="22">
          22          </option>
                    <option value="23">
          23          </option>
                    <option value="24">
          24          </option>
                    <option value="25">
          25          </option>
                    <option value="26">
          26          </option>
                    <option value="27">
          27          </option>
                    <option value="28">
          28          </option>
                    <option value="29">
          29          </option>
                    <option value="30">
          30          </option>
                    <option value="31">
          31          </option>
                  </select>
        <select name="thang" id="thang" style="width:62px;">
          <option value="">Tháng</option>
                    <option value="1">
          1          </option>
                    <option value="2">
          2          </option>
                    <option value="3">
          3          </option>
                    <option value="4">
          4          </option>
                    <option value="5">
          5          </option>
                    <option value="6">
          6          </option>
                    <option value="7">
          7          </option>
                    <option value="8">
          8          </option>
                    <option value="9">
          9          </option>
                    <option value="10">
          10          </option>
                    <option value="11">
          11          </option>
                    <option value="12">
          12          </option>
                  </select>
        <select name="nam" id="nam" style="width:54px;">
          <option value="">Năm</option>
                    <option value="2014">
          2014          </option>
                    <option value="2013">
          2013          </option>
                    <option value="2012">
          2012          </option>
                    <option value="2011">
          2011          </option>
                    <option value="2010">
          2010          </option>
                    <option value="2009">
          2009          </option>
                    <option value="2008">
          2008          </option>
                    <option value="2007">
          2007          </option>
                    <option value="2006">
          2006          </option>
                    <option value="2005">
          2005          </option>
                  </select></td>
    </tr>
    <tr>
      <td align="right"><input class="btn btn-default btn-sm" type="submit" value="Xem kết quả"></td>
    </tr>
  
</tbody></table>
</div>
<div id="tc_dauduoi" style="opacity: 1; display: none;">
<table border="0" cellspacing="0" cellpadding="2" width="100%">
<script>function getformsodauduoi()
{
if($("#thusdd").val()!='0')
{
	document.location='/so-dau-duoi/'+$("#miensdd").val()+'/'+$("#thusdd").val()+'.html';
}
else
{
	document.location='/so-dau-duoi/'+$("#miensdd").val()+'.html';
}
return false;}</script>
  <form id="frm_tracuusodauduoi" name="frm_tracuusodauduoi" method="get" style="font-size:10px" onsubmit="return getformsodauduoi()"></form>
    <tbody><tr>
      <td nowrap="nowrap" align="center" style="padding-bottom:10px">
      <select name="mien" id="miensdd" style="width:88px;">
                    <option value="mien-nam">
          Miền Nam          </option>
                    <option value="mien-bac">
          Miền Bắc          </option>
                    <option value="mien-trung">
          Miền Trung          </option>
                  </select>
        <select name="thu" id="thusdd" style="width:88px;">
          <option value="0">Chọn thứ</option>
          <option value="chu-nhat">Chủ Nhật</option>
          <option value="thu-bay">Thứ Bảy</option>
          <option value="thu-sau">Thứ Sáu</option>
          <option value="thu-nam">Thứ Năm</option>
          <option value="thu-tu">Thứ Tư</option>
          <option value="thu-ba">Thứ Ba</option>
          <option value="thu-hai">Thứ Hai</option>
        </select></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap"><input class="btn btn-default btn-sm" type="submit" value="Xem kết quả"></td>
    </tr>
  
</tbody></table>
</div>
</div></div>
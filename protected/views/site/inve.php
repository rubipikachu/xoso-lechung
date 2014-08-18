<?php
$this->renderPartial("_left");
$this->renderPartial("_left1");
$this->renderPartial("_right"); ?>

<div class="panel panel-danger">
  <div class="panel-heading">IN VÉ DÒ - (IN BẢNG KẾT QUẢ XỔ SỐ)</div>
  <div class="panel-body form-inline">
    
    <form method="get" target="_blank" action="/in-ve-do.html">
        Miền: <select name="mien" class="inputsearch form-control">
            <option value="1">Miền Nam</option>
            <option value="2">Miền Trung</option>
            <option value="3">Miền Bắc</option>
        </select>
        &nbsp;
        Ngày: <input class="inputsearch form-control" name="vdn" value="<?php echo date("d-m-Y",time()) ?>" />
        &nbsp; <input type="submit" name="In" value="In Vé Dò" class="btn btn-success" />
        <br />
        <input type="radio" name="page" checked="checked" value="1" /> In 1 bảng/A4 &nbsp;
        <input type="radio" name="page" value="4" /> In 4 bảng/A4
        
    </form>
    
  </div>
</div>

<div class="panel panel-xs">
  <div class="panel-heading">&nbsp;Hướng dẫn in KQXS</div>
  <div class="panel-body">
        <div><p style="text-align: center">
	<img alt="" border="0" height="98" src="<?php echo Yii::app()->homeUrl; ?>img/in-ve-do-4-bang.png" width="79">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img alt="" border="0" height="98" src="<?php echo Yii::app()->homeUrl; ?>img/in-ve-do-1-bang.png" width="79"></p>
<p style="text-align: center">
	<span style="color: #800000"><strong><span style="font-size: 18px"><span style="font-family: Times New Roman">Hướng Dẫn&nbsp;In Vé Dò Kết Quả Xổ Số</span></span></strong></span></p>
<p style="text-align: justify">
	<span style="font-size: 13px">&nbsp; </span><a href="http://www.lechung.vn"><span style="font-size: 13px">www.lechung.vn</span></a>&nbsp; Ngoài thế mạnh là một&nbsp;hệ thống&nbsp;websites&nbsp;tường thuật&nbsp;trực tiếp từng giải&nbsp;kết quả xổ số toàn quốc&nbsp;còn cung cấp&nbsp;tính năng <span style="color: #800000"><strong>In vé dò</strong></span> với mục đích đơn giản nhất cho anh chị em Đại Lý Vé Số in nhanh nhất KQXS&nbsp;trực tiếp hàng&nbsp;ngày&nbsp;hoặc in&nbsp;một ngày bất kỳ chỉ cần&nbsp;1&nbsp;cái bấm chuột&nbsp;từ&nbsp;kho dữ liệu chính xác,&nbsp;đầy đủ nhiều năm&nbsp;và cập nhật thường xuyên của <a href="/le-chung.html">Lê Chung</a> mà&nbsp;không phải lưu trữ.</span></p>
<p style="text-align: center">
	<span style="font-size: 18px"><span style="color: #ff0000"><span style="font-family: Times New Roman"><strong>Hướng dẫn thiết lập ban đầu &amp; In:</strong></span></span></span></p>
<p style="text-align: justify">
	<strong><span style="font-size: 13px">I/</span> Yêu cầu:</strong></p>
<p style="text-align: justify">
	<span style="font-size: 13px">-</span>&nbsp;<span style="font-size: 13px">Để in KQXS trước tiên bạn phải có 1 máy in đã cài đặt và thiết lập khổ giấy <strong>A4</strong>.</p>
<p style="text-align: justify">
	<span class="style2">- Phiên bản này thiết kế mở rộng tương thích với </span><strong><span class="style2">trình duyệt Internet Explorer, Chrome và Mozilla Firefox</span></strong><span class="style2"> </span></p>
<p style="text-align: justify">
	&nbsp;</p>
<p style="text-align: justify">
	<strong><span class="style2">II/</span> <span class="style2">Thiết lập trang In</span></strong><span class="style2"> (Chỉ làm 1 lần đầu tiên, sau đó máy tính của bạn tự lưu thiết lập này):</span></p>
<p style="text-align: justify">
	&nbsp;</p>
<p style="text-align: justify">
	<span class="style2">+ Hướng dẫn với </span><span class="style2"><strong><span class="style2">trình duyệt Internet Explorer</span></strong> </span>các trình duyệt khác cơ bản cũng tương tự, riêng với <strong><span class="style2">Chrome</span></strong> thì bạn chọn chế độ canh lề tối thiểu và bỏ "Đầu và chân trang" đi là ok.</p>
<p style="text-align: justify">
	&nbsp;</p>
<p style="text-align: justify">
	<span style="font-size: 13px">-Trên trang bạn thấy dưới mỗi bảng KQXS&nbsp;đều&nbsp;có nút <span style="color: #800080"><img align="absMiddle" alt="" border="0" hspace="5" src="http://www.minhngoc.com.vn/Images/print.jpg">In vé dò <font color="#000000">bạn click vào đó và chọn loại, Hộp thoại <strong>Print</strong> hiện lên &gt; Lần đầu này bạn nhấn <strong>Cancel</strong> &gt; Vào <strong>File</strong> &gt;&gt; <strong>Page Setup... </strong>&gt; Chọn khổ giấy <strong>A4</strong>, chọn canh lề các bên = <strong>0</strong> (nhiều máy in không cho canh lề = 0 thì bạn chọn thông số nhỏ nhất) &gt;&gt; Các thông số khung <strong>Headers and Footers</strong> thiết lập <strong>Empty</strong>&nbsp;&gt;&gt; <strong>Click OK</strong> &gt;đóng. Vào Vào <strong>File</strong> &gt;&gt; <strong>Print Preview... </strong>&gt; Xem lại thử trang in có hợp lý chưa, nếu tất cả ok in test thử 1 tờ.<br>
	</span></p>
<p style="text-align: justify">
	&nbsp;</p>
<p style="text-align: justify">
	<span style="font-size: 13px"><span style="color: #800080"><font color="#000000">Thế là xong, máy tính của&nbsp;bạn đã lưu lại&nbsp;thiết lập, từ giờ về sau muốn in bảng KQXS&nbsp;bạn chỉ cần Click&nbsp;&nbsp;<span style="color: #800080"><img align="absMiddle" alt="" border="0" hspace="5" src="http://www.minhngoc.com.vn/Images/print.jpg">In vé dò </span>, chọn loại bản in và <strong>Enter</strong> </font><font color="#000000"><em>(Nếu in Kết Quả Trực Tiếp thì vào xem trực tiếp đến giải cuối cùng Click&nbsp;&nbsp;</em><span style="color: #800080"><em><img align="absMiddle" alt="" border="0" hspace="5" src="http://www.minhngoc.com.vn/Images/print.jpg"></em>In vé dò </span><em>và <strong>Enter</strong>).</em></font></span></span></p>
<p style="text-align: justify">
	&nbsp;</p>
<p style="text-align: justify">
	<span style="font-size: 13px">-Muốn in nhanh KQXS của 1 ngày bất kỳ: Từ menu&nbsp;<strong>chính </strong>&gt;click vào </span><a href="/in-ve.html" target="_blank"><strong><span style="font-size: 13px">In vé dò</span></strong></a><span style="font-size: 13px">&nbsp;<a href="/in-xo-so.html">&nbsp;</a>&gt; chọn <strong>Miền</strong> &gt; Chọn <strong>ngày</strong> &gt; &gt; Chọn loại &gt;Click <strong>In Vé Dò</strong>&nbsp;&gt; <strong>Enter</strong> là có ngay KQXS của ngày đó.</span></p>
<p style="text-align: justify">
	&nbsp;</p>
<p style="text-align: justify">
	<span style="font-size: 13px">Chúc các bạn thành công!</span></p>
<p style="text-align: right">
	<strong><span style="font-size: 13px">Lê Chung&nbsp;&nbsp;&nbsp; </span></strong></p></div>
    </div>
</div>

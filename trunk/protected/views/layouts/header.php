<header id="top">
    <div class="loginhome">
        <div class="container">
            <div class="col-xs-12 pull-right hidden-xs" style="margin-top: 5px;">
                <div class="input-prepend" style="float: right; margin-left: 5px;margin-top:2px"><button type="button" class="btn btn-default btn-xs" style="padding: 2px 10px;">Đăng nhập</button></div>
                <div class="input-prepend" style="float: right; margin-left: 5px; margin-top: 5px;"><input type="checkbox" /> Ghi nhớ</div>
                <div class="input-prepend" style="float: right; margin-left: 5px;"><span class="glyphicon glyphicon-asterisk add-on"></span><input name="password" type="password" style="width: 120px;" placeholder="Mật khẩu"></div>
                <div class="input-prepend" style="float: right; margin-left: 5px;"><span class="glyphicon glyphicon-user add-on"></span><input name="username" type="text" style="width: 120px;" placeholder="Tên đăng nhập"></div>
                <div class="input-prepend" style="float: right; margin-left: 5px;margin-top:2px"><button type="button" class="btn btn-default btn-xs" style="padding: 2px 10px;">Đăng ký</button></div>
            </div>
            <div class="clearfix hidden-xs"></div>
            <hr class="hidden-xs" />
            <div class="col-xs-2 pull-left hidden-xs">
                <img src="<?php echo Yii::app()->homeUrl ?>img/logo.png" height="100" />
            </div>
            <div class="col-xs-3 pull-left visible-xs">
                <img src="<?php echo Yii::app()->homeUrl ?>img/logo.png" height="70" />
            </div>
            <div class="col-xs-4 pull-left hidden-xs hidden-sm" style="padding-top: 25px;text-align: center;">
                <b style="font-size: 12px;">CHUYÊN TRANG KẾT QUẢ XỔ SỐ KIẾN THIẾT</b><br />
                        <b style="color: yellow; font-size: 25px;font-family:arial">XỔ SỐ LÊ CHUNG</b>
            </div>
            <div class="col-xs-10 pull-left visible-sm" style="padding-top: 10px;text-align: center;">
                <b>CHUYÊN TRANG KẾT QUẢ XỔ SỐ KIẾN THIẾT</b><br />
                        <b style="color: yellow; font-size: 18px;font-family:arial">XỔ SỐ LÊ CHUNG</b>
            </div>
            <div class="visible-xs pull-left col-xs-9" style="padding-top: 10px;text-align: center;">
                <b style="font-size: 10px;">CHUYÊN TRANG KẾT QUẢ XỔ SỐ KIẾN THIẾT</b><br />
                        <b style="color: yellow; font-size: 13px;font-family:arial">XỔ SỐ LÊ CHUNG</b>
            </div>
            
            <div class="col-xs-6 pull-right hidden-xs hidden-sm">
                <form method="get" action="<?php echo $this->createUrl("/do-ve-so-online.html"); ?>">
                <div class="jumbotron form-inline">
                    <input type="text" name="ngay" value="<?php echo date("d-m-Y",time()) ?>" class="hasDatepick ngaydove inputsearch form-control" placeholder="Ngày" /> &nbsp; 
                    <input type="text" name="so" class="inputsearch form-control" placeholder="Vé số" /> &nbsp; 
                   <select name="tinh" class="inputsearch form-control">
                        <?php $tinh = Tinh::model()->findAll();
                        foreach($tinh as $tinhitem){ ?>
                        <option value="<?php echo $tinhitem->id ?>"><?php echo $tinhitem->tinh; ?></option>
                        <?php } ?>
                    </select> &nbsp; 
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Dò</button>
                </div>
                </form>
            </div>
            <div class="col-xs-10 pull-right visible-sm">
                <form method="get" action="<?php echo $this->createUrl("/do-ve-so-online.html"); ?>">
                <div class="jumbotron form-inline">
                    <input type="text" name="ngay" value="<?php echo date("d-m-Y",time()) ?>" class="hasDatepick ngaydove inputsearch form-control" placeholder="Ngày" /> &nbsp; 
                    <input type="text" name="so" class="inputsearch form-control" placeholder="Vé số" /> &nbsp;
                    <select name="tinh" class="inputsearch form-control">
                        <?php
                        foreach($tinh as $tinhitem){ ?>
                        <option value="<?php echo $tinhitem->id ?>"><?php echo $tinhitem->tinh; ?></option>
                        <?php } ?>
                    </select> &nbsp;
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Dò</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</header>
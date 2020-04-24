<?php
header('Content-type:text/html;charset:utf8');
date_default_timezone_set('Asia/Shanghai');


//连接数据库
require 'inc/conn.php';

if (isset($_POST['send-btn'])) {
    
    $name = $_POST['username'];
    $cont = $_POST['content'];
    $time = date('Y-m-d H:i:s');
    
    $sql = "insert into wish_content(username,content,time) values ('$name','$cont','$time')";
    $res = mysqli_query($link, $sql);
    if ($res == true)
        echo "<script>alert('留言发布成功');location.href='index.php' </script>";
        else
            echo "<script>alert('留言发布失败');location.href='index.php' </script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>许愿墙</title>
<link rel="stylesheet" href="./Css/index.css" />
<script type="text/javascript" src='./Js/jquery-1.7.2.min.js'></script>
<script type="text/javascript" src='./Js/index.js'></script>
</head>
<body>
	<div id='top'>
		<span id='send'></span>
	</div>
	<div id='main'>
	
	<?php
$sql0 = "select * from wish_content";
$res0 = mysqli_query($link, $sql0);
$k = 1;
$emojiarr = array(
    '[抓狂]' => '<img src="./Images/phiz/zhuakuang.gif" alt="抓狂" />',
    '[抱抱]' => '<img src="./Images/phiz/baobao.gif" alt="抱抱" />',
    '[害羞]' => '<img src="./Images/phiz/haixiu.gif" alt="害羞" />',
    '[酷]' => '<img src="./Images/phiz/ku.gif" alt="酷" />',
    '[嘻嘻]' => '<img src="./Images/phiz/xixi.gif" alt="嘻嘻" />',
    '[太开心]' => '<img src="./Images/phiz/taikaixin.gif" alt="太开心" />',
    '[偷笑]' => '<img src="./Images/phiz/touxiao.gif" alt="偷笑" />',
    '[钱]' => '<img src="./Images/phiz/qian.gif" alt="钱" />',
    '[花心]' => '<img src="./Images/phiz/huaxin.gif" alt="花心" />',
    '[挤眼]' => '<img src="./Images/phiz/jiyan.gif" alt="挤眼" />'
);

if (! $res0) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
}

while ($rs = mysqli_fetch_array($res0)) {
    foreach ($emojiarr as $key => $value) {
        $rs['content'] = str_replace($key, $value, $rs['content']);
    }
    ?>
		<dl class='paper a<?php echo rand(1,5)?>'>
			<dt>
				<span class='username'><?php echo $rs['username']; ?></span> 
				<span class='num'>No.<?php echo str_pad($rs['id'],5,'0',STR_PAD_LEFT); ?></span>
			</dt>
			<dd class='content'><?php echo $rs['content']; ?></dd>
			<dd class='bottom'>
				<span class='time'><?php echo $rs['time']; ?></span> <a href=""
					class='close'></a>
			</dd>
		</dl>
		<?php
}
?>

	</div>

	<div id='send-form'>
		<p class='title'>
			<span>许下你的愿望</span><a href="" id='close'></a>
		</p>
		<form action="index.php" method="post" name='wish'>
			<p>
				<label for="username">昵称：</label> <input type="text" name='username' id='username' />
			</p>
			
			<p>
				<label for="content">愿望：(您还可以输入&nbsp;<span id='font-num'>50</span>&nbsp;个字)</label>
				<textarea name="content" id='content'></textarea>
				<div id='phiz'>
					<img src="./Images/phiz/zhuakuang.gif" alt="抓狂" /> <img
						src="./Images/phiz/baobao.gif" alt="抱抱" /> <img
						src="./Images/phiz/haixiu.gif" alt="害羞" /> <img
						src="./Images/phiz/ku.gif" alt="酷" /> <img
						src="./Images/phiz/xixi.gif" alt="嘻嘻" /> <img
						src="./Images/phiz/taikaixin.gif" alt="太开心" /> <img
						src="./Images/phiz/touxiao.gif" alt="偷笑" /> <img
						src="./Images/phiz/qian.gif" alt="钱" /> <img
						src="./Images/phiz/huaxin.gif" alt="花心" /> <img
						src="./Images/phiz/jiyan.gif" alt="挤眼" />
				</div>
			</p>
			<input type="submit" name="send-btn" id='send-btn' value="" style="width: 120px; height: 50px; border: none;" />
		</form>
	</div>
	<!--[if IE 6]>
    <script type="text/javascript" src="./Js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('#send,#close,.close','background');
    </script>
<![endif]-->
</body>
</html>
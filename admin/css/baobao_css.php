<?php
include_once('../include/common.php');
echo '
<style>
.baobao-body
{
	margin:0;
	text-align:center;
}

.baobao-centerdiv
{
	display: flex;
	justify-content: center;
	align-items: center;
}
.baobao-x-center
{
	position: absolute;
	margin-top:50px;
	left: 50%;
	transform: translate(-50%,0);
}
.baobao-yzm
{
	margin:0;
	cursor:pointer;
}

.baobao-span
{
	border:none;
	font-weight:bold;
	color:#E6E6E6;
	outline:none;
}
.baobao-span:hover
{
	border:none;
	font-weight:bold;
	color:#FFFFFF;
	cursor:pointer;
}
.baobao-span:focus
{
	border:none;
	font-weight:bold;
	color:#FFFFFF;
	cursor:pointer;
}

a
{
	text-decoration:none;
}

.baobao-contain
{
	height:auto;
	line-height:50px;
	text-align:center;
}

.baobao-font-title
{
	font-weight:bold;
	font-size:15px;
	color:#E9E2E4;
}

.baobao-form
{
	width:100%;
	margin:0;
	text-align:center;
}
.baobao-input
{
	text-align:left;
	text-indent:20px;
	font-size:15px;
	height:50px;
	width:70%;
	border-color:'.$colors['52'].';
	outline:none;
	border-style:solid;
	border-width:1px;
	background-color:'.$colors['53'].';
	color:'.$colors['57'].';
}
.baobao-input:focus
{
	border-color:#E2D9DA;
	border-style:solid;
	border-width:3px;
	border-color:'.$colors['58'].';
    background-color:'.$colors['55'].';
	color:'.$colors['56'].';
}
.baobao-input:hover
{
	border-color:#E2D9DA;
	border-width:3px;
	border-color:'.$colors['58'].';
    background-color:'.$colors['55'].';
	color:'.$colors['56'].';
	transition:all .5s;
}

.baobao-inline
{
	width:100%;
	text-align:center;
}	
.baobao-inline.baobao-inline-item
{
	float:left;
	margin:0;
}
.baobao-lable
{
	height:50px;
	width:30%;
	background-color:'.$colors['51'].';
	line-height:50px;
	font-size:100%;
	color:'.$colors['52'].';
	font-weight:bold;
}
hr
{
	margin:0;
	border-width:1px;
	border-style:solid;
	border-color:'.$colors['63'].';
	background-color:'.$colors['63'].';
}
@media screen and (min-width: 992px)
{
	.baobao-width-406080
	{
		width:30%;
	}
}
@media screen and (min-width: 768px)
{
	.baobao-width-406080
	{
		width:30%;
	}
}
@media screen and (max-width: 768px)
{
	.baobao-width-406080
	{
		width:80%;
	}
}

.baobao-run-center
{
	animation:run 1s ease forwards;
}
@keyframes run
{
	0%{
		transform:translateX(-100%);
	}
	50%{
		transform:translateX(10px);
	}
	100%{
		transform:translateX(0px); /*状态的样式不会继承。所以必须加上x轴的坐标值。*/
	}
}

.baobao-show
{
	animation: showtip 3s 1;
	animation-fill-mode: forwards;
}
@keyframes showtip
{
	from {
		opacity: 0;
	}
	to {
		opacity: 1;
	}
}
@-webkit-keyframes showtip
{
	from {
		opacity: 0;
	}
	to {
		opacity: 1;
	}
}
.baobao-nav-left
{
	position:fixed;
	text-align:left;
	line-height:50px;
	background-color:#363031;
	height:50px;
	width:100%;
	z-index:100;
}
</style>
';
?>
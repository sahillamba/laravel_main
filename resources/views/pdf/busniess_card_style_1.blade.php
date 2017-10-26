<style type="text/css">

*.{
	margin:0px;
	padding: 0px;
}

.container{
	font-family:  DejaVu Sans Mono;
	padding:5%;
	padding-left:10%;
	height:25px;
}

.container_1{
	background-color: #3C4E5D;
	color: #f4f6f9;
}

.container_2{
	background-color: #EB182C;
	width:100%;
	color: #f4f6f9;
	padding-bottom:10%;
	padding-top:2%;
}

.container_3{
	background-color: #FFF;
	width:100%;
	color: #f4f6f9;
}

.container_4{
	background-color: #3C4E5D;
	width:100%;
	color: #f4f6f9;
}

.container_5{
	background-color: #EB182C;
	width:100%;
	color: #f4f6f9;
}

.container_last{
	padding-top: 1%;
	height:25px;
	
}
.name{
	text-align: left;
	font-size: 14px;
}
.position{
	text-align: left;
	font-size: 14px;
	padding-top: 1%;
}

.avatar {
	border-radius: 250%;
}

</style>
<body>
	<div class="container container_1">
		<div class="name">{{ $full_name }}</div>
	</div>

	<div class="container container_2" style="z-index:999;" >
		<img src="{{ $grav_url }}" alt="" class="avatar" style="float:right;z-index:999;" />
		<div class="position">{{ $position }}</div>
	</div>

	<div class="container container_3" style="z-index:9;" >
	</div>

	<div class="container container_4" style="font-size:10px;" >
		<div class="email">{{ $email }}</div>
	</div>

	<div class="container container_5" style="font-size:12px;"  >
		<div class="msg">{{ $msg }}</div>
	</div>

	<div class="container_last">
		<img src="{{public_path()}}/images/coviam.png" alt="" width="125px" style="margin-left: 75px;"/>
	</div>


</body>

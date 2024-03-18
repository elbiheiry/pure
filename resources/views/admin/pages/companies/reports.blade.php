<!DOCTYPE html>
<html>
    <head>
		
        <!-- Basic page needs
		===========================-->
		<title>pure wash</title>
		<meta charset="utf-8">
		<meta name="author" content="">
		<meta name="description" content="">
		<meta name="keywords" content="">        
        
        <!-- Mobile specific metas
        ===========================-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Favicon
        ===========================-->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/site/images/fav-icon.png')}}">


        <!-- Css Base And Vendor
        ===========================-->
        <link href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

			
        <!-- Site Style
		===========================-->
		{{--<link rel="stylesheet" href="css/price.css">--}}
        <link rel="stylesheet" href="{{asset('assets/site/vendor/wow-master/animate.css')}}">
        @if(app()->getLocale() == 'ar')
            <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
        @else
            <link rel="stylesheet" href="{{asset('assets/site/css/style-en.css')}}">
        @endif
        <style>
            @media print {
                #PrintButton{
                    display : none;
                }
                
                #BackButton{
                    display : none;
                }
            }
        </style>
		
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
		
		<button id="PrintButton" class="custom-btn" onclick="window.print()" style="background-color: #00A0E3;border: 0;margin: 10px 10px 0 0;border-radius: 5px;">print</button>
		<a href="{{route('admin.companies')}}" id="BackButton" class="custom-btn blue-btn" style="background-color: #00A0E3;border: 0;margin: 10px 10px 0 0;border-radius: 5px;" >Back</a>

		@foreach($members as $member)
		@if(sizeof($member->wishlists) > 0)
		<table class="table-beckages ">
			<h4 class="name" >{{$member->first_name}} {{$member->last_name}}</h4>
			<thead>
				<tr>
					<th class="">#</th>
					<th class="">اسم الباقة</th>
					<th class="">سعر الباقة</th>
					<th class="">تاريخ الطلب</th>
					<th class="">تاريخ الانتهاء</th>
					<th class="">طريقة الدفع</th>
					<th class="">الحالة</th>
				</tr>
			</thead>
			<tbody>
			@php
			$size = \App\Type::find($member->type_id)->value('size')
			@endphp
			@foreach($member->wishlists as $index => $wishlist)
			<tr>
				<td class="orders-code">
					<p>{{$wishlist->id}}</p>
				</td>
				<td class="orders-name">
					<p>{{$wishlist->package->translated()->name}}</p>
				</td>
				<td class="orders-price">
					<p>{{$wishlist->package->prices()->where('size' , $size)->where('duration' , $wishlist->price['duration'])->value('price')}} ر.س</p>
				</td>
				<td class="orders-start">
					<p>{{$wishlist->created_at->format('d/m/Y')}}</p>
				</td>
				<td class="orders-end">
					<p>{{\Carbon\Carbon::parse($wishlist->created_at)->addMonths($wishlist->price['duration'])->format('d/m/Y')}}</p>
				</td>
				<td class="orders-payment">
					<p>{{$wishlist->payment}}</p>
				</td>
				<td class="orders-payment">
					{{$wishlist->status}}
				</td>

			</tr>
			@endforeach
				
			</tbody>
		</table><!--End table-cart -->	
		
		<table class="table-beckages washes">
			<thead>
				<tr>
					<th class="">نوغ الغسلة</th>
					<th class="">تاريخ الغسلة</th>
					<th class="">حالة الغسلة</th>
					<th class="">ملاحظات</th>
				</tr>
			</thead>
			<tbody>
			@php
			$size = \App\Type::find($member->type_id)->value('size')
			@endphp
			@foreach($member->wishlists as $index => $wishlist)
			@foreach($wishlist->washes as $index => $wash)
			<tr>
				<td>{{$wash->type}}</td>
				<td>{{$wash->date}}</td>
				<td>{{$wash->status}}</td>
				<td>{{$wash->comments}}</td>
			</tr>
			@endforeach
			@endforeach
				<tr>
					<td class="">
						خارجي
					</td>
					<td class="">
						10-2-2019
					</td>
					<td class="">
						قيد التنفيذ
					</td>
					<td class="">
						لا يوجد
					</td>
				</tr>
				<tr>
					<td class="">
						خارجي
					</td>
					<td class="">
						10-2-2019
					</td>
					<td class="">
						قيد التنفيذ
					</td>
					<td class="">
						لا يوجد
					</td>
				</tr>
			</tbody>
		</table><!--End table-cart -->
		@endif
		@endforeach
		
		<!--Scribts Base And Vendor
		================================-->
        <script src="{{asset('assets/site/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap/js/bootstrap.js')}}"></script>
		
		<script src="js/main.js"></script>   
		<script>
			function show1(){
				document.getElementById('div1').style.display ='none';
			}
			function show2(){
				document.getElementById('div1').style.display = 'block';
			}
		</script>	
    </body>
</html>    
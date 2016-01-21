<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>To Do List</title>

	<!-- CSS Styles, Fonts, Select 2 Tags Stylesheet-->
    <link href="/css/all.css" rel="stylesheet">
	
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>  
    
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    
    <!-- Scripts (Twitter Bootstrap and JQuery Sortable UI) -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#sortable-1" ).sortable();
        });
    </script>  
</head>

<body>
    <!-- Navigation Bar -->
	@include('partials.nav')
    
    <!-- Content -->
    <div class="container">
        
        @if (Session::has('flash_message'))
            <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
        @endif
        
        @yield('content')
    </div>
    
    <!-- Footer -->
    <div class="container">
        @yield('footer')
    </div>  
    
</body>
</html>


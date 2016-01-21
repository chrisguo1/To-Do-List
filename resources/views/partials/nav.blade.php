<!-- Navigtion Bar (from default laravel) -->
<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">To Do List</a>
			</div>

            <!-- Links on Nav Bar -->
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav">
				    <li><a href="{{ url('') }}">Home</a></li>
                    <li><a href="{{ url('/items') }}">List</a></li>
                    <li><a href="{{ url('/items/create') }}">New Item</a></li>
                    <li><a href="{{ url('/tags/create') }}">New Tag</a></li>
					<li><a href="{{ url('/restore') }}">Restore</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if(auth()->guest())
						@if(!Request::is('auth/login'))
							<li><a href="{{ url('/auth/login') }}">Login</a></li>
						@endif
						@if(!Request::is('auth/register'))
							<li><a href="{{ url('/auth/register') }}">Register</a></li>
						@endif
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

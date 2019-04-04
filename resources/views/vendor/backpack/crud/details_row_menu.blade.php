<div class="m-t-10 m-b-10 p-l-10 p-r-10 p-t-10 p-b-10">
	<div class="row">
		<div class="col-md-6">
		    @foreach ($foods as $food)
                <p>Food: {{ $food['name'] }}</p>
                <p>Price: {{ $food['price_food'] }}</p>
            @endforeach
		</div>
		<div class="col-md-6">
		    @foreach ($drinks as $drink)
                <p>Drink: {{ $drink['name'] }}</p>
                <p>Price: {{ $drink['price_drink'] }}</p>
            @endforeach
		</div>
	</div>
</div>
<div class="clearfix"></div>